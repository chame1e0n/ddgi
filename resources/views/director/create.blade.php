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
            <form method="post" id="agent-form" action="{{ route('director.store') }}" enctype="multipart/form-data">
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
                                            <input id="last_name" type="text"
                                                   @if($errors->has('last_name'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   name="surname"
                                                   value="{{old('last_name')}}"
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">Имя</label>
                                            <input id="first_name" type="text"
                                                   @if($errors->has('name'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   name="name"
                                                   value="{{old('name')}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middle_name">Отчество</label>
                                            <input id="middle_name" type="text" class="form-control"
                                                   @if($errors->has('middle_name'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   value="{{old('middle_name')}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_data-r">Дата рождения</label>
                                            <input type="date" id="passport_data-r"
                                                   @if($errors->has('dob'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   name="dob" value="{{old('dob')}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_series">Серия паспорта</label>
                                            <input type="text" id="passport_series"
                                                   @if($errors->has('passport_series'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   name="passport_series" value="{{old('passport_series')}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_number">Номер паспорта</label>
                                            <input type="text" id="passport_number"
                                                   @if($errors->has('passport_number'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   name="passport_number" value="{{old('passport_number')}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{--<div class="col-md-4">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="passport_data-job">Дата начала работы</label>--}}
                                    {{--<input type="date" id="passport_data-job" class="form-control"--}}
                                    {{--name="work_start_date" value="" placeholder="Введите ...">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_job-address">Филиал</label>
                                            <select id="branch" name="branch_id" class="form-control branch"
                                                    style="width: 100%;"
                                                    @if($errors->has('branch_id'))
                                                    class="form-control branch is-invalid"
                                                    @else
                                                    class="form-control branch"
                                                    @endif
                                                    required>
                                                @foreach($branches as $branch)
                                                    @if(old('branch_id') == $branch->id)
                                                        <option value="{{$branch->id}}"
                                                                selected>{{$branch->name}}</option>
                                                    @else
                                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_period-job-after">Период работы</label>
                                            <div class="card-flex" style="display: flex;">
                                                <input type="date" style="width: 50%;" id="passport_period-job-after"
                                                       @if($errors->has('work_start_date'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       name="work_start_date" value="{{old('work_start_date')}}"
                                                       placeholder="от">
                                                <input type="date" style="width: 50%;" id="passport_period-job-before"
                                                       @if($errors->has('work_end_date'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif
                                                       name="work_end_date" value="{{old('work_end_date')}}"
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
                                                   @if($errors->has('phone_number'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif
                                                   name="phone_number"
                                                   value="{{old('phone_number')}}" placeholder="Введите ...">
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
                    <button type="submit" id="submit-button" class="btn btn-primary float-right">Сохранить</button>
                </div>
            </form>
        </section>
    </div>
    <!-- /.content -->
@endsection
