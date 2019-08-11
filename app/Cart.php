<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'total', 'discount_id',
    ];

    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function discount(){
        return $this->belongsTo(Discount::class, 'discount_id');
    }
    
    public function products(){
        return $this->belongsToMany(Product::class, 'cart_product', 'cart_id', 'product_id');
    }
