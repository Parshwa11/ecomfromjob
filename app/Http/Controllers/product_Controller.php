<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\carts;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Functions\functions;
use Illuminate\Support\Facades\Session;



class product_Controller extends Controller
{
    // return product::all();

//     function __construct(Request $req) {
//         global $c;
//        $c=$req->input('query');
//   }


function index()
{
    $cat = DB::select('select * from categories');
    // $searched="hello";

    // $data=products::paginate(5);
    $data=Product::all();
    return view('products',['products'=>$data],['cat'=>$cat]);
    // return view('adminpanel',['products'=>$data]);
    // ->with(['searched'=>$searched])
}

function search(Request $req)
{
    $searched=$req->input('query');
    $data= Product::
    where('product_name', 'like', '%'.$req->input('query').'%')
    ->orWhere('description','LIKE','%'.$req->input('query').'%')
    ->get();
    return view('search',['products'=>$data])->with(['searched'=>$searched]);


    // view()->share('data',$data);   
    // $pdf = PDF::loadView('searchedpdf',$data);
    

    // return $pdf->download('searchedpdf_file.pdf');

}

    function pdfOfSearched(Request $req)
    {

        // $searched = $req->query;
        
        $searched=$req->input('searchedq');
        $data= Product::
        where('product_name', 'like', '%'. $searched .'%')
        ->orWhere('description','LIKE','%'. $searched .'%')
        ->get();
       view()->share('data',$data);   
        $pdf = PDF::loadView('searchedpdf',$data);
        
    
        return $pdf->download('searchedpdf_file.pdf');
    }

  

    function pdfOfPriceFilterSearched(Request $req)
    {
        $start=$req->input('starts');
        $end=$req->input('ends');

        $data = Product::whereBetween('price',[$start,$end])->get();

        view()->share('data',$data);   
        $pdf = PDF::loadView('pdfofpricefiltered',$data);
        
    
        return $pdf->download('pdfofpricefilteredpdf_file.pdf');

    }

    function productbyprice(Request $req)
    {
        $start=$req->input('start');
        $end=$req->input('end');

        $products = Product::whereBetween('price',[$start,$end])->get();
        return view('productbyprice',['products'=>$products])->with(['start'=>$start,'end'=>$end]);

    }

    

    // function searchbyprice(Request $req)
    // {
    //     $data= Products::
    //     where('price', 'like', '%'.$req->input('query').'%')
    //     ->orWhere('description','LIKE','%'.$req->input('query').'%')
    //     ->get();
    //     return view('search',['products'=>$data]);
    // }
    
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

            // $cartitemexist= DB::table('carts')
            // ->where('userid',$userid)
            // ->where('token',$req->token)
            // ->count();
            
            


        // $userid = $req->session()->get('userid');
        // if( $req->session()->get('userid'))
        if (Auth::user()) 
        {
            $id=Auth::id();
            // dd($id);
            $cartitemexist= DB::table('carts')
            ->where('userid',$id)
            ->where('token',$req->token)
            ->count();

            if($cartitemexist>0)
            {
                return redirect('allproducts')->with('alreadyexist', 'Item Already Exist In Cart.');
            }

            else{

                $cart=new carts;
                $cart->token=$req->token;
                $cart->price=$req->price;
                $cart->userid=$id;
                $cart->quantity=1;

                $cart->save();
                  
                $wishlistid=$req->wishlistid;
                Wishlist::destroy($wishlistid);


                return redirect('allproducts')->with('added', 'Item Successfully Added In Cart.');
            }
        }
        else
        {
            return redirect('login')->with('login', 'Please LogIn First To Shop With Us.');
        }
    }

    function addtowishlist(Request $req)
    {
        if (Auth::user()) 
        {
            $id=Auth::id();
            // dd($id);
            $wishlistitemexist= DB::table('wishlists')
            ->where('userid',$id)
            ->where('token',$req->token)
            ->count();

            $cartitemexist= DB::table('carts')
            ->where('userid',$id)
            ->where('token',$req->token)
            ->count();

            if($cartitemexist>0 || $wishlistitemexist>0 )
            {
                return redirect('allproducts')->with('alreadyexist', 'Item Already Exist .');
            }

            else{

                $wishlist=new Wishlist;
                $wishlist->token=$req->token;
                $wishlist->price=$req->price;
                $wishlist->userid=$id;
               

                $wishlist->save();

                return redirect('allproducts')->with('addedtowishlist', 'Item Successfully Added In WishList.');
            }
        }
        else
        {
            return redirect('login')->with('login', 'Please LogIn First To Shop With Us.');
        }
    }

    static function cartitem()
    {
        $userid =  Auth::id();
        return DB::table('carts')
        ->where('userid', $userid)
        ->count();   
    }

    static function cartitemtotal()
    {
        $userid =  Auth::id();
        return DB::table('carts')
        ->join('products', 'carts.token', '=', 'products.token')
        ->where('userid', $userid)
            ->sum('products.price')
            ;
    }

    static function cart_item_total_with_gst()
    {
        $userid =  Auth::id();
        // $carttotalwithgst= DB::table('carts')
        // ->join('products', 'carts.token', '=', 'products.token')
        // ->where('userid', $userid)
        //     ->sum('products.price')
        //     ;

        // return $carttotalwithgst*0.12+$carttotalwithgst;

        
        $carttotalwithgst= DB::table('carts')  
        ->where('userid',$userid)
           ->sum(DB::raw('price * quantity'));

           return  $carttotalwithgst*0.12+$carttotalwithgst;
    }


    static function price_with_qty_increase()
    {
        $userid = Auth::id();
        // $qty= DB::table('carts')
        // ->join('products', 'carts.token', '=', 'products.token')
        // ->where('userid', $userid)
        // ->get('carts.quantity')
        //     ;

        //     $qty_mul_price= DB::table('carts')
        // ->join('products', 'carts.token', '=', 'products.token')
        // ->where('userid', $userid)
        // ->get('products.price')
        //     ;

        //     $test= $qty * $qty_mul_price;

        // return $test ;

        return DB::table('carts')  
        ->where('userid',$userid)
           ->sum(DB::raw('price * quantity'));
           
    }

    





    // $files =   showcart();

    function showcart(Request $req)
    {
        // $userid = $req->session()->get('userid');
        $userid=Auth::id();

        

        $cartitems = DB::table('carts')
            ->join('products', 'carts.token', '=', 'products.token')
            ->where('carts.userid',$userid)
            
            ->select('products.product_name', 'products.price', 'products.id','products.description','products.image','carts.id as cartid','carts.quantity')
            ->get();


            return view('showcart',['cartitems'=>$cartitems]);

//             E.g. in the boot() method of your AppServiceProvider you would have something like:

// public function boot()
// {
//     view()->composer(['home', 'profile'], function ($view) {

//         $notifications = \App\Notification::all(); //Change this to the code you would use to get the notifications

//         $view->with('notifications', $notifications);
//     });
// }




            // return view('checkout',['cartitems'=>$cartitems]);


        // view()->composer(['showcart', 'checkout'], function ($view) {

        //     $cartitems = DB::table('carts')
        //          ->join('products', 'carts.token', '=', 'products.token')
                
        //          ->select('products.product_name', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
        //          ->get();    
        //     $view->with('cartitems', $cartitems);
        // });
    }


    
}
