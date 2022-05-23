<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\CategoryController;
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


        /* SECTION ROUTE START */

        // sections
        Route::get('/sections',[SectionController::class,'sections']);

        // update section status
        Route::post('/update-section-status',[SectionController::class,'updateSectionStatus']);

        // delete section
        Route::get('/delete-section/{id}',[SectionController::class,'DeleteSection']);

        // add edit section
        Route::match(['get', 'post'],'/add-edit-section/{id?}',[SectionController::class,'addEditSection']);

        /* SECTION ROUTE END */


        /* CATEGORY ROUTE START */

        // categories route
        Route::get('/categories',[CategoryController::class,'categories']);

        // update category status
        Route::post('/update-category-status',[CategoryController::class,'updateCategoryStatus']);

        // add edit category
        Route::match(['get', 'post'],'/add-edit-category/{id?}',[CategoryController::class,'addEditCategory']);

        // append categories level
        Route::get('/append-categories-level',[CategoryController::class,'appendCategoriesLevel']);

        /* CATEGORY ROUTE END */


        /* BRAND ROUTE START */

        // brands
        Route::get('/brands',[BrandController::class,'brands']);

        // update brand status
        Route::post('/update-brand-status',[BrandController::class,'updateBrandStatus']);

        // delete brand
        Route::get('/delete-brand/{id}',[BrandController::class,'DeleteBrand']);

        // add edit brand
        Route::match(['get', 'post'],'/add-edit-brand/{id?}',[BrandController::class,'addEditBrand']);

        /* BRAND ROUTE END */


        /* PRODUCTS ROUTE START */
        
        //products
        Route::get('/products',[ProductController::class,'products']);

        // update product status
        Route::post('/update-product-status',[ProductController::class,'updateProductStatus']);

        // delete product
        Route::get('/delete-product/{id}',[ProductController::class,'DeleteProduct']);

        // add edit product
        Route::match(['get', 'post'],'/add-edit-product/{id?}',[ProductController::class,'addEditProduct']);
    });
});
