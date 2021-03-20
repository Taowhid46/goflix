@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/sliser/add') }}"><button class="btn btn-sm btn-danger">Add New Slider</button></a>
      <a href="{{ url('/slider/list') }}"><button class="btn btn-sm btn-danger">Slider List</button></a>
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
                Edit Slider
            </header>
            <div class="panel-body panel_short">
                <div class=" form">
                    {{ Form::open(['url' => '/slider/update','class' => 'cmxform form-horizontal','method' => 'POST','id' => 'editSliderForm','enctype' => 'multipart/form-data']) }}
                        
                        <input hidden type="text" name="sliderId" value="{{ $singleSlider->id }}">

                        <div class="form-group ">
                            <label for="sliImg" class="control-label col-lg-3">Slider Image</label>
                            <div class="col-lg-5">
                                <input class=" form-control" id="sliImg" name="sliImg"  type="file">

                                <span class="text-danger">{{ $errors->has('sliImg') ? $errors->first('sliImg') : '' }}</span>
                            </div>
                            <div class="col-lg-2">
                                <img class="pull-right" width="100" src="{{ asset('public/sliders/'.$singleSlider->media_src) }}">
                            </div>
                        </div>
                        <!-- <input type="text" name="" value="{{ $singleSlider->status }}"> -->


                        <div class="form-group ">
                            <label for="status" class="control-label col-lg-3">Status</label>
                            <div class="col-lg-7">
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
    
    document.forms['editSliderForm'].elements['status'].value={{ $singleSlider->status }}

</script>

@endsection