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
        Route::get('/dashboard',[AdminController::class,'dashboard']);
    });
    Route::match(['get', 'post'],'/login',[AdminController::class,'AdminLogin']);
});
