@extends('admin.master')
@section('content')


<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/tag/list') }}"><button class="btn btn-sm btn-danger">Tag List</button></a>
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
                            Add Tag
                        </header>
                        <div class="panel-body panel_short">
                            <div class=" form">
                                <!-- <form class="cmxform form-horizontal " id="commentForm" method="get" action="" novalidate="novalidate"> -->
                                {{ Form::open(['url' => '/tag/save','class' => 'cmxform form-horizontal','method' => 'POST']) }}
                                    <div class="form-group ">
                                        <label for="tagname" class="control-label col-lg-3">Tag Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="tagname" name="tagName" minlength="2" type="text" required="">
                                            <span class="text-danger">{{ $errors->has('tagName') ? $errors->first('tagName') : '' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="status" class="control-label col-lg-3">Status</label>
                                        <div class="col-lg-6">
                                            <select class="form-control " id="status" name="status" required="">
                                                <option value="">Select Any One</option>
                                            	<option value="1">Publish</option>
                                            	<option value="0">Not Publish</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                <!-- </form> -->
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </section>
                </div>
            </div>
@endsection