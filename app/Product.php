<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'sku', 'price', 'description', 'stock', 'image',
        'brand_id', 'category_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function discount(){
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function carts(){
        return $this->belongsToMany(Cart::class, 'cart_product', 'product_id', 'cart_id');
    }
}


