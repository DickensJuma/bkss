<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use App\Models\User;
use App\Models\Property;
use App\Models\RatePlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RatePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property = Property::where(['owner' => Auth::user()->id])->first();
        $rooms = Room::where(['property'=>$property->id])->get();
        $rate_plan_design = "";
        $default_rate_plans = RatePlan::get();
                $rate_plan_dropdown = "<option>Select Plan</option>";
                $room_dropdown = "<option>Select Room</option>";
                foreach($default_rate_plans as $rate_plan){
                    $rate_plan_dropdown .= "<option class='bg-ready' value='" . $rate_plan->id . "'>" . $rate_plan->name . "</option>";
                }
        foreach($rooms as $room){
            $room_type = Type::where(['id'=>$room->type])->first();
            //Room drop down for selecting rooms in plan creation
            $room_dropdown .= "<option class='bg-ready' value='" . $room->id . "'>" . $room_type->name . "</option>";
            $rate_plans = DB::table('rate_plan_room')
            ->join('rate_plans', 'rate_plan_room.rate_plan_id', 'rate_plans.id')
            ->select('rate_plan_room.*', 'rate_plans.name As plan')
            ->where(['room_id' => $room->id])->get();
            foreach($rate_plans as $rate_plan){
                $rate_plan_design .= "<tr>
                <td>$room_type->name</td>
                <td>$rate_plan->plan</td>
                <td>$rate_plan->amount</td>
                </tr>";
            }
        }
        return view('property.rate.index',compact('rate_plan_design', 'room_dropdown', 'rate_plan_dropdown'));
    }
    //link the plans to rooms and set cost
    public function link(Request $request){
        $data = $request->all();
        $room = Room::where(['id'=>$data['room']])->first();
        $room->ratePlans()->attach(RatePlan::where('id', $data['plan'])->first(), ['amount' =>$data['cost']]);
        return redirect()->back()->with('successalert','Rate Plan added successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Rate Plans";
        $rate_plans = RatePlan::get();
        $columns ="";
        foreach($rate_plans as $rate_plan){
            $author = User::where(['id'=>$rate_plan->author])->first();
            $date = $rate_plan->created_at->format('dD-m-Y:h:m:s');
            $columns .= "<tr>
            <td>$rate_plan->id</td>
            <td>$rate_plan->name</td>
            <td>$rate_plan->description</td>
            <td>$date</td>
            <td>$author->name</td>
            <td><a href='' class='btn btn-sm btn-warning'><i class='fas fa-edit' aria-hidden='true'></i></a> |
                <a href='' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt' aria-hidden='true'></i></a>
            </td>
            </tr>";     
        }
        return view('super.rates.index',compact('columns','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rate_plan = new RatePlan;
        $rate_plan->name = $request->name;
        $rate_plan->description = $request->description;
        $rate_plan->author = Auth::user()->id;
        $rate_plan->save();
        return redirect()->back()->with('successalert','New Rate Plan added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RatePlan  $ratePlan
     * @return \Illuminate\Http\Response
     */
    public function show(RatePlan $ratePlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RatePlan  $ratePlan
     * @return \Illuminate\Http\Response
     */
    public function edit(RatePlan $ratePlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RatePlan  $ratePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RatePlan $ratePlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RatePlan  $ratePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RatePlan $ratePlan)
    {
        //
    }
}
