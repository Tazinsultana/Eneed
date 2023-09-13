<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{

    
    // public function UserTemplate(){

    //     return view('user.layouts.app');
    // } 
    public function Home(){
        $allproducts=Product::all();

        return view('user.home',compact('allproducts'));
    }


}
