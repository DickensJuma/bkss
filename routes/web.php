<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevyController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AmenityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RatePlanController;
use App\Http\Controllers\CallendarController;
use App\Http\Controllers\PageScoreController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeneralInformationController;

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
Route::get('/hotels/hotel/{id}/{stay}', [PropertyController::class, 'show'])->name('property');
Route::post('/hotels/hotel/{id}/{stay}', [PropertyController::class, 'reserve']);
Route::get('/reserve', function () {
    $details = ['title' => 'Booking Confirmation', 'body' => 'This is the room'];
    \Mail::to('545d9e695b-01509b@inbox.mailtrap.io')->send(new \App\Mail\Sendmail($details));
    echo "Email sent!";
});
Route::get('/mail-client', function () {
    $details = ['title' => 'Booking Confirmation', 'body' => 'This is the room'];
    \Mail::to('545d9e695b-01509b@inbox.mailtrap.io')->send(new \App\Mail\ClientMail($details));
    echo "Email sent!";
});
//property routre group
Route::group(['prefix' => 'property'], function () {
    Route::get('/add', [PropertyController::class, 'create'])->name('property.add');
    Route::get('/apartment', [PropertyController::class, 'createApartment'])->name('apartment.add');
    Route::get('/home', [PropertyController::class, 'createHome'])->name('home.add');
    Route::get('/hotel', [PropertyController::class, 'createHotel'])->name('hotel.start');
    Route::get('/hotel/add', [PropertyController::class, 'addHotel'])->name('hotel.add');
    Route::post('/hotel/add', [PropertyController::class, 'storeHotel'])->name('hotel.store');
    Route::get('/other', [PropertyController::class, 'createOther'])->name('other.add');
    Route::get('/', [PropertyController::class, 'view'])->name('property.index');
    Route::get('/view/{property}', [PropertyController::class, 'view'])->name('property.show');
    Route::get('/edit', [PropertyController::class, 'edit'])->name('property.edit');
    Route::get('/delete', [PropertyController::class, 'delete'])->name('property.delete');
    Route::get('/page/score', [PageScoreController::class, 'index'])->name('property.pageScore');
    Route::get('/general/info', [GeneralInformationController::class, 'index'])->name('general.info');
    Route::post('/general/info', [GeneralInformationController::class, 'store']);
    Route::get('/vat/taxinfo', [LevyController::class, 'index'])->name('vat.info');


    //room routes
    Route::group(['prefix' => 'room'], function () {
        Route::get('/', [RoomController::class, 'index'])->name('room');
        Route::get('/add/{id}', [RoomController::class, 'create'])->name('room.create');
        Route::post('/add', [RoomController::class, 'store'])->name('room.add');
        Route::post('/new', [RoomController::class, 'new'])->name('room.new');
        Route::post('/manage', [RoomController::class, 'manage']);
        Route::match(['get', 'post'], '/on/{id}', [RoomController::class, 'turnOn'])->name('room.on');
        Route::match(['get', 'post'], '/off/{id}', [RoomController::class, 'turnOff'])->name('room.off');
        Route::match(['get', 'post'], '/adjust', [RoomController::class, 'adjustRoomsToSell'])->name('room.management');
        Route::get('/get_by_room', [RoomController::class, 'get_by_room'])->name('quantity_by_room');
    });

    //calendar routes
    Route::group(['prefix' => 'calendar'], function () {
        Route::get('/', [CallendarController::class, 'index'])->name('calendar');
        Route::post('/', [CallendarController::class, 'manage']);
        Route::get('/data', [CallendarController::class, 'getCalendarContent'])->name('calendar.content');
    });

    //facility routes
    Route::group(['prefix' => 'facility'], function () {
        Route::get('/', [FacilityController::class, 'index'])->name('facility');
        Route::post('/add', [FacilityController::class, 'store'])->name('facility.add');
    });

    //amenity routes
    Route::group(['prefix' => 'amenity'], function () {
        Route::get('/', [AmenityController::class, 'index'])->name('amenity');
        Route::post('/', [AmenityController::class, 'index']);
        Route::post('/add', [AmenityController::class, 'store'])->name('amenity.add');
    });

    //property images group
    Route::group(['prefix' => 'images'], function () {
        Route::get('/', [PhotoController::class, 'index'])->name('image.index');
        Route::post('/add', [PhotoController::class, 'store'])->name('image.add');
        Route::post('/new', [PhotoController::class, 'storeNew'])->name('image.new');
        Route::get('/main/{id}', [PhotoController::class, 'setMain'])->name('image.main');
        Route::post('/room', [PhotoController::class, 'linkToRoom'])->name('image.room.main');
    });

    //property Policies group
    Route::group(['prefix' => 'policy'], function () {
        Route::get('/', [PolicyController::class, 'index'])->name('policy');
        Route::get('/add', [PolicyController::class, 'create'])->name('policy.add');
        Route::post('/add', [PolicyController::class, 'store']);
    });

    //profile group
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::get('/add/{id}', [ProfileController::class, 'create'])->name('profile.add');
        Route::post('/add/{id}', [ProfileController::class, 'store']);
    });

    //rate plan group
    Route::group(['prefix' => 'rate'], function () {
        Route::get('/', [RatePlanController::class, 'index'])->name('room.rate.plans');
        Route::post('/', [RatePlanController::class, 'link']);
    });
});

//super admin route group
Route::group(['prefix' => 'super'], function () {
    Route::get('/', [App\Http\Controllers\SuperAdminController::class, 'index'])->name('superadminhome');
});

//Admin route group
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('adminhome');
    Route::get('/join', [App\Http\Controllers\AdminController::class, 'join'])->name('admin.join');
    Route::post('/join', [App\Http\Controllers\Auth\JoinController::class, 'register'])->name('admin.store');
});

//Vendor route group
Route::group(['prefix' => 'vendor'], function () {
    Route::get('/', [App\Http\Controllers\VendorController::class, 'index'])->name('vendorhome');
});

//User route group
Route::group(['prefix' => 'user'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('userhome');
});

//Category routes
Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::post('/', [CategoryController::class, 'store']);

    //Sub category sub route
    Route::group(['prefix' => 'sub'], function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('sub_category');
        Route::post('/', [SubCategoryController::class, 'store']);
        Route::get('/get_by_category', [SubCategoryController::class, 'get_by_category'])->name('sub_category_by_category');
    });
});

//facility routes
Route::group(['prefix' => 'facility'], function () {
    Route::get('/', [FacilityController::class, 'superIndex'])->name('property.facility');
    Route::post('/', [FacilityController::class, 'create']);
});

//amenity routes
Route::group(['prefix' => 'amenity'], function () {
    Route::get('/', [AmenityController::class, 'superIndex'])->name('property.amenity');
    Route::post('/', [AmenityController::class, 'create']);
});

//Levy routes
Route::group(['prefix' => 'tax'], function () {
    Route::get('/', [LevyController::class, 'create'])->name('tax');
    Route::post('/', [LevyController::class, 'store']);
});

//Rate routes
Route::group(['prefix' => 'rate'], function () {
    Route::get('/', [RatePlanController::class, 'create'])->name('property.rates');
    Route::post('/', [RatePlanController::class, 'store']);
});