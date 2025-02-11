<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;

// Route::get('/', function () {
//     return view('welcome');
// });

//Leyendo datos
Route::get('/recuperar', function() {
    $posts = Post::all(); //Recupera todos los registros de esa tabla
    return $posts;
    // foreach ($posts as $post) {
    //     echo $post->titulo . 'Contenido: ' . $post->contenido . "<br>";
    // }
});

//Leyendo un registro concreto
Route::get('/solouno/{id}', function($id) {
//$post = Post::find($id);
//return $post;
$post = Post::findOrFail($id); //Leyendo un registro concreto sin fallar
return $post->titulo;
});

//Leyendo registros con where, orderby
Route::get('/algunos', function() {
    $posts = Post::where('id','<','2') //los id menores de 2
    ->orderByDesc('titulo') //ordenar por titulo
    ->take(1)->get();  //da 1 ids
    return $posts; 
});

//Leyendo registros con firstoffail
Route::get('/unodevarios', function() {
    $posts = Post::where('titulo', '=', 'Cenas')
    ->firstorfail();
    return $posts;
});

//Insertando datos
Route::get('/basicinsert', function() {
//instancio un objeto
    $post = new Post;
    //Pongo los datos que quiero insertar en los atributos correspondiente
    $post->titulo = "Aperitivo";
    $post->contenido = "Aceitunas con patatas fritas";
    //Guardo los datos en mi BD fisica
    $post->save();
    //Inidico el registro guardado
    return "Se ha insertado el registro numero: " . $post->id;
});

//Haciendo update en la BD
Route::get('/basicupdate/{id}', function($id){
    //Recupero los datos del registro en un objeto de la clase Post
    $post = Post::findOrFail($id);
    //Mosifico los datos que quiera
    $post->titulo = "NUEVO TITULO";
    //Guardo los datos en la tabla
    $post->save();
    return "He modificado el registro numero $id";
});

//Insertando datos con CREATE
Route::get('/create', function() {
    Post::create([
        'titulo' => "TITULO CREATE",
        'contenido' => 'CONTENIDO CREATE'
    ]);
});

//Modificar datos con UPDATE
Route::get('/update', function() {
    Post::where('id', '>', '3')
    ->update([
        'titulo' => 'DESAYUNO'
    ]);
});

//Eliminando registros
Route::get('/delete/{id}', function($id){
    //Obtengo los datos del post que quiero borrar
    $post = Post::findOrFail($id);
    //Elimino el registro
    $post->delete();
    //Lo indico
    return "Se ha eliminado el registro numero: $id";
});

//Eliminacion con destroy
Route::get('/destroy', function(){
       Post::destroy([2,3]);
       return "Se han eliminado los registros 3 y 4";
});

//Recuperar todos los registros
Route::get('/mostrartodos', function(){
    $posts = Post::all();
    return $posts;
});

//Recuperar todos los registros, borrados y no borrados
Route::get('/mostrartodostambienborrados', function(){
    $posts = Post::withTrashed()->get();
    return $posts;
});

//Recuperar todos los registros borrados
Route::get('/mostrarsoloborrados', function(){
    $posts = Post::onlyTrashed()->get();
    return $posts;
});

//Recuperar un registro borrado
Route::get('/recupera/{id}', function($id) {
    Post::withTrashed()->where('id',$id)->restore();
    return "Registro $id restaurado";
});

//Fuerzo la eliminacion fisica del registro
Route::get('/forzar/{$id}', function($id){
    Post::withTrashed()->where('id',$id)->forceDelete();
    return "He forzado la eliminacion fisica del registro $id";
});

//Ruta para recuperar el usuario unico de un post
Route::get('/posts/{id}/user', function($id) {
    //recupero el id del post
    $post = Post::findOrFail($id);
    //obtengo el usuario de ese post
    return $post->user;
});

//Ruta para recuperar el post de un usuario
Route::get('/users/{id}/post', function($id) {
    $user = User::findOrFail($id);
    //Utilizo el metodo de User que he programado 
    return $user->posts;
});

//Obtengo los usuarios de un rol
Route::get('/roles/{id}/users', function($id){
    //Obtengo los datos del rol id
    $rol = Role::findOrFail($id);
    //Obtengo todos los usuarios del rol obtenido
return $rol->users;
});

//Obtengo los roles de un usuario
Route::get('/users/{id}/roles', function($id){
    //Obtengo los datos del usuario indicado en el id
    $user = User::findOrFail($id);
    //Obtengo todos los usuarios del rol obtenido
return $user->roles;
});


