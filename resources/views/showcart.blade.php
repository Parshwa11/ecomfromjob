<?php

use App\Http\Controllers\product_Controller;
$cartitemscount=product_Controller::cartitem();
$cartitemstotal=product_Controller::cartitemtotal();
$cart_item_total_with_gst=product_Controller::cart_item_total_with_gst();

// $price_with_qty_increase=product_Controller::price_with_qty_increase();

$total=product_Controller::cartitemtotal();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
</head>
<body>


@if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif
<!-- @foreach ($cartitems as $item)
<p>{{$item->product_name}}</p>
<p>{{$item->price}}</p>
<p>{{$item->id}}</p>
@endforeach -->

<!--Section: Block Content-->
<section>

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      
      <div class="mb-3">
      
        <div class="pt-4 wish-list">

          <h5 class="mb-4">Cart (<span>{{$cartitemscount}}</span> items)</h5>
          

          @foreach ($cartitems as $item)

          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                <img class="img-fluid w-100" style="border: 5px solid black;"
                  src="{{asset('/images/'.$item->image)}}" alt="Sample">
                <a href="#!">
                  
                </a>
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                    <h5>{{$item->product_name}}</h5>
                    <p class="mb-3 text-muted text-uppercase small">{{$item->description}}</p>
                    
                    <p class="mb-3 text-muted text-uppercase small">Size: M</p>
                  </div>



                   <!-- <form>
  <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
  <input type="number" id="number" value="0" />
  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
</form> -->
<div>
@if($item->quantity>1)
<a href="{{url('/updatecartqty/'.$item->cartid.'/-1')}}">-</a>
@endif
<input type="text" id="number" value="{{$item->quantity}}" >
<a href="{{url('/updatecartqty/'.$item->cartid.'/1')}}">+</a>

</div>

                </div> 
                {{ $old_section = ($item->quantity * $item->price)}}
                <!-- {{ $section = ($old_section + $old_section)}} -->
                <input type="text" class="pricewithqty" value="{{$old_section}}" >
             
               

                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a href="removecart/{{$item->cartid}}" type="button" class="card-link-secondary small text-uppercase mr-3"><i
                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                    
                  </div>
                  <p class="mb-0"><span><strong id="summary">Price : {{$item->price}}₹</strong></span></p class="mb-0">
                </div>
              </div>
            </div>
          </div>
          @endforeach 

        </div>
       
      </div>
      
    

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-4">Expected shipping delivery</h5>

          <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-4">We accept</h5>

          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
            alt="Visa">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
            alt="American Express">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
            alt="Mastercard">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
            alt="PayPal acceptance mark">
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4">

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-3">The total amount of</h5>

          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Temporary amount
              <span>{{$cartitemstotal}} ₹</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              Shipping
              <span>0.00 ₹</span>  
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              GST Amount
              <span>12 %</span>
            </li>
            
            
        

            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>The total amount of</strong>
                <strong>
                  <p class="mb-0">(including GST)</p>
                </strong>
              </div>
              <span><strong>{{$cart_item_total_with_gst}} ₹</strong></span>
            </li>
          </ul>

          <a href="checkout"><button type="button" class="btn btn-primary btn-block">go to checkout</button></a>

        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
            Add a discount code (optional)
            <span><i class="fas fa-chevron-down pt-1"></i></span>
          </a>

          <div class="collapse" id="collapseExample">
            <div class="mt-3">
              <div class="md-form md-outline mb-0">
                <input type="text" id="discount-code" class="form-control font-weight-light"
                  placeholder="Enter discount code">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

  </div>
  <!-- Grid row -->

</section>
<!--Section: Block Content-->

<!-- <script type="text/javascript">

var pricewithqty = document.getElementsByClassName('pricewithqty').value;
var su=su+pricewithqty;
document.write(su);


</script> -->




</body>
</html>