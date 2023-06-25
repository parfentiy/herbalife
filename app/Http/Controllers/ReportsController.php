<?php

namespace App\Http\Controllers;

use App\Models\OrdersDetails;
use App\Models\PriceListData;
use Illuminate\Http\Request;
use App\Models\Orders;

class ReportsController extends Controller
{
    //
    public function warebillSet()
    {
        $da = (!is_null(request()->period)) ? request()->period : date('Y-m');
        $dateComps = date_parse($da);
        $year = $dateComps['year'];
        $month = $dateComps['month'];
        //dump($dateComps);

        //$orders = Orders::orderBy('order_date')->whereMonth('order_date', $month)->whereYear('order_date', $year)->get();
        $m = ($month > 9) ? '' : '0';
        return view('warebill_set', [
            //'orders' => $orders,
            'period' => $year . "-" . $m . $month,
        ]);
    }

    public function warebillSetCustomer()
    {
        $da = (!is_null(request()->period)) ? request()->period : date('Y-m');
        $dateComps = date_parse($da);
        $year = $dateComps['year'];
        $month = $dateComps['month'];
        //dump($dateComps);

        //$orders = Orders::orderBy('order_date')->whereMonth('order_date', $month)->whereYear('order_date', $year)->get();
        $m = ($month > 9) ? '' : '0';
        return view('warebill_set_customer', [
            //'orders' => $orders,
            'period' => $year . "-" . $m . $month,
        ]);
    }

    public function getWarebill()
    {
        //dd(request());
        $orderDetails = OrdersDetails::where('order_id', '=', request()->order)->get();
        $priceList = Orders::find(request()->order)->pricelist;

        $details = [];
        foreach ($orderDetails as $orderDetail) {
            $details[] = [
                'id' => $orderDetail['id'],
                'product' => $orderDetail['product'],
                'quantity' => $orderDetail['quantity'],
                'customer_price' => $orderDetail['customer_price'],
                'customer_sum' => $orderDetail['customer_sum'],
                'cost_price' => $orderDetail['cost_price'],
                'cost_sum' => $orderDetail['cost_sum'],
                'income' => $orderDetail['income'],
                'vpoints' => $orderDetail['vpoints'],
                'period' => request()->period,
            ];
        }

        return view('warebill_report', [
            'order_id' => request()->order,
            'pricelist' => $priceList,
            'ship_date' => Orders::where('id', '=', request()->order)->first()->ship_date,
            'paid_date' => Orders::where('id', '=', request()->order)->first()->paid_date,
            'period' => request()->period,
            'details' => $details,
            'plProducts' => PriceListData::select('name')->where('price_list_id', '=', $priceList)->get(),
        ]);
    }

    public function getWarebillCustomer()
    {
        //dd(request());
        $orderDetails = OrdersDetails::where('order_id', '=', request()->order)->get();
        $priceList = Orders::find(request()->order)->pricelist;

        $details = [];
        foreach ($orderDetails as $orderDetail) {
            $details[] = [
                'id' => $orderDetail['id'],
                'product' => $orderDetail['product'],
                'quantity' => $orderDetail['quantity'],
                'customer_price' => $orderDetail['customer_price'],
                'customer_sum' => $orderDetail['customer_sum'],
                'cost_price' => $orderDetail['cost_price'],
                'cost_sum' => $orderDetail['cost_sum'],
                'income' => $orderDetail['income'],
                'vpoints' => $orderDetail['vpoints'],
                'period' => request()->period,
            ];
        }

        return view('warebill_report_customer', [
            'order_id' => request()->order,
            'pricelist' => $priceList,
            'ship_date' => Orders::where('id', '=', request()->order)->first()->ship_date,
            'paid_date' => Orders::where('id', '=', request()->order)->first()->paid_date,
            'period' => request()->period,
            'details' => $details,
            'plProducts' => PriceListData::select('name')->where('price_list_id', '=', $priceList)->get(),
        ]);
    }

    public function selectOrder()
    {
        //dd(request());
        $da = request()->period;
        $dateComps = date_parse($da);
        $year = $dateComps['year'];
        $month = $dateComps['month'];

        $orders = Orders::orderBy('order_date')->whereMonth('order_date', $month)->whereYear('order_date', $year)->get();
        $m = ($month > 9) ? '' : '0';
        return view('warebill_select_order', [
            'orders' => $orders,
            'period' => $year . "-" . $m . $month,
        ]);
    }

    public function selectOrderCustomer()
    {
        //dd(request());
        $da = request()->period;
        $dateComps = date_parse($da);
        $year = $dateComps['year'];
        $month = $dateComps['month'];

        $orders = Orders::orderBy('order_date')->whereMonth('order_date', $month)->whereYear('order_date', $year)->get();
        $m = ($month > 9) ? '' : '0';
        return view('warebill_select_order_customer', [
            'orders' => $orders,
            'period' => $year . "-" . $m . $month,
        ]);
    }
}
