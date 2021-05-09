@section('_materialnij_usherb_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-bank" class="col-form-label">Материальный
                ущерб</label>
            <input type="text" id="beneficiary-bank" name="object_material"
                   value="{{$product->object_material}}"
                   @if($errors->has('object_material'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif >
        </div>
    </div>
@endsection