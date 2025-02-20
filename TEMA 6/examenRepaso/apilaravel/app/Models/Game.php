<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['genre_id', 'titulo', 'descripcion', 'precio', 'multijugador', 'pegi'];
}
