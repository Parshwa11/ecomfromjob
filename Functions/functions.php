<?php

namespace App\Functions;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\carts;
use Illuminate\Http\Request;


// function showcart()
//     {
        // $cartitems = DB::table('carts')
        //     ->join('products', 'carts.token', '=', 'products.token')
            
        //     ->select('products.product_name', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
        //     ->get();


        //      return (['cartitems'=>$cartitems]);
        // echo "hello";
        // $var_controller = showcart();



  
    // }