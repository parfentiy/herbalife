<head>
    <title>Список клиентов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<a name="top"></a>
<x-header/>

<div class="d-flex flex-row justify-content-around">
    <x-back-to-libraries-list/>
    <form name="customernew" id="customernew" method="post" enctype="multipart/form-data" action="{{url('/customer/new')}}">
        @csrf
        <br>
        <button type="submit" class="btn btn-primary" name="action" value="customernew">Добавить клиента</button>
    </form>
    <x-back-to-main/>
</div>

<div class="container d-flex flex-row justify-content-center">
    <table class="border shadow-lg" style="border: 1px solid white;">
        <tr>
            <th style="border: 1px solid;  text-align: center; padding: 3px;">ID</th>
            <th style="border: 1px solid; text-align: center;">ФИО</th>
            <th style="border: 1px solid; text-align: center;">Фото</th>

            <th style="border: 1px solid; text-align: center;">Скидка</th>
            <th style="border: 1px solid; text-align: center;">Статус</th>
            <th style="border: 1px solid; text-align: center;">Тип клиента</th>
            <th style="border: 1px solid; text-align: center;">№ абона</th>

            <th style="border: 1px solid; text-align: center;">Дата рождения</th>
            <th style="border: 1px solid; text-align: center;">Город</th>
            <th style="border: 1px solid; text-align: center;">Дата прихода</th>
            <th style="border: 1px solid; text-align: center;">От кого</th>

            <th style="border: 1px solid; text-align: center;">Комментарий</th>
            <th style="border: 1px solid; text-align: center;">Действие</th>
        </tr>

@foreach ($customers as $customer)
            <tr>
                <td style="border: 1px solid; text-align: center;">{{$customer['id']}}</td>
                <td style="border: 1px solid;">{{$customer['name']}}</td>
                <td style="border: 1px solid; text-align: center;">
                    @if (!is_null($customer['photo']))
                        <img src="{{"\CustomersImages" . DIRECTORY_SEPARATOR . $customer['photo']}}" style="max-width: 70px; height: auto;">
                    @endif
                </td>

                <td style="border: 1px solid; text-align: center;">{{App\Models\CustomerDiscount::find($customer['discount'])->name}}</td>
                <td style="border: 1px solid; text-align: center;">{{App\Models\CustomerStatus::find($customer['status'])->name}}</td>
                <td style="border: 1px solid; text-align: center;">{{$customer['type']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$customer['abonNumber']}}</td>

                <td style="border: 1px solid; text-align: center;">{{date("d-m-Y", strtotime($customer['bDay']))}}</td>
                <td style="border: 1px solid; text-align: center;">{{$customer['city']}}</td>
                <td style="border: 1px solid; text-align: center;">{{date("d-m-Y", strtotime($customer['startDate']))}}</td>
                <td style="border: 1px solid; text-align: center;">{{$customer['fromWho']}}</td>

                <td style="border: 1px solid; text-align: center;">{{$customer['comment']}}</td>

                <td style="border: 1px solid;">
                    <div class="d-flex flex-row justify-content-center">
                        <form name="delete" id="expense" method="post" enctype="multipart/form-data" action="{{url('/customer/edit')}}">
                            @csrf
                            <button type="submit" class="" name="id" value="{{$customer['id']}}">Редактировать</button>
                        </form>
                        <form name="delete" id="delete" method="post" enctype="multipart/form-data" action="{{url('/customer/delete')}}">
                            @csrf
                            <button type="submit" class="" name="delete" value="{{$customer['id']}}">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
@endforeach
    </table>
</div>
