<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class signup_Controller extends Controller
{
    //
    function insert(Request $request)
    {
        // $res=new insert_Controller;
        // $username= $request->input('username');
        // $email= $request->input('email');
        // $password= $request->input('password');
        // $authentication= $request->input('authentication');
        // $dob= $request->input('dob');
        

       

        // $data=array('username'=>$username,"email"=>$email,"password"=>$password,"$authentication"=>$$authentication,"dob"=>$dob);

        // echo "hello2";
        // $username = $request->input('username');
        // $email = $request->input('email');
        // $password = $request->input('password');
        // $authentication = $request->input('bd');
        // $dob = $request->input('rad1');

        // DB::table('student_details')->insert($data);
        // DB::insert('insert into signup (username,email,password,authentication,dob) values(?)',[$data]);
    // }
// }

$query=DB::table('signup')->insert(
    [
        'username'=> $request->input('username'),
        'email'=> $request->input('email'),
        'password'=> $request->input('password'),
        'authentication'=> $request->input('rad1'),
        'dob'=> $request->input('bd'),
    ]);

    
    if($query)
    {
        // $request->session()->flash('msg','Your Message Has Been Succcessfully Recorded. ');
        // return redirect()->route('login');

        return redirect('/signup')->with('status', 'Thank You For Registering With Us.');
    }

    }
}

