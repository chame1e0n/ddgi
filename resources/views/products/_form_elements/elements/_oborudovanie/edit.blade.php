@section('_oborudovanie_content')
    <div class="col-md-4">
        <div class="form-group">
            <label for="obor_sum" class="col-form-label">Оборудование</label>
            <input type="text" id="obor_sum" name="obor_sum"
                   value="{{$product->obor_sum}}"
                   @if($errors->has('obor_sum'))
                   class="form-control calcElement is-invalid"
                   @else
                   class="form-control calcElement"
                    @endif >
        </div>
    </div>
@endsection