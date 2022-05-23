<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class ProductController extends Controller
{
    public function products(){
        $products=Product::with([ 'section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        } ])->get()->toArray();
        return view('admin.products.products')->with(compact('products'));
    }

    public function updateProductStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status']=="Active") {
                $status=0;
            }else {
                $status=1;
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }

    public function DeleteProduct($id){
        Product::where('id',$id)->delete();
        return redirect()->back()->with('success_msg','product deleted successfully');
    }

    
    public function addEditProduct(Request $request,$id=null){
        if ($id=="") {
            $title="Add Product";
        }else {
            $title="Edit Product";
        }
        $categories=Section::with('categories')->get()->toArray();
        // dd($categories);
        $brands = Brand::where('status',1)->get()->toArray();
        return view('admin.products.add_edit_product')->with(compact('title','categories','brands'));
    }
}
