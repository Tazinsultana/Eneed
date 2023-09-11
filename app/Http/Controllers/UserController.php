<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    
    public function UserTemplate(){

        return view('user.layouts.app');
    } 
    public function Home(){

        return view('user.home');
    }


}
