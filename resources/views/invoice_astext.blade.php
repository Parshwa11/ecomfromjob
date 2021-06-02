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
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="custom-product">
     <div class="col-sm-10">
        <table class="table">
         
            <tbody>
              <tr>
                <td>Products</td>
                @foreach ($cartitems as $item)
                <td>{{$item->product_name}}</td>
                @endforeach
              </tr>
              <tr>
                <td>Product description</td>
                @foreach ($cartitems as $item)
                <td>{{$item->description}}</td>
                @endforeach
              </tr>
              <tr>
                <td>Price </td>
                @foreach ($cartitems as $item)
                <td>{{$item->price}} Rs/-</td>
                @endforeach
              </tr>
              <tr>
                <td>Shipping Address:</td>
                <!-- foreach ($orders as $ord) {
                echo $ord;
                } -->
              </tr>
            </tbody>
          </table>
          
     </div>
</div>
</body>
</html>
