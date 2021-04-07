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
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->act_number}}"
                                                   disabled
                                                   name="act_number" type="text"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">Дата
                                                акта</label>
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->act_date}}"
                                                   disabled
                                                   name="act_date" type="date"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">Серия
                                                бланка</label>
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->policySeries->code}}"
                                                   disabled
                                                   name="policy_series_id" type="text"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">С
                                                номера бланка</label>
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->policy_from}}"
                                                   disabled
                                                   name="policy_from" type="number"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">До
                                                номера бланка</label>
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->policy_to}}"
                                                   disabled
                                                   name="policy_to" type="number"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">Кому
                                                (филиал / офис)</label>
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->branch->name}}"
                                                   disabled
                                                   name="branch_id" type="text"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">Кому
                                                (агент / менеджер)</label>
                                            <input id="employee-tr"
                                                   value="@if(isset($policyTransfer->user->agent->name)){{$policyTransfer->user->agent->surname .' '. $policyTransfer->user->agent->name .' '. $policyTransfer->user->agent->middle_name .' - агент'}}@endif
                                                   @if(isset($policyTransfer->user->manager->name)){{$policyTransfer->user->manager->surname .' '. $policyTransfer->user->manager->name .' '. $policyTransfer->user->manager->middle_name .' - менеджер'}}@endif"
                                                   disabled
                                                   name="user_id" type="text"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">Дата
                                                распределения</label>
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->retransfer_distribution}}"
                                                   disabled
                                                   name="retransfer_distribution" type="date"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    {{--<div class="col-lg-4">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<label class="col-form-label" for="pretensii-final-settlement-date">Загрузка--}}
                                                {{--акта</label>--}}
                                            {{--<input class="form-control" type="file" multiple name="act_file">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="pretensii-final-settlement-date">Кто
                                                выдал полис</label>
                                            <input id="pretensii-final-settlement-date"
                                                   value="{{$policyTransfer->transfer_given}}"
                                                   disabled
                                                   name="transfer_given" type="text"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
