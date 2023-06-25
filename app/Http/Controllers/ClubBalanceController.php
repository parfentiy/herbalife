<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClubBalance;
use App\Models\customer;

class ClubBalanceController extends Controller
{
    //
    public function deleteOperation()
    {
        //dd(request());
        ClubBalance::find(request()->balance)->delete();

        return view('balancepage', [
            'customers' => customer::all(),
            'balanceItems' => ClubBalance::orderBy('id', 'desc')->get(),
        ]);

    }

    public function addOperation()
    {
        //dd(request());
        $lastRecord = ClubBalance::latest('id')->first();
        //dd($lastRecord->aloe_balance);
        if (is_null($lastRecord)) {
            $lastAloe = 0;
            $lastTea = 0;
            $lastCocktail = 0;

        } else {
            $lastAloe = $lastRecord->aloe_balance;
            $lastTea = $lastRecord->tea_balance;
            $lastCocktail = $lastRecord->cocktail_balance;
        }

        $koeff = (request()->type === "Expense") ? -1 : 1;
        $newItem = new ClubBalance();
        $newItem->motion_date = request()->date;
        $newItem->operation_type = request()->type;
        $newItem->customer = request()->customer;
        $newItem->aloe_writeoff = request()->aloe;
        $newItem->tea_writeoff = request()->tea;
        $newItem->cocktail_writeoff = request()->cocktail;
        $newItem->aloe_balance += $koeff * request()->aloe + $lastAloe;
        $newItem->tea_balance += $koeff * request()->tea + $lastTea;
        $newItem->cocktail_balance += $koeff * request()->cocktail + $lastCocktail;
        $newItem->reason = request()->reason;

        $newItem->save();

        return view('balancepage', [
            'customers' => customer::all(),
            'balanceItems' => ClubBalance::orderBy('id', 'desc')->get(),
        ]);

    }
}
