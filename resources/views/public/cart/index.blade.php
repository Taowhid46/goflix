@extends('public/master')

@section('title')
    Lara Shop | Cart
@endsection

@section('mainContent')
@if($cartData)
<!-- //banner -->
<!-- single -->


<div class="checkout">
    <div class="container">

        @if (session('c_message'))
            <div class="alert alert-success succ_msg"></div>
            
            <script type="text/javascript">
                jQuery(function($){
                    $('.succ_msg').html('<?php echo Session::get('c_message') ?>').fadeIn().delay(2000).fadeOut('slow');
                });
            </script>
        @endif


        @if(count($cartData) > 0)
            <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Remove</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Sub-Total</th>
                        </tr>
                    </thead>
                    @php
                    $i=1;
                    @endphp
                    @foreach($cartData as $data)
                        <tr class="rem1">
                            <td class="invert">{{$i++}}</td>
                            <td class="invert-closeb">
                                <div class="rem">
                                    <a href="{{ url('/cart/remove/'.$data->rowId) }}"><div class="close1"></div></a>
                                </div>
                                <script>
                                    // $(document).ready(function(c) {
                                    // $('.close1').on('click', function(c){
                                    //     $('.rem1').fadeOut('slow', function(c){
                                    //         $('.rem1').remove();
                                    //     });
                                    //     });   
                                    // });
                               </script>
                            </td>
                            <td class="invert-image"><a href="#"><img src="{{ asset('public/products/'.$data->options->image) }}" alt=" " class="img-responsive" /></a></td>
                            <td class="invert">
                                 <div class="quantity"> 
                                    <div class="quantity-select">                           
                                        <div data-rid="{{$data->rowId}}" data-price="{{$data->price}}" class="entry value-minus">&nbsp;</div>
                                        <div class="entry value"><span>{{$data->qty}}</span></div>
                                        <div data-rid="{{$data->rowId}}" data-price="{{$data->price}}" class="entry value-plus active">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert">
                                {{$data->name}}
                                {{ $data->options->size ? 'Size : '.$data->options->size.'  ' : '' }}
                                <?php
                                    if($data->options->color):
                                        $color = explode('.',$data->options->color);
                                        echo 'Color : '.$color[0];
                                    endif;
                                ?>
                                
                            </td>
                            <td class="invert">TK{{$data->price}}</td>
                            <td class="invert price{{$data->rowId}}">TK {{$data->subTotal()}}</td>
                        </tr>

                    @endforeach


                        <script>
                            $('.value-plus').on('click', function(){

                                var divUpd = $(this).parent().find('.value');
                                var newVal = parseInt(divUpd.text(), 10)+1;
                                divUpd.text(newVal);

                                var rId = $(this).data('rid');
                                var price = $(this).data('price');
                                var appendPrice = price * newVal;
                                $('.price'+rId).html('TK '+appendPrice);
                                $.ajax({
                                    url: '{{ url('/cart/update') }}',
                                    type: 'get',
                                    dataType: 'json',
                                    data: {qty: newVal,rawId: rId},
                                })
                                .done(function(response) {
                                    if(response.type == 'success')
                                    {
                                        $('.totalItem').html(response.totalItem)
                                        $('#totalAmount').html('TK'+response.totalMoney)
                                        $('.total2').html('TK '+response.totalMoney)
                                        $('.subTotal').html('TK '+response.subTotal)
                                        console.log("success");
                                        alert('Updated Successfully');
                                    }
                                })
                                .fail(function() {
                                    console.log("error");
                                })
                                .always(function() {
                                    console.log("complete");
                                });
                                
                            });

                            $('.value-minus').on('click', function(){


                                var divUpd = $(this).parent().find('.value');
                                var newVal = parseInt(divUpd.text(), 10)-1;
                                if(newVal>=1) divUpd.text(newVal);

                                var rId = $(this).data('rid');

                                var price = $(this).data('price');
                                var appendPrice = price * newVal;
                                $('.price'+rId).html('TK '+appendPrice);

                                $.ajax({
                                    url: '{{ url('/cart/update') }}',
                                    type: 'get',
                                    dataType: 'json',
                                    data: {qty: newVal,rawId: rId},
                                })
                                .done(function(response) {
                                    if(response.type == 'success')
                                    {
                                        $('.totalItem').html(response.totalItem)
                                        $('#totalAmount').html('TK '+response.totalMoney)
                                        $('.total2').html('TK '+response.totalMoney)
                                        $('.subTotal').html('TK '+response.subTotal)
                                        console.log("success");
                                        alert('Updated Successfully');
                                    }
                                })
                                .fail(function() {
                                    console.log("error");
                                })
                                .always(function() {
                                    console.log("complete");
                                });

                            });
                        </script>
                        
                                        
                </table>
            </div>
            <div class="checkout-left"> 
                
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a href="{{ url('/') }}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                </div>
                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                    <h4>Shopping basket</h4>
                    <ul>
                        <li>Total <i>:</i> <span class="subTotal">TK {{ Cart::subtotal() }}</span></li>
<!--                         <li>Total <i>:</i> <span class="total2">TK {{ Cart::total() }}</span></li>
 -->                    </ul>

                    <div style="width: 100%;padding: 15px 25px;">
                        <a href="{{url('/order')}}"><button type="submit" style="border: none;padding: 5px 10px;color: white;background: #FDA30E;display: inline-block;">Order Now</button></a>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        @else
            <h2 class="text-center text-danger">Your Cart Is Empty</h2>
        @endif






        
    </div>

    </div>



@endif
@endsection
<!-- //single -->
