<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
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
        //
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
        $extra_accomodations  = "<span>&#10003;</span>";
        foreach($request->extra_accomodation as $extra_accomodation){
            $extra_accomodations .= $extra_accomodation;
            $extra_accomodations .="<span>&#10003;</span>";
        }
        $common_amenities  = "<span>&#10003;</span>";
        foreach($request->common_armenity as $common_amenity){
            $common_amenities .= $common_amenity;
            $common_amenities .="<span>&#10003;</span>";
        }
        $room_amenities  = "<span>&#10003;</span>";
        foreach($request->room_armenity as $room_amenity){
            $room_amenities .= $room_amenity;
            $room_amenities .="<span>&#10003;</span>";
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
        $amenity->child_cost = $request->child_cost;
        $amenity->extra_child_max_age = $request->extra_child_max_age;
        $amenity->extra_child_cost = $request->extra_child_cost;
        $amenity->extra_adult_cost = $request->extra_adult_cost;
        $amenity->common_amenities = $common_amenities;
        $amenity->room_amenities = $room_amenities;
        $p_id = $request->p_id;
        $amenity->save();
        return view('property.image.add',compact('p_id'));
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
