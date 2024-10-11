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
        $leaveStart = fake()->dateTimeThisYear();

        return [
            'leaveStart' => $leaveStart,
            'leaveEnd' => fake()->dateTimeBetween($leaveStart, 'now'),
            'user_id' => User::all()->random()->id,
            'motif_id' => Motif::all()->random()->id,
        ];
    }
}
