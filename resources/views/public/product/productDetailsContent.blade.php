@extends('public/master')

@section('title')
	Lara Shop | Details
@endsection

@section('mainContent')
@if($singleProduct)
<!-- //banner -->
<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						<li data-thumb="{{ asset('public/products/'.$singleProduct[0]->media_src) }}">
							<div class="thumb-image"> <img src="{{ asset('public/products/'.$singleProduct[0]->media_src) }}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						@if($singleProductGalleryImage)
						@foreach($singleProductGalleryImage as $galleryImage)
						<li data-thumb="{{ asset('public/products/'.$galleryImage->media_src) }}">
							<div class="thumb-image"> <img src="{{ asset('public/products/'.$galleryImage->media_src) }}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						@endforeach
						@endif
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">

				<form action="{{ url('cart/add') }}" method="POST">
					{{ csrf_field() }}
					<h3>{{ $singleProduct[0]->productName }}</h3>

					@if($singleProduct[0]->productSalePrice)

						<p><span class="item_price">TK{{ $singleProduct[0]->productSalePrice }}</span> <del>TK{{ $singleProduct[0]->productRegularPrice }}</del></p>

						<input type="hidden" name="salePrice" class="price" value="{{ $singleProduct[0]->productSalePrice }}">

					@else

						<p><span class="item_price">TK{{ $singleProduct[0]->productRegularPrice }}</span><p>

						<input type="hidden" name="regularPrice" class="price" value="{{ $singleProduct[0]->productRegularPrice }}">

					@endif

					<!-- Hidden Input -->

					<input type="hidden" name="product_id" value="{{ $singleProduct[0]->id }}">
					<input type="hidden" name="productName" value="{{ $singleProduct[0]->productName }}">
					<input type="hidden" name="productCode" value="{{ $singleProduct[0]->productCode }}">
					<input type="hidden" name="ImageName" value="{{ $singleProduct[0]->media_src }}">

					<!-- <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="description">
						<h5>Check delivery, payment options and charges at your location</h5>
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
						<input type="submit" value="Check">
					</div> -->
					<div class="color-quality">
						<div class="color-quality-right">
							<h5>Quality :</h5>
							<input type="number" name="quantity" class="form-control quantity" min="1" width="50%" value="1">
						</div>
					</div>

					@if(!empty($singleProductVariants[0]))
					<?php

						// echo '<pre>';
						// print_r($singleProductVariants);


					?>
					<div class="occasional">
						<h5>Size :</h5>
						<div class="colr ert">
							<select name="size" id="size" class="form-control">
								@foreach($singleProductVariants as $variantsSize)
								<option value="{{ $variantsSize->sizeName }}">{{ $variantsSize->sizeName }}</option>
								@endforeach
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="occasional">
						<h5>Color :</h5>
						<div class="colr ert">
							<select name="color" id="color" class="form-control">
								@foreach($singleProductVariants as $variantsColor)
								<option value="{{ $variantsColor->colorName.'.'.$variantsColor->extraPrice }}">
									{{ $variantsColor->colorName }}
									@if($variantsColor->extraPrice)
									(Extra : {{ $variantsColor->extraPrice }})
									@endif
								</option>
								@endforeach
							</select>
						</div>
						<div class="clearfix"> </div>
					</div>
					@endif

					<br>
					<div class="occasion-cart">
						<button class="item_add hvr-outline-out button2" type="submit" style="border: none;padding: 5px 10px;color: white;">Add to cart</button>
					</div>
				</form>

					
		</div>
				<div class="clearfix"></div>

				<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>

						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p>{{ $singleProduct[0]->productShortDescription }}
									<span>{{ $singleProduct[0]->productLongDescription }}</span></p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="{{ asset('public/front/images/men3.jpg') }}" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
											</ul>
											<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									
									<div class="add-review">
										<h4>add a review</h4>
										<form>
											<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<br>
											<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
											
											<textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<br>
											<input type="submit" value="SEND">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	</div>
</div>
@endif
@endsection
<!-- //single -->