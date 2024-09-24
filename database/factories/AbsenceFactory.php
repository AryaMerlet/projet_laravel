<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Motif;

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
            'id_motif' => Motif::all()->random()->id (),
        ];
    }
}
