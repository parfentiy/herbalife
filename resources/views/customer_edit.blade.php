<head>
    <title>Изменение данных {{$customer['name']}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>
<div class="d-flex flex-row justify-content-around">
    <x-back-to-customers-list/>
    <x-back-to-main/>
</div>
<div class="fs-1 d-flex align-items-center justify-content-center">
    Изменение данных клиента
</div><br>
<form name="customeredit" method="post" enctype="multipart/form-data" action="{{ route ('customer_update') }}">
    @csrf
    <input class="form-control form-control-sm" type="hidden" id="id" name="id" class="form-control" value="{{$customer['id']}}">
    <div class="row">
        <div class="col-sm px-md-5">
            <div class="col">
                <label for="name" class="fw-bold">Ф.И.О. клиента</label>
                <input class="form-control form-control-bg shadow-lg" type="text" id="name" name="name" class="form-control" value="{{$customer['name']}}" required>
            </div><br>
            <div class="col">
                <img src="{{"\CustomersImages" . DIRECTORY_SEPARATOR . $customer['photo']}}" style="max-width: 200px; height: auto;">
                <br><br>
                <div class="btn btn-primary shadow">
                    <label for="photo" class="col-form-label-sm">
                        Сменить фото
                        <input id="photo" type="file" name="photo" hidden>
                    </label>
                </div>
            </div><br>

        </div>
        <div class="col-sm px-md-5">
            <div class="col">
                <label for="discount" class="fw-bold">Скидка</label>
                <select class="form-select form-select-sm shadow-lg py-2" name="discount" id="expType">
                    @foreach($customerDiscounts as $customerDiscount)
                        @if ($customerDiscount['id'] == $customer['discount'])
                            <option value="{{$customerDiscount['id']}}" selected>{{$customerDiscount['name']}}</option>
                        @else
                            <option value="{{$customerDiscount['id']}}">{{$customerDiscount['name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div><br>
            <div class="col">
                <label for="status" class="fw-bold">Статус</label>
                <select class="form-select form-select-sm shadow-lg py-2" name="status" id="expType">
                    @foreach($customerStatuses as $customerStatus)
                        @if ($customerStatus['id'] == $customer['status'])
                            <option value="{{$customerStatus['id']}}" selected>{{$customerStatus['name']}}</option>
                        @else
                            <option value="{{$customerStatus['id']}}">{{$customerStatus['name']}}</option>
                        @endif
                    @endforeach
                </select>
            </div><br>
            <div class="col">
                <label for="type" class="fw-bold">Тип клиента</label>
                <select class="form-select form-select-sm shadow-lg py-2" name="type" id="type">
                    @if ($customer['type'] == 'Домашний')
                        <option value="Домашний" selected>Домашний</option>
                    @else
                        <option value="Домашний">Домашний</option>
                    @endif
                    @if ($customer['type'] == 'Клубный')
                        <option value="Клубный" selected>Клубный</option>
                    @else
                        <option value="Клубный">Клубный</option>
                    @endif
                </select>
            </div><br>
            <div class="col">
                <label for="abonNumber" class="fw-bold">Номер абонемента</label>
                <input class="form-control form-control-sm shadow-lg" type="number" id="abonNumber" name="abonNumber" class="form-control" value="{{$customer['abonNumber']}}">

            </div><br>
        </div>
        <div class="col-sm px-md-5">
            <div class="col">
                <label for="bDay" class="fw-bold">Дата рождения</label>
                <input class="form-control form-control-sm shadow-lg" type="date" id="bDay" name="bDay" class="form-control" value="{{$customer['bDay']}}">
            </div><br>
            <div class="col">
                <label for="city" class="fw-bold">Город</label>
                <input class="form-control form-control-sm shadow-lg" type="text" id="city" name="city" class="form-control" value="{{$customer['city']}}" required>
            </div><br>
            <div class="col">
                <label for="startDate" class="fw-bold">Когда пришел</label>
                <input class="form-control form-control-sm shadow-lg" type="date" id="startDate" name="startDate" class="form-control" value="{{$customer['startDate']}}" required>
            </div><br>
            <div class="col">
                <label for="fromWho" class="fw-bold">От кого пришел</label>
                <input class="form-control form-control-sm shadow-lg" type="text" id="fromWho" name="fromWho" class="form-control" value="{{$customer['fromWho']}}" required>
            </div><br>
            <div class="col">
                <label for="comment" class="fw-bold">Комментарий</label>
                <input class="form-control form-control-sm shadow-lg" type="text" id="comment" name="comment" class="form-control" value="{{$customer['comment']}}">
            </div><br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm d-flex align-items-center justify-content-center">
            <button type="submit" class="btn btn-primary shadow">Сохранить</button>
        </div>
    </div>
</form>

</body>


