<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\admins;
use App\Models\products;

class admin_Controller extends Controller
{
    function login(Request $req)
    {

        // return $req->input();
        $data=$req->input();
        // $email= $req->input('email');
        $email= $data['email'];
        $password= $data['password'];
        // echo $email;


        $user= admins::where(['email'=>$email])->first();
        if(!$user || $password!=$user->password)
        {
            return redirect('admin')->with('status', 'Email or Password is Wrong Please Check!!.');
        }
        else{
         
            $req->session()->put('user',$user);
            return redirect('/adminpanel');

        // $user= admins::where(['email'=>$req->email])->first();
        // if(!$user || $req->password!=$user->password)
        // {
        //     return "Username or password is not matched";
        // }
        // else{
        //     $req->session()->put('user',$user);
        //     return redirect('/');
        }
    }

    function index(request $request)
    {
        $data = DB::select('select * from products');
        return view('index',['products'=>$data]);
    }

    function try()
    {
        $data=products::all();
        return view('try',['products'=>$data]);
        // return view('adminpanel',['products'=>$data]);
    }
}
