<?php

namespace App\Http\Controllers;

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
        $breakfast_types = "";
        foreach($data['breakfast_type'] as $breakfast){
            $breakfast_types .= $breakfast;
            $breakfast_types .=" , ";
        }
        $languages = "";
        foreach($data['language'] as $language){
            $languages .= $language;
            $languages .=" , ";
        }
        $facilities = "";
        foreach($data['facility'] as $facility){
            $facilities .= $facility;
            $facilities .=" , ";
        }
        $facility = new Facility;
        $facility->p_id = $data['p_id'];
        $facility->parking = $data['parking'];
        $facility->parking_type = $data['parking_type'];
        $facility->parking_loc = $data['parking_location'];
        $facility->parking_reservation = $data['reservation'];
        $facility->parking_fee = $data['p_cost'];
        $facility->breakfast_availability = $data['breakfast_availability'];
        $facility->breakfast_cost = $data['b_cost'];
        $facility->breakfast_type = $breakfast_types;
        $facility->language = $languages;
        $facility->facility = $facilities;
        $facility->save();
        $property_id = $data['p_id'];
       return view('property.amenity.add',compact('property_id'));

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
