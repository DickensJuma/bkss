<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Room;
use App\Models\Type;

class SearchController extends Controller
{
   public function search(Request $request){
    $data = $request->all();
    //get all hotels for the selcted destination
    $hotels = Property::where(['location' => $request->destination])->get();
    $hotel_data ="";
    //check if there are hotels in the selected destination
    if($hotels->isNotEmpty()){
        //Loop through the hotels
        foreach($hotels as $hotel){
            //get all the rooms for each hotel
            $rooms = Room::where(['property' => $hotel->id])->where(['capacity'=>$request->adult])->get();
            //check if there are rooms returned
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
                        <img src='front/assets/images/listing-img-1.jpg' alt='' class='img-fluid rounded-top'></a>
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
                                <span class='text-dark h5'>$room->normal_charge</span><span class='text-sm font-weight-semi-bold ml-1'>/night</span>
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
                $hotel_data = "<p class='text-danger'>This hotel has no rooms available</p>";
            }

        }        

    }else{
        $hotel_data = "<p class='text-danger'>No hotels are currently available in your selected location</p>";
    }
    return view('search')->with(compact('hotel_data','rooms'));
   }
}
