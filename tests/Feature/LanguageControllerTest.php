<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;

class LanguageControllerTest extends TestCase
{
    /**
     * Summary of test_it_updates_the_language_in_session
     * @return void
     */
    public function test_it_updates_the_language_in_session()
    {
        $this->withoutMiddleware();
        $language = 'fr';
        $response = $this->get(route('language.switch', ['language' => $language]));
        $this->assertEquals($language, session('language'));
        $response->assertRedirect();
    }
}

