@extends('public/master')

@section('title')
    Lara Shop | Profile
@endsection

@section('mainContent')

<div class="checkout">
    <div class="container">

		@if (session('profileStatus'))
		    <div class="alert alert-success status_msg"></div>
		    
		    <script type="text/javascript">
		        jQuery(function($){
		            $('.status_msg').html('<?php echo Session::get('profileStatus') ?>').fadeIn().delay(2000).fadeOut('slow');
		        });
		    </script>
		@endif

<div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed" aria-expanded="false">Profile</a>
          </h4>
        </div>

        <div id="collapse1" class="panel-collapse collapse" style="">
          <div class="panel-body">
          @if($data)
          <div class="table-responsive">
            <table class="table table-hover table-bordered text-center">
                <tbody><tr>
                    <td>Name</td>
                    <td> &nbsp;:&nbsp;</td>
                    <td>{{$data[0]->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> &nbsp;:&nbsp; </td>
                    <td>{{$data[0]->email}}</td>
                </tr>
                <tr>
                    <td>Number</td>
                    <td> &nbsp;:&nbsp; </td>
                    <td>{{$data[0]->number}}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td> &nbsp;:&nbsp; </td>
                    <td>{{$data[0]->address}}</td>
                </tr>
                <tr>
                    <td>Joined</td>
                    <td> &nbsp;:&nbsp; </td>
                    <td>{{$data[0]->created_at}}</td>
                </tr>
            </tbody>
        	</table>
          </div>
          @endif
          </div>
        </div>

      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed" aria-expanded="false">Edit Profile</a>
          </h4>
        </div>

       	@if($data)
        <div id="collapse2" class="panel-collapse collapse" style="">
          <div class="panel-body">
            
          <form class="col-md-8 col-md-offset-2" action="{{ url('customer/update') }}" method="POST" id="profile-edit-form" novalidate="novalidate">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$data[0]->id}}">
            <div class="form-group">
                <label class="control-label" for="name">Name<span> *</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{$data[0]->name}}" required="required" aria-required="true">
            </div>

            <div class="form-group ">
                <label class="control-label" for="number">Number<span> *</span></label>
                <input type="text" class="form-control" id="number" name="number" value="{{$data[0]->number}}" required="required" aria-required="true">
            </div>

            <div class="form-group ">
                <label class="control-label" for="delivery_address">Address</label>
                <textarea rows="10" class="form-control" id="delivery_address" name="address">{{$data[0]->address}}</textarea>
            </div>

            <div class="form-group ">
                <label class="control-label" for="profile_submit"></label>
                <div class="input-group">
                    <button type="submit" id="profile_submit" class="btn btn-danger">Submit</button>
                </div>
            </div>


        </form>

        </div>
        @endif
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed" aria-expanded="false">Change Password</a>
          </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse" style="">
          <div class="panel-body">
            
            <form class="col-md-8 col-md-offset-2" action="{{url('customer/changePassword')}}" method="POST" id="password-form" novalidate="novalidate">

			{{csrf_field()}}
			<input type="hidden" name="id" value="{{$data[0]->id}}">
            <div class="form-group ">
                <label class="control-label" for="old_password">Old Password<span> *</span></label>
                <input type="password" class="form-control error" id="old_password" name="old_password" required="required" aria-required="true" aria-invalid="true">
                <span class="text-danger">{{ $errors->has('old_password') ? $errors->first('old_password') : '' }}</span>
            </div>

            <div class="form-group ">
                <label class="control-label" for="new_password">New Password<span> *</span></label>
                <input type="password" class="form-control" id="new_password" name="new_password" required="required" aria-required="true">
                <span class="text-danger">{{ $errors->has('new_password') ? $errors->first('new_password') : '' }}</span>
            </div>

            <div class="form-group ">
                <label class="control-label" for="confirm_password">Confirm Password<span> *</span></label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required="required" aria-required="true">
                <span class="text-danger">{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</span>
            </div>

            <div class="form-group ">
                <label class="control-label" for="submit"></label>
                <div class="input-group">
                    <button type="submit" id="password_submit" class="btn btn-danger">Submit</button>
                </div>
            </div>


        </form>


          </div>

      
        </div>
      </div>
            <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed" aria-expanded="false">My Order</a>
          </h4>
        </div>

        <div id="collapse4" class="panel-collapse collapse" style="">
          <div class="panel-body">

                <div class="table-responsive text-center">
                    <table class="table rable-hover table-bordered">
                        <thead>
                            <tr style="background: #513d65;">
                                <td>Serial</td>
                                <td>Customer Name</td>
                                <td>Order Data</td>
                                <td>Total</td>
                                <td>Status</td>
                                <td>Order Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl=1; ?>
                            @foreach($myOrders as $order)
                            <tr>
                                <td width="5%">{{ $sl++ }}</td>
                                <td width="8%">{{ $order->customer->name }}</td>
                                <td  width="53%">
                                    <table class="table rable-hover table-bordered" style="font-size: 15px;">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Qty</td>
                                            <td>Price</td>
                                            <td>Subtotal</td>
                                            <td>Image</td>
                                            <td>tax</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <?php $datas = json_decode($order->order_data); ?>
                                        <tbody>
                                        <?php 
                                            $totalFinal = 0;
                                            $tax = 0;
                                            foreach ($datas as $data ):
                                        ?>
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->qty}}</td>
                                            <td>{{$data->price}}</td>
                                            <td>{{$data->subtotal}}</td>
                                            <td><img src="{{ asset('public/products/'.$data->options->image) }}" height="50px"></td>
                                            <td>{{$totalTax = $data->tax * $data->qty}}</td>
                                            <td>{{$total = $totalTax + $data->subtotal}}</td>
                                        </tr>
                                        <?php  
                                            $totalFinal = $total + $totalFinal;
                                            $tax = $totalTax + $tax;
                                        endforeach;
                                        ?>
                                        </tbody>
                                        </table>
                                    
                                </td>
                                <td  width="14%">With Tax : {{ $totalFinal }}<br><hr><br>Withot Tax : {{ $totalFinal-$tax }}</td>
                                <td  width="8%">{{ $order->status == '1' ? 'Completed' : 'Pending' }}</td>
                                <td  width="12%">{!! date('Y-m-d',strtotime($order->created_at)) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $myOrders->links() }}
                </div>
          </div>
        </div>

      </div>
    </div>

    </div>

</div>


@endsection
<!-- //single -->
