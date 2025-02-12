<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //Los metodos de mi aplicación

    public function home() {
        $threads = Thread::orderBy('id', 'DESC')->paginate();
        return view('home', compact('threads'));
    }

    public function category(Category $category) {
        $threads = $category->threads;
        return view('category', compact('category', 'threads'));
    }

    public function tag(Tag $tag) {
        $threads = $tag->threads;
        return view('tag', compact('tag', 'threads'));
    }

    public function thread(Thread $thread) {
        return view('thread', compact('thread'));
    }

    public function user(User $user) {
        $threads = $user->threads;
        return view('user', compact('user', 'threads'));
    }

    public function form() {
        //Recogemos los datos de la tabla categories
        $categorias = Category::all();
        //Recogemos los datos de la tabla users
        $usuarios = User::all();
        //Retornamos la vista form con las dos variables anteriores
        return view('form', compact('categorias', 'usuarios'));
    }

    public function addThread(Request $request) {
        //Validamos los datos
        $validated = $request->validate([
            'category_id' => 'required',
            'user_id' => 'required',
            'titulo' => 'bail|required|max:255',
            'slug' => 'bail|required|max:255|unique:threads',
            'body' => 'required'
        ]);

        echo $request;

        //Gurdamos los datos del formulario
        $thread = new Thread();
            //Rellenamos el hilo con los datos del formulario
            $thread->titulo = $request->titulo;
            $thread->slug = $request->slug;
            $thread->body = $request->body;
            $thread->category_id = $request->categoria;
            $thread->user_id = $request->usuario;
        //Guardamos el hilo en la base de datos
        $thread->save();

        //Redirreccionamos al entrar con POST
        return back()->with('mensaje'. 'Se ha añadido el hilo' . $thread->id);
        //return back()->withInput();
    }
}
