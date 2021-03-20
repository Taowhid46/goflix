@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/product/list') }}"><button class="btn btn-sm btn-danger pull-right">Product List</button></a>
    </div>
</div>

<div class="row">
    <h3 class="text-center success_msg" style="color: #04004e;"></h3>
    <?php 
        if(Session::get('message'))
        {
    ?>
        <script type="text/javascript">
            jQuery(function($){
                $('.success_msg').html('<?php echo Session::get('message') ?>').fadeIn().delay(2000).fadeOut('slow');
            });
        </script>

    <?php } ?>
    <br>

    {{ Form::open(['url' => '/product/save','class' => 'cmxform form-horizontal','method' => 'POST','enctype' => 'multipart/form-data']) }}
    


    <div class="col-lg-8 col-xs-12" >
        <section class="panel">
            <header class="panel-heading">
                Add Product
            </header>
            <div class="panel-body">
                <div class=" form">
                {{ csrf_field() }}
                        <div class="form-group ">
                            <label for="productName" class="control-label col-lg-3">Product Name</label>
                            <div class="col-lg-7">
                                <input class=" form-control" id="productName" name="productName"  type="text" required="">

                                <span class="text-danger">{{ $errors->has('productName') ? $errors->first('productName') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="productImage" class="control-label col-lg-3">Product Image</label>
                            <div class="col-lg-7">
                                <input class=" form-control" id="productImage" name="productImage"  type="file" required="">

                                <span class="text-danger">{{ $errors->has('productImage') ? $errors->first('productImage') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="productGalleryImage" class="control-label col-lg-3">Gallery Image</label>
                            <div class="col-lg-7">
                                <input class=" form-control" id="productGalleryImage" name="productGalleryImage[]"  type="file" multiple="multiple">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="productCode" class="control-label col-lg-3">Product Code</label>
                            <div class="col-lg-7">
                                <input class=" form-control" id="productCode" name="productCode"  type="text" required="">

                                <span class="text-danger">{{ $errors->has('productCode') ? $errors->first('productCode') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="productShortDescription" class="control-label col-lg-3">Short Description</label>
                            <div class="col-lg-7">
                                <textarea class="form-control " id="productShortDescription" name="productShortDescription" rows="10" required=""></textarea>
                                <span class="text-danger">{{ $errors->has('productShortDescription') ? $errors->first('productShortDescription') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="productLongDescription" class="control-label col-lg-3">Long Description</label>
                            <div class="col-lg-7">
                                <textarea class="form-control " id="productLongDescription" name="productLongDescription" rows="10"></textarea>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="productPrice" class="control-label col-lg-3">Regular Price</label>
                            <div class="col-lg-7">
                                <input class=" form-control" id="productPrice" name="productPrice"  type="text" required="">

                                <span class="text-danger">{{ $errors->has('productPrice') ? $errors->first('productPrice') : '' }}</span>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="productSalePrice" class="control-label col-lg-3">Sale Price</label>
                            <div class="col-lg-7">
                                <input class=" form-control" id="productSalePrice" name="productSalePrice"  type="text">

                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="productQuantity" class="control-label col-lg-3">Quantity</label>
                            <div class="col-lg-7">
                                <input class=" form-control" id="productQuantity" name="productQuantity"  type="text" required="">

                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="status" class="control-label col-lg-3">Status</label>
                            <div class="col-lg-7">
                                <select class="form-control " id="status" name="status" required="">
                                    <option value="">Select Any One</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Not Publish</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-7">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        </div>

                </div>

            </div>
        </section>
    </div>
    <div class="col-lg-4 col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                Add Product Category
            </header>
            <div class="panel-body" id="category-box">
                <div class="form" id="new_category_add">
   
                        @foreach($categories as $category)
                            <div class="form-group col-lg-12">
                                <div class="checkbox"> 
                                     <label><input class="check_box" type="checkbox" name="productCategory[]" value="{{ $category->id }}">{{ $category->categoryName }}</label>
                                </div>
                            </div>
                        @endforeach

                </div>

                <div class="form-group col-lg-12">
                    <button class="btn btn-sm btn-danger pull-left btnAddCategory">Add New Category</button>
                </div>

            </div>

        </section>
        {{ $errors->has('productCategory') ? $errors->first('productCategory') : '' }}
    </div>
    <div class="col-lg-4 col-xs-12" style="display:none;">
        <section class="panel">
            <header class="panel-heading">
                Add Product Tag
            </header>
            <div class="panel-body" id="tag-box">
                <div class="form">

                        <div class="form-group col-lg-12">
                            <input type="text" data-role="tagsinput" id="tags" name="tags[]"/>
                        </div>
                        

                </div>

            </div>
        </section>
    </div>

    <div class="col-lg-4 col-xs-12">
        <section class="panel">
            <header class="panel-heading">
                Add root company
            </header>
            <div class="panel-body" id="manufacture-box">
                <div class="form" id="new_manufacture_add">

   
                        @foreach($manufacturers as $manufacture)
                        <div class="form-group col-lg-12">
                            <div class="radio"> 
                                 <label><input class="check_box" type="radio" name="productManufacturers"  value="{{ $manufacture->id }}">{{ $manufacture->manufactureName }}</label>
                            </div>
                        </div>
                        @endforeach

                </div>


                <div class="form-group col-lg-12">
                    <button class="btn btn-sm btn-danger pull-left btnAddManufacture">Add New Root Company</button>
                </div>
            </div>
        </section>

        {{ $errors->has('productManufacturers') ? $errors->first('productManufacturers') : '' }}
    </div>

    <div class="col-lg-12" style="display:none;">
        <section class="panel">
            <header class="panel-heading">
                Add Product Varient
                <span class="tools pull-right">
                    <a class="fa fa-chevron-up" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body varient" style="display: none;">
                <div class="form-group add_varient">

                    <div class="col-xs-3 text-center">

                        <label for="var_size" id="label_style">Size</label>
                        <select class="form-control" id="var_size" name="var_size[]">
                            <option value="">Select Size</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size->sizeId }}">{{ $size->sizeName }}</option>
                            @endforeach
                        </select>
                        
                    </div>

                    <div class="col-lg-2 text-center">
                        <label id="label_style">Color</label>
                        <select class="form-control" id="var_color" name="var_color[]">
                            <option value="">Select Color</option>
                            @foreach($colors as $color)
                                <option value="{{ $color->colorId }}">{{ $color->colorName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-xs-2 text-center">
                      <label for="var_qty" id="label_style">Quantity</label>
                      <input class="form-control" id="var_qty" name="var_qty[]" type="number">
                    </div> 

                    <div class="col-xs-2 text-center">
                      <label for="var_price" id="label_style">Extra Price</label>
                      <input class="form-control" id="var_price" name="var_extraPrice[]" type="number">
                    </div> 



                    <div class="col-xs-1">
                        <p style="padding-bottom: 10px;">&nbsp;</p>
                        <button type="button" class="btn btn-danger plus_varient"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>  
                </div> 
             </div>
        </section>
    </div>

    {!! Form::close() !!}
</div>


@include('admin.product.ProductModal')
@include('admin.product.createProductJs')


@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/css/custom.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/css/chosen.min.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/admin/css/bootstrap-tagsinput.css') }}">
@endsection

@section('js')
    <!-- <script src="{{ asset('public/admin/js/chosen.jquery.min.js') }}"></script> -->
    <script src="{{ asset('public/admin/js/bootstrap-tagsinput.js') }}"></script>
@endsection