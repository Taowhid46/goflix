<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacture;

class manufactureController extends Controller
{
    public function createManufacture()
    {
    	return view('admin.manufacture.createManufacture');
    }
    public function storeManufacture(Request $request)
    {   
    	$this->validate($request,[
    		'manufactureName' => 'required',
    		'manufactureDescription' => 'required',
    		'status' => 'required',
    	]);

    	$manufacture = new Manufacture();
    	$manufacture->manufactureName = $request->manufactureName;
    	$manufacture->manufactureDescription = $request->manufactureDescription;
    	$manufacture->status = $request->status;
    	$manufacture->deleted = 0;
    	$manufacture->save();

    	return redirect('/manufacture/add')->with('message','Manufacture Added Successfully');
    }

    public function listManufacture()
    {
    	//$manufactures = Manufacture::all();
        $manufactures = Manufacture::all()->where('deleted',0);
    	return view('admin.manufacture.manufactureList',['manufactures' => $manufactures]);

    }

    public function editManufacture($id)
    {
    	$manufactureById = Manufacture::where('id',$id)->first();
    	return view('admin.manufacture.editManufacture',['single_manufacture' => $manufactureById]);

    }

    public function updateManufacture(Request $request)
    {
    	$this->validate($request,[
    		'manufactureName' => 'required',
    		'manufactureDescription' => 'required',
    		'status' => 'required',
    	]);

    	$manufacture = Manufacture::find($request->manufactureId);
    	$manufacture->manufactureName = $request->manufactureName;
    	$manufacture->manufactureDescription = $request->manufactureDescription;
    	$manufacture->status = $request->status;
    	$manufacture->save();

        return redirect('/manufacture/list')->with('message','Manufacture Updated Successfully');

    }

    public function deleteManufacture($id)
    {

    	$manufacture = Manufacture::find($id);
    	$manufacture->deleted = 1;
    	$manufacture->save();

        return redirect('/manufacture/list')->with('message','Manufacture Deleted Successfully');
    }

    public function addManufactureByModal(Request $request)
    {
        $addManufacture = new Manufacture();
        $addManufacture->manufactureName = $request->manufactureName;
        $addManufacture->manufactureDescription = $request->manufactureDescription;
        $addManufacture->status = 1;
        $addManufacture->deleted = 0;
        $addManufacture->save();
        $last_id = $addManufacture->id;
        $result = [
            'msg' => 'Manufacture Added Successfully ! Thank You :)',
            'success' => true,
            'type' => 'success',
            'last_id' => $last_id
        ];
        return json_encode($result);
    }

}
