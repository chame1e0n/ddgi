@extends('layouts.index')


@php $currentFileName = 'Перераспределение полисов' @endphp

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @include('includes.messages')
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <form method="post" id="polis-registration-form" action="{{ route('policy_retransfer.update', $policy->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{$currentFileName ?? ''}}</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="act_number" class="col-form-label">Номер акта</label>
                                                <input id="act_number"
                                                       @if($errors->has('act_number'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       name="act_number" value="{{ $policy->act_number }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="act_date" class="col-form-label">Дата акта</label>
                                                <div class="input-group">
                                                    <input id="act_date" type="date"
                                                           @if($errors->has('act_date'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif
                                                           placeholder="yyyy-mm-dd" name="act_date" value="{{ $policy->act_date }}"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="icheck-success ">
                                                <input name="a_reg"
                                                       class="form-check-input client-type-radio"
                                                       checked type="radio" id="a4" value="a4">
                                                <label class="form-check-label" for="a4">A4</label>
                                            </div>
                                            <div class="icheck-success ">
                                                <input class="form-check-input client-type-radio" @if($policy->a_reg == 'a5') checked
                                                       @endif value="a5" type="radio" name="a_reg" id="a5">
                                                <label class="form-check-label" for="a5">A5</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="polis_series_from" class="col-form-label">Серия полиса с:</label>
                                                        <input id="polis_series_from" type="number"
                                                               oninput="countBlanks(true, this.value)"
                                                               @if($errors->has('polis_series_from'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                               @endif
                                                               name="policy_from" value="{{$policy->policy_from}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="polis_series_to" class="col-form-label">Серия полиса до:</label>
                                                        <input id="polis_series_to" type="number"
                                                               oninput="countBlanks(false, this.value)"
                                                               @if($errors->has('polis_series_to'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                               @endif
                                                               name="policy_to" value="{{$policy->policy_to}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" id="countBlanks">
                                                    <label for="polis_kolvo" class="col-form-label">Количество полисов</label>
                                                    <input type="text"
                                                           value="{{$amount = $policy->policy_to - $policy->policy_from + 1}}" disabled
                                                           id="countBlanksInput" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="polis_name" class="col-form-label">Наименование</label>
                                                    <input type="text" id="polis_name" value="{{$policy->polis_name}}" name="polis_name"
                                                           class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="polis_series" class="col-form-label">Стоимость одного бланка </label>
                                                <input type="text" class="form-control" value="{{$policy->price_per_policy}}"
                                                       name="price_per_policy">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="polis_series" class="col-form-label">Всего стоимость</label>
                                                <input type="text" disabled value="{{$amount * $policy->price_per_policy}}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="akt_filial">Филиал</label>
                                                <select required class="form-control polises" id="branch" name="branch_id" style="width: 100%;">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="akt_kto_vidal">Кому</label>
                                                <select class="form-control polises" id="employee" name="to_user_id" style="width: 100%;">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="akt_ot_kogo">От кого</label>
                                                <select class="form-control polises" id="akt_ot_kogo" name="from_user_id" style="width: 100%;">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="act_date_raspredel" class="col-form-label">Дата распределения</label>
                                                <div class="input-group">
                                                    <input id="act_date_raspredel" type="date" class="form-control"
                                                           placeholder="yyyy-mm-dd" readonly value="{{date('Y-m-d', strtotime($policy->created_at))}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="filter_number_do" class="col-form-label">Загрузка документов</label>
                                            <div class="input-group">
                                                <input type="file" multiple id="filter_number_do" name="files" class="form-control">
                                                <div class="input-group-append">
                                                    <a class="btn btn-info" href="#"><i class="fas fa-download"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        let fromNumber = 0;
        let toNumber = 0;

        function countBlanks(type, value) {
            if (type) {
                fromNumber = value;
            } else {
                toNumber = value;
            }

            if(fromNumber > 0 && toNumber > 0) {
                let blanksInput = document.getElementById('countBlanksInput');
                blanksInput.value = (toNumber - fromNumber) + 1;
            }
        }
    </script>
    <script>
        //Get employee by branch id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('branches')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    response = response.data;
                    var len = response.length;

                    let branch = $("#branch");
                    branch.empty();
                    branch.append("<option> </option>");
                    var selected = {{old('branch_id') ?? 0}};
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        branch.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + name + "</option>");
                    }
                }
            });

            $("#branch").change(function () {
                var id = $(this).val();

                $.ajax({
                    url: '{{route('getBranchEmployees')}}',
                    type: 'get',
                    data: {branch_id: id},
                    dataType: 'json',
                    success: function (response) {

                        var len = response.length;
                        let employee = $("#employee");

                       employee.empty();
                        employee.append("<option> </option>");
                        var selected = {{old('to_user_id') ?? 0}};
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['user_id'];
                            var name = response[i]['name'];

                            if (id === 0) {
                                employee.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                            } else {
                                employee.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + response[i]['surname'] + " " + name + " " + response[i]['middle_name'] + "</option>");
                            }
                        }
                    }
                });
            });

        });
    </script>
    <script>
        //Get employee by branch id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getEmployees')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;

                    let employees = $("#akt_ot_kogo");
                    employees.empty();
                    employees.append("<option> </option>");
                    var selected = {{old('from_user_id') ?? 0}};
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['user_id'];
                        var name = response[i]['name'];
                        var surname = 'surname' in response[i] ? response[i]['surname'] : '';
                        var middle_name = 'middle_name' in response[i] ? response[i]['middle_name'] : '';

                        if (id === 0) {
                            employees.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                        } else {
                            employees.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + surname + " " + name + " " + middle_name + "</option>");
                        }
                    }
                }
            });
        });
    </script>
    <!-- /.content -->
@endsection
