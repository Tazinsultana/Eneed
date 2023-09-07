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
        $subcategories = SubCategory::all();
        return view('admin.allsubcategory', compact('subcategories'));
    }
    public function AddSubCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.addsubcategory', compact('categories'));
    }

    public function StoreSubCategory(Request $request)
    {

        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories| max:255',
            'category_id' => 'required'


        ]);

        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');


        //  dd( $category_name);

        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $category_id,
            'category_name' => $category_name,
            'slug' => strtolower(str_replace(' ', '_', $request->subcategory_name))


        ]);

        Category::where('id', $category_id)->increment('subcategory_count', 1);
        return redirect()->route('allsubcategory')->with('message', 'SubCategorry Added Successfully');

    }

    public function EditSubCategory($id)
    {

        $subcategory_info = SubCategory::findOrFail($id);
        return view('admin.editsubcategory', compact('subcategory_info'));
    }

    public function UpdateSubCategory(Request $request)
    {

        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories| max:255',

        ]);

        $subcategory_id = $request->subcategory_id;
        SubCategory::findOrFail($subcategory_id)->update([

            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ', '_', $request->subcategory_name))


        ]);
        return redirect()->route('allsubcategory')->with('message', 'SubCategorry Edited Successfully');



    }

    public function DeleteSubCategory($id)
    {
        $cat_id = SubCategory::where('id', $id)->value('category_id');

        SubCategory::findOrFail($id)->delete();
        // dd( $id);

        Category::where('id', $cat_id)->decrement('subcategory_count', 1);

        return redirect()->route('allsubcategory')->with('message', 'SubCategory Deleted Successfully');

    }

}