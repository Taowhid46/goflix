<!DOCTYPE html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Web template" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap.min.css') }}" >
<link href="{{ asset('public/admin/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('public/admin/css/custom.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('public/admin/css/style-responsive.css') }}" rel="stylesheet"/>
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{ asset('public/admin/css/font.css') }}" type="text/css"/>
<link href="{{ asset('public/admin/css/font-awesome.css') }}" rel="stylesheet">
<script src="{{ asset('public/admin/js/jquery2.0.3.min.js') }}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>
		{!! Form::open(['url' => '/login','method' => 'POST']) !!}
			{{ csrf_field() }}


			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<!-- <input type="email" class="ggg" name="email" placeholder="E-MAIL" required=""> -->
				{{ Form::email('email',null,['class' => 'ggg','placeholder' => 'E-MAIL']) }}
			</div> 
			@if ($errors->has('email'))
                <p class="help-block error_login">
                    <strong>{{ $errors->first('email') }}</strong>
                </p>
            @endif
			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
			<!-- <input type="password" class="ggg" name="password" placeholder="PASSWORD" required=""> -->
			{{ Form::password('password',['class' => 'ggg','placeholder' => 'PASSWORD']) }}
			</div>
            @if ($errors->has('password'))
                <p class="help-block error_login">
                    <strong>{{ $errors->first('password') }}</strong>
                </p>
            @endif
			<span>
				{{ Form::checkbox('name','Here Will Be Value')  }} Remember Me
			</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<!-- <input type="submit" value="Sign In" name="login"> -->
				{{ Form::submit('Sign In',['name' => 'login']) }}
		{!! Form::close() !!}
		<p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
</div>
</div>
<script src="{{ asset('public/admin/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('public/admin/js/scripts.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.scrollTo.js') }}"></script>
</body>
</html>
