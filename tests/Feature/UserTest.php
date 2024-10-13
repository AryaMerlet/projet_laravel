<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Absence;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Summary of a_user_has_many_absences
     * @return void
     */
    public function test_a_user_has_many_absences()
    {
        $user = User::factory()->create();
        $absence1 = Absence::factory()->create(['user_id' => $user->id]);
        $absence2 = Absence::factory()->create(['user_id' => $user->id]);
        $absences = $user->hasAbsence;
        $this->assertTrue($absences->contains($absence1));
        $this->assertTrue($absences->contains($absence2));
        $this->assertCount(2, $absences);
    }
}

