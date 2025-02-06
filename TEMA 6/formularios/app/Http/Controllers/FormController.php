<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //Método que muestra el formulario
    public function formulario() {
        return view('formulario');
    }

    //Método que da de alta el post
    public function alta(Request $request) {
        echo "Autor: " . $request -> autor;
        echo "<br>Título: " . $request -> titulo;
        echo "<br>Cuerpo: " . $request -> cuerpo;

    }
}
