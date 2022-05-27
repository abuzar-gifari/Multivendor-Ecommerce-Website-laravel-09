<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    // get all products along with section and category
    public function products(){
        $products=Product::with([ 'section'=>function($query){
            $query->select('id','name');
        },'category'=>function($query){
            $query->select('id','category_name');
        } ])->get()->toArray();
        return view('admin.products.products')->with(compact('products'));
    }

    // update the product status 
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

    // delete product 
    public function DeleteProduct($id){
        Product::where('id',$id)->delete();
        return redirect()->back()->with('success_msg','product deleted successfully');
    }

    // add or edit the product
    public function addEditProduct(Request $request,$id=null){
        if ($id=="") {
            $title="Add Product";
            $product = new Product();
            $message = "Product Added Successfully";
        }else {
            $title="Edit Product";
        }
        // if the request is 'post'
        if ($request->isMethod('post')) {
            $data = $request->all();

            // upload product image after resize
            // small: 250*250
            // medium: 500*500
            // large: 1000*1000
            if ($request->hasFile('main_image')) {
                $image_tmp = $request->file('main_image');
                if ($image_tmp->isValid()) {
                    // get image extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).".".$extension;
                    $largeImagePath ='front/images/product_images/large/'.$imageName;
                    $mediumImagePath ='front/images/product_images/medium/'.$imageName;
                    $smallImagePath ='front/images/product_images/small/'.$imageName;
                    // upload the large, medium, small images after resize
                    Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                    // upload the image name in the database
                    $product->product_image=$imageName;
                }
            }

            $categoryDetails = Category::find($data['category_id']);
            $product->section_id=$categoryDetails['section_id'];
            $product->category_id=$data['category_id'];
            $product->brand_id=$data['brand_id'];

            $adminType=Auth::guard('admin')->user()->type;
            $vendor_id=Auth::guard('admin')->user()->vendor_id;
            $admin_id=Auth::guard('admin')->user()->id;

            $product->admin_type = $adminType;
            $product->admin_id = $admin_id;
            if ($adminType=="vendor") {
                $product->vendor_id = $vendor_id;
            }else {
                $product->vendor_id = 0;
            }

            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];
            if (!empty($data['is_featured'])) {
                $product->is_featured = $data['is_featured'];
            }else {
                $product->is_featured = "No";
            }
            $product->status = 1;
            $product->save();
            return redirect()->back()->with('success_msg',$message);
        }
        $categories=Section::with('categories')->get()->toArray();
        // dd($categories);
        $brands = Brand::where('status',1)->get()->toArray();
        return view('admin.products.add_edit_product')->with(compact('title','categories','brands'));
    }
}
