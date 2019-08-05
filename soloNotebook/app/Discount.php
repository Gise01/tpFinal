<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name', 'value', 'description',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'discount_id');
    }
}
