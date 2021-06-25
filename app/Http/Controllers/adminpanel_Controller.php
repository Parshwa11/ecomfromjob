<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\signup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminpanel_Controller extends Controller
{
    function index()
    {
        $data=Product::paginate(5);
        return view('adminpanel',['products'=>$data]);
        // return view('adminpanel',['products'=>$data]);
    }

    function addproduct(Request $request)
    {

        $request->validate([

            'product_name'=>'required',
            'price'=>'numeric',
            'description'=>'required|max:100|min:2',
            'category'=>'required',
            'file'=>'required'

            

        ]);

        $file=$request->file('file');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('images/',$filename);
        
   
    $query=DB::table('products')->insert(
    [
        'product_name'=> $request->input('product_name'),
        'price'=> $request->input('price'),
        'description'=> $request->input('description'),
        'category'=> $request->input('category'),
        'image'=> $filename,
        'token'=> rand(100,1000),
        

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
       
       $query=Product::where('id',$id)->first();

    if($query)
    {
        Product::where('id',$id)->delete();
        return redirect('/adminpanel')->with('delete', 'Your Product Has Been Succcessfully Deleted.');
    }
}

function showproduct($id,Request $request)
{
    $data=Product::find($id);
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
    $data=Product::find($id);

    return view('updateproduct',['data'=>$data]);

   
}

function update(Request $request)
{
   
    // $data=products::find($request->id);
    // $data->product_name=$request->product_name;
    // $data->price=$request->price;
    // $data->description=$request->description;
    // $data->save();

    // $file=$request->file('file');
    // $extension=$file->getClientOriginalExtension();
    // $filename=time().'.'.$extension;
    // $file->move('images/',$filename);

    $file = $request->file('file');
    $extension=$file->getClientOriginalExtension();
    $filename=time().'.'.$extension;
    $file->move('images/', $filename);
    

    $product_name=$request->input('product_name');
    $price=$request->input('price');
    $description=$request->input('description');
    $id=$request->input('id');
    $image=$filename;
    

    DB::update('update products set product_name=?,price=?,description=?,image=? where id=?',
    [$product_name,$price,$description,$image,$id]);
    return redirect('adminpanel');

   
}

function showusers()
{

    $data=signup::paginate(10);
    return view('showusers',['users'=>$data]);
}

function deluser($id,Request $request)
{

    $query=signup::where('id',$id)->first();

    if($query)
    {
        signup::where('id',$id)->delete();
        return redirect('/showusers')->with('delete', 'User Has Been Succcessfully Deleted.');
    }


}
}
