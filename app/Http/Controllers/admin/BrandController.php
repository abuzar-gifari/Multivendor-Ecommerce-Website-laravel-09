<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brands(){
        $brands = Brand::get()->toArray();
        return view('admin.brands.brands')->with(compact('brands'));
    }

    public function updateBrandStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status']=="Active") {
                $status=0;
            }else {
                $status=1;
            }
            Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
        }
    }
    
    public function DeleteBrand($id){
        Brand::where('id',$id)->delete();
        return redirect()->back()->with('success_msg','brand deleted successfully');
    }
    
    public function addEditBrand(Request $request,$id=null){
        if ($id=="") {
            $title = "Add Brand";
            $brand = new Brand();
            $message = "Brand Added Successfully";
        }else {
            $title = "Add Brand";
            $brand = Brand::find($id);
            $message = "Brand Updated Successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $brand->name=$data['brand_name'];
            $brand->status=1;
            $brand->save();

            return redirect()->back()->with('success_msg',$message);
        }

        return view('admin.brands.add_edit_brand')->with(compact('title','brand'));
    }
}
