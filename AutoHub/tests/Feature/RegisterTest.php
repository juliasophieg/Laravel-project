<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class RegisterTest extends TestCase
{
    /**
     * Test user registration.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_user_registration()
    {
        $this->followingRedirects();

        $email = 'test_' . time() . '@example.com';

        $response = $this->post('/register', [
            'name' => 'TestUser',
            'email' => $email,
            'password' => 'TestPassword',
            'password_confirmation' => 'TestPassword'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'TestUser',
            'email' => $email
        ]);

        $response->assertSeeText('Welcome');

        $response->assertStatus(200);
    }
}
