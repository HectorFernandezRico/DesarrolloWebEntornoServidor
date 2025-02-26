<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio'];
    function orders(){
        return $this->belongsToMany(Order::class);
    }
}
