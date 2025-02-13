<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/', 'App\Http\Controllers\StudentController@home') -> name('home');
Route::resource('/students', 'App\Http\Controllers\StudentController');
