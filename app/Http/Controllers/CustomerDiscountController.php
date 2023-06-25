<?php

namespace App\Http\Controllers;

use App\Models\CustomerDiscount;
use App\Models\CustomerStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CustomerDiscountController extends Controller
{
    //
    public function showAll()
    {

        return view('customer_discounts_list', [
            'customer_discounts' => CustomerDiscount::all(),
        ]);
    }

    public function add(Request $request) {
        $customer_discount = new CustomerDiscount($request->all());
        $customer_discount->save();

        return view('customer_discounts_list', [
            'customer_discounts' => CustomerDiscount::all(),
        ]);
    }

    public function delete(Request $request)
    {
        CustomerDiscount::find($request->delete)->delete();

        return view('customer_discounts_list', [
            'customer_discounts' => CustomerDiscount::all(),
        ]);
    }
}
