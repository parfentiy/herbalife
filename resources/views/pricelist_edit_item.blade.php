<head>
    <title>Редактирование записи в прайс-листе</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>

<form name="pricelist_edit_item" method="post" action="{{ route ('pricelistdata_save') }}">
    @csrf
    <input type="hidden" id="price_list_id" name="price_list_id" value="{{$price_list_id}}" class="form-control" required><br>
    <input type="hidden" id="id" name="id" value="{{$id}}" class="form-control" required><br>
    <label for="name">Название</label><input type="text" id="name" name="name" value="{{$name}}" class="form-control" required><br>
    <label for="vpoints">Очки</label><input type="text" id="vpoints" name="vpoints" value="{{$vpoints}}" class="form-control"><br>
    <label for="retail_price">Розничная цена</label><input type="text" id="retail_price" name="retail_price" value="{{$retail_price}}" class="form-control"><br>
    <label for="sv_price">Супервайзерская цена</label><input type="text" id="sv_price" name="sv_price" value="{{$sv_price}}" class="form-control"><br>


    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
</body>
