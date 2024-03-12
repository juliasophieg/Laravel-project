<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = User::create(
            [
                'name' => 'Test',
                'email' => 'test@mail.se',
                'password' => Hash::make('999'),
            ]
        );

        $this->followingRedirects();

        $response = $this->actingAs($user)->post('/login', [
            'email' => 'test@mail.se',
            'password' => '999',
        ]);

        $response->assertSeeText('Hello Test!');
        $response->assertStatus(200);
    }
}
