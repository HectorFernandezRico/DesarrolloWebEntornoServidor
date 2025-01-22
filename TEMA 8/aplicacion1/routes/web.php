<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    echo "HOLA SOY EL RAIZ DE LA APLICACIÓN";
});

Route::resource('cars', '\App\Http\Controllers\CrudController');

/*
Route::get('/cars', '\App\Http\Controllers\CrudController@index');

Route::get('/ruta/{parametro}', '\App\Http\Controllers\PostController@miMetodo');

Route::get('/bici/{mira}/{mama}', '\App\Http\Controllers\PostController@sinManos');
*/

/*
Route::get('/cars', function () {
    echo "HOLA SOY CARS";
});

Route::get('/cars/{modelo}/{id}', function ($modelo, $id) {
    return "Me piden el coche modelo $modelo número $id";
});

route::get('/esto/es/una/ruta/muy/larga', function() {
    $larutalarga = route('larga');
    return "LA RUTA LARGA ES $larutalarga";
}) -> name('larga');
 */