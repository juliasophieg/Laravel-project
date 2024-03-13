<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_post()
    {
        $user = User::create([
            'name' => 'Test',
            'email' => 'test@email.se',
            'password' => Hash::make('999'),
        ]);

        $this->actingAs($user);

        $post = Post::create([
            'title' => 'Test 3 title',
            'brand' => 'Test 3 brand',
            'model' => 'Test 3 model',
            'model_year' => 2023,
            'description' => 'Test 3 description',
            'car_img' => 'test_image.jpg',
            'user_id' => $user->id,
        ]);

        $newData = [
            'title' => 'New title',
            'brand' => 'New brand',
            'model' => 'New model',
            'model_year' => 2024,
            'description' => 'New description',
            'car_img' => 'new_test_image.jpg',
        ];

        $this->followingRedirects();

        $response = $this->put('/posts/' . $post->id, $newData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('posts', $newData);
    }
}
