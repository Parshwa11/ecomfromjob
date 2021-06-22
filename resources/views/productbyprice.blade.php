<!doctype html>
<html lang="en">
   <head>
      <title>Searched</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   </head>
   <body>

      
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

            <form method="post" action="generate-pdf-pricefilter" class="navbar-form navbar-right">
            @csrf
          <div class="form-group">
          <input type="hidden" name="starts" value="{{$start}}">
          <input type="hidden" name="ends" value="{{$end}}">
          </div>
          <button type="submit" class="btn btn-primary">Export to PDF</button>
        </form>

        <form method="post" action="tasks2" class="navbar-form navbar-right">
            @csrf
          <div class="form-group">
          <input type="hidden" name="starts" value="{{$start}}">
          <input type="hidden" name="ends" value="{{$end}}">
          </div>
          <button type="submit" class="btn btn-success">Export to CSV</button>
        </form>

      </div>
      </div>
      </div>   
      </section>
      </div>
      </div>




   </body>
</html>