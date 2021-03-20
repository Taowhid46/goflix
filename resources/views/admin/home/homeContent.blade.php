@extends('admin.master')
@section('content')
		<div class="market-updates">

			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Customers</h4>
						<h3>{{count($customers)}}</h3>
						<p>Total Customers</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Sales</h4>
						<h3>{{count($saleOrders)}}</h3>
						<p>Complete Order</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Orders</h4>
						<h3>{{count($orders)}}</h3>
						<p>Total Orders</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	

				<!-- </div>
			</div>
		</div> -->
		<div class="agil-info-calendar">
		<!-- calendar -->
        <div class="col-md-6 w3agile-notifications">
            <div class="notifications">
                <!--notification start-->
                
                    <header class="panel-heading">
                        New Orders 
                    </header>
                    <div class="notify-w3ls">
                <?php $i = 1;  ?>
                @if(count($unseenOrders) > 0)
                @foreach($unseenOrders as $unOrder)

                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="{{url('/order/viewOrder/'.$unOrder->id)}}">{{$unOrder->name}}</a></span> send an order </li>
                                    <li class="pull-right notification-time">{{$unOrder->created_at}}</li>
                                </ul>

                            </div>
                        </div>
                <?php
                if($i == 5)
                {
                break;
                }
                $i++;
                ?>
                @endforeach
                @endif

                    </div>
                
                <!--notification end-->
                </div>
            </div>
        

			<div class="clearfix"> </div>
		</div>
@endsection