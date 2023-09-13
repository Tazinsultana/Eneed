<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClintController extends Controller
{
    public function CategoryPage($id)
    {
        $category = Category::findOrFail($id);
        // $subcategory=SubCategory::findOrFail($id);
        $product = Product::where('product_category_id', $id)->latest()->get();

        return view('user.categorypage', compact('category', 'product'));
    }

    public function ProductDetails($id)
    {
        $products = Product::findOrFail($id);
        $subcategory_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_product = Product::where('id', $subcategory_id)->latest()->get();

        return view('user.productdetails', compact('products', 'related_product'));
    }

    public function AddtoCart()
    {
        $userid=Auth::id();

        $cart_item=CartModel::where('user_id',$userid)->get();

        return view('user.addtocart',compact('cart_item'));
    }
    public function addProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->product_quantity;
        $price=$product_price * $quantity;
        // $price = $product_price * $quantity;
        // dd($price);

        CartModel::insert([

            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->product_quantity,
            'price' => $price,




        ]);
        return redirect()->route('addtocart')->with('message', 'Your Product add to cart successfully');

    }


    public function CheckOutt()
    {

        return view('user.checkout');
    }


    public function UserProfile()
    {

        return view('user.userprofile');
    }
    public function PendingOrder()
    {
        return view('user.pendingorders');


    }
    public function History()
    {

        return view('user.history');

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