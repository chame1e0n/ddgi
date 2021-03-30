@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ url()->previous() }}" class="btn btn-info">Назад</a>
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
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="post" id="polis-transfer-form" enctype="multipart/form-data"
                      action="{{ route('policy_retransfer.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Прикрепить полис</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                                data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="retransfer-num-akt">Номер
                                                    акта</label>
                                                <input type="text" value="{{old('act_number')}}" name="act_number"
                                                       class="form-control" id="retransfer-num-akt">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Дата
                                                    акта</label>
                                                <input id="pretensii-final-settlement-date" value="{{old('act_date')}}"
                                                       name="act_date" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Серия
                                                    бланка</label>
                                                <select class="form-control polises" id="polises"
                                                        name="policy_series_id"
                                                        style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    @if(!empty($policySeries))
                                                        @foreach($policySeries as $policySer)
                                                            <option value="{{$policySer->id}}">{{$policySer->code}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">С
                                                    номера бланка</label>
                                                <input type="text" value="{{old('policy_from')}}" name="policy_from"
                                                       class="form-control" id="retransfer-num-akt">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">До
                                                    номера бланка</label>
                                                <input type="text" value="{{old('policy_to')}}" name="policy_to"
                                                       class="form-control" id="retransfer-num-akt">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Кому
                                                    (филиал / офис)</label>
                                                <select class="form-control polises" id="branch" name="branch_id" id="branch"
                                                        style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    @if(!empty($branches))
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Кому
                                                    (агент / менеджер)</label>
                                                <select class="form-control select2" name="user_id" id="employee"
                                                        style="width: 100%;">
                                                    <option selected="selected"></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Дата
                                                    распределения</label>
                                                <input id="pretensii-final-settlement-date"
                                                       value="{{old('retransfer_distribution')}}"
                                                       name="retransfer_distribution" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка
                                                    акта</label>
                                                <input class="form-control" type="file" multiple name="act_file">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="pretensii-final-settlement-date">Кто
                                                    выдал полис</label>
                                                <input type="text" name="transfer_given"
                                                       value="{{old('transfer_given')}}" class="form-control"
                                                       id="retransfer-num-akt">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">Распределить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });

        //Get employee by branch id
        $(document).ready(function () {

            $("#branch").change(function () {
                var id = $(this).val();

                $.ajax({
                    url: '{{route('getEmployees')}}',
                    type: 'get',
                    data: {branch_id: id},
                    dataType: 'json',
                    success: function (response) {

                        var len = response.length;

                        $("#employee").empty();
                        $("#employee").append("<option> </option>");
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['user_id'];
                            var name = response[i]['name'];

                            if (id === 0) {
                                $("#employee").append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                            } else {
                                $("#employee").append("<option value='" + id + "'>"+ response[i]['surname']+ " " + name + " " + response[i]['middle_name']+ "</option>");
                            }
                        }
                    }
                });
            });

        });
    </script>
@endsection