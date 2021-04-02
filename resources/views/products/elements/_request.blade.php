@section('requestContent')
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="status-type">Статус</label>
                <select name="status" class="form-control select2" id="status-type">
                    @foreach($status as $key => $value)
                        @if(old('status') == $key || $requestModel->status == $key)
                            <option value="{{ $key }}" selected="">{{$value}}</option>
                        @else
                            <option value="{{ $key }}">{{$value}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group" id="file">
                <label for="file">Файл</label>
                <div class="custom-file">
                    <input name="file" type="file" class="custom-file-input" id="file">
                    <label class="custom-file-label" for="file">Выбирите файл</label>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6" id="polis-blank">

            <div class="form-group policy-type" style="display:{{
                (!is_null($requestModel->policy_blank) == false) ? 'none' : ''  }} " id="policy-type">
                <label for="policy-blank">Серия полиса</label>
                <select name="policy_series_id" class="form-control select2" id="policy_series">
                    <option value="0">без серии</option>
                    @if($requestModel->policy_series_id)
                        <option selected>{{$requestModel->policy->code}}</option>
                    @endif
                </select>
            </div>


            <div class="form-group" style="display:{{
                (!is_null($requestModel->polis_quantity) == false) ? 'none' : ''  }} " id="policy-amount">
                <label for="polis_quantity">Количество полисов</label>
                <input id="polis_quantity" value="{{ $requestModel->polis_quantity }}"
                       type="number" class="form-control" placeholder="100">
            </div>

        </div>
        @if($requestModel->act_number)
        <div class="form-group policy-type" id="policy-type">
            <label for="policy-type">Номер полиса</label>
            <select class="form-control select2" id="policy">
                <option value="" selected=""></option>
            </select>
        </div>
        @endif
    </div>

    @if($requestModel->act_number)
    <div class="form-group" style="display:{{
                (!is_null($requestModel->act_number) == false) ? 'none' : ''  }} " id="act-number-form">
        <label for="act-number">Номер акта</label>
        <input type="text" id="act-number" value=" {{ $requestModel->act_number }} "
               class="form-control" placeholder="ADV100023">
    </div>
    @endif

    @if($requestModel->limit_reason)
    <div class="form-group" style="display:{{
                (!is_null($requestModel->limit_reason) == false) ? 'none' : ''  }} " id="exceed-limits">
        <label for="limit-reason">Причина увелечения лимитов</label>
        <input type="text" value=" {{ $requestModel->limit_reason }} " id="limit-reason"
               class="form-control" placeholder="">
    </div>
    @endif

    @if($requestModel->comments)
    <div class="form-group" id="comments-form">
        <label for="comments">Комментарий</label><br>
        <textarea id="comments" class="textarea" placeholder="Place some text here"
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{$requestModel->comments}}</textarea>
    </div>
    @endif
@endsection