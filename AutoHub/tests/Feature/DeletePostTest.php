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
        $post = Post::factory()->create();

        $this->followingRedirects();

        $response = $this->delete('/post/' . $post->id);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]); // Ensure the post has been deleted from the database
        $response->assertStatus(200);
    }
}
