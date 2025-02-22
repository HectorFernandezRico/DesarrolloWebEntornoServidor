<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function customer(){
        return $this->belongsTo(Customer::class);
    }
    function pizzas(){
        return $this->belongsToMany(Pizza::class);
    }
}
