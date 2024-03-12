<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Test user registration.
     *
     * @return void
     */
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

        $response->assertSeeText('Welcome');

        $response->assertStatus(200);
    }
}
