<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Obtengo el hilo al que pertenece el comentario this
    function thread() {
        //return $this->belongsTo('App\Models\Thread');
        return $this->belongsTo(Thread::class);
    }

    //Obtengo el usuario al que pertenece el comentario this
    function user() {
        //return $this->belongsTo('App\Models\User');
        return $this->belongsTo(User::class);
    }
}
