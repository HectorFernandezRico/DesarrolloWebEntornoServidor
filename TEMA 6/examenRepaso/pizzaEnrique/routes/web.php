<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

Route::resource("/clientes", CustomerController::class);
Route::resource("/pizzas", PizzaController::class);
Route::get("/clientes/{customer:id}/delete", [CustomerController::class,'confirmar_borrado'])->name('clientes.delete');
Route::get('/pedidos/{customer:id}', [CustomerController::class,'gestionar_pedidos'])->name('clientes.pedidos');