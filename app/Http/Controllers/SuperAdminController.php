<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(Request $request){
        $request->user()->checkRoles('super_admin');

        return view('super/dashboard');
    }
}
