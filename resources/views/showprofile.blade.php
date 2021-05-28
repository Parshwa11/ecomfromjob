

<!DOCTYPE html>
<html>
<head>
	<title></title>

	

  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/adminlte.min.css') }}" />
</head>
<body>
    <!-- Main content -->
    <section class="content" style = "margin-left: 150px; margin-top: 35px;" >

      <div class="container-fluid" >
        <div class="row">
          <div class="col-md-10">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{$data->image}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$data->id}}</h3>

                <p class="text-muted text-center">THEWAYSHOP</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name of the Product:</b> <a class="float-right">{{$data->product_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Price:</b> <a class="float-right">{{$data->price}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>description:</b> <a class="float-right">{{$data->description}}</a>
                  </li>
                </ul>

                <a href="indexprac.php" class="btn btn-primary btn-block"><b>Go Back</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>


</body>
</html>