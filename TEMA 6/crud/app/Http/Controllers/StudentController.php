<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * HOME del crud de estudiantes
     */
    public function home() {
        return view('home');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // OBTENGO TODOS LOS ESTUDIANTES
        $students = Student::all();
        return view('estudiantes', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "AQUI MUESTRO UN FORMULARIO DE ALTA, QUE PARA DAR DE ALTA " . 
        "ENLAZARIA CON LA RUTA DEL ACTION " . route('students.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('fmodificacion');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
