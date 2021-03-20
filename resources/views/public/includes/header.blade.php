<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="{{ url('/') }}"><img src="{{ asset('public/products/'.$ThemeData['logo']) }}"></a></h1>
		</div>

<p class="text-center text-danger success_msg"></p>
		<div class="col-md-6 header-middle">

			<form method="POST" action="{{ url('/search') }}">
				{{ csrf_field() }}
				<div class="search">
					<input name="search_item" type="search" id="search_product">
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#search_product").autocomplete({
							source: "{{ url('/searchByUiJs') }}",
							minlength:1
						});
					});
				</script>
				<?php if(Session::get('message')){ ?>
				    <script type="text/javascript">
				        jQuery(function($){
				            $('.success_msg').html('<?php echo Session::get('message') ?>').fadeIn().delay(1000).fadeOut('slow');
				        });
				    </script>
				<?php } ?>

				<div class="section_room">
					<select id="country" class="frm-field required" name="search_category">
						<option value="">All categories</option>
						@foreach($allCategory as $category)
							<option value="{{ $category->id }}">{{ $category->categoryName }}</option>
						@endforeach
					</select>
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				<?php if(Session::get('IsLoggedIn') == true): ?>
				<li><a href="{{ url('/customer/logout') }}" class="use1" ><span>Logout</span></a></li>
				<?php else: ?>
				<li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a></li>
				<?php endif; ?>
				<?php if($ThemeData['facebook']): ?>
					<li><a class="fb" href="{{ $ThemeData['facebook'] }}" target="_blank"></a></li>
				<?php endif; ?>
				<?php if($ThemeData['twitter']): ?>
					<li><a class="twi" href="{{ $ThemeData['twitter'] }}" target="_blank"></a></li>
				<?php endif; ?>
				<?php if($ThemeData['linkedIn']): ?>
					<li><a class="insta" href="{{ $ThemeData['linkedIn'] }}" target="_blank"></a></li>
				<?php endif; ?>
				<?php if($ThemeData['snapchat']): ?>
					<li><a class="you" href="{{ $ThemeData['snapchat'] }}" target="_blank"></a></li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>