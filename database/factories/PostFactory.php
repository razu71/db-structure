<?php

namespace Database\Factories;

use App\Enums\CommonEnum;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, CommonEnum::NO_OF_RECORDS),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
}
