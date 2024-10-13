<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AccueilControllerTest extends TestCase
{
    /**
     * Test if the Accueil method returns the correct view.
     *
     * @return void
     */
    public function test_accueil_returns_correct_view()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('layouts.app');
    }
}
