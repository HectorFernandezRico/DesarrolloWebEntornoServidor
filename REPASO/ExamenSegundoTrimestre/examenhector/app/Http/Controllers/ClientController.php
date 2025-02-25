<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function formularioAlta()
    {
return view('formularioAlta');
    }

    public function postear(Request $request)
    {
        $request->validate([
            'razonsocial'=>'required|max:255',
            'pcontacto'=>'required|max:255',
            'telefono'=>'required|max:255',
            'email'=>'required|max:255|email',
            'direccion'=>'required|max:255'

        ]);
    
       $cliente= Client::create($request->all());
        return back()->with('mensaje','Se ha insertado el ciente numero'. $cliente->id );
    }
    public function principal()
    {
        $clientes = Client::orderBy('razonsocial')->get();
        return view('principal', compact('clientes'));
    }

}
