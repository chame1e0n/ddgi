@section('_stroitelno_montajnie_content')
    <div class="col-md-4">
        <div class="form-group">
            <label for="stroy_mont_sum" class="col-form-label">Строительно
                монтажные</label>
            <input type="text" id="stroy_mont_sum" name="stroy_mont_sum"
                   value="{{old('stroy_mont_sum')}}"
                   @if($errors->has('stroy_mont_sum'))
                   class="form-control calcElement is-invalid"
                   @else
                   class="form-control calcElement"
                    @endif >
        </div>
    </div>
@endsection