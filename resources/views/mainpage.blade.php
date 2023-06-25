
<html>
<head>
    <title>Заказы Гербалайф. Главная страница</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<x-header/>

<div style="display: flex; align-items: center; justify-content: center" class="card-body">
    <h1>ГЛАВНАЯ СТРАНИЦА</h1>
</div>
<div>
    <div style="display: flex; justify-content: center;">
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding: 10;">
            <div>
                <form name="expense" id="expense" method="post" enctype="multipart/form-data" action="{{url('/neworder')}}">
                    @csrf
                    <input id="go" type="submit"
                           style="text-indent:-9999px;line-height:0;border:0;background:url('images/neworder.jpg');height:150px;width:150px;cursor:pointer;float:left;"/>
                </form>
            </div>
            <div style="margin: 0px;">
                <h2>Заказы</h2>
            </div>
        </div>
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding: 10;">
            <div>
                <form name="expense" id="expense" method="post" enctype="multipart/form-data" action="{{url('/libraries')}}">
                    @csrf
                    <input id="go" type="submit"
                           style="text-indent:-9999px;line-height:0;border:0;background:url('images/library2.png');height:150px;width:150px;cursor:pointer;float:left;"/>
                </form>
            </div>
            <div>
                <h2>Справочники</h2>
            </div>
        </div>
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding: 10;">
            <div>
                <form name="expense" id="expense" method="post" enctype="multipart/form-data" action="{{url('/reportslist')}}">
                    @csrf
                    <input id="go" type="submit"
                           style="text-indent:-9999px;line-height:0;border:0;background:url('images/reports.png');height:150px;width:150px;cursor:pointer;float:left;"/>
                </form>
            </div>
            <div>
                <h2>Отчеты</h2>
            </div>
        </div>
        <div style="display: flex; justify-content: center; flex-direction: column; align-items: center; padding: 10;">
            <div>
                <form name="expense" id="expense" method="post" enctype="multipart/form-data" action="{{url('/balance')}}">
                    @csrf
                    <input id="go" type="submit"
                           style="text-indent:-9999px;line-height:0;border:0;background:url('images/club_motions.png');height:150px;width:150px;cursor:pointer;float:left;"/>
                </form>
            </div>
            <div>
                <h2>Списания</h2>
            </div>
        </div>

    </div>

</div>
