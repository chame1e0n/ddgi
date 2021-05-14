@section('_rasxodi_po_raschistke_territorii_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="rasx_sum" class="col-form-label">Расходы по расчистке
                территории</label>
            <input type="text" id="rasx_sum" name="rasx_sum"
                   value="{{old('rasx_sum')}}"
                   @if($errors->has('rasx_sum'))
                   class="form-control calcElement is-invalid"
                   @else
                   class="form-control calcElement"
                    @endif >
        </div>
    </div>
@endsection