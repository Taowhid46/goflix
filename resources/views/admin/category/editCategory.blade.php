@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/category/add') }}"><button class="btn btn-sm btn-danger">Add New Category</button></a>
      <a href="{{ url('/categry/list') }}"><button class="btn btn-sm btn-danger">Category List</button></a>
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
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Edit Category
            </header>
            <div class="panel-body panel_short">
                <div class=" form">
                    <!-- <form class="cmxform form-horizontal " id="commentForm" method="get" action="" novalidate="novalidate"> -->
                    {{ Form::open(['url' => '/category/update','class' => 'cmxform form-horizontal','method' => 'POST','id' => 'editCategoryForm']) }}
                        <div class="form-group ">
                            <label for="categoryname" class="control-label col-lg-3">Category Name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="categoryname" name="categoryName" minlength="2" type="text" value="{{ $single_category->categoryName }}" required="">
                                <input class=" form-control" id="categoryid" name="categoryId" type="hidden" value="{{ $single_category->id }}" required="">
                                <span class="text-danger">{{ $errors->has('categoryName') ? $errors->first('categoryName') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="categorydscription" class="control-label col-lg-3">Category Description</label>
                            <div class="col-lg-6">
                                <textarea class="form-control " id="categorydscription" name="categoryDescription" rows="10" required="">{{ $single_category->categoryDescription }}</textarea>
                                <span class="text-danger">{{ $errors->has('categoryDescription') ? $errors->first('categoryDescription') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="status" class="control-label col-lg-3">Status</label>
                            <div class="col-lg-6">
                                <select class="form-control " id="status" name="status" required="">
                                	<option value="1">Publish</option>
                                	<option value="0">Not Publish</option>
                                </select>
                                <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    <!-- </form> -->
                    {!! Form::close() !!}
                </div>

            </div>
        </section>
    </div>
</div>

<script type="text/javascript">
    
    document.forms['editCategoryForm'].elements['status'].value={{ $single_category->status }}

</script>

@endsection