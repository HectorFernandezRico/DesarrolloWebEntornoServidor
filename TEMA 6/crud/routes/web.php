<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/', 'App\Http\Controllers\StudentController@home') -> name('home');
Route::resource('/students', 'App\Http\Controllers\StudentController');
