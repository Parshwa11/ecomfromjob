<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>wayshop | Log in</title>
      <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/adminlte.min.css') }}" />
   </head>
   <body class="hold-transition login-page">
   @if (session('login'))
    <div class="alert alert-success">
        {{ session('login') }}
    </div>
@endif
      <div class="login-box">
         <!-- <div class="login-logo">
            <a href="#"><b>Admin</b>LTE</a>
         </div> -->
         <!-- /.login-logo -->
         <div class="card">
            <div class="card-body login-card-body">
               <p class="login-box-msg">Sign in to start your session</p>
               <form action="\signed" method="post">
               @csrf

                  <div class="input-group mb-3">
                     <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php if(isset($_COOKIE['emailc']))
                        {echo $_COOKIE['emailc'];} ?>">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" name="password" id="password" class="form-control" placeholder="Password"  value="<?php if(isset($_COOKIE['passwordc']))
                        {echo $_COOKIE['passwordc'];} ?>" >
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-8">
                        <div class="icheck-primary">
                           <input type="checkbox" id="remember" name="remember"  <?php if(isset($_COOKIE["emailc"])) { ?> checked <?php } ?>>
                           <label for="remember">
                           Remember Me
                           </label>
                        </div>
                     </div>
                     <div class="col-4">
                        <input  name="login1" type = "submit" value = " Submit "/><br/>
                     </div>
                  </div>
               </form>
               <p class="mb-1">
                  <a href="forgot.php">I forgot my password</a>
               </p>
               <p class="mb-0">
                  <a href="index.php" class="text-center">Register a new membership</a>
               </p>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>
   </body>
</html>