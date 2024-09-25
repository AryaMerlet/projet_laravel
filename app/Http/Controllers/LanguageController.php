<?php

namespace App\Http\Controllers;

use session;

class LanguageController extends Controller
{
    public function languageSwitch($language)
    {
        session::put('language', $language);

        return back();
    }
}
