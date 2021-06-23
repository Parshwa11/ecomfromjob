<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $userid = $request->session()->get('userid');
        $orders = DB::table('orders')
        ->where('userid', '=', $userid)
        ->get();

        

        $cartitems = DB::table('carts')
            ->join('products', 'carts.token', '=', 'products.token')
            ->where('carts.userid',$userid)
            
            ->select('products.product_name','products.token', 'products.price', 'products.id','products.description','products.image','carts.id as cartid','carts.quantity')
            ->get();
        // $data = products::all();


            view()->share('cartitems',$cartitems);
            
          
        $pdf = PDF::loadView('myPDF',$cartitems,compact('orders'));
        
    
        return $pdf->download('pdf_file.pdf');
    }



    public function productspdf( Request $request)
    {
        // $str = "";
        // if ($request->has('q')) {
        //     $str = $request->q;
        // }
        // $searched = $request->q;
        $data=products::all();
            view()->share('data',$data);   
        $pdf = PDF::loadView('productpdf',$data);
    //     $data= Products::
    //     where('product_name', 'like', '%'. $searched .'%')
    //     ->orWhere('description','LIKE','%'. $searched .'%')
    //     ->get();
    //    view()->share('data',$data);   
    //     $pdf = PDF::loadView('searchedpdf',$data);
        
    
        return $pdf->download('searchedpdf_file.pdf');
        
    
        return $pdf->download('productspdf_file.pdf');
    }
}

