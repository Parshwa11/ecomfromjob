<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\DB;


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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/','admin_Controller@index');



Route::get('signup', function () {
    return view('signup');
});

Route::get('checkout', function () {
    return view('checkout');
});

Route::get('search','product_Controller@search');

Route::get('contact', function () {
    return view('contact');
});

Route::get('about', function () {
    return view('about');
});

Route::get('admin', function () {
    return view('admin');
});

Route::get('addproduct', function () {
    return view('addproduct');
});


Route::get('products','product_Controller@index');

Route::get('productbycat/{cat_name}','product_Controller@bycategory');
Route::get('adminpanel','adminpanel_Controller@index');

Route::get('updateproduct/{id}','adminpanel_Controller@updateproduct');
Route::get('showprofile/{id}','adminpanel_Controller@showproduct');
Route::get('deleteproduct/{id}','adminpanel_Controller@delproduct');
Route::post('insertproduct','adminpanel_Controller@addproduct');
Route::post('adminlogin','admin_Controller@login');
Route::post('/adminpanel','adminpanel_Controller@update');
Route::post('submit','signup_Controller@insert');
Route::post('cosubmit','contact_Controller@insert');
Route::post('addtocart','product_Controller@addtocart');
// Route::post('add_to_cart_from_catview','product_Controller@addtocart');
Route::get('showcart','product_Controller@showcart');
Route::get('removecart/{cartid}','cart_Controller@removecart');

// Route::post('submit', [test::class, 'hello']);

Route::get('/login', function () {
    return view('login');
});



// View::composer(['*'], function ($view) {

//     $cartitems = DB::table('carts')
//          ->join('products', 'carts.token', '=', 'products.token')
        
//          ->select('products.product_name', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
//          ->get();    
//     $view->with('cartitems', $cartitems);
// });