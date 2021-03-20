<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="menu__item"><a class="menu__link" href="{{ url('/') }}">Home</a></li>

					<li class=" menu__item"><a class="menu__link" href="{{ url('/allProduct') }}">All Product</a></li>
					<li class=" menu__item"><a class="menu__link" href="{{ url('/contact') }}">contact</a></li>
					@if(count(Cart::content()) > 0)
					<li class=" menu__item"><a class="menu__link" href="{{ url('/cart') }}">Cart (<span class="totalItem">{{ Cart::count() }}</span>)</a></li>
					@endif
					@if(count($cusWishlist) > 0)
					<li class=" menu__item"><a class="menu__link" href="{{ url('/wishlist') }}">Wishlist (<span class="totalWishlist">{{ count($cusWishlist) }}</span>)</a></li>
					@endif
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>


		<div class="top_nav_right">
			<div class="cart box_1">
					@if(Cart::content())
						<a href="{{ url('/cart') }}">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity totalItem">{{ Cart::count() }}</span> items)</div>
								
							</h3>
						</a>

						<p><a href="{{ url('/cart') }}" class="simpleCart_empty" id="totalAmount">TK {{ Cart::total() }}</a></p>
					@else
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
					@endif
						
			</div>	
		</div>

		
		<?php if(Session::get('IsLoggedIn') == true): ?>
		<div class="top_nav_right">
			<div class="cart box_1">
						
				<p style="margin-top: 15px;">
					<a href="{{ url('/customer/profile') }}" class="simpleCart_empty">
						@if(!empty(Session::get('customerName')))
						{{ Session::get('customerName') }}
						@else
						{{Session::get('customerEmail')}}
						@endif
					</a></p>
				
						
			</div>	
		</div>
		<?php endif; ?>
		
		<div class="clearfix"></div>
	</div>
</div>

				