<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'shipping_address',
        'shipping_postalcode',
        'shipping_phone',
        'product_id',
        'quantity',
        'total_price',




    ];

    
}
