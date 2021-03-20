<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;  
use Session;
use Illuminate\Http\Request;
use Response;
use App\LoginRegister;
use App\Customer;
use App\VerifyCustomer;
use App\Mail\VerifyMail;
use Mail;

class LoginRegisterController extends Controller
{

	public function index(Request $request)
	{
      
		// Validator::make($request, [
  //           'email' => 'required|string|email|max:255|unique:customers',
  //           'password' => 'required|string|min:6|',
  //       ]);

        $error = $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|',
        ]);

		$token = $request->_token;
		$email = $request->email;
		$password = $request->password;

		$checkEmail = Customer::where('email',$email)->get();

		if(count($checkEmail) > 0)
		{
			// return Response::json('error');
			return Response::json('success');
		}
		else
		{
	        $customer = Customer::create([
	            'email' => $email,
	            'password' => bcrypt($password),
	            'status' => 1,
	        ]);
	 
	        // $verifyCustomer = VerifyCustomer::create([
	        //     'customer_id' => $customer->id,
	        //     'token' => str_random(40)
	        // ]);
	 
	        // Mail::to($customer->email)->send(new VerifyMail($customer));
	 
			return Response::json('success');
	        // return $customer;

		}
	}

	public function login(Request $request)
	{
		$email = $request->email;
		$password = $request->password;

		$checkCustomer = Customer::selectRaw("Count(*) as Total")
						->where('email','=',$email)
						->where('status','=',1)
						->first();

		if(intval($checkCustomer->Total) > 0)
		{
			$getPassword = Customer::select('password','name','email','id')->where('email','=',$email)->first();
			if(password_verify($password,$getPassword->password))
			{
				Session::put('customerName',$getPassword->name);
				Session::put('customerEmail',$getPassword->email);
				Session::put('customerId',$getPassword->id);
				Session::put('IsLoggedIn',true);
				return Response::json('success');
			}else
			{
				return Response::json('error');
			}
		}
		else
		{
			return Response::json('error');
		}
	}

	public function login2(Request $request)
	{
		$email = $request->email;
		$password = $request->password;

    	$this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);


		$checkCustomer = Customer::selectRaw("Count(*) as Total")
						->where('email','=',$email)
						->where('status','=',1)
						->first();

		if(intval($checkCustomer->Total) > 0)
		{
			$getPassword = Customer::select('password','name','email','id')->where('email','=',$email)->first();
			if(password_verify($password,$getPassword->password))
			{
				Session::put('customerName',$getPassword->name);
				Session::put('customerEmail',$getPassword->email);
				Session::put('customerId',$getPassword->id);
				Session::put('IsLoggedIn',true);

				return redirect('/order')->with('successMessage','You Are Logged In Successfully !');
			}
			else
			{
				return redirect('/order')->with('successMessage','Email Or Password Does Not Match !');
			}
		}
		else
		{
			return redirect('/order')->with('successMessage','Email Or Password Does Not Match !');
		}


	}


	public function verifyCustomer($token)
    {
        $verifyCustomer = VerifyCustomer::where('token', $token)->first();
        if(isset($verifyCustomer) ){
            $customer = $verifyCustomer->customer;
            if(!$customer->status) {
                $verifyCustomer->customer->status = 1;
                $verifyCustomer->customer->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/')->with('message', "Sorry your email cannot be identified.");
        }
 
        return redirect('/')->with('status', $status);
    }

    public function logout()
    {
    	if(Session::get('customerName') !== null)
    	{
	    	Session::remove('customerName');
	    	Session::remove('customerEmail');
	    	Session::remove('customerId');
	    	Session::remove('IsLoggedIn');
	    	Session::flush();
	    	return redirect('/')->with('status','Logout Successfully ! Thanks :)');

    	}
    }



}
