@section('_srok_deystviya_dogovora_content')
    <div class="col-sm-6">
        <label class="col-form-label">Срок действия договора страхования</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">с</span>
            </div>
            <input id="strah_dogovor_ot" name="strah_dogovor_ot" type="date"
                   value="{{old('strah_dogovor_ot')}}"
                   @if($errors->has('strah_dogovor_ot'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                @endif>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="input-group" style="margin-top: 33px">
                <div class="input-group-prepend">
                    <span class="input-group-text">до</span>
                </div>
                <input id="strah_dogovor_do" name="strah_dogovor_do" type="date"
                       value="{{old('strah_dogovor_do')}}"
                       @if($errors->has('strah_dogovor_do'))
                       class="form-control is-invalid"
                       @else
                       class="form-control"
                    @endif>
            </div>
        </div>
    </div>
@endsection
