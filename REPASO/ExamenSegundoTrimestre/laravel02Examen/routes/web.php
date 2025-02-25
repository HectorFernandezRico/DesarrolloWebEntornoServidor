<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/clientes/alta', 'App\Http\Controllers\ClientController@formularioAlta') -> name('formulario.alta');
Route::post('/clientes/alta', 'App\Http\Controllers\ClientController@grabarCliente') -> name('clientes.alta');
Route::get('/principal', 'App\Http\Controllers\ClientController@principal') -> name('clientes.home');

//Route::resource('/ayuda', 'App\Http\Controllers\AyudaController');