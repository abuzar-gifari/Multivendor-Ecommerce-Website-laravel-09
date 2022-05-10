<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
