<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\carts;

use Illuminate\Http\Request;

class cart_Controller extends Controller
{
    function removecart($crtid,Request $req)
    {
        carts::where('id',$crtid)->delete();
        return redirect('/showcart')->with('delete', 'Your Product Has Been Succcessfully Deleted From Cart.');
    }

    function updatecartqty($id=null,$quantity=null)
    {
       DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
       return redirect('/showcart');
    }
}
