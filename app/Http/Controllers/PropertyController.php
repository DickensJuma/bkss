<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Photo;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomName;
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
    public function addHotel(){
        if(Auth::user()){
            return view('property.hotel.add');
        }else{
            return redirect('admin/join');
        } 
    }
    public function storeHotel(Request $request){
        if(Auth::user()){
        $data = $request->all();
        $ownerid = Auth::user()->id;
        $property = new Property;
        $property->name = $data['pname'];
        $property->rating = $data['rating'];
        $property->contact_name = $data['contact_name'];
        $property->phone = $data['phone'];
        $property->email = $data['email'];
        $property->address = $data['address1'];
        $property->address2 = $data['address2'];
        $property->country = $data['country'];
        $property->city = $data['city'];
        $property->zip = $data['zip'];
        $property->owner =  $ownerid;
        $property->admin = $ownerid;
        $property->save();
        $property_id = $property->id;
        //get room names
        $roomNames = RoomName::get();
        $room_name_dropdown = "<option>Please Select</option>";
        foreach($roomNames as $roomName){
            $room_name_dropdown .= "<option value='".$roomName->id."'>$roomName->name</option>";
        }
        //get types
        $roomTypes = Type::get();
        $room_type_dropdown = "<option>Please Select</option>";
        foreach($roomTypes as $roomType){
            $room_type_dropdown .= "<option value='".$roomType->id."'>$roomType->name</option>";
        }
        return view('property.hotel.desc',compact('property_id','room_name_dropdown','room_type_dropdown'));
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
    public function show($property_id = null, $stay=null)
    {
        //get the property
        $hotel = Property::where(['id'=>$property_id])->first();
        $hotel_data = "";
        $totalstay = (int)$stay;
        //facilities
        $facilities = $hotel->facilities()->get();
        //taxes
        $levies = $hotel->taxes()->get();
        //images
        $images = Photo::where(['p_id'=>$property_id])->get();
        //images count
        //get rooms
        $rooms = Room::where(['property'=>$hotel->id])->get();
        //dd($rooms, $totalstay);
        if($rooms->isNotEmpty()){
            foreach($rooms as $room){
                //get room name
                $room_name = RoomName::where(['id'=>$room->name])->first();
                //get the room type
                $room_type = Type::where(['id'=>$room->type])->first();
                //amenities
                $amenities = $room->amenities()->get();
                $capacity = "";
                $quantity = "<option value=''>0</option>";
                for($i=1;$i<=$room->quantity;$i++){
                    $quantity.="<option value='".$i."'>".$i."</option>";
                }
                for($i=0;$i<$room->capacity;$i++){
                    $capacity.= "<i class='fa fa-user' aria-hidden='true'></i>";
                }
                $room_charge ="";
                if(($room->offer_charge*$totalstay)<=($room->normal_charge*$totalstay) &&($room->offer_charge*$totalstay)>0){
                    $room_charge.="<p> Now: ".$room->offer_charge*$totalstay."<br>
                    Was: <strike class='text-danger'>".$room->normal_charge*$totalstay."</strike>
                    </p>";
                }else{
                    $room_charge.="<p>".$room->normal_charge*$totalstay."</p>";
                }

                $hotel_data.="<tr>
                <td>$room_name->name $room_type->name</td>
                <td> $capacity</td> 
                <td>$room_charge</td>
                <td>";
                foreach($amenities as $amenity){
                    switch($amenity->sub_cat_id){
                        case 1: $hotel_data.= $amenity->name ." Parking , ";
                        break;
                        case 2: $hotel_data.= $amenity->name ." Breakfast , ";
                        break;
                        case 3: $hotel_data.= "Staff speak ".$amenity->name ." Language , ";
                        break;
                        default: $hotel_data.= $amenity->name ." , ";
                    }
                    
                }
                $hotel_data.="</td>
                <td><Select name='quantity' required>$quantity</select></td>
                <td><a href=''>Reserve</a></td>
                </tr>";
            
            }
        }
        return view('property.room.view')->with(compact('hotel_data','hotel','levies','images','totalstay'));

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
