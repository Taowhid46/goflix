<!DOCTYPE html>
<html>
<head>
<title>Goflix</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<link href="{{ asset('public/front/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/front/css/flexslider.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- <link href="{{ asset('public/front/css/jquery-ui.css') }}" rel="stylesheet" type="text/css" media="all" /> -->
<link href="{{ asset('public/front/css/jquery-ui-1.9.2.custom.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/front/css/pignose.layerslider.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/front/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/front/css/bjqs.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/front/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/front/css/chosen.min.css') }}" rel="stylesheet" type="text/css" media="all" />


<!-- js -->
<script type="text/javascript" src="{{ asset('public/front/js/jquery-2.1.4.min.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="{{ asset('public/front/js/imagezoom.js') }}"></script>
<script src="{{ asset('public/front/js/jquery.flexslider.js') }}"></script>
<!-- <script src="{{ asset('public/front/js/simpleCart.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('public/front/js/bootstrap-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/bjqs-1.3.min.js') }}"></script>
<script src="{{ asset('public/front/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/front/js/chosen.jquery.min.js') }}"></script>

<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<script src="{{ asset('public/front/js/jquery.easing.min.js') }}"></script>

</head>
<body>



<!-- header -->
@if (session('status'))
    <div class="customAlert status_msg text-center">Logout Successfully ! Thanks :)</div>
    
    <script type="text/javascript">
        jQuery(function($){
            $('.status_msg').html('Logout Successfully ! Thanks :)<a href="javascript:;" class="removeSlide"><span class="glyphicon glyphicon-remove pull-right" style="color:white;"></span></a>');

            // $('.status_msg').html('Logout Successfully ! Thanks :)<a href="javascript:;" class="removeSlide"><span class="glyphicon glyphicon-remove pull-right"></span></a>').delay(3000).slideUp('slow');

            
            $('.removeSlide').click(function(){
            	$('.status_msg').slideUp('slow');
            });
        });
    </script>
@endif
@include('public/includes/header')

<!-- //header-bot -->
<!-- banner -->
@include('public/includes/menubar')
<!-- //banner-top -->
<!-- banner -->
@yield('mainContent')
<!-- //product-nav -->
<!-- footer -->
@include('public/includes/footer')
<!-- //footer -->
<!-- login -->

			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up for free</h3>
										<form id="registerForm" action="{{ url('/customer/register') }}">
											{{ csrf_field() }}
											<span class="registerSuccess"></span>
											<div class="sign-up">
												<span class="error-text emailNull"></span>
												<h4>Email :</h4>
												<input type="email" name="email" class="registerEmail">
											</div>
											<div class="sign-up">
												<span class="error-text passNull"></span>
												<h4>Password :</h4>
												<input type="password" name="password" class="registerPass">
												
											</div>
											<div class="sign-up">
												<span class="error-text confPassNull"></span>
												<h4>Re-type Password :</h4>
												<input type="password" name="confirmPassword" class="registerConfirmPass">
												
											</div>
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" id="customerRegister">
											</div>
											
										</form>
									</div>
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form id="loginForm" action="{{ url('/customer/login') }}">
											{{ csrf_field() }}

											<span class="loginSuccess">Logged In Successfully !</span>
											<input type="hidden" class="hiddenUrl" value="{{ url('/') }}">
											<div class="sign-in">
												<h4>Email :</h4>
												<span class="error-text emailNull"></span>
												<input type="text" name="email" class="loginEmail">	
											</div>
											<div class="sign-in">

												<h4>Password :</h4>
												<span class="error-text passNull"></span>
												<input type="password" name="password" class="loginPass">
												<a href="#">Forgot password?</a>
											</div>
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" id="customerLogin">
											</div>
										</form>
									</div>
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
</body>
</html>
