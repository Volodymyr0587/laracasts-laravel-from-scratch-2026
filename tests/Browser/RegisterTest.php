<?php

use Illuminate\Support\Facades\Auth;

it('registers a user', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john@example.com')
        ->fill('password', 'password123')
        ->fill('password_confirmation', 'password123')
        ->click('Create Account')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    // $this->assertDatabaseHas('users', [
    //     'name' => 'John Doe',
    // ]);

    expect(Auth::user())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('requires a valid email address', function () {
    visit('/register')
        ->fill('name', 'John Doe')
        ->fill('email', 'john123')
        ->fill('password', 'password123')
        ->fill('password_confirmation', 'password123')
        ->click('Create Account')
        ->assertPathIs('/register');
});
