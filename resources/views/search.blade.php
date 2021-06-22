<!doctype html>
<html lang="en">
   <head>
      <title>Searched</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
   </head>
   <body>
<style>

</style>

   @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
      
      <div id="content" class="p-4 p-md-5">
         <section class="content">
            <table class="table table-hover text-nowrap" >
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>price</th>
                     <th>description</th>
                     <th>Image</th>
                     <th></th>
                  </tr>
               </thead>
               @foreach ($products as $item)
               <tbody>
               
                  <tr class="r1">
                     <td class="d1">{{$item['id']}}</td>
                     <td class="d1">{{$item['product_name']}}</td>
                     <td class="d1">{{$item['price']}}</td>
                     <td class="d1">{{$item['description']}}</td>
                     <td class="d1"><img 
                                style='border: 2px solid #ddd; 
                                border-radius: 10px;
                                padding: 5px;
                                width: 100px;'
                                src="{{asset('/images/'.$item->image)}}" class="img-circle elevation-2" alt="User Image"></td>
                  </tr>
               </tbody>
               @endforeach

               
            </table>


            <div class="row">
            
            
            <form method="post" action="generate-pdf-searched" class="navbar-form navbar-right">
            @csrf
          <div class="form-group">
          <input type="hidden" name="searchedq" value="{{$searched}}">
          </div>
          <button type="submit" class="btn btn-primary" data-inline="true">Export to PDF</button>
         
        </form>

        <form method="post" action="tasks1" class="navbar-form navbar-right">
            @csrf
          <div class="form-group">
          <input type="hidden" name="searchedq" value="{{$searched}}">
          </div>
          <button type="submit" class="btn btn-success" data-inline="true">Export to CSV</button>
         
        </form>
        </div>
        
            
            <!-- <a class="btn btn-primary" href="{{ URL::to('generate-pdf-searched') }}">Export to PDF</a>        -->
      </div>
      </div>
      </div>   
      </section>
      </div>
      </div>

      <!-- <script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script> -->


   </body>
</html>