


<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 07</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="sidebar/css/style.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  </head>
  <body>

  @if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">

        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="/"><span class="fa fa-home"></span> Home</a>
          </li>
          <li>
              <a href="about"><span class="fa fa-user"></span> About</a>
          </li>
          <li>
            <a href="products"><span class="fa fa-sticky-note"></span> Products</a>
          </li>
          <li>
            <a href="addproduct"><span class="fa fa-cogs"></span> Add Product</a>
          </li>
          <li>
            <a href="showusers"><span class="fa fa-paper-plane"></span> Users</a>
          </li>
        </ul>

        <div class="footer">
        	<p>
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
					</p>
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

      <section class="content">
                          
                            <table class="table table-hover text-nowrap" >
                            <thead>
                             <tr>
                               <th>ID</th>
                               <th>Name</th> 
                               <th>price</th>
                               <th>description</th>
                               <th>Picture</th>
                               <th>Action</th>
                               <th></th>
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
                               <!-- <td class="d1">{{$item['image']}}</td> -->
                               <!-- <td class="d1"><img 
                                style='border: 2px solid #ddd; 
                                border-radius: 10px;
                                padding: 5px;
                                width: 100px;'
                                src="{{$item['image']}}" class="img-circle elevation-2" alt="User Image"></td> -->
                               <!-- <td><i class="fa fa-trash fa-3x" aria-hidden="true"></i></td> -->
                               <td><a href="deleteproduct/{{$item->id}}"><i class="fa fa-trash fa-3x" aria-hidden="true"></i></a></td>
                               
                               <td><a href="updateproduct/{{$item->id}}"><i class="fa fa-edit fa-3x" aria-hidden="true"></i></a></td>
                                <td><a href="showprofile/{{$item->id}}"><i class="fa fa-eye fa-3x" aria-hidden="true"></i></a></td>


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

                           <!-- <div>
                             {!! $products->appends(['sort' => 'department'])->links() !!}
                            </div> -->
        
        
      </div>
		</div>



<script type="text/javascript">

// function deletejf(id)
// {
//   if(confirm('Are You Sure You Want to Delete?'))
//   {
//     window.location.href='{{url('deleteproduct')}}/'+id;
//   }
// }


</script>


    <script src="sidebar/js/jquery.min.js"></script>
    <script src="sidebar/js/popper.js"></script>
    <script src="sidebar/js/bootstrap.min.js"></script>
    <script src="sidebar/js/main.js"></script>
  </body>
</html>