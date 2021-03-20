<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\Customer;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        $unseenOrders = DB::table('orders')
              ->join('customers','orders.customer_id','=','customers.id')
              ->where('orders.seen',0)
              ->whereNull('orders.deleted_at')
              ->select('customers.name','orders.*')
              ->get();

        $orders = order::whereNull('deleted_at')->get();
        $saleOrders = order::whereNull('deleted_at')->where('status',1)->get();
        $customers = customer::whereNull('deleted_at')->get();

        return view('admin.home.homeContent',compact('orders','customers','saleOrders','unseenOrders'));
    }
}
