<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::orderBy('created_at', 'desc')->get();
        return [
            'status' => '1',
            'games' => $games
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    
    //public function create()
    //{
        
    //}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'multijugador' => 'required|boolean',
            'pegi' => 'required|in:3,7,12,16,18,"!"',
            'genre_id' => 'required|exists:genres,id'
        ]);

        if ($validator->fails()) {
            // Si la validación falla, retornar un error con los detalles
            return response()->json([
                'status' => '0',
                'message' => $validator->errors()
            ], 400);
        }

        // Verificar si el género existe
        try {
            $genre = Genre::findOrFail($request->genre_id);
        } catch (ModelNotFoundException $e) {
            // Capturar el error y retornar el mensaje de error completo
            return response()->json([
                'status' => '0',
                'message' => 'Género no encontrado: ' . $e->getMessage()
            ], 404);
        }


        // Si el género existe, creamos el juego
        $game = Game::create($request->all());
        $game->precio = number_format($game->precio, 2);

        // Retornar la respuesta con el juego creado
        return response()->json([
            'status' => '1',
            'game' => $game
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $game = Game::findOrFail($id);
        return [
            'status' => '1',
            'games' => $game
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    // public function edit(string $id)
    //{
        //
    //}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => '0',
                'message' => 'Game no encontrado: ' . $e->getMessage()
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'multijugador' => 'required|boolean',
            'pegi' => 'required|in:3,7,12,16,18,"!"',
            'genre_id' => 'required|exists:genres,id'
        ]);

        if ($validator->fails()) {
            // Si la validación falla, retornar un error con los detalles
            return response()->json([
                'status' => '0',
                'message' => $validator->errors()
            ], 400);
        }

        $game->update($request->all());
        $game->precio = number_format($game->precio, 2);
        return response()->json([
            'status' => '1',
            'game' => $game
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $game = Game::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => '0',
                'message' => 'Game no encontrado: ' . $e->getMessage()
            ], 404);
        }
        $game->delete();
        return [
            'status' => '1',
            'message' => 'Juego eliminado',
            'game' => $game
        ];
    }
}
