@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-imushestvo.update', $page->id)}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
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
                @include('products.select')
                @include('errors.errors')

                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Выгодоприобретатель</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                            <input required value="{{$page->policyBeneficiaries->FIO}}" type="text"
                                                   id="beneficiary-name" name="fio_beneficiary"
                                                   @if($errors->has('fio_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес
                                                выгодоприобретателя</label>
                                            <input required value="{{$page->policyBeneficiaries->address}}" type="text"
                                                   id="beneficiary-address"
                                                   name="address_beneficiary"
                                                   @if($errors->has('address_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input required value="{{$page->policyBeneficiaries->phone_number}}" type="text"
                                                   id="beneficiary-tel" name="tel_beneficiary"
                                                   @if($errors->has('tel_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                            <input required value="{{$page->policyBeneficiaries->checking_account}}" type="text" id="beneficiary_schet"
                                                   name="beneficiary_schet"
                                                   @if($errors->has('beneficiary_schet'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required  value="{{$page->policyBeneficiaries->checking_account}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input required value="{{$page->policyBeneficiaries->inn}}" type="number" id="inn_beneficiary"
                                                   name="inn_beneficiary"
                                                   @if($errors->has('inn_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input required value="{{$page->policyBeneficiaries->mfo}}" type="text" id="mfo_beneficiary"
                                                   name="mfo_beneficiary"
                                                   @if($errors->has('mfo_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
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
                                            <input required value="{{$page->policyBeneficiaries->oked}}" type="text" id="oked_beneficiary"
                                                   name="oked_beneficiary"
                                                   @if($errors->has('oked_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
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
                                                <label for="dogovor-lizing-num" class="col-form-label">Договора лизинга №</label>
                                                <input required type="text" id="dogovor-lizing-num" name="dogovor_lizing_num" class="form-control" value="{{$page->dogovor_lizing_num}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Период</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input required id="insurance_from" name="insurance_from" type="date" class="form-control" value="{{$page->insurance_from}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Период</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input required id="insurance_to" name="insurance_to" type="date" class="form-control" value="{{$page->insurance_to}}">
                                            </div>
                                        </div>
                                    </div>
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
                                        <th class="text-nowrap">Кол-во шт.</th>
                                        <th class="text-nowrap">Единицы измерения</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($page->infos->count() > 0)
                                        @foreach($page->infos as $info)
                                            <tr id="{{$info->id}}">
                                                <td>
                                                    <input required type="text" class="form-control" name="name_property[]" value="{{$info->name_property}}">
                                                </td>
                                                <td>
                                                    <input required type="text" class="form-control" name="place_property[]" value="{{$info->place_property}}">
                                                </td>
                                                <td>
                                                    <input required type="date" class="form-control"
                                                           name="date_of_issue_property[]" value="{{$info->date_of_issue_property}}">
                                                </td>
                                                <td>
                                                    <input required type="text" class="form-control" name="count_property[]" value="{{$info->count_property}}">
                                                </td>
                                                <td>
                                                    <select required class="form-control polises" id="polises"
                                                            name="units_property[]" style="width: 100%;">
                                                        <option  value="1" @if($info->units_property == 1) selected="selected" @endif>Кв.м</option>
                                                        <option value="2" @if($info->units_property == 2) selected="selected" @endif>Кв.см</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input required type="text" data-field="value" class="form-control"
                                                           name="insurance_cost[]" value="{{$info->insurance_cost}}">
                                                </td>
                                                <td>
                                                    <input required type="text" data-field="sum" class="form-control"
                                                           name="insurance_sum[]" value="{{$info->insurance_sum}}">
                                                </td>
                                                <td>
                                                    <input required type="text" data-field="premiya" class="form-control"
                                                           name="insurance_premium[]" value="{{$info->insurance_premium}}">
                                                </td>
                                                <td class="form-group">
                                                    <input required onclick="removeAndCalc({{$info->id}})" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
                                                </td>
                                            </tr>

                                        @endforeach
                                        @else
                                        <tr>
                                            <td>
                                                <input required type="text" class="form-control" name="name_property[]">
                                            </td>
                                            <td>
                                                <input required type="text" class="form-control" name="place_property[]">
                                            </td>
                                            <td>
                                                <input required type="date" class="form-control"
                                                       name="date_of_issue_property[]">
                                            </td>
                                            <td>
                                                <input required type="text" class="form-control" name="count_property[]">
                                            </td>
                                            <td>
                                                <select required class="form-control polises" id="polises"
                                                        name="units_property[]" style="width: 100%;">
                                                    <option selected="selected" value="1">Кв.м</option>
                                                    <option value="2">Кв.см</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input required type="text" data-field="value" class="form-control"
                                                       name="insurance_cost[]">
                                            </td>
                                            <td>
                                                <input required type="text" data-field="sum" class="form-control"
                                                       name="insurance_sum[]">
                                            </td>
                                            <td>
                                                <input required type="text" data-field="premiya" class="form-control"
                                                       name="insurance_premium[]">
                                            </td>
                                        </tr>
                                    @endif
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
                        <div class="col-md-12">
                            <div class="icheck-success ">
                                <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="plans" id="tarif"
                                @if( $page->plans) checked @endif>
                                <label class="form-check-label" for="tarif">Тариф</label>
                            </div>
                            <!-- TODO: Блок должен находится в скрытом состоянии
                            отображаться только тогда, когда выбран checkbox "Тариф"
                            -->
                            <div class="form-group" data-tarif-descr @if( !$page->plans) style="display: none" @endif>
                                <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                <input class="
                                @if($errors->has('plans_percent'))
                                    is-invalid
                                    @endif form-control" id="descrTarif" type="number" name="plans_percent" value="{{$page->plans_percent}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Общая страховая стоимость </label>
                                        <input required type="text" id="geographic-zone" name="total_insurance_cost" class="form-control"  value="{{$page->total_insurance_cost}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Ответственное лицо</label>
                                        <select @if($errors->has('zalog_otvet_litso'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="zalog_otvet_litso" name="zalog_otvet_litso"
                                                style="width: 100%;" required>
                                            <option></option>
                                            @foreach($agents as $agent)
                                                <option @if($page->zalog_otvet_litso == $agent->id) selected
                                                        @endif value="{{ $agent->id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Дата выдачи страхового полиса (клиенту)</label>
                                        <input required type="date" class="form-control" name="date_of_issue_police" value="{{$page->date_of_issue_police}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="geographic-zone">Серийный номер полиса страхования</label>
                                            <select class="@if($errors->has('policy_series_id')) is-invalid @endif  form-control polises" id="policy_series_id"
                                                    name="policy_series_id"
                                                    style="width: 100%;" required>
                                                <option value="0"></option>
                                                @foreach($policySeries as $series)
                                                    <option @if($page->policy_series_id == $series->id) selected
                                                            @endif value="{{ $series->id }}">{{ $series->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Место страхования:</label>
                                        <input required type="text" id="place_of_insurance" name="place_of_insurance" class="form-control" value="{{$page->place_of_insurance}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="currency_of_mutual">Валюта взаиморасчетов</label>
                                    <select required class="form-control polises" id="walletNames" name="currency_of_mutual" style="width: 100%;">
                                        <option selected="selected" value="{{$page->currency_of_mutual}}">{{$page->currency_of_mutual}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="summ-1">Страховая сумма для закрытого склада с общим объемом</label>
                                        <input required type="text" id="summ-1" name="insurance_amount_for_closed" class="form-control" value="{{$page->insurance_amount_for_closed}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="summ-2">Страховая сумма для открытого склада с общим площадью</label>
                                        <input required type="text" id="summ-2" name="insurance_amount_for_open" class="form-control" value="{{$page->insurance_amount_for_open}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input required type="text" id="geographic-zone" name="strahovaya_purpose_1" class="form-control" value="{{$page->strahovaya_purpose_1}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="polises">Условия оплаты страховой премии</label>
                                    <select class="form-control polises" id="polises" name="poryadok_oplaty_premii_1" style="width: 100%;">
                                        <option selected="selected" value="1">Единовременная</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-info" id="clone-beneficiary">
                            <div class="card-header">
                                <h3 class="card-title">Франшиза</h3>
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
                                            <label for="summ-1">% от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                            <input required type="text" id="summ-1" name="franshiza_1" class="form-control"  value="{{$page->franshiza_1}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="summ-2">% от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                            <input required type="text" id="summ-2" name="franshiza_2" class="form-control" value="{{$page->franshiza_2}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="geographic-zone">% от страховой суммы по другим рискам по каждому <br> убытку и/или по всем убыткам в результате каждого <br> страхового случая</label>
                                            <input required type="text" id="geographic-zone" name="franshiza_3" class="form-control" value="{{$page->franshiza_3}}">
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
                                        <input required id="strahovaya_sum" name="strahovaya_sum" value="{{$page->strahovaya_sum}}"
                                               type="number" @if($errors->has('strahovaya_sum'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input required id="strahovaya_purpose" name="strahovaya_purpose" value="{{$page->strahovaya_purpose}}"
                                               type="number" @if($errors->has('strahovaya_purpose'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Франшиза</label>
                                        <input required id="franshiza" name="franshiza" value="{{$page->franshiza}}"
                                               type="text" @if($errors->has('franshiza'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select name="currencies" @if($errors->has('currencies'))
                                        class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="walletNames" style="width: 100%; text-align: center" required>
                                            <option selected="selected" value="{{$page->currencies}}">{{$page->currencies}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select required id="condition" class="form-control
                                            @if($errors->has('poryadok_oplaty_premii'))
                                            payment-schedule
                                            @endif" name="poryadok_oplaty_premii" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->poryadok_oplaty_premii == 1) selected @endif>Единовременно</option>
                                            <option value="transh" @if($page->poryadok_oplaty_premii == 'transh') selected @endif>Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select required class="form-control payment-schedule" name="sposob_rascheta" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            @foreach(config('app.sposob_rascheta') as $key => $sposob)
                                                <option value="{{$key}}" @if($page->sposob_rascheta == $key) selected @endif>{{$sposob}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule" @if($page->poryadok_oplaty_premii == 1) class="d-none" @endif>
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
                                                <td><input type="text" class="@if($errors->has('payment_sum.'.$loop->index))
                                                        is-invalid
                                                        @endif form-control" name="payment_sum[]" value="{{$prem->prem_sum}}">
                                                </td>
                                                <td><input type="date" class="@if($errors->has('payment_from.'.$loop->index))
                                                        is-invalid
                                                        @endif form-control" name="payment_from[]" value="{{$prem->prem_from}}">
                                                </td>
                                                <td>
                                                    <input type="button" value="Удалить" data-action="delete" class="btn btn-warning" onclick="removeEl({{$prem->id}})">
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса страхования</label>
                                            <select class="@if($errors->has('serial_number_policy')) is-invalid @endif  form-control polises" id="serial_number_policy"
                                                    name="serial_number_policy"
                                                    style="width: 100%;" required>
                                                <option value="0"></option>
                                                @foreach($policySeries as $series)
                                                    <option @if($page->serial_number_policy == $series->id) selected
                                                            @endif value="{{ $series->id }}">{{ $series->code }}</option>
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
                                            <input required id="date_issue_policy" name="date_issue_policy" value="{{$page->date_issue_policy}}"
                                                   type="date" @if($errors->has('date_issue_policy'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="otvet-litso" class="col-form-label">Ответственное лицо</label>
                                            <select @if($errors->has('litso'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="otvet-litso" name="litso"
                                                    style="width: 100%;" required>
                                                <option></option>
                                                @foreach($agents as $agent)
                                                    <option @if($page->otvet_litso == $agent->id) selected
                                                            @endif value="{{ $agent->id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                @endforeach
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
                                        @if($page->anketa_img != null)
                                            <embed src="/storage/{{$page->anketa_img}}" width="250" height="250" />
                                        @endif
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input  id="anketa_img" name="anketa_img" value="{{old('anketa_img')}}"
                                               type="file" @if($errors->has('anketa_img'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @if($page->dogovor_img != null)
                                        <embed src="/storage/{{$page->dogovor_img}}" width="250" height="250" />
                                        @endif
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input  id="dogovor_img" name="dogovor_img" value="{{old('dogovor_img')}}"
                                               type="file" @if($errors->has('dogovor_img'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @if($page->polis_img != null)
                                            <embed src="/storage/{{$page->polis_img}}" width="250" height="250" />
                                        @endif
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input  id="polis_img" name="polis_img" value="{{old('polis_img')}}"
                                               type="file" @if($errors->has('polis_img'))
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
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Копии документов</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Паспорт</label>
                                            @if($page->copy_passport != null)
                                            <embed src="/storage/{{$page->copy_passport}}" alt="Паспорт" width="250" height="250">
                                            @endif
                                            <input  id="copy_passport" name="copy_passport" value="{{old('copy_passport')}}"
                                                   type="file" @if($errors->has('copy_passport'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            @if($page->copy_dogovor != null)
                                            <embed src="/storage/{{$page->copy_dogovor}}" alt="Договор" width="250" height="250">
                                            @endif
                                            <input  id="copy_dogovor" name="copy_dogovor" value="{{old('copy_dogovor')}}"
                                                   type="file" @if($errors->has('copy_dogovor'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Справки</label>
                                            @if($page->copy_spravki != null)
                                            <embed src="/storage/{{$page->copy_spravki}}" alt="Справки" width="250" height="250">
                                            @endif
                                            <input  id="copy_spravki" name="copy_spravki" value="{{old('copy_spravki')}}"
                                                   type="file" @if($errors->has('copy_spravki'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Другие</label>
                                            @if($page->copy_drugie != null)
                                            <embed src="/storage/{{$page->copy_drugie}}" alt="Другие" width="250" height="250">
                                            @endif
                                            <input id="copy_drugie" name="copy_drugie" value="{{old('copy_drugie')}}"
                                                   type="file" @if($errors->has('copy_drugie'))
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
