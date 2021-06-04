<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\orders;

use Illuminate\Http\Request;

class checkout_Controller extends Controller
{
    function checkout(Request $req)
    {
        $userid = $req->session()->get('userid');
        $cartitems = DB::table('carts')
            ->join('products', 'carts.token', '=', 'products.token')
            ->where('carts.userid',$userid)
            
            ->select('products.product_name','products.token', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
            ->get();


            return view('checkout',['cartitems'=>$cartitems]);


    }


    function insert(Request $request)
    {
        // $email = $request->input('email') ;
        $address = $request->input('address');
        $email = $request->input('email');
        $name = $request->input('name');
        $state = $request->input('state');
        $city = $request->input('city');
        $zip = $request->input('zip');
        $userid = $request->session()->get('userid');

    $query=DB::table('orders')->insert(
    [
        'name'=> $request->input('name'),
        'email'=> $request->input('email'),
        'address'=> $request->input('address'),
        'state'=> $request->input('state'),
        'city'=> $request->input('city'),
        'zip'=> $request->input('zip'),
        'userid'=> $userid,

    ]);

    if($query)
    {
   
        // $ret= redirect('invoice_astext')->with('status', 'Your Order Has Been Succcessfully Recorded.'); 
        // return $ret;
        
        
        $userid = $request->session()->get('userid');
        $cartitems = DB::table('carts')
            ->join('products', 'carts.token', '=', 'products.token')
            ->where('carts.userid',$userid)
            
            ->select('products.product_name','products.token', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
            ->get();

        // if($cartitems)
        // {
        //     $orders = DB::table('orders')
        //     ->select('address')
        //     ->where('email','=', $email)
        //     ->first();


        return view('invoice_astext',['cartitems'=>$cartitems])->with(['address'=>$address,'name'=>$name,'email'=>$email,'state'=>$state,'city'=>$city,'zip'=>$zip]);

    }
    }
    }


    function export()
    {

    }


