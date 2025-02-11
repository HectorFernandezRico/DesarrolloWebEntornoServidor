<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //Metodo que recupera la categoria del hilo
    function category() {
        //return $this->belongsTo('App\Models\Category');
        return $this->belongsTo(Category::class);
    }
    //Obtengo el usuario 
    function user() {
        //return $this->belongsTo('App\Models\User');
        return $this->belongsTo(User::class);
    }

    //Obtengo los comentarios del hilo this
    public function comments() {
        //return $this->hasMany('App\Models\Comment');
        return $this->hasMany(Comment::class);
    }
    
    //Obtengo todas las etiquetas que tiene el hilo this
    public function tags() {
        //return $this->hasMany('App\Models\Tag');
        return $this->belongsToMany(Tag::class);
    }
    
}
