<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Summary of languageSwitch
     *
     * @param  mixed  $language
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function languageSwitch($language)
    {
        Session::put('language', $language);

        return back();
    }
}
