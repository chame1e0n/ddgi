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
                    <form role="form" action="{{ route('perestrahovaniya.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
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
                                <div class="form-group" id="policy-type">
                                    <label for="policy-type">Серия полиса</label>
                                    <select name="policy_series_id" class="form-control select2" id="policy_series">
                                        <option value="" selected=""></option>
                                        <option value="0">без серии</option>
                                        @foreach($policySeries as $value)
                                            @if(old('polis_blank') == $value->id)
                                                <option value="{{ $value->id }}" selected="">{{$value->code}}</option>
                                            @else
                                                <option value="{{ $value->id }}">{{$value->code}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id="policy-type">
                                <label for="policy-type">Номер полиса</label>
                                <select name="policy_id" class="form-control select2" id="policy">
                                    <option value="" selected=""></option>
                                </select>
                            </div>
                            <div class="ml-5 col-md-3">
                                <div class="form-group mr-3" id="state">
                                    <label for="state">State</label>
                                    <select name="state" disabled class="form-control select2" id="state">
                                        <option value="1" selected="selected">В рассмотрении</option>
                                        <option value="2">Отказано</option>
                                        <option value="3">Принят</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="comments-form">
                            <label for="comments">Комментарий</label><br>
                            <textarea id="comments" name="comments" class="textarea" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{old('comments')}} </textarea>
                        </div>

                        <div class="card-footer">
                            <!-- <button type="save" style="margin-left: 10px" class="btn btn-primary float-right">Распечатать</button> -->
                            <button type="submit" class="btn btn-primary float-right">Добавить</button>
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
            if (this.value === policyStatus) {
                actNumber.css('display', '');
                $("#policy-amount").css('display', '');
                $("#policy-type").css('display', 'none');
            }

            if (this.value === underwrittingStatus) {
                exceedLimits.css('display', '');
            }

            if (this.value !== policyStatus) {
                actNumber.css('display', 'none');
                $("#policy-amount").css('display', 'none');
                $("#policy-type").css('display', '');
            }

            if (this.value !== underwrittingStatus) {
                exceedLimits.css('display', 'none');
            }
        });

        //Get policy by policy id
        $(document).ready(function () {

            $("#policy_series").change(function () {
                var id = $(this).val();

                $.ajax({
                    url: '{{route('getPolicies')}}',
                    type: 'get',
                    data: {policy_series_id: id},
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
            });

        });
    </script>
@endsection