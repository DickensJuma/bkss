<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Property;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all property
        $property = Property::where(['owner'=>auth()->user()->id])->first();
        $policies = Policy::where(['property_id'=>$property->id])->first();
        return view('property.policy.index',compact('property', 'policies'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.policy.add');
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
        $policy = new Policy;
        $policy->property_id = $data['p_id'];
        $policy->advance_cancellation = $data['advance_cancellation'];
        $policy->full_pay= $data['full_pay'];
        if ($data['protection']=="on"){
            $policy->protection = "Yes";
        }else{
            $policy->protection = "No";
        }
        $policy->checkin_from = $data['checkin_from'];
        $policy->checkin_to = $data['checkin_to'];
        $policy->checkout_from = $data['checkout_from'];
        $policy->checkout_to = $data['checkout_to'];
        if ($data['children']=="on"){
            $policy->children = "Yes";
        }else{
            $policy->children = "No";
        }
        $policy->pets_allowed = $data['pets_allowed'];
        $policy->pets_fee = $data['pets_fee'];
        $policy->save();
        return redirect()->route('policy.add')->with('alert','Your property has been created successfully. One of our team members will contact you to verify the property before it is activated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Policy $policy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Policy  $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        //
    }
}
