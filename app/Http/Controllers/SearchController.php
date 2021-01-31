<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Room;

class SearchController extends Controller
{
   public function search(Request $request){
    $data = $request->all();
    $destinations = Property::where(['location' => $request->destination])->get();
    if($destinations != null){
    foreach($destinations as $destination){
        $rooms = Room::where(['property' => $destination->id])->where(['capacity'=>$request->adult])->get();
        if($rooms != null){
            foreach($rooms as $room){
                //dump($destinations,$room);
                if($room->property == $destination->id){
                $hotel = "<div class='container'>
                <div class='item'>
                <!-- listing block start  -->
                <div class='card'>
                    <div class='card-img'>
                        <a href='pages/list-single.html'> 
                        <img src='front/assets/images/listing-img-1.jpg' alt='' class='img-fluid rounded-top'></a>
                        <div class='btn-wishlist'></div>
                    </div>
                    <div class='card-body'>
                        <div class=''>
                            <h3 class='h4'> <a href='pages/list-single.html' class='text-dark'>$destination->name</a></h3>
                            <p class='text-sm font-weight-semi-bold'><i class='mdi mdi-map-marker mr-1'></i>$destination->location . $room->type</p>
                        </div>
                        <div class='d-flex justify-content-between'>
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
            </div>
            </div>";
                }
                else{

                }
            }
           
        }
        
    }
    return view('search')->with(compact('hotel','rooms'));
}else{
    echo "Nothing found";
    
}
            


   }
}
