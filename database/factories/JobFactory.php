<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'  => fake()->jobTitle(),
            'salary' => random_int(10000, 100000),
            'location'  => fake()->city(),
            'description'  => fake()->paragraphs(4, true),
            'category' => fake()->randomElement(Job::$categories),
            'experience' => fake()->randomElement(Job::$experience),
        ];
    }
}
