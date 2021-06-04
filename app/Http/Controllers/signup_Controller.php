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

$authentication = $request->input('rad1');
if($authentication=="user")
        
{

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
else
{
    $query1=DB::table('admins')->insert(
        [
            
            'email'=> $request->input('email'),
            'password'=> $request->input('password'),
           
        ]);

        if($query1)
    {
        
        return redirect('/signup')->with('status1', 'You are Registered with us As ADMIN.');
    }
}

    }


    function signed(Request $request)
    {

        $email= $request->input('email');
        $password= $request->input('password');


        $user = DB::table('signup')
        ->where('email',$email)
        ->where('password',$password)
        ->first();

        // foreach ($user as $title) {
        //     echo $title[$id];
        // }

        if($user)
        {
     
          $request->session()->put('userid', $user->id);
          return redirect('/');
        }
        else
        {

        $admin = DB::table('admins')
        ->where('email',$email)
        ->where('password',$password)
        ->first();

            if($admin)
            {
                return redirect('/signup')->with('status2', 'Seems Like You Are Admin please Proceed To admin panel.');
            }
            else
            {
                return redirect('/signup')->with('status3', 'You are Not Registered Please Register So You can Start Buying');
            }

        }

    

    }
}

