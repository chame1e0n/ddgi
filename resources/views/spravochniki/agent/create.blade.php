@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
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
            <form method="post" id="agent-form" action="{{ route('agent.store') }}" enctype="multipart/form-data">
                @csrf
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
                                            <input id="last_name" type="text" name="surname"
                                                   value="{{old('last_name')}}"
                                                   @if($errors->has('last_name'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">Имя</label>
                                            <input id="first_name" type="text" name="name"
                                                   value="{{old('name')}}"
                                                   @if($errors->has('name'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middle_name">Отчество</label>
                                            <input id="middle_name" type="text" name="middle_name"
                                                   value="{{old('middle_name')}}"
                                                   @if($errors->has('middle_name'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_data-r">Дата рождения</label>
                                            <input type="date" id="passport_data-r"
                                                   name="dob" value="{{old('dob')}}"
                                                   @if($errors->has('dob'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_series">Серия паспорта</label>
                                            <input type="text" id="passport_series"
                                                   name="passport_series" value="{{old('passport_series')}}"
                                                   @if($errors->has('passport_series'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_number">Номер паспорта</label>
                                            <input type="text" id="passport_number"
                                                   name="passport_number" value="{{old('passport_number')}}"
                                                   @if($errors->has('passport_number'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_job-address">Место работы</label>
                                            <input type="text" id="passport_job-address"
                                                   name="job" value="{{old('job')}}"
                                                   @if($errors->has('job'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
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
                                                       name="work_start_date" value="{{old('work_start_date')}}"
                                                       @if($errors->has('work_start_date'))
                                                        class="form-control is-invalid"
                                                       @else
                                                        class="form-control"
                                                       @endif
                                                       placeholder="от">
                                                <input type="date" style="width: 50%;" id="passport_period-job-before"
                                                       name="work_end_date" value="{{old('work_end_date')}}"
                                                       @if($errors->has('work_end_date'))
                                                        class="form-control is-invalid"
                                                       @else
                                                        class="form-control"
                                                       @endif
                                                       placeholder="до">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone_number">Телефон</label>
                                            <input type="text" id="phone_number"
                                                   name="phone_number"
                                                   value="{{old('phone_number')}}"
                                                   @if($errors->has('phone_number'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_address">Адрес</label>
                                            <input type="text" id="passport_address"
                                                   @if($errors->has('address'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif
                                                   name="address" value="{{old('address')}}" placeholder="Введите ...">
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
                                    <input type="email" id="email"
                                           @if($errors->has('email'))
                                            class="form-control is-invalid"
                                           @else
                                            class="form-control"
                                           @endif
                                           name="email" value="{{old('email')}}"
                                           placeholder="Введите ..." required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="status">Статус</label>
                                    <select id="status" name="status" class="form-control select2" style="width: 100%;"
                                            required>
                                        <option value="1" selected="selected">Активен</option>
                                        <option value="0" >Неактивен</option>
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
                    <button type="submit" id="submit-button" class="btn btn-primary float-right">Сохранить</button>
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
