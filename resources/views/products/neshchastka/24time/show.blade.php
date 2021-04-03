@extends('layouts.index')
@section('content')
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
                                        <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                                        <input type="text" id="insurer-name" name="fio_insurer" value="{{$page->policyHolders->FIO}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Адрес
                                            страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer" value="{{$page->policyHolders->address}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-tel" name="tel_insurer" value="{{$page->policyHolders->phone_number}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address_schet" value="{{$page->policyHolders->checking_account}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">Вид деятельности</label>
                                        <input type="text" id="insurer-inn" name="vid_deyatelnosti" value="{{$page->policyHolders->vid_deyatelnosti}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer" value="{{$page->policyHolders->mfo}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bank_insurer" class="col-form-label">Банк</label>
                                        <select @if($errors->has('bank_insurer'))
                                                readonly class="form-control is-invalid"
                                                @else
                                                required readonly class="form-control"
                                                @endif id="bank_insurer" name="bank_insurer"
                                                style="width: 100%;"   required>
                                            <option>Выберите банк</option>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->id }}" @if($bank->id == $page->policyHolders->bank_id) selected @endif>{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-okonh" name="inn_insurer" value="{{$page->policyHolders->inn}}" required readonly class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="insurer-okonh" name="okonx" value="{{$page->policyHolders->okonx}}" required readonly class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-okonh" name="oked" value="{{$page->policyHolders->oked}}" required readonly class="form-control">
                                    </div>
                                </div>
                            </div>
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
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">ФИО
                                                        выгодоприобретателя</label>
                                                    <input type="text" id="beneficiary-name" name="fio_beneficiary" value="{{$page->PolicyBeneficiaries->FIO}}" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Юр адрес
                                                        выгодоприобретателя</label>
                                                    <input type="text" id="beneficiary-address" name="address_beneficiary" value="{{$page->PolicyBeneficiaries->address}}" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                    <input type="text" id="beneficiary-okonh" name="oked_beneficiary" value="{{$page->PolicyBeneficiaries->oked}}" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                    <input type="text" id="beneficiary-tel" name="tel_beneficiary" value="{{$page->PolicyBeneficiaries->phone_number}}" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                        счет</label>
                                                    <input type="text" id="beneficiary-schet" name="beneficiary_schet" value="{{$page->PolicyBeneficiaries->checking_account}}" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input type="text" id="beneficiary-inn" name="inn_beneficiary" value="{{$page->PolicyBeneficiaries->inn}}" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input type="text" id="beneficiary-mfo" name="mfo_beneficiary" value="{{$page->PolicyBeneficiaries->mfo}}" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="bank_beneficiary" class="col-form-label">Банк</label>
                                                    <select @if($errors->has('bank_beneficiary'))
                                                            readonly class="form-control is-invalid"
                                                            @else
                                                            required readonly class="form-control"
                                                            @endif id="bank_beneficiary" name="bank_beneficiary"
                                                            style="width: 100%;"   required>
                                                        <option>Выберите банк</option>
                                                        @foreach($banks as $bank)
                                                            <option value="{{ $bank->id }}" @if($bank->id == $page->PolicyBeneficiaries->bank_id) selected @endif>{{ $bank->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                                    <input type="text" id="beneficiary-okonh" name="okonx_beneficiary" value="{{$page->PolicyBeneficiaries->okonx}}" required readonly class="form-control">
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
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="insurance_from">Период страхования</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">с</span>
                                                        </div>
                                                        <input id="insurance_from" name="insurance_from" type="date" value="{{$page->insurance_from}}" required readonly class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3" style="margin-top: 33px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="insurance_to" name="insurance_to" type="date" value="{{$page->insurance_to}}" required readonly class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="geographic-zone">Географическая зона:</label>
                                            <input type="text" id="geographic-zone" name="geo_zone" value="{{$page->geo_zone}}" required readonly class="form-control">
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
                            <h3 class="card-title">Сведение о ТС</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" id="addTc" class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                <div id="product-fields" class="product-fields" data-field-number="0">
                                    <table data-info-table class="table table-hover table-head-fixed" id="empTable">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Дата выдачи</th>
                                            <th class="text-nowrap">Хронические заболевании</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">ФИО застрахованного лица</th>
                                            <th class="text-nowrap">Дата рождения</th>
                                            <th class="text-nowrap">Серия и номер пасспорта</th>
                                            <th class="text-nowrap">Период действия полиса</th>
                                            <th class="text-nowrap">Выгодоприобритатель</th>
                                            <th class="text-nowrap">Страховая сумма</th>
                                            <th class="text-nowrap">Страховая премия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($page->policyInformations as $info)
                                            <tr id="0.7842109002522502">
                                                <td>
                                                    <input type="text" readonly class="form-control" value="{{$info->period_polis}}" name="period_polis[]">
                                                </td>
                                                <td>
                                                    <input type="text" readonly class="form-control" value="{{$info->period_polis}}" name="polis_id[]">
                                                </td>
                                                <td>
                                                    <input disabled="" type="date" readonly class="form-control">
                                                </td>
                                                <td>
                                                    <select readonly class="form-control polises" id="polises"  name="polis_agent[]" style="width: 100%;">
                                                        <option selected="selected"></option>
                                                        <option value="1" @if($info->polis_agent == 1) selected @endif>Да</option>
                                                        <option value="2" @if($info->polis_agent == 2) selected @endif>Нет</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select readonly class="form-control" id="agents" name="agents[]" style="width: 100%;">
                                                        <option selected="selected"></option>
                                                        <option value="1" @if($info->agents == 1) selected @endif>Да</option>
                                                        <option value="2" @if($info->agents == 2) selected @endif>Нет</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" readonly class="form-control" value="{{$info->polis_model}}" name="polis_model[]">
                                                </td>
                                                <td>
                                                    <input type="text" readonly class="form-control" value="{{$info->polis_modification}}" name="polis_modification[]">
                                                </td>
                                                <td>
                                                    <input type="text" readonly class="form-control" value="{{$info->polis_gos_num}}" name="polis_gos_num[]">
                                                </td>
                                                <td>
                                                    <input type="text" readonly class="form-control" value="{{$info->polis_teh_passport}}" name="polis_teh_passport[]">
                                                </td>
                                                <td>
                                                    <input type="text" readonly class="form-control" value="{{$info->polis_num_engine}}" name="polis_num_engine[]">
                                                </td>
                                                <td>
                                                    <input data-field="value" type="text" readonly class="form-control" value="{{$info->polis_num_body}}" name="polis_num_body[]">
                                                </td>
                                                <td>
                                                    <input data-field="sum" type="text" readonly class="form-control" value="{{$info->polis_payload}}" name="polis_payload[]">
                                                </td>
                                                <td class="form-group">
                                                    <input onclick="removeAndCalc(0.7842109002522502)" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
                                                </td>
                                            </tr>
                                            <tr>
                                                @endforeach
                                                <td colspan="10" style="text-align: right"><label class="text-bold">Итого</label></td>
                                                <td><input data-insurance-stoimost readonly type="text" readonly class="form-control overall-sum4" />
                                                </td>
                                                <td><input data-insurance-sum readonly type="text" readonly class="form-control overall-sum3" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--                            <div class="col-md-12">--}}
                            {{--                                <div class="icheck-success ">--}}
                            {{--                                    <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="tarif" id="tarif">--}}
                            {{--                                    <label class="form-check-label" for="tarif">Тариф</label>--}}
                            {{--                                </div>--}}
                            {{--                                <!-- TODO: Блок должен находится в скрытом состоянии--}}
                            {{--                                отображаться только тогда, когда выбран checkbox "Тариф"--}}
                            {{--                                -->--}}
                            {{--                                <div class="form-group" data-tarif-descr style="display: none">--}}
                            {{--                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>--}}
                            {{--                                    <input value={{$page->}} readonly required class="form-control" id="descrTarif" type="number">--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
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
                                        <input type="text" id="all-summ" name="strah_sum" value="{{$page->strah_sum}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="strah_prem" value="{{$page->strah_prem}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franshiza" value="{{$page->franshiza}}" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select name="insurance_premium_currency"  required readonly class="form-control" id="walletNames" style="width: 100%; text-align: center">
                                            <option selected="selected" value="{{$page->insurance_premium_currency}}">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" readonly class="form-control payment-schedule" name="payment_term" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->payment_term == '1') selected @endif>Единовременно</option>
                                            <option value="transh" @if($page->payment_term == 'transh') selected @endif>Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select readonly class="form-control payment-schedule" name="sposob_rascheta" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->sposob_rascheta == '1') selected @endif>Сумах</option>
                                            <option value="2" @if($page->sposob_rascheta == '2') selected @endif>Сумах В ин. валюте</option>
                                            <option value="3" @if($page->sposob_rascheta == '3') selected @endif>В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option value="4" @if($page->sposob_rascheta == '4') selected @endif>В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="5" @if($page->sposob_rascheta == '5') selected @endif>В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule" @if(!$page->StrahPremiya)class="d-none" @endif>
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
                                        @foreach($page->StrahPremiya as $prem)
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input type="text" readonly class="form-control" value="{{$prem->payment_sum}}" name="payment_sum[]"></td>
                                                <td><input type="date" readonly class="form-control" value="{{$prem->payment_from}}" name="payment_from[]">
                                                </td>
                                            </tr>
                                        @endforeach
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <input type="text" id="polis-series" name="polis_series" value="{{$page->polis_series}}" required readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="data_vidachi_polisa" type="date" value="{{$page->data_vidachi_polisa}}" required readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                            <select readonly class="form-control polises"  required id="otvet-litso" name="otvet_litso" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option @if($page->otvet_litso == $agent->user_id) selected
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
                                        <input type="file" id="geographic-zone" name="geo_zone" value="" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="geo_zone" value="" required readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="geo_zone" value="" required readonly class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </div>
@endsection
@section('scripts_vars')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../../assets/json/cbu.json',
                method: "GET",
                type: 'json',
                // beforeSend: function(xhr) {
                //     xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
                // },
                success: function(data) {
                    // $('#walletNames').append('<option selected="selected"></option>');
                    const products = data;
                    const length = products.length;
                    console.log(products)
                    for (let i = 0; i < length; i++) {
                        $('#walletNames').append(
                            `<option value="${products[i].id}">${products[i].Ccy}</option>`);
                    }
                },
                error: function() {
                    console.log('error');
                }
            })
        });
        // fetch('https://cbu.uz/ru/arkhiv-kursov-valyut/json/')
        //     .then(function(data) {
        //         console.log(data)
        //     });
    </script>
@endsection
