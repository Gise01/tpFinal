<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'sku', 'price', 'description', 'stock', 'image',
        'brand_id', 'category_id',
    ];
}
