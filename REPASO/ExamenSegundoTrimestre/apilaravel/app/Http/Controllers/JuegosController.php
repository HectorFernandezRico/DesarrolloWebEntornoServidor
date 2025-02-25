<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Exception;
use Illuminate\Http\Request;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::orderBy('created_at')->get();
        return response(json_encode([
            "status" => "1",
            "datos" => $games
        ]), 200, ['Content-Type' => 'application/json; charset=utf-8']);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    //public function create()
    //{
        //
    //}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required',
                'precio' => 'required|numeric',
                'multijugador' => 'required|boolean',
                'pegi' => 'required|in:3,7,12,16,18,!',
                'genre_id' =>'required|integer',
            ]);
            $game = Game::create($request->all());  
            $game->precio = number_format($game->precio, 2);
            return response(json_encode([
                "status" => "1",
                "datos" => $game
            ]), 201, ['Content-Type' => 'application/json; charset=utf-8']);
        } catch (Exception $e) {
            return response(json_encode([
                "status" => "0",
                "error" => $e->getMessage()
            ]), 406, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $game = Game::findOrFail($id); // Intentamos obtener el juego
    
            return response(json_encode([
                "status" => "1",
                "datos" => $game
            ]), 200, ['Content-Type' => 'application/json; charset=utf-8']); 
    
        } catch (Exception $e) {
            return response(json_encode([
                "status" => "0",
                "error" => "No se ha encontrado"
            ]), 404, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    //public function edit(string $id)
    //{
        //
    //}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $game = Game::findOrFail($id);
            $request->validate([
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required',
                'precio' => 'required|numeric',
                'multijugador' => 'required|boolean',
                'pegi' => 'required|in:3,7,12,16,18,!',
                'genre_id' =>'required|integer'
            ]);
            $game->update($request->all());  
            $game->precio = number_format($game->precio, 2);
            return response(json_encode([
                "status" => "1",
                "datos" => $game
            ]), 200, ['Content-Type' => 'application/json; charset=utf-8']);
        } catch (Exception $e) {
            return response(json_encode([
                "status" => "0",
                "error" => $e->getMessage()
            ]), 400, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $game = Game::findOrFail($id);
            $game->delete();
            return response(json_encode([
                "status" => "1",
                "mensaje" => "juego eliminado",
                "datos" => $game
            ]), 200, ['Content-Type' => 'application/json; charset=utf-8']);
        }  catch (Exception $e) {
            return response(json_encode([
                "status" => "0",
                "error" => $e->getMessage()
            ]), 400, ['Content-Type' => 'application/json; charset=utf-8']);
        }
    }
}
