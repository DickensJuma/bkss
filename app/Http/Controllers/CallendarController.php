<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallendarController extends Controller
{
    public function index(Request $request){
        return view('property.calendar.index');

    }

    public function getCalendarContent(){
        $data = DB::table('rooms')
        ->join('types', 'rooms.name', 'types.id')
        ->select('rooms.id','types.name As title', 'rooms.closed_from As start', 'rooms.closed_to As end')
        ->where(['status' => 0])->get();
            return response()->json($data);
    }
    public function create(){

    }
    public function store(){
        
    }
}
