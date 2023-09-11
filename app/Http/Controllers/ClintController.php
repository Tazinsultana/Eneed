<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClintController extends Controller
{
    public function CategoryPage($id)
    {
        $category = Category::findOrFail($id);
        $product = Product::where('product_category_id', $id)->latest()->get();

        return view('user.categorypage', compact('category', 'product'));
    }

    public function ProductDetails($id)
    {
        $products = Product::findOrFail($id);
        $subcategory_id =  Product::where('id', $id)->value('product_subcategory_id');
        $related_product=Product::where('id',$subcategory_id)->latest()->get();

        return view('user.productdetails',compact('products','related_product'));
    }

    public function AddtoCart()
    {

        return view('user.addtocart');
    }

    public function CheckOutt()
    {

        return view('user.checkout');
    }


    public function UserProfile()
    {

        return view('user.userprofile');
    }

    public function BestSeller()
    {

        return view('user.bestseller');
    }
    public function NewRelease()
    {

        return view('user.newrelease');
    }
    public function TodeaysDeal()
    {

        return view('user.todaysdeal');
    }
    public function CustomerService()
    {

        return view('user.customerservice');
    }


}