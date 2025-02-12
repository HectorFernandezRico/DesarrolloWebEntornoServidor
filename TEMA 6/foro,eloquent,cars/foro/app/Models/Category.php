<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Hago un metodo para obtener todos los hilo de la categoria this
    public function threads() {
        //return $this->hasMany('App\Models\Thread');
        return $this->hasMany(Thread::class);
    }
}
