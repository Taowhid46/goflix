@extends('public/master')

@section('title')
    Lara Shop | Order
@endsection

@section('mainContent')
@if($cartData)
<!-- //banner -->
<!-- single -->


<div class="checkout">
    <div class="container">

        @if (session('successMessage'))
            <div class="alert alert-success status_msg"></div>
            
            <script type="text/javascript">
                jQuery(function($){
                    $('.status_msg').html('<?php echo Session::get('successMessage') ?>').fadeIn().delay(2000).fadeOut('slow');
                });
            </script>
        @endif

           <div class="row">
               <div class="col-md-8">

                    @if(count($cusInfo) > 0)
                    <form action="{{url('/order/save')}}" method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Name :</label>
                            <input type="text" name="name" value="{{$cusInfo[0]->name}}" required="" class="form-control">
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email :</label>
                            <input class="form-control" type="text" name="email" value="{{$cusInfo[0]->email}}" disabled="true" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Number :</label>
                            <input class="form-control" type="text" name="number" value="{{$cusInfo[0]->number}}" required="" >
                            <span class="text-danger">{{ $errors->has('number') ? $errors->first('number') : '' }}</span>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Address :</label>
                            <textarea name="address" class="form-control">{{$cusInfo[0]->address}}</textarea>
                        <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                        </div>

                       

                        <h4 class="text-left">Payment Type :</h4>
                        <br>
                        <div class="form-group">
                           <div class="form-control">
                           <input type="radio" class="class_payment" name="payment_type" value="cash_on_delivery" checked=""> Cash on Delivery
                            </div>
                            <br>

                            <div class="form-control">
                                <input type="radio" class="class_payment" name="payment_type" value="bkash"> Bkash
                            </div>
                        </div>
                        <div class="bkash-val" style="display: none;">
                            <div class="form-group">
                             <label class="">User Mobile Number</label>
                             <input type="text" class="form-control" name="bkash_no" value="">
                            </div> 
                            <div class="form-group">
                             <label class="">Owner Bkash Number</label>
                             <input type="text" class="form-control" value="0174615045" disabled="">
                            </div> 
                        </div>


                       <input type="submit" name="submit" value="Order">
                    </form>
                    @else
                    <form action="{{url('/customer/login2')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Email :</label>
                            <input type="email" name="email" class="form-control" required="" >
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label">Password :</label>
                            <input type="password" name="password" class="form-control" required="" >
                            <span class="text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                        </div>
                       <input  style="border: none;padding: 5px 10px;color: white;background: #FDA30E;display: inline-block;" type="submit" name="submit" value="Sign-in"> -OR- <a  style="border: none;padding: 5px 10px;color: white;background: #FDA30E;display: inline-block;" href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Sign-up</span></a>
                    </form>

                    @endif

               </div>
               <div class="col-md-4">

                    @if(count($cartData) > 0)
                    <div class="checkout-left"> 
            
                        <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s" style="width:100%">
                            <h4>Shopping basket</h4>
                            <ul>
                                <li>Total <i>:</i> <span class="subTotal">TK {{ Cart::subtotal() }}</span></li>
<!--                                 <li>Tax <i>:</i> <span class="tax">TK {{ Cart::tax() }}</span></li>
                                <li>Total <i>:</i> <span class="total2">TK {{ Cart::total() }}</span></li> -->
                            </ul>
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                    @endif

               </div>
           </div>






        
    </div>

    </div>



@endif
@endsection
<!-- //single -->
