<div class="d-flex justify-content-center text-center bd-highlight">
    <form name="budget" id="budget" method="get" enctype="multipart/form-data" action="{{url('/reportslist')}}">
        @csrf
        <input type="hidden" name="period" value="{{$period}}">

        <button type="submit" class="btn btn-primary justify-content-center text-center shadow-lg mt-2" name="action" value="changed">Назад</button>
    </form>
</div>
