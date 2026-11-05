<?php

use App\Models\News;

describe('AdminNewsController', function () {
    beforeEach(function () {
        actingAsAdmin();
    });

    it('lists news paginated at 20 per page', function () {
        News::factory()->count(25)->create();

        $response = $this->get(route('admin.news.index'));

        $response->assertOk();
        $response->assertViewHas('news', fn ($news) => $news->count() === 20);
        $response->assertViewHas('news', fn ($news) => $news->total() === 25);
    });

    it('lists news with zero items without crashing', function () {
        $this->get(route('admin.news.index'))
            ->assertOk()
            ->assertViewHas('news', fn ($news) => $news->total() === 0);
    });

    it('rejects store when title is missing', function () {
        $this->post(route('admin.news.create'), [
            'content' => 'Body',
        ])->assertSessionHasErrors('title');
    });

    it('rejects store when content is missing', function () {
        $this->post(route('admin.news.create'), [
            'title' => 'A title',
        ])->assertSessionHasErrors('content');
    });

    it('rejects store when image is missing', function () {
        $this->post(route('admin.news.create'), [
            'title' => 'A title',
            'content' => 'Body',
        ])->assertSessionHasErrors('image');
    });

    it('shows the edit form for a news item', function () {
        $news = News::factory()->create(['title' => 'Original Title']);

        $this->get(route('admin.news.edit', $news->id))
            ->assertOk()
            ->assertViewHas('news', fn ($n) => $n->id === $news->id);
    });

    it('404s when editing a missing news item', function () {
        $this->get(route('admin.news.edit', 99999))->assertNotFound();
    });

    it('updates a news item without changing the image', function () {
        $news = News::factory()->create([
            'title' => 'Old',
            'content' => 'Old body',
            'image' => 'old-file.jpg',
            'is_featured' => false,
        ]);

        $this->put(route('admin.news.update', $news->id), [
            'title' => 'New Title',
            'content' => 'New body',
            'is_featured' => '1',
        ])->assertRedirect(route('admin.news.index'));

        $news->refresh();
        expect($news->title)->toBe('New Title');
        expect($news->content)->toBe('New body');
        expect($news->is_featured)->toBeTrue();
        expect($news->image)->toBe('old-file.jpg'); // unchanged
    });

    it('rejects update with a missing title', function () {
        $news = News::factory()->create();

        $this->put(route('admin.news.update', $news->id), [
            'content' => 'Body',
        ])->assertSessionHasErrors('title');
    });

    it('404s when updating a missing news item', function () {
        $this->put(route('admin.news.update', 99999), [
            'title' => 'x',
            'content' => 'y',
        ])->assertNotFound();
    });

    it('deletes a news item', function () {
        $news = News::factory()->create();

        $this->delete(route('admin.news.delete', $news->id))
            ->assertRedirect(route('admin.news.index'));

        expect(News::find($news->id))->toBeNull();
    });

    it('404s when deleting a missing news item', function () {
        $this->delete(route('admin.news.delete', 99999))->assertNotFound();
    });
});
