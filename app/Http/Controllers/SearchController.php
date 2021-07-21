<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Type;
use App\Models\Photo;
use App\Models\Property;
use App\Models\RoomName;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $data = $request->all();
        //get all hotels for the selcted destination
        $hotels = Property::where(['city' => $request->destination])->get();
        $in = Carbon::parse($request->in);
        $out = Carbon::parse($request->out);
        $stay = $in->diffInDays($out);
        $result_counter = 0;
        $hotel_data ="";
        //check if there are hotels in the selected destination
        if($hotels->isNotEmpty()){
            //Loop through the hotels
            foreach($hotels as $hotel){
                //get hotels main image
                $banner = Photo::where(['p_id'=>$hotel->id])->where(['is_main'=>1])->first();
                $altbanner = Photo::where(['p_id'=>$hotel->id])->first();
                $banner_path = "";
                $altText = "";
                if($banner!=null){
                    $banner_path = $banner->path;
                    $altText = $banner->alt_text;
                }else{
                    $banner_path = $altbanner->path;
                    $altText = $altbanner->alt_text;
                }
                //hotel rating
                $stars ="";
                for($star=0;$star<$hotel->rating;$star++){
                    $stars .="&#9734;";
                }
                $result_counter++;
                //get all the rooms for each hotel
                $room = Room::where(['property' => $hotel->id])->where('capacity','>=', $request->adult)->first();
                //check if there are rooms returned
                if($room!=null){
                    //get room name
                    $room_name = RoomName::where(['id'=>$room->name])->first();
                        //get the room type
                        $room_type = Type::where(['id'=>$room->type])->first();
                        if($room->property == $hotel->id){
                            $hotel_data .= "<div class='item'>
                                <!-- listing block start  -->
                                    <div class='card'>
                                        <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-md-3'>
                                                <div class='card-img'>
                                                    <a href='/hotels/hotel/".$hotel->id."/".$stay."'>
                                                    <img src='uploads/property/small/".$banner_path."' alt='$altText' class='img-fluid rounded-top'></a>
                                                    <div class='btn-wishlist'></div>
                                                </div>
                                            </div>
                                            <div class='col-md-9'>
                                            <div class=''>
                                            <h3 class='h4'> <a href='/hotels/hotel/".$hotel->id."/".$stay."' class='text-dark'>$hotel->name</a><span class='text-warning text-sm'>$stars</span></h3>
                                            <p class='text-sm font-weight-semi-bold'><i class='mdi mdi-map-marker mr-1'></i>$hotel->city $hotel->country</p>
                                        </div>
                                        <div class='d-flex justify-content-between'>
                                            <div class=''>
                                                <span class='text-dark h5'>$$room->normal_charge</span><span class='text-sm font-weight-semi-bold ml-1'>/night</span>
                                            </div>
                                            <div class=''>
                                                <span class='text-dark h5'><a href='/hotels/hotel/".$hotel->id."/".$stay."' class= 'btn btn-primary'>See Availability</a></span>
                                            </div>
                                            <div class=''>
                                                <span class='mdi mdi-star mr-1 text-warning text-sm'></span>
                                                <span class='font-weight-semi-bold text-dark text-sm'>5.0(8)</span>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                            </div>
                            </div>
                            <!-- listing block close  -->
                            </div>";
                        }
                }
            }

        }else{
            $hotel_data = "<p class='text-danger'>No hotels are currently available in your selected location</p>";
        }
        return view('search')->with(compact('hotel_data','result_counter'));
    }
}