<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        //
        echo "Este método muestra los recursos.";
    }

    /**
     * Show the form for creating a new resource. GET
     */
    public function create()
    {
        //
        echo "Este método es para aplicaciones web, muestra un formulario de alta.";
    }

    /**
     * Store a newly created resource in storage. POST
     */
    public function store(Request $request)
    {
        //
        echo "Este si graba los datos en el create.";
    }

    /**
     * Display the specified resource. /cars/1 => GET
     */
    public function show(string $id)
    {
        //Mostrará los datos ddel recurso cuyo código es $id.
    }

    /**
     * Show the form for editing the specified resource. GET
     */
    public function edit(string $id)
    {
        //Formulario de modificación
        echo "Esto es desde edit";
    }

    /**
     * Update the specified resource in storage. PUT
     */
    public function update(Request $request, string $id)
    {
        //Modifica los datos en BD con lo que le pasa el formulario de edit
    }

    /**
     * Remove the specified resource from storage. DELETE
     */
    public function destroy(string $id)
    {
        //Elimina un recurso, el de codigo $id
    }
}
