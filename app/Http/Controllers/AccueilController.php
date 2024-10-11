<?php

namespace App\Http\Controllers;

class AccueilController extends Controller
{
    /**
     * Summary of Accueil
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function Accueil()
    {
        return view('layouts.app');
    }
}
