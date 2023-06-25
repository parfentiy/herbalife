<div class="d-flex flex-row justify-content-around">
    <div>
        <b>Продажи и клиенты Гербалайф. Автор Парфентий Петр</b>
    </div>
    <div>
        <b>Сегодня:
            @php
                $tz = 'Europe/Moscow';
                $timestamp = time();
                $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
                $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
                echo $dt->format('d.m.Y, H:i:s');
            @endphp
        </b>
    </div>
    <div>
        <b>Версия 1.0.1</b>
    </div>
</div>
<hr>
