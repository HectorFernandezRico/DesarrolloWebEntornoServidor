<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientController extends Controller
{
    //
    public function formularioAlta () {
        return view('formularioAlta');
    }

    public function grabarCliente (Request $request) {
        $request->validate([
            'razonsocial' => 'required|max:255',
            'pcontacto' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|max:255|email',
            'direccion' => 'required|max:255'
        ]);
        $cliente = Clients::create($request->all());
        return back()->with('mensaje', 'Se ha insertado el cliente numero' . $cliente->id);
    }

    public function principal () {
        $clientes = Clients::orderBy('razonsocial')->get();
        return view('principal', compact('clientes'));
    }

}
