<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Sub Categories";
        $subcategories = SubCategory::get();
        //Categories drop down start
        $categories = Category::get();
        $categories_dropdown = "<option selected>Select Category</option>";
        foreach ($categories as $category) {
            $categories_dropdown .= "<option class='bg-ready' value='" . $category->id . "'>" . $category->name . "</option>";
        }
//Categories dropdown end
        $columns ="";
        foreach($subcategories as $subcategory){
            $author = User::where(['id'=>$subcategory->author])->first();
            $category = Category::where(['id'=>$subcategory->cat_id])->first();
            $date = $subcategory->created_at->format('d-m-Y');
            $columns .= "<tr>
            <td>$subcategory->id</td>
            <td>$category->name</td>
            <td>$subcategory->name</td>
            <td>$subcategory->description </td>
            <td>$date</td>
            <td>$author->name</td>
            <td><a href='' class='btn btn-sm btn-warning'><i class='fas fa-edit' aria-hidden='true'></i></a> |
                <a href='' class='btn btn-sm btn-danger'><i class='fas fa-trash-alt' aria-hidden='true'></i></a>
            </td>
            </tr>";   
        }
        return view('super.subcat.index',compact('columns','title', 'categories_dropdown'));
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
    public function store(Request $request){
        $sub_cat = new SubCategory;
        $sub_cat->cat_id = $request->category;
        $sub_cat->name = $request->name;
        if($request->description)
        {
        $sub_cat->description = $request->description;
        }else{
            $sub_cat->description = "_";
        }
        $sub_cat->author = Auth::user()->id;
        $sub_cat->save();
        return redirect()->back()->with('successalert','Sub Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }

    public function get_by_category(Request $request){
        if(!$request->cat_id){
            $subcategories_dropdown = "<option>Select sub category</option>";
        }else{
            $subcategories_dropdown = "<option>Select sub category</option>";
            $sub_cats = SubCategory::where(['cat_id'=>$request->cat_id])->get();
            foreach($sub_cats as $sub_cat){
                $subcategories_dropdown .= "<option class='bg-ready' value='" . $sub_cat->id . "'>" . $sub_cat->name . "</option>";
            }
        }
        return response()->json(['subcategories_dropdown' => $subcategories_dropdown]);
    }
}
