<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralInformationController extends Controller
{
    public function index(){
        return view('property.generalinfo');
    }
    public function create(){

    }
    public function store(Request $request){
        
    }
}
