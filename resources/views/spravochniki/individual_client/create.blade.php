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

        <div class="content">
            <div class="container-fluid">
                <form method="post" action="{{ route('individual_client.store') }}"  id="individual-client-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Добавить клиента</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                                data-toggle="tooltip" title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name" class="col-form-label">Имя</label>
                                                <input id="first_name" class="form-control" name="name" value="{{ old('name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="middle_name" class="col-form-label">Отчество</label>
                                                <input id="middle_name" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_name" class="col-form-label">Фамилия</label>
                                                <input id="last_name" class="form-control" name="surname" value="{{ old('surname') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address" class="col-form-label">Адрес</label>
                                                <input id="address" class="form-control" name="address" value="{{ old('address') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="phone_number" class="col-form-label">Номер телефона</label>
                                                <input id="phone_number" class="form-control" name="phone_number" value="{{ old('phone_number') }}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mfo" class="col-form-label">МФО</label>
                                                <input id="mfo" class="form-control" name="mfo" value="{{ old('mfo') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="inn" class="col-form-label">ИНН</label>
                                                <input id="inn" class="form-control" name="inn" value="{{ old('inn') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="bank_id" class="col-form-label">Банк</label>
                                                <select id="bank_id" class="form-control" name="bank_id" required>
                                                    <option selected></option>
                                                    @foreach($banks as $bank)
                                                    <option value="{{$bank->id}}">{{$bank->name}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="checking_account" class="col-form-label">Расчётный
                                                    счёт</label>
                                                <input id="checking_account" class="form-control"
                                                       name="raschetniy_schet" value="{{ old('raschetniy_schet') }}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="passport_series" class="col-form-label">Серия
                                                    паспорта</label>
                                                <input id="passport_series" class="form-control" name="passport_series" value="{{ old('passport_series') }}"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="passport_number" class="col-form-label">Номер
                                                    паспорта</label>
                                                <input id="passport_number" class="form-control" name="passport_number" value="{{ old('passport_number') }}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="passport_given_date" class="col-form-label">Дата выдачи
                                                    паспорта</label>
                                                <input type="date" id="passport_given_date" class="form-control"
                                                       name="passport_given_date" value="{{ old('passport_given_date') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="passport_given_by" class="col-form-label">Паспорт выдан
                                                    кем</label>
                                                <input id="passport_given_by" class="form-control"
                                                       name="passport_given_by" value="{{ old('passport_given_by') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
        </script>


    </div>
    <!-- /.content -->
@endsection
