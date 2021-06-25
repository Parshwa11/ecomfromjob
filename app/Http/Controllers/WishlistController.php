<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use App\Models\Wishlist;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    function showwishlist(Request $req)
    {
        // $userid = $req->session()->get('userid');
        $userid=Auth::id();

        

        $cartitems = DB::table('wishlists')
            ->join('products', 'wishlists.token', '=', 'products.token')
            ->where('wishlists.userid',$userid)
            
            ->select('products.product_name', 'products.price','products.token', 'products.id','products.description','products.image','wishlists.id as wishlistid')
            ->get();


            return view('wishlist',['cartitems'=>$cartitems]);
    }


    public function destroy($id)
{   
    Wishlist::destroy($id);
    return redirect('wishlist')->with('delete', 'Item Succesfully Removed From WishList.');

}
}
