<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<!-- @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif -->
    <form action="/adminpanel" method="post"  enctype="multipart/form-data">
    @csrf  


    <div>
        Product Name:
        <input type="text" placeholder="Product Name" name="product_name" value="{{$data->product_name}}"><br><br><br>
        Price:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp       
        <input type="text" placeholder="Price" name="price" value="{{$data->price}}"><br><br><br>
        Description:
        <input type="text" placeholder="Description" name="description" value="{{$data->description}}"><br>
        <input type="hidden" placeholder="id" name="id" value="{{$data->id}}"><br>

   
        <p>Update Category:</p>
      <select id="marks" name="category">                      
      <option   value="0">--update Category--</option>
      <option  name="drop" value="men">men</option>
      <option   name="drop" value="women">women</option>
      <option   name="drop" value="other">other</option>
      </select><br>


        <input type="file"  name="file" ><br>
        
        <input type="submit"  name="submit">
    </div>
    </form>

</body>
</html>