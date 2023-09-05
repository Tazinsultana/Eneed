<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function AddSubCategory(){
        return view('admin.addsubcategory');
    }

    public function AllSubCategory(){
        return view('admin.allsubcategory');
    }
}
