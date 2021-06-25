@extends('masterheader')
@section('about','about')
@section('content')




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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.0.0/nouislider.min.css" integrity="sha512-kSH0IqtUh1LRE0tlO8dWN7rbmdy5cqApopY6ABJ4U99HeKulW6iKG5KgrVfofEXQOYtdQGFjj2N/DUBnj3CNmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
@if (session('addedtowishlist'))
    <div class="alert alert-success">
        {{ session('addedtowishlist') }}
    </div>
@endif



<?php $id=0;
?>

<div class="container">
  <div class="row">
  <form method="post" action="productbyprice">
  @csrf
    <div class="col">
    Price Filter:

    <input  name="start" placeholder="Price From" type="number"> 
    <input name="end" placeholder="Price to" type="number"> 
    <button type="submit" class="btn btn-success btn-sm">Search</button>
    </div>
    </form>
    
  </div>
</div>


 

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
 
  
 



                                           
                                            <select onchange="location = this.value;">
                                              
                                              <option value="0" style>Select Category:</option> 
                                              @foreach($cat as $cato)        
                                                 <option value="productbycat/{{$cato->cat_name}}">{{$cato->cat_name}}</option></a>
                                                @endforeach
                                            </select>
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
                           
                               
                               

                            <div class="card-body table-responsive p-0"> 

            <form action="/search" class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" value="" name="query" class="form-control search-box" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>

<!-- 
        <form action="/search" class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" name="query" class="form-control search-box" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form> -->


      <div class="col-md-12 mb-3">
      <a href="{{URL::current()}}">Lowest to Highest</a>&nbsp&nbsp|
      <a href="">Highest to lowest  </a>&nbsp&nbsp|
      <a href="">Newest </a>&nbsp&nbsp|
      <a href="">Popularity  </a>
      
      
      </div>
      <a href="wishlist"><button class='btn btn-primary' style="float: right;"> <i class="fa fa-heart" aria-hidden="true"></i></button></a>&nbsp
     
        <a href="showcart"><button class='btn btn-success' style="float: right;"> <i class="fas fa-shopping-cart"></i></button></a>
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
                                <td><a href="showprofile/{{$item->id}}"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a></td>

                                <td> <form action="addtowishlist" method="POST">
                                @csrf
                                  <input type="hidden" value="{{$item['token']}}" name="token" >
                                  <input type="hidden" value="{{$item['price']}}" name="price" >
                                  <button class="btn btn-warning">Add To WishList</button>
                                </form></td>

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
                        

                            <a class="btn btn-primary" href="generate-pdf-products">Export to PDF</a>
                            <span data-href="tasks" id="export" class="btn btn-success" onclick="exportTasks(event.target);">Export As CSV</span>
                            


                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/12.0.0/nouislider.min.js" integrity="sha512-6vo59lZMHB6GgEySnojEnfhnugP7LR4qm6akxptNOw/KW+i9o9MK4Gaia8f/eJATjAzCkgN3CWlIHWbVi2twpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About ThewayShop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
  @endsection

  <script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>
</body>
</html>