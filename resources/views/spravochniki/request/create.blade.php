@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

            </div>
        </div>

        <section class="content">
            <div class="card card-info">
                @include('layouts._success_or_error')

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
                    <form action="{{ route('request.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="status-type">Статус</label>
                                    <select name="status" class="form-control select2"
                                            @if(app('request')->input('status')) readonly @endif id="status-type">
                                        @foreach($status as $key => $value)
                                            @if(old('status') == $key or app('request')->input('status') == $key)
                                                <option value="{{ $key }}" selected="">{{$value}}</option>
                                            @else
                                                <option value="{{ $key }}">{{$value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4" id="#series">
                                <div class="form-group">
                                    <label for="series">Наименование</label>
                                    <select name="policy_name" @if(app('request')->input('status')) readonly
                                            @endif  class="form-control select2" id="policy_name">
                                        <option value="" selected=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4" id="policy-number">
                                <div class="form-group">
                                    <label for="policy">Серия полиса</label>
                                    <select id="policy" @if(app('request')->input('status')) readonly
                                           @endif name="policy_id" class="form-control"
                                    >
                                        <option value="" selected=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="policy-amount">
                                    <label for="polis_quantity">Количество полисов</label>
                                    <input id="polis_quantity" name="polis_quantity" value="{{ old('polis_quantity') }}"
                                           type="number"
                                           @if($errors->has('polis_quantity'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif placeholder="100">
                                </div>
                                <div class="form-group" id="exceed-limits">
                                    <label for="limit-reason">Причина увелечения лимитов</label>
                                    <input type="text" id="limit-reason" name="limit_reason"
                                           value="{{ old('limit_reason') }}"
                                           @if($errors->has('limit_reason'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="act-number-form">
                                    <label for="act-number">Номер акта</label>
                                    <input type="text" id="act-number" name="act_number" value="{{ old('act_number') }}"
                                           @if($errors->has('act_number'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif placeholder="ADV100023">
                                </div>
                                <div class="form-group" id="file">
                                    <label for="file">Файл</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="file" type="file" value="{{old('file')}}"
                                                   @if($errors->has('file'))
                                                   class="custom-file-input is-invalid"
                                                   @else
                                                   class="custom-file-input"
                                                   @endif
                                                   id="file">
                                            <label class="custom-file-label" for="file">Выбирите файл</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="comments-form">
                            <label for="comments">Комментарий</label>
                            <textarea id="comments" name="comments" class="textarea" placeholder="Place some text here"
                                      style="width: 80%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('comments')}}</textarea>
                        </div>
                        <div class="card-footer">
                            <button style="margin-left: 10px" class="btn btn-primary float-right">
                                Распечатать
                            </button>
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
        //Get policy by policy id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getPolisNames')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;
                    var polisName = {{ old('polis_name') ?? 0}};
                    polisName = {{ app('request')->input('policyId') ?? 0}} ? {{ app('request')->input('policyId') ?? 0}} : polisName;
                    var polisNameField = $("#policy_name");

                    polisNameField.empty();

                    for (var i = 0; i < len; i++) {
                        var name = response[i]['polis_name'];

                        if (polisName && polisName == name) {
                            polisNameField.append("<option value='" + name + "' selected>" + name + "</option>");
                        } else {
                            polisNameField.append("<option value='" + name + "'>" + name + "</option>");
                        }
                    }

                    getPolicySeries(polisName);
                }
            });

            $("#policy_name").change(function () {
                var name = $(this).val();

                getPolicySeries(name);
            });

            function getPolicySeries(name) {
                if(name) {
                    $.ajax({
                        url: '{{route('getPolicySeries')}}',
                        type: 'get',
                        data: {polis_name: name},
                        dataType: 'json',
                        success: function (response) {

                            var len = response.length;
                            var polisSeries = {{ old('policy_id') ?? 0}};
                            polisSeries = {{ app('request')->input('policyId') ?? 0}} ? {{ app('request')->input('policyId') ?? 0}} : polisSeries;
                            var polisSeriesField = $("#policy")

                            polisSeriesField.empty();
                            for (var i = 0; i < len; i++) {
                                var id = response[i]['id'];
                                var name = response[i]['number'];

                                if (polisSeries == id) {
                                    polisSeriesField.append("<option value='" + id + "' selected>" + name + "</option>");
                                } else {
                                    polisSeriesField.append("<option value='" + id + "'>" + name + "</option>");
                                }

                            }
                        }
                    });
                }
            }
        });

    </script>
    <script>
        $(function () {
            $('.textarea').summernote();
        });

        $(document).ready(function () {
            $('#status-type').on('change', function () {
                if (this.value === 'policy_transfer') {
                    $("#policy-number").hide();
                    $("#exeed-limits").hide();
                    $("#policy-amount").show();
                    $("#act-number-form").show();
                } else if (this.value === 'underwritting') {
                    $("#exeed-limits").show();
                    $("#policy-number").show();
                    $("#policy-amount").hide();
                    $("#act-number-form").hide();
                } else {
                    $("#policy-number").show();
                    $("#exeed-limits").hide();
                    $("#policy-amount").hide();
                    $("#act-number-form").hide();
                }
            });

            $('#status-type').trigger('change');
        });
    </script>
@endsection
