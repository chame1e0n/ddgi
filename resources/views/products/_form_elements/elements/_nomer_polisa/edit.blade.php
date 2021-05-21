@section('_nomer_polisa_content')
    <div class="col-md-{{$nomerPolisaColumnSize ?? 6}}">
        <div class="form-group">
            <label for="unique_number" class="col-form-label">Номер полиса</label>
            <input type="text" id="unique_number" readonly
                   value="{{$product->information->policy->polis_unique_number}}"
                   >
        </div>
    </div>
@endsection