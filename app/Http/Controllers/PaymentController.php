<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Stripe;
use Session;

class PaymentController extends Controller
{

    public function index()
    {
        return view('welcome');
    }
  
    public function makePayment(Request $request)
    {
        $finalpay = Helper::finalpay();
        $id=Auth::id();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $finalpay*100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Make payment and chill." 
        ]);

        DB::table('carts')->where('userid', $id)->delete();
  
        Session::flash('success', 'Payment successfully made.');
          
        return back();
    }
}