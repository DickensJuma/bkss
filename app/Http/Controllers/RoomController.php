<?php

namespace App\Http\Controllers;

use App\Models\Facility;
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
        <div class='card-body'>";
        if($image==NULL || $image ==""){
            $room_design .="<img src=''class='img-responsive' alt='Gallery'>
        <p>Occupancy: <b>$room->capacity guests</b></p>
        <p>Number of this type:<b>$room->quantity</b></p>
        <button class='btn btn-primary'>Edit</button>
        <button class='btn btn-danger'>Delete</button>";
        if($room->status == 1){
            $room_design .="
            <a href='".route('room.off', $room->id)."' class='btn btn-warning'>Turn off</a>
            </div>
            </div>
            </div> ";
        }else{
            $room_design .="
            <a href='".route('room.on', $room->id)."' class='btn btn-success'>Turn on</a>
            </div>
            </div>
            </div> ";
        }
        }else{
        $room_design .="<img src='".asset('uploads/property/small/'.$image->path) ."'class='img-responsive' alt='Gallery'>
        <p>Occupancy: <b>$room->capacity guests</b></p>
        <p>Number of this type:<b>$room->quantity</b></p>
        <button class='btn btn-primary'>Edit</button>
        <button class='btn btn-danger'>Delete</button>";
        if($room->status == 1){
            $room_design .="
            <a href='".route('room.off', $room->id)."' class='btn btn-warning'>Turn off</a>
            </div>
            </div>
            </div> ";
        }else{
            $room_design .="
            <a href='".route('room.on', $room->id)."' class='btn btn-success'>Turn on</a>
            </div>
            </div>
            </div> ";
        }
            }
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

        $parking_types = Facility::where(['sub_cat_id'=>1])->get();
        $parking_drop_down = "<option selected >No</option>";
        foreach($parking_types as $parking_type){
            $parking_drop_down .= "<option value='" . $parking_type->id . "'>" . $parking_type->name . "</option>"; 
        }

        $breakfast_types = Facility::where(['sub_cat_id'=>2])->get();
        $breakfast_drop_down = "<option selected >We do not offer breakfast</option>";
        foreach($breakfast_types as $breakfast_type){
            $breakfast_drop_down .= "<option value='" . $breakfast_type->id . "'>" . $breakfast_type->name . "</option>"; 
        }

        $languages = Facility::where(['sub_cat_id'=>3])->get();
        $language_drop_down = "<option selected >Select Language</option>";
        foreach($languages as $language){
            $language_drop_down .= "<option value='" . $language->id . "'>" . $language->name . "</option>"; 
        }

        $top_facilities = Facility::where(['sub_cat_id'=>6])->get();
        $top_facility_design = "";
        foreach($top_facilities->chunk(6) as $key=>$top_facility){
            $top_facility_design .= "<div class='row'>";
            foreach($top_facility as $item){
                $top_facility_design .= "<div class='col-md-4'>";
                $top_facility_design .= "<div class='form-check'>
                <input class='form-check-input' type='checkbox' value='". $item->id . "'name='facility[]'>
                <label class='form-check-label' for='facility[]'>". $item->name . "</label>
            </div>
            </div>";
            }
            $top_facility_design .= "</div>";
        }
        $property_id = $data['p_id'];
        return view('property.facility.add',compact('property_id','parking_drop_down','breakfast_drop_down', 'language_drop_down', 'top_facility_design'));
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
    public function turnOn($id = null){
        Room::where(['id'=>$id])->update(['status'=>1,'closed_from'=>NULL,'closed_to'=>NULL]);
            return redirect('/property/room')->with('successalert','The room is now available and bookable');
    }

    public function turnOff(Request $request, $id = null){
        if($request->isMethod('GET')){
           //get room
            $room_to_close = Room::where(['id'=>$id])->first();
            $room_name = Type::where(['id'=>$room_to_close->name])->first();
            return view('property.room.toggle',compact('room_to_close','room_name'));
        }else{
            Room::where(['id'=>$id])->update(['status'=>0,'closed_from'=>$request->from,'closed_to'=>$request->to]);
            return redirect('/property/room')->with('successalert','The room will not be available from: '.$request->from .' to: '.$request->to);
        }


    }

    public function adjustRoomsToSell(Request $request){
        if($request->isMethod('GET')){
            //get property
        $property = Property::where(['owner'=>auth()->user()->id])->first();
        //get rooms 
        $rooms = Room::where(['property' => $property->id])->get();
        return view('property.room.manage');

        }else{

        }

    }
}
