<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginErrorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_error(): void
    {


        $response = $this->get('/LoginError');

        $response->assertSeeText('Login');

        $response->assertStatus(200);
    }
}
