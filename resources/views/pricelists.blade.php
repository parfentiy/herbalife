<head>
    <title>Список прайс-листов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<a name="top"></a>
<x-header/>

<div class="d-flex flex-row justify-content-around">
    <x-back-to-libraries-list/>
    <x-back-to-main/>
</div>

<div class="container d-flex flex-row justify-content-center">
    <table class="border shadow-lg" style="border: 1px solid white;">
        <tr>
            <th style="border: 1px solid;  text-align: center; padding: 3px;">ID</th>
            <th style="border: 1px solid; text-align: center;">Наименование прайс-листа</th>
            <th style="border: 1px solid; text-align: center;">Дата создания</th>
            <th style="border: 1px solid; text-align: center;">Дата изменения</th>
            <th style="border: 1px solid; text-align: center;">Действие</th>
        </tr>

        @foreach ($priceLists as $priceList)
            <tr>
                <td style="border: 1px solid; text-align: center;">{{$priceList['id']}}</td>
                <td style="border: 1px solid;">{{$priceList['name']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$priceList['created_at']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$priceList['updated_at']}}</td>

                <td style="border: 1px solid;">
                    <div class="d-flex flex-row justify-content-center">
                        <form name="delete" id="expense" method="post" enctype="multipart/form-data" action="{{url('/pricelist/edit')}}">
                            @csrf
                            <button type="submit" class="" name="id" value="{{$priceList['id']}}">Редактировать</button>
                        </form>
                        <form name="delete" id="delete" method="post" enctype="multipart/form-data" action="{{url('/pricelist/delete')}}">
                            @csrf
                            <button type="submit" class="" name="delete" value="{{$priceList['id']}}">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        <tr>
            <form name="create" id="create" method="post" enctype="multipart/form-data" action="{{url('/pricelist/new')}}">
                @csrf
                <td style="border: 1px solid;"></td>
                <td style="border: 1px solid; text-align: center;">
                    <input type="text" value="" name="name" required>
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid;">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </td>

            </form>
        </tr>
    </table>
</div>

