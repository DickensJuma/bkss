<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageScoreController extends Controller
{
    public function index(){
        return view('property.pagescore');
    }
}
