<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Absence;
use App\Models\Motif;
use Illuminate\Support\Facades\Cache;

class MotifTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Summary of test_a_motif_has_many_absences
     * @return void
     */
    public function test_a_motif_has_many_absences()
    {
        $motif = Motif::factory()->create();
        $absence1 = Absence::factory()->create(['motif_id' => $motif->id]);
        $absence2 = Absence::factory()->create(['motif_id' => $motif->id]);
        $this->assertTrue($motif->absences->contains($absence1));
        $this->assertTrue($motif->absences->contains($absence2));
        $this->assertEquals(2, $motif->absences->count());
    }
    /**
     * Summary of test_getMotifWithCache
     * @return void
     */
    public function test_it_caches_motifs_correctly_in_getMotifWithCache()
    {
        $motifs = Motif::factory()->count(3)->create();
        Cache::shouldReceive('remember')
            ->once()
            ->with('motif', 3600, \Closure::class)
            ->andReturn($motifs);
        $result = (new Motif())->getMotifWithCache();
        $this->assertCount(3, $result);
        $this->assertEquals($motifs->pluck('id')->toArray(), $result->pluck('id')->toArray());
    }

    public function test_it_fetches_motifs_from_database_when_cache_is_empty()
    {
        $motifs = Motif::factory()->count(3)->create();
        Cache::shouldReceive('remember')
            ->once()
            ->with('motif', 3600, \Closure::class)
            ->andReturnUsing(function ($key, $ttl, $callback) {
                return $callback();
            });
        $result = (new Motif())->getMotifWithCache();
        $this->assertCount(3, $result);
        $this->assertEquals($motifs->pluck('id')->toArray(), $result->pluck('id')->toArray());
    }
}
