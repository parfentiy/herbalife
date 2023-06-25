<head>
    <title>Список статусов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<a name="top"></a>
<x-header/>

<div class="d-flex flex-row justify-content-around">
    <x-back-to-libraries-list/>
    <form name="customerstatusnew" id="customerstatusnew" method="post" enctype="multipart/form-data" action="{{url('/customer/status/new')}}">
        @csrf
        <br>
        <button type="submit" class="btn btn-primary" name="action" value="customerstatusnew">Добавить статус</button>
    </form>
    <x-back-to-main/>
</div>

<div class="container d-flex flex-row justify-content-center">
    <table class="border shadow-lg" style="border: 1px solid white;">
        <tr>
            <th style="border: 1px solid;  text-align: center; padding: 3px;">ID</th>
            <th style="border: 1px solid; text-align: center;">Название</th>
            <th style="border: 1px solid; text-align: center;">Комментарий</th>
            <th style="border: 1px solid; text-align: center;">Действие</th>
        </tr>
@foreach ($customer_statuses as $customer_status)
            <tr>
                <td style="border: 1px solid; text-align: center;">{{$customer_status['id']}}</td>
                <td style="border: 1px solid;">{{$customer_status['name']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$customer_status['comment']}}</td>
                <td style="border: 1px solid;">
                    <div class="d-flex flex-row justify-content-center">
                        <form name="delete" id="delete" method="post" enctype="multipart/form-data" action="{{url('/customer/status/delete')}}">
                            @csrf
                            <button type="submit" class="" name="delete" value="{{$customer_status['id']}}">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
@endforeach
    </table>
</div>
