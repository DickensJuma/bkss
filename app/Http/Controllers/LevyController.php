<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Levy;
use App\Models\Property;
use Illuminate\Http\Request;

class LevyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get property id using the user id
        $property = Property::where(['owner' => Auth::user()->id])->first();
        $property_city = $property->city;
        $levies = $property->taxes()->get();
        return view('property.levy',compact('levies','property_city'));
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
     * @param  \App\Models\Levy  $levy
     * @return \Illuminate\Http\Response
     */
    public function show(Levy $levy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Levy  $levy
     * @return \Illuminate\Http\Response
     */
    public function edit(Levy $levy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Levy  $levy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Levy $levy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Levy  $levy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Levy $levy)
    {
        //
    }
}
