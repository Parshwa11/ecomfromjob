<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<form class="form-horizontal" action="insertproduct" method="POST" enctype="multipart/form-data" >
    @csrf
<fieldset>

<!-- Form Name -->
<legend>PRODUCTS</legend>

<!-- Text input-->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>  
  <div class="col-md-4">
  <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md"  type="text"
  value="{{ old('product_name') }}">
  <span style="color:red;">@error("product_name"){{$message}}@enderror</span>
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_categorie">PRODUCT CATEGORY</label>
  <div class="col-md-4">
  
      <select id="category" name="category" value="{{ old('category') }}">                      
      <option   value="0">--select Category--</option>
      <option  name="drop" value="men">men</option>
      <option   name="drop" value="women">women</option>
      <option   name="drop" value="other">other</option>
      </select>
      <span style="color:red;">@error("category"){{$message}}@enderror</span>
  </div>
</div>







<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="comment">PRICE</label>  
  <div class="col-md-4">
  <input id="price" name="price" placeholder="PRICE" class="form-control input-md"  type="text"
  value="{{ old('price') }}">
  <span style="color:red;">@error("price"){{$message}}@enderror</span>
    
  </div>
</div>

    
 <!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filebutton">main_image</label>
  <div class="col-md-4">
    <input id="" name="file" class="input-file" type="file" value="{{ old('file') }}">
    <span style="color:red;">@error("file"){{$message}}@enderror</span>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
  <div class="col-md-4">                     
  <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>
    <span style="color:red;">@error("description"){{$message}}@enderror</span>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Action</label>
  <div class="col-md-4">
  <input type="submit"  name="submit">
  </div>
  </div>

</fieldset>
</form>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'description' );
</script>