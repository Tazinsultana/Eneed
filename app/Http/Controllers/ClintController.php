<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingInfo;
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
        $userid = Auth::id();

        $cart_item = CartModel::where('user_id', $userid)->get();

        return view('user.addtocart', compact('cart_item'));
    }
    public function addProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->product_quantity;
        $price = $product_price * $quantity;
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


    public function RemoveProduct($id)
    {
        CartModel::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Item Successfully Remove to Cart');

    }

    public function CheckOutt()
    {

        return view('user.checkout');
    }

    public function GetShippingInfo(Request $request)
    {


        // $user_id = Auth::id();
        $request->validate([


            'address' => 'required',
            'postalcode' => 'required',
            'phone' => 'required'


        ]);


        ShippingInfo::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'postal_code' => $request->postalcode,
            'phone' => $request->phone,
        ]);


        return redirect()->route('shippingadded')->with('message', 'Address Added Successfully!!');

    }

    public function ShippingAdded()
    {
        $userid = Auth::id();

        $cart_item = CartModel::where('user_id', $userid)->get();

        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        //    dd('abc');


        return view('user.addship', compact('cart_item', 'shipping_address'));
    }


    public function PlaceOrder()
    {
        $userid = Auth::id();
        $shipping_address = ShippingInfo::where('user_id', $userid)->first();
        $cart_item = CartModel::where('user_id', $userid)->get();


        foreach ($cart_item as $items) {
            Order::insert([
                'user_id' => $userid,
                'shipping_address' => $shipping_address->address,
                'shipping_postalcode' => $shipping_address->postal_code,
                'shipping_phone' => $shipping_address->phone,
                'product_id' => $items->product_id,
                'quantity' => $items->quantity,
                'total_price' => $items->price,



            ]);
            $id = $items->id;

            CartModel::findOrFail($id)->delete();


        }
        ShippingInfo::where('user_id', $userid)->first()->delete();
      
        return redirect()->route('pendingorders')->with('message', 'Your Order Placed successfully');

    }

    public function UserProfile()
    {

        return view('user.userprofile');
    }
    public function PendingOrder()
    {
        // $userid = Auth::id();
        $pending_order=Order::where('status','pending')->latest()->get();
        return view('user.pendingorders',compact('pending_order'));


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