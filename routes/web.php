<?php

use App\Http\Controllers\SalonController;
use App\Http\Controllers\UniversidadController;
use Illuminate\Support\Facades\Route;



Route::resource('universidad', UniversidadController::class);
Route::get('/', [UniversidadController::class, 'index']);
Route::resource('salon', SalonController::class);

