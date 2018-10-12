<!DOCTYPE html>
<html>
<head>
  <meta name="_token" content="{!! csrf_token() !!}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.png')}}"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.dataTables.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('/css/toastr.min.css')}}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('components.navbar-admin')
  @include('components.left-sidebar-admin')

<!--===============================Content===========================-->

  @yield('content')

<!--===============================Content===========================-->

  @include('components.footer-admin')
  @include('components.right-sidebar-admin')

</div>
<!-- ./wrapper -->

<!--===============================Scripts===========================-->

<!-- jQuery 3 -->
<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/dist/js/demo.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.datatables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/datatables.bootstrap.min.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('/js/buttons.dataTables.min.js')}}"></script> --}}
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
  });
</script>
<script type="text/javascript" src="{{asset('/js/control-backbone.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/toastr.min.js')}}"></script>

<!--===============================Scripts===========================-->



<!--===========================Additional Scripts=====================-->

  @yield('scripts')

<!--===========================Additional Scripts=====================-->
</body>
</html>