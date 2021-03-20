<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{ url('/dashboard') }}" class="logo">
        GoFlix
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- inbox dropdown start-->

        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge bg-important">{{count($unseenOrders)}}</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p><b>New Orders</b></p>
                </li>
                <?php $i = 1;  ?>
                @if(count($unseenOrders) > 0)
                @foreach($unseenOrders as $unOrder)
                <li>
                    <a href="{{url('/order/viewOrder/'.$unOrder->id)}}">
                        <span class="photo">
                            <span class="from"><b>{{$unOrder->name}}</b></span>
                            <span class="time pull-right"><b>{{$unOrder->created_at}}</b></span>
                        </span>
                    </a>
                </li>
                <?php
                if($i == 5)
                {
                break;
                }
                $i++;
                ?>
                @endforeach
                @endif
                <li>
                    <a href="{{url('/adminOrder')}}"><b>See all Orders</b></a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="username">{{ Auth::user()->name }}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-key"></i> Log Out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>