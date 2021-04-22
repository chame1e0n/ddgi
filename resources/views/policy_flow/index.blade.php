@extends('layouts.index')
@include('policy_flow._form_elements._from_whom.create')
@php
    $statusRoute = [
    'registered' => 'policy_registration',
    'transferred' => 'policy_transfer',
    'retransferred' => 'policy_retransfer'
    ];
@endphp
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Полисы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Полисы</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a class="btn btn-success" href="{{ route('policy_registration.create') }}">Зарегистроровать</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-success" href="{{ route('policy_transfer.create') }}">Распределить</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-success" href="{{ route('policy_retransfer.create') }}">Перераспределить</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="#">Обновить</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="#">Export</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="#">Import</a>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <div class="card card-success product-type">
                <div class="card-header">
                    <h3 class="card-title">Фильтры</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_stat" class="col-form-label">Статус</label>
                                        <select id="filter_stat" class="form-control select2" name="status">
                                            <option></option>
                                            @foreach(\App\Models\PolicyFlow::STATUS_NAME as $key=>$status)
                                                <option value="{{$key}}" @if(request('status') && request('status') == $key) selected @endif>{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_data_akt" class="col-form-label">Дата акта</label>
                                        <input type="date" id="filter_data_akt" value="{{request('act_date')}}"  name="act_date"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_akt" class="col-form-label">Номер акта</label>
                                        <input type="text" id="filter_akt" name="act_number" value="{{request('act_number')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter_number_ot" class="col-form-label">С серии полиса</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="policy_from_sign"
                                                    style="width: 100%;">
                                                @if(request('policy_from_sign'))
                                                    <option>{{request('policy_from_sign')}}</option>
                                                @endif
                                                <option>=</option>
                                                <option><</option>
                                                <option><=</option>
                                                <option>></option>
                                                <option>>=</option>
                                            </select>
                                        </div>
                                        <input type="text" id="filter_number_ot" class="form-control"
                                               name="policy_from" value="{{request('policy_from')}}">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter_number_do" class="col-form-label">До серии полиса</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="policy_to_sign"
                                                    style="width: 100%;">
                                                @if(request('policy_to_sign'))
                                                    <option>{{request('policy_to_sign')}}</option>
                                                @endif
                                                <option>=</option>
                                                <option><</option>
                                                <option><=</option>
                                                <option>></option>
                                                <option>>=</option>
                                            </select>
                                        </div>
                                        <input type="text" id="filter_number_do" name="policy_to"
                                               class="form-control" value="{{request('policy_to')}}">
                                    </div>
                                </div>
                                @php
                                    $employees = new App\Http\Controllers\EmployeeController();
                                @endphp
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_name_send" class="col-form-label">От кого</label>
                                        <select id="from_user" class="form-control select2"
                                                name="from_user_id">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter_komu" class="col-form-label">Кому</label>
                                        <select id="to_user" class="form-control select2" name="to_user_id">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button style="margin: 38px 0 0 auto; display: block;" class="btn btn-success"
                                            type="submit">Найти
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                @include('layouts._success_or_error')
                                <table id="example1" class="table table-bordered table-striped text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Серия от</th>
                                        <th>Серия до</th>
                                        <th>Статус</th>
                                        <th>От</th>
                                        <th>Филиал</th>
                                        <th>Кому</th>
                                        <th>Дата распределения</th>
                                        <th>Номер акта</th>
                                        <th>Дата акта</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($policyFlow as $policy)
                                        <tr>
                                            <td>{{ $policy->policy_from }}</td>
                                            <td>{{ $policy->policy_to }}</td>
                                            <td>{{ \App\Models\PolicyFlow::STATUS_NAME[$policy->status] }}</td>
                                            <td>{{ !is_null($policy->fromUser) ? $policy->fromUser->getFullNameAndPosition() : '' }}</td>
                                            <td>{{ !is_null($policy->branch) ? $policy->branch->name : '' }}</td>
                                            <td>{{ !is_null($policy->toUser) ? $policy->toUser->getFullNameAndPosition() : '' }}</td>
                                            <td>{{ date('d.m.Y', strtotime($policy->created_at)) }}</td>
                                            <td>{{ $policy->act_number }}</td>
                                            <td>{{ date('d.m.Y', strtotime($policy->act_date)) }}</td>
                                            <td>
                                                <form action="{{ route($statusRoute[$policy->status].'.destroy',$policy->id)}}"
                                                      method="POST">

                                                    <a class="btn btn-info"
                                                       href="{{ route($statusRoute[$policy->status].'.edit',$policy->id) }}"><i
                                                                class="fas fa-eye"></i></a>


                                                    <a class="btn btn-primary"
                                                       href="{{ route($statusRoute[$policy->status].'.edit',$policy->id) }}"><i
                                                                class="fas fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {!! $policyFlow->links() !!}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('scripts')
    <script>
        //Get employee by branch id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getEmployees')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;

                    let employees = $("#from_user");
                    employees.empty();
                    employees.append("<option> </option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['user_id'];
                        var name = response[i]['name'];
                        var surname = 'surname' in response[i] ? response[i]['surname'] : '';
                        var middle_name = 'middle_name' in response[i] ? response[i]['middle_name'] : '';

                        if (id === 0) {
                            employees.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                        } else {
                            employees.append("<option value='" + id + "' @if(request('from_user_id')) selected @endif>" + surname + " " + name + " " + middle_name + "</option>");
                        }
                    }
                }
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

                    let employees = $("#to_user");
                    employees.empty();
                    employees.append("<option> </option>");
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['user_id'];
                        var name = response[i]['name'];
                        var surname = 'surname' in response[i] ? response[i]['surname'] : '';
                        var middle_name = 'middle_name' in response[i] ? response[i]['middle_name'] : '';

                        if (id === 0) {
                            employees.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                        } else {
                            employees.append("<option value='" + id + "' @if(request('to_user_id')) selected @endif>" + surname + " " + name + " " + middle_name + "</option>");
                        }
                    }
                }
            });
        });
    </script>
@endsection