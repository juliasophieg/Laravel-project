<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;


class PostpageTest extends TestCase
{
    use RefreshDatabase;

    public function test_postpage()
    {
        $this->followingRedirects();

        $user = User::factory()->create();

        $image = UploadedFile::fake()->image('test_image.jpg');

        $this->actingAs($user)->post('posts', [
            'title' => 'Mustang 4-ever',
            'brand' => 'Ford',
            'model' => 'Mustang',
            'model_year' => 1966,
            'description' => 'Because Mustang is the best car ever!',
            'car_img' => $image,
        ]);
        $response = $this->get('/postpage');

        $response->assertSeeText('Mustang 4-ever');
    }
}
