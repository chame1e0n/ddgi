@section('_ispolzovaniye_ts_na_osnovanii_content')
    <div class="col-sm-6">
        <div class="form-group ">
            <label>Использования ТС на основании</label>
            <select @if($errors->has('ts_osnovanii'))
                    class="form-control is-invalid"
                    @else
                    class="form-control"
                    @endif name="ts_osnovanii"
                    style="width: 100%; text-align: center">
                <option value="selected"></option>

                @foreach(\App\AllProduct::TS_OSNOVANII as $key => $value)
                    <option value="{{$key}}" @if($product->ts_osnovanii == $key) selected @endif >{{$value}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endsection
