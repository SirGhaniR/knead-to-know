<?php

use App\Models\Contact;

it('stores a valid contact submission', function () {
    $response = $this->post(route('contact.store'), [
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'subject' => 'Question',
        'message' => 'Hello there!',
    ]);

    $response->assertRedirect(route('contact.index'));
    $response->assertSessionHas('success');

    $contact = Contact::first();
    expect($contact)->not->toBeNull();
    expect($contact->name)->toBe('Jane Doe');
    expect($contact->email)->toBe('jane@example.com');
    expect($contact->is_read)->toBeFalse();
});

it('validates required fields on the contact form', function (array $payload, string $field) {
    $this->post(route('contact.store'), $payload)
        ->assertSessionHasErrors($field);
})->with([
    'missing name' => [['name' => '', 'email' => 'a@b.com', 'subject' => 's', 'message' => 'm'], 'name'],
    'missing email' => [['name' => 'n', 'email' => '',       'subject' => 's', 'message' => 'm'], 'email'],
    'missing subject' => [['name' => 'n', 'email' => 'a@b.com', 'subject' => '', 'message' => 'm'], 'subject'],
    'missing message' => [['name' => 'n', 'email' => 'a@b.com', 'subject' => 's', 'message' => ''], 'message'],
    'invalid email' => [['name' => 'n', 'email' => 'not-an-email', 'subject' => 's', 'message' => 'm'], 'email'],
]);
