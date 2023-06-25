<head>
    <title>Списание клуба</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>
<div class="d-flex flex-row justify-content-around">
    <x-back-to-main/>
</div>
<div class="fs-1 d-flex align-items-center justify-content-center">
    Списание клуба
</div><br>
<div class="row">
    <div class="col-sm-3 px-lg-5">
        <form name="newbalanceitem" method="post" action="{{ url('/balance/addOperation') }}">
            @csrf
            <div class="row pb-2">
                <b>Новая операция:</b></label>
            </div>
            <div class="row pb-2">
                <label for="date"><b>Дата</b></label>
                <input type="date" id="date" name="date" value="{{now()}}" required>
            </div>
            <div class="row pb-2">
                <label for="customer"><b>Клиент</b></label>
                <select name="customer" id="customer">
                    @foreach($customers as $customer)
                        <option value="{{$customer['id']}}">{{$customer['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row pb-2">
                <label for="type"><b>Тип операции</b></label>
                <select name="type" id="type">
                    <option value="Expense">Расход</option>
                    <option value="Income">Пополнение</option>
                </select>
            </div>
            <div class="row pb-2">
                <label for="aloe"><b>Алоэ</b></label>
                <input type="aloe" id="aloe" name="aloe" required>
            </div>
            <div class="row pb-2">
                <label for="tea"><b>Чай</b></label>
                <input type="tea" id="tea" name="tea" required>
            </div>
            <div class="row pb-2">
                <label for="cocktail"><b>Коктейль</b></label>
                <input type="cocktail" id="cocktail" name="cocktail" required>
            </div>
            <div class="row pb-2">
                <label for="reason"><b>Примечание</b></label>
                <input type="reason" id="reason" name="reason">
            </div>
            <div class="row pb-3">
                <button type="submit" class="btn btn-primary btn-sm" name="period" value="">Добавить операцию</button>
            </div>
        </form>
    </div>
    <div class="col-sm-8 px-lg-5">
        <table class="container d-flex flex-row justify-content-center" style="border: 1px solid white; border-collapse: collapse">
            <tr style="background-color: yellow";>
                <td rowspan="2"; style="border: 1px solid; text-align: center;"><b>Дата</b></td>
                <td rowspan="2"; style="border: 1px solid; text-align: center;"><b>Клиент</b></td>
                <th colspan="4"; style="border: 1px solid; text-align: center; ">Алоэ</th>
                <th colspan="4"; style="border: 1px solid; text-align: center; ">Чай</th>
                <th colspan="4"; style="border: 1px solid; text-align: center; ">Коктейль</th>
                <th rowspan="2"; style="border: 1px solid; text-align: center; ">Примечание</th>

            </tr>
            <tr style="background-color: yellow";>
                <th style="border: 1px solid; text-align: center; ">Кладу</th>
                <th style="border: 1px solid; text-align: center; ">Едят</th>
                <th style="border: 1px solid; text-align: center; ">Ост.</th>
                <th style="border: 1px solid; text-align: center; ">Шт.</th>
                <th style="border: 1px solid; text-align: center; ">Кладу</th>
                <th style="border: 1px solid; text-align: center; ">Едят</th>
                <th style="border: 1px solid; text-align: center; ">Ост.</th>
                <th style="border: 1px solid; text-align: center; ">Шт.</th>
                <th style="border: 1px solid; text-align: center; ">Кладу</th>
                <th style="border: 1px solid; text-align: center; ">Едят</th>
                <th style="border: 1px solid; text-align: center; ">Ост.</th>
                <th style="border: 1px solid; text-align: center; ">Шт.</th>
            </tr>
            @php
                @endphp
            @foreach($balanceItems as $item)
                <form name="delete_order" method="post" action="{{ url('/balance/delete') }}">
                    @csrf

                    <tr>
                        <td style="border: 1px solid; text-align: center; background-color: darkgray">{{date("d.m.Y", strtotime($item['motion_date']))}}</td>
                        <td style="border: 1px solid; text-align: center; background-color: darkgray">
                            <b>{{\App\Models\customer::where('id', $item['customer'])->first()->name}}</b>
                        </td>

                        @if ($item->operation_type === "Income")
                            <td style="border: 1px solid; text-align: center;">{{$item['aloe_writeoff']}}</td>
                            <td style="border: 1px solid; text-align: center;"></td>
                            <td style="border: 1px solid; text-align: center;"><b>{{$item['aloe_balance']}}</b></td>
                            <td style="border: 1px solid; text-align: center; background-color: darkgray">{{intdiv($item['aloe_writeoff'], 75)}}</td>
                        @else
                            <td style="border: 1px solid; text-align: center;"> </td>
                            <td style="border: 1px solid; text-align: center;">{{$item['aloe_writeoff']}}</td>
                            <td style="border: 1px solid; text-align: center;"><b>{{$item['aloe_balance']}}</b></td>
                            <td style="border: 1px solid; text-align: center; background-color: darkgray"></td>
                        @endif

                        @if ($item->operation_type === "Income")
                            <td style="border: 1px solid; text-align: center;">{{$item['tea_writeoff']}}</td>
                            <td style="border: 1px solid; text-align: center;"></td>
                            <td style="border: 1px solid; text-align: center;"><b>{{$item['tea_balance']}}</b></td>
                            <td style="border: 1px solid; text-align: center; background-color: darkgray">{{intdiv($item['tea_writeoff'], 50)}}</td>
                        @else
                            <td style="border: 1px solid; text-align: center;"> </td>
                            <td style="border: 1px solid; text-align: center;">{{$item['tea_writeoff']}}</td>
                            <td style="border: 1px solid; text-align: center;"><b>{{$item['tea_balance']}}</b></td>
                            <td style="border: 1px solid; text-align: center; background-color: darkgray"></td>
                        @endif

                        @if ($item->operation_type === "Income")
                            <td style="border: 1px solid; text-align: center;">{{$item['cocktail_writeoff']}}</td>
                            <td style="border: 1px solid; text-align: center;"></td>
                            <td style="border: 1px solid; text-align: center;"><b>{{$item['cocktail_balance']}}<b></td>
                            <td style="border: 1px solid; text-align: center; background-color: darkgray">{{intdiv($item['cocktail_writeoff'], 21)}}</td>
                        @else
                            <td style="border: 1px solid; text-align: center;"> </td>
                            <td style="border: 1px solid; text-align: center;">{{$item['cocktail_writeoff']}}</td>
                            <td style="border: 1px solid; text-align: center;"><b>{{$item['cocktail_balance']}}</b></td>
                            <td style="border: 1px solid; text-align: center; background-color: darkgray"></td>
                        @endif

                        <td style="border: 1px solid; text-align: center;">{{$item['reason']}}</td>

                        <td style="border: 1px solid; text-align: center;">
                            <button class="btn btn-primary btn-sm" type="submit" name="balance" value="{{$item['id']}}">Удалить</button>
                        </td>
                </form>
                </tr>
            @endforeach
        </table>
    </div>
</div>






