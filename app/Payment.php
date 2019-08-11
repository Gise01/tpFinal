<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'name', 'operation',
    ];

    public function cart(){
        return $this->hasMany(Cart::class, 'payment_id');
    }

}
