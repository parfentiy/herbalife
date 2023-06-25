<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer',
        'pricelist',
        'product',
        'quantity',
        'customer_sum',
        'cost_sum',
        'income',
        'vp_total',
        'order_date',
        'paid_date',
        'ship_date',

    ];
}
