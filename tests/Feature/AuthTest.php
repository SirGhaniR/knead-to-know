<?php

use App\Models\User;

it('redirects guests from admin dashboard to login', function () {
    $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
});

it('redirects guests from every admin route', function (string $routeName) {
    $this->get(route($routeName))->assertRedirect(route('login'));
})->with([
    'admin.dashboard',
    'admin.news.index',
    'admin.gallery.index',
    'admin.contact.index',
    'admin.contact-info.index',
]);

it('logs in a user with valid credentials', function () {
    $user = User::factory()->create(['password' => bcrypt('secret123')]);

    $response = $this->post('/auth', [
        'email' => $user->email,
        'password' => 'secret123',
    ]);

    $response->assertRedirect(route('admin.dashboard'));
    $this->assertAuthenticatedAs($user);
});

it('rejects a wrong password', function () {
    $user = User::factory()->create(['password' => bcrypt('secret123')]);

    $response = $this->from('/login')->post('/auth', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertRedirect('/login');
    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});

it('rejects a non-existent email', function () {
    $this->from('/login')
        ->post('/auth', [
            'email' => 'nobody@example.com',
            'password' => 'secret123',
        ])
        ->assertSessionHasErrors('email');
});

it('rejects a payload with a short password', function () {
    $this->post('/auth', [
        'email' => 'a@b.com',
        'password' => '123',
    ])->assertSessionHasErrors('password');
});

it('preserves old email input on a failed login', function () {
    User::factory()->create(['email' => 'admin@example.com']);

    $this->from('/login')
        ->post('/auth', [
            'email' => 'admin@example.com',
            'password' => 'nope-nope',
        ])
        ->assertSessionHasInput('email', 'admin@example.com');
});

it('logs out an authenticated user', function () {
    $this->actingAs(User::factory()->create());

    $this->post('/logout')->assertRedirect(route('home'));
    $this->assertGuest();
});
