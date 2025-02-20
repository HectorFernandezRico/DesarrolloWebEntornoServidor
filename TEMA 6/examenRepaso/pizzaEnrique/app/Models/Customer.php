<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email'];
    function orders(){
        return $this->hasMany(Order::class);
    }
}
