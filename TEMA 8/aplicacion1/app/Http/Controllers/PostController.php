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
}
