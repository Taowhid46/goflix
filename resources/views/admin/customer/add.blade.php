@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">
      <a href="{{ url('/adminCustomer/list') }}"><button class="btn btn-sm btn-danger pull-right">Customer List</button></a>
    </div>
</div>



<div class="row">
                
    <div class="col-lg-12">
    @if(session('success_msg'))
        <div class="alert alert-success status_msg"></div>
        
        <script type="text/javascript">
            jQuery(function($){
                $('.status_msg').html('<?php echo Session::get('success_msg'); ?>').fadeIn().delay(2000).fadeOut('slow');
            });
        </script>
    @endif
    <br>
        <section class="panel">
            <header class="panel-heading">
                Add Customer
            </header>
            <div class="panel-body panel_short">
                <div class=" form">
                    {{ Form::open(['url' => '/adminCustomer/add','class' => 'cmxform form-horizontal','method' => 'POST']) }}
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="name" name="name" minlength="2" type="text" required="">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-3">Email</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="email" name="email" minlength="2" type="email" required="">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-3">Password</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="password" name="password" minlength="2" type="password" required="">
                                <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password-confirm" class="control-label col-lg-3">Re-Type Password</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="password-confirm" name="password_confirmation" minlength="2" type="password" required="">
                                <span class="text-danger">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="number" class="control-label col-lg-3">Number</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="number" name="number" minlength="2" type="text">
                                <span class="text-danger">{{ $errors->has('number') ? $errors->first('number') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="address" class="control-label col-lg-3">Address</label>
                            <div class="col-lg-6">
                                <textarea class="form-control " id="address" name="address" rows="10"></textarea>
                                <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="status" class="control-label col-lg-3">Status</label>
                            <div class="col-lg-6">
                                <select class="form-control " id="status" name="status">
                                	<option value="1">Active</option>
                                	<option value="0">De-active</option>
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