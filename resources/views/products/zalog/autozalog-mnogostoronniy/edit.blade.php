@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-autozalog-mnogostoronniy.update', $page->id)}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
        @method('PUT')
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
                <div class="card card-success product-type">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="client-product-form">
                            <div class="form-group clearfix">
                                <label>Типы клиента</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-1" value="0" @if($page->type == 0) checked @endif>
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-2" value="1"@if($page->type == 1) checked @endif>
                                            <label for="client-type-radio-2">юр. лицо</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2" name="product_id"
                                        style="width: 100%;">
                                    <option selected="selected">говно</option>
                                    <option selected="selected">говно 2</option>
                                    <option value="1">asdc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @include('errors.errors')
                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Выгодоприобретатель</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-name" class="col-form-label">ФИО
                                                выгодоприобретателя</label>
                                            <input required value="{{$page->policyBeneficiaries->FIO}}"
                                                   type="text"
                                                   id="beneficiary-name" name="fio_beneficiary"
                                                   @if($errors->has('FIO'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес
                                                выгодоприобретателя</label>
                                            <input required value="{{$page->policyBeneficiaries->address}}"
                                                   type="text"
                                                   id="beneficiary-address"
                                                   name="address_beneficiary"
                                                   @if($errors->has('address'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input required value="{{$page->policyBeneficiaries->phone_number}}"
                                                   type="text"
                                                   id="beneficiary-tel" name="tel_beneficiary"
                                                   @if($errors->has('phone_number'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                счет</label>
                                            <input required
                                                   value="{{$page->policyBeneficiaries->checking_account}}"
                                                   type="text" id="beneficiary_schet"
                                                   name="beneficiary_schet"
                                                   @if($errors->has('checking_account'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input required value="{{$page->policyBeneficiaries->inn}}"
                                                   type="number" id="inn_beneficiary"
                                                   name="inn_beneficiary"
                                                   @if($errors->has('inn'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input required value="{{$page->policyBeneficiaries->mfo}}"
                                                   type="text" id="mfo_beneficiary"
                                                   name="mfo_beneficiary"
                                                   @if($errors->has('mfo_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-bank" class="col-form-label">Банк</label>
                                            <select @if($errors->has('bank_beneficiary'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="bank_beneficiary" name="bank_beneficiary"
                                                    style="width: 100%;" required>
                                                <option>Выберите банк</option>
                                                @foreach($banks as $bank)
                                                    @if($page->policyBeneficiaries->bank_id == $bank->id)
                                                        <option selected
                                                                value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @else
                                                        <option
                                                            value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                            <input required value="{{$page->policyBeneficiaries->oked}}"
                                                   type="text" id="oked_beneficiary"
                                                   name="oked_beneficiary"
                                                   @if($errors->has('oked_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                            <input type="text" value="{{$page->policyBeneficiaries->okonx}}"
                                                   id="beneficiary-okonh" name="okonx_beneficiary" required
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Залогодатель</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-name" class="col-form-label">Наименования
                                                залогодателя</label>
                                            <input type="text" id="fio_zalog" name="fio_zalog"
                                                   class="form-control
                                                    @if($errors->has('fio_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->fio}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес
                                                залогодателя</label>
                                            <input type="text" id="beneficiary-address"
                                                   name="address_zalog" class="form-control
                                                    @if($errors->has('address_zalog'))
                                                is-invalid
                                                    @endif" value="{{$page->zalogodatel->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="phone_zalog" name="phone_zalog"
                                                   class="form-control
                                                    @if($errors->has('phone_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                счет</label>
                                            <input type="text" id="checking_account_zalog"
                                                   name="checking_account_zalog"
                                                   class="form-control
                                                    @if($errors->has('checking_account_zalog'))
                                                       is-invalid
                                                        @endif"
                                                   value="{{$page->zalogodatel->checking_account}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="inn_zalog" name="inn_zalog"
                                                   class="form-control
                                                    @if($errors->has('inn_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->inn}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="mfo_zalog" name="mfo_zalog"
                                                   class="form-control
                                                    @if($errors->has('mfo_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->mfo}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-bank" class="col-form-label">Банк</label>
                                            <select @if($errors->has('bank_id_zalog'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="bank_id_zalog" name="bank_id_zalog"
                                                    style="width: 100%;" required>
                                                <option>Выберите банк</option>
                                                @foreach($banks as $bank)
                                                    @if($page->zalogodatel->bank_id == $bank->id)
                                                        <option selected
                                                                value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @else
                                                        <option
                                                            value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="oked_zalog" name="oked_zalog"
                                                   class="form-control
                                                    @if($errors->has('oked_zalog'))
                                                       is-invalid
                                                        @endif" value="{{$page->zalogodatel->oked}}">
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
                                            <label for="dogovor-num-strah" class="col-form-label">Номер договора
                                                страхования</label>
                                            <input type="text" id="unique_number" name="unique_number" class="form-control @if($errors->has('unique_number')) is-invalid @endif" value="{{$page->unique_number}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="date_dogovor_strah" class="col-form-label">Дата договора
                                                страхования</label>
                                            <input id="dogovor_zalog_date_to" name="insurance_from" type="date" value="{{$page->insurance_from}}"
                                                   class="form-control @if($errors->has('insurance_from')) is-invalid @endif">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dogovor-num" class="col-form-label">Номер кредитного
                                                договора</label>
                                            <input id="loan_reason" name="credit_dogovor_number" type="text"
                                                   class="form-control @if($errors->has('credit_dogovor_number')) is-invalid @endif" value="{{$page->credit_dogovor_number}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_kredit_dogovor_from">Период кредитного договора</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="credit_insurance_from" name="credit_insurance_from" type="date" value="{{$page->credit_insurance_from}}"
                                                       class="form-control @if($errors->has('credit_insurance_from')) is-invalid @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_kredit_dogovor_to">Период кредитного договора</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="credit_insurance_to" name="credit_insurance_to" type="date" value="{{$page->credit_insurance_to}}"
                                                       class="form-control @if($errors->has('credit_insurance_to')) is-invalid @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_strah_from">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="object_from_date" name="object_from_date" type="date"
                                                       class="form-control @if($errors->has('object_from_date')) is-invalid @endif" value="{{$page->object_from_date}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_strah_to">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="object_to_date" name="object_to_date" type="date"
                                                       class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{$page->object_to_date}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="geographic-zone">Географическая зона:</label>
                                    <input id="loan_reason" name="geo_zone" type="text"
                                           class="form-control @if($errors->has('geo_zone')) is-invalid @endif" value="{{$page->geo_zone}}">
                                </div>
                                <div class="form-group">
                                    <label for="tsel_tc">Цель использования ТС:</label>
                                    <input id="loan_reason" name="loan_reason" type="text"
                                           class="form-control @if($errors->has('loan_reason')) is-invalid @endif" value="{{$page->loan_reason}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведение о тс</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" id="addAutozalogBtn" class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;" >
                                <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                    <table class="table table-hover table-head-fixed" id="empTable1">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Дата выдачи</th>
                                            <th class="text-nowrap">Год выпуска</th>
                                            <th class="text-nowrap">Период действия от</th>
                                            <th class="text-nowrap">Период действия до</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">Марка</th>
                                            <th class="text-nowrap">Модель</th>
                                            <th class="text-nowrap">Модификация</th>
                                            <th class="text-nowrap">Гос. номер</th>
                                            <th class="text-nowrap">Номер тех паспорта</th>
                                            <th class="text-nowrap">Номер двигателя</th>
                                            <th class="text-nowrap">Номер кузова</th>
                                            <th class="text-nowrap">Грузоподмность</th>
                                            <th class="text-nowrap">Страховая стоимость</th>
                                            <th class="text-nowrap">Страховая сумма</th>
                                            <th class="text-nowrap">Страховая премия</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($page->informations as $info)
                                            <tr id="a0">
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{$info->policy_number}}" name="policy_number[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('policy_series.0')) is-invalid @endif" value="{{$info->policy_series}}" name="policy_series[]" required >
                                                </td>
                                                <td>
                                                    <input disabled="" type="date" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('god_vipuska.0')) is-invalid @endif" value="{{$info->god_vipuska}}" name="god_vipuska[]" required>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control @if($errors->has('policy_insurance_from.0')) is-invalid @endif" value="{{$info->policy_insurance_from}}" name="policy_insurance_from[]" required>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control @if($errors->has('policy_insurance_to.0')) is-invalid @endif" value="{{$info->policy_insurance_to}}" name="policy_insurance_to[]" required>
                                                </td>
                                                <td>
                                                    <select class="form-control @if($errors->has('otvet_litso.0')) is-invalid @endif"  id="polise_agents" name="otvet_litso[]" style="width: 100%;" required>
                                                        @foreach($agents as $agent)
                                                            <option value="{{$agent->user_id}}" @if($agent->user_id === $info->otvet_litso)  selected="selected" @endif> {{$agent->name}} {{$agent->surname}} {{$agent->middle_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('marka.0')) is-invalid @endif" value="{{$info->marka}}" name="marka[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('model.0')) is-invalid @endif" value="{{$info->model}}" name="model[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('modification.0')) is-invalid @endif" value="{{$info->modification}}" name="modification[]" required>
                                                </td>


                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('gos_nomer.0')) is-invalid @endif" value="{{$info->gos_nomer}}" name="gos_nomer[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('tex_passport.0')) is-invalid @endif" value="{{$info->tex_passport}}" name="tex_passport[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('number_engine.0')) is-invalid @endif" value="{{$info->number_engine}}" name="number_engine[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('number_kuzov.0')) is-invalid @endif" value="{{$info->number_kuzov}}" name="number_kuzov[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control @if($errors->has('gryzopodemnost.0')) is-invalid @endif" value="{{$info->gryzopodemnost}}" name="gryzopodemnost[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" data-field="value" class="form-control @if($errors->has('strah_stoimost.0')) is-invalid @endif" value="{{$info->strah_stoimost}}" name="strah_stoimost[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0 @if($errors->has('strah_sum.0')) is-invalid @endif" value="{{$info->strah_sum}}" name="strah_sum[]" required>
                                                </td>
                                                <td>
                                                    <input type="text" data-field="premiya" class="form-control insurance_premium-0 @if($errors->has('strah_prem.0')) is-invalid @endif" value="{{$info->strah_prem}}" name="strah_prem[]" required>
                                                </td>
                                                <td>
                                                    <input type="button" onclick="removeProductsFieldRow(0)" value="Удалить" class="btn btn-warning">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tbody>
                                        <tr></tr>
                                        <tr>
                                            <td colspan="15" style="text-align: right"><label class="text-bold">Итого</label></td>
                                            <td><input readonly data-insurance-stoimost type="text" class="form-control overall-sum" /></td>
                                            <td><input readonly data-insurance-sum type="text" class="form-control overall-sum4" /></td>
                                            <td><input readonly data-insurance-award type="text" class="form-control overall-sum3" /></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>При наружном осмотре ТС дефекты и повреждения? </label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($page->defect_image && $page->defect_comment) checked @endif
                                                        onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')"
                                                        type="radio" class="other_insurance-0" name="deffects"
                                                        id="radioSuccess1" @if($page->defect_image == null && $page->defect_comment == null) value="1"
                                                           @else   value="2" @endif>
                                                    <label for="radioSuccess1">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input
                                                        onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)"
                                                        type="radio" class="other_insurance-0" name="deffects"
                                                        id="radioSuccess2" value="0" @if($page->defect_image == null || $page->defect_comment == null) checked
                                                        @endif >
                                                    <label for="radioSuccess2">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess2="" class="col-md-12" @if(!$page->defect_comment || !$page->defect_image) style="display: none;"
                                     @endif >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group other_insurance_info-0">
                                                <label>Комментарий</label>
                                                <input class="form-control @if($errors->has('defect_comment')) is-invalid @endif" type="text" name="defect_comment"
                                                value="{{$page->defect_comment}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group other_insurance_info-0">
                                                <label>Прикрепите фотографии</label>
                                                <input id="defect_image" name="defect_image"
                                                       value="{{$page->defect_image}}"
                                                       type="file" @if($errors->has('defect_image'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                                @if($page->defect_image)  <a
                                                    href="/storage/{{$page->defect_image}}">Скачать</a> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей
                                            анкеты? </label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($page->strtahovka_comment || !empty(old('strtahovka_comment'))) checked @endif
                                                        onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')"
                                                        type="radio" class="other_insurance-0" name="strtahovka"
                                                        id="radioSuccess1-0" @if($page->strtahovka_comment == null) value="1"
                                                           @else   value="2" @endif>
                                                    <label for="radioSuccess1-0">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input
                                                        onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)"
                                                        type="radio" class="other_insurance-0" name="strtahovka"
                                                        id="radioSuccess2-0" value="0" @if($page->strtahovka_comment == null) checked
                                                        @endif>
                                                    <label for="radioSuccess2-0">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-radiosuccess1="" class="form-group other_insurance_info"
                                         @if(!$page->strtahovka_comment) style="display: none;"
                                        @endif>
                                        <label for="strtahovka_info">Комментарий</label>
                                        <input id="strtahovka_info" class="form-control @if($errors->has('strtahovka_comment')) is-invalid @endif" type="text"
                                               name="strtahovka_comment" value="{{$page->strtahovka_comment}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Условия оплаты страховой премии</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="payment-terms-form">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input type="text" id="all-summ" name="insurance_sum_prod" class="form-control @if($errors->has('insurance_sum_prod')) is-invalid @endif"
                                               value="{{$page->insurance_sum}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" class="form-control @if($errors->has('insurance_bonus')) is-invalid @endif"
                                               value="{{$page->insurance_bonus}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" class="form-control @if($errors->has('franchise')) is-invalid @endif"
                                               value="{{$page->franchise}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames"
                                                style="width: 100%; text-align: center">

                                            <option @if($page->insurance_premium_currency) selected
                                                    @endif name="insurance_premium_currency">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" class="form-control payment-schedule @if($errors->has('payment_term')) is-invalid @endif" name="payment_term"
                                                style="width: 100%; text-align: center">
                                            <option value="1" @if($page->payment_term === '1') selected @endif>
                                                Единовременно
                                            </option>
                                            <option value="transh"
                                                    @if($page->payment_term === 'transh') selected @endif>Транш
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control payment-schedule" name="sposob_rascheta"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option value="1" @if($page->sposob_rascheta === '1') selected @endif>
                                                Сумах
                                            </option>
                                            <option value="2" @if($page->sposob_rascheta === '2') selected @endif>Сумах
                                                В ин. валюте
                                            </option>
                                            <option value="3" @if($page->sposob_rascheta === '3') selected @endif>В ин.
                                                валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option value="4" @if($page->sposob_rascheta === '4') selected @endif>В ин.
                                                валюте по курсу ЦБ на день оплаты
                                            </option>
                                            <option value="4" @if($page->sposob_rascheta === '5') selected @endif>В ин.
                                                валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule"
                                 @if($page->payment_term == 1) class="d-none" @endif>
                                <div class="form-group">
                                    <button type="button" id="transh-payment-schedule-button" class="btn btn-primary ">
                                        Добавить
                                    </button>
                                </div>
                                <div class="table-responsive p-0 " style="max-height: 300px;">
                                    <table class="table table-hover table-head-fixed" id="empTable3">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Сумма</th>
                                            <th class="text-nowrap">От</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($page->strahPremiya->count() > 0)
                                            @foreach($page->strahPremiya as $prem)
                                                <tr id="{{$prem->id}}" data-field-number="0">
                                                    <td><input type="text" class="
                                                        @if($errors->has('payment_sum.'.$loop->index))
                                                            is-invalid
                                                        @endif form-control" name="payment_sum[]" value="{{$prem->payment_sum}}">
                                                    </td>
                                                    <td><input type="date"
                                                               class="@if($errors->has('payment_from.'.$loop->index))
                                                                   is-invalid
                                                    @endif form-control" name="payment_from[]" value="{{$prem->payment_from}}">
                                                    </td>
                                                    <td>
                                                        <input type="button" value="Удалить" data-action="delete"
                                                               class="btn btn-warning"
                                                               onclick="removeEl({{$prem->id}})">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input type="text" class="@if($errors->has('payment_sum.*'))
                                                        is-invalid
                                            @endif form-control" name="payment_sum[]" value="">
                                                </td>
                                                <td><input type="date" class="@if($errors->has('payment_from.*'))
                                                        is-invalid
                                                @endif form-control" name="payment_from[]" value="">
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('tarif', 'data-tarif-descr')"
                                           class="form-check-input client-type-radio" type="checkbox" name="tarif"
                                           id="tarif" @if($page->tarif_other) checked @endif @if(!empty(old('tarif'))) checked @endif>
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr
                                     @if(!$page->tarif_other && empty(old('tarif'))) style="display: none" @endif>
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input class="form-control @if($errors->has('tarif_other'))@endif" id="descrTarif" type="number" name="tarif_other"
                                           value="{{$page->tarif_other}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')"
                                           class="form-check-input client-type-radio" type="checkbox" name="preim"
                                           id="preim" @if($page->premiya_other) checked @endif  @if(!empty(old('preim'))) checked @endif>
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr
                                     @if(!$page->premiya_other && empty(old('preim'))) style="display: none" @endif>
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input class="form-control  @if($errors->has('premiya_other'))@endif" id="descrPreim" type="number" name="premiya_other"
                                           value="{{$page->premiya_other}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Загрузка документов</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    @if($page->application_form_file)<a href="/storage/{{$page->application_form_file}}"
                                                                        target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input id="anketa_img" name="application_form_file"
                                               value="{{$page->application_form_file}}"
                                               type="file" @if($errors->has('application_form_file'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->contract_file)<a href="/storage/{{$page->contract_file}}"
                                                                target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input id="dogovor_img" name="contract_file" value="{{$page->contract_file}}"
                                               type="file" @if($errors->has('contract_file'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->policy_file)<a href="/storage/{{$page->policy_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input id="polis_img" name="policy_file" value="{{$page->policy_file}}"
                                               type="file" @if($errors->has('policy_file'))
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
            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
