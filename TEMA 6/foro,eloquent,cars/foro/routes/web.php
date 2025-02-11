<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//Raiz de mi aplicacion home: Muestra todos los hilos
Route::get('/', [PageController::class, 'home'])->name('home');

//Ruta para mostrar los hilos de una categoria
Route::get('/categoria/{category:slug}', [PageController::class, 'category'])->name('page.category');

//Ruta para mostrar los hilos de una etiqueta
Route::get('/etiqueta/{tag:slug}', [PageController::class, 'tag'])->name('page.tag');

//Ruta para mostrar los datos de un hilo con todos sus comentarios
Route::get('/pregunta/{thread:slug}', [PageController::class, 'thread'])->name('page.thread');

//Ruta para mostrar los hilos de un usuario
Route::get('/users/{user:id}', [PageController::class, 'user'])->name('page.user');

//Ruta para el formulario
Route::get('/formulario', [PageController::class, 'formulario'])->name('nuevohilo');
