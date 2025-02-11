<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes; //siempre para poder usar el softDeletes

    // Atributo protegido llamado fillable para CREATE y para UPDATE en web.php
    protected $fillable = ['titulo', 'contenido'];

    //Programo un metodo que recupere el usuario del post this
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
