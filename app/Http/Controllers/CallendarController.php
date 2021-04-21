<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class CallendarController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
    		$data = Room::whereDate('closed_from', '>=', $request->start)
                    ->whereDate('closed_to',   '<=', $request->end)
                    ->get(['id', 'name', 'closed_from', 'closed_to']);
            return response()->json($data);
    	}
        return view('property.calendar.index');

    }
    public function create(){

    }
    public function store(){
        
    }
}
