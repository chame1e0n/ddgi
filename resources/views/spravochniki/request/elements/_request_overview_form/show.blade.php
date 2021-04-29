@section('_request_overview_form_content')
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
                                   @if($overview->user_id != auth()->user()->id) disabled @endif
                                   @if($overview->passed == 1) checked @endif>
                            <label for="passed{{ $overview->id }}">Принять</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="icheck-success">
                            <input type="radio" class="other_insurance-0" name="passed"
                                   id="not_passed{{ $overview->id }}" value="0"
                                   @if($overview->user_id != auth()->user()->id) disabled @endif
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
                           @if($overview->user_id != auth()->user()->id) disabled @endif
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
            @if($overview->user_id == auth()->user()->id)
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
                           value="{{ auth()->user()->name }}"
                           readonly type="text" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Сохранить</button>
            </div>
        </form>
    @endif
@endsection
