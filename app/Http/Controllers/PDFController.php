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
            
            ->select('products.product_name','products.token', 'products.price', 'products.id','products.description','products.image','carts.id as cartid')
            ->get();
        // $data = products::all();


            view()->share('cartitems',$cartitems,'orders',$orders);
            
          
        $pdf = PDF::loadView('myPDF',$cartitems,$orders);
    
        return $pdf->download('pdf_file.pdf');
    }
}


// $data = Employee::all();

// // share data to view
// view()->share('employee',$data);
// $pdf = PDF::loadView('pdf_view', $data);

// // download PDF file with download method
// return $pdf->download('pdf_file.pdf');