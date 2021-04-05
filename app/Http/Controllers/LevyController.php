<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Levy;
use App\Models\User;
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
        $title = "Taxes";
        $levies = Levy::get();
        $columns ="";
        foreach($levies as $levy){
            $author = User::where(['id'=>$levy->author])->first();
            $date = $levy->created_at->format('dD-m-Y:h:m:s');
            $columns .= "<tr>
            <td>$levy->id</td>
            <td>$levy->name</td>
            <td>$levy->percentage %</td>
            <td>$levy->descr </td>
            <td>$date</td>
            <td>$author->name</td>
            <td><a href='' class='btn btn-sm btn-warning'><i class='fas fa-edit' aria-hidden='true'></i></a> |
                <a href='' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt' aria-hidden='true'></i></a>
            </td>
            </tr>";     
        }
        return view('super.tax.index',compact('columns','title'));
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
        $levy = new Levy;
        $levy->name =$request->name;
        $levy->percentage = $request->percentage;
        $levy->descr = $request->description;
        $levy->author = Auth::user()->id;
        $levy->save();
        return redirect()->back()->with('successalert','New Tax added successfully');
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
