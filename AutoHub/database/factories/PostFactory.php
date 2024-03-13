<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'title' => $faker->sentence,
            'brand' => $faker->company,
            'model' => $faker->word,
            'model_year' => $faker->numberBetween(1900, 2024),
            'description' => $faker->paragraph,
            'car_img' => $faker->imageUrl(),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
