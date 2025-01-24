<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('APLICACIÓN');
});

//INSETS
Route::get('/posts/insert', function () {
    DB::insert('insert into posts (titulo, autor, cuerpo) values (?,?,?)',
    ['Tortilla de Patata', 'Héctor', 'Fantástica cena típica de España']);
    return 'Post insertado';
});

Route::get('/posts/read', function () {
    $resultado = DB::select('select * from posts');
    return $resultado;
});

//SELECT
Route::get('/posts/read/{id}', function ($id) {
    $resultado = DB::select('select * from posts where id = ?', [$id]);
    //echo "<pre>";
    //print_r($resultado);
    //echo "</pre>";
    return $resultado;
});

//UPDATE
Route::get('/posts/update/{id}', function ($id) {
    DB::update('update posts set titulo = ? where id = ?', 
    ['TITULO NUEVO', $id]);
    return 'Registro $id actualizado';
});

//DELETE
Route::get('/posts/delete{id}', function ($id) {
    DB::delete('delete posts where id = ?', [$id]);
    return 'Se ha eliminado el registro $id, se han eliminado $deleted registros';
});