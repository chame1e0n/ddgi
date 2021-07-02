@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ url()->previous() }}" class="btn btn-info">Назад</a>
                <br /><br />

                @include('includes.messages')
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('policy_flows.update', $policy_flow->id)}}"
                      id="form-policy_flow"
                      method="post">
                    @csrf
                    @method('PUT')

                    <fieldset @if($block) disabled="disabled" @endif>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Движение полиса</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="policy-name" class="col-form-label">Наименование</label>
                                                <input disabled
                                                       class="form-control"
                                                       id="policy-name"
                                                       type="text"
                                                       value="{{$policy_flow->policy->name}}" />
                                            </div>
                                            <div class="col-md-3">
                                                <label for="policy-series" class="col-form-label">Серия</label>
                                                <input disabled
                                                       class="form-control"
                                                       id="policy-series"
                                                       type="text"
                                                       value="{{$policy_flow->policy->series}}" />
                                            </div>
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
                                                    <label for="policy-flow-status" class="col-form-label">Статус</label>
                                                    <select id="policy-flow-status" class="form-control select2" name="policy_flow[status]">
                                                        <option></option>

                                                        @foreach(\App\Model\PolicyFlow::$statuses as $key => $value)
                                                            <option @if(request('policy_flow.status') == $key) selected @endif
                                                                    value="{{$key}}">
                                                                {{$value}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-flow-branch-id" class="col-form-label">Филиал</label>
                                                    <select required
                                                            class="form-control select2 @error('policy_flow.branch_id') is-invalid @enderror"
                                                            id="policy-flow-branch-id"
                                                            name="policy_flow[branch_id]">
                                                    @foreach(\App\Model\Branch::all() as $branch)
                                                    <option @if($branch->id == old('policy_flow.branch_id', $policy_flow->branch_id)) selected="selected" @endif
                                                            value="{{$branch->id}}">
                                                            {{$branch->name}}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
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

                                                            <option @if($employee->id == old('policy_flow.from_employee_id', $policy_flow->from_employee_id)) selected="selected" @endif
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

                                                            <option @if($employee->id == old('policy_flow.to_employee_id', $policy_flow->to_employee_id)) selected="selected" @endif
                                                                    value="{{$employee->id}}">
                                                                {{$employee->surname}} {{$employee->name}} {{$employee->middlename}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(!$block)
                            <div class="card-footer">
                                <div class="form-group">
                                    <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить</button>
                                </div>
                            </div>
                        @endif
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
