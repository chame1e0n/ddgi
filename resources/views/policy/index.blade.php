@extends('layouts.index')

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
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="{{ route('policy_registration.create') }}">Создать</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="{{Illuminate\Support\Facades\URL::current()}}">Обновить</a>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter_filial" class="col-form-label">Филиал</label>
                                        <select id="filter_filial" class="form-control select2" name="branch_id">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter_user" class="col-form-label">Пользователь</label>
                                        <select id="filter_user" class="form-control select2" name="user_id">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter_stat" class="col-form-label">Статусы</label>
                                        <select id="filter_stat" class="form-control select2" name="status">
                                            @foreach(\App\Models\Policy::STATUS as $key=>$value)
                                                <option value="{{$key}}" @if(request('status') == $key) selected @endif>{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="filter_data_ot" class="col-form-label">Период от</label>
                                        <input type="date" id="filter_data_ot" value="{{request('polis_from_date')}}" name="polis_from_date"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="filter_data_do" class="col-form-label">Период до</label>
                                        <input type="date" id="filter_data_do" value="{{request('polis_to_date')}}" name="polis_to_date"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                                <table id="example1" class="table table-bordered table-striped  text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Наименование</th>
                                        <th>Серия</th>
                                        <th>Номер</th>
                                        <th>Номер акта</th>
                                        <th>Статус</th>
                                        <th>Пользователь</th>
                                        <th>Филиал</th>
                                        <th>Период от</th>
                                        <th>Период до</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($policies as $policy)
                                        <tr>
                                            <td>{{ @$policy->polis_name }}</td>
                                            <td>{{ $policy->number }}</td>
                                            <td>{{ @$policy->polis_unique_number }}</td>
                                            <td>{{ $policy->act_number }}</td>
                                            <td>{{ $policy->status }}</td>
                                            <td>{{ !is_null( $policy->user) ? $policy->user->getFullNameAndPosition() : '' }}</td>
                                            <td>{{ @$policy->branch->name }}</td>
                                            <td>{{ @$policy->polis_from_date }}</td>
                                            <td>{{ @$policy->polis_to_date }}</td>
                                            <td>
                                                <form action="{{ route('policy.destroy',$policy->id) }}" method="POST">

                                                    <a class="btn btn-info"
                                                       href="{{ route('policy.edit',$policy->id) }}"><i
                                                                class="fas fa-eye"></i></a>
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
                                {{--                {!! $policies->links() !!}--}}
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

    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getEmployees')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;

                    let employees = $("#filter_user");
                    employees.empty();
                    employees.append("<option> </option>");
                    var selected = {{request('user_id') ?? 0}};
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

            $.ajax({
                url: '{{route('branches')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    response = response.data;
                    var len = response.length;

                    let branch = $("#filter_filial");
                    branch.empty();
                    branch.append("<option> </option>");
                    var selected = {{request('branch_id') ?? 0}};
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        branch.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + name + "</option>");
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#example1').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                "language": {
                    "info": "Показано с _START_ по _END_ из _TOTAL_ записей",
                    "search": "Поиск",
                    "lengthMenu": "Показать _MENU_ записи",
                    "paginate": {
                        "sFirst": "Первая:с", // This is the link to the first page
                        "sPrevious": "Предыдущая:с", // This is the link to the previous page
                        "sNext": "Следующая:с", // This is the link to the next page
                        "sLast": "Предыдущая:с" // This is the link to the last page
                    },
                },

                "pagingType": "full_numbers",
                "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]]
            });
        });
    </script>
@endsection