<?php

namespace App\Http\Controllers;

use App\wishlist;
use Illuminate\Http\Request;
use Response;
use Session;

class wishlistController extends Controller
{
    public function index()
    {
        $customerId = Session::get('customerId');
        $wishlists = wishlist::where('customer_id',$customerId)->whereNull('deleted_at')->get();
        return view('public.customer.wishlist',compact('wishlists'));

    }
    public function add(Request $request)
    {
        $wishlist = new wishlist();
        $wishlist->product_id = $request->proId;
        $wishlist->customer_id = $request->customerId;
        $result = $wishlist->save();

        $Wishlist = wishlist::where('customer_id',$request->customerId)->whereNull('deleted_at')->get();

        $totalWishlist = count($Wishlist);


        if($result)
        {
            return Response::json(['type' => 'success', 'totalWishlist' => $totalWishlist]);
        }
        else
        {
            return Response::json('error');
        }

    }

    public function delete($id)
    {
        $data = wishlist::find($id)->delete();
        return back()->with('successMessage','Deleted Successfully !');
    }
}
