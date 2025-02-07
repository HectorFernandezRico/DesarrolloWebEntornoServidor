<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FormController extends Controller
{
    //Método que muestra el formulario
    public function formulario() {
        return view('formulario');
    }

    //Método que da de alta el post
    public function alta(Request $request) {
        //echo "Autor: " . $request -> autor;
        //echo "<br>Título: " . $request -> titulo;
        //echo "<br>Cuerpo: " . $request -> cuerpo;

        //Validar los datos
            $validated = $request -> validate([
                'titulo' => 'required|max:255',
                'autor' => 'required|max:255'
            ]);
        //Si los ha validado, los grabo
            //Instancio un objeto vacío del modelo Post
            $post = new Post;
            //Relleno los datos con lo que me envió el formulario
            $post -> autor = $request -> autor;
            $post -> titulo = $request -> titulo;
            $post -> cuerpo = $request -> cuerpo;
            //Le digo al modelo que añada el registro de la Base de Datos
            $post -> save();
        //Como hemos entrado con POST, tenemos que redireccionar
        //Además, enviamos un mensaje en la sesión
        return back() -> with('mensaje', 'se ha dado de alta el post ' . $post -> id);

    }
}
