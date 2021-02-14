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
                                        @foreach($policySeries as $value)
                                            @if($requestModel->policy_series_id == $value->id)
                                                <option value="{{ $value->id }}" selected="">{{$value->code}}</option>
                                            @else
                                                <option value="{{ $value->id }}">{{$value->code}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
                                <select name="policy_id" class="form-control select2" id="policy">
                                    <option value="" selected=""></option>
                                </select>
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
                            <button type="submit" class="btn btn-primary float-right">Сохранить</button>
                        </div>

                    </form>
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