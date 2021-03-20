@extends('admin.master')
@section('content')

        <div class="form-w3layouts">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ url('/product/list') }}"><button class="btn btn-sm btn-danger">All Product</button></a>
                    <a href="{{ url('/product/add') }}"><button class="btn btn-sm btn-danger">Add New Product</button></a>
                </div>
            </div>
            <br>
            <div class="row">

            <?php if(isset($single_product)): ?>
                <div class="col-lg-8">
               
                    <section class="panel">
                        <header class="panel-heading">
                            View Product
                            <span class="tools pull-right"></span>
                        </header>

                        <div class="panel-body">
                            <div class="form">

                                <div class="form-group gap_space">
                                    <label for="product_title" class="control-label col-lg-5">Product Name</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->productName }}
                                    </div>
                                </div>


                                <div class="form-group gap_space">
                                    <label for="product_price" class="control-label col-lg-5">Regular Price</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->productRegularPrice }}
                                    </div>
                                </div>

                                <div class="form-group gap_space">
                                    <label for="product_prev_price" class="control-label col-lg-5">Sale Price</label>
                                    <div class="col-lg-7">

                                    <?php if($single_product[0]->productSalePrice): ?>
                                        
                                        {{ $single_product[0]->productSalePrice }}

                                    <?php else: ?>
                                        <p>No Sale Price</p>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group gap_space">
                                    <label for="product_prev_price" class="control-label col-lg-5">Short Description</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->productShortDescription }}
                                    </div>
                                </div>
                                <div class="form-group gap_space">
                                    <label for="product_prev_price" class="control-label col-lg-5">Long Description</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->productLongDescription }}
                                    </div>
                                </div>
                                <div class="form-group gap_space">
                                    <label for="product_code" class="control-label col-lg-5">Product Code</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->productCode }}
                                    </div>
                                </div>

                                <div class="form-group gap_space">
                                    <label for="product_qty" class="control-label col-lg-5">Product Quantity</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->productQuantity }}
                                    </div>
                                </div>

                                <div class="form-group gap_space">
                                    <label for="status" class="control-label col-lg-5">Status</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->status }}
                                    </div>
                                </div>

                                <div class="form-group gap_space">
                                    <label for="status" class="control-label col-lg-5">Manufacture Name</label>
                                    <div class="col-lg-7">
                                        {{ $single_product[0]->manufactureName }}
                                    </div>
                                </div>

                                <div class="form-group gap_space">
                                    <label for="cat" class="control-label col-lg-5">Category</label>
                                    <div class="col-lg-7">
                                    <?php if($singleProductCategories): ?>
                                        @foreach($singleProductCategories as $categories)
                                        <?php //foreach ($datas['category'] as $categories) : ?>
                                            <button class="btn btn-sm btn-success"><?php echo $categories->categoryName; ?></button>
                                        <?php //endforeach; ?>
                                        @endforeach
                                    <?php else: ?>
                                        <p>No Category Selected Yet ! :)</p>
                                    <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group gap_space">
                                    <label for="cat" class="control-label col-lg-5">Tags</label>
                                    <div class="col-lg-7">

                                    <?php if($single_product[0]->tagIds):
                                            $tags = explode(',', $single_product[0]->tagIds);
                                    ?>
                                        <?php foreach ($tags as $tags) : ?>
                                            <button class="btn btn-sm btn-success"><?php echo $tags; ?></button>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No Tag Selected Yet ! :)</p>
                                    <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group gap_space">
                                    <label for="cat" class="control-label col-lg-5">Product Variant</label>
                                    <div class="col-lg-7">
                                    <?php if(!empty($singleProductVariants[0])): 

                                    // echo "<pre>";
                                    // print_r($singleProductVariants);
                                    // exit();

                                    ?>
                                        <div class="table-responsive text-center">
                                            <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>Size</td>
                                                        <td>Color</td>
                                                        <td>Quantity</td>
                                                        <td>Extra Price</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($singleProductVariants as $variant)
                                                    <tr>
                                                        <td>{{ $variant->sizeName ? $variant->sizeName : 'NULL' }}</td>
                                                        <td>{{ $variant->colorName ? $variant->colorName : 'NULL' }}</td>
                                                        <td>{{ $variant->qty ? $variant->qty : 'NULL' }}</td>
                                                        <td>{{ $variant->extraPrice ? $variant->extraPrice : 'NULL' }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else: ?>
                                        <p>No Varriant Product Selected Yet ! :)</p>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            
                        </div>

                        </div>
                    </section>

                </div>
                <div class="col-lg-4">
               
                    <section class="panel">
                        <header class="panel-heading">
                            Product Thumb Image
                            <span class="tools pull-right"></span>
                        </header>

                        <div class="panel-body">
                            <div class="form">


                                <div class="form-group gap_space">
                                    <div class="col-lg-6 col-lg-offset-3">
                                        <img class="single_image" src="{{ asset('public/products/'.$single_product[0]->media_src) }}">
                                    </div>
                                </div>
                            
                        </div>

                        </div>
                    </section>

                </div>




                
                <div class="col-lg-4">
               
                    <section class="panel">
                        <header class="panel-heading">
                            Product Gallery Image
                            <span class="tools pull-right"></span>
                        </header>

                        <div class="panel-body">
                            <div class="form">


                                <div class="form-group gap_space">
                                    <div class="col-lg-12">
                                        <?php if(!empty($singleProductGalleryImage[0])): ?>
                                    	<?php foreach ($singleProductGalleryImage as $gallery_image) : ?>

                                            <img class="gallery_image"  src="{{ asset('public/products/'.$gallery_image->media_src) }}">

                                    	<?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No Gallery Image</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            
                        </div>

                        </div>
                    </section>

                </div>


                <?php else: ?>
                    <p>No Data Found</p>
                <?php endif; ?>
            </div>
            <!-- page end-->
        </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/css/custom.css') }}">
@endsection