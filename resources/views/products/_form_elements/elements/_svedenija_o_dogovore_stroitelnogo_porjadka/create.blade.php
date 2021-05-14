@section('_svedenija_o_dogovore_stroitelnogo_porjadka_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-name" class="col-form-label">Сведения о
                договоре строительного порядка</label>
            <input type="text" id="beneficiary-name"
                   name="object_info_dogov_stoy"
                   value="{{old('object_info_dogov_stoy')}}"
                   @if($errors->has('object_info_dogov_stoy'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif >
        </div>
    </div>
@endsection