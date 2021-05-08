@section('_period_strahovaniya_content')
    <div class="col-sm-6">
        <div class="form-group">
            <label for="period_insurance_from">Период страхования</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">с</span>
                </div>
                <input id="period_insurance_from" name="period_insurance_from" type="date"
                       value="{{old('period_insurance_from')}}"
                       @if($errors->has('period_insurance_from'))
                       class="form-control is-invalid"
                       @else
                       class="form-control"
                        @endif>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="input-group mb-3" style="margin-top: 33px">
                <div class="input-group-prepend">
                    <span class="input-group-text">до</span>
                </div>
                <input id="period_insurance_to" name="period_insurance_to" type="date"
                       value="{{old('period_insurance_to')}}"
                       @if($errors->has('period_insurance_to'))
                       class="form-control is-invalid"
                       @else
                       class="form-control"
                        @endif>
            </div>
        </div>
    </div>
@endsection
