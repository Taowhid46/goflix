<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme_options;

class ThemeOptionsController extends Controller
{
    public function index()
    {
    	$id = 1;
    	$themeData = Theme_options::where('id',$id)->first();
    	return view('admin.theme_options.theme_options',['themeData' => $themeData]);
    }

    public function updateThemeOptionSettings(Request $request)
    {

    	$this->validate($request,[

            'name'        =>      'required',
            'title'       =>      'required',
            'numberOne'   =>      'required',
            'addressOne'  =>      'required',
            'emailOne'    =>      'required',
            'copyright'   =>      'required'

        ]);

        // Add Theme Logo

        if($request->hasFile('logo'))
        {
            $mainImage = $request->file('logo');
            $getTime = $mainImage->getATime();
            $imageName = $mainImage->getClientOriginalName();
            $path      = 'public/products';
            $getImgName = explode(".",$imageName);
            $fullImgName = $getTime.$request->productName.'.'.$getImgName['1'];

            $mainImage->move($path,$fullImgName);

        }

        // $id = 1;

        $updateTheme_options = Theme_options::find($request->optionId);


        // $updateTheme_options = new Theme_options();
        // $updateTheme_options = Theme_options::where('id',$id);
        $updateTheme_options->name = $request->name;
        $updateTheme_options->title = $request->title;
        if(isset($fullImgName))
        {
        	$updateTheme_options->logo = $fullImgName;
        }
        $updateTheme_options->numberOne = $request->numberOne;
        $updateTheme_options->numberTwo = $request->numberTwo;
        $updateTheme_options->telephone = $request->telephone;
        $updateTheme_options->fax = $request->fax;
        $updateTheme_options->addressOne = $request->addressOne;
        $updateTheme_options->addressTwo = $request->addressTwo;
        $updateTheme_options->emailOne = $request->emailOne;
        $updateTheme_options->emailTwo = $request->emailTwo;
        $updateTheme_options->facebook = $request->facebook;
        $updateTheme_options->twitter = $request->twitter;
        $updateTheme_options->snapchat = $request->snapchat;
        $updateTheme_options->googlePlus = $request->googlePlus;
        $updateTheme_options->linkedIn = $request->linkedIn;
        $updateTheme_options->pinterest = $request->pinterest;
        $updateTheme_options->copyright = $request->copyright;
        $updateTheme_options->save();

    	return redirect('/theme')->with('message','Settings Updated Successfully !');

    }
}
