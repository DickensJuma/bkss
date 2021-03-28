<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Amenity;
use App\Models\Category;
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
        //dd($data);
        $extra_accomodations  = "";
        if($request->extra_accomodation){
            foreach($request->extra_accomodation as $extra_accomodation){
                $extra_accomodations .= $extra_accomodation;
                $extra_accomodations .="<span>&#10003;</span>";
            }
        }
        $common_amenities  = "";
        if($request->common_armenity){
            foreach($request->common_armenity as $common_amenity){
                $common_amenities .= $common_amenity;
                $common_amenities .="<span>&#10003;</span>";
            }
        }
        $room_amenities  = "";
        if($request->room_armenity){
            foreach($request->room_armenity as $room_amenity){
                $room_amenities .= $room_amenity;
                $room_amenities .="<span>&#10003;</span>";
            }
        }
        if($request->extrabeds =="yes"){
            $extra_beds = 1;
        }else{
            $extra_beds = 0;
        }
        $amenity = new Amenity;
        $amenity->p_id = $request->p_id;
        $amenity->extra_beds = $extra_beds;
        $amenity->extrabeds_no = $request->extrabeds_no;
        $amenity->extra_accomodation = $extra_accomodations;
        $amenity->extra_accomodation = $extra_accomodations;
        $amenity->child_in_crib_cost = $request->child_cost;
        $amenity->extra_child_max_age = $request->extra_child_max_age;
        $amenity->extra_child_cost = $request->extra_child_cost;
        $amenity->extra_adult_cost = $request->extra_adult_cost;
        $amenity->common_amenities = $common_amenities;
        $amenity->room_amenities = $room_amenities;
        $property_id = $request->p_id;
        $amenity->save();
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
