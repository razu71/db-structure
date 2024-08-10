<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Photo;
use App\Enums\CommonEnum;
use Illuminate\Validation\Rules\In;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Photo::class;

    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl,
            'imageable_id' => $this->faker->numberBetween(1, (CommonEnum::PHOTO_RECORDS)),
            'imageable_type' => $this->faker->randomElement(['App\Models\Post','App\Models\Banner']),
        ];
    }
}
