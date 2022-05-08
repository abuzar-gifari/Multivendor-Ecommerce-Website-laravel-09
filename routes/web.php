<?php

use App\Http\Controllers\admin\AdminController;
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

// OUR CUSTOM ROUTES

// admin login route
Route::prefix('/admin')->group(function(){
    Route::group(["middleware"=>["admin"]],function(){

        // admin dashboard route
        Route::get('/dashboard',[AdminController::class,'dashboard']);

        // update admin password route
        Route::match(['get', 'post'],'/update-admin-password',[AdminController::class,'UpdateAdminPassword']);
        
        // check admin password route
        Route::post('/check-admin-password',[AdminController::class,'CheckAdminPassword']);
        
        // admin logout route
        Route::get('/logout',[AdminController::class,'AdminLogout']);
        
        // update vendor details route
        Route::match(['get', 'post'],'/update-vendor-details/{slug}',[AdminController::class,'UpdateVendorDetails']);
        
    });
    Route::match(['get', 'post'],'/login',[AdminController::class,'AdminLogin']);
});
