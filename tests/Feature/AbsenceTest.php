<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Absence;
use App\Models\Motif;
use App\Models\User;

class AbsenceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Summary of test_it_belongs_to_a_motif
     * @return void
     */
    public function test_it_belongs_to_a_motif()
    {
        $absence = Absence::factory()->create();
        $this->assertInstanceOf(Motif::class, $absence->motif);
    }

    /**
     * Summary of test_it_belongs_to_a_user
     * @return void
     */
    public function test_it_belongs_to_a_user()
    {
        $absence = Absence::factory()->create();
        $this->assertInstanceOf(User::class, $absence->user);
    }
}
