<head>
    <title>Детали прайс-листа {{\App\Models\PriceList::where('id', $pricelist_id)->first()->name}}</title>
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
<div>
    price list - {{\App\Models\PriceList::where('id', $pricelist_id)->first()->name}}
</div>

<div class="container d-flex flex-row justify-content-center">
    <table class="border shadow-lg" style="border: 1px solid white;">
        <tr>
            <th style="border: 1px solid;  text-align: center; padding: 3px;">ID</th>
            <th style="border: 1px solid; text-align: center;">Наименование продукта</th>
            <th style="border: 1px solid; text-align: center;">Очки</th>
            <th style="border: 1px solid; text-align: center;">Розничная цена, руб.</th>
            <th style="border: 1px solid; text-align: center;">Цена СВ, руб.</th>
            <th style="border: 1px solid; background-color: #e6dbb9; text-align: center;">НП 25%, руб.</th>
            <th style="border: 1px solid; background-color: #e6dbb9; text-align: center;">НП 35%, руб.</th>
            <th style="border: 1px solid; background-color: #e6dbb9; text-align: center;">НП 42%, руб.</th>
            <th style="border: 1px solid; background-color: #b6d4fe; text-align: center;">ПК 15%, руб.</th>
            <th style="border: 1px solid; background-color: #b6d4fe; text-align: center;">ПК 25%, руб.</th>
            <th style="border: 1px solid; background-color: #b6d4fe; text-align: center;">ПК 35%, руб.</th>
            <th style="border: 1px solid; background-color: hotpink; text-align: center;">Моя скидка 10%, руб.</th>
            <th style="border: 1px solid; background-color: hotpink; text-align: center;">Моя скидка 20%, руб.</th>
            <th style="border: 1px solid; background-color: hotpink; text-align: center;">Моя скидка 30%, руб.</th>
        </tr>

        @foreach ($pricelistdata as $item)
            <tr>
                <td style="border: 1px solid; text-align: center;">{{$item['id']}}</td>
                <td style="border: 1px solid;">{{$item['name']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$item['vpoints']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$item['retail_price']}}</td>
                <td style="border: 1px solid; text-align: center;">{{$item['sv_price']}}</td>
                <td style="border: 1px solid; background-color: papayawhip; text-align: center;">{{$item['ip25']}}</td>
                <td style="border: 1px solid; background-color: papayawhip; text-align: center;">{{$item['ip35']}}</td>
                <td style="border: 1px solid; background-color: papayawhip; text-align: center;">{{$item['ip42']}}</td>
                <td style="border: 1px solid; background-color: azure; text-align: center;">{{$item['pc15']}}</td>
                <td style="border: 1px solid; background-color: azure; text-align: center;">{{$item['pc25']}}</td>
                <td style="border: 1px solid; background-color: azure; text-align: center;">{{$item['pc35']}}</td>
                <td style="border: 1px solid; background-color: #eccccf; text-align: center;">{{$item['pd10']}}</td>
                <td style="border: 1px solid; background-color: #eccccf; text-align: center;">{{$item['pd20']}}</td>
                <td style="border: 1px solid; background-color: #eccccf; text-align: center;">{{$item['pd30']}}</td>

                <td style="border: 1px solid;">
                    <div class="d-flex flex-row justify-content-center">
                        <form name="delete" id="expense" method="post" enctype="multipart/form-data" action="{{url('/pricelistdata/updateitem')}}">
                            @csrf
                            <button type="submit" class="" name="update" value="{{$item}}">Редактировать</button>
                        </form>
                        <form name="delete" id="delete" method="post" enctype="multipart/form-data" action="{{url('/pricelistdata/deleteitem')}}">
                            @csrf
                            <button type="submit" class="" name="delete" value="{{$item}}">Удалить</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        <tr>
            <form name="create" id="create" method="post" enctype="multipart/form-data" action="{{url('/pricelistdata/newitem')}}">
                @csrf
                <td style="border: 1px solid;"></td>
                <td style="border: 1px solid; text-align: center;">
                    <input type="text" value="" name="name" required>
                </td>
                <td style="border: 1px solid; text-align: center;">
                    <input type="text" value="" name="vpoints" required>
                </td>
                <td style="border: 1px solid; text-align: center;">
                    <input type="text" value="" name="retail_price" required>
                </td>
                <td style="border: 1px solid; text-align: center;">
                    <input type="text" value="" name="sv_price" required>
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>
                <td style="border: 1px solid; text-align: center;">
                </td>

                <td style="border: 1px solid;">
                    <button type="submit" class="btn btn-primary" name="price_list_id" value="{{$pricelist_id}}">Добавить</button>
                </td>

            </form>
        </tr>
    </table>
</div>

