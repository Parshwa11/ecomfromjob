<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminpanel_Controller extends Controller
{
    function index()
    {
        $data=products::paginate(5);
        return view('adminpanel',['products'=>$data]);
        // return view('adminpanel',['products'=>$data]);
    }

    function addproduct(Request $request)
    {
        $file=$request->file('file');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('images/',$filename);
        
   
    $query=DB::table('products')->insert(
    [
        'product_name'=> $request->input('product_name'),
        'price'=> $request->input('price'),
        'description'=> $request->input('description'),
        'image'=> $filename,
        

        // 'image'=>$request->file('file')->store('//images'),

        
   
    ]);
    if($query)
    {
        // $request->session()->flash('msg','Your Message Has Been Succcessfully Recorded. ');
        // return redirect()->route('login');
        return redirect('/adminpanel')->with('status', 'Your Product Has Been Succcessfully Added.');
    }
}



function delproduct($id,Request $request)
{
       
       $query=products::where('id',$id)->first();

    if($query)
    {
        products::where('id',$id)->delete();
        return redirect('/adminpanel')->with('delete', 'Your Product Has Been Succcessfully Deleted.');
    }
}

function showproduct($id,Request $request)
{
    $data=products::find($id);
    // $users = DB::table('products')->where('id', $id)->get(); 
    // $users = DB::select('select * from products where id='$id');
    return view('showprofile',['data'=>$data]);

    //    $query=products::where('id',$id)->first();

    // if($users)
    // {
        // products::where('id',$id)->delete();
        // return redirect('/adminpanel')->with('delete', 'Your Product Has Been Succcessfully Deleted.');
    // }
}

function updateproduct($id,Request $request)
{
    $data=products::find($id);

    return view('updateproduct',['data'=>$data]);

   
}

function update(Request $request)
{
   
    // $data=products::find($request->id);
    // $data->product_name=$request->product_name;
    // $data->price=$request->price;
    // $data->description=$request->description;
    // $data->save();

    $product_name=$request->input('product_name');
    $price=$request->input('price');
    $description=$request->input('description');
    $id=$request->input('id');

    DB::update('update products set product_name=?,price=?,description=? where id=?',
    [$product_name,$price,$description,$id]);
    return redirect('adminpanel');

   
}

}

