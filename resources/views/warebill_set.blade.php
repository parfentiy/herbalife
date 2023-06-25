<head>
    <title>Укажите период продаж</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>
<div class="d-flex flex-row justify-content-around">
    <x-back-to-reports-list :period="$period"/>
    <x-back-to-main/>
</div>
<div class="container d-flex flex-row justify-content-center">
    <h2>Укажите период</h2>
</div>
<div class="container d-flex flex-row justify-content-center">
    <table style="text-align: center; vertical-align: middle; padding: 5px;">
        <form name="period" method="post" action="{{ url('/reports/selectorder') }}">
            @csrf
            <tr style="padding: 5px;">
                <td style="border: 1px solid; text-align: center; padding: 5px;">
                    <label for="period">Месяц, год</label>
                    <input type="month" name="period" value="{{$period}}" required>
                </td><br>
            </tr>
            <tr style="padding: 5px;">
                <td style="align-items: center; padding: 5px;">
                    <button class="btn btn-primary btn-sm text-center" type="submit" name="action" value="!!!">Ok</button>
                </td>
            </tr>
        </form>
    </table>
</div>
</body>
