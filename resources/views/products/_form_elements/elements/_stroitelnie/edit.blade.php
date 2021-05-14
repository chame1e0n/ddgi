@section('_stroitelnie_content')
    <div class="col-md-4">
        <div class="form-group">
            <label for="stroy_sum" class="col-form-label">Строительные</label>
            <input type="text" id="stroy_sum" name="stroy_sum"
                   value="{{$product->stroy_sum}}"
                   @if($errors->has('stroy_sum'))
                   class="form-control calcElement is-invalid"
                   @else
                   class="form-control calcElement"
                    @endif >
        </div>
    </div>
@endsection