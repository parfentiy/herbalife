<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller
{
    //
    public function showAll()
    {

        return view('customers_list', [
            'customers' => customer::all(),
        ]);
    }

    public function add(Request $request) {
        //dd($request->file('photo'));


        $file = $request->file('photo');
        $name = $file->getClientOriginalName();

        $file->move('CustomersImages', $name);

        $customer = new customer($request->all());
        $customer->photo = $name;
        $customer->save();

        return view('customers_list', [
            'customers' => customer::all(),
        ]);
    }

    public function delete(Request $request)
    {
        customer::find($request->delete)->delete();

        return view('customers_list', [
            'customers' => customer::all(),
        ]);
    }

    public function update(Request $request) {

        $customer = customer::where('id', '=', $request['id'])->first();

        if(!is_null($request->file('photo'))) {
            $file = $request->file('photo');
            $name = $file->getClientOriginalName();
            $file->move('CustomersImages', $name);
            $customer->photo = $name;
        }

        $customer->name = $request['name'];
        $customer->status = $request['status'];
        $customer->discount = $request['discount'];
        $customer->comment = $request['comment'];
        $customer->startDate = $request['startDate'];
        $customer->fromWho = $request['fromWho'];
        $customer->city = $request['city'];
        $customer->bDay = $request['bDay'];
        $customer->type = $request['type'];
        $customer->abonNumber = $request['abonNumber'];

        $customer->save();

        return view('customers_list', [
            'customers' => customer::all(),
        ]);
    }
}
