<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RatePlan;
use Illuminate\Http\Request;
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
        //
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
