<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
<img src="images/logo.png" class="logo" alt="">
<hr>
<div class="container">
  
  <h3> Searched Products List:</h3>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
      </tr>
    </thead>
    @foreach ($data as $item)
    <tbody>
      <tr>
      
             
                
        <td>{{$item->product_name}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->description}}</td>
      </tr>
      
    </tbody>
    @endforeach
  </table>
  
</div>

</body>
</html>
