<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class GeneralInformationController extends Controller
{
    public function index(){
        $property = Property::where(['owner'=>auth()->user()->id])->first();
        return view('property.generalinfo',compact('property'));
    }
    public function create(){

    }
    public function store(Request $request){
        
    }
}
