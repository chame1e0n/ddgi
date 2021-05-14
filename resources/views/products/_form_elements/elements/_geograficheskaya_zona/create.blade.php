@section('_geograficheskaya_zona_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="geographic-zone" class="col-form-label">Географическая
                зона</label>
            <input type="text" id="geographic-zone"
                   name="geo_zone"
                   value="{{old('geo_zone')}}"
                   @if($errors->has('geo_zone'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
@endsection
