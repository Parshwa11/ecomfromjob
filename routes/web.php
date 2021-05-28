<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('signup', function () {
    return view('signup');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('about', function () {
    return view('about');
});

Route::get('admin', function () {
    return view('admin');
});

// Route::get('adminpanel', function () {
//     return view('adminpanel');
// });


Route::get('products','product_Controller@index');
Route::get('adminpanel','adminpanel_Controller@index');

Route::post('adminlogin','admin_Controller@login');
Route::post('submit','signup_Controller@insert');
Route::post('cosubmit','contact_Controller@insert');

// Route::post('submit', [test::class, 'hello']);

Route::get('/login', function () {
    return view('login');
});