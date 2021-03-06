<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Brand;
use App\Discount;

class CategoriesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(9);
        return view('admin.categoriesadmin', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function share()
    {
        return view('admin.addcategory');
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
        
        $category = new Category();
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->image = $request->file('image')->store('public/categories');
                
        $category->save();
        return redirect('admin/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function predit($id)
    {
        $category = Category::find($id);
        return view('admin.editcategoryadmin', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
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
        
        $category = Category::find($id);
       
        $category->name = $request['name'];
        $category->description = $request['description'];

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('public/categories');
        }
        
        $category->save();
        return redirect('admin/categorias');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function predelete($id)
    {
        $category = Category::find($id);
        return view('admin.delcategoryadmin', compact('category'));
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
        $category = Category::find($id);
        $category->delete();

        return redirect('admin/categorias');
    }
}
