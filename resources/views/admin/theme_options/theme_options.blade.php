@extends('admin.master')
@section('content')
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
                Theme Settings
            </header>
            <div class="panel-body">
                <div class="form">
                
                    {!! Form::open(['url' => 'theme/themeSettings','method' => 'POST','class' => 'cmxform form-horizontal','enctype' => 'multipart/form-data']) !!}
                        <!-- {{ csrf_field() }} -->
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Theme Name</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="name" name="name" type="text" required="" value="{{ $themeData->name }}">
                                <span class="text-danger">
                                	{{ $errors->has('name') ? $errors->first('name') : '' }}
                                </span>
                            </div>
                        </div>

                        <input class="form-control" name="optionId" type="hidden" value="{{ $themeData->id }}" required="">

                        <div class="form-group ">
                            <label for="title" class="control-label col-lg-3">Theme Title</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="title" name="title" type="text" required="" value="{{ $themeData->title }}">
                                <span class="text-danger">
                                	{{ $errors->has('title') ? $errors->first('title') : '' }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="logo" class="control-label col-lg-3">Theme Logo</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="logo" name="logo" type="file">
                                <span class="text-danger">
                                    {{ $errors->has('logo') ? $errors->first('logo') : '' }}
                                </span>
                            </div>
                            <div class="col-lg-3">
                                <img src="{{ asset('public/products/'.$themeData->logo) }}">
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="number" class="control-label col-lg-3">Main Phone Number</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="number" name="numberOne" type="text" required="" value="{{ $themeData->numberOne }}">
                                <span class="text-danger">
                                	{{ $errors->has('numberOne') ? $errors->first('numberOne') : '' }}
                                </span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="number" class="control-label col-lg-3">Opt Phone Number</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="number" name="numberTwo" type="text" value="{{ $themeData->numberTwo }}">
                                <span class="text-danger">
                                	{{ $errors->has('numberTwo') ? $errors->first('numberTwo') : '' }}
                                </span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="telephone" class="control-label col-lg-3">Telephone</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="telephone" name="telephone" type="text" value="{{ $themeData->telephone }}">
                                <span class="text-danger">
                                	{{ $errors->has('telephone') ? $errors->first('telephone') : '' }}
                                </span>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="fax" class="control-label col-lg-3">Fax</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="fax" name="fax" type="text" value="{{ $themeData->fax }}">
                                <span class="text-danger">
                                	{{ $errors->has('fax') ? $errors->first('fax') : '' }}
                                </span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="addressOne" class="control-label col-lg-3">Main Address</label>
                            <div class="col-lg-6">
                                <textarea class=" form-control" id="addressOne" name="addressOne" required="">{{ $themeData->addressOne }}</textarea>
                                <span class="text-danger">
                                	{{ $errors->has('addressOne') ? $errors->first('addressOne') : '' }}
                                </span>
                            </div>
                        </div>


                        <div class="form-group ">
                            <label for="addressTwo" class="control-label col-lg-3">Opt Address</label>
                            <div class="col-lg-6">
                                <textarea class=" form-control" id="addressTwo" name="addressTwo">{{ $themeData->addressTwo }}</textarea>
                                <span class="text-danger">
                                	{{ $errors->has('addressTwo') ? $errors->first('addressTwo') : '' }}
                                </span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="emailOne" class="control-label col-lg-3">Main Email</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="emailOne" name="emailOne" type="email" required="" value="{{ $themeData->emailOne }}">
                                <span class="text-danger">
                                	{{ $errors->has('emailOne') ? $errors->first('emailOne') : '' }}
                                </span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="emailTwo" class="control-label col-lg-3">Opt Email</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="emailTwo" name="emailTwo" type="email" value="{{ $themeData->emailTwo }}">
                                <span class="text-danger">
                                	{{ $errors->has('emailTwo') ? $errors->first('emailTwo') : '' }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="facebook" class="control-label col-lg-3">Messenger</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="facebook" name="facebook" type="url" value="{{ $themeData->facebook }}">
                                <span class="text-danger">
                                	{{ $errors->has('facebook') ? $errors->first('facebook') : '' }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="twitter" class="control-label col-lg-3">Twitter</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="twitter" name="twitter" type="url" value="{{ $themeData->twitter }}">
                                <span class="text-danger">
                                	{{ $errors->has('twitter') ? $errors->first('twitter') : '' }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="snapchat" class="control-label col-lg-3">Snapchat</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="snapchat" name="snapchat" type="url" value="{{ $themeData->snapchat }}">
                                <span class="text-danger">
                                	{{ $errors->has('snapchat') ? $errors->first('snapchat') : '' }}
                                </span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="googlePlus" class="control-label col-lg-3">Google-Plus</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="googlePlus" name="googlePlus" type="url" value="{{ $themeData->googlePlus }}">
                                <span class="text-danger">
                                	{{ $errors->has('googlePlus') ? $errors->first('googlePlus') : '' }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="linkedIn" class="control-label col-lg-3">LinkedIn</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="linkedIn" name="linkedIn" type="url" value="{{ $themeData->linkedIn }}">
                                <span class="text-danger">
                                	{{ $errors->has('linkedIn') ? $errors->first('linkedIn') : '' }}
                                </span>
                            </div>
                        </div>



                        <div class="form-group ">
                            <label for="copyright" class="control-label col-lg-3">Copyright</label>
                            <div class="col-lg-6">
                                <textarea class=" form-control" id="copyright" name="copyright" required="">{{ $themeData->copyright }}</textarea>
                                <span class="text-danger">
                                	{{ $errors->has('copyright') ? $errors->first('copyright') : '' }}
                                </span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="reset">Cancel</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </section>
    </div>
</div>
@endsection