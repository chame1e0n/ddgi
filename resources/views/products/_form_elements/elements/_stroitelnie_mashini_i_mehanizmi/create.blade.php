@section('_stroitelnie_mashini_i_mehanizmi_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="stroy_mash_sum" class="col-form-label">Строительные машины и
                механизмы</label>
            <input type="text" id="stroy_mash_sum" name="stroy_mash_sum"
                   value="{{old('stroy_mash_sum')}}"
                   @if($errors->has('stroy_mash_sum'))
                   class="form-control calcElement is-invalid"
                   @else
                   class="form-control calcElement"
                    @endif >
        </div>
    </div>
@endsection