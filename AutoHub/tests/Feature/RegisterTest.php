<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            'name' => 'TestUser',
            'email' => 'test_' . time() . '@example.com',
            'password' => Hash::make('TestPassword'),
        ]);

        $this->assertNotNull($user);
        $this->assertEquals('TestUser', $user->name);

        $response = $this->actingAs($user)->get('/login');
        $response->assertSeeText('Welcome');
        $response->assertStatus(200);
    }
}
