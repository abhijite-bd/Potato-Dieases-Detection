<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PredictionController;

Route::get('/', [PredictionController::class, 'index']);

Route::post('/predict',[PredictionController::class, 'predict'])->name('predict');
Route::get('/history',[PredictionController::class, 'history'])->name('history');
