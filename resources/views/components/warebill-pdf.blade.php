<div class="d-flex justify-content-center text-center bd-highlight">
    <form name="budget" id="budget" method="post" enctype="multipart/form-data" action="{{url('reports/warebill_pdf')}}">
        @csrf
        <input type="hidden" name="period" value="{{$period}}">
        <input type="hidden" name="order" value="{{$order}}">
        <input type="hidden" name="who" value="{{$who}}">


        <button type="submit" class="btn btn-danger justify-content-center text-center shadow-lg mt-2" name="action" value="{{$who}}">Скачать PDF</button>
    </form>
</div>
