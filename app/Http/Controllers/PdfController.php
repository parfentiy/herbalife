<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrdersDetails;
use App\Models\PriceListData;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    //
    public function warebillPdf(Request $request)
    {
        //dd(request());
        $orderDetails = OrdersDetails::where('order_id', '=', request()->order)->get();
        $priceList = Orders::find(request()->order)->pricelist;

        $item = \App\Models\Orders::where('id', '=', request()->order)->first()->customer;
        $customer_name = \App\Models\customer::find($item)->name;
        $order_date = Orders::where('id', '=', request()->order)->first()->order_date;


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
        $who = ($request->who == "customer") ? 'warebill_report_customer_pdf' : 'warebill_report_pdf';
        $pdf = Pdf::loadView($who, [
            'order_id' => request()->order,
            'pricelist' => $priceList,
            'ship_date' => Orders::where('id', '=', request()->order)->first()->ship_date,
            'paid_date' => Orders::where('id', '=', request()->order)->first()->paid_date,
            'period' => request()->period,
            'details' => $details,
            'plProducts' => PriceListData::select('name')->where('price_list_id', '=', $priceList)->get(),
        ]);
        $pdf->setOption('defaultFont', 'DejaVu Sans');
        $pdf->setOption('fontHeightRatio', '0.7');
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->download($customer_name . '. ТН к счету №' . request()->order . ' от ' . $order_date . '.pdf');
    }
}
