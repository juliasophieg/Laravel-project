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
    /**
     * A basic feature test example.
     */
    public function test_update_post()
    {
        $user = User::create(
            [
                'name' => 'Testupdate',
                'email' => 'testupdate@email.se',
                'password' => Hash::make('999'),
            ]
        );

        $image = UploadedFile::fake()->image('test_image.jpg');

        $this->actingAs($user)->post('posts', [
            'title' => 'Test2 title',
            'brand' => 'Test2 brand',
            'model' => 'Test2 model',
            'model_year' => 2024,
            'description' => 'Test2 description',
            'car_img' => $image,
        ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Test2 title',
            'brand' => 'Test2 brand',
            'model' => 'Test2 model',
            'model_year' => 2024,
            'description' => 'Test2 description',
        ]);

        $newData = [
            'title' => 'New title',
            'brand' => 'New brand',
            'model' => 'New model',
            'model_year' => 2025,
            'description' => 'New description',
            'car_img' => $image,
        ];


        $response = $this->put('/posts/{id}/edit', $newData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('posts', $newData);
    }
}
