<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request){
        $request->user()->checkRoles('admin');
        //get property
        $property = Property::where(['owner' => Auth::user()->id])->first();
        $reservations = Reservation::where(['property_id'=>$property->id])->count();
        return view('admin/dashboard',compact('reservations'));
    }
    public function join(){
        return view('admin.join');
    }
}
