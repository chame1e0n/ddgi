@extends('layouts.index')

@section('content')
    <form action="{{route('microzaym.store')}}" method="post" enctype="multipart/form-data" id="mainFormKasko">
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                            <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-1" value="individual">
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-2" value="legal">
                                            <label for="client-type-radio-2">юр. лицо</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2" name="product_id" style="width: 100%;">
                                    <option selected="selected">говно</option>
                                    <option selected="selected">говно 2</option>
                                    <option value="1">asdc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-insurance">
                        <div class="card-header">
                            <h3 class="card-title">Общие сведения</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-name" class="col-form-label">Наименования страхователя</label>
                                        <input type="text" id="insurer-name" name="fio_insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Адрес страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-tel" name="tel_insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address_schet" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-inn" name="inn_insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="insurer-bank" name="bank_insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-okonh" name="okonh_insurer" class="form-control">
                                    </div>
                                </div>
                            </div>
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
                                                    <label for="insurer-name" class="col-form-label">Наименования заемщика</label>
                                                    <input type="text" id="insurer-name" name="fio_insured" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Адрес заемщика</label>
                                                    <input type="text" id="beneficiary-address" name="address_beneficiary" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                    <input type="text" id="beneficiary-tel" name="tel_beneficiary" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                    <input type="text" id="beneficiary-schet" name="beneficiary_schet" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input type="text" id="beneficiary-inn" name="inn_beneficiary" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input type="text" id="beneficiary-mfo" name="mfo_beneficiary" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                                    <input type="text" id="beneficiary-bank" name="bank_beneficiary" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                    <input type="text" id="beneficiary-okonh" name="oked_beneficiary" class="form-control">
                                                </div>
                                            </div>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dogovor_num" class="col-form-label">Номер договора страхования</label>
                                                <input type="text" id="dogovor_num" name="dogovor_num" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_dogovor_strah" class="col-form-label">Дата договора страхования </label>
                                            <input id="date_dogovor_strah" name="date_dogovor_strah" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dogovor_num" class="col-form-label">Номер договора страхования</label>
                                            <input type="text" id="dogovor_num" name="credit_dogovor_num" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_kredit_dogovor" class="col-form-label">Дата кредитного договора</label>
                                            <input id="date_kredit_dogovor" name="date_kredit_dogovor" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_mycrozaim_from" class="col-form-label">Срок микрозайма от</label>
                                            <input id="date_mycrozaim_from" name="term_from" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_mycrozaim_to" class="col-form-label">Срок микрозайма до</label>
                                            <input id="date_mycrozaim_to" name="term_to" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="period_expect_from" class="col-form-label">Период ожидания от</label>
                                            <input id="period_expect_from" name="period_expect_from" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="period_expect_to" class="col-form-label">Период ожидания до</label>
                                            <input id="period_expect_to" name="period_expect_to" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mycrozaim_summ" class="col-form-label">Сумма микрозайма</label>
                                            <input type="text" id="mycrozaim_summ" name="loan_sum" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mycrozaim_summ" class="col-form-label">Цель получения микрозайма</label>
                                            <input type="text" id="mycrozaim_summ" name="loan_reason" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="period_expect_from" class="col-form-label">Срок действия договора страхования</label>
                                            <input id="period_expect_from" name="period_action_from" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Срок действия договора страхования</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                        </div>
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
                                        <input type="text" id="all-summ" name="insurance_sum" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames" style="width: 100%; text-align: center">
                                            <option selected="selected" name="insurance_premium_currency">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" class="form-control payment-schedule" name="payment_term" style="width: 100%; text-align: center">
                                            <option value="1">Единовременно</option>
                                            <option value="transh">Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control payment-schedule" name="way_of_calculation" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1">Сумах</option>
                                            <option value="2">Сумах В ин. валюте</option>
                                            <option value="3">В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="4">В ин. валюте по фиксированному ЦБ на день оплаты
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
                                            <td><input type="text" class="form-control" name="payment_sum_main"></td>
                                            <td><input type="date" class="form-control" name="payment_from_main">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" value="tariff" type="checkbox" name="tariff" id="tarif">
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr style="display: none">
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input class="form-control" name="tariff_other" id="descrTarif" type="number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')" class="form-check-input client-type-radio" value="preim" type="checkbox" name="preim" id="preim">
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr style="display: none">
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input class="form-control" name="premiya_other" id="descrPreim" type="number">
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
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <input type="text" id="polis-series" name="policy_series" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="policy_insurance_from" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="otvet_litso" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}" selected="selected">{{$agent->name}}</option>
                                                @endforeach
                                            </select>
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
                                        <input type="file" id="geographic-zone" name="application_form_file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="contract_file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="policy_file" class="form-control">
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
    <script src="/assets/custom/js/form/form-actions.js"></script>
@endsection