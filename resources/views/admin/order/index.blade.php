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
        <section class="panel">
            <header class="panel-heading">
                Manage Orders
            </header>
            <div class="panel-body panel_short">
                <div class="table-responsive text-center">
                    <table class="table rable-hover table-bordered">
                        <thead>
                            <tr style="background: #513d65;">
                                <td>Serial</td>
                                <td>Customer Name</td>
                                <td>Order Data</td>
                                <td>Total</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl=1; ?>
                            @foreach($orders as $order)
                            <tr>
                                <td width="5%">{{ $sl++ }}</td>
                                <td width="10%">{{ $order->customer->name }}</td>
                                <td  width="54%">
                                    <table class="table rable-hover table-bordered">
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
                                <td  width="8%">With Tax : {{ $totalFinal }}<br><hr><br>Withot Tax : {{ $totalFinal-$tax }}</td>
                                <td  width="12%">
                                    <form action="{{ url('/order/status') }}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <select name="orderStatus" class="form-control">
                                            <option value="1" {{ $order->status == '1' ? 'selected' : '' }} >Completed</option>
                                            <option value="0" {{ $order->status == '0' ? 'selected' : '' }} >Pending</option>
                                        </select>
                                        <br>
                                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                                    </form>
                                </td>
                                <td  width="6%">
                                    <a href="{{ url('/order/viewOrder/'.$order->id)  }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('/order/deleteOrder/'.$order->id)  }}" onclick="return confirm('Are You Sure !');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{ $orders->links() }}
                </div>
            </div>

        </section>
    </div>
</div>

@endsection