<?php

namespace Database\Factories;

use App\Models\Motif;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'startleave' => fake()->dateTimeThisYear(),
            'duration' => fake()->time(),
            'id_user' => User::all()->random()->id(),
            'id_motif' => Motif::all()->random()->id(),
        ];
    }
}
