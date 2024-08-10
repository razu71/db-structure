<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Enums\CommonEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word;
        return [
            'post_id' => $this->faker->numberBetween(1, CommonEnum::NO_OF_RECORDS),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
