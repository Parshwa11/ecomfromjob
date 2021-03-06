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
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="/" class="logo">Admin</a></h1>
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
                               <th>Email</th>
                               <th>DOB</th>
                               
                             </tr>
                           </thead>

                           @foreach ($users as $user)
                                  <tbody>
                             <tr class="r1">
                               <td class="d1">{{$user['id']}}</td>
                               <td class="d1">{{$user['username']}}</td>
                               <td class="d1">{{$user['email']}}</td>
                               <td class="d1">{{$user['dob']}}</td>
                               <td><a href="deleteuser/{{$user->id}}"><i class="fa fa-trash fa-3x" aria-hidden="true"></i></a></td>
                               
                             


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

                           <div>
                           
                            </div>
        
        
      </div>
		</div>


        <div>
                             {!! $users->appends(['sort' => 'department'])->links() !!}
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