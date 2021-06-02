



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
</head>
<body>





<tr>
   
  
</tr>

<section class="content">
                        

            <form action="/search" class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" name="query" class="form-control search-box" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
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

                           @foreach ($productbycat as $item)
                                  <tbody>
                             <tr class="r1">
                               <td class="d1">{{$item->id}}</td>
                               <td class="d1">{{$item->product_name}}</td>
                               <td class="d1">{{$item->price}}</td>
                               <td class="d1">{{$item->description}}</td>
                               
                               <td class="d1"><img 
                                style='border: 2px solid #ddd; 
                                border-radius: 10px;
                                padding: 5px;
                                width: 100px;'
                                src="{{asset('/images/'.$item->image)}}" class="img-circle elevation-2" alt="User Image"></td>

                                <td> 
                                <form action="/addtocart" method="post">
                                @csrf
                                
                                <input type="hidden" value="{{$item->token}}" name="token" >
                                  <button class="btn btn-primary">add to cart</button>
                                </form>
                                </td>

                                


                             </tr>
                             </tbody>
                             @endforeach

                            

                          
                           
                           </table>
                                <!-- </div>
                                /.card-body -->
                              </div>
                            </div>
                          </div>   
                              <!-- /.card -->
                           </section>

                           
</body>
</html>



