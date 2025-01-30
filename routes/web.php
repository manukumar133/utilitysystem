<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Route;

// Main page to show three buttons
Route::get('/', function () {
    return view('welcome');
});



Route::get('/audio', [UtilityController::class, 'audio'])->name('audio');
Route::post('/audio/duration', [UtilityController::class, 'checkAudioDuration'])->name('audio.duration');

Route::get('/distance', [UtilityController::class, 'distance'])->name('distance');
Route::post('/distance/calculate', [UtilityController::class, 'calculateDistance'])->name('distance.calculate');

Route::get('users/export', [UserController::class, 'export'])->name('users.export');

Route::resource('users', UserController::class)->except(['show']);
Route::get('users/export/pdf', [UserController::class, 'exportPdf'])->name('users.export.pdf');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/export-pdf', [UserController::class, 'exportPdf'])->name('users.exportPdf');
