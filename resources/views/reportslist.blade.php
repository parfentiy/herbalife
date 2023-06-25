<head>
    <title>Список отчетов</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/><x-back-to-main/>
<div class="container">
    <div class="text-center bd-highlight">
        <h2>Отчеты</h2>
    </div>
    <div class="p-2 d-grid">
        <div class="mb-3 d-grid col-3 mx-auto">
            <a href="/reports/warebill" class="btn btn-primary shadow-lg">Товарная накладная (Гене)</a>
        </div>
        <div class="mb-3 d-grid col-3 mx-auto">
            <a href="/reports/warebill_customer" class="btn btn-primary shadow-lg">Товарная накладная (клиенту)</a>
        </div>
        <div class="mb-3 d-grid col-3 mx-auto">
            <a href="/libraries/customer_statuses" class="btn btn-primary shadow-lg">Анализ продаж</a>
        </div>
    </div>
</div>
</body>


