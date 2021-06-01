<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\carts;
use Illuminate\Http\Request;


class product_Controller extends Controller
{
    // return product::all();
    function index()
    {
        $cat = DB::select('select * from categories');
     

        $data=products::paginate(5);
        return view('products',['products'=>$data],['cat'=>$cat]);
        // return view('adminpanel',['products'=>$data]);
    }

    function search(Request $req)
    {
        $data= Products::
        where('product_name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }

    function bycategory(Request $req,$cat_name)
    {
        

        $cato = DB::table('products')
                ->where('category', '=', $cat_name)
                ->get();
        // $cat = products::where('category',$cat_name);
        return view('sortedbycategory',['productbycat'=>$cato]);
    }

    function addtocart(Request $req)
    {
        
        $cart=new carts;
        $cart->token=$req->token;
        $cart->save();

        return redirect('adminpanel');
    }

    static function cartitem()
    {
        return DB::table('carts')->count();   
    }

    static function cartitemtotal()
    {
  
        return DB::table('carts')->sum('price');
    }

    function showcart()
    {
        $cartitems = DB::table('carts')
            ->join('products', 'carts.token', '=', 'products.token')
            
            ->select('products.product_name', 'products.price', 'products.id','products.description','products.image')
            ->get();

            return view('showcart',['cartitems'=>$cartitems]);
    }
}
