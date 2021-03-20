<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function createCategory()
    {
    	return view('admin.category.createCategory');
    }

    public function storeCategory(Request $request)
    {
        $this->validate($request,[
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'status' => 'required'
        ]);
        
    	//return $request->all();
    	//1st Way (Elocuent)
    	// $category = new Category();
    	// $category->categoryName = $request->categoryName;
    	// $category->categoryDescription = $request->categoryDescription;
    	// $category->status = $request->status;
    	// $category->save();

    	//2nd Way (Elocuent)
    	//Category::create( $request->all() );
    	//return 'Category Save Successfully';

        //3rd Way (Query Builder)
        DB::table('categories')->insert([
            'categoryName'  =>  $request->categoryName,
            'categorySlug'  =>  str_slug($request->categoryName),
            'categoryDescription'  =>  $request->categoryDescription,
            'status'  =>  $request->status
        ]);
        return redirect('/category/add')->with('message','Category Added Successfully');

    }


    public function listCategory()
    {
        $categories = Category::all();
        return view('admin.category.listCategory',['categories' => $categories]);
    }


    public function editCategory($id)
    {
        $categoryById = Category::where('id',$id)->first();
        return view('admin.category.editCategory',['single_category' => $categoryById]);
    }


    public function updateCategory(Request $request)
    {
        //return $request->categoryId;
        $this->validate($request,[
            'categoryName' => 'required',
            'categoryDescription' => 'required',
            'status' => 'required'
        ]);

        $category = Category::find($request->categoryId);
        $category->categoryName = $request->categoryName;
        $category->categorySlug = str_slug($request->categoryName);
        $category->categoryDescription = $request->categoryDescription;
        $category->status = $request->status;
        $category->save();

        return redirect('/categry/list')->with('message','Category Updated Successfully');
    }

    public function deleteCategory($id)
    {
        //return $id;
        $category = Category::find($id);
        $category->delete();
        return redirect('/categry/list')->with('message','Category Deleted Successfully');
    }


    public function addCategoryByModal(Request $request)
    {
        $addCategory = new Category();
        $addCategory->categoryName = $request->categoryName;
        $addCategory->categorySlug = str_slug($request->categoryName);
        $addCategory->categoryDescription = $request->categoryDescription;
        $addCategory->status = 1;
        $addCategory->save();
        $last_id = $addCategory->id;
        $result = [
            'msg' => 'Category Added Successfully ! Thank You :)',
            'success' => true,
            'type' => 'success',
            'last_id' => $last_id
        ];
        return json_encode($result);
    }

}
