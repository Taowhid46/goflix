<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{ url('/dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/theme') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Theme Settings</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Orders</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/adminOrder') }}">Order List</a></li>
                    </ul>
                </li>
                
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage User</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/user/list') }}">User List</a></li>
                        <li><a href="{{ url('/user/add') }}">Add User</a></li>
                    </ul>
                </li>
                 -->
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Customer</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/adminCustomer/list') }}">Customer List</a></li>
                        <li><a href="{{ url('/adminCustomer/add') }}">Add Customer</a></li>
                    </ul>
                </li>
                
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Slider</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/slider/list') }}">Slider List</a></li>
                        <li><a href="{{ url('/slider/add') }}">Add Slider</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Category</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/categry/list') }}">Category List</a></li>
                        <li><a href="{{ url('/category/add') }}">Add Category</a></li>
                    </ul>
                </li>
                
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Tag</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/tag/list') }}">Tag List</a></li>
                        <li><a href="{{ url('/tag/add') }}">Add Tag</a></li>
                    </ul>
                </li> -->
                
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Manufacture</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/manufacture/list') }}">Manufacture List</a></li>
                        <li><a href="{{ url('/manufacture/add') }}">Add Manufacture</a></li>
                    </ul>
                </li> -->
                
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Size</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/size/list') }}">Size List</a></li>
                        <li><a href="{{ url('/size/add') }}">Add Size</a></li>
                    </ul>
                </li> -->
                
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Color</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/color/list') }}">Color List</a></li>
                        <li><a href="{{ url('/color/add') }}">Add Color</a></li>
                    </ul>
                </li> -->
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Manage Product</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ url('/product/list') }}">Product List</a></li>
                        <li><a href="{{ url('/product/add') }}">Add Product</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>