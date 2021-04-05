<div class="card" id="requests">
    <div class="card-header">
        <h3 class="card-title">Запрос на {{App\Models\Spravochniki\RequestModel::STATUS[$requestModel->status]}} <a href="{{route('request.edit', $requestModel->id)}}">ссылка</a></h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form role="form" action="{{ route('request.update', $requestModel->id) }}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="status-type">Вид</label>
                    <select readonly name="status" class="form-control select2" id="status-type">
                        @foreach(App\Models\Spravochniki\RequestModel::STATUS as $key => $value)
                            @if($requestModel->status == $key)
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
                    <a
                            href="{{url('/storage/'.$requestModel->file)}}">
                        <img
                                src="{{asset('temp/img/docx.png')}}" width="50" height="50">
                    </a>
                    <input id="file" name="file" value="{{old('file')}}"
                           type="file" @if($errors->has('file'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                            @endif>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-sm-6" id="polis-blank">

                @if($requestModel->policy_id)
                <div class="form-group policy-type" id="policy-type">
                    <label for="policy-blank">Серия полиса</label>
                        <input id="polis_quantity" value="{{$requestModel->policySeries->code}}" readonly
                               type="text" class="form-control">
                </div>
                @endif

                <div class="form-group" style="display:{{
                    (!is_null($requestModel->polis_quantity) == false) ? 'none' : ''  }} " id="policy-amount">
                    <label for="polis_quantity">Количество полисов</label>
                    <input id="polis_quantity" value="{{ $requestModel->polis_quantity }}"
                           type="number" class="form-control" placeholder="100">
                </div>

            </div>
            @if($requestModel->policy_id)
                <div class="form-group policy-type" id="policy-type">
                    <label for="policy-type">Номер полиса</label>
                    <input id="polis_quantity" value="{{$requestModel->policy->number}}" readonly
                           type="text" class="form-control">
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
            <input type="text" value=" {{ $requestModel->limit_reason }} " readonly id="limit-reason"
                   class="form-control" placeholder="">
        </div>
        @endif

        @if($requestModel->comments)
        <div class="form-group" id="comments-form">
            <label for="comments">Комментарий</label><br>
            <textarea id="comments" class="textarea" readonly placeholder="Place some text here"
                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{$requestModel->comments}}</textarea>
        </div>
        @endif
        </form>
        @php
            $noUser = true;
        @endphp
    @foreach($requestModel->requestOverview as $overview)
        <form method="post" action="{{ route('request_overview.update', $overview->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Статус претензии</label>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="icheck-success">
                            <input name="passed" type="radio" id="passed{{ $overview->id }}"
                                   class="other_insurance-0" value="1"
                                   @if($overview->user_id != Auth::id()) readonly @endif
                                   @if($overview->passed == 1) checked @endif>
                            <label for="passed{{ $overview->id }}">Принять</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="icheck-success">
                            <input type="radio" class="other_insurance-0" name="passed"
                                   id="not_passed{{ $overview->id }}" value="0"
                                   @if($overview->user_id != Auth::id()) readonly @endif
                                   @if($overview->passed == 0) checked @endif>
                            <label for="not_passed{{ $overview->id }}">Отказать</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="pretensii-final-settlement-date">Комментарий</label>
                <div class="input-group mb-3">
                    <input id="pretensii-final-settlement-date"
                           @if(!empty($overview->comment)) value="{{ $overview->comment }}" @endif
                           @if($overview->user_id != Auth::id()) readonly @endif
                           type="text" class="form-control" name="comment">
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="pretensii-final-settlement-date">Пользователь</label>
                <div class="input-group mb-3">
                    <input id="pretensii-final-settlement-date" name="user_name"
                           @if(!empty($overview->user->name)) value="{{ $overview->user->name }}" @endif
                           readonly type="text" class="form-control">
                </div>
            </div>
            @if($overview->user_id == Auth::id())
                @php
                    $noUser = false;
                @endphp
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Изменить</button>
                </div>
            @endif
        </form>
    @endforeach

        @if($noUser)
            <form method="post" action="{{ route('request_overview.store') }}">
                @csrf
                <input type="hidden" value="{{ $requestModel->id }}" name="request_id">
                <div class="form-group">
                    <label>Статус претензии</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icheck-success">
                                <input name="passed" type="radio" id="passed" class="other_insurance-0"
                                       value="1">
                                <label for="passed">Принять</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="icheck-success">
                                <input type="radio" class="other_insurance-0" name="passed"
                                       id="not_passed" value="0">
                                <label for="not_passed">Отказать</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="pretensii-final-settlement-date">Комментарий</label>
                    <div class="input-group mb-3">
                        <input id="pretensii-final-settlement-date"
                               type="text" class="form-control" name="comment">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label" for="pretensii-final-settlement-date">Пользователь</label>
                    <div class="input-group mb-3">
                        <input id="pretensii-final-settlement-date" name="user_name"
                               value="{{ Auth::user()->name }}"
                               readonly type="text" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Сохранить</button>
                </div>
            </form>
        @endif


    </div>
</div>