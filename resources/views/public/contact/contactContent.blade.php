@extends('public.master')
@section('title')
	Lara Shop | Contact Us
@endsection

@section('mainContent')
<!-- //banner -->
<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="contact-grids">
				<div class="col-md-4 contact-grid text-center animated wow slideInLeft" data-wow-delay=".5s">
					<div class="contact-grid1">
						<i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
						<h4>Address</h4>
						<p>{{ $ThemeData['addressOne'] }} <span>{{ $ThemeData['addressTwo'] }}.</span></p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInUp" data-wow-delay=".5s">
					<div class="contact-grid2">
						<i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
						<h4>Call Us</h4>
						<p>{{ $ThemeData['numberOne'] }}<span>{{ $ThemeData['numberTwo'] }}</span></p>
					</div>
				</div>
				<div class="col-md-4 contact-grid text-center animated wow slideInRight" data-wow-delay=".5s">
					<div class="contact-grid3">
						<i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
						<h4>Email</h4>
						<p><a href="mailto:{{ $ThemeData['emailOne'] }}">{{ $ThemeData['emailOne'] }}</a><span><a href="mailto:{{ $ThemeData['emailTwo'] }}">{{ $ThemeData['emailTwo'] }}</a></span></p>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="map wow fadeInDown animated" data-wow-delay=".5s">
				<h3 class="tittle">View On Map</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" frameborder="0" style="border:0"></iframe>
			</div>
			<h3 class="tittle">Contact Form</h3>
			<form action="{{url('/contact')}}" method="POST">
				{{csrf_field()}}
				<div class="contact-form2">
					<input type="text" name="name" required="">
					@if ($errors->has('name'))
		                <p class="help-block">
		                    <strong>{{ $errors->first('name') }}</strong>
		                </p>
		            @endif
					<input type="email" name="email" required="">
					@if ($errors->has('email'))
		                <p class="help-block">
		                    <strong>{{ $errors->first('email') }}</strong>
		                </p>
		            @endif
					<textarea type="text" name="message" required="">Message...</textarea>
					@if ($errors->has('message'))
		                <p class="help-block">
		                    <strong>{{ $errors->first('message') }}</strong>
		                </p>
		            @endif
					<div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
					@if ($errors->has('g-recaptcha-response'))
		                <p class="help-block">
		                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
		                </p>
		            @endif
					<input type="submit" value="Submit" >
				</div>
			</form>
		</div>
	</div>
	
<!-- //contact -->
@endsection