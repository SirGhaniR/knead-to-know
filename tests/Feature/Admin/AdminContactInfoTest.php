<?php

use App\Models\ContactInfo;

describe('AdminContactInfoController', function () {
    beforeEach(function () {
        actingAsAdmin();
    });

    it('shows the contact info page with a fresh row', function () {
        ContactInfo::factory()->create([
            'email' => 'first@example.com',
            'phone' => '111',
            'address' => 'First address',
        ]);

        $this->get(route('admin.contact-info.index'))
            ->assertOk()
            ->assertViewHas('contactInfo', fn ($c) => $c->email === 'first@example.com');
    });

    it('shows the contact info page with null when the table is empty', function () {
        $this->get(route('admin.contact-info.index'))
            ->assertOk()
            ->assertViewHas('contactInfo', null);
    });

    it('returns the most recently created contact info row', function () {
        $this->travel(1)->hour();
        ContactInfo::factory()->create(['email' => 'old@example.com']);

        $this->travel(1)->hour();
        ContactInfo::factory()->create(['email' => 'new@example.com']);

        $this->get(route('admin.contact-info.index'))
            ->assertViewHas('contactInfo', fn ($c) => $c->email === 'new@example.com');
    });

    it('stores a new contact info row', function () {
        $this->post(route('admin.contact-info.create'), [
            'email' => 'hello@example.com',
            'phone' => '+62 812 0000',
            'address' => 'Jl. Merdeka No. 1',
        ])->assertRedirect(route('admin.contact-info.index'));

        expect(ContactInfo::count())->toBe(1);
        expect(ContactInfo::first()->email)->toBe('hello@example.com');
    });

    it('appends a new row rather than updating the existing one', function () {
        ContactInfo::factory()->create(['email' => 'old@example.com']);

        $this->post(route('admin.contact-info.create'), [
            'email' => 'new@example.com',
            'phone' => '222',
            'address' => 'New address',
        ]);

        expect(ContactInfo::count())->toBe(2);
    });

    it('rejects store when email is missing', function () {
        $this->post(route('admin.contact-info.create'), [
            'phone' => '123',
            'address' => 'x',
        ])->assertSessionHasErrors('email');
    });

    it('rejects store when email is invalid', function () {
        $this->post(route('admin.contact-info.create'), [
            'email' => 'not-an-email',
            'phone' => '123',
            'address' => 'x',
        ])->assertSessionHasErrors('email');
    });

    it('rejects store when phone is missing', function () {
        $this->post(route('admin.contact-info.create'), [
            'email' => 'a@b.com',
            'address' => 'x',
        ])->assertSessionHasErrors('phone');
    });

    it('rejects store when address is missing', function () {
        $this->post(route('admin.contact-info.create'), [
            'email' => 'a@b.com',
            'phone' => '123',
        ])->assertSessionHasErrors('address');
    });
});
