<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Справочники</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>

<x-back-to-main/>
<div class="container">
    <div class="text-center bd-highlight">
        <h2>Справочники</h2>
    </div>
    <div class="p-2 d-grid">
        <div class="mb-3 d-grid col-3 mx-auto">
            <a href="/libraries/customers" class="btn btn-primary shadow-lg">Клиенты</a>
        </div>
        <div class="mb-3 d-grid col-3 mx-auto">
            <a href="/libraries/customer_statuses" class="btn btn-primary shadow-lg">Статусы клиентов</a>
        </div>
        <div class="mb-3 d-grid col-3 mx-auto">
            <a href="/libraries/customer_discounts" class="btn btn-primary shadow-lg">Размеры скидок</a>
        </div>
        <div class="mb-3 d-grid col-3 mx-auto">
            <a href="/libraries/pricelists" class="btn btn-primary shadow-lg">Прайс-листы</a>
        </div>

    </div>
</div>
</body>
</html>

