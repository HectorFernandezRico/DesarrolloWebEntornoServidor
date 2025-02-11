<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class PageController extends Controller
{
    //Metodos de mi aplicacion
    //Metodo del home
    public function home() {
        $threads = Thread::orderby('id','DESC')->paginate();
        return view('home',compact('threads')); //retorna el archivo home.blade.php
    }

    //Metodo de vista de categorias
    public function category(Category $category) {
        $threads = $category->threads;
        return view('category', compact('category', 'threads'));
    }

    //Metodo de vista de etiquetas
    public function tag(Tag $tag) {
        $threads = $tag->threads;
        return view('tag', compact('tag','threads'));
    }

    //Metodo que muestra datos de un hilo
    public function thread(Thread $thread) {
        return view('thread', compact('thread'));
    }

    //Metodo que muestra los hilos de un usuario
    public function user(User $user) {
        $threads = $user->threads;
        return view('user', compact('threads', 'user'));
    }

    public function formulario(){
        $user = User::all();
        $category = Category::all();
        return view('formulario', compact('category','user'));
    }
}
