<?php

use App\Http\Controllers\AmenityController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SearchController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::match(['get', 'post'], '/search', [SearchController::class, 'search'])->name('search');
Route::get('/hotels/hotel/{id}', [PropertyController::class, 'show'])->name('property');
//property routre group
Route::group(['prefix' => 'property'], function () {
    Route::get('/add', [PropertyController::class, 'create'])->name('property.add');
    Route::get('/apartment', [PropertyController::class, 'createApartment'])->name('apartment.add');
    Route::get('/home', [PropertyController::class, 'createHome'])->name('home.add');
    Route::get('/hotel', [PropertyController::class, 'createHotel'])->name('hotel.start');
    Route::get('/hotel/add', [PropertyController::class, 'addHotel'])->name('hotel.add');
    Route::post('/hotel/add', [PropertyController::class, 'storeHotel'])->name('hotel.store');
    Route::get('/other', [PropertyController::class, 'createOther'])->name('other.add');
    Route::get('/view', [PropertyController::class, 'view'])->name('property.view');
    Route::get('/edit', [PropertyController::class, 'edit'])->name('property.edit');
    Route::get('/delete', [PropertyController::class, 'delete'])->name('property.delete');
    Route::group(['prefix' => 'room'], function () {
        Route::post('/add', [RoomController::class,'store'])->name('room.add');
    });
    Route::group(['prefix' => 'facility'], function () {
        Route::post('/add', [FacilityController::class,'store'])->name('facility.add');
    });
    Route::group(['prefix' => 'amenity'], function () {
        Route::post('/add', [AmenityController::class,'store'])->name('amenity.add');
    });
    //property images group
    Route::group(['prefix' => 'images'], function () {
        Route::post('/add', [PhotoController::class,'store'])->name('image.add');
    });
    //property images group
    Route::group(['prefix' => 'policy'], function () {
        Route::post('/add', [::class,'store'])->name('image.add');
    });
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
