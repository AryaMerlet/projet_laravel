<?php

namespace Database\Factories;
use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Absence>
 */
class AbsenceFactory extends Factory
{
    protected $model = Absence::class;

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
            'user_id' => User::factory(),
            'motif_id' => Motif::factory(),
        ];
    }
}
