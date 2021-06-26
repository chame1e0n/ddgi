@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
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
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="{{route('policies.create')}}">Создать</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="{{\Illuminate\Support\Facades\URL::current()}}">Обновить</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="#">Export</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="#">Import</a>
                                    </div>
                                </div>
                                <div class="row"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-success product-type">
                <div class="card-header">
                    <h3 class="card-title">Фильтры</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                        <label for="filter-branch-id" class="col-form-label">Филиал</label>
                                        <select id="filter-branch-id" class="form-control select2" name="filter[branch_id]">
                                            <option></option>

                                            @foreach(\App\Model\Branch::all() as $branch)
                                                <option @if(request('filter.branch_id') == $branch->id) selected="selected" @endif
                                                        value="{{$branch->id}}">
                                                    {{$branch->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter-employee-id" class="col-form-label">Пользователь</label>
                                        <select id="filter-employee-id" class="form-control select2" name="filter[employee_id]">
                                            <option></option>

                                            @php $header = null @endphp
                                            @foreach(\App\Model\Employee::orderBy('role')->get() as $employee)
                                                @if($employee->role != $header)
                                                    <option disabled="disabled"
                                                            style="font-weight: bold;"
                                                            value="0">
                                                        {{\App\Model\Employee::getTitle($employee->role, true)}}
                                                    </option>

                                                    @php $header = $employee->role @endphp
                                                @endif

                                                <option @if(request('filter.employee_id') == $employee->id) selected="selected" @endif
                                                        value="{{$employee->id}}">
                                                    {{$employee->surname}} {{$employee->name}} {{$employee->middlename}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="filter-status" class="col-form-label">Статусы</label>
                                        <select id="filter-status" class="form-control select2" name="filter[status]">
                                            @foreach(\App\Models\Policy::STATUS as $key => $value)
                                                <option @if(request('filter.status') == $key) selected @endif
                                                        value="{{$key}}">
                                                    {{$value}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="filter-polis-from-date" class="col-form-label">Период от</label>
                                        <input id="filter-polis-from-date"
                                               class="form-control"
                                               name="filter[polis_from_date]"
                                               type="date"
                                               value="{{request('filter.polis_from_date')}}" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="filter-polis-to-date" class="col-form-label">Период до</label>
                                        <input id="filter-polis-to-date"
                                               class="form-control"
                                               name="filter[polis_to_date]"
                                               type="date"
                                               value="{{request('fillter.polis_to_date')}}" />
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success"
                                            style="margin: 38px 0 0 auto; display: block;"
                                            type="submit">
                                        Найти
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
                            <div class="card-body table-responsive p-0">
                                @include('includes.messages')

                                <table id="example" class="table table-bordered table-striped text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Номер</th>
                                            <th>Серия</th>
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
                                            <td>{{ $policy->name }}</td>
                                            <td>{{ $policy->number }}</td>
                                            <td>{{ $policy->series }}</td>
                                            <td>{{ $policy->act_number }}</td>
                                            <td>{{ $policy->status }}</td>
                                            <td>{{ $policy->employee->getFullNameAndPosition() }}</td>
                                            <td>{{ ($branch = $policy->branch) ? $branch->name : '' }}</td>
                                            <td>{{ $policy->polis_from_date }}</td>
                                            <td>{{ $policy->polis_to_date }}</td>
                                            <td>
                                                <form action="{{route('policy.destroy', $policy->id)}}"
                                                      method="POST">
                                                    <a class="btn btn-info"
                                                       href="{{route('policy.show', $object->id)}}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-info"
                                                       href="{{route('policy.edit', $policy->id)}}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                language: {
                    info: 'Показано с _START_ по _END_ из _TOTAL_ записей',
                    search: 'Поиск',
                    lengthMenu: 'Показать _MENU_ записи',
                    paginate: {
                        sFirst: 'Первая:с',         // This is the link to the first page
                        sPrevious: 'Предыдущая:с',  // This is the link to the previous page
                        sNext: 'Следующая:с',       // This is the link to the next page
                        sLast: 'Предыдущая:с'       // This is the link to the last page
                    }
                },
                pagingType: 'full_numbers',
                lengthMenu: [[5, 25, 50, -1], [5, 25, 50, 'All']]
            });
        });
    </script>
@endsection