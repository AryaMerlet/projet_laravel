<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function Accueil(){
        return view('layouts.app');
    }
}
