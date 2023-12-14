<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DashCategory>
 */
class DashCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => Str::title($this->faker->unique()->sentence(2)),
            'img' => $this->faker->imageUrl(1600, 900, 'animals', true, 'dogs', true, 'jpg'),
            'slug' => $this->faker->slug(3),
        ];
    }
}
