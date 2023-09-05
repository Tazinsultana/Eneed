<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategory()
    {
        return view('admin.addcategory');
    }

    public function AllCategory()
    {
        return view('admin.allcategory');
    }

    // public function storeCategory(Request $request)
    // {
    //     $request->validate([
    //         'category_name' => ['required', 'unique:categories', 'max:255'],

    //     ]);
    // }


    public function StoreCategory(Request $request)
    {

        $request->validate([

            'category_name' => 'required|unique:categories|max:255',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ', '_', $request->category_name))
        ]);
        return redirect()->route('allcategory')->with('message', 'Category Added Successfully!!');
    }
}