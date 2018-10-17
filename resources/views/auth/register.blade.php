<!DOCTYPE html>
<html>
<head>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lacommerce | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/plugins/iCheck/square/blue.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('welcome')}}"><img src="{{asset('/images/icons/ecom1.png')}}" width="150px" height="30px"> <small><b>R</b>egister</small></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Register now and become our member</p>

    <form action="{{route('register')}}" method="post">
      {{csrf_field()}}

      <div class="form-group has-feedback {{ $errors->has('first_name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="Enter Your First Name...">
        <span class="glyphicon glyphicon-user form-control-feedback">
        </span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('last_name') ? ' has-error' : '' }}">
        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Enter Your Last Name...">
        <span class="glyphicon glyphicon-user form-control-feedback">
        </span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
        <input type="email" class="form-control" name="email" value="{{ old('first_name') }}" required autofocus placeholder="Enter Your Email...">
        <span class="glyphicon glyphicon-envelope form-control-feedback">
        </span>
      </div>

      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
        <input type="password" class="form-control" name="password" required placeholder="Enter Your Password...">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" required placeholder="Re-Type Password">
      </div>

      <div class="form-group has-feedback {{ $errors->has('gender') ? ' has-error' : '' }}">
        <select class="form-control" name="gender">
            <option>---- SELECT GENDER ----</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
      </div>

      <div class="form-group has-feedback {{ $errors->has('phone') ? ' has-error' : '' }}">
        <input type="number" class="form-control" name="phone" required placeholder="Enter Your Phone Number">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> --}}
    <!-- /.social-auth-links -->

    Have an Account ?
    <a href="{{route('login')}}" class="text-center">Login Now!</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('/plugins/iCheck/icheck.min.js')}}"></script>
{{-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script> --}}
</body>
</html>