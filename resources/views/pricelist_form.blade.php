<head>
    <title>10</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<a name="top"></a>
<x-header/>

<div class="d-flex flex-row justify-content-around">
    <x-back-to-customers-list/>
    <x-back-to-main/>
</div>

<div class="fs-1 d-flex align-items-center justify-content-center">
    Новый клиент
</div><br>

<form name="customeredit" method="post" enctype="multipart/form-data" action="{{ route ('customer_add') }}">
    @csrf
    <div class="row">
        <div class="col-sm px-md-5">
            <div class="col">
                <label for="name" class="fw-bold">Ф.И.О. клиента</label>
                <input class="form-control form-control-bg shadow-lg" type="text" id="name" name="name" class="form-control" required>
            </div><br>
            <div class="col">
                <br><br>
                <div class="btn btn-primary shadow">
                    <label for="photo" class="col-form-label-sm">Добавить фото</label>
                    <input id="photo" type="file" name="photo" required>
                </div>
            </div><br>

        </div>
        <div class="col-sm px-md-5">
            <div class="col">
                <label for="discount" class="fw-bold">Скидка</label>
                <select class="form-select form-select-sm shadow-lg py-2" name="discount" id="expType">
                    @foreach($customerDiscounts as $customerDiscount)
                        <option value="{{$customerDiscount['id']}}">{{$customerDiscount['name']}}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="col">
                <label for="status" class="fw-bold">Статус</label>
                <select class="form-select form-select-sm shadow-lg py-2" name="status" id="expType">
                    @foreach($customerStatuses as $customerStatus)
                        <option value="{{$customerStatus['id']}}">{{$customerStatus['name']}}</option>
                    @endforeach
                </select>
            </div><br>
            <div class="col">
                <label for="type" class="fw-bold">Тип клиента</label>
                <select class="form-select form-select-sm shadow-lg py-2" name="type" id="type">
                    <option value="Домашний">Домашний</option>
                    <option value="Клубный">Клубный</option>
                </select>
            </div><br>
            <div class="col">
                <label for="abonNumber" class="fw-bold">Номер абонемента</label>
                <input class="form-control form-control-sm shadow-lg" type="number" id="abonNumber" name="abonNumber" class="form-control">
            </div><br>
        </div>
        <div class="col-sm px-md-5">
            <div class="col">
                <label for="bDay" class="fw-bold">Дата рождения</label>
                <input class="form-control form-control-sm shadow-lg" type="date" id="bDay" name="bDay" class="form-control">
            </div><br>
            <div class="col">
                <label for="city" class="fw-bold">Город</label>
                <input class="form-control form-control-sm shadow-lg" type="text" id="city" name="city" class="form-control" required>
            </div><br>
            <div class="col">
                <label for="startDate" class="fw-bold">Когда пришел</label>
                <input class="form-control form-control-sm shadow-lg" type="date" id="startDate" name="startDate" class="form-control" required>
            </div><br>
            <div class="col">
                <label for="fromWho" class="fw-bold">От кого пришел</label>
                <input class="form-control form-control-sm shadow-lg" type="text" id="fromWho" name="fromWho" class="form-control" required>
            </div><br>
            <div class="col">
                <label for="comment" class="fw-bold">Комментарий</label>
                <input class="form-control form-control-sm shadow-lg" type="text" id="comment" name="comment" class="form-control">
            </div><br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm d-flex align-items-center justify-content-center">
            <button type="submit" class="btn btn-primary shadow">Создать</button>
        </div>
    </div>
</form>
</body>
