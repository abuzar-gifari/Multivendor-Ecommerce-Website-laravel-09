<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\SectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('/admin')->group(function(){

    Route::match(['get', 'post'],'/login',[AdminController::class,'AdminLogin']);
    
    Route::group(["middleware"=>["admin"]],function(){

        // admin dashboard route
        Route::get('/dashboard',[AdminController::class,'dashboard']);

        // update admin details route
        Route::match(['get', 'post'],'/update-admin-details',[AdminController::class,'UpdateAdminDetails']);

        // update admin password route
        Route::match(['get', 'post'],'/update-admin-password',[AdminController::class,'UpdateAdminPassword']);
        
        // check admin password route
        Route::post('/check-admin-password',[AdminController::class,'CheckAdminPassword']);
        
        // admin logout route
        Route::get('/logout',[AdminController::class,'AdminLogout']);

        // update admin status
        Route::post('/update-admin-status',[AdminController::class,'updateAdminStatus']);

        // update vendor details route
        Route::match(['get', 'post'],'/update-vendor-details/{slug}',[AdminController::class,'UpdateVendorDetails']);
        
        // view admin/subadmin/vendor
        Route::get('/admins/{type?}',[AdminController::class,'admins']);

        // view vendor details
        Route::get('view-vendor-details/{id}',[AdminController::class,'ViewVendorDetails']);

        // sections
        Route::get('/sections',[SectionController::class,'sections']);

        // update section status
        Route::post('/update-section-status',[SectionController::class,'updateSectionStatus']);

        // delete section
        Route::get('/delete-section/{id}',[SectionController::class,'DeleteSection']);


    });
});
