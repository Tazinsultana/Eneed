<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function Index()
    {
        $products = Product::all();

        return view('admin.allproduct', compact('products'));
    }
    public function AddProduct()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.addproduct', compact('categories', 'subcategories'));


    }
    public function StoreProduct(Request $request)
    {


        $request->validate([
            'product_name' => 'required|unique:products| max:255',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'short_pd' => 'required',
            'long_pd' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => [
                'required',
                'image',
                'mimes:jpg,png,jpeg,gif,svg',
                'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'max:2048'
            ]



        ]);

        $product_category_id = $request->product_category_id;
        $product_category_name = Category::where('id', $product_category_id)->value('category_name');
        $product_subcategory_id = $request->product_subcategory_id;
        $product_subcategory_name = SubCategory::where('id', $product_subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_short_des' => $request->short_pd,
            'product_long_des' => $request->long_pd,
            'product_category_name' => $product_category_name,
            'product_subcategory_name' => $product_subcategory_name,
            'product_category_id' => $product_category_id,
            'product_subcategory_id' => $product_subcategory_id,
            'product_img' => $request->product_img,
            'slug' => strtolower(str_replace(' ', '_', $request->product_name))


        ]);
        Category::where('id', $product_category_id)->increment('product_count', 1);
        return redirect()->route('allproduct')->with('message', 'SubCategorry Added Successfully');
    }

    public function EditProduct($id)
    {

        $product_info = Product::findOrFail($id);
        return view('admin.editproduct', compact('product_info'));


    }
    public function UpdateProduct(){


    }


}