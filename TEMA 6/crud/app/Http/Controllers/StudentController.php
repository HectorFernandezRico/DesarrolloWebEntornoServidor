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
        // Recupero el estudiante
        $student = Student::findOrFail($id);
        return view('fmodificacion', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valido los datos 
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'nota' => 'required|between:0,2'
            
        ]);

        // Guardo el registro
        $student = Student::findOrFail($id);
        $student->nombre = $request->nombre;
        $student->nota = $request->nota;
        $student->save();

        //Redirecciono a la vista de estudiantes
        return back() -> with('mensaje', 'Estudiante ' . $student -> id . ' modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Realizo la acción del post (laravel entiende que es un put)
        $student = Student::findOrFail($id);
        $student->delete();

        // Redirecciono a la vista de estudiantes
        return back() -> with('mensaje', 'Estudiante ' . $id . ' eliminado con exito');
    }
}
