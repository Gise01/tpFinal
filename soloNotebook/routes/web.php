<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('layouts/app');
//});

Route::bind('product', function($id){
    return App\Product::find($id);
});

Auth::routes();

Route::get('/cart', 'CartController@show')->name('carrito');
Route::get('/cart/add/{product}', 'CartController@add')->name('agregar');
Route::get('/cart/delete/{product}', 'CartController@delete')->name('eliminar');
Route::get('/cart/remove}', 'CartController@remove')->name('vaciar');
Route::get('/cart/update/', 'CartController@update')->name('update');

Route::get('/', 'IndexController@index')->name('inicio');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('productos');
Route::get('/products/{id}', 'ProductController@show')->name('detalle');