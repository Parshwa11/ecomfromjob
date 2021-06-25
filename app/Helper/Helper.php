<?php
namespace App\Helper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Helper
{
   static function finalpay()
    {
        $userid =  Auth::id();
       
        
        $carttotalwithgst= DB::table('carts')  
        ->where('userid',$userid)
           ->sum(DB::raw('price * quantity'));

           $finalpay = $carttotalwithgst*0.12+$carttotalwithgst;
           return $finalpay;
    }
}