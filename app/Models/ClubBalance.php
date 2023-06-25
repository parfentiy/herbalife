<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'motion_date',
        'operation_type',
        'aloe_balance',
        'tea_balance',
        'cocktail_balance',
        'aloe_writeoff',
        'tea_writeoff',
        'cocktail_writeoff',
        'reason',
        'customer',
    ];
}
