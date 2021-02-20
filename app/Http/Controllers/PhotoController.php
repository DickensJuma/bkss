<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PhotoController extends Controller
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
        $request->validate([
            'property_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
        $data = $request->all();
        //dd($data);
        $photo = new Photo;
        $photo->p_id = $data['p_id'];
        //check if an image has been selected
        if (!empty($data['property_image'])) {
            if ($request->hasFile('property_image')) {
                $image_temp = $request->file('property_image');
                //echo $image_temp; die;
                if ($image_temp->isValid()) {
                    $extension = $image_temp->getClientOriginalExtension();
                    $filename = 'bks'.mt_rand(000, 9999999999) . '.' . $extension;
                    $filepath = 'uploads/property/large/' . $filename;
                    $webimagefilepath = 'uploads/property/small/' . $filename;
                    //upload the image
                    Image::make($image_temp)->resize(600, 600)->save($filepath);
                    Image::make($image_temp)->resize(200, 200)->save($webimagefilepath);
                    $photo->path = $filename;
                }
            }
        }
        $photo->alt_text = "Book sasa property image";
        $photo->save();
        return response()->json($filename);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
