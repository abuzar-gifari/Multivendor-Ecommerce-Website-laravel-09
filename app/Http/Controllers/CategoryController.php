<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories(){
        $categories=Category::with(['section','parentcategory'])->get()->toArray();
        // dd($categories);
        return view('admin.categories.categories')->with(compact('categories'));
    }

    
    public function updateCategoryStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status']=="Active") {
                $status=0;
            }else {
                $status=1;
            }
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    public function addEditCategory(Request $request,$id=null){
        if ($id=="") {
            $title = "Add Category";
            $category = new Category();
            $message = "Category Added Successfully";
        }else {
            $title = "Edit Category";
            $category = Category::find($id);
            $message = "Category Updated Successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            // FOR IMAGE UPLOAD
            if ($request->file('category_image')){
                $newName = 'categories_'.time().'.'.$request->file('category_image')->getClientOriginalExtension();
                $request->category_image->move('admin/images/category_image/',$newName);
            }

            $category->parent_id=$data['parent_id'];
            $category->section_id=$data['section_id'];
            $category->category_name =$data['category_name'];
            $category->category_image =$newName;
            $category->category_discount=$data['category_discount'];
            $category->description=$data['description'];
            $category->url=$data['url'];
            $category->meta_title=$data['meta_title'];
            $category->meta_description=$data['meta_description'];
            $category->meta_keywords=$data['meta_keywords'];
            $category->status=1;
            $category->save();
            return redirect()->back()->with('success_msg',$message);
        }

        $getSections = Section::get()->toArray();
        return view('admin.categories.add_edit_category')->with(compact('title','category','getSections'));
    }
}
