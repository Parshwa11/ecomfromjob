<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;
// use Barryvdh\DomPDF\Facade\PDF;

use PDF;
use DB;


class pdf_Controller extends Controller
{
    public function gen(Request $request)
{

// if($request->has('download')){
// $pdf = PDF::loadView('pdfview');
// return $pdf->download('pdfview.pdf');
// }
// $pdf = PDF::loadView('pdf.report');
// return $pdf->stream('report.pdf', array('Attachment' => 0));
echo "helloaro";

}
}
