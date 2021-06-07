<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class category_Controller extends Controller
{
    function index(request $request)
    {
        $cat = DB::select('select * from categories');
        return view('index',['cat'=>$cat]);
    }

    // function category_value_count(request $request)
    // {
    //     $cat = DB::select('select * from categories');
    //     return view('index',['cat'=>$cat]);
    // }
}
