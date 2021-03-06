<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;

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



Route::get('/pay', [PaymentController::class, 'index']);
Route::post('/transaction', [PaymentController::class, 'makePayment'])->name('make-payment');



// Route::get('/', function () {
//     return view('index');
// });

Route::get('/','admin_Controller@index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('pdfview',array('as'=>'pdfview','uses'=>'pdf_Controller@pdfview'));

Route::get('wishlistitemdel/{id}', 'WishlistController@destroy');
Route::get('signup', function () {
    return view('signup');
});

Route::get('logout', function () {

    Session::forget('userid');
    return redirect('login');
});

Route::get('invoice_astext', function () {
    return view('invoice_astext');
});

Route::get('checkout','checkout_Controller@checkout');

// Route::get('search','product_Controller@search');
// Route::get('search','product_Controller@searchbyprice');

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

Route::get('export', 'excel_Controller@export');
// Route::post('adminlogin',['uses' => admin_Controller@login, 'middleware' => 'AuthResource']);

Route::get('tasks', 'admin_Controller@exportCsv');
Route::post('tasks1', 'admin_Controller@csvOfSearched');
Route::post('tasks2', 'admin_Controller@csvOfSearchedByPrice');
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::get('generate-pdf-products', [PDFController::class, 'productspdf']);
// Route::get('generate-pdf-searched', [product_Controller::class, 'search']);
// Route::post('generate-pdf-searched','product_Controller@pdfOfSearched');
// Route::post('generate-pdf-pricefilter','product_Controller@pdfOfPriceFilterSearched');

// Route::post('productbyprice','product_Controller@productbyprice');

// Route::get('pdfy','pdfy_Controller@hello');
Route::post('signed','signup_Controller@signed');
Route::get('allproducts','product_Controller@index');
Route::get('export_as_xls','checkout_Controller@export');
Route::get('showusers','adminpanel_Controller@showusers');
Route::get('/updatecartqty/{id}/{quantity}','cart_Controller@updatecartqty');

Route::get('productbycat/{cat_name}','product_Controller@bycategory');
Route::get('adminpanel','adminpanel_Controller@index');

Route::get('updateproduct/{id}','adminpanel_Controller@updateproduct');
Route::get('showprofile/{id}','adminpanel_Controller@showproduct');
Route::get('deleteproduct/{id}','adminpanel_Controller@delproduct');
Route::get('deleteuser/{id}','adminpanel_Controller@deluser');
Route::post('insertproduct','adminpanel_Controller@addproduct');
Route::post('adminlogin','admin_Controller@login');
Route::post('/adminpanel','adminpanel_Controller@update');
Route::post('submit','signup_Controller@insert');
Route::post('cosubmit','contact_Controller@insert');
Route::post('addtocart','product_Controller@addtocart');
Route::post('addtowishlist','product_Controller@addtowishlist');
Route::post('ordered','checkout_Controller@insert');
Route::get('showcart','product_Controller@showcart');
Route::get('wishlist','WishlistController@showwishlist');
Route::get('removecart/{cartid}','cart_Controller@removecart');

// Route::post('submit', [test::class, 'hello']);

Route::get('login1', function () {
    return view('login');
});


Route::get('/masterheader', function () {
    return view('masterheader');
});

Route::get('/footer', function () {
    return view('footer');
});


// View::composer(['*'], function ($view) {

//     $cartitems = DB::table('carts')
//          ->join('products', 'carts.token', '=', 'products.token')
        
//          ->select('products.product_name', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
//          ->get();    
//     $view->with('cartitems', $cartitems);
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);

    
// });

// Route::resources([
//     'roles' => RoleController::class,
//     'users' => UserController::class,
//     'products' => ProductController::class,
// ]);

// Route::resource('users', UserController::class);
Route::resource('users', 'UserController')->middleware(['auth']);
Route::resource('roles', 'RoleController')->middleware(['auth']);
Route::resource('products', 'ProductController')->middleware(['auth']);
// Route::resource('photos', PhotoController::class);
