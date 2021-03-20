<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;

class sizeController extends Controller
{
    public function createSize()
    {
    	return view('admin.size.createSize');
    }

    public function storeSize(Request $request)
    {
    	$this->validate($request,[
            'sizeName' => 'required'
        ]);

    	$size = new Size();
    	$size->sizeName = $request->sizeName;
    	$size->save();

    	return redirect('/size/add')->with('message','Size Added Successfuly');
    }

    public function listSize()
    {
    	$sizes = Size::all();
    	return view('admin.size.sizeList',['sizes' => $sizes]);
    }

    public function editSize($id)
    {
    	$singleSize = Size::where('sizeId',$id)->first();
        return view('admin.size.editSize',['single_size' => $singleSize]);
    }

    public function updateSize(Request $request)
    {
    	//return $request->sizeId;

        $this->validate($request,[
            'sizeName' => 'required'
        ]);
        // $size = Size::where('sizeId',$request->sizeId);

        $size = Size::find($request->sizeId);
        $size->sizeName = $request->sizeName;
        $size->save();

        return redirect('/size/list')->with('message','Size Updated Successfully');
    }

    public function deleteSize($id) 
    {
        $size = Size::find($id);
        $size->delete();
        return redirect('/size/list')->with('message','Size Deleted Successfully');
    }
 }
