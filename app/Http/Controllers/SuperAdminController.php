<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(Request $request){
        $request->user()->checkRoles('super');
        $title = "Super Admin Dashboard";
        return view('super/dashboard',compact('title'));
    }
}
