<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class DeletePostTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_post()
    {
        $user = User::create([
            'name' => 'Test',
            'email' => 'test@email.se',
            'password' => Hash::make('999'),
        ]);

        $this->actingAs($user);

        $image = UploadedFile::fake()->image('test_image.jpg');

        $post = Post::create([
            'title' => 'Test 3 title',
            'brand' => 'Test 3 brand',
            'model' => 'Test 3 model',
            'model_year' => 2024,
            'description' => 'Test 3 description',
            'car_img' => $image,
            'user_id' => $user->id,
        ]);

        $this->followingRedirects();

        $response = $this->delete('/post/' . $post->id);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]); // Ensure the post has been deleted from the database
        $response->assertStatus(200);
    }
}
