<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Type;
use App\Models\Photo;
use App\Models\Property;
use App\Models\RoomName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
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
        $rooms = Room::where(['property'=>$property->id])->get();
        $room_dropdown = "<option>Select Room</option>";
        foreach($rooms as $room){
            $room_name = RoomName::where(['id'=>$room->name])->first();
            $room_type = Type::where(['id'=>$room->type])->first();
            //Room drop down for selecting rooms in plan creation
            $room_dropdown .= "<option class='bg-ready' value='" . $room->id . "'>" . $room_name->name." ". $room_type->name . "</option>";
        }
        //get photos
        $photos = Photo::where(['p_id'=>$property->id])->get();
        return view('property.image.index',compact('photos','room_dropdown'));
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
        //check if an image has been selected
            if ($request->property_image) {
                $images = $request->property_image;
                foreach($images as $image) {
                    $photo = new Photo;
                    $photo->p_id = $request->p_id;
                    $image_temp = $image;
                    //echo $image_temp; die;
                    if ($image_temp->isValid()) {
                        $extension = $image_temp->getClientOriginalExtension();
                        $filename = 'bks'.mt_rand(000, 9999999999) . '.' . $extension;
                        $filepath = public_path().'/uploads/property/large/' . $filename;
                        $webimagefilepath = public_path().'/uploads/property/small/' . $filename;
                        $thumbnailpath = public_path().'/uploads/property/thumbnail/' . $filename;
                        //upload the image
                        Image::make($image_temp)->resize(600, 600)->save($filepath);
                        Image::make($image_temp)->resize(200, 200)->save($webimagefilepath);
                        Image::make($image_temp)->resize(100, 100)->save($thumbnailpath);
                        $photo->path = $filename;
                        $photo->alt_text = "Book sasa property image";
                        $photo->save();
                    }

                }
                $property_id = $request->p_id;
                return view('property.image.add',compact('property_id'))->with('successalert','Images Uploaded successfully');
            }
            $property_id = $request->p_id;
        return view('property.image.add',compact('property_id'))->with('erroralert','Please select a valid imagfe to upload');
    }

    public function storeNew(Request $request){
        //check if an image has been selected
        if ($request->property_image) {
        $property = Property::where(['owner' => Auth::user()->id])->first();
            $images = $request->property_image;
            foreach($images as $image) {
                $photo = new Photo;
                $photo->p_id =$property->id;
                $image_temp = $image;
                //echo $image_temp; die;
                if ($image_temp->isValid()) {
                    $extension = $image_temp->getClientOriginalExtension();
                    $filename = 'bks'.mt_rand(000, 9999999999) . '.' . $extension;
                    $filepath = public_path().'/uploads/property/large/' . $filename;
                    $webimagefilepath = public_path().'/uploads/property/small/' . $filename;
                    $thumbnailpath = public_path().'/uploads/property/thumbnail/' . $filename;
                    //upload the image
                    Image::make($image_temp)->resize(600, 600)->save($filepath);
                    Image::make($image_temp)->resize(200, 200)->save($webimagefilepath);
                    Image::make($image_temp)->resize(100, 100)->save($thumbnailpath);
                    $photo->path = $filename;
                    $photo->alt_text = "Book sasa property image";
                    $photo->save();
                }

            }
            return redirect()->back()->with('successalert','Images Uploaded successfully');
        }
        $property_id = $request->p_id;
    return redirect()->back()->with('erroralert','Please select a valid imagfe to upload');
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
