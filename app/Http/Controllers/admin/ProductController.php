<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function AddProduct()
    {
        return view('admin.addproduct');
    }

    public function AllProduct()
    {
        return view('admin.allproduct');
    }
}