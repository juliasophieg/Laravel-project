<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;


class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_postpage()
    {
        $this->followingRedirects();

        $user = User::create(
            [
                'name' => 'Test',
                'email' => 'test@email.se',
                'password' => Hash::make('999'),
            ]
        );

        $image = UploadedFile::fake()->image('test_image.jpg');

        $this->actingAs($user)->post('posts', [
            'title' => 'Test title',
            'brand' => 'Test brand',
            'model' => 'Test model',
            'model_year' => 2024,
            'description' => 'Test description',
            'car_img' => $image,
        ]);
        $response = $this->get('/postpage');

        $response->assertSeeText('AutoHub');
    }
}
