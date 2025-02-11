<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Programo un metodo que obtenga todos los usuarios con el rol this
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
