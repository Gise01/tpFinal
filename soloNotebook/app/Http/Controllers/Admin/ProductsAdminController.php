<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        return view('admin.productsadmin', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function share()
    {
        return view('admin.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $producto = new Product();
        $producto->name = $request['name'];
        $producto->sku = $request['sku'];
        $producto->price = $request['price'];
        $producto->description = $request['description'];
        $producto->stock = $request['stock'];
        $producto->image = $request[''];
        $producto->category = $request['category'];
        $producto->brand = $request['brand'];

        $producto->save();
        return redirect('productosadmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function predelete($id)
    {
        $product = Product::find($id);
        return view('admin.delproductadmin', compact('product'));
        
    }
    
    public function delete(Request $request)
    {
        $id = $request['id'];
        $producto = Product::find($id);
        $producto->delete();

        return redirect('productosadmin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function predelete($id)
    {
        $product = Product::find($id);
        return view('admin.editproductadmin', compact('product'));
        
    }
    
     public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
