<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
