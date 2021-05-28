<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use function PHPUnit\Framework\returnSelf;

class contact_Controller extends Controller
{
    function insert(Request $request)
    {
       
$query=DB::table('contact')->insert(
    [
        'fullname'=> $request->input('fullname'),
        'email'=> $request->input('email'),
        'phone'=> $request->input('phone'),
        'message'=> $request->input('message'),

       
       
    ]);
    if($query)
    {
        // $request->session()->flash('msg','Your Message Has Been Succcessfully Recorded. ');
        // return redirect()->route('login');
        return redirect('/contact')->with('status', 'Your Message Has Been Succcessfully Recorded.');
    }

    }
}
