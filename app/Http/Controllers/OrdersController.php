<?php

namespace App\Http\Controllers;

use App\Models\CustomerDiscount;
use App\Models\OrdersDetails;
use App\Models\PriceListData;
use App\View\Components\back;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\PriceList;
use App\Models\Orders;


class OrdersController extends Controller
{
    //
    public function ordersShow()
    {
        $da = (request()->action == 'changed') ? request()->period : date('Y-m');
        $dateComps = date_parse($da);
        $year = $dateComps['year'];
        $month = $dateComps['month'];

        $orders = Orders::orderBy('order_date')->whereMonth('order_date', $month)->whereYear('order_date', $year)->get();
        $orderList = [];
        foreach ($orders as $order) {
            $customerSum = OrdersDetails::where('order_id', '=', $order['id'])->sum('customer_sum');
            $costSum = OrdersDetails::where('order_id', '=', $order['id'])->sum('cost_sum');
            $vp_total = OrdersDetails::where('order_id', '=', $order['id'])->sum('vpoints');
            $income = $customerSum - $costSum;
            $orderList[] = [
                'id' => $order['id'],
                'order_date' => $order['order_date'],
                'paid_date' => $order['paid_date'],
                'ship_date' => $order['ship_date'],
                'gena_date' => $order['gena_date'],
                'customer' => customer::find($order['customer'])->name,
                'pricelist' => $order['pricelist'],
                'customerSum' => $customerSum,
                'costSum' => $costSum,
                'vp_total' => $vp_total,
                'income' => $income,
            ];
        }
        return view('neworder', [
            'orders' => $orderList,
            'customers' => customer::all(),
            'pricelists' => PriceList::all(),
            'period' => $da,
        ]);
    }

    public function addOrder()
    {
        //dd(request());
        $order = new Orders();
        $order->customer = request()->customer;
        $order->order_date = request()->order_date;
        $order->pricelist = request()->pricelist;
        $order->save();

        return redirect()->route('neworder', ['period' => request()->period, 'action' => 'changed']);
    }

    public function editOrder()
    {
        //dd(Orders::find(request()->edit));
        $orderDetails = OrdersDetails::where('order_id', '=', request()->edit)->get();
        $priceList = Orders::find(request()->edit)->pricelist;

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
            ];
        }

        return view('orderdetails', [
            'order_id' => request()->edit,
            'pricelist' => $priceList,
            'ship_date' => Orders::where('id', '=', request()->edit)->first()->ship_date,
            'paid_date' => Orders::where('id', '=', request()->edit)->first()->paid_date,
            'gena_date' => Orders::where('id', '=', request()->edit)->first()->gena_date,
            'period' => request()->period,
            'details' => $details,
            'plProducts' => PriceListData::select('name')->where('price_list_id', '=', $priceList)->get(),
        ]);
    }

    public function deleteOrder() {
        Orders::find(request()->delete)->delete();
        OrdersDetails::where('order_id', '=', request()->delete)->delete();

        return redirect()->route('neworder', ['period' => request()->period, 'action' => 'changed']);
    }

    public function deleteDetail()
    {
        $order_id = OrdersDetails::where('id', '=', request()->delete)->first()->order_id;
        OrdersDetails::find(request()->delete)->delete();

        $orderDetails = OrdersDetails::where('order_id', '=', $order_id)->get();

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
            ];
        }
        $priceList = Orders::where('id', '=', $order_id)->first()->pricelist;
        //dd($details);
        return view('orderdetails', [
            'order_id' => $order_id,
            'pricelist' => $priceList,
            'ship_date' => Orders::where('id', '=', $order_id)->first()->ship_date,
            'paid_date' => Orders::where('id', '=', $order_id)->first()->paid_date,
            'gena_date' => Orders::where('id', '=', $order_id)->first()->gena_date,
            'details' => $details,
            'period' => request()->period,
            'plProducts' => PriceListData::select('name')->where('price_list_id', '=', $priceList)->get(),
        ]);
    }

    public function addDetail()
    {
        $customer = Orders::where('id', '=', request()->order_id)->first()->customer;
        $discount = customer::where('id', '=', $customer)->first()->discount;
        $koeff = CustomerDiscount::where('id', '=', $discount)->first()->value;

        $detail = new OrdersDetails();
        $detail->order_id = request()->order_id;
        $detail->product = request()->product;
        $detail->quantity = request()->quantity;
        $detail->customer_price = round($koeff * PriceListData::where('price_list_id', '=', request()->price_list)
            ->where('name', '=', request()->product)->first()->retail_price, 2);
        $detail->customer_sum = round($detail->customer_price * request()->quantity - request()->bonus, 2);
        $detail->cost_price = PriceListData::where('price_list_id', '=', request()->price_list)
                ->where('name', '=', request()->product)->first()->sv_price;
        $detail->cost_sum = round($detail->cost_price * request()->quantity, 2);
        $detail->income = round($detail->customer_sum, 2) - round($detail->cost_sum, 2);
        $detail->vpoints = request()->quantity * PriceListData::where('price_list_id', '=', request()->price_list)
            ->where('name', '=', request()->product)->first()->vpoints;

        $detail->save();

        $orderDetails = OrdersDetails::where('order_id', '=', request()->order_id)->get();
        $priceList = Orders::find(request()->order_id)->pricelist;

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
            ];
        }

        return view('orderdetails', [
            'order_id' => request()->order_id,
            'pricelist' => $priceList,
            'details' => $details,
            'period' => request()->period,
            'ship_date' => Orders::where('id', '=', request()->order_id)->first()->ship_date,
            'paid_date' => Orders::where('id', '=', request()->order_id)->first()->paid_date,
            'gena_date' => Orders::where('id', '=', request()->order_id)->first()->gena_date,
            'plProducts' => PriceListData::select('name')->where('price_list_id', '=', $priceList)->get(),
        ]);
    }

    public function up_shipdate()
    {
        $order = Orders::where('id', '=', request()->order_id)->first();
        $order->ship_date = request()->ship_date;
        $order->save();

        return redirect()->route('neworder', ['period' => request()->period, 'action' => 'changed']);
    }

    public function up_paiddate()
    {
        $order = Orders::where('id', '=', request()->order_id)->first();
        $order->paid_date = request()->paid_date;
        $order->save();

        return redirect()->route('neworder', ['period' => request()->period, 'action' => 'changed']);
    }

    public function up_genadate()
    {
        $order = Orders::where('id', '=', request()->order_id)->first();
        $order->gena_date = request()->gena_date;
        $order->save();

        return redirect()->route('neworder', ['period' => request()->period, 'action' => 'changed']);
    }

    public function changePeriod()
    {
        $date = request()->period;
        $dateComps = date_parse($date);
        $year = $dateComps['year'];
        $month = $dateComps['month'];
        if(request()->action == 'next') {
            if ($month == 12) {
                $month = 1;
                $year++;
            } else {
                $month++;
            }
        }
        if(request()->action == 'previous') {
            if ($month == 1) {
                $month = 12;
                $year--;
            } else {
                $month--;
            }
        }

        return redirect()->route('neworder', ['period' => $year . "-" . $month, 'action' => 'changed']);
    }


}
