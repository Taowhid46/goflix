@extends('admin.master')
@section('content')


<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/manufacture/list') }}"><button class="btn btn-sm btn-danger pull-right">Manufacture List</button></a>
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
                            Add Manufacture
                        </header>
                        <div class="panel-body panel_short">
                            <div class=" form">
                                {{ Form::open(['url' => '/manufacture/save','class' => 'cmxform form-horizontal','method' => 'POST']) }}
                                    <div class="form-group ">
                                        <label for="manufactureName" class="control-label col-lg-3">Manufacture Name</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="manufactureName" name="manufactureName" minlength="2" type="text" required="">
                                            <span class="text-danger">{{ $errors->has('manufactureName') ? $errors->first('manufactureName') : '' }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="manufactureDescription" class="control-label col-lg-3">Manufacture Description</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " id="manufactureDescription" name="manufactureDescription" rows="10" required=""></textarea>
                                            <span class="text-danger">{{ $errors->has('manufactureDescription') ? $errors->first('manufactureDescription') : '' }}</span>
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