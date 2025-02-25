<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    // OCULTAR VARIABLES EN EL JSON

    protected $fillable = ['titulo', 'descripcion', 'precio', 'multijugador', 'pegi', 'genre_id'];
    protected $hidden = ['created_at', 'updated_at'];
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
