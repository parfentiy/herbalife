<head>
    <title>Детали заказа №{{$order_id}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>
<div class="d-flex flex-row justify-content-around">
    <x-back-to-orders-list :period="$period"/>
    <x-back-to-main/>
</div>
<div class="container d-flex flex-row justify-content-center">
    <h2>Детали заказа №{{$order_id}}</h2>
</div>
<div class="container d-flex flex-row justify-content-center">
    @php
        $item = \App\Models\Orders::where('id', '=', $order_id)->first()->customer;
        $customer_name = \App\Models\customer::find($item)->name;
        $customer_photo = \App\Models\customer::find($item)->photo;
    @endphp
    <div>
        <h4>Клиент: {{$customer_name}}<h4>

        <img src="CustomersImages/{{$customer_photo}}" style="height: 150;">
    </div>
</div>
<div class="container d-flex flex-row justify-content-center">
    Прайс-лист: {{\App\Models\PriceList::where('id', $pricelist)->first()->name}}
</div>
<div class="container d-flex flex-row justify-content-center">
    <form name="paid_date" method="post" action="{{ url('/up_paiddate') }}">
        @csrf
        <td style="border: 1px solid; text-align: center;">
            <label for="paid_date">Оплачено</label>
            <input type="date" value="{{$paid_date}}" name="paid_date">
            <input type="hidden" name="period" value="{{$period}}">
            <button class="btn btn-primary btn-sm" type="submit" name="order_id" value="{{$order_id}}">Сохранить</button>
        </td>
    </form>
</div>
<div class="container d-flex flex-row justify-content-center">
    <form name="gena_date" method="post" action="{{ url('/up_genadate') }}">
        @csrf
        <td style="border: 1px solid; text-align: center;">
            <label for="gena_date">Оплачено Гене</label>
            <input type="date" value="{{$gena_date}}" name="gena_date">
            <input type="hidden" name="period" value="{{$period}}">
            <button class="btn btn-primary btn-sm" type="submit" name="order_id" value="{{$order_id}}">Сохранить</button>
        </td>
    </form>
</div>
<div class="container d-flex flex-row justify-content-center">
    <form name="ship_date" method="post" action="{{ url('/up_shipdate') }}">
        @csrf
        <td style="border: 1px solid; text-align: center;">
            <label for="ship_date">Отгружено</label>
            <input type="date" value="{{$ship_date}}" name="ship_date">
            <input type="hidden" name="period" value="{{$period}}">
            <button class="btn btn-primary btn-sm" type="submit" name="order_id" value="{{$order_id}}">Сохранить</button>
        </td>
    </form>
</div>


<table class="container d-flex flex-row justify-content-center" style="border: 1px solid white; border-collapse: collapse">
    <tr>
        <th style="border: 1px solid; text-align: center;">№</th>
        <th style="border: 1px solid; text-align: center;">Продукт</th>
        <th style="border: 1px solid; text-align: center;">Количество</th>
        <th style="border: 1px solid; text-align: center;">Цена клиенту</th>
        <th style="border: 1px solid; text-align: center;">Сумма клиенту</th>
        <th style="border: 1px solid; text-align: center;">Себестоимость</th>
        <th style="border: 1px solid; text-align: center;">Сумма себест.</th>
        <th style="border: 1px solid; text-align: center;">Доход</th>
        <th style="border: 1px solid; text-align: center; ">Очки</th>

    </tr>
    @php
        $customer_total = 0;
        $cost_total = 0;
        $income = 0;
        $vpoints = 0;
    @endphp

    @foreach($details as $detail)


        <tr>
            <form name="delete_detail" method="post" action="{{ url('/delete_detail') }}">
                @csrf
                <td style="border: 1px solid; text-align: center;">{{$detail['id']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$detail['product']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$detail['quantity']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$detail['customer_price']}} р.</td>
                <td style="border: 1px solid; text-align: center;">{{$detail['customer_sum']}} р.</td>
                <td style="border: 1px solid; text-align: center;">{{$detail['cost_price']}} р.</td>
                <td style="border: 1px solid; text-align: center;">{{$detail['cost_sum']}} р.</td>
                <td style="border: 1px solid; text-align: center;">{{round($detail['income'], 2)}} р.</td>
                <td style="border: 1px solid; text-align: center;">{{$detail['vpoints']}}</td>
                <input type="hidden" name="period" value="{{$period}}">

                <td style="border: 1px solid; text-align: center;">
                    <button class="btn btn-primary btn-sm" type="submit" name="delete" value="{{$detail['id']}}">Удалить</button>
                </td>
            </form>
        </tr>
        @php
            $customer_total += $detail['customer_sum'];
            $cost_total += $detail['cost_sum'];
            $income += $detail['income'];
            $vpoints += $detail['vpoints'];
        @endphp
    @endforeach
    <tr>
        <td style="border: 1px solid; text-align: center;"></td>
        <td style="border: 1px solid; text-align: center;"><b>ИТОГО</b></td>
        <td style="border: 1px solid; text-align: center;"></td>
        <td style="border: 1px solid; text-align: center;"></td>
        <td style="border: 1px solid; text-align: center;"><b>{{$customer_total}} р.</b></td>
        <td style="border: 1px solid; text-align: center;"></td>
        <td style="border: 1px solid; text-align: center;"><b>{{$cost_total}} р.</b></td>
        <td style="border: 1px solid; text-align: center;"><b>{{round($income, 2)}} р.</b></td>
        <td style="border: 1px solid; text-align: center;"><b>{{$vpoints}}</b></td>
    </tr>

    <form name="new_detail" method="post" action="{{ url('add_detail') }}">
        @csrf
        <td class="p-2" style="border: 1px solid;">

        </td>
        <td class="p-2"  style="border: 1px solid;">
            <label for="product"></label>
            <select name="product" id="product">
                @foreach($plProducts as $plProduct)
                    <option value="{{$plProduct['name']}}">{{$plProduct['name']}}</option>
                @endforeach
            </select>
        </td>
        <td class="p-2" style="border: 1px solid;">
            <label for="quantity"></label>
            <input type="text" value="" name="quantity">
        </td>
        <td class="p-2" style="border: 1px solid;">
        </td>
        <td class="p-2" style="border: 1px solid;">
            <input name="order_id" value="{{$order_id}}" hidden>
            <input name="price_list" value="{{$pricelist}}" hidden>
            <label for="bonus">Бонус</label><input type="text" name="bonus" value="">


        </td>
        <td class="p-2" style="border: 1px solid;">

        </td>
        <td class="p-2" style="border: 1px solid;">

        </td>
        <td class="p-2" style="border: 1px solid;">

        </td>
        <td class="p-2" style="border: 1px solid;">

        </td>
        <input type="hidden" name="period" value="{{$period}}">

        <td class="p-2" style="border: 1px solid;">
            <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
        </td>
    </form>

</table>
</body>
