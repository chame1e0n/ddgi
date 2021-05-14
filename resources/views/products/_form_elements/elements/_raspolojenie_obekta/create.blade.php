@section('_raspolojenie_obekta_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-tel" class="col-form-label">Расположение
                объекта</label>
            <input type="text" id="beneficiary-tel" name="object_location"
                   value="{{old('object_location')}}"
                   @if($errors->has('object_location'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif >
        </div>
    </div>
@endsection