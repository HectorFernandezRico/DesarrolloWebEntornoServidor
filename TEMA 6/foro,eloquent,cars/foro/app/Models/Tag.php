<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function threads() {
        //return $this->hasMany('App\Models\Thread');
        return $this->belongsToMany(Thread::class);
    }
}
