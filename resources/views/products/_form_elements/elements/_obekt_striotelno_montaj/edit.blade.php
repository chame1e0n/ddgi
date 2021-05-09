@section('_obekt_striotelno_montaj_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-address" class="col-form-label">Объект
                стриотельно-монтажных работ</label>
            <input type="text" id="beneficiary-address" name="object_stroy_mont"
                   value="{{$product->object_stroy_mont}}"
                   @if($errors->has('object_stroy_mont'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif >
        </div>
    </div>
@endsection