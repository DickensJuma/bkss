<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\User;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Property;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all properties 
        $property = Property::where(['owner'=>auth()->user()->id])->first();
        //get all subcategories
        $sub_categories = SubCategory::where(['cat_id'=>1])->get();
        $facilities_design="";
        foreach($sub_categories as $sub_category){
            $facilities_design .= "<div class='card-header'>
            <h3 class='card-title'><b>$sub_category->name</b></h3>
            <div class='card-tools'>
                    <button type='button' class='btn btn-tool' data-card-widget='collapse' title='Collapse'>
                        <i class='fas fa-minus'></i>
                    </button>
                    <button type='button' class='btn btn-tool' data-card-widget='remove' title='Remove'>
                        <i class='fas fa-times'></i>
                    </button>
                </div>
            </div>";
            //get facilities
            $facilities = Facility::where(['sub_cat_id'=>$sub_category->id])->get();
                foreach($facilities as $facility){
                    if($property->hasFacility($facility->id)){
                        $facilities_design .= "<div class='card-body'>
                        <div class='form-group'>
                                <div class='row'>
                                    <div class='col-md-8'>
                                        <p>$facility->name</p>
                                        </div>
                                    <div class='col-md-2'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='facility".$facility->id ."' id='yes' value='Yes' checked>
                                            <label class='form-check-label'>Yes</label>
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='facility".$facility->id."' id='no' value='No'>
                                            <label class='form-check-label'>No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }else{
                        $facilities_design .= "<div class='card-body'>
                        <div class='form-group'>
                                <div class='row'>
                                    <div class='col-md-8'>
                                        <p>$facility->name</p>
                                        </div>
                                    <div class='col-md-2'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='facility".$facility->id."' id='yes' value='Yes'>
                                            <label class='form-check-label'>Yes</label>
                                        </div>
                                    </div>
                                    <div class='col-md-2'>
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='facility".$facility->id."' id='no' value='No' checked>
                                            <label class='form-check-label'>No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                }
            }
        return view('property.facility.index',compact('facilities_design'));
    }
    public function superIndex(){
        $title = "Facilities";
        $amenities = Facility::get();
        //Categories drop down start
        $categories = Category::get();
        $categories_dropdown = "<option selected>Select Category</option>";
        foreach ($categories as $category) {
            $categories_dropdown .= "<option class='bg-ready' value='" . $category->id . "'>" . $category->name . "</option>";
        }
//Categories dropdown end
        $columns ="";
        foreach($amenities as $amenity){
            $author = User::where(['id'=>$amenity->author])->first();
            $sub_category = SubCategory::where(['id'=>$amenity->sub_cat_id])->first();
            $date = $amenity->created_at->format('d-m-Y');
            $columns .= "<tr>
            <td>$amenity->id</td>
            <td>$sub_category->name</td>
            <td>$amenity->name</td>
            <td>$amenity->description </td>
            <td>$date</td>
            <td>$author->name</td>
            <td><a href='' class='btn btn-sm btn-warning'><i class='fas fa-edit' aria-hidden='true'></i></a> |
                <a href='' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt' aria-hidden='true'></i></a>
            </td>
            </tr>";     
        }
        return view('super.facility.index',compact('columns','title', 'categories_dropdown'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $amenity = new Facility;
        $amenity->sub_cat_id = $request->sub_category;
        $amenity->name = $request->name;
        if($request->description)
        {
        $amenity->description = $request->description;
        }else{
            $amenity->description = "_";
        }
        $amenity->author = Auth::user()->id;
        $amenity->save();
        return redirect()->back()->with('successalert','Facility added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $property = Property::where(['id'=>$data['p_id']])->first();
        $property->facilities()->attach(Facility::where('id', $data['parking'])->first());

        foreach($data['breakfast_type'] as $breakfast){
            $property->facilities()->attach(Facility::where('id', $breakfast)->first());
        }
        foreach($data['language'] as $language){
            $property->facilities()->attach(Facility::where('id', $language)->first());
        }
        foreach($data['facility'] as $facility){
            $property->facilities()->attach(Facility::where('id', $facility)->first());
        }
        $property_id = $data['p_id'];
        $room_id = $data['r_id'];
        //get the relevant categorised amenities
        $common_amenities = Amenity::where(['sub_cat_id'=>24])->get();
        $room_amenities = Amenity::where(['sub_cat_id'=>23])->get();
        $bathroom_amenities = Amenity::where(['sub_cat_id'=>25])->get();
        $media_amenities = Amenity::where(['sub_cat_id'=>26])->get();
        $food_amenities = Amenity::where(['sub_cat_id'=>27])->get();
        $service_amenities = Amenity::where(['sub_cat_id'=>28])->get();
        $outdoor_amenities = Amenity::where(['sub_cat_id'=>29])->get();
        $accessibility_amenities = Amenity::where(['sub_cat_id'=>30])->get();
        $family_amenities = Amenity::where(['sub_cat_id'=>31])->get();
        $safety_amenities = Amenity::where(['sub_cat_id'=>32])->get();
        $distancing_amenities = Amenity::where(['sub_cat_id'=>33])->get();
        $cleanliness_amenities = Amenity::where(['sub_cat_id'=>34])->get();
        return view('property.amenity.add',compact('property_id', 'room_id', 'common_amenities','room_amenities'
        ,'bathroom_amenities','media_amenities','food_amenities','service_amenities','outdoor_amenities'
        ,'accessibility_amenities','family_amenities','safety_amenities','distancing_amenities','cleanliness_amenities'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }

}
