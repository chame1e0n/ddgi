@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{url()->previous()}}" class="btn btn-info">Назад</a>
                <br /><br />

                @include('includes.messages')
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('policy_flows.store')}}"
                      enctype="multipart/form-data"
                      id="polis-registration-form"
                      method="post">
                    @csrf

                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Передача полисов</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">Наименование</label>
                                                <input required
                                                       class="form-control @if($errors->has('name')) is-invalid @endif"
                                                       id="name"
                                                       name="name"
                                                       type="text"
                                                       value="{{old('name')}}" />
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-series-from" class="col-form-label">Серия полиса с:</label>
                                                    <input required
                                                           class="form-control @if($errors->has('policy_series_from')) is-invalid @endif"
                                                           id="policy-series-from"
                                                           name="policy_series_from"
                                                           oninput="counter()"
                                                           type="number"
                                                           value="{{old('policy_series_from')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-series-to" class="col-form-label">Серия полиса до:</label>
                                                    <input required
                                                           class="form-control @if($errors->has('policy_series_to')) is-invalid @endif"
                                                           id="policy-series-to"
                                                           name="policy_series_to"
                                                           oninput="counter()"
                                                           type="number"
                                                           value="{{old('policy_series_to')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="policy-amount" class="col-form-label">Количество полисов</label>
                                                <input disabled
                                                       class="form-control"
                                                       id="policy-amount"
                                                       type="text"
                                                       value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-created-at" class="col-form-label">Дата распределения</label>
                                                    <div class="input-group">
                                                        <input readonly
                                                               class="form-control"
                                                               id="policy-created-at"
                                                               placeholder="yyyy-mm-dd"
                                                               type="date"
                                                               value="{{date('Y-m-d')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-flow-act-date" class="col-form-label">Дата акта</label>
                                                    <div class="input-group">
                                                        <input required
                                                               class="form-control @if($errors->has('policy_flow.act_date')) is-invalid @endif"
                                                               id="policy-flow-act-date"
                                                               name="policy_flow[act_date]"
                                                               placeholder="yyyy-mm-dd"
                                                               type="date"
                                                               value="{{old('policy_flow.act_date', $policy_flow->act_date)}}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-flow-from-employee-id" class="col-form-label">От кого</label>
                                                    <select id="policy-flow-from-employee-id" class="form-control select2" name="policy_flow[from_employee_id]">
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

                                                            <option @if(request('policy_flow.from_employee_id') == $employee->id) selected="selected" @endif
                                                                    value="{{$employee->id}}">
                                                                {{$employee->surname}} {{$employee->name}} {{$employee->middlename}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-flow-to-employee-id" class="col-form-label">Кому</label>
                                                    <select id="policy-flow-to-employee-id" class="form-control select2" name="policy_flow[to_employee_id]">
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

                                                            <option @if(request('policy_flow.to_employee_id') == $employee->id) selected="selected" @endif
                                                                    value="{{$employee->id}}">
                                                                {{$employee->surname}} {{$employee->name}} {{$employee->middlename}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="files" class="col-form-label">Загрузка документов</label>
                                                <div class="input-group">
                                                    <input type="file" multiple id="files" name="files[]" class="form-control" />
                                                    <div class="input-group-append">
                                                        <a class="btn btn-info" href="#">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function counter() {
            var from = parseInt(document.getElementById('policy-series-from').value);
            var to = parseInt(document.getElementById('policy-series-to').value);

            if (from > 0 && to > 0 && to >= from) {
                document.getElementById('policy-amount').value = to - from + 1;
            }
        }
    </script>
@endsection
