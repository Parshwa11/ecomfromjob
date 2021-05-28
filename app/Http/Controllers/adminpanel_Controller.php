<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminpanel_Controller extends Controller
{
    function index()
    {
        $data=products::paginate(3);
        return view('adminpanel',['products'=>$data]);
        // return view('adminpanel',['products'=>$data]);
    }

    function addproduct(Request $request)
    {
       
    $query=DB::table('products')->insert(
    [
        'product_name'=> $request->input('product_name'),
        'price'=> $request->input('price'),
        'description'=> $request->input('description'),
   
    ]);
    if($query)
    {
        // $request->session()->flash('msg','Your Message Has Been Succcessfully Recorded. ');
        // return redirect()->route('login');
        return redirect('/addproduct')->with('status', 'Your Product Has Been Succcessfully Added.');
    }


}
}
