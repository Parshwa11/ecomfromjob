<?php

namespace App\Http\Controllers;
// use app\models\product;
use App\Models\products;
use Illuminate\Http\Request;


class product_Controller extends Controller
{
    // return product::all();
    function index()
    {
        $data=products::paginate(5);
        return view('products',['products'=>$data]);
        // return view('adminpanel',['products'=>$data]);
    }
}
