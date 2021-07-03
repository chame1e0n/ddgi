@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Движение полисов</h1>
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
                                    <div class="col-md-2">
                                        <a class="btn btn-success"
                                           href="{{route('policy_flows.create')}}"
                                           style="width: 150px !important;">Распределить</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-success"
                                           href="{{\Illuminate\Support\Facades\URL::current()}}">Обновить</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-success" href="#">Export</a>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-success" href="#">Import</a>
                                    </div>
                                </div>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter-status" class="col-form-label">Статус</label>
                                        <select id="filter-status" class="form-control select2" name="filter[status]">
                                            <option></option>

                                            @foreach(\App\Model\PolicyFlow::$statuses as $key => $value)
                                                <option @if(request('filter.status') == $key) selected @endif
                                                        value="{{$key}}">
                                                    {{$value}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter-act-date" class="col-form-label">Дата акта</label>
                                        <input id="filter-act-date"
                                               class="form-control"
                                               name="filter[act_date]"
                                               type="date"
                                               value="{{request('filter.act_date')}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter-policy-act-number" class="col-form-label">Номер акта</label>
                                        <input id="filter-policy-act-number"
                                               class="form-control"
                                               name="filter[policy][act_number]"
                                               type="text"
                                               value="{{request('filter.policy.act_number')}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter-from-value" class="col-form-label">С серии полиса</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <select id="filter-from-sign"
                                                    class="form-control success"
                                                    name="filter[from][sign]"
                                                    style="width: 100%;">
                                            @foreach(['=', '<', '<=', '>', '>='] as $value)
                                                <option @if(request('filter.from.sign') == $value) selected @endif
                                                        value="{{$value}}">
                                                    {{$value}}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <input id="filter-from-value"
                                               class="form-control"
                                               name="filter[from][value]"
                                               type="text"
                                               value="{{request('filter.from.value')}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="filter-to-value" class="col-form-label">До серии полиса</label>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <select id="filter-to-sign"
                                                    class="form-control success"
                                                    name="filter[to][sign]"
                                                    style="width: 100%;">
                                            @foreach(['=', '<', '<=', '>', '>='] as $value)
                                                <option @if(request('filter.to.sign') == $value) selected @endif
                                                        value="{{$value}}">
                                                    {{$value}}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <input id="filter-to-value"
                                               class="form-control"
                                               name="filter[to][value]"
                                               type="text"
                                               value="{{request('filter.to.value')}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter-from-employee-id" class="col-form-label">От кого</label>
                                        <select id="filter-from-employee-id" class="form-control select2" name="filter[from_employee_id]">
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

                                                <option @if(request('filter.from_employee_id') == $employee->id) selected="selected" @endif
                                                        value="{{$employee->id}}">
                                                    {{$employee->surname}} {{$employee->name}} {{$employee->middlename}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="filter-to-employee-id" class="col-form-label">Кому</label>
                                        <select id="filter-to-employee-id" class="form-control select2" name="filter[to_employee_id]">
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

                                                <option @if(request('filter.to_employee_id') == $employee->id) selected="selected" @endif
                                                        value="{{$employee->id}}">
                                                    {{$employee->surname}} {{$employee->name}} {{$employee->middlename}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="filter_ustatok_sklad_a4" class="col-form-label">Остаток на складе A4</label>
                                            <input disabled
                                                   class="form-control form-control-sm"
                                                   id="filter_ustatok_sklad_a4"
                                                   name="filter_ustatok_sklad_a4"
                                                   type="text"
                                                   value="{{\App\Model\Policy::printSizeStatusCount(\App\Model\Policy::PRINT_SIZE_A4, \App\Model\PolicyFlow::STATUS_REGISTERED)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="filter_ustatok_sklad_a5" class="col-form-label">Остаток на складе A5</label>
                                            <input disabled
                                                   class="form-control form-control-sm"
                                                   id="filter_ustatok_sklad_a5"
                                                   name="filter_ustatok_sklad_a5"
                                                   type="text"
                                                   value="{{\App\Model\Policy::printSizeStatusCount(\App\Model\Policy::PRINT_SIZE_A5, \App\Model\PolicyFlow::STATUS_REGISTERED)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="filter_raspredelen_a4" class="col-form-label">Распределен A4</label>
                                            <input disabled
                                                   class="form-control form-control-sm"
                                                   id="filter_raspredelen_a4"
                                                   name="filter_raspredelen_a4"
                                                   type="text"
                                                   value="{{\App\Model\Policy::printSizeStatusCount(\App\Model\Policy::PRINT_SIZE_A4, \App\Model\PolicyFlow::STATUS_TRANSFERRED)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="filter_raspredelen_a5" class="col-form-label">Распределен A5</label>
                                            <input disabled
                                                   class="form-control form-control-sm"
                                                   id="filter_raspredelen_a5"
                                                   name="filter_raspredelen_a5"
                                                   type="text"
                                                   value="{{\App\Model\Policy::printSizeStatusCount(\App\Model\Policy::PRINT_SIZE_A5, \App\Model\PolicyFlow::STATUS_TRANSFERRED)}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <th>Серия</th>
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
                                    @foreach($policy_flows as $policy_flow)
                                        <tr>
                                            <td>{{$policy_flow->policy->name}}</td>
                                            <td>{{$policy_flow->policy->series}}</td>
                                            <td>{{\App\Model\PolicyFlow::$statuses[$policy_flow->status]}}</td>
                                            <td>{{($from_employee = $policy_flow->from_employee) ? $from_employee->getFullNameAndPosition() : 'N/A'}}</td>
                                            <td>{{$policy_flow->to_employee->branch->name}}</td>
                                            <td>{{($to_employee = $policy_flow->to_employee) ? $to_employee->getFullNameAndPosition() : 'N/A'}}</td>
                                            <td>{{date('d.m.Y', strtotime($policy_flow->created_at))}}</td>
                                            <td>{{$policy_flow->policy->act_number}}</td>
                                            <td>{{date('d.m.Y', strtotime($policy_flow->act_date))}}</td>
                                            <td>
                                                <form action="{{route('policy_flows.destroy', $policy_flow->id)}}"
                                                      method="POST">
                                                    <a class="btn btn-info"
                                                       href="{{route('policy_flows.show', $policy_flow->id)}}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-primary"
                                                       href="{{route('policy_flows.edit', $policy_flow->id)}}">
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