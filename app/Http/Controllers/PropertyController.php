<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()){
            return view('property.new');
        }else{
            return redirect('admin/join');
        }
    }
    public function createApartment(){
        if(Auth::user()){
            return view('property.apartment.new');
        }else{
            return redirect('admin/join');
        }

    }
    public function createHome(){
        if(Auth::user()){
            return view('property.home.new');
        }else{
            return redirect('admin/join');
        }
    }
    public function createHotel(){
        if(Auth::user()){
            return view('property.hotel.new');
        }else{
            return redirect('admin/join');
        }
        
    }
    public function createOther(){
        if(Auth::user()){
            return view('property.other.new');
        }else{
            return redirect('admin/join');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($property_id = null)
    {
        //get the property
        $hotel = Property::where(['id'=>$property_id])->first();
        $hotel_data = "";
        //get rooms
        $rooms = Room::where(['property'=>$hotel->id])->get();
        if($rooms->isNotEmpty()){
            foreach($rooms as $room){
                //get the room type
                $room_type = Type::where(['id'=>$room->type])->first();
                if($room->property == $hotel->id){
                    $hotel_data .= "<div class='item'>
                    <!-- listing block start  -->
                    <div class='card'>
                    <div class='card-img'>
                    <a href='pages/list-single.html'> 
                    <img src='../../front/assets/images/listing-img-1.jpg' alt='' class='img-fluid rounded-top'></a>
                    <div class='btn-wishlist'></div>
                    </div>
                    <div class='card-body'>
                    <div class=''>
                        <h3 class='h4'> <a href='pages/list-single.html' class='text-dark'>$hotel->name</a></h3>
                        <p class='text-sm font-weight-semi-bold'><i class='mdi mdi-map-marker mr-1'></i>$hotel->location . $room_type->name</p>
                    </div>
                    <div class='d-flex justify-content-between'>
                        <div class=''>
                            <span class='text-dark h5'>$room->normal_charge</span><span class='text-sm font-weight-semi-bold ml-1'>/night</span>
                        </div>
                        <div class=''>
                            <span class='text-dark h5'><a href='/hotels/hotel/".$hotel->id."' class= 'btn btn-primary'>Reserve</a></span>
                        </div>
                        <div class=''>
                            <span class='mdi mdi-star mr-1 text-warning text-sm'></span>
                            <span class='font-weight-semi-bold text-dark text-sm'>5.0(8)</span>
                        </div>
                    </div>
                    </div>
                    </div>
                    <!-- listing block close  -->
                    </div>";
                }
        }
        }else{
            $hotel_data = "<p class='text-danger'>No hotel found that can accomodate the chosen pax</p>";
        }
        return view('room.view')->with(compact('hotel_data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
