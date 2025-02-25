<?php

use App\Http\Controllers\JuegosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::resource('/juegos', JuegosController::class);