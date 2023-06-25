<head>
    <title>Новая скидка</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>

    <form name="customer_discount" method="post" action="{{ route ('customer_discount_add') }}">
        @csrf
        <label for="name">Название</label><input type="text" id="name" name="name" class="form-control" required><br>
        <label for="value">Размер скидки</label><input type="text" id="value" name="value" class="form-control" required><br>
        <label for="comment">Комментарий</label><input type="text" id="comment" name="comment" class="form-control"><br>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</body>
