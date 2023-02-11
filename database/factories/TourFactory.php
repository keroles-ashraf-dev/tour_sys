<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => Str::slug(fake()->unique()->words(3, true), '-'),
            'adult_price' => fake()->randomFloat(2, 90, 100),
            'child_price' => fake()->randomFloat(2, 50, 80),
        ];
    }
}
