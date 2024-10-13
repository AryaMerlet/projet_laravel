<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Mail\infomail;
use App\Models\Motif;
use Illuminate\Support\Facades\Mail;

class MailTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @return void
     */
    public function test_infomail_is_sent()
    {
        Mail::fake();
        $motif = Motif::factory()->create();
        Mail::to('test@example.com')->send(new infomail($motif));
        Mail::assertSent(infomail::class, function ($mail) use ($motif) {
            return $mail->hasTo('test@example.com');
        });
    }

    /**
     * Summary of test_infomail_content
     * @return void
     */
    public function test_infomail_content()
    {
        $motif = Motif::factory()->create();
        $mail = new infomail($motif);
        $this->assertEquals('Create new motif', $mail->envelope()->subject);
        $viewData = $mail->content()->with;
        $this->assertArrayHasKey('motif', $viewData);
        $this->assertEquals($motif->id, $viewData['motif']->id);
    }
}

