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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/hotels/hotel/{id}', [App\Http\Controllers\PropertyController::class, 'show'])->name('property');
//property routre group
Route::group(['prefix' => 'property'], function () {
Route::get('/add', [App\Http\Controllers\PropertyController::class, 'create'])->name('property.add');
Route::get('/view', [App\Http\Controllers\PropertyController::class, 'view'])->name('property.view');
Route::get('/edit', [App\Http\Controllers\PropertyController::class, 'edit'])->name('property.edit');
Route::get('/delete', [App\Http\Controllers\PropertyController::class, 'delete'])->name('property.delete');

});

//super admin route group
Route::group(['prefix' => 'super'], function () {
    Route::get('/', [App\Http\Controllers\SuperAdminController::class,'index'])->name('superadminhome');

});

//Admin route group
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class,'index'])->name('adminhome');
    Route::get('/join', [App\Http\Controllers\AdminController::class,'join'])->name('admin.join');
    Route::post('/join', [App\Http\Controllers\Auth\JoinController::class,'register'])->name('admin.store');

});

//Vendor route group
Route::group(['prefix' => 'vendor'], function () {
    Route::get('/', [App\Http\Controllers\VendorController::class,'index'])->name('vendorhome');

});

//User route group
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class,'index'])->name('userhome');

});
