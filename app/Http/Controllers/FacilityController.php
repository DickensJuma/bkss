<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Property;
use Illuminate\Http\Request;

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
        $facilities = Facility::where(['p_id'=>$property->id])->first();
        return view('property.facility.index',compact('facilities'));
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
