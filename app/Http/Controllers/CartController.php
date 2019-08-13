<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        if(!Session::has('cart')) Session::put('cart', array());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $cart = Session::get('cart');
        $total = $this->total(); 
        return view('tienda.cart', compact('cart', 'total'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Product $product)
    {
        $cart = Session::get('cart');
        $product->quantity = 1;
        $cart[$product->id] = $product;
        Session::put('cart', $cart);

        return redirect()->route('carrito');
    }

    public function delete (Product $product)
    {
        $cart = Session::get('cart');
        unset($cart[$product->id]);
        Session::put('cart', $cart);

        return redirect()->route('carrito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, $quantity)
    {       
        $cart = Session::get('cart');
        ($cart[$product->id])->quantity = $quantity;
        Session::put('cart', $cart);
        dd($cart, $product, $quantity);
        return redirect()->route('carrito');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function total()
    {
        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $item){
            $total += $item->price * $item->quantity;
        };
        
        return $total;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove()
    {
        Session::forget('cart');
        
        return redirect()->route('carrito');
    }
}
