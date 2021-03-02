@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('tamojenniy-sklad.update', $bonded->id) }}" id="mainFormKasko">
        @csrf
        @method('PUT')
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
                                    @if($bonded->type == "individual")
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio"
                                                       id="client-type-radio-1" value="individual" checked>
                                                <label for="client-type-radio-1">физ. лицо</label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio"
                                                       id="client-type-radio-2" value="legal" checked>
                                                <label for="client-type-radio-2" >юр. лицо</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2"
                                        style="width: 100%;" readonly="true">
                                    <option value="1">{{ $bonded->product->name }}</option>
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                                        <input type="text" id="insurer-name" name="fio_insurer" value="{{ $bonded->policyHolder->FIO }}" class="form-control"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес
                                            страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer" value="{{ $bonded->policyHolder->address }}"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-tel" name="tel_insurer" class="form-control" value="{{ $bonded->policyHolder->phone_number }}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address_schet" class="form-control" value="{{ $bonded->policyHolder->checking_account }}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-inn" name="inn_insurer" class="form-control" value="{{ $bonded->policyHolder->inn }}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer" class="form-control" value="{{ $bonded->policyHolder->mfo }}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <select class="form-control bank" id="insurer_bank" name="bank_insurer"
                                                style="width: 100%;" required>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->id }}" @if($bank->id == $bonded->policyHolder->bank_id) selected @endif>{{ $bank->name }}</option>
                                            @endforeach
                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-okonh" name="okonh_insurer" class="form-control" value="{{ $bonded->policyHolder->okonx }}"
                                               required>
                                    </div>
                                </div>
                            </div>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">ФИО
                                                        выгодоприобретателя</label>
                                                    <input type="text" id="beneficiary-name" name="fio_beneficiary" value="{{ $bonded->policyBeneficiaries->FIO }}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Юр адрес
                                                        выгодоприобретателя</label>
                                                    <input type="text" id="beneficiary-address" value="{{ $bonded->policyBeneficiaries->address }}"
                                                           name="address_beneficiary" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                    <input type="text" id="beneficiary-tel" name="tel_beneficiary" value="{{ $bonded->policyBeneficiaries->phone_number }}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                        счет</label>
                                                    <input type="text" id="beneficiary-schet" name="beneficiary_schet" value="{{ $bonded->policyBeneficiaries->checking_account }}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input type="text" id="beneficiary-inn" name="inn_beneficiary" value="{{ $bonded->policyBeneficiaries->inn }}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input type="text" id="beneficiary-mfo" name="mfo_beneficiary" value="{{ $bonded->policyBeneficiaries->mfo }}"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="insurer-bank" class="col-form-label">Банк</label>
                                                    <select class="form-control bank" id="insurer-bank"
                                                            name="bank_beneficiary"
                                                            style="width: 100%;" required>
                                                        @foreach($banks as $bank)
                                                            <option value="{{ $bank->id }}" @if($bank->id == $bonded->policyBeneficiaries->bank_id) selected @endif>{{ $bank->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                    <input type="text" id="beneficiary-okonh" name="okonh_beneficiary" value="{{ $bonded->policyBeneficiaries->okonx }}"
                                                           class="form-control" required>
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Период страхования от</span>
                                        </div>
                                        <input id="insurance_from" name="insurance_from" type="date" value="{{ $bonded->from_date }}"
                                               class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Период страхования до</span>
                                        </div>
                                        <input id="insurance_to" name="insurance_to" type="date" class="form-control" value="{{ $bonded->to_date }}"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="geographic-zone">Объём таможенной площади</label>
                                    <input type="text" id="geographic-zone" name="volume" class="form-control" value="{{ $bonded->volume }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="obem">Объем товара на складе</label>
                                    <select id="obem" class="form-control select2" name="volume_measure"  required>
                                        <option value="litr" @if($bonded->volume_measure == "litr") selected @endif>литр</option>
                                        <option value="tonna" @if($bonded->volume_measure == "tonna") selected @endif>тонна</option>
                                        <option value="shtuka" @if($bonded->volume_measure == "shtuka") selected @endif>штука</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="summ-tovar">Общая стоимость товара на складе</label>
                                    <input type="text" id="summ-tovar" name="total_price" class="form-control" value="{{ $bonded->total_price }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="period-sklad">Период нахождения товара на данном складе</label>
                                    <input id="period-sklad" name="stock_date" type="date" class="form-control" value="{{ $bonded->stock_date }}"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Общая страховая сумма</label>
                                        <input type="text" id="all-summ" name="total_insured_price" value="{{ $bonded->total_insured_price }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="summ-1">Страховая сумма для закрытого склада с общим объемом</label>
                                        <input type="text" id="summ-1" name="total_insured_closed_stock_price" value="{{ $bonded->total_insured_closed_stock_price }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="summ-2">Страховая сумма для открытого склада с общим
                                            площадью</label>
                                        <input type="text" id="summ-2" name="total_insured_open_stock_price" value="{{ $bonded->total_insured_open_stock_price }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input type="text" id="geographic-zone" name="insurance_premium" value="{{ $bonded->insurance_premium }}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="polises">Валюта взаиморасчетов</label>
                                    <select class="form-control polises" id="polises" name="settlement_currency"
                                            style="width: 100%;">
                                        <option selected="selected">UZS</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="polises">Условия оплаты страховой премии</label>
                                    <select class="form-control polises" id="polises" name="premium_terms"
                                            style="width: 100%;">
                                        <option selected="selected">Единовременная</option>
                                    </select>
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
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <select class="form-control polises" id="polis-series"
                                                    name="policy_series_id"
                                                    style="width: 100%;" required>
                                                <option></option>
                                                @foreach($policySeries as $series)
                                                    <option value="{{ $series->id }}" @if($series->id == $bonded->bondedPolicyInformations->policy_series_id) selected @endif>{{ $series->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="from_date_info" type="date" value="{{ $bonded->bondedPolicyInformations->from_date }}"
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="litso"
                                                    style="width: 100%;" required>
                                                <option></option>
                                                @foreach($agents as $agent)
                                                    <option
                                                        value="{{ $agent->user_id }}" @if($agent->user_id == $bonded->bondedPolicyInformations->user_id) selected @endif>{{ $agent->surname }}{{ $agent->name }}{{ $agent->middle_name }}</option>
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
