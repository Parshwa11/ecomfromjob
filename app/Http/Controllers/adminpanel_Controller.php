<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;

class adminpanel_Controller extends Controller
{
    function index()
    {
        $data=products::paginate(3);
        return view('adminpanel',['products'=>$data]);
        // return view('adminpanel',['products'=>$data]);
    }
}
