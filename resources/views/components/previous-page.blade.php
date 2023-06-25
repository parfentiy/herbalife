<form name="delete" id="expense" method="get" enctype="multipart/form-data" action="{{url()->previous()}}">
    @csrf
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary shadow-lg" name="expense" value="expense">Назад</button>
    </div>
</form>
