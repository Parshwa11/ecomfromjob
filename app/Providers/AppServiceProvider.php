<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
            Paginator::useBootstrap();

            // $cartitems = DB::table('carts')
            // ->join('products', 'carts.token', '=', 'products.token')
            
            // ->select('products.product_name', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
            // ->get();

            // view::share('cartitems',$cartitems);

            // View::composer([])


        
    }
}
