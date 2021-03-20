@extends('public/master')

@section('title')
	Lara Shop | Category
@endsection
@php
	$flag = 100;
@endphp
@section('mainContent')
	<div class="men-wear">
	<div class="container">
		@include('public/includes/sidebar')
		<div class="col-md-8 products-right">

			@if(!empty($saleProducts[0]))
			<h5>Sale Product ( {{ $categoryName }} )</h5>
			<br>
			@foreach($saleProducts as $saleProduct)
				<div class="col-md-4 product-men no-pad-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item">
							<img src="{{ asset('public/products/'.$saleProduct->media_src) }}" alt="" class="pro-image-front" height="200">
							<img src="{{ asset('public/products/'.$saleProduct->media_src) }}" alt="" class="pro-image-back" height="200">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ url('/product-details/'.$saleProduct->productSlug) }}" class="link-product-add-cart">View</a>
											</div>
										</div>
										<span class="product-new-top">Sale</span>
										
						</div>
						<div class="item-info-product ">
									<h4><a href="{{ url('/product-details/'.$saleProduct->productSlug) }}">{{ $saleProduct->productName }}</a></h4>
									<div class="info-product-price">
										<span class="item_price">TK{{ $saleProduct->productSalePrice }}</span>
										<del>TK{{ $saleProduct->productRegularPrice }}</del>
									</div>

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
			@endif
				
			<div class="clearfix"></div>

			@if(isset($products))
			@if(!empty($products[0]))
			<h5>All Product ( {{ $categoryName }} )</h5>
			<br>
			
			@foreach($products as $product)

			<div class="col-md-4 product-men no-pad-men">
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
							<span class="item_price">TK{{ $product->productSalePrice }}</span>
							<del>TK{{ $product->productRegularPrice }}</del>
						</div>
					<?php  else: ?>
						<div class="info-product-price">
							<span class="item_price">TK{{ $product->productRegularPrice }}</span>
							<del>TK{{ $product->productSalePrice }}</del>
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
			<div align="center">{{ $products->links() }}</div>
			@endif
			@endif
		</div>


		</div>
		<div class="clearfix"></div>

	</div>
</div>	
@endsection