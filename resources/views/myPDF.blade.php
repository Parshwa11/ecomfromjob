<?php

use App\Http\Controllers\product_Controller;
$cartitemscount=product_Controller::cartitem();
$cartitemstotal=product_Controller::cartitemtotal();
$cart_item_total_with_gst=product_Controller::cart_item_total_with_gst();

?>


<!DOCTYPE html>
<html lang="en">
<head>
   

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

</head>
<body>
<?php $ldate = date('Y-m-d ');?>

<div class="custom-product" id="aa">
<a class="navbar-brand" href="about"><img src="images/logo.png" class="logo" alt=""></a>
  
     <div class="col-sm-10">
     <p><b>Date : </b>{{$ldate}}</p>
     <p style="
      text-align: left;"><b>From : </b>TheWayShop Inc.</p>
     @foreach ($orders as $order)
     <p style="
      text-align: right;"><b>Address : </b>{{$order->address}}</p>
      @endforeach
      @foreach ($orders as $order)
     <p style="
      text-align: right;"><b> </b>{{$order->city}}</p>
      @endforeach
      @foreach ($orders as $order)
     <p style="
      text-align: right;"><b> </b>{{$order->zip}}</p>
      @endforeach
      @foreach ($orders as $order)
     <p style="
      text-align: right;"><b> </b>{{$order->state}}</p>
      @endforeach

     

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
                <b><td><strong>SubTotal : {{$cartitemstotal}}</strong></td></b>
                <td><i><strong>Amount To COD (GST Included):{{$cart_item_total_with_gst}} </strong></i></td>
              </tr>
            </tbody>
          </table>
          
     </div>
</div>





<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>







</body>
</html>
