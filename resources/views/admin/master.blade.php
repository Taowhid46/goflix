<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap.min.css') }}" >
<link href="{{ asset('public/admin/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('public/admin/css/style-responsive.css') }}" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('public/admin/css/font.css') }}" type="text/css"/>
<link href="{{ asset('public/admin/css/font-awesome.css') }}" rel="stylesheet">
@yield('css')
<script src="{{ asset('public/admin/js/jquery2.0.3.min.js') }}"></script>
</head>
<body>
<section id="container">
<!--header start-->
@include('admin.includes.header')
<!--header end-->
<!--sidebar start-->
@include('admin.includes.sidebar')
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
@yield('content')
</div>
</section>
 <!-- footer -->
@include('admin.includes.footer')
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{ asset('public/admin/js/custom.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('public/admin/js/scripts.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.scrollTo.js') }}"></script>
@yield('js')
</body>
</html>
