<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AddCategory(){
        return view('admin.addcategory');
    }

    public function AllCategory(){
        return view('admin.allcategory');
    }
}
