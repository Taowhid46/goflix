<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="col-sm-6 newsleft">
					<h3>SIGN UP FOR NEWSLETTER !</h3>
				</div>
				<div class="col-sm-6 newsright">
					<form>
						<input type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-3 sign-gd">
				<h4>Category</h4>
				<ul>
					<li><a href="{{ url('/') }}">Home</a></li>
					@if($allCategory)
					@foreach($allCategory as $categories)
					<li><a href="{{ url('/viewCategory/'.$categories->categorySlug) }}">{{$categories->categoryName}}</a></li>
					@endforeach
					@endif
				</ul>
			</div>	

			<div class="col-md-3 sign-gd-two">
				<h4>Store Information</h4>
				<ul>

					@if($ThemeData['addressOne'])
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : {{$ThemeData['addressOne']}}</li>
					@else
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : {{$ThemeData['addressTwo']}}</li>
					@endif

					@if($ThemeData['emailOne'])
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="{{$ThemeData['emailOne']}}">{{$ThemeData['emailOne']}}</a></li>
					@else
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="{{$ThemeData['emailTwo']}}">{{$ThemeData['emailTwo']}}</a></li>
					@endif
					

					@if($ThemeData['numberOne'])
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : {{$ThemeData['numberOne']}}</li>
					@else
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : {{$ThemeData['numberTwo']}}</li>
					@endif

				</ul>
			</div>

			<div class="col-md-1">
			</div>
			<div class="col-md-2 sign-gd">
				<h4>Category</h4>
				<ul>
					@if($allManufactures)
					@php
						$i=0;
					@endphp
					@foreach($allManufactures as $Manufacture)
					<li><a href="{{ url('/viewManufactureProduct/'.$Manufacture->id) }}">{{$Manufacture->manufactureName}}</a></li>

					@php
						$i++;
						if($i==6)
						{
							break;
						}
					@endphp
					@endforeach
					@endif
				</ul>
			</div>	
			
			<div class="col-md-3 sign-gd">
				<h4>Terms & Condition</h4>
				<p style="color: #848484;line-height: 2em;font-size: 14px;font-size:13px;text-align:justify;">This is an awesome online shop. You can buy any product from this site easily. We have some rules and condition for you. You should paid money when you order in cash on deliver. For more rules and condition contact {{$ThemeData['numberOne']}}</p>
			</div>	
		</div>

		<div class="clearfix"></div>
		<p class="copy-right">{{ $ThemeData['copyright'] }}</p>
	</div>
</div>

<script type="text/javascript">
    
    jQuery(function($){

        $('.add_to_cart').on('click',function(e){
            e.preventDefault();
            var cartButton = $(this);
            var proId = $(this).data('id');
            var uri = '{{ url('/cart/add') }}/'+proId;

            $.ajax({
                url: uri,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(response) {
            	if(response.type == 'success')
            	{
            		$('.totalItem').html(response.totalItem)
            		$('#totalAmount').html('$ '+response.totalMoney)
            		cartButton.html('Added Successfully');
            		cartButton.removeClass('add_to_cart');
            	}
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });

        $('.add_to_wishlist').on('click',function(e){
            e.preventDefault();
            var token = '{{csrf_token()}}';
            var wishlistButton = $(this);
            var proId = $(this).data('proid');
            var customerId = $(this).data('customerid');
            var uri = '{{ url('/wishlist/add') }}';

            $.ajax({
                url: uri,
                type: 'POST',
                dataType: 'json',
                data:{'proId': proId,'customerId' : customerId,'_token' :token}
            })
            .done(function(response) {
            	if(response.type == 'success')
            	{
            		$('.totalWishlist').html(response.totalWishlist)
            		wishlistButton.html('Added Successfully');
            	}
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        });


    });

</script>