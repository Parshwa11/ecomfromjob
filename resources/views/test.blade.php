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
<div class="container-fluid">

    <form action="insertproduct" method="POST" enctype="multipart/form-data" >
    @csrf
    <div>
        Product Name:
        <input type="text" placeholder="Product Name" name="product_name"><br><br><br>
        <span>@error("product_name"){{$message}}@enderror</span>
        Price:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp       
        <input type="text" placeholder="Price" name="price"><br><br><br>
       
        
      <p>Please enter Category:</p>
      <select id="marks" name="category">                      
      <option   value="0">--select Category--</option>
      <option  name="drop" value="men">men</option>
      <option   name="drop" value="women">women</option>
      <option   name="drop" value="other">other</option>
      </select><br>
     
  
        <input type="file"  name="file"><br>
        Description:
        <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
        
        <input type="submit"  name="submit">
    </div>
    </form>
    </div>

</body>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
</html>