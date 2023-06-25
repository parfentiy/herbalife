<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product',
        'quantity',
        'customer_price',
        'customer_sum',
        'cost_price',
        'cost_sum',
        'income',
        'vpoints',

    ];
}
