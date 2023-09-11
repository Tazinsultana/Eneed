<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ClintController extends Controller

{
//     public function Home(){

    
//     $Categories=Category::all();
//     {
//         return view('user.layouts.header',compact('Categories'));
//     }
// }

    
    public function CategoryPage(){

        return view('user.categorypage');
    }

    public function SingleProduct(){

        return view('user.singleproduct');
    }

    public function AddtoCart(){

        return view('user.addtocart');
    }

    public function CheckOutt(){

        return view('user.checkout');
    }


public function UserProfile(){

    return view('user.userprofile');
}

public function BestSeller(){

    return view('user.bestseller');
}
public function NewRelease(){

    return view('user.newrelease');
}
public function TodeaysDeal(){

    return view('user.todaysdeal');
}
public function CustomerService(){

    return view('user.customerservice');
}


}
