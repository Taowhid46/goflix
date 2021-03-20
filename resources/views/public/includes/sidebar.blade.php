<div class="col-md-4 products-left">

			<div class="css-treeview">
				<h4>Categories</h4>

				<ul class="tree-list-pad">

				@if($allCategory)
					@foreach($allCategory as $category)
						<li><a href="{{ url('/viewCategory/'.$category->categorySlug) }}">{{ $category->categoryName }}</a></li>
					@endforeach
				@endif
				<?php 

					$categoryName = [];
					$categorySlug = [];
				if(!empty($saleCategories)){

					foreach ($saleCategories as $value) {
						$categoryName[] = $value->categoryName;
						$categorySlug[] = $value->categorySlug;
					}
					$name = array_unique($categoryName);
					$slug = array_unique($categorySlug);
				}
				?>

				@if(count($name) > 0)
					<li>
						<input type="checkbox" checked="checked" id="item-2" />
						<label for="item-2">Best Offers</label>
						
						<ul>
							@php
							$i=0;
							@endphp
							@foreach($name as $saleCategory)
								<li><a href="{{ url('/viewSaleProduct/'.$slug[$i]) }}">{{ $saleCategory }}</a></li>
								@php
								$i++;
								@endphp
							@endforeach
						</ul>
					</li>
				@endif


				</ul>

			</div>

			<br>

			<div class="css-treeview">
				<h4>Brands</h4>

				<ul class="tree-list-pad">

				@if($allManufactures)
					@foreach($allManufactures as $Manufacture)
						<li><a href="{{ url('/viewManufactureProduct/'.$Manufacture->id) }}">{{ $Manufacture->manufactureName }}</a></li>
					@endforeach
				@endif


				</ul>

			</div>


			<div class="clearfix"></div>
		</div>