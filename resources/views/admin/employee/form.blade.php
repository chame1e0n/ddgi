@extends('admin.layouts.form-layout')

@section('form-content')
    <form action="{{route($employee->role . 's.' . ($employee->exists ? 'update' : 'store'), $employee->id)}}"
          id="{{$employee->role}}-form"
          method="post">
        @csrf

        @if($employee->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить сотрудника ({{\App\Model\Employee::getTitle($employee->role)}})</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="employee-name" class="col-form-label">Имя</label>
                                        <input required
                                               class="form-control @error('employee.name') is-invalid @enderror"
                                               id="employee-name"
                                               name="employee[name]"
                                               value="{{old('employee.name', $employee->name)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="employee-surname" class="col-form-label">Фамилия</label>
                                        <input required
                                               class="form-control @error('employee.surname') is-invalid @enderror"
                                               id="employee-surname"
                                               name="employee[surname]"
                                               value="{{old('employee.surname', $employee->surname)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="employee-middlename" class="col-form-label">Отчество</label>
                                        <input required
                                               class="form-control @error('employee.middlename') is-invalid @enderror"
                                               id="employee-middlename"
                                               name="employee[middlename]"
                                               value="{{old('employee.middlename', $employee->middlename)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="employee-branch-id" class="col-form-label">Филиал</label>
                                        <select required
                                                class="form-control select2 @error('employee.branch_id') is-invalid @enderror"
                                                id="employee-branch-id"
                                                name="employee[branch_id]">
                                        @foreach(\App\Model\Branch::all() as $branch)
                                        <option @if($branch->id == old('employee.branch_id', $employee->branch_id)) selected="selected" @endif
                                                value="{{$branch->id}}">
                                                {{$branch->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee-birthdate" class="col-form-label">Дата рождения</label>
                                        <input required
                                               class="form-control @error('employee.birthdate') is-invalid @enderror"
                                               id="employee-birthdate"
                                               name="employee[birthdate]"
                                               type="date"
                                               value="{{old('employee.birthdate', $employee->birthdate)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee-passport-series" class="col-form-label">Серия паспорта</label>
                                        <input required
                                               class="form-control @error('employee.passport_series') is-invalid @enderror"
                                               id="employee-passport-series"
                                               name="employee[passport_series]"
                                               value="{{old('employee.passport_series', $employee->passport_series)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee-passport-number" class="col-form-label">Номер паспорта</label>
                                        <input required
                                               class="form-control @error('employee.passport_number') is-invalid @enderror"
                                               id="employee-passport-number"
                                               name="employee[passport_number]"
                                               value="{{old('employee.passport_number', $employee->passport_number)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee-work-start-date" class="col-form-label">Период работы</label>
                                        <div class="card-flex"
                                             style="display: flex;">
                                            <input class="form-control @error('employee.work_start_date') is-invalid @enderror"
                                                   id="employee-work-start-date"
                                                   name="employee[work_start_date]"
                                                   style="width: 50%;"
                                                   type="date"
                                                   value="{{old('employee.work_start_date', $employee->work_start_date)}}" />
                                            <input class="form-control @error('employee.work_end_date') is-invalid @enderror"
                                                   id="employee-work-end-date"
                                                   name="employee[work_end_date]"
                                                   style="width: 50%;"
                                                   type="date"
                                                   value="{{old('employee.work_end_date', $employee->work_end_date)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee-phone" class="col-form-label">Телефон</label>
                                        <input required
                                               class="form-control @error('employee.phone') is-invalid @enderror"
                                               id="employee-phone"
                                               name="employee[phone]"
                                               value="{{old('employee.phone', $employee->phone)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="employee-address" class="col-form-label">Адрес</label>
                                        <input required
                                               class="form-control @error('employee.address') is-invalid @enderror"
                                               id="employee-address"
                                               name="employee[address]"
                                               value="{{old('employee.address', $employee->address)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Настройки пользователя</h3>
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
                                <label for="user-email" class="col-form-label">Электронная почта</label>
                                <input required
                                       class="form-control @error('user.email') is-invalid @enderror"
                                       id="user-email"
                                       name="user[email]"
                                       type="email"
                                       value="{{old('user.email', $user->email)}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-password" class="col-form-label">Пароль</label>
                                <input required
                                       class="form-control @error('user.password') is-invalid @enderror"
                                       id="user-password"
                                       name="user[password]"
                                       type="password" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!$block)
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$employee->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
