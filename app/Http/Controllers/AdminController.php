<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        $request->user()->checkRoles('admin');

        return view('admin/dashboard');
    }
    public function join(){
        return view('admin.join');
    }
}
