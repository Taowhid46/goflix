@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/tag/list') }}"><button class="btn btn-sm btn-danger">Tag List</button></a>
      <a href="{{ url('/tag/add') }}"><button class="btn btn-sm btn-danger">Add New Tag</button></a>
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
                            Edit Tag
                        </header>
                        <div class="panel-body panel_short">
                            <div class=" form">
                                {{ Form::open(['url' => '/tag/update','class' => 'cmxform form-horizontal','method' => 'POST','id' => 'editTagForm']) }}
                                    <div class="form-group ">
                                        <label for="tagname" class="control-label col-lg-3">Tag Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="tagname" name="tagName" minlength="2" type="text" value="{{ $single_tag->tagName }}" required="">
                                            
                                            <input class=" form-control" id="tagid" name="tagId" type="hidden" value="{{ $single_tag->id }}" required="">
                                            <span class="text-danger">{{ $errors->has('tagName') ? $errors->first('tagName') : '' }}</span>
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
    
    document.forms['editTagForm'].elements['status'].value={{ $single_tag->status }}

</script>

@endsection