@extends('admin.master')
@section('content')


<div class="row">
    <div class="col-lg-12">
        @if(session('success_msg'))
            <div class="alert alert-success status_msg"></div>
            
            <script type="text/javascript">
                jQuery(function($){
                    $('.status_msg').html('<?php echo Session::get('success_msg') ?>').fadeIn().delay(2000).fadeOut('slow');
                });
            </script>
        @endif
        <br>
    </div>
    <div class="col-lg-8">
        <section class="panel">
            <header class="panel-heading">
                Order Details
            </header>
            <div class="panel-body panel_short">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
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
                        <?php $datas = json_decode($orders->order_data); ?>
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
                </div>
                <div class="col-lg-6">
                    <p>Total With Tax : {{ $totalFinal }}</p>
                    <br>
                    <p>Total Withot Tax : {{ $totalFinal-$tax }}</p>
                    <br>
                </div>
                <div class="col-lg-6">
                    <form action="{{ url('/order/status') }}" method="POST" class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden" name="order_id" value="{{ $orders->id }}">
                        <select name="orderStatus" class="form-control">
                            <option value="1" {{ $orders->status == '1' ? 'selected' : '' }} >Completed</option>
                            <option value="0" {{ $orders->status == '0' ? 'selected' : '' }} >Pending</option>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </form>
                </div>
                

            

            </div>
        </section>
    </div>
    <div class="col-lg-4">
        <section class="panel">
            <header class="panel-heading">
                Customer Details
            </header>
            <div class="panel-body panel_short">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>{{$orders->customer->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{$orders->customer->email}}</td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>:</td>
                            <td>{{$orders->customer->number}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>{{$orders->customer->address}}</td>
                        </tr>
                    </table>
                </div>
                <br>
                
                @if($orders->payment_type === 'bkash')
                <p>Payment Type : {{$orders->payment_type}}</p>
                <br>
                <p>Bkash Number : {{$orders->bkashNumber}}</p>
                @else
                <p>Payment Type : {{$orders->payment_type}}</p>
                @endif
            

            </div>
        </section>
    </div>
</div>


@endsection