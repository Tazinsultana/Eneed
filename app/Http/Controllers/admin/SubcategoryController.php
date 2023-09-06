<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function Index()
    {
        return view('admin.allsubcategory');
    }
    public function AddSubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }

    public function StoreSubCategory(Request $request){

        $request->validate([
            'subcategory_name' =>'required|unique:sub_categories',
            'category_id' =>'required'
           

        ]);

        $category_id= $request->category_id;
        // $category_name= Category::where('id','$category_id')->value('category_name');
        $category_name=Category::where('id','$category_id')->value('category_name');
        // $category_name= Category::where('id','category_id')->value('category_name');

        // dd(  $category_name);

        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'category_id'=> $category_id,
            'category_name'=> $category_name,
            'slug' => strtolower(str_replace(' ', '_', $request->subcategory_name))


        ]);

        Category::where('id','$category_id')->increment('subcategory_count', 1);
        return redirect()->route('allsubcategory')->with('message','SubCategorry Added Successfully');

        }
    }



        

    


