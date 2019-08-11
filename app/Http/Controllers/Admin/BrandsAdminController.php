<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;

class BrandsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(9);
        return view('admin.brandsadmin', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function share()
    {
        return view('admin.addbrand');
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
            'description' => 'string|nullable',
            'image' => 'image|required',
        ];

        $mensaje = [
            'string' => 'El campo :attribute debe ser un texto',
            'required' => 'El campo :attribute debe es requerido',
            'image' => 'El campo :attribute solo acepta formatos jpeg, png, bmp, gif, svg, o webp',
        ];
        
        $this->validate($request, $reglas, $mensaje);
        
        $brand = new Brand();
        $brand->name = $request['name'];
        $brand->description = $request['description'];
        $brand->image = $request->file('image')->store('public/brands');
                
        $brand->save();
        return redirect('admin/marcas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function predit($id)
    {
        $brand = Brand::find($id);
        return view('admin.editbrandadmin', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $brand = Brand::find($id);
        
        $reglas = [
            'name' => 'string|required',
            'description' => 'string|nullable',
            'image' => 'image|nullable',
        ];

        $mensaje = [
            'string' => 'El campo :attribute debe ser un texto',
            'required' => 'El campo :attribute debe es requerido',
            'image' => 'El campo :attribute solo acepta formatos jpeg, png, bmp, gif, svg, o webp',
        ];
        
        $this->validate($request, $reglas, $mensaje);
        
               
        $brand->name = $request['name'];
        $brand->description = $request['description'];
        
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('public/products');
        }
        
        $brand->save();
        return redirect('admin/marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function predelete($id)
    {
        $brand = Brand::find($id);
        return view('admin.delbrandadmin', compact('brand'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request['id'];
        $brand = Brand::find($id);
        $brand->delete();

        return redirect('admin/marcas');
    }
}