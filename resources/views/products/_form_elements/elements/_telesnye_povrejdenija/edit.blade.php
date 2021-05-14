@section('_telesnye_povrejdenija_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-mfo" class="col-form-label">Телесные
                повреждения</label>
            <input type="text" id="beneficiary-mfo" name="object_tel_povr"
                   value="{{$product->object_tel_povr}}"
                   @if($errors->has('object_tel_povr'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif >
        </div>
    </div>
@endsection