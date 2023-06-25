<style type="text/css">
    * {
        /*font-family: Helvetica, sans-serif;*/
        font-family: "DejaVu Sans", sans-serif;
        font-size: 15px;

    }
</style>
<head>
    <title>Накладная в PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>

<div style="text-align: center">
    <h2>Товарная накладная к заказу №{{$order_id}}</h2>
</div>
<div>
    @php
        $item = \App\Models\Orders::where('id', '=', $order_id)->first()->customer;
        $customer_name = \App\Models\customer::find($item)->name;
        $customer_photo = \App\Models\customer::find($item)->photo;
    @endphp
    <div style="text-align: center;">
            <h4>Клиент: {{$customer_name}}<h4>
            <img style="height: 150;" src="CustomersImages/{{$customer_photo}}">
    </div>
</div>
<table style="align-items: center; width: 100%;">
    <tr>
        <td>
            <b>Прайст-лист:</b> {{\App\Models\PriceList::where('id', $pricelist)->first()->name}}
        </td>
        <td>
            <label for="paid_date"><b>Оплачено:</b> {{$paid_date}}</label>
        </td>
        <td>
            <label for="ship_date"><b>Отгружено:</b> {{$ship_date}}</label>
        </td>
    </tr>
</table>

<br>

<table style="align-items: center; width: 100%; border: 1px solid white; border-collapse: collapse">
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
            <td style="border: 1px solid; text-align: center;">{{$detail['customer_sum']}} р.</td>
        </tr>
        @php
            $customer_total += $detail['customer_sum'];
        @endphp
    @endforeach
    <tr>
        <td style="border: 1px solid; text-align: center;"><b>ИТОГО</b></td>
        <td style="border: 1px solid; text-align: center;"></td>

        <td style="border: 1px solid; text-align: center;"><b>{{$customer_total}} р.</b></td>
    </tr>
</table>
</body>
