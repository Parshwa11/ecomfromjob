
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ECommerce| Registration Page</title>
      <script src="js/index.js"></script>
      <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
      <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/adminlte.min.css') }}" />
     
   </head>
   <body class="hold-transition register-page">
   @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
      <div class="register-box">
         <!-- <div class="register-logo">
            <a href="indexprac.html"><b>Admin</b>LTE</a>
         </div> -->
         <div class="card">
            <div class="card-body register-card-body">
               <p class="login-box-msg">Register a new membership</p>
               <form  action="submit"
                method="POST" id=myform  name="mform" onsubmit="return validateForm()" enctype="multipart/form-data">
                @csrf
                  <div class="input-group mb-3" id="un">
                     <input type="text" name="username" class="form-control" placeholder="Full name">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-user"></span>
                        </div>
                     </div>
                     <span class="formerror"> </span></b>
                  </div>
                  <div class="input-group mb-3" id="em">
                     <input type="email" name="email" class="form-control" placeholder="Email">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                     <span class="formerror"> </span></b>
                  </div>
                  <div class="input-group mb-3" id="ps">
                     <input type="password" name="password" class="form-control" placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                     <span class="formerror"> </span></b>
                  </div>
                  <div class="input-group mb-3" id="cps">
                     <input type="password" name="cpassword" class="form-control" placeholder="Retype password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-lock"></span>
                        </div>
                     </div>
                     <span class="formerror"> </span></b>
                  </div>
                  <div  class="input-group mb-3" id="dob">
                    <input type="date"class="form-control" placeholder="DOB" name="bd" id="bd">
                    <span class="formerror"> </span></b>
                  </div>
                  <div  id="aut">
                    <label for="Sign In As">Sign In As:</label>&nbsp;
                    <input type="radio" id="rad1" name="rad1" value="user" required>
                    <label for="User">User</label>
                    <input type="radio" id="rad2" name="rad1" value="admin" >
                    <label for="admin">Admin</label><br>
                    <span class="formerror"> </span></b>
                  </div>
                  
                  <div >
                     <input type="file" id="file" name="file" />
                    
                  </div>
               
                  <div class="row" id="ter">
                     <div class="col-8">
                        <div class="icheck-primary">
                           <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                           <label for="agreeTerms">
                           I agree to the <a href="#">terms</a>
                           </label>
                        </div>
                        <span class="formerror"> </span></b>
                     </div> 
                  </div>

                  <div class="col-4">
                     <button  type="submit" name="submit" class="btn  btn-primary btn-block" >Register</button>
                  </div>
            </div>
            </form>
            <a href="/login" class="text-center">I already have a membership</a>
         </div>
      </div>
      </div>
      <!-- jQuery -->
      <script type="text/javascript" src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>
      <!-- AdminLTE App -->
  
     
   </body>
</html>