<?php

use App\Http\Controllers\MotifController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MotifController::class, 'index'])->name('home');

Route::resource('motif', MotifController::class);
Route::get('motif/{motif}/restore', [MotifController::class, 'restore'])->withTrashed()->name('motif.restore');
