<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

//Raiz de mi aplicacion
Route::get('/', [PageController::class, 'home'])->name('home');

//Ruta para mostrar los hilos de una categoria
Route::get('/categoria/{category:slug}', [PageController::class, 'category'])->name('page.category');

//Ruta para mostrar los hilos de una etiqueta
Route::get('/etiqueta/{tag:slug}', [PageController::class, 'tag'])->name('page.tag');

//Ruta para mostrar los datos de un hilo con todos sus comentario
Route::get('/pregunta/{thread:slug}', [PageController::class, 'thread'])->name('page.thread');

//Ruta para mostrar todos los hilos de un usuario
Route::get('/hilos/{user:id}', [PageController::class, 'user'])->name('page.user');

//Ruta de un formulario para añadir un hilo
Route::get('/form', [PageController::class, 'form'])->name('page.form');
Route::post('/addThread', [PageController::class, 'addThread'])->name('add');
