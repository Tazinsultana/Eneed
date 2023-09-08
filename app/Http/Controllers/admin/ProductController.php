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
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',



        ]);
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        // if (!empty($request->image)) {
        //     $file =$request->file('product_img');
        //     $extension = $file->getClientOriginalExtension(); 
        //     $filename = time().'.' . $extension;
        //     $file->move(public_path('upload/'), $filename);
        //     $img_url = 'upload/' .$filename;
        // }
        // $img_url= 'public/uploads/'.$filename;


        $category_id = $request->product_category_id;
        $product_category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_id = $request->product_subcategory_id;
        $product_subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_short_des' => $request->short_pd,
            'product_long_des' => $request->long_pd,
            'product_category_name' => $product_category_name,
            'product_subcategory_name' => $product_subcategory_name,
            'product_category_id' => $category_id,
            'product_subcategory_id' => $subcategory_id,
            'product_img' => $img_url,
            'slug' => strtolower(str_replace(' ', '_', $request->product_name)),


        ]);


        Category::where('id', $category_id)->increment('product_count', 1);
        SubCategory::where('id', $subcategory_id)->increment('product_count', 1);
        return redirect()->route('allproduct')->with('message', 'Product Added Successfully');
    }

    public function EditProduct($id)
    {

        $product_info = Product::findOrFail($id);
        return view('admin.editproduct', compact('product_info'));

  


    
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->id;

        $request->validate([
            'product_name' => 'required|unique:products| max:255',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'short_pd' => 'required',
            'long_pd' => 'required',



        ]);
        Product::findorFail($product_id)->update([

            'product_name' => $request->product_name,
            'price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'product_short_des' => $request->short_pd,
            'product_long_des' => $request->long_pd,

        ]);
        return redirect()->route('allproduct')->with('message', 'Product Updated Successfully');

    }


    public function EditProductImage($id)
    {
        $image_info = Product::findOrFail($id);
        return view('admin.editproductimage', compact('image_info'));

    }


    public function UpdateproductImage(Request $request)
    {

        $request->validate([

            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = $request->id;

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;


        Product::findOrFail($id)->update([
            'product_img' => $img_url,


        ]);

        return redirect()->route('allproduct')->with('message', 'Image Update Successfully');

    }

    public function DeleteProduct($id)
    {
        
        $cat_id=Product::where('id',$id)->value('product_category_id');
        $subcat_id=Product::where('id',$id)->value('product_subcategory_id');
        Category::where('id', $cat_id)->decrement('product_count');
        SubCategory::where('id', $subcat_id)->decrement('product_count');
        Product::findOrFail($id)->delete();

        

        return redirect()->route('allproduct')->with('message', 'Product Deleted Successfully');


    }



}