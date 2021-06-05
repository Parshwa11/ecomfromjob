<?php

use App\Http\Controllers\product_Controller;
$cartitemscount=product_Controller::cartitem();
$cartitemstotal=product_Controller::cartitemtotal();
$cart_item_total_with_gst=product_Controller::cart_item_total_with_gst();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
</head>
<body>
<?php $ldate = date('Y-m-d ');?>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="custom-product" id="aa">
  
     <div class="col-sm-10">
     <a class="navbar-brand" href="about"><img src="images/logo.png" class="logo" alt=""></a>
     <p><b>Date : </b>{{$ldate}}</p>
     <p style="
      text-align: right;"><b>Address : </b>{{$address}}</p>
      <p style="
      text-align: right;">{{$city}}</p>
      <p style="
      text-align: right;">{{$zip}}</p>
      <p style="
      text-align: right;">{{$state}}</p>

     <hr style="  border: 1px solid red;">

        <table class="table" id="">
         
            <tbody>
              <tr>
                <td><b>Products</b></td>
                @foreach ($cartitems as $item)
                <td>{{$item->product_name}}</td>
                @endforeach
              </tr>
              <tr>
                <td><b>Product description</b></td>
                @foreach ($cartitems as $item)
                <td>{{$item->description}}</td>
                @endforeach
              </tr>
              <tr>
                <td><b>Price</b> </td>
                @foreach ($cartitems as $item)
                <td>{{$item->price}} Rs/-</td>
                @endforeach
              </tr>
              <tr>
                <td>Catalogue No. </td>
                @foreach ($cartitems as $item)
                <td>{{$item->token}}</td>
                @endforeach
              </tr>
              <tr>
                <td><strong>Quantity : {{$cartitemscount}}</strong></td>
                <b><td><strong>SubTotal : {{$cartitemstotal}} ₹</strong></td></b>
                <td><i><strong>Amount To COD (GST Included):{{$cart_item_total_with_gst}} ₹</strong></i></td>
              </tr>
            </tbody>
          </table>
          
     </div>
</div>

<!-- <a><i class="fa fa-print" onClick="window.print()"></i> Print</a> -->
<!-- <a href="export_as_xls"class="btn btn-warning"> EXPORT. </a> -->


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<!-- 
// function Export() {
//             html2canvas(document.getElementById('aa'), {
//                 onrendered: function (canvas) {
//                   // var pdf = new jsPDF("l", "mm", "a4");
// // var imgData = canvas.toDataURL('image/jpeg', 1.0);
//                     var data = canvas.toDataURL();
//                     var docDefinition = {
//                         content: [{
//                             image: data,
                           
//                         }]
//                     };
//                     pdfMake.createPdf(docDefinition).download("invoice.pdf");
//                 }
//             });
// html2canvas(document.getElementById("aa"), {
//         onrendered: function (canvas) {

//             //document.body.appendChild(canvas);

//             var img = canvas.toDataURL("image/png");
//             var doc = new jsPDF();
//             doc.addImage(img, 'JPEG',10,10);
//             doc.save('test.pdf');


//             //IE 9-11 WORK AROUND
//             if (navigator.userAgent.indexOf("MSIE ") > 0 || 
//                     navigator.userAgent.match(/Trident.*rv\:11\./)) 
//             {
//                 var blob = canvas.msToBlob();
//                 window.navigator.msSaveBlob(blob,'Test file.png');
//             }

//         },
//         //width: 300,
//         //height: 300
//     });
        // }

 -->



       

 <a class="btn btn-primary" href="{{ URL::to('generate-pdf') }}">Export to PDF</a>
 <a class="btn btn-primary" href="{{ URL::to('export') }}">Export to Excel</a>

</body>
</html>
