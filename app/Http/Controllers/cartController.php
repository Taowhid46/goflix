<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Product;
use Cart;
use DB;


class cartController extends Controller
{
    public function index()
    {
    	$cartData = cart::content();
        return view('public.cart.index',compact('cartData'));
    }

    public function addItem($id)
    {
        // $product =  Product::all()->find($id);
        $product =  DB::table('products')
                    ->join('medias','products.productImage','=','medias.media_id')
                    ->where('products.id',$id)
                    ->select('products.*','medias.media_id as mediaId','medias.media_src')
                    ->get();

        $proId = $product[0]->id;

        $name = $product[0]->productName;
        $img = $product[0]->media_src;

        $regularPrice = $product[0]->productRegularPrice;
        $salePrice = $product[0]->productSalePrice;

        if($salePrice != '')
        {
            $price = $salePrice;
        }
        else
        {
            $price = $regularPrice;
        }

        $qty = 1;


        $result =   Cart::add([
                        'id' => $proId,
                        'name' => $name,
                        'qty' => $qty,
                        'price' => $price,
                        'options' => ['image' => $img]
                    ]);
        if($result)
        {
            $response = ['type' => 'success','totalItem' => Cart::count(),'totalMoney' => Cart::total()];
            return Response::json($response);
        }
        else
        {
            return Response::json('error');
        }

    }

    public function addItemForm(Request $request)
    {
        $proId = $request->product_id;
        $name = $request->productName;
        $code = $request->productCode;
        $qty = $request->quantity;
        $size = $request->size;
    	$color = $request->color;
    	$img = $request->ImageName;

    	$regularPrice = $request->regularPrice;
    	$salePrice = $request->salePrice;

    	if($salePrice != '')
    	{
    		$price = $salePrice;
    	}
    	else
    	{
    		$price = $regularPrice;
    	}
                           
                            
        $colorTwo = explode('.',$color);
        if(empty($colorTwo[1]))
        {
            $colorTwo[1] = 0;
        }
        $finalPrice = $colorTwo[1]+$price;

    	$result =	Cart::add([
						'id' => $proId,
						'name' => $name,
						'qty' => $qty,
						'price' => $finalPrice,
						'options' => ['image' => $img,'size' => $size,'color' => $color,'code' => $code]
					]);
    	if($result)
    	{
            return redirect('/cart')->with('c_message','Item Added Successfully');
    	}
    	else
    	{
    		return redirect('/')->with('c_message','Something Went to Wrong! Please Try Again');
    	}

    }

    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect('/cart')->with('c_message','Item Removed Successfully');
    }

    public function updateItem(Request $request)
    {
        $qty = $request->qty;
        $rid = $request->rawId;
        Cart::update($rid,$qty);
        // $cartData = Cart::show($rid);
        // return $cartData;
        // $result = ['type' => 'success','thisSubTotal' => $subtotal];
        // return Response::json($result);
        return Response::json(['type' => 'success','totalItem' => Cart::count(),'totalMoney' => Cart::total(),'subTotal' => Cart::subtotal(),'tax' => Cart::tax()]);
    }

}
