<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Summary of setUp
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Event::fake();
    }

    /**
     * Summary of test_email_verification_screen_can_be_rendered
     * @return void
     */
    public function test_email_verification_screen_can_be_rendered(): void
    {
        $user = User::factory()->unverified()->create();

        $response = $this->actingAs($user)->get('/verify-email');

        $response->assertStatus(200);
    }
    /**
     * Summary of test_email_can_be_verified
     * @return void
     */
    public function test_email_can_be_verified(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        Event::fake();
        $response = $this->actingAs($user)->get(route('verification.verify', [
            'id' => $user->id,
            'hash' => sha1($user->email),
        ]));
        Event::assertDispatched(Verified::class);
        $this->assertNotNull($user->fresh()->email_verified_at);

        $response->assertRedirect(route('dashboard') . '?verified=1');
    }
}
