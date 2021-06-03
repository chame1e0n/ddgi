@extends('layouts.index')

@section('content')

    <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                                <li class="breadcrumb-item active">Создать Анкету</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                @include('products.select')
                <div class="card-body">
                    <div class="card-body">
                        @include('includes.client')
                    </div>
                    <div class="card-body">
                        <div class="card card-info" id="clone-beneficiary">
                            <div class="card-header">
                                <h3 class="card-title">Заемщик</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="beneficiary-card-body">
                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="insurer-name" class="col-form-label">ФИО/Наименования заемщика</label>
                                                <input readonly type="text" id="beneficiary-name" name="z_fio" class="form-control" value="{{$credit->zaemshik->z_fio}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-address" class="col-form-label">Адрес заемщика</label>
                                                <input readonly type="text" id="beneficiary-address" name="z_address" class="form-control" value="{{$credit->zaemshik->z_address}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                <input readonly type="text" id="beneficiary-tel" name="z_phone" class="form-control" value="{{$credit->zaemshik->z_phone}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Серия паспорта</label>
                                                <input readonly type="text" id="beneficiary-tel" name="passport_series" class="form-control" value="{{$credit->zaemshik->passport_series}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Номер паспорта</label>
                                                <input readonly type="text" id="beneficiary-tel" name="passport_number" class="form-control" value="{{$credit->zaemshik->passport_number}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Кем выдан</label>
                                                <input readonly type="text" id="beneficiary-tel" name="passport_issued" class="form-control" value="{{$credit->zaemshik->passport_issued}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Когда выдан</label>
                                                <div class="input-group">
                                                    <input readonly id="insurance_to" name="passport_when_issued" type="date" class="form-control" value="{{$credit->zaemshik->passport_when_issued}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                <input readonly type="text" id="beneficiary-schet" name="z_checking_account" class="form-control" value="{{$credit->zaemshik->z_checking_account}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                <input readonly type="text" id="beneficiary-inn" name="z_inn" class="form-control" value="{{$credit->zaemshik->z_inn}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                <input readonly type="text" id="beneficiary-mfo" name="z_mfo" class="form-control" value="{{$credit->zaemshik->z_mfo}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="z_bank_id" class="col-form-label">Банк</label>
                                                <select readonly @if($errors->has('z_bank_id'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif id="z_bank_id" name="z_bank_id"
                                                        style="width: 100%;" required>
                                                    <option>Выберите банк</option>
                                                    @foreach($banks as $bank)
                                                        @if($credit->zaemshik->bank_id == $bank->id)
                                                            <option selected value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                        @else
                                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                <input readonly type="text" id="beneficiary-okonh" name="z_okonx" class="form-control" value="{{$credit->zaemshik->z_okonx}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="dogovor-lizing-num" class="col-form-label">Кредитный договор</label>
                                                    <input readonly type="text" id="dogovor_credit_num" name="dogovor_credit_num" class="form-control"  value="{{$credit->dogovor_credit_num}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Срок кредитования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input readonly id="credit_from" name="credit_from" type="date" class="form-control" value="{{$credit->credit_from}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Срок кредитования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input readonly id="credit_to" name="credit_to" type="date" class="form-control"  value="{{$credit->credit_to}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Сумма кредита</label>
                                                <input readonly type="text" id="credit_sum" name="credit_sum" class="form-control"  value="{{$credit->credit_sum}}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Цель получения кредита</label>
                                                <input readonly type="text" id="credit_purpose" name="credit_purpose" class="form-control"  value="{{$credit->credit_purpose}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Срок действия договора страхования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input readonly id="credit_validity_period" name="credit_validity_period" type="date" class="form-control"  value="{{$credit->credit_validity_period}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Другие формы обеспечения обязательств по кредитному договору</label>
                                                <input readonly type="text" id="other_forms" name="other_forms" class="form-control"  value="{{$credit->other_forms}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Общая cтраховая сумма</label>
                                                    <input readonly type="text" class="form-control" name="total_sum" value="{{$credit->total_sum}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Общая страховая премия</label>
                                                    <input readonly type="text" class="form-control" name="total_award" value="{{$credit->total_award}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment">Условия оплаты</label>
                                            <select readonly class="form-control polises" id="payment_terms" name="payment_terms" style="width: 100%;">
                                                <option selected="selected" value="Единовременно">Единовременно</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card card-info" id="clone-beneficiary">
                            <div class="card-header">
                                <h3 class="card-title">Сведения о страховом полисе</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="beneficiary-card-body">
                                <div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="polis-series" class="col-form-label">Серийный номер полиса страхования</label>
                                                <input readonly type="text" id="polis-series" name="polis_series" class="form-control" value="{{$credit->serial_number_policy}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input readonly id="insurance_from" name="date_issue_policy" type="date" class="form-control" value="{{$credit->date_issue_policy}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso">Ответственное лицо</label>
                                                <select readonly @if($errors->has('litso'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif id="otvet-litso" name="litso"
                                                        style="width: 100%;" required>
                                                    <option></option>
                                                    @foreach($agents as $agent)
                                                        <option @if($credit->otvet_litso == $agent->user_id) selected
                                                                @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

@endsection
