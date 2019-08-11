<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;
use App\Discount;

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
        $categories = Category::all();
        $brands = Brand::all();
        $discounts = Discount::all();
       
        return view('admin.addproduct', compact('categories', 'brands', 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $reglas = [
            'name' => 'string|required',
            'sku' => 'string|required|unique:products,sku',
            'price' => 'numeric|required|min:0',
            'description' => 'string|nullable',
            'stock' => 'numeric|required',
            'image' => 'image|required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'discount_id' => 'required',
        ];

        $mensaje = [
            'string' => 'El campo :attribute debe ser un texto',
            'required' => 'El campo :attribute debe es requerido',
            'unique' => 'El campo :attribute se encuentra repetido',
            'numeric' => 'El campo :attribute debe ser un numero',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'image' => 'El campo :attribute solo acepta formatos jpeg, png, bmp, gif, svg, o webp',
        ];
        
        $this->validate($request, $reglas, $mensaje);
        
        $product = new Product();
        $product->name = $request['name'];
        $product->sku = $request['sku'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->stock = $request['stock'];
        $product->image = $request->file('image')->store('public/products');
        $product->category_id = $request['category_id'];
        $product->brand_id = $request['brand_id'];
        $product->discount_id = $request['discount_id'];
        
        $product->save();
        return redirect('admin/productos');
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

        return redirect('admin/productos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function predit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $discounts = Discount::all();
        
        return view('admin.editproductadmin', compact('product', 'categories', 'brands', 'discounts'));
    }
    
     public function edit(Request $request, $id)
    {
        $reglas = [
            'name' => 'string|required',
            'sku' => 'string|required|unique:products,sku',
            'price' => 'numeric|required|min:0',
            'description' => 'string|nullable',
            'stock' => 'numeric|required',
            'image' => 'image|nullable',
            'category_id' => 'nullable',
            'brand_id' => 'nullable',
            'discount_id' => 'nullable',
        ];

        $mensaje = [
            'string' => 'El campo :attribute debe ser un texto',
            'required' => 'El campo :attribute debe es requerido',
            'unique' => 'El campo :attribute se encuentra repetido',
            'numeric' => 'El campo :attribute debe ser un numero',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'image' => 'El campo :attribute solo acepta formatos jpeg, png, bmp, gif, svg, o webp',
        ];
        
        $this->validate($request, $reglas, $mensaje);
        
        $product = Product::find($id);
       
        $product->name = $request['name'];
        $product->sku = $request['sku'];
        $product->price = $request['price'];
        $product->description = $request['description'];
        $product->stock = $request['stock'];
        $product->category_id = $request['category_id'];
        $product->brand_id = $request['brand_id'];
        $product->discount_id = $request['discount_id'];

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('public/products');
        }

        $product->save();
        return redirect('admin/productos');
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
