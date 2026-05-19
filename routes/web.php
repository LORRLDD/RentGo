<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');