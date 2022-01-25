<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/adminkit/demo/main/ltr/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 May 2021 17:41:44 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ Session::token() }}"> 
<title>Syndicat</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- v4.0.0 -->
<link rel="stylesheet" href="{{asset('dist/bootstrap/css/bootstrap.min.css')}}">

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="dist/img/favicon-16x16.png">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- jsgrid Tables -->
<link type="text/css" rel="stylesheet" href="{{asset('dist/plugins/jsgrid/jsgrid.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('dist/plugins/jsgrid/theme.css')}}" />

<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/et-line-font/et-line-font.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/simple-lineicon/simple-line-icons.css')}}">

<!-- Chartist CSS -->
<link rel="stylesheet" href="{{asset('dist/plugins/chartist-js/chartist.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/plugins/chartist-js/chartist-plugin-tooltip.css')}}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
  <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
<![endif]-->

</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
    @include('header')
  <!-- Left side column. contains the logo and sidebar -->
    @include('navbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Syndicat</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Syndicat</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @yield('contenu')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
    @include('footer')
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="{{asset('dist/js/jquery.min.js')}}"></script>
 
<script src="{{asset('dist/plugins/popper/popper.min.js')}}"></script>

<!-- v4.0.0-alpha.6 -->
<script src="{{asset('dist/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- jsgrid Tables -->
<script src="{{asset('dist/plugins/jsgrid/db.js')}}"></script>
<script src="{{asset('dist/plugins/jsgrid/jsgrid.min.js')}}"></script>
<script src="{{asset('dist/plugins/jsgrid/jsgrid.int.js')}}"></script>
</body>

<!-- template --> 
<script src="{{asset('dist/js/adminkit.js')}}"></script>

<!-- Chart Peity JavaScript --> 
<script src="{{asset('dist/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('dist/plugins/functions/jquery.peity.init.js')}}"></script>
</body>
</html>
