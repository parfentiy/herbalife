<head>
    <title>Накладная к заказу №{{$order_id}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>
<div class="d-flex flex-row justify-content-around">
    <x-back-to-warebill-list :period="$period"/>
    <x-back-to-main/>
    <x-warebill-pdf :period="$period" :order="$order_id"  who='gena'/>
</div>
<div class="container d-flex flex-row justify-content-center">
    <h2>Товарная накладная к заказу №{{$order_id}}</h2>
</div>
<div class="container d-flex flex-row justify-content-center">
    @php
        $item = \App\Models\Orders::where('id', '=', $order_id)->first()->customer;
        $customer_name = \App\Models\customer::find($item)->name;
        $customer_photo = \App\Models\customer::find($item)->photo;
    @endphp
    <div style="text-align: center;">
        <div>
            <h4>Клиент: {{$customer_name}}<h4>
        </div>
        <div>
            <img style="height: 150;" src="/CustomersImages/{{$customer_photo}}">
        </div>
    </div>
</div>
<div class="d-flex justify-content-center flex-row">
    <div class="p-3">
        <b>Прайст-лист:</b> {{\App\Models\PriceList::where('id', $pricelist)->first()->name}}
    </div>
    <div class="p-3">
        <td style="border: 1px solid; text-align: center;">
            <label for="paid_date"><b>Оплачено:</b> {{$paid_date}}</label>
        </td>
    </div>
    <div class="p-3">
        <td style="border: 1px solid; text-align: center;">
            <label for="ship_date"><b>Отгружено:</b> {{$ship_date}}</label>
        </td>
    </div>
</div>


<table class="container d-flex flex-row justify-content-center" style="border: 1px solid white; border-collapse: collapse">
    <tr>
        <th style="border: 1px solid; text-align: center;">Продукт</th>
        <th style="border: 1px solid; text-align: center;">Количество</th>

        <th style="border: 1px solid; text-align: center;">Сумма</th>
    </tr>
    @php
        $customer_total = 0;
    @endphp

    @foreach($details as $detail)
        <tr>
            <td style="border: 1px solid; text-align: center;">{{$detail['product']}}</td>
            <td style="border: 1px solid; text-align: center;">{{$detail['quantity']}}</td>

            <td style="border: 1px solid; text-align: center;">{{$detail['cost_sum']}} р.</td>
        </tr>
        @php
            $customer_total += $detail['cost_sum'];
        @endphp
    @endforeach
    <tr>
        <td style="border: 1px solid; text-align: center;"><b>ИТОГО</b></td>
        <td style="border: 1px solid; text-align: center;"></td>

        <td style="border: 1px solid; text-align: center;"><b>{{$customer_total}} р.</b></td>
    </tr>
</table>
</body>
