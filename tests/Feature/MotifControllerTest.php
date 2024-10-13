<?php

namespace Tests\Feature;

use App\Models\Absence;
use App\Models\User;
use App\Mail\infomail;
use App\Models\Motif;
use App\Repositories\MotifRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MotifControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    protected $motifRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());

        $this->motifRepository = $this->createMock(MotifRepository::class);
        $this->app->instance(MotifRepository::class, $this->motifRepository);
    }

    /** @test */
    public function test_it_stores_a_motif_and_sends_email()
    {
        $data = [
            'description' => 'Valid description',
        ];
        $this->motifRepository->expects($this->once())
            ->method('store')
            ->willReturn((new Motif())->fill($data));
        Mail::fake();
        $response = $this->post(route('motif.store'), $data);
        $response->assertRedirect(route('motif.index'));
        $this->assertDatabaseHas('motifs', [
            'description' => 'Valid description',
        ]);

        Mail::assertSent(infomail::class);
    }


    public function test_edit_returns_view_with_motif()
    {
        $motif = Motif::factory()->create();
        $response = $this->get(route('motif.edit', $motif));
        $response->assertStatus(200);
        $response->assertViewIs('motif.edit');
        $response->assertViewHas('motif', $motif);
    }

    /** @test */
    public function test_it_updates_a_motif()
    {
        $motif = Motif::factory()->create();
        $data = [
            'description' => 'Updated description',
        ];
        $this->motifRepository->expects($this->once())
            ->method('update')
            ->with($motif, $data)
            ->willReturn((new Motif())->fill($data)->setAttribute('id', $motif->id));
        $response = $this->put(route('motif.update', $motif->id), $data);
        $response->assertRedirect(route('motif.index'));
        $this->assertDatabaseHas('motifs', [
            'id' => $motif->id,
            'description' => 'Updated description',
        ]);
    }

    /** @test */
    public function test_it_deletes_a_motif()
    {
        $motif = Motif::factory()->create();
        $response = $this->delete(route('motif.destroy', $motif->id));
        $response->assertRedirect(route('motif.index'));
        $this->assertDeleted($motif);
    }

    /** @test */
    public function test_it_does_not_delete_a_motif_with_related_absences()
    {
        $motif = Motif::factory()->create();
        Absence::factory()->create(['motif_id' => $motif->id]);
        $response = $this->delete(route('motif.destroy', $motif->id));
        $response->assertRedirect(route('motif.index'));
        $this->assertDatabaseHas('motifs', ['id' => $motif->id]);
        $this->assertSessionHas('message', 'Le motif est encore utilisé par 1 absence(s)');
    }
}
