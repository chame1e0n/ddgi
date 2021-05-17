@section('_period_ojidaniya_content')

    <div class="col-sm-6">
        <div class="form-group">
            <label for="period_expect_from">Период ожидания</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">с</span>
                </div>
                <input id="period_expect_from" name="period_expect_from" type="date"
                       value="{{$product->period_expect_from}}"
                       @if($errors->has('period_expect_from'))
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
                <input id="period_expect_to" name="period_expect_to" type="date"
                       value="{{$product->period_expect_to}}"
                       @if($errors->has('period_expect_to'))
                       class="form-control is-invalid"
                       @else
                       class="form-control"
                        @endif>
            </div>
        </div>
    </div>
@endsection
