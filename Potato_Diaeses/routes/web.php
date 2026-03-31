<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CureController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PredictionController;

Route::get('/', [PredictionController::class, 'index']);

Route::post('/predict', [PredictionController::class, 'predict'])->name('predict');
Route::get('/history', [PredictionController::class, 'history'])->name('history');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('cures', CureController::class)->names('admin.cures');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
