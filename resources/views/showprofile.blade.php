@php
$ur = Request::fullUrl();



@endphp

<!DOCTYPE html>
<html>
<head>

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60d465ac0081ca0012478190&product=inline-share-buttons" async="async"></script>



<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
        stLight.options({
                publisher:'12345',
        });
</script>
	<title></title>
  <!-- <meta property="og:url"           content="{{$ur}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="The Way Shop" />
<meta property="og:description"   content="Your description" />
<meta property="og:image" content="https://scotch.io/wp-content/themes/scotch/img/scotch-home.jpg">
<meta property="og:image"         content="https://picsum.photos/200" /> -->

	
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/adminlte.min.css') }}" />
</head>
<body>
<div class="sharethis-inline-share-buttons" data-url="{{$ur}}?{{$data->description}}?images/{{$data->image}}" data-description="{{$data->description}}" data-title="Products from Wayshop!"></div>
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
                       src="{{asset('/images/'.$data->image)}}"
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
                <span id="button_1"></span>


               


                <!-- <div class="social-buttons">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::fullUrl() }}"
       target="_blank">
       <i class="fa fa-facebook-official">Share to Facebook</i>
    </a> -->
    
    
<!-- </div> -->


                <a href="allproducts" class="btn btn-primary btn-block"><b>Go Back</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<!-- <div class="fb-share-button" 
data-href="https://www.your-domain.com/your-page.html" 
data-layout="button_count">
</div> -->
    <div class="fb-share-button" data-href="{{$ur}}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="O9Oe7dB9"></script>
</section>

<script type="text/javascript" src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>

      <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

      <script>
         stWidget.addEntry({
                 "service":"sharethis",
                 "element":document.getElementById('button_1'),
                 "url":"http://127.0.0.1:8000/showprofile/4",
                 "title":"Product From Wayshop",
                 "type":"large",
                 "text":"Product From Wayshop" ,
                 "image":"http://www.softicons.com/download/internet-icons/social-superheros-icons-by-iconshock/png/256/sharethis_hulk.png",
                 "summary":"{{$data->description}}"
         });
</script>


</body>
</html>