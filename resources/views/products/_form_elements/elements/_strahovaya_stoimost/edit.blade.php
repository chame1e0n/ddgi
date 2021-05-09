@section('_strahovaya_stoimost_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-schet" class="col-form-label">Страховая
                стоимость</label>
            <input type="text" id="beneficiary-schet"
                   name="object_insurance_sum"
                   value="{{$product->object_insurance_sum}}"
                   @if($errors->has('object_insurance_sum'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif >
        </div>
    </div>
@endsection