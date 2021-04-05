@extends('layouts.index')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

            </div>
        </div>

        <section class="content">
            <div class="card card-info">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-header">
                    <h3 class="card-title">Запросы</h3>
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

                                <div class="form-group policy-type" style="display:{{
                (!is_null($requestModel->policy_blank) == false) ? 'none' : ''  }} " id="policy-type">
                                    <label for="policy-blank">Серия полиса</label>
                                    <input id="polis_quantity" value="{{$requestModel->policySeries->code}}" disabled
                                           type="text" class="form-control">
                                </div>


                                <div class="form-group" style="display:{{
                (!is_null($requestModel->polis_quantity) == false) ? 'none' : ''  }} " id="policy-amount">
                                    <label for="polis_quantity">Количество полисов</label>
                                    <input id="polis_quantity" value="{{ $requestModel->polis_quantity }}"
                                           name="polis_quantity" type="number" class="form-control" placeholder="100">
                                </div>

                            </div>

                            <div class="form-group policy-type" id="policy-type">
                                <label for="policy-type">Номер полиса</label>
                                <input id="polis_quantity" value="{{$requestModel->policy->number}}" disabled
                                       type="text" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" id="state">
                                    <label for="state">Статус</label>
                                    <select name="state" disabled class="form-control select2" id="state">
                                        <option value="0" selected="selected">В рассмотрении</option>
                                        <option value="1">Отказано</option>
                                        <option value="2">Принят</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group" style="display:{{
                (!is_null($requestModel->act_number) == false) ? 'none' : ''  }} " id="act-number-form">
                            <label for="act-number">Номер акта</label>
                            <input type="text" id="act-number" value=" {{ $requestModel->act_number }} "
                                   name="act_number" class="form-control" placeholder="ADV100023">
                        </div>


                        <div class="form-group" style="display:{{
                (!is_null($requestModel->limit_reason) == false) ? 'none' : ''  }} " id="exceed-limits">
                            <label for="limit-reason">Причина увелечения лимитов</label>
                            <input type="text" value=" {{ $requestModel->limit_reason }} " id="limit-reason"
                                   name="limit_reason" class="form-control" placeholder="">
                        </div>

                        <div class="form-group" id="comments-form">
                            <label for="comments">Комментарий</label><br>
                            <textarea id="comments" name="comments" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{$requestModel->comments}} {{old('comments')}} </textarea>
                        </div>

                        <div class="card-footer">
                            <!-- <button type="save" style="margin-left: 10px" class="btn btn-primary float-right">Распечатать</button> -->
                            <button type="submit" class="btn btn-primary float-right">Изменить</button>
                        </div>

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
                                                   @if($overview->user_id != Auth::id()) disabled @endif
                                                   @if($overview->passed == 1) checked @endif>
                                            <label for="passed{{ $overview->id }}">Принять</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" class="other_insurance-0" name="passed"
                                                   id="not_passed{{ $overview->id }}" value="0"
                                                   @if($overview->user_id != Auth::id()) disabled @endif
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
                                           @if($overview->user_id != Auth::id()) disabled @endif
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

        </section>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        const policyStatus = "policy_transfer";
        const underwrittingStatus = "underwritting";
        let status = $("#status-type");
        let actNumber = $("#act-number-form");
        let exceedLimits = $("#exceed-limits");

        status.click(function () {
            statusShowFields(this.value);
        });

        //Get policy by policy id
        $(document).ready(function () {
            getPolicies({{$requestModel->policy_series_id}});
            statusShowFields(status.val());

            $("#policy_series").change(function () {
                getPolicies($(this).val());
            });
        });

        function statusShowFields(status) {
            if (status === policyStatus) {
                actNumber.css('display', '');
                $("#policy-amount").css('display', '');
                $(".policy-type").css('display', 'none');
            }

            if (status === underwrittingStatus) {
                exceedLimits.css('display', '');
            }

            if (status !== policyStatus) {
                actNumber.css('display', 'none');
                $("#policy-amount").css('display', 'none');
                $(".policy-type").css('display', '');
            }

            if (status !== underwrittingStatus) {
                exceedLimits.css('display', 'none');
            }
        }

        function getPolicies(policySeriesId) {
            $.ajax({
                url: '{{route('getPolicies')}}',
                type: 'get',
                data: {policy_series_id: policySeriesId},
                dataType: 'json',
                success: function (response) {

                    var len = response.length;

                    $("#policy").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['number'];

                        $("#policy").append("<option value='" + id + "'>" + name + "</option>");

                    }
                }
            });
        }
    </script>
@endsection