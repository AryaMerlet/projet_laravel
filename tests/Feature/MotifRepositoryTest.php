<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Motif;
use App\Repositories\MotifRepository;
class MotifRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Summary of motifRepository
     * @var MotifRepository
     */
    protected MotifRepository $motifRepository;

    /**
     * Summary of setUp
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->motifRepository = new MotifRepository(new Motif());
    }

    /**
     * Summary of it_can_store_a_new_motif
     * @return void
     */
    public function test_it_can_store_a_new_motif()
    {
        $inputs = [
            'description' => 'Not feeling well',
        ];
        $motif = $this->motifRepository->store($inputs);

        $this->assertDatabaseHas('motifs', [
            'description' => 'Not feeling well',
        ]);
    }

    /**
     * Summary of it_can_update_an_existing_motif
     * @return void
     */
    public function test_it_can_update_an_existing_motif()
    {
        $motif = Motif::factory()->create([
            'description' => 'Not feeling well',
        ]);
        $inputs = [
            'description' => 'Going to the doctor',
        ];
        $updatedMotif = $this->motifRepository->update($motif, $inputs);
        $this->assertDatabaseHas('motifs', [
            'id' => $updatedMotif->id,
            'description' => 'Going to the doctor',
        ]);
    }
}


