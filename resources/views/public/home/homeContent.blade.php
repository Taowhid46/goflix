@extends('public.master')
@section('title')
Lara Shop
@endsection
@section('mainContent')
@php
	$flag = 100;
@endphp
		<section id="slider_aria">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<div class="slider" data-scroll-reveal="enter from the bottom after 0.3s">
							<div id="banner-fade">
								<ul class="bjqs">

								@if(count($sliders) > 0)
									@foreach ( $sliders as $slider )
										<li><img src="{!!asset('public/sliders/'.$slider->media_src)!!}"></li>
									@endforeach
								@else
									<h1>Please Insert Slider Photo</h1>
								@endif
								</ul>

							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript">    
			$(document).ready(function($) {
					$('#banner-fade').bjqs({
			            animduratio :2000,
			            animspeed   :2000,
			            hoverpulse  :true,
			            responsive  : true,
    				});
			});
		</script>

<!-- //banner -->
<!-- content -->

<!-- <div class="new_arrivals">
	<div class="container">
		<h3><span>Discount </span>Products</h3>
		<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
	</div>
</div> -->
<!-- //content -->

<!-- content-bottom -->

<!-- @if($saleProducts)
<div class="content-bottom">
	<div class="col-md-7 content-lgrid">
		<div class="col-sm-6 content-img-left text-center">
			<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="{{ asset('public/products/'.$saleProducts[0]->media_src) }}" alt="image" class="img-responsive zoom-img"></div>
					<div class="info-box">
						<div class="info-content simpleCart_shelfItem">
									<a href="{{ url('/product-details/'.$saleProducts[0]->productSlug) }}"><h4>{{ $saleProducts[0]->productName }}</h4></a>
									<span class="separator"></span>
									<?php if($saleProducts[0]->productSalePrice): ?>

										<p>
											<span class="item_price">TK{{ $saleProducts[0]->productSalePrice }}</span>
											<del>TK{{ $saleProducts[0]->productRegularPrice }}</del>
										</p>

									<?php  endif; ?>

									<span class="separator"></span>
									
									@if(count(Cart::content()) > 0)

									<?php 
									$cartData = Cart::content(); 
									foreach($cartData as $cart):
									if($cart->id === $saleProducts[0]->id){
										$flag = 1;
										break;
									}
									else
									{
										$flag = 0;
									}
									endforeach;
									
									if($flag == 0){

									?>
									<a href="javascript:;" data-id="{{ $saleProducts[0]->id }}" class="item_add add_to_cart  hvr-outline-out button2">Add to cart</a>
									<?php }elseif($flag == 1){ ?>
									<a href="{{ url('/cart') }}" class="item_add  hvr-outline-out button2">View Cart</a>
									<?php } ?>
									
									@else
									<a href="javascript:;" data-id="{{ $saleProducts[0]->id }}" class="item_add add_to_cart  hvr-outline-out button2">Add to cart</a>
									@endif


									@if(Session::get('IsLoggedIn') == true)	
									@if(count($wishlists) > 0)
									<?php  
										$cusId = Session::get('customerId');
										foreach($wishlists as $wishlist):
										if($wishlist->product_id === $saleProducts[0]->id && $wishlist->customer_id === $cusId){
											$flag2 = 1;
											break;
										}
										else
										{
											$flag2 = 0;
										}
										endforeach;

										if($flag2 == 0){
									?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="javascript:;" data-proid="{{ $saleProducts[0]->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
									</div>
									<?php }
										elseif($flag2 == 1){ ?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="{{url('/wishlist')}}"  class="item_add single-item hvr-outline-out button2">View Wishlist</a>
									</div>

										<?php } ?>
									@else
										<div class="wishlist" style="margin-top: 10px;">
											<a href="javascript:;" data-proid="{{ $saleProducts[0]->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
										</div>
										
									@endif	
									
									@endif	



						</div>
					</div>
			</div>
		</div>
		<div class="col-sm-6 content-img-right">
			<h3>20%<span>Discount On</span> {{ $saleProducts[0]->productName }}</h3>
		</div>
		
		<div class="col-sm-6 content-img-right">
			<h3>20%<span>Discount On</span> {{ $saleProducts[1]->productName }}</h3>
		</div>
		<div class="col-sm-6 content-img-left text-center">
			<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="{{ asset('public/products/'.$saleProducts[1]->media_src) }}" alt="image" class="img-responsive zoom-img"></div>
					<div class="info-box">
						<div class="info-content simpleCart_shelfItem">
							<a href="{{ url('/product-details/'.$saleProducts[1]->productSlug) }}"><h4>{{ $saleProducts[1]->productName }}</h4></a>
							<span class="separator"></span>
							<?php if($saleProducts[1]->productSalePrice): ?>

								<p>
									<span class="item_price">TK{{ $saleProducts[1]->productSalePrice }}</span>
									<del>TK{{ $saleProducts[1]->productRegularPrice }}</del>
								</p>

							<?php  endif; ?>
							<span class="separator"></span>

							@if(count(Cart::content()) > 0)

									<?php 
									$cartData = Cart::content(); 
									foreach($cartData as $cart):
									if($cart->id === $saleProducts[1]->id){
										$flag = 1;
										break;
									}
									else
									{
										$flag = 0;
									}
									endforeach;
									
									if($flag == 0){

									?>
									<a href="javascript:;" data-id="{{ $saleProducts[1]->id }}" class="item_add add_to_cart  hvr-outline-out button2">Add to cart</a>
									<?php }elseif($flag == 1){ ?>
									<a href="{{ url('/cart') }}" class="item_add  hvr-outline-out button2">View Cart</a>
									<?php } ?>
									
									@else
									<a href="javascript:;" data-id="{{ $saleProducts[1]->id }}" class="item_add add_to_cart  hvr-outline-out button2">Add to cart</a>
									@endif

									@if(Session::get('IsLoggedIn') == true)	
									@if(count($wishlists) > 0)
									<?php  
										$cusId = Session::get('customerId');
										foreach($wishlists as $wishlist):
										if($wishlist->product_id === $saleProducts[1]->id && $wishlist->customer_id === $cusId){
											$flag2 = 1;
											break;
										}
										else
										{
											$flag2 = 0;
										}
										endforeach;

										if($flag2 == 0){
									?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="javascript:;" data-proid="{{ $saleProducts[1]->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
									</div>
									<?php }
										elseif($flag2 == 1){ ?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="{{url('/wishlist')}}"  class="item_add single-item hvr-outline-out button2">View Wishlist</a>
									</div>

										<?php } ?>
									@else
										<div class="wishlist" style="margin-top: 10px;">
											<a href="javascript:;" data-proid="{{ $saleProducts[1]->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
										</div>
										
									@endif	
									
									@endif	
						</div>
					</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="col-md-5 content-rgrid text-center">
		<div class="content-grid-effect slow-zoom vertical">
				<div class="img-box"><img src="{{ asset('public/front/images/p4.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
					<div class="info-box">
						<div class="info-content simpleCart_shelfItem">
								<a href="{{ url('/viewCategory/men') }}"><h4>Men's Product</h4></a>

						</div>
					</div>
			</div>
	</div>
	<div class="clearfix"></div>
</div>
@endif -->
<!-- //content-bottom -->
<!-- product-nav -->

<div class="product-easy">
	<div class="container">
		
		<script src="{{ asset('public/front/js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
			});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Our all Services together</span></li> 

				</ul>				  	 
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						@foreach($allProducts as $product)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ asset('public/products/'.$product->media_src) }}" alt="" class="pro-image-front" height="220">
									<img src="{{ asset('public/products/'.$product->media_src) }}" alt="" class="pro-image-back" height="220">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ url('/product-details/'.$product->productSlug) }}" class="link-product-add-cart">View</a>
											</div>
										</div>

										<!-- <span class="product-new-top">{{$product->created_at}}</span> -->

										<span class="product-new-top">
										<?php

										$createDate = date('Y-m-d',strtotime($product->created_at));
										$OneWeekAgo = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

										if($createDate >= $OneWeekAgo)
										{
											echo 'New';
										}

										?>
												
										</span>
										
								</div>


								<div class="item-info-product ">
									<h4><a href="{{ url('/product-details/'.$product->productSlug) }}">{{ $product->productName }}</a></h4>
									
									<?php if($product->productSalePrice): ?>
									<div class="info-product-price">
										<span class="item_price">TK{{ $product->productSalePrice }}</span>
										<del>TK{{ $product->productRegularPrice }}</del>
									</div>
									<?php  else: ?>
										<div class="info-product-price">
											<span class="item_price">TK{{ $product->productRegularPrice }}</span>
											<del>{{ $product->productSalePrice }}</del>
										</div>
									<?php  endif; ?>

									@if(count(Cart::content()) > 0)

									<?php 
									$cartData = Cart::content(); 
									foreach($cartData as $cart):
									if($cart->id === $product->id){
										$flag = 1;
										break;
									}
									else
									{
										$flag = 0;
									}
									endforeach;
									
									if($flag == 0){

									?>
									<a href="javascript:;" data-id="{{ $product->id }}" class="item_add add_to_cart single-item hvr-outline-out button2">Add to cart</a>
									<?php }elseif($flag == 1){ ?>
									<a href="{{ url('/cart') }}" class="item_add single-item hvr-outline-out button2">View Cart</a>
									<?php } ?>
									
									@else
									<a href="javascript:;" data-id="{{ $product->id }}" class="item_add add_to_cart single-item hvr-outline-out button2">Add to cart</a>
									@endif

									@if(Session::get('IsLoggedIn') == true)	
									@if(count($wishlists) > 0)
									<?php  
										$cusId = Session::get('customerId');
										foreach($wishlists as $wishlist):
										if($wishlist->product_id === $product->id && $wishlist->customer_id === $cusId){
											$flag2 = 1;
											break;
										}
										else
										{
											$flag2 = 0;
										}
										endforeach;

										if($flag2 == 0){
									?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="javascript:;" data-proid="{{ $product->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
									</div>
									<?php }
										elseif($flag2 == 1){ ?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="{{url('/wishlist')}}"  class="item_add single-item hvr-outline-out button2">View Wishlist</a>
									</div>

										<?php } ?>
									@else
										<div class="wishlist" style="margin-top: 10px;">
											<a href="javascript:;" data-proid="{{ $product->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
										</div>
										
									@endif	
									
									@endif							
								</div>
							</div>
						</div>
						@endforeach

						<div class="clearfix"></div>

					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
						@foreach($saleProducts as $saleProduct)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ asset('public/products/'.$saleProduct->media_src) }}" alt="" class="pro-image-front" height="220">
									<img src="{{ asset('public/products/'.$saleProduct->media_src) }}" alt="" class="pro-image-back" height="220">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ url('/product-details/'.$saleProduct->productSlug) }}" class="link-product-add-cart">View</a>
											</div>
										</div>

										<span class="product-new-top">
										<?php

										$createDate2 = date('Y-m-d',strtotime($saleProduct->created_at));
										$OneWeekAgo2 = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

										if($createDate2 >= $OneWeekAgo2)
										{
											echo 'New';
										}

										?>
												
										</span>

										
								</div>
								<div class="item-info-product ">
									<h4><a href="{{ url('/product-details/'.$saleProduct->productSlug) }}">{{ $saleProduct->productName }}</a></h4>
									<?php if($saleProduct->productSalePrice): ?>
									<div class="info-product-price">
										<span class="item_price">${{ $saleProduct->productSalePrice }}</span>
										<del>${{ $saleProduct->productRegularPrice }}</del>
									</div>
									<?php  endif; ?>

									
									@if(count(Cart::content()) > 0)

									<?php 
									$cartData = Cart::content(); 
									foreach($cartData as $cart):
									if($cart->id === $saleProduct->id){
										$flag = 1;
										break;
									}
									else
									{
										$flag = 0;
									}
									endforeach;
									
									if($flag == 0){

									?>
									<a href="javascript:;" data-id="{{ $saleProduct->id }}" class="item_add add_to_cart single-item hvr-outline-out button2">Add to cart</a>
									<?php }
									elseif($flag == 1){ ?>
									<a href="{{ url('/cart') }}" class="item_add single-item hvr-outline-out button2">View Cart</a>
									<?php } ?>
									
									@else
									<a href="javascript:;" data-id="{{ $saleProduct->id }}" class="item_add add_to_cart single-item hvr-outline-out button2">Add to cart</a>
									@endif


									@if(Session::get('IsLoggedIn') == true)	
									@if(count($wishlists) > 0)
									<?php  
										$cusId = Session::get('customerId');
										foreach($wishlists as $wishlist):
										if($wishlist->product_id === $saleProduct->id && $wishlist->customer_id === $cusId){
											$flag2 = 1;
											break;
										}
										else
										{
											$flag2 = 0;
										}
										endforeach;

										if($flag2 == 0){
									?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="javascript:;" data-proid="{{ $saleProduct->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
									</div>
									<?php }
										elseif($flag2 == 1){ ?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="{{url('/wishlist')}}"  class="item_add single-item hvr-outline-out button2">View Wishlist</a>
									</div>

										<?php } ?>
									@else
										<div class="wishlist" style="margin-top: 10px;">
											<a href="javascript:;" data-proid="{{ $saleProduct->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
										</div>
										
									@endif	
									
									@endif			
									

								</div>

							</div>
						</div>
						@endforeach

						
						<div class="clearfix"></div>						
					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
						@foreach($allProducts as $product)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ asset('public/products/'.$product->media_src) }}" alt="" class="pro-image-front" height="220">
									<img src="{{ asset('public/products/'.$product->media_src) }}" alt="" class="pro-image-back" height="220">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ url('/product-details/'.$product->productSlug) }}" class="link-product-add-cart">View</a>
											</div>
										</div>
										<span class="product-new-top">
										<?php

										$createDate = date('Y-m-d',strtotime($product->created_at));
										$OneWeekAgo = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

										if($createDate >= $OneWeekAgo)
										{
											echo 'New';
										}

										?>
												
										</span>
										
								</div>


								<div class="item-info-product ">
									<h4><a href="{{ url('/product-details/'.$product->productSlug) }}">{{ $product->productName }}</a></h4>
									
									<?php if($product->productSalePrice): ?>
									<div class="info-product-price">
										<span class="item_price">${{ $product->productSalePrice }}</span>
										<del>${{ $product->productRegularPrice }}</del>
									</div>
									<?php  else: ?>
										<div class="info-product-price">
											<span class="item_price">${{ $product->productRegularPrice }}</span>
											<del>{{ $product->productSalePrice }}</del>
										</div>
									<?php  endif; ?>

									@if(count(Cart::content()) > 0)

									<?php 
									$cartData = Cart::content(); 
									foreach($cartData as $cart):
									if($cart->id === $product->id){
										$flag = 1;
										break;
									}
									else
									{
										$flag = 0;
									}
									endforeach;
									
									if($flag == 0){

									?>
									<a href="javascript:;" data-id="{{ $product->id }}" class="item_add add_to_cart single-item hvr-outline-out button2">Add to cart</a>
									<?php }
									elseif($flag == 1){ ?>
									<a href="{{ url('/cart') }}" class="item_add single-item hvr-outline-out button2">View Cart</a>
									<?php } ?>
									
									@else
									<a href="javascript:;" data-id="{{ $product->id }}" class="item_add add_to_cart single-item hvr-outline-out button2">Add to cart</a>
									@endif

									@if(Session::get('IsLoggedIn') == true)	
									@if(count($wishlists) > 0)
									<?php  
										$cusId = Session::get('customerId');
										foreach($wishlists as $wishlist):
										if($wishlist->product_id === $product->id && $wishlist->customer_id === $cusId){
											$flag2 = 1;
											break;
										}
										else
										{
											$flag2 = 0;
										}
										endforeach;

										if($flag2 == 0){
									?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="javascript:;" data-proid="{{ $product->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
									</div>
									<?php }
										elseif($flag2 == 1){ ?>
									<div class="wishlist" style="margin-top: 10px;">
										<a href="{{url('/wishlist')}}"  class="item_add single-item hvr-outline-out button2">View Wishlist</a>
									</div>

										<?php } ?>
									@else
										<div class="wishlist" style="margin-top: 10px;">
											<a href="javascript:;" data-proid="{{ $product->id }}" data-customerId="{{Session::get('customerId')}}" class="item_add add_to_wishlist single-item hvr-outline-out button2">Add to Wishlist</a>
										</div>
										
									@endif	
									
									@endif			
									
									
								</div>
							</div>
						</div>
						@endforeach
						<div class="clearfix"></div>		
					</div>	
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection