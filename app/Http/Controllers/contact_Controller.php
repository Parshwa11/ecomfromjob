<?php

namespace App\Http\Controllers;

use App\Notifications\NewMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\returnSelf;

class contact_Controller extends Controller
{
    function insert(Request $request)
    {
    //    $gmi= $request->input('fullname');
$query=DB::table('contact')->insert(
    [
        'fullname'=> $request->input('fullname'),
        'email'=> $request->input('email'),
        'phone'=> $request->input('phone'),
        'message'=> $request->input('message'),

       
       
    ]);
    if($query)
    {

        Mail::send('emails.contactmail',[
            'fullname'=>$request->input('fullname'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'message'=> $request->input('message')
        ],function($mail) use($request){
            $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
            $mail->to($request->input('email'))->subject('contact us message');
        });

        
        $gmail="luci38748@gmail.com";
        // Notification::send($users,new NewMessage());
        Notification::route('mail', $gmail)->notify(new NewMessage($gmail));


    }

        // $request->session()->flash('msg','Your Message Has Been Succcessfully Recorded. ');
        // return redirect()->route('login');
        return redirect('/contact')->with('status', 'Your Message Has Been Succcessfully Recorded.');
    }

}
