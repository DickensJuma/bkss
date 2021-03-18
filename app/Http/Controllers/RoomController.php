<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use App\Models\Photo;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get property
        $property = Property::where(['owner'=>auth()->user()->id])->first();
        //get rooms 
        $rooms = Room::where(['property' => $property->id])->get();
        $room_design = "";
        foreach ($rooms as $room){
            //get all images for this facility
        $image = Photo::where(['r_id' => $room->id])->first();
        $room_type = Type::where(['id'=>$room->name])->first();
        $room_design .="<div class='col-4'>
        <div class='card'>
        <div class='card-header'>
          <h3 class='card-title'>"
            .$room_type->name."
          </h3>
        </div>
        <div class='card-body'>
        <img src='".asset('uploads/property/small/'.$image->path) ."'class='img-responsive' alt='Gallery'>
        <p>Occupancy: <b>$room->capacity guests</b></p>
        <p>Number of this type:<b>$room->quantity</b></p>
        <button class='btn btn-warning'>Edit</button>
        <button class='btn btn-danger'>Delete</button>
        </div>
      </div>
    </div> ";
        }
        
        return view('property.room.index',compact('room_design','property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        //get property property
        $property = Property::where(['id'=>$id])->first();
        return view('property.room.create',compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()){
        $data = $request->all();
        $room = new Room;
        $room->property = $data['p_id'];
        $room->type = $data['roomtype'];
        $room->name = $data['room_name'];
        $room->s_policy = $data['spolicy'];
        $room->quantity = $data['no'];
        $room->bed = $data['bed'];
        $room->capacity = $data['guest_no'];
        $room->normal_charge = $data['price'];
        $room->save();
        $property_id = $data['p_id'];
        return view('property.facility.add',compact('property_id'));
    }else{
        return redirect('admin/join');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
