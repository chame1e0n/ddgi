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
            <form method="post" id="agent-form" action="{{ route('director.update', $director->id) }}"  enctype="multipart/form-data">
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
                                                   value="{{$director->surname}}"
                                                   placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">Имя</label>
                                            <input id="first_name" type="text" class="form-control" name="name"
                                                   value="{{$director->name}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middle_name">Отчество</label>
                                            <input id="middle_name" type="text" class="form-control" name="middle_name"
                                                   value="{{$director->middle_name}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_data-r">Дата рождения</label>
                                            <input type="date" id="passport_data-r" class="form-control"
                                                   name="dob" value="{{$director->dob}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_series">Серия паспорта</label>
                                            <input type="text" id="passport_series" class="form-control"
                                                   name="passport_series" value="{{$director->passport_series}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_number">Номер паспорта</label>
                                            <input type="text" id="passport_number" class="form-control"
                                                   name="passport_number" value="{{$director->passport_number}}" placeholder="Введите ...">
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
                                            <label for="passport_period-job-after">Период работы</label>
                                            <div class="card-flex" style="display: flex;">
                                                <input type="date" style="width: 50%;" id="passport_period-job-after"
                                                       class="form-control" name="work_start_date" value="{{$director->work_start_date}}"
                                                       placeholder="от">
                                                <input type="date" style="width: 50%;" id="passport_period-job-before"
                                                       class="form-control" name="work_end_date" value="{{$director->work_end_date}}"
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
                                                   value="{{$director->phone_number}}" placeholder="Введите ...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="passport_address">Адрес</label>
                                            <input type="text" id="passport_address" class="form-control"
                                                   name="address" value="{{$director->address}}" placeholder="Введите ...">
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
                                                <input id="image-input" class="file" type="file" name="profile_img" value="{{$director->profile_img}}">
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
                                    <input type="email" id="email" class="form-control" name="email" value="{{$director->user->email}}"
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
                                        <option value="{{$director->status}}" selected="selected">{{$director->status == 1 ? 'Активен' : 'Неактивен'}}</option>
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
                    <button type="submit" id="submit-button" class="btn btn-primary float-right">Сохранить</button>
                </div>
            </form>
        </section>
    </div>
    <!-- /.content -->
@endsection
@section('scripts')
    <script>
        let imageInput = $('#image-input');
        let imageUrl = "{{asset('storage')}}" + '/' +imageInput.prop("defaultValue");

        if (imageUrl) {
            imageInput.fileinput({
                language: 'ru',
                initialPreview: [imageUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                maxFileCount: 1,
            });
        } else {
            imageInput.fileinput({
                language: 'ru',
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                maxFileCount: 1,
            });
        }
    </script>
@endsection