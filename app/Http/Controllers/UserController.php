<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $request->user()->checkRoles('user');

        return view('user/dashboard');
    }
}
