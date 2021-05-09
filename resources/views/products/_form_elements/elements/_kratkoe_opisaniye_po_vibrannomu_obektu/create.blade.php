@section('_kratkoe_opisaniye_po_vibrannomu_obektu_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="briefDescriptionObj" class="col-form-label">Краткое
                описание по выбранному объекту</label>
            <textarea @if($errors->has('brief_description_of_object'))
                      class="form-control is-invalid"
                      @else
                      class="form-control"
                      @endif id="briefDescriptionObj" name="brief_description_of_object">{{old('brief_description_of_object')}}</textarea>
        </div>
    </div>
@endsection