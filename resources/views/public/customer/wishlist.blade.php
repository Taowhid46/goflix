@extends('public/master')

@section('title')
    Lara Shop | Cart
@endsection

@section('mainContent')
@if($wishlists)
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

        @if(count($wishlists) > 0)
            <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Product Name</th>
                            <th>View</th>
                            <th style="width: 13%">Remove</th>
                        </tr>
                    </thead>
                    @php
                    $i=1;
                    @endphp
                    @foreach($wishlists as $data)
                        <tr class="rem1">

                            <td class="invert">{{$i++}}</td>

                            <td class="invert">{{$data->product->productName}}</td>

                            <td class="invert"><a href="{{url('/product-details/'.$data->product->productSlug)}}" class="single-item hvr-outline-out">View</a></td>

                            <td class="invert-closeb">
                                <div class="rem">
                                    <a href="{{ url('/wishlist/delete/'.$data->id) }}" onclick="alert('Are you sure ? You Want To Delete This !')"><div class="close1"></div></a>
                                </div>
                            </td>

                        </tr>

                    @endforeach
      
                </table>
            </div>
        @else
            <h2 class="text-center text-danger">Your Wishlist Is Empty</h2>
        @endif






        
    </div>

    </div>



@endif
@endsection
<!-- //single -->
