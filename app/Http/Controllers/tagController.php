<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class tagController extends Controller
{
    public function createTag()
    {
    	return view('admin.tag.createTag');
    }

    public function storeTag(Request $request)
    {
    	$this->validate($request,[
            'tagName' => 'required',
            'status' => 'required'
        ]);

    	$tag = new Tag();
    	$tag->tagName = $request->tagName;
    	$tag->status = $request->status;
    	$tag->save();

    	return redirect('/tag/add')->with('message','Tag Added Successfuly');
    }

    public function listTag()
    {
    	$tags = Tag::all();
    	return view('admin.tag.tagList',['tags' => $tags]);
    }

    public function editTag($id)
    {
    	$singleTag = Tag::where('id',$id)->first();
        return view('admin.tag.editTag',['single_tag' => $singleTag]);
    }

    public function updateTag(Request $request)
    {
        $this->validate($request,[
            'tagName' => 'required',
            'status' => 'required'
        ]);

        $tag = Tag::find($request->tagId);
        $tag->tagName = $request->tagName;
        $tag->status = $request->status;
        $tag->save();

        return redirect('/tag/list')->with('message','Tag Updated Successfully');
    }

    public function deleteTag($id) 
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect('/tag/list')->with('message','Tag Deleted Successfully');
    }

    public function addTagByModal(Request $request)
    {
        $addTag = new Tag();
        $addTag->tagName = $request->tagName;
        $addTag->status = 1;
        $addTag->save();
        $lastId = $addTag->id;
        $result = [
            'msg' => 'Tag Added Successfully ! Thank You :)',
            'success' => true,
            'type' => 'success',
            'last_id' => $lastId,
        ];
        return json_encode($result);
    }
}
