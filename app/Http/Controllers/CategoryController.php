<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function categories(){
        /*
            get all the categories belongs with 
            Category model -> section & parentcategory relation.
        */
        
        $categories=Category::with(['section','parentcategory'])->get()->toArray();
        // dd($categories);
        return view('admin.categories.categories')->with(compact('categories'));
    }

    // update category status
    public function updateCategoryStatus(Request $request){
        // if the request is ajax
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

    // add or edit the category portion
    public function addEditCategory(Request $request,$id=null){
        if ($id=="") {
            $title = "Add Category";
            $category = new Category();
            $getCategories=array();
            $message = "Category Added Successfully";
        }else {
            $title = "Edit Category";
            $category = Category::find($id);
            $getCategories=Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
            $message = "Category Updated Successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            if ($request->hasFile('category_image')) {
                $image_tmp = $request->file('category_image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111,99999).".".$extension;
                    $imagePath = 'admin/images/category_image/'.$imageName;
                    Image::make($image_tmp)->save($imagePath);
                }
            }

            $category->parent_id=$data['parent_id'];
            $category->section_id=$data['section_id'];
            $category->category_name =$data['category_name'];
            $category->category_image =$imageName;
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
        return view('admin.categories.add_edit_category')->with(compact('title','category','getSections','getCategories'));
    }

    public function appendCategoriesLevel(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            $getCategories=Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$data['section_id']])->get()->toArray();
            return view('admin.categories.append_categories_level')->with(compact('getCategories'));
        }
    }
}
