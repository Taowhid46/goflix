<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\order;
use App\Customer;
use Session;
use Cart;
use DB;

class orderController extends Controller
{

    // Start Customer Work

    public function index()
    {
        $id = Session::get('customerId');
    	$cusInfo = Customer::where('id',$id)->where('status',1)->get();
    	$cartData = cart::content();
        return view('public.order.index',compact('cartData','cusInfo'));
    }


    public function add(Request $request)
    {
    	if(count(Cart::content()) > 0)
    	{
    		$this->validate($request,[
	            'name' => 'required',
	            'number' => 'required',
	            'address' => 'required'
	        ]);
	        $customerId = Session::get('customerId');

	        $customer = Customer::find($customerId);
	        $customer->name = $request->name;
	        $customer->number = $request->number;
	        $customer->address = $request->address;
	        $customer->save();

	        $order = new order();
	        $order->customer_id = $customerId;
	        $order->payment_type = $request->payment_type;
	        $order->bkashNumber = $request->bkash_no;
	        $order->order_data = json_encode(Cart::content());
	        $order->save();

	        Cart::destroy();

	        return back()->with('successMessage','Ordered Successfully ! Thank You !');

    	}
		else
		{
			return back()->with('successMessage','Your Cart Is Empty Now !');
    	}
	}


    // End Customer Work

    // Start Admin Work

    public function getAllOrder()
    {
        // $allSeenOrder = order::whereNull('deleted_at');
        // $allSeenOrder->seen = 1;
        // $allSeenOrder->save();

    	$orders = order::whereNull('deleted_at')->paginate(10);
    	return view('admin.order.index',compact('orders'));
	}

    public function changeStatus(Request $request)
    {
	    $this->validate($request,[
            'order_id' => 'required',
            'orderStatus' => 'required'
        ]);

        $order = order::find($request->order_id);
        $order->status = $request->orderStatus;
        $order->save();

        return back()->with('success_msg','Order Status Updated Successfully');
	}


    public function viewOrder($id)
    {
        $orders = order::find($id);
        $orders->seen = 1;
        $orders->save();
        return view('admin.order.view',compact('orders'));
	}

    public function deleteOrder($id)
    {
        $order = order::find($id)->delete();
        return back()->with('success_msg','Order Deleted Successfully');
	}

    // End Admin Work

}
