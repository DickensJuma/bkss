<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class SearchController extends Controller
{
   public function search(Request $request){
    $data = $request->all();
    $destinations = Property::where(['location' => $request->destination])->where(['capacity'=>$request->adult])->get();
    if($destinations != null){
        dd($destinations);
    }else{
        echo "Nothing found";
        
    }
            


   }
}
