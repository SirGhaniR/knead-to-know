<?php

use App\Models\Contact;

describe('AdminContactController', function () {
    beforeEach(function () {
        actingAsAdmin();
    });

    it('lists contacts paginated at 20 per page', function () {
        Contact::factory()->count(23)->create();

        $this->get(route('admin.contact.index'))
            ->assertOk()
            ->assertViewHas('contacts', fn ($c) => $c->count() === 20)
            ->assertViewHas('contacts', fn ($c) => $c->total() === 23);
    });

    it('lists contacts with zero items without crashing', function () {
        $this->get(route('admin.contact.index'))
            ->assertOk()
            ->assertViewHas('contacts', fn ($c) => $c->total() === 0);
    });

    it('shows the reply form for a contact', function () {
        $contact = Contact::factory()->create(['name' => 'Jane']);

        $this->get(route('admin.contact.reply', $contact->id))
            ->assertOk()
            ->assertViewHas('contact', fn ($c) => $c->id === $contact->id);
    });

    it('404s when showing a missing contact', function () {
        $this->get(route('admin.contact.reply', 99999))->assertNotFound();
    });

    it('marks a contact as read', function () {
        $contact = Contact::factory()->unread()->create();

        $this->put(route('admin.contact.update', $contact->id), [
            'is_read' => 1,
        ])->assertRedirect(route('admin.contact.index'));

        expect($contact->fresh()->is_read)->toBeTrue();
    });

    it('marks a contact as unread', function () {
        $contact = Contact::factory()->read()->create();

        $this->put(route('admin.contact.update', $contact->id), [
            'is_read' => 0,
        ])->assertRedirect(route('admin.contact.index'));

        expect($contact->fresh()->is_read)->toBeFalse();
    });

    it('rejects update when is_read is missing', function () {
        $contact = Contact::factory()->create();

        $this->put(route('admin.contact.update', $contact->id), [
        ])->assertSessionHasErrors('is_read');
    });

    it('rejects update when is_read is not a boolean', function () {
        $contact = Contact::factory()->create();

        $this->put(route('admin.contact.update', $contact->id), [
            'is_read' => 'not-a-boolean',
        ])->assertSessionHasErrors('is_read');
    });

    it('404s when updating a missing contact', function () {
        $this->put(route('admin.contact.update', 99999), [
            'is_read' => 1,
        ])->assertNotFound();
    });

    it('deletes a contact', function () {
        $contact = Contact::factory()->create();

        $this->delete(route('admin.contact.delete', $contact->id))
            ->assertRedirect(route('admin.contact.index'));

        expect(Contact::find($contact->id))->toBeNull();
    });

    it('404s when deleting a missing contact', function () {
        $this->delete(route('admin.contact.delete', 99999))->assertNotFound();
    });
});
