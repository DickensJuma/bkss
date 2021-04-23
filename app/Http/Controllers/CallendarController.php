<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class CallendarController extends Controller
{
    public function index(Request $request){
        return view('property.calendar.index');

    }

    public function getCalendarContent(){
        $data = Room::where(['status'=>0])
                //->whereDate('closed_from', '>=', $request->start)
                //->whereDate('closed_to',   '<=', $request->end)
                ->get(['id', 'name AS title', 'closed_from AS start', 'closed_to AS end']);
            return response()->json($data);
    }
    public function create(){

    }
    public function store(){
        
    }
}
