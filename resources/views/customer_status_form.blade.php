<head>
    <title>Новый статус</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>

    <form name="customer_status" method="post" action="{{ route ('customer_status_add') }}">
        @csrf
        <label for="name">Название</label><input type="text" id="name" name="name" class="form-control" required><br>
        <label for="comment">Комментарий</label><input type="text" id="comment" name="comment" class="form-control"><br>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</body>
