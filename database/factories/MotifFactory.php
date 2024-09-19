<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motif>
 */
class MotifFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->text(30),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->LastName(),
            'job' => fake()->jobTitle(),
            'is_accessible_worker' => fake()->boolean(),
        ];
    }
}
