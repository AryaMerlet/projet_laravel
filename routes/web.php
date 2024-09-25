<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MotifController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'language'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [AccueilController::class, 'Accueil'])->name('home');

    Route::get('Language/{language}/languageSwitch', [LanguageController::class, 'languageSwitch'])->name('language.switch');

    Route::resource('motif', MotifController::class);

    Route::get('motif/{motif}/restore', [MotifController::class, 'restore'])->withTrashed()->name('motif.restore');

    Route::resource('absence', AbsenceController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
});

require __DIR__.'/auth.php';
