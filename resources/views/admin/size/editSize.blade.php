@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/size/list') }}"><button class="btn btn-sm btn-danger">Size List</button></a>
      <a href="{{ url('/size/add') }}"><button class="btn btn-sm btn-danger">Add New Size</button></a>
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
                            Edit Size
                        </header>
                        <div class="panel-body panel_short">
                            <div class=" form">
                                {{ Form::open(['url' => '/size/update','class' => 'cmxform form-horizontal','method' => 'POST']) }}

                                    <div class="form-group ">
                                        <label for="sizename" class="control-label col-lg-3">Size Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="sizename" name="sizeName" type="text" value="{{ $single_size->sizeName }}" required="">
                                            
                                            <input class=" form-control" id="sizeid" name="sizeId" type="hidden" value="{{ $single_size->sizeId }}" required="">

                                            <span class="text-danger">{{ $errors->has('sizeName') ? $errors->first('sizeName') : '' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                    
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </section>
                </div>
            </div>


@endsection