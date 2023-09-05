<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function PendingOrder(){
        return view('admin.pendingorder');
    }

    public function ConfirmedOrder(){
        return view('admin.confirmedorder');
    }
    public function CancelledOrder(){
        return view('admin.cancelledorder');
    }
}
