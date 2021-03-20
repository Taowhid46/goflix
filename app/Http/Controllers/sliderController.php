<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\medias;
use App\Slider;
use DB;

class sliderController extends Controller
{
    public function listSlider()
    {
        $sliders = DB::table('sliders')
            ->join('medias','sliders.sliderImg','=','medias.media_id')
            ->orderBy('sliders.id','DESC')
            ->paginate(10);

        return view('admin.slider.slideList',['sliders' => $sliders]);
    }

    public function addSlider()
    {
    	return view('admin.slider.addSlider');
    }

    public function createSlider(Request $request)
    {


    	$this->validate($request,[
    		'sliImg' => 'required',
    		'status' => 'required'
    	]);


        //Add Slider Single Image

        if($request->hasFile('sliImg'))
        {
            $mainImage = $request->file('sliImg');
            $getTime = $mainImage->getATime();
            $imageName = $mainImage->getClientOriginalName();
            $path      = 'public/sliders';
            $getImgName = explode(".",$imageName);
            $fullImgName = $getTime.'.'.$getImgName['1'];

            $mainImage->move($path,$fullImgName);
            
            $addSingleMediaImg = new medias();
            $addSingleMediaImg->media_src = $fullImgName;
            $addSingleMediaImg->save();
            $last_media_id = $addSingleMediaImg->media_id;
        }

        $addSlider = new Slider();
        $addSlider->sliderImg = $last_media_id;
        $addSlider->status = $request->status;
        $addSlider->save();

    	return redirect('/slider/add')->with('message','Slider Added Successfully !)');

    }

    public function editSlider($id)
    {	
    	$Slider = DB::table('sliders')
            ->join('medias','sliders.sliderImg','=','medias.media_id')
            ->where('id',$id)
            ->first();
        return view('admin.slider.editSlider',['singleSlider' => $Slider]);
    }

    public function updateSlider(Request $request)
    {

        if($request->hasFile('sliImg'))
        {
            $mainImage = $request->file('sliImg');
            $getTime = $mainImage->getATime();
            $imageName = $mainImage->getClientOriginalName();
            $path      = 'public/sliders';
            $getImgName = explode(".",$imageName);
            $fullImgName = $getTime.'.'.$getImgName['1'];

            $mainImage->move($path,$fullImgName);
            
            $addSingleMediaImg = new medias();
            $addSingleMediaImg->media_src = $fullImgName;
            $addSingleMediaImg->save();
            $last_media_id = $addSingleMediaImg->media_id;
        }

        $updateSir = Slider::find($request->sliderId);
        if(isset($last_media_id))
        { 
            $updateSir->sliderImg = $last_media_id;
        }
        $updateSir->status = $request->status;
        $updateSir->save();

    	return redirect('/slider/list')->with('message','Slider Updated Successfully !)');



    }

    public function deleteSlider($id)
    {

        $Slider = Slider::find($id);
        $Slider->delete();

        return redirect('/slider/list')->with('message','Slider Deleted Successfully !)');
    }
}
