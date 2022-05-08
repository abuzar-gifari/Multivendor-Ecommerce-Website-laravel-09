<?php

namespace App\Http\Controllers\admin;


use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorsBankDetails;
use App\Models\VendorsBusinessDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Intervention\Image\Facades\Image;
// use Image;


class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function AdminLogin(Request $request){
        if ($request->isMethod('post')) {
            // dd($request->all());
            $data = $request->all();
            if ( Auth::guard('admin')->attempt( [ "email"=>$data["email"],"password"=>$data["password"],"status"=>1 ] ) ) {
                return redirect('/admin/dashboard');
            }else {
                return redirect()->back()->with('error_msg','Invalid email or password');
            }
        }
        return view('admin.login');
    }

    public function AdminLogout(Request $request){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function UpdateAdminDetails(Request $request){
        if ($request->isMethod('post')) {
            // dd($request->all());

            // if ($request->hasFile('admin_img')) {
            //     $image_tmp=$request->file('admin_img');
            //     if ($image_tmp->isValid()) {
            //         $extension = $image_tmp->getClientOriginalExtension();
            //         $imageName = rand(11,99999).".".$extension;
            //         $imagePath = 'admin/images/photos/'.$imageName;
            //         // Image::make($image_tmp)->save($imagePath);
            //     }
            // }
            $adminInfo = Auth::guard('admin')->user();
            // dd($adminInfo);
            if ($request->file('admin_img')){
                if(file_exists('admin/images/photos/'.$adminInfo->image)){
                    unlink('admin/images/photos/'.$adminInfo->image);
                }
                $newName = 'admin_'.time().'.'.$request->file('admin_img')->getClientOriginalExtension();
                $request->admin_img->move('admin/images/photos/',$newName);
                //$product->photo($newName);
            }

            Admin::where('id',Auth::guard('admin')->user()->id)->update([ 
                "name"=>$request->admin_name,
                "mobile"=>$request->admin_mobile,
                "image"=>$newName,
            ]);
            return redirect()->back()->with('success_msg',"Information Updated Successfully");
        }
        return view('admin.settings.update_admin_details');
    }

    public function UpdateAdminPassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                // return "true";
                if ($data['confirm_password']==$data['new_password']) {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update( [ "password"=>bcrypt( $data['new_password'] ) ] );
                    return redirect()->back()->with('success_msg','password updated successfully');
                }else {
                    return redirect()->back()->with('error_msg','your confirm password doesn\'t match with new password');
                }
            }else {
                return redirect()->back()->with('error_msg','your current password is incorrect');
            }    
        }
        $adminDetails = Admin::where("email",Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password',compact('adminDetails'));
    }
    
    public function checkAdminPassword(Request $request){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
    }

    public function UpdateVendorDetails($slug,Request $request){
        if ($slug=="personal") {
            $vendorDetails = Vendor::where("id",Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            // dd($vendorDetails);
            if ($request->isMethod('post')) {
                $data = $request->all();
                // dd($data);
                $vendorInfo = Auth::guard('admin')->user();
                // dd($vendorInfo);
                if ($request->file('vendor_personal_image')){
                    $newName = 'vendor_'.time().'.'.$request->file('vendor_personal_image')->getClientOriginalExtension();
                    $request->vendor_personal_image->move('admin/images/vendors/',$newName);
                    
                    Admin::where('id',Auth::guard('admin')->user()->id)->update([
                        "image"=>$newName,
                    ]);    
                }

                Admin::where('id',Auth::guard('admin')->user()->id)->update([ 
                    "name"=>$data['vendor_personal_name'],
                    "mobile"=>$data['vendor_personal_mobile'],
                    // "image"=>$newName,
                ]);
    
                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update([
                    "name"=>$data['vendor_personal_name'],
                    "address"=>$data['vendor_personal_address'],
                    "city"=>$data['vendor_personal_city'],
                    "state"=>$data['vendor_personal_state'],
                    "country"=>$data['vendor_personal_country'],
                    "pincode"=>$data['vendor_personal_pincode'],
                    "mobile"=>$data['vendor_personal_mobile']
                ]);
                return redirect()->back()->with('success_msg',"Information Updated Successfully");
            }
        }else if ($slug=="business") {
            $vendorDetails = VendorsBusinessDetails::where("vendor_id",Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            
            if ($request->isMethod('post')) {
                $data = $request->all();
                if ($request->file('address_proof_image')){
                    $newName = 'address_proof_'.time().'.'.$request->file('address_proof_image')->getClientOriginalExtension();
                    $request->address_proof_image->move('admin/images/proofs/',$newName);
                    
                    VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
                        "address_proof_image"=>$newName,
                    ]);    
                }

                VendorsBusinessDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
                    "shop_email"=>Auth::guard('admin')->user()->email,
                    "shop_name"=>$data['shop_name'],
                    "shop_address"=>$data['shop_address'],
                    "shop_city"=>$data['shop_city'],
                    "shop_state"=>$data['shop_state'],
                    "shop_country"=>$data['shop_country'],
                    "shop_pincode"=>$data['shop_pincode'],
                    "shop_mobile"=>$data['shop_mobile'],
                    "shop_website"=>$data['shop_website'],
                    "address_proof"=>$data['address_proof'],
                    "business_license_number"=>$data['business_license_number'],
                    "gst_number"=>$data['gst_number'],
                    "pan_number"=>$data['pan_number'],
                ]);
                return redirect()->back()->with('success_msg',"Information Updated Successfully");
            }

        }else if($slug=="bank"){
            $vendorDetails = VendorsBankDetails::where("vendor_id",Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            
            if ($request->isMethod('post')) {

                $data = $request->all();

                VendorsBankDetails::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
                    "account_holder_name"=>$data['account_holder_name'],
                    "bank_name"=>$data['bank_name'],
                    "account_number"=>$data['account_number'],
                    "bank_ifsc_code"=>$data['bank_ifsc_code'],
                ]);
                
                return redirect()->back()->with('success_msg',"Information Updated Successfully");    
            }
            
        }
        return view('admin.settings.update_vendor_details')->with(compact('slug','vendorDetails'));
    }
}
