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

Route::get('/', 'IndexController@index')->name('inicio');

Auth::routes();

Route::get('/brands', 'BrandController@index')->name('marcas');
Route::get('/brands/{id}', 'BrandController@show')->name('marca_productos');

Route::get('/cart', 'CartController@show')->name('carrito');
Route::get('/cart/add/{product}', 'CartController@add')->name('agregar');
Route::get('/cart/delete/{product}', 'CartController@delete')->name('eliminar');
Route::get('/cart/remove}', 'CartController@remove')->name('vaciar');
Route::get('/cart/update/', 'CartController@update')->name('update');
Route::get('/cart/payment/', 'CartController@payment')->name('pago')->middleware('guest');

Route::get('/categories', 'CategoryController@index')->name('categorias');
Route::get('/categories/{id}', 'CategoryController@show')->name('categoria_productos');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('productos');
Route::get('/products/{id}', 'ProductController@show')->name('detalle');

/*
|--------------------------------------------------------------------------
| Rutas de Administrador
|--------------------------------------------------------------------------
|
|
*/
Route::group([
    'prefix'=>'admin', 
    'namespace'=>'Admin', 
    'middleware'=>['auth', 'role:1']], 
    function(){

Route::get('/', 'IndexAdminController@index')->name('inicioadmin');

Route::get('/marcas', 'BrandsAdminController@index')->name('marcasadmin');

Route::get('/categorias', 'CategoriesAdminController@index')->name('categoriasadmin');

Route::get('/productos', 'ProductsAdminController@index')->name('productosadmin');
Route::get('/productos/agregar', 'ProductsAdminController@share')->name('productosadminget');
Route::post('/productos/agregar', 'ProductsAdminController@show')->name('productosadminpost');
Route::get('/productos/borrar/{id}', 'ProductsAdminController@predelete')->name('borrarproductoadminget');
Route::post('/productos/borrar/{id}', 'ProductsAdminController@delete')->name('borrarproductoadminpost');
Route::get('/productos/editar/{id}', 'ProductsAdminController@predit')->name('editarproductoadminget');
Route::post('/productos/editar/{id}', 'ProductsAdminController@edit')->name('editarrproductoadminpost');

});