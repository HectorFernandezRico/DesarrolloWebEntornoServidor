<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    echo "HOLA SOY EL RAIZ DE LA APLICACIÓN";
});

Route::get('/', '\App\Http\Controllers\PostController@bienvenido');

Route::get('/contacto', '\App\Http\Controllers\PostController@contacto');

Route::get('/post/{id}', '\App\Http\Controllers\PostController@muestraPost');

Route::get('/viaje/{pais}/{provincia}/{ciudad}', '\App\Http\Controllers\PostController@muestra_ciudad');

//Route::resource('cars', '\App\Http\Controllers\CrudController');

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