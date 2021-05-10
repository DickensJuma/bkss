<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property = Property::where(['owner'=>auth()->user()->id])->first();
        $property_id = $property->id;
        $propertyProfile = Profile::where(['p_id'=>$property->id])->first();
        $month_drop_down ="<option value='0'>Select Month</option>";
        $month_drop_down1 ="<option value='0'>Select Month</option>";
        for($i=1;$i<=12;$i++){
            if($propertyProfile){
                if($propertyProfile->open_month == $i){
                    $month_drop_down .= "<option value='$i' selected>".date("F", mktime(0, 0, 0, $i, 1))."</option>";
                }else{
                    $month_drop_down .= "<option value='$i'>".date("F", mktime(0, 0, 0, $i, 1))."</option>";
                }
                if($propertyProfile->rennovation_month == $i){
                    $month_drop_down1 .= "<option value='$i' selected>".date("F", mktime(0, 0, 0, $i, 1))."</option>";
                }else{
                    $month_drop_down1 .= "<option value='$i'>".date("F", mktime(0, 0, 0, $i, 1))."</option>";
                }

            }else{
                $month_drop_down .= "<option value='$i'>".date("F", mktime(0, 0, 0, $i, 1))."</option>";
                $month_drop_down1 .= "<option value='$i'>".date("F", mktime(0, 0, 0, $i, 1))."</option>";
            }
        }
        return  view('property.profile.index',compact('propertyProfile','month_drop_down','month_drop_down1','property_id'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyProfile  $propertyProfile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $propertyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyProfile  $propertyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $propertyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyProfile  $propertyProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $propertyProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyProfile  $propertyProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $propertyProfile)
    {
        //
    }
}
