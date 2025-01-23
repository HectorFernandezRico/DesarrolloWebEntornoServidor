<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Aqui ponemos los métodos que se invocarán en cada una de las rutas.
    public function miMetodo ($parametro) {
        echo "Me han llamado con un parámetro $parametro";
    }

    public function sinManos ($mira, $mama) {
        echo "Mira mama sin la mano $mira y sin la $mama";
    }

    //Método Bienvenido
    public function bienvenido () {
        return view('bienvenida');
    }

    //Método Contacto
    public function contacto () {
        $contactos = ['Pedro', 'Carlos', 'Juan', 'Nacho', 'Silvia'];
        return view('contacto', compact('contactos'));
    }

    //Método MuestraPost
    public function muestraPost ($id) {
        //Después de acceder a BD
        $titulo = "Conejo";
        $tematica = "Cocina";
        $autor = "Arguillano";
        $mensaje = "El que le gusta al conejo es el dedo corazon y el anular.";
        //return view('post') -> with('id', $id);
        return view('post', compact('id', 'titulo', 'tematica', 'autor', 'mensaje'));
    }

    //Método muestra_ciudad
    public function muestra_ciudad ($pais, $provincia, $ciudad){
        return view('ciudad', compact('pais', 'provincia', 'ciudad'));
    }
}
