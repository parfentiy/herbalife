<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceListData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_list_id',
        'vpoints',
        'retail_price',
        'pd10',
        'pd20',
        'pd30',
        'pc15',
        'pc25',
        'pc35',
        'ip25',
        'ip35',
        'ip42',
        'sv_price',
    ];
}
