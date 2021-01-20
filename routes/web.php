<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//super admin route group
Route::group(['prefix' => 'super'], function () {
    Route::get('/', [App\Http\Controllers\SuperAdminController::class,'index'])->name('superadminhome');

});

//Admin route group
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class,'index'])->name('adminhome');

});

//Vendor route group
Route::group(['prefix' => 'vendor'], function () {
    Route::get('/', [App\Http\Controllers\VendorController::class,'index'])->name('vendorhome');

});

//User route group
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class,'index'])->name('userhome');

});
