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
        //get all facilities
        $facilities = Facility::where(['p_id'=>$property->id])->get();
        foreach($facilities as $facility){
            $sub_category = SubCategory::where(['id'=>$facility->sub_cat_id])->first();
            dd($sub_category);
        }
        //get
        return view('property.facility.index',compact('facilities'));
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
        return view('property.amenity.add',compact('property_id','common_amenities','room_amenities'
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
