<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function listUser()
    {
    	$users = User::paginate(10);
    	return view('admin.user.userList',['users' => $users]);
    }

    public function addUser()
    {
		return view('admin.user.addUser');
    }
    public function deleteUser($id)
    {

        $User = User::find($id);
        $User->delete();

        return redirect('/user/list')->with('message','User Deleted Successfully !)');
    }



    public function createUser(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required|string|max:255',
            'number' => 'required|string|max:14',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/user/list')->with('message','User Added Successfully !)');

    }

}
