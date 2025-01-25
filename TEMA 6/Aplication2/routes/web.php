<?php

use Illuminate\Support\Facades\Route;

Route::get('/', '\App\Http\Controllers\MenuController@menu');

Route::get('/visitas', '\App\Http\Controllers\MenuController@visitas');

Route::get('/inscripcion', '\App\Http\Controllers\MenuController@menu');
