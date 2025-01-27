<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    function formulario(){
        return view('inscripcion');
    }
}
