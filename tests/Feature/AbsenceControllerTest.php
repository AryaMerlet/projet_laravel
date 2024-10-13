<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Absence;
use App\Models\Motif;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Bouncer;

class AbsenceControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_admin_can_view_all_absences()
    {
        $admin = User::factory()->create();
        Bouncer::assign('admin')->to($admin);

        $motif1 = Motif::factory()->create(['description' => 'Sick Leave']);
        $motif2 = Motif::factory()->create(['description' => 'Vacation']);

        Absence::factory()->create(['motif_id' => $motif1->id, 'user_id' => $admin->id]);
        Absence::factory()->create(['motif_id' => $motif2->id, 'user_id' => $admin->id]);
        $response = $this->actingAs($admin)->get(route('absence.index'));

        $response->assertStatus(200);
        $response->assertViewIs('absence.index');
        $response->assertViewHas('absences');
        $response->assertSee('Sick Leave');
        $response->assertSee('Vacation');
    }

    /** @test */
    public function test_employee_can_view_own_absences()
    {
        $employee = User::factory()->create();
        Bouncer::assign('employee')->to($employee);

        $motif = Motif::factory()->create(['description' => 'Sick Leave']);
        Absence::factory()->create(['motif_id' => $motif->id, 'user_id' => $employee->id]);
        $response = $this->actingAs($employee)->get(route('absence.index'));
        $response->assertStatus(200);
        $response->assertViewIs('absence.index');
        $response->assertViewHas('absencesUser');
        $response->assertSee('Sick Leave');
    }

    /** @test */
    public function test_unauthorized_user_cannot_access_absences_index()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('absence.index'));
        $response->assertRedirect('/');
        $response->assertSessionHas('message', "You don't have the rights to access this page");
    }

    public function test_accueil_returns_correct_view()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('layouts.app');
    }
}
