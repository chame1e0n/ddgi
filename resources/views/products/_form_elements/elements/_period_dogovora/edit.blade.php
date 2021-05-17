@section('_period_dogovora_content')
    <div class="col-sm-4">
        <label class="col-form-label">Период договора</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">с</span>
            </div>
            <input id="dogovor_period_from" name="dogovor_period_from" type="date"
                   value="{{$product->dogovor_period_from}}"
                   @if($errors->has('dogovor_period_from'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                @endif>
        </div>
    </div>
    <div class="col-sm-4">
        <label class="col-form-label">Период договора</label>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">до</span>
                </div>
                <input id="dogovor_period_to" name="dogovor_period_to" type="date"
                       value="{{$product->dogovor_period_to}}"
                       @if($errors->has('dogovor_period_to'))
                       class="form-control is-invalid"
                       @else
                       class="form-control"
                    @endif>
            </div>
        </div>
    </div>
@endsection
