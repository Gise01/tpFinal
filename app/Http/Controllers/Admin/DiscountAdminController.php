<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Discount;

class DiscountAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discountsadmin', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function share()
    {
        return view('admin.adddiscount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $discount = new Discount();
        $discount->name = $request['name'];
        $discount->value = $request['value']; 
        $discount->description = $request['description'];
                        
        $discount->save();
        return redirect('admin/descuentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function predit($id)
    {
        $discount = Discount::find($id);
        return view('admin.editdiscountadmin', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $discount = Discount::find($id);
       
        $discount->name = $request['name'];
        $discount->value = $request['value']; 
        $discount->description = $request['description'];
        
        $discount->save();
        return redirect('admin/descuentos');
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
        $discount = Discount::find($id);
        return view('admin.deldiscountadmin', compact('discount'));
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
        $discount = Discount::find($id);
        $discount->delete();

        return redirect('admin/descuentos');
    }
}

