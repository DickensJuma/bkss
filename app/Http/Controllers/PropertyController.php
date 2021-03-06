<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use App\Models\Photo;
use App\Models\Facility;
use App\Models\Property;
use App\Models\RoomName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        if (Auth::user()) {
            return view('property.new');
        } else {
            return redirect('admin/join');
        }
    }
    public function createApartment()
    {
        if (Auth::user()) {
            return view('property.apartment.new');
        } else {
            return redirect('admin/join');
        }
    }
    public function createHome()
    {
        if (Auth::user()) {
            return view('property.home.new');
        } else {
            return redirect('admin/join');
        }
    }
    public function createHotel()
    {
        if (Auth::user()) {
            return view('property.hotel.new');
        } else {
            return redirect('admin/join');
        }
    }
    public function createOther()
    {
        if (Auth::user()) {
            return view('property.other.new');
        } else {
            return redirect('admin/join');
        }
    }
    public function addHotel()
    {
        if (Auth::user()) {
            return view('property.hotel.add');
        } else {
            return redirect('admin/join');
        }
    }
    public function storeHotel(Request $request)
    {
        if (Auth::user()) {
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
            foreach ($roomNames as $roomName) {
                $room_name_dropdown .= "<option value='" . $roomName->id . "'>$roomName->name</option>";
            }
            //get types
            $roomTypes = Type::get();
            $room_type_dropdown = "<option>Please Select</option>";
            foreach ($roomTypes as $roomType) {
                $room_type_dropdown .= "<option value='" . $roomType->id . "'>$roomType->name</option>";
            }
            return view('property.hotel.desc', compact('property_id', 'room_name_dropdown', 'room_type_dropdown'));
        } else {
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
    public function show($property_id = null, $stay = null)
    {
        //get the property
        $hotel = Property::where(['id' => $property_id])->first();
        $hotel_data = "";
        $totalstay = (int)$stay;
        //facilities
        $facilities = $hotel->facilities()->get();
        $facility_design = "";
        foreach ($facilities->chunk(4) as $facility) {
            $facility_design .= "<div class='row'>";
            foreach ($facility as $item) {
                $facility_design .= "<div class='col-md-3'>";
                switch ($item->sub_cat_id) {
                    case 1:
                        $facility_design .= "<i class='fas fa-parking'></i><small> " . $item->name . " Parking </small>";
                        break;
                    case 2:
                        $facility_design .= "<i class='fas fa-utensils'></i><small> " . $item->name . " Breakfast Available </small>";
                        break;
                    case 3:
                        $facility_design .= "<i class='fas fa-language'></i><small> Our staff speak " . $item->name . " Language </small>";
                        break;
                    case 4:
                        $facility_design .= "<i class='fas fa-medkit'></i><small> " . $item->name . " </small>";
                        break;
                    case 5:
                        $facility_design .= "<i class='fas fa-arrows-alt-h'></i><small> " . $item->name . " </small>";
                        break;
                }
                $facility_design .= "</div>";
            }
            $facility_design .= "</div>";
        }

        //taxes
        $levies = $hotel->taxes()->get();
        //images
        $images = Photo::where(['p_id' => $property_id])->get();
        //images count
        //get rooms
        $rooms = Room::where(['property' => $hotel->id])->where(['status'=>1])->get();
        //dd($rooms, $totalstay);
        if ($rooms->isNotEmpty()) {
            foreach ($rooms as $room) {
                //get room name
                $room_name = RoomName::where(['id' => $room->name])->first();
                //get the room type
                $room_type = Type::where(['id' => $room->type])->first();
                //amenities
                $amenities = $room->amenities()->get();
                //get rate plans
                $rate_plans = DB::table('rate_plan_room')
                    ->join('rate_plans', 'rate_plan_room.rate_plan_id', 'rate_plans.id')
                    ->select('rate_plan_room.*', 'rate_plans.name As plan')
                    ->where(['room_id' => $room->id])->get();
                $capacity = "";
                $quantity = "<option value=''>0</option>";
                for ($i = 1; $i <= $room->quantity; $i++) {
                    $quantity .= "<option value='" . $i . "'>" . $i . "</option>";
                }
                for ($i = 0; $i < $room->capacity; $i++) {
                    $capacity .= "<i class='fa fa-user' aria-hidden='true'></i>";
                }
                $room_charge = "";
                /*if(($room->offer_charge*$totalstay)<=($room->normal_charge*$totalstay) &&($room->offer_charge*$totalstay)>0){
                    $room_charge.="<p> Now: ".$room->offer_charge*$totalstay."<br>
                    Was: <strike class='text-danger'>".$room->normal_charge*$totalstay."</strike>
                    </p>";
                }else{
                    $room_charge.="<p>".$room->normal_charge*$totalstay."</p>";
                }*/

                // $hotel_data .= "<tr>
                // <td>test</td>
                // <td>Thisi sjdkhjgjrgegjghrghnj j</td>
                // <td>teskjgkrjgkerhgkghergherkgt</td>
                // </tr>";

                $hotel_data .= "
                <div class='room_outer'>
                <div class='rooms_table_div'>
                <div>Room Type</div>
                <div class='text-center'>Sleeps</div>
                <div class='details_header'>Details</div>
            </div>
                <div class='rooms_table_div w-100'>
                <div data-label='Room Type'>
                <u class='text-success'>
                <b>$room_name->name $room_type->name</b></u><br><small id='room_desc' class='d-none d-md-block d-lg-block'>";
                foreach ($amenities->chunk(3) as $amenity) {
                    foreach ($amenity as $item) {
                        $hotel_data .= $item->name . " , ";
                    }
                    $hotel_data .= " ";
                }
                $days = $totalstay > 1 ? "day" : "days";
                $hotel_data .= "</small></div>
                <div data-label='Sleeps' class='text-center'> $capacity</div>
                <div  class='more_room_details'><table class='table table-striped table_details d-none d-md-block d-lg-block'>
                <thead >
                <th>Price For
                    <span class='text-light'> $totalstay $days</span>
                </th>
                <th class='text-center text-lg-left text-md-left'>Your Choices</th>
                <th class='text-center text-lg-left text-md-left'>Select Rooms</th>
                </thead>
                ";
                foreach ($rate_plans as $rate_plan) {
                    $room_charge = "<p>$ <span>" . $rate_plan->amount * $totalstay . ".00</span></p>";

                    $hotel_data .= "<tr>
                    <td data-label=\"Price for $totalstay $days\" class='charge'>$room_charge</td>
                    <td data-label='Your Choices' class='text-success'>$rate_plan->plan</td>
                    <td data-label='Select Rooms'><Select name='$room_name->name $room_type->name $rate_plan->plan' class='quantity'>$quantity</select></td>
                    </tr>";
                }
                $hotel_data .= "</table></div>
                <div class='view_more_rooms'>
                <button type='button' class='btn btn-primary'>View details</button>
                </div>
                </div>
                </div>";
            }
        }

        return view('property.room.view')->with(compact('facility_design', 'hotel_data', 'hotel', 'levies', 'images', 'totalstay'));
    }

    public function reserve(Request $request)
    {

        return view('property.reserve');
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