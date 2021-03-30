@extends('layouts.index')

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
        <section class="content">
            <form method="post" id="agent-form" action="{{ route('agent.update', $agent->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Информация о профайле</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="last_name">Фамилия</label>
                                            <input id="last_name" type="text" class="form-control" name="surname"
                                                   value="{{$agent->surname}}"
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">Имя</label>
                                            <input id="first_name" type="text" class="form-control" name="name"
                                                   value="{{$agent->name}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middle_name">Отчество</label>
                                            <input id="middle_name" type="text" class="form-control" name="middle_name"
                                                   value="{{$agent->middle_name}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_data-r">Дата рождения</label>
                                            <input type="date" id="passport_data-r" class="form-control"
                                                   name="dob" value="{{$agent->dob}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_series">Серия паспорта</label>
                                            <input type="text" id="passport_series" class="form-control"
                                                   name="passport_series" value="{{$agent->passport_series}}"
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_number">Номер паспорта</label>
                                            <input type="text" id="passport_number" class="form-control"
                                                   name="passport_number" value="{{$agent->passport_number}}"
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_job-address">Место работы</label>
                                            <input type="text" id="passport_job-address" class="form-control"
                                                   name="job" value="{{$agent->job}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="passport_data-job">Дата начала работы</label>--}}
                                    {{--<input type="date" id="passport_data-job" class="form-control"--}}
                                    {{--name="work_start_date" value="" placeholder="Введите ...">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_period-job-after">Период работы</label>
                                            <div class="card-flex" style="display: flex;">
                                                <input type="date" style="width: 50%;" id="passport_period-job-after"
                                                       class="form-control" name="work_start_date"
                                                       value="{{$agent->work_start_date}}"
                                                       placeholder="от">
                                                <input type="date" style="width: 50%;" id="passport_period-job-before"
                                                       class="form-control" name="work_end_date"
                                                       value="{{$agent->work_end_date}}"
                                                       placeholder="до">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone_number">Телефон</label>
                                            <input type="text" id="phone_number" class="form-control"
                                                   name="phone_number"
                                                   value="{{$agent->phone_number}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_address">Адрес</label>
                                            <input type="text" id="passport_address" class="form-control"
                                                   name="address" value="{{$agent->address}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="passport_email">Почта</label>--}}
                                    {{--<input type="email" id="passport_email" class="form-control"--}}
                                    {{--name="passport_given_by" value="" placeholder="Введите ...">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image-input">Изображение профайла</label>
                                            <div class="file-loading">
                                                <input id="image-input" class="file" type="file" name="profile_img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="file-input">Агентское соглашение</label>
                                            <div class="file-loading">
                                                <input id="file-input" class="file" type="file"
                                                       name="agent_agreement_img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dogovor-input">Трудовой договор</label>
                                            <div class="file-loading">
                                                <input id="dogovor-input" class="file" type="file"
                                                       name="labor_contract">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doc-input">Документы фирмы</label>
                                            <div class="file-loading">
                                                <input id="doc-input" class="file" type="file" name="firm_contract">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dogovor-input">Лицензии</label>
                                            <div class="licen-loading">
                                                <input id="licen-input" class="file" type="file" name="license">
                                            </div>
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
                            {{--<div class="col-md-2">--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="login">Логин</label>--}}
                            {{--<input id="login" type="text" class="form-control" name="login" value=""--}}
                            {{--placeholder="Введите ..." required>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Эл. почта</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                           value="{{$agent->user->email}}"
                                           placeholder="Введите ..." required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="status">Статус</label>
                                    <select id="status" name="status" class="form-control select2" style="width: 100%;"
                                            required>
                                        <option value="{{$agent->status}}"
                                                selected="selected">{{$agent->status == 1 ? 'Активен' : 'Неактивен'}}</option>
                                        <option value="1">Активен</option>
                                        <option value="0">Неактивен</option>
                                    </select>
                                </div>
                            </div>
                            {{--<div class="col-md-2">--}}
                            {{--<div class="form-group">--}}
                            {{--<label style="opacity: 0;" for="delete-user">Удалить</label>--}}
                            {{--<button type="submit" id="delete-user" class="btn btn-primary float-right">Удалить--}}
                            {{--</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

                <div class="card-footer" style="margin-bottom: 16px">
                    <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить</button>
                </div>
            </form>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Оформленные договора</h3>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <table id="currency_table" class="table table-bordered table-hover dataTable dtr-inline"
                               role="grid"
                               style="width: 100%;">
                            <thead>
                            <tr role="row">
                                <th>Id</th>
                                <th>Название</th>
                                <th>Дата</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>0001</th>
                                <th>Договор</th>
                                <th>20.20.20</th>
                                <th>
                                    <button class="btn btn-primary" onclick="editClient()">Редактировать</button>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
@endsection