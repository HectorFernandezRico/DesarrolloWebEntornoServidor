<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    function menu(){
        return view('menu');
    }
}

    function visitas () {
        $lugares = [
            "Madrid" => "Vallecas",
            "Barcelona" => "Llobregat",
            "Extremadura" => "Teruel"
        ];
        return view("visitas", compact($lugares));
    }