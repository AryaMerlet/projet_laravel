<?php

namespace Tests\Feature;

use App\Models\User; // Make sure to include the User model
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MotifRequestTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function test_it_authorizes_requests()
    {
        $request = new \App\Http\Requests\MotifRequest();

        $this->assertTrue($request->authorize());
    }
}

