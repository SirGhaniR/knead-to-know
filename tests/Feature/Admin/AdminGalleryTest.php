<?php

use App\Models\Gallery;

describe('AdminGalleryController', function () {
    beforeEach(function () {
        actingAsAdmin();
    });

    it('lists galleries paginated at 20 per page', function () {
        Gallery::factory()->count(22)->create();

        $this->get(route('admin.gallery.index'))
            ->assertOk()
            ->assertViewHas('galleries', fn ($g) => $g->count() === 20)
            ->assertViewHas('galleries', fn ($g) => $g->total() === 22);
    });

    it('lists galleries with zero items without crashing', function () {
        $this->get(route('admin.gallery.index'))
            ->assertOk()
            ->assertViewHas('galleries', fn ($g) => $g->total() === 0);
    });

    it('shows the edit form for a gallery item', function () {
        $gallery = Gallery::factory()->create(['title' => 'Sunset']);

        $this->get(route('admin.gallery.edit', $gallery->id))
            ->assertOk()
            ->assertViewHas('gallery', fn ($g) => $g->id === $gallery->id);
    });

    it('404s when editing a missing gallery item', function () {
        $this->get(route('admin.gallery.edit', 99999))->assertNotFound();
    });

    it('updates a gallery item without changing the image', function () {
        $gallery = Gallery::factory()->create([
            'title' => 'Old Title',
            'description' => 'Old desc',
            'image' => 'old.jpg',
        ]);

        $this->put(route('admin.gallery.update', $gallery->id), [
            'title' => 'New Title',
            'description' => 'New desc',
        ])->assertRedirect(route('admin.gallery.index'));

        $gallery->refresh();
        expect($gallery->title)->toBe('New Title');
        expect($gallery->description)->toBe('New desc');
        expect($gallery->image)->toBe('old.jpg');
    });

    it('accepts a null description on update', function () {
        $gallery = Gallery::factory()->withDescription()->create();

        $this->put(route('admin.gallery.update', $gallery->id), [
            'title' => 'Still Here',
            'description' => '',
        ])->assertRedirect(route('admin.gallery.index'));

        $gallery->refresh();
        expect($gallery->title)->toBe('Still Here');
        // ConvertEmptyStringsToNull middleware turns '' into null.
        expect($gallery->description)->toBeNull();
    });

    it('rejects update with a missing title', function () {
        $gallery = Gallery::factory()->create();

        $this->put(route('admin.gallery.update', $gallery->id), [
            'description' => 'x',
        ])->assertSessionHasErrors('title');
    });

    it('404s when updating a missing gallery item', function () {
        $this->put(route('admin.gallery.update', 99999), [
            'title' => 'x',
        ])->assertNotFound();
    });

    it('deletes a gallery item', function () {
        $gallery = Gallery::factory()->create();

        $this->delete(route('admin.gallery.delete', $gallery->id))
            ->assertRedirect(route('admin.gallery.index'));

        expect(Gallery::find($gallery->id))->toBeNull();
    });

    it('404s when deleting a missing gallery item', function () {
        $this->delete(route('admin.gallery.delete', 99999))->assertNotFound();
    });

    it('rejects store when title is missing', function () {
        $this->post(route('admin.gallery.create'), [
            'description' => 'x',
        ])->assertSessionHasErrors('title');
    });

    it('rejects store when image is missing', function () {
        $this->post(route('admin.gallery.create'), [
            'title' => 'A title',
        ])->assertSessionHasErrors('image');
    });
});
