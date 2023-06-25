<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\CustomerStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CustomerStatusController extends Controller
{
    //
    public function showAll()
    {

        return view('customer_statuses_list', [
            'customer_statuses' => CustomerStatus::all(),
        ]);
    }

    public function add(Request $request) {
        $customer_status = new CustomerStatus($request->all());
        $customer_status->save();

        return view('customer_statuses_list', [
            'customer_statuses' => CustomerStatus::all(),
        ]);
    }

    public function delete(Request $request)
    {
        CustomerStatus::find($request->delete)->delete();

        return view('customer_statuses_list', [
            'customer_statuses' => CustomerStatus::all(),
        ]);
    }
}
