<head>
    <title>Список скидок</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<a name="top"></a>
<x-header/>

<div class="d-flex flex-row justify-content-around">
    <x-back-to-libraries-list/>
    <form name="customerdiscountnew" id="customerdiscountnew" method="post" enctype="multipart/form-data" action="{{url('/customer/discount/new')}}">
        @csrf
        <br>
        <button type="submit" class="btn btn-primary" name="action" value="customerdiscountnew">Добавить скидку</button>
    </form>
    <x-back-to-main/>
</div>

<div class="container d-flex flex-row justify-content-center">
    <table class="border shadow-lg" style="border: 1px solid white;">
        <tr>
            <th style="border: 1px solid;  text-align: center; padding: 3px;">ID</th>
            <th style="border: 1px solid; text-align: center;">Название</th>
            <th style="border: 1px solid; text-align: center;">Размер</th>
            <th style="border: 1px solid; text-align: center;">Комментарий</th>
            <th style="border: 1px solid; text-align: center;">Действие</th>
        </tr>
@foreach ($customer_discounts as $customer_discount)
            <tr>
                <td style="border: 1px solid; text-align: center;">{{$customer_discount['id']}}</td>
                <td style="border: 1px solid;">{{$customer_discount['name']}}</td>
                <td style="border: 1px solid;">{{$customer_discount['value']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$customer_discount['comment']}}</td>
                <td style="border: 1px solid;">
                    <div class="d-flex flex-row justify-content-center">
                        <form name="delete" id="delete" method="post" enctype="multipart/form-data" action="{{url('/customer/discount/delete')}}">
                            @csrf
                            <button type="submit" class="" name="delete" value="{{$customer_discount['id']}}">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
@endforeach
    </table>
</div>
