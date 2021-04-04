<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Property;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

    }

    public function superIndex()
    {
        $title = "Amenities";
        $amenities = Amenity::get();
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
        return view('super.amenity.index',compact('columns','title', 'categories_dropdown'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $amenity = new Amenity;
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
        return redirect()->back()->with('successalert','Amenity added successfully');
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
        $extra_accomodations  = "";
        if($request->extra_accomodation){
            foreach($request->extra_accomodation as $extra_accomodation){
                $extra_accomodations .= $extra_accomodation;
                $extra_accomodations .="<span>&#10003;</span>";
            }
        }
        if($request->common_armenity){
            foreach($request->common_armenity as $common_amenity){
                $property->amenities()->attach(Amenity::where('id', $common_amenity)->first());
            }
        }
        if($request->room_armenity){
            foreach($request->room_armenity as $room_amenity){
                $property->amenities()->attach(Amenity::where('id', $room_amenity)->first());
            }
        }
        if($request->bathroom_armenity){
            foreach($request->bathroom_armenity as $bathroom_amenity){
                $property->amenities()->attach(Amenity::where('id', $bathroom_amenity)->first());
            }
        }
        if($request->media_armenity){
            foreach($request->media_armenity as $media_amenity){
                $property->amenities()->attach(Amenity::where('id', $media_amenity)->first());
            }
        }
        if($request->food_armenity){
            foreach($request->food_armenity as $food_amenity){
                $property->amenities()->attach(Amenity::where('id', $food_amenity)->first());
            }
        }
        if($request->service_armenity){
            foreach($request->service_armenity as $service_amenity){
                $property->amenities()->attach(Amenity::where('id', $service_amenity)->first());
            }
        }
        if($request->outdoor_armenity){
            foreach($request->outdoor_armenity as $outdoor_amenity){
                $property->amenities()->attach(Amenity::where('id', $outdoor_amenity)->first());
            }
        }
        if($request->accessibility_armenity){
            foreach($request->accessibility_armenity as $accessibility_amenity){
                $property->amenities()->attach(Amenity::where('id', $accessibility_amenity)->first());
            }
        }
        if($request->family_armenity){
            foreach($request->family_armenity as $family_amenity){
                $property->amenities()->attach(Amenity::where('id', $family_amenity)->first());
            }
        }
        if($request->safety_armenity){
            foreach($request->safety_armenity as $safety_amenity){
                $property->amenities()->attach(Amenity::where('id', $safety_amenity)->first());
            }
        }
        if($request->distancing_armenity){
            foreach($request->distancing_armenity as $distancing_amenity){
                $property->amenities()->attach(Amenity::where('id', $distancing_amenity)->first());
            }
        }
        if($request->cleanliness_armenity){
            foreach($request->cleanliness_armenity as $cleanliness_amenity){
                $property->amenities()->attach(Amenity::where('id', $cleanliness_amenity)->first());
            }
        }
        $property_id = $data['p_id'];
        return view('property.image.add',compact('property_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function show(Amenity $amenity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenity $amenity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenity $amenity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenity $amenity)
    {
        //
    }
}
