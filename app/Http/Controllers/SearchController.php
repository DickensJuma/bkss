<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function search(Request $request){
    $data = $request->all();
    dd($data);
    $destinations = Property::where(['location' => $restaurant_id])->where([])->get();
            return view('vendor.products.index')->with(compact('meals'));


   }
}
