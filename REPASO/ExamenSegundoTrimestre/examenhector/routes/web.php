<?php
use App\Http\Controllers\ClientController;

use App\Http\Controllers\ayudaController;
use Illuminate\Support\Facades\Route;

Route::get('/clientes/alta','App\Http\Controllers\ClientController@formularioAlta')->name('formulario.alta');
Route::post('/clientes/alta','App\Http\Controllers\ClientController@postear')->name('clientes.alta');
Route::get('/principal','App\Http\Controllers\ClientController@principal')->name('clientes.home');

//Route::resource('/ayuda', ayudaController::class);
