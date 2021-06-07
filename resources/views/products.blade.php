<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
@foreach ($products as $item)
<tr>
   <td>{{$item['product_name']}}</td>
   <td>{{$item['price']}}</td>
   <td>{{$item['description']}}</td>
 

   
</tr>
@endforeach



<div class="categories-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/t-shirts-img.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">{{$item['product_name']}}</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/shirt-img.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Shirt</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/wallet-img.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Wallet</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/women-bag-img.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Bags</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/shoes-img.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Shoes</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/women-shoes-img.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Women Shoes</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>

</body>
</html> -->



<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;


}
</style>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

@if (session('alreadyexist'))
    <div class="alert alert-success">
        {{ session('alreadyexist') }}
    </div>
@endif

@if (session('added'))
    <div class="alert alert-success">
        {{ session('added') }}
    </div>
@endif
<?php $id=0;
?>

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Category</h3>
  
 
  @foreach ($cat as $cato)
  <a href="productbycat/{{$cato->cat_name}}" class="w3-bar-item w3-button">{{$cato->cat_name}}<span class="badge">2</span></a>&nbsp&nbsp
  @endforeach

  
</div>



<tr>
   
  
</tr>


<!-- @foreach ($products as $item)
<h2 style="text-align:center">Product Card</h2>

<td></td>
   <td></td>
   <td></td>
<div class="card">
  <img src="{{$item['image']}}" alt="Denim Jeans" style="width:100%">
  <h1>{{$item['product_name']}}</h1>
  <p class="price">{{$item['price']}}</p>
  <p>{{$item['description']}}</p>
  <p><button>Add to Cart</button></p>
</div>
@endforeach -->
<section class="content">
                            <!-- <div class="pull-right">
                                {{ $products->links() }}
                            </div> -->
                             <!-- <div class="row">
                            <div class="col-12">
                              <div class="card">
                               
                               

                            <div class="card-body table-responsive p-0"> -->

            <form action="/search" class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" name="query" class="form-control search-box" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
        <a href="showcart"><button class='btn btn-success' style="float: right;"> CART</button></a>
                            <table class="table table-hover text-nowrap" >
                            <thead>
                             <tr>
                               <th>ID</th>
                               <th>Name</th> 
                               <th>price</th>
                               <th>description</th>
                               <th>Picture</th>
                             </tr>
                           </thead>

                        
                           @foreach ($products as $item)
                                  <tbody>
                             <tr class="r1">
                               <td class="d1">{{$id+1}}</td>
                               <td class="d1">{{$item['product_name']}}</td>
                               <td class="d1">{{$item['price']}}</td>
                               <td class="d1">{{$item['description']}}</td>
                               <td class="d1"><img 
                                style='border: 2px solid #ddd; 
                                border-radius: 10px;
                                padding: 5px;
                                width: 100px;'
                                src="{{asset('/images/'.$item->image)}}" class="img-circle elevation-2" alt="User Image"></td>
                                
                               <td> <form action="addtocart" method="POST">
                                @csrf
                                  <input type="hidden" value="{{$item['token']}}" name="token" >
                                  <input type="hidden" value="{{$item['price']}}" name="price" >
                                  <button class="btn btn-primary">add to cart</button>
                                </form></td>

                             </tr>
                             </tbody>
                             <?php $id++; ?> 
                             @endforeach

                            

                          
                           
                           </table>
                                <!-- </div>
                                /.card-body -->
                              </div>
                            </div>
                          </div>   
                              <!-- /.card -->
                           </section>

                           <div>
                             {!! $products->appends(['sort' => 'department'])->links() !!}
                            </div>


                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>



