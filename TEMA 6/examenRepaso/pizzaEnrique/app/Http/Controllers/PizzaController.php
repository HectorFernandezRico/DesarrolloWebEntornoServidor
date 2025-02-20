<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::paginate(10);
        return view('pizzas', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearpizza');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'bail|required|max:255',
                'descripcion' => 'bail|required|string',
                'precio' => 'bail|required|numeric|max:50'
            ]);
        } catch (\Illuminate\Validation\ValidationException $ex) {
            return $ex->validator->errors();
        }
        $pizza = Pizza::create($request->all());
        return redirect()->route('pizzas.index')->with('mensaje', 'La pizza ' . $pizza->id . ' ha sido añadida con éxito.');
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
        $pizza = Pizza::findOrFail($id);
        return view('editpizza', compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pizza = Pizza::findOrFail($id);
        try {
            $request->validate([
                'nombre' => 'bail|required|max:255',
                'descripcion' => 'bail|required|string',
                'precio' => 'bail|required|numeric|max:50'
            ]);
        } catch (\Illuminate\Validation\ValidationException $ex) {
            return $ex->validator->errors();
        }
        $pizza->update($request->all());
        return redirect()->route('pizzas.index')->with('mensaje', 'La pizza ' . $id . ' ha sido modifcado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();
        return back()->with('mensaje', 'La pizza ' . $id . ' ha sido eliminada con éxito.');
    }
}
