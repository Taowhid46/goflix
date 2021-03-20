<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use cart;
use App\Customer;
use App\order;
use Session;

class CustomerController extends Controller
{
    // Start User Method
    public function index()
    {
    	$id = Session::get('customerId');
    	$data = Customer::where('id',$id)->get();
        $myOrders = order::where('customer_id',$id)->whereNull('deleted_at')->paginate(10);
    	return view('public.customer.index',compact('data','myOrders'));
    }

    public function update(Request $request)
    {
        $profile = Customer::find($request->id);
        $profile->name = $request->name;
        $profile->number = $request->number;
        $profile->address = $request->address;
        $profile->save();


        Session::remove('customerName');
        Session::put('customerName',$request->name);

        return back()->with('profileStatus','Profile Updated SuccessFully');

    }

    public function changePassword(Request $request)
    {
    	$this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

    	if($request->new_password != $request->confirm_password)
    	{
    		return back()->with('profileStatus','Confirm Password Must Be Same');
    	}
    	else
    	{
    		$checkPassword = Customer::find($request->id)->first();
    		if(count($checkPassword) > 0)
    		{
                if(password_verify($request->old_password,$checkPassword->password))
                {

                    $profile = Customer::find($request->id);
                    $profile->password = bcrypt($request->new_password);
                    $profile->save();

                    return back()->with('profileStatus','Password Changed SuccessFully !');
                }
                else
                {
                    return back()->with('profileStatus','Old Password Does Not Match !');
                }
    		}
    		else
    		{
    			return back()->with('profileStatus','No Users Found !');
    		}
    	}

    }

    // End User Method

    // Start Admin Method
    public function getAllCustomers()
    {
        $datas = Customer::whereNull('deleted_at')->paginate(5);
        return view('admin.customer.index',compact('datas'));
    }


    public function changeStatus(Request $request)
    {
        $this->validate($request,[
            'customer_id' => 'required',
            'status' => 'required'
        ]);

        $customer = Customer::find($request->customer_id);
        $customer->status = $request->status;
        $customer->save();

        return back()->with('success_msg','Status Updated Successfully');
    }


    public function createNewCustomer()
    {
        return view('admin.customer.add');
    }


    public function addNewCustomer(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->number = $request->number;
        $customer->address = $request->address;
        $customer->status = $request->status;
        $customer->save();

        return back()->with('success_msg','Customer Added Successfully');
    }


    // End Admin Method
}
