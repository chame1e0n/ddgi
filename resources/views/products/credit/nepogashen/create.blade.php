@extends('layouts.index')

@section('content')

<!-- Content Wrapper. Contains page content -->
        <form method="POST" action="{{route('credit-nepogashen.store')}}" id="mainFormKasko">
            @csrf
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
                            @include('includes.client')

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
                                                    <input type="text" id="beneficiary-name" name="z_fio" value="{{old('z_fio')}}"
                                                           @if($errors->has('z_fio'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Адрес заемщика</label>
                                                    <input type="text" id="beneficiary-address" name="z_address" value="{{old('z_address')}}"
                                                           @if($errors->has('z_address'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                    <input type="text" id="beneficiary-tel" name="z_phone" value="{{old('z_phone')}}"
                                                           @if($errors->has('z_phone'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Серия паспорта</label>
                                                    <input type="text" id="beneficiary-tel" name="passport_series" value="{{old('passport_series')}}"
                                                           @if($errors->has('passport_series'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Номер паспорта</label>
                                                    <input type="text" id="beneficiary-tel" name="passport_number" value="{{old('passport_number')}}"
                                                           @if($errors->has('passport_number'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Кем выдан</label>
                                                    <input type="text" id="beneficiary-tel" name="passport_issued" value="{{old('passport_issued')}}"
                                                           @if($errors->has('passport_issued'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Когда выдан</label>
                                                    <div class="input-group">
                                                        <input id="insurance_to" name="passport_when_issued" type="date" value="{{old('passport_when_issued')}}"
                                                               @if($errors->has('passport_when_issued'))
                                                               class="form-control polises is-invalid"
                                                               @else
                                                               class="form-control polises"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                    <input type="text" id="beneficiary-schet" name="z_checking_account" value="{{old('z_checking_account')}}"
                                                           @if($errors->has('z_checking_account'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input type="text" id="beneficiary-inn" name="z_inn" value="{{old('z_inn')}}"
                                                           @if($errors->has('z_inn'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input type="text" id="beneficiary-mfo" name="z_mfo" value="{{old('z_mfo')}}"
                                                           @if($errors->has('z_mfo'))
                                                           class="form-control polises is-invalid"
                                                           @else
                                                           class="form-control polises"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="z_bank_id" class="col-form-label">Банк</label>
                                                    <select @if($errors->has('z_bank_id'))
                                                            class="form-control is-invalid"
                                                            @else
                                                            class="form-control"
                                                            @endif id="z_bank_id" name="z_bank_id"
                                                            style="width: 100%;" required>
                                                        <option>Выберите банк</option>
                                                        @foreach($banks as $bank)
                                                            @if(old('z_bank_id') == $bank->id)
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
                                                    <input type="text" id="beneficiary-okonh" name="z_okonx" value="{{old('z_okonx')}}"
                                                           @if($errors->has('z_okonx'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
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
                                                        <input type="text" id="dogovor_credit_num" name="dogovor_credit_num" required
                                                               @if($errors->has('dogovor_credit_num'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="col-form-label">Срок кредитования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="credit_from" name="credit_from" type="date" required
                                                           @if($errors->has('credit_from'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Срок кредитования</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="credit_to" name="credit_to" type="date" required
                                                               @if($errors->has('credit_to'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Сумма кредита</label>
                                                    <input type="text" id="credit_sum" name="credit_sum" required
                                                           @if($errors->has('credit_sum'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Цель получения кредита</label>
                                                    <input type="text" id="credit_purpose" name="credit_purpose"
                                                    @if($errors->has('credit_purpose'))
                                                        class="form-control is-invalid"
                                                    @else
                                                        class="form-control"
                                                    @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label class="col-form-label">Срок действия договора страхования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="credit_validity_period" name="credit_validity_period" type="date"
                                                           @if($errors->has('credit_validity_period'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Другие формы обеспечения обязательств по кредитному договору</label>
                                                    <input type="text" id="other_forms" name="other_forms"
                                                           @if($errors->has('other_forms'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Общая cтраховая сумма</label>
                                                        <input type="text" name="total_sum"
                                                               @if($errors->has('total_sum'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label>Общая страховая премия</label>
                                                        <input type="text" name="total_award"
                                                               @if($errors->has('total_award'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                            @endif>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="payment">Условия оплаты</label>
                                                <select id="payment_terms" name="payment_terms" style="width: 100%;"
                                                        @if($errors->has('payment_terms'))
                                                        class="form-control polises is-invalid"
                                                        @else
                                                        class="form-control polises"
                                                    @endif>
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
                                                    <input type="text" id="polis-series" name="polis_series"
                                                           @if($errors->has('polis_series'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="col-form-label">Дата выдачи страхового полиса </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                    <input id="insurance_from" name="date_issue_policy" type="date"
                                                           @if($errors->has('date_issue_policy'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="otvet-litso">Ответственное лицо</label>
                                                    <select @if($errors->has('litso'))
                                                            class="form-control is-invalid"
                                                            @else
                                                            class="form-control"
                                                            @endif id="otvet-litso" name="litso"
                                                            style="width: 100%;" required>
                                                        <option></option>
                                                        @foreach($agents as $agent)
                                                            <option @if(old('litso') == $agent->user_id) selected
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
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
                    </div>
        </form>
@endsection
