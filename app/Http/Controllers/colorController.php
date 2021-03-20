<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;

class colorController extends Controller
{
    public function createColor()
    {
    	return view('admin.color.createColor');
    }

    public function storeColor(Request $request)
    {
    	$this->validate($request,[
            'colorName' => 'required'
        ]);

    	$color = new Color();
    	$color->colorName = $request->colorName;
    	$color->save();

    	return redirect('/color/add')->with('message','Color Added Successfuly');
    }

    public function listColor()
    {
    	$colors = Color::all();
    	return view('admin.color.colorList',['colors' => $colors]);
    }


    public function editColor($id)
    {
    	$singleColor = Color::where('colorId',$id)->first();
        return view('admin.color.editColor',['single_color' => $singleColor]);
    }


    public function updateColor(Request $request)
    {
        $this->validate($request,[
            'colorName' => 'required'
        ]);

        $color = Color::find($request->colorId);
        $color->colorName = $request->colorName;
        $color->save();

        return redirect('/color/list')->with('message','Color Updated Successfully');
    }

    public function deleteColor($id) 
    {
        $color = Color::find($id);
        $color->delete();
        return redirect('/color/list')->with('message','Color Deleted Successfully');
    }
}
