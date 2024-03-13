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

        $post = Post::factory()->create();

        $newData = [
            'title' => 'New title',
            'brand' => 'New brand',
            'model' => 'New model',
            'model_year' => 2024,
            'description' => 'New description',
        ];

        $this->followingRedirects();

        $response = $this->put('/posts/' . $post->id, $newData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('posts', $newData);
    }
}
