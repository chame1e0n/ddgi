@section('_nomer_dogovora_content')
    <div class="col-md-{{$nomerDogovoraColumnSize ?? 6}}">
        <div class="form-group">
            <label for="unique_number" class="col-form-label">Номер договора</label>
            <input type="text" id="unique_number" readonly
                   value="{{$product->unique_number}}"
                   >
        </div>
    </div>
@endsection