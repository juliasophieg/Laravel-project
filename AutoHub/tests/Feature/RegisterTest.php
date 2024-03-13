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

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john.doe@mail.com',
            'password' => 'TestPassword',
            'password_confirmation' => 'TestPassword'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john.doe@mail.com'
        ]);

        $response->assertSeeText('Welcome');

        $response->assertStatus(200);
    }
}
