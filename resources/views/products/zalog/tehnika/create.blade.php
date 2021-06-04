@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-tehnika.store')}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
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
                                                   id="client-type-radio-1" value="individual">
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-2" value="legal">
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
                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
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
                                                        @endif" value="{{old('fio_zalog')}}">
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
                                                    @endif" value="{{old('address_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="phone_zalog" name="phone_zalog"
                                                   class="form-control
                                                    @if($errors->has('phone_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('phone_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                счет</label>
                                            <input type="text" id="checking_account_zalog" name="checking_account_zalog"
                                                   class="form-control
                                                    @if($errors->has('checking_account_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('checking_account_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="inn_zalog" name="inn_zalog"
                                                   class="form-control
                                                    @if($errors->has('inn_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('inn_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="mfo_zalog" name="mfo_zalog"
                                                   class="form-control
                                                    @if($errors->has('mfo_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('mfo_zalog')}}">
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
                                                    @if(old('bank_id_zalog') == $bank->id)
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
                                            <input type="text" id="oked_zalog" name="oked_zalog"
                                                   class="form-control
                                                    @if($errors->has('mfo_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('oked_zalog')}}">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dogovor_num_zalog" class="col-form-label">Номер договора залога</label>
                                    <input type="text" id="zalog_unique_number" name="zalog_unique_number" value="{{old('zalog_unique_number')}}"
                                           class="form-control @if($errors->has('zalog_unique_number')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date_zalog" class="col-form-label">Период договора залога</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input id="dogovor_zalog_date_from" name="dogovor_zalog_date_from" type="date" value="{{old('dogovor_zalog_date_from')}}"
                                           class="form-control @if($errors->has('dogovor_zalog_date_from')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date_zalog" class="col-form-label">Период договора залога</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">до</span>
                                    </div>
                                    <input id="dogovor_zalog_date_to" name="dogovor_zalog_date_to" type="date" value="{{old('dogovor_zalog_date_to')}}"
                                           class="form-control @if($errors->has('dogovor_zalog_date_to')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dogovor_num" class="col-form-label">Номер договора</label>
                                    <input type="text" id="unique_number" name="unique_number" class="form-control @if($errors->has('unique_number')) is-invalid @endif" value="{{old('unique_number')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date" class="col-form-label">Период договора</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input id="dogovor_date_from" name="dogovor_date_from" type="date" class="form-control @if($errors->has('dogovor_date_from')) is-invalid @endif" value="{{old('dogovor_date_from')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="dogovor_date" class="col-form-label">Период договора</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">до</span>
                                    </div>
                                    <input id="dogovor_date_to" name="dogovor_date_to" type="date" class="form-control @if($errors->has('dogovor_date_to')) is-invalid @endif" value="{{old('dogovor_date_to')}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="period_strah_from" class="col-form-label">Период страхования</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>
                                        <input id="object_from_date" name="object_from_date" type="date"
                                               class="form-control @if($errors->has('object_from_date')) is-invalid @endif" value="{{old('object_from_date')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="period_strah_to" class="col-form-label">Период страхования</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>
                                        <input id="object_to_date" name="object_to_date" type="date"
                                               class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{old('object_to_date')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="loan_reason" class="col-form-label">Основание для оценки</label>
                                    <input id="loan_reason" name="loan_reason" type="text"
                                           class="form-control @if($errors->has('loan_reason')) is-invalid @endif" value="{{old('loan_reason')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведения о имуществе</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" id="addProperty" class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" class="product-fields" data-field-number="0">
                                <table data-info-table="" class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Наименование Имущества</th>
                                        <th class="text-nowrap">Местонахождения имущества</th>
                                        <th class="text-nowrap">Дата выдачи</th>
                                        <th class="text-nowrap">Кол-во</th>
                                        <th class="text-nowrap">Единицы измерения</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input required type="text" @if($errors->has('name_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="name_property[]" value="{{old('name_property.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" @if($errors->has('place_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="place_property[]" value="{{old('place_property.0')}}">
                                        </td>
                                        <td>
                                            <input required type="date" @if($errors->has('date_of_issue_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="date_of_issue_property[]" value="{{old('date_of_issue_property.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" @if($errors->has('count_property.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="count_property[]" value="{{old('count_property.0')}}">
                                        </td>
                                        <td>
                                            <select @if($errors->has('units_property.0'))
                                                    class="form-control polises is-invalid"
                                                    @else
                                                    class="form-control polises"
                                                    @endif id="polises" name="units_property[]" style="width: 100%;">
                                                <option selected="selected" value="1">Кв.м</option>
                                                <option value="2">Кв.см</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input required type="text" data-field="value" @if($errors->has('insurance_cost.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="insurance_cost[]" value="{{old('insurance_cost.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" data-field="sum" @if($errors->has('insurance_sum.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="insurance_sum[]" value="{{old('insurance_sum.0')}}">
                                        </td>
                                        <td>
                                            <input required type="text" data-field="premiya" @if($errors->has('insurance_premium.0'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif name="insurance_premium[]" value="{{old('insurance_premium.0')}}">
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="5" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input required readonly data-insurance-stoimost type="text" class="form-control overall-sum" /></td>
                                        <td><input required readonly data-insurance-sum type="text" class="form-control overall-sum4" /></td>
                                        <td><input required readonly data-insurance-award type="text" class="form-control overall-sum3" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие пожарной сигнализации и средств пожаротушения</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')" type="radio" class="other_insurance-0" name="fire_alarm_file"  @if(old('fire_alarm_file')) checked @endif id="radioSuccess1">
                                                <label for="radioSuccess1">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)" type="radio" class="other_insurance-0" name="fire_alarm_file"  id="radioSuccess2" value="0">
                                                <label for="radioSuccess2">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess2="" style="display: none;" class="form-group other_insurance_info-0">
                                    <label>Прикрепите сертификат</label>
                                    <input @if($errors->has('fire_alarm_file'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif type="file" name="fire_alarm_file" value="{{old('fire_alarm_file')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие охранной сигнализации и средств защиты/охраны</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')" type="radio" class="other_insurance-0" @if(old('security_file')) checked @endif name="security_file" id="radioSuccess1-0" >
                                                <label for="radioSuccess1-0">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)" type="radio" class="other_insurance-0"  name="security_file"   id="radioSuccess2-0">
                                                <label for="radioSuccess2-0">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess1="" style="display: none;" class="form-group other_insurance_info">
                                    <label>Прикрепите сертификат</label>
                                    <input @if($errors->has('security_file'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif type="file" name="security_file" value="{{old('security_file')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Условия оплаты страховой премии</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                        <input type="text" id="all-summ" name="insurance_sum_prod" value="{{old('insurance_sum_prod')}}" @if($errors->has('insurance_sum_prod'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" value="{{old('insurance_bonus')}}" @if($errors->has('insurance_bonus'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" value="{{old('franchise')}}" @if($errors->has('franchise'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select @if($errors->has('insurance_premium_currency'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="walletNames" style="width: 100%; text-align: center">
                                            <option selected="selected" value="{{old('insurance_premium_currency')}}" name="insurance_premium_currency">{{old('insurance_premium_currency', "UZS")}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition"  @if($errors->has('payment_term'))
                                        class="form-control is-invalid payment-schedule"
                                                @else
                                                class="form-control payment-schedule"
                                                @endif name="payment_term" style="width: 100%; text-align: center">
                                            <option value="1">Единовременно</option>
                                            <option value="transh">Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select @if($errors->has('payment_term'))
                                                class="form-control is-invalid payment-schedule"
                                                @else
                                                class="form-control payment-schedule"
                                                @endif name="payment_term" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1" @if(old('payment_term') === "1") selected @endif>Сумах</option>
                                            <option value="2" @if(old('payment_term') === "2") selected @endif>Сумах В ин. валюте</option>
                                            <option value="3" @if(old('payment_term') === "3") selected @endif>В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option value="4" @if(old('payment_term') === "4") selected @endif>В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="5" @if(old('payment_term') === "5") selected @endif>В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule" class="d-none">
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
                                        <tr id="payment-term-tr-0" data-field-number="0">
                                            <td><input type="text" @if($errors->has('payment_sum.0'))
                                                class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif name="payment_sum[]" value="{{old('payment_sum.0')}}"></td>
                                            <td><input type="date" @if($errors->has('payment_from.0'))
                                                class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif name="payment_from[]" value="{{old('payment_from.0')}}">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="tarif" id="tarif">
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr style="display: none">
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input @if($errors->has('tarif_other'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif id="descrTarif" type="number" name="tarif_other" value="{{old('tarif_other')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')" class="form-check-input client-type-radio" type="checkbox" name="preim" id="preim">
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr style="display: none">
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input @if($errors->has('premiya_other'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif id="descrPreim" type="number" name="premiya_other" value="{{old('premiya_other')}}">
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input  id="anketa_img" name="application_form_file" value="{{old('application_form_file')}}"
                                                type="file" @if($errors->has('application_form_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input  id="dogovor_img" name="contract_file" value="{{old('contract_file')}}"
                                                type="file" @if($errors->has('contract_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input  id="polis_img" name="policy_file" value="{{old('policy_file')}}"
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
