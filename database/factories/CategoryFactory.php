<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'category_id' => $this->categoryId(),
            'description' => $this->faker->sentence,
        ];
    }

    public function categoryId()
    {
        $category = Category::query()
        ->inRandomOrder()
        ->first();

        return $category ? $category->id : null;
    }
}
