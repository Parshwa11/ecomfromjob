<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\admins;

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
            return "Username or password is not matched";
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
}
