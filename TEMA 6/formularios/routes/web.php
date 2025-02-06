<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;

Route::get('/formulario', 'App\Http\Controllers\formController@home') -> name('home') ;

//Mis dos rutas para el formulario.
route::get('formulario', 'App\Http\Controllers\formController@formulario') -> name('formulario.alta');
route::post('/alta', 'App\Http\Controllers\formController@alta') -> name('grabar');
