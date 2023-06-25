<head>
    <title>Выберите заказ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>
<div class="d-flex flex-row justify-content-around">
    <x-back-to-warebill-set :period="$period"/>
    <x-back-to-main/>
</div>
<div class="container d-flex flex-row justify-content-center">
    <h2>Период</h2>
</div>
<div class="container d-flex flex-row justify-content-center">
    <td style="border: 1px solid; text-align: center;">
        {{$period}}
    </td><br>
</div>
<br>
<div class="container d-flex flex-row justify-content-center">
    <h2>Выберите заказ</h2>
</div>
<div class="container d-flex flex-row justify-content-center">
    <table style="text-align: center; vertical-align: middle; padding: 5px;">
        <form name="period" method="post" action="{{ url('/reports/getwarebill') }}">
            @csrf
            <tr style="padding: 5px;">
                <td style="padding: 5px;">
                <label for="order" class="fw-bold">Заказ</label>
                <select class="form-select form-select-sm shadow-lg py-2" name="order" id="expType" required>
                    @foreach($orders as $order)
                        <option value="{{$order['id']}}">
                            №{{$order['id']}} от {{$order['order_date']}}, {{\App\Models\customer::find($order['customer'])->name}}
                        </option>
                    @endforeach
                </select>
                </td>
                <br>
            </tr>
            <br>
            <tr style="padding: 5px;">
                <td style="padding: 5px;">
                <button class="btn btn-primary btn-sm" type="submit" name="period" value="{{$period}}">Получить отчет</button>
                </td>
            </tr>
        </form>
    </table>
</div>
</body>
