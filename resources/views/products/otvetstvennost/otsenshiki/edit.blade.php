@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('otvetstvennost-otsenshiki.update', $page->id)}}" id="formOtsenshiki" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                        <label for="insurer-name" class="col-form-label">Наименования</label>
                                        <input type="text" id="insurer-name" name="fio_insurer" class="form-control" value="{{$page->policyHolders->FIO}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Адрес
                                            страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer" class="form-control" value="{{$page->policyHolders->address}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-phone" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-phone" name="tel_insurer" class="form-control" value="{{$page->policyHolders->phone_number}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bill" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-bill" name="address_schet" class="form-control" value="{{$page->policyHolders->checking_account}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-type-activity" class="col-form-label">Вид деятельности</label>
                                        <input type="text" id="insurer-type-activity" name="vid_deyatelnosti" class="form-control" value="{{$page->policyHolders->vid_deyatelnosti}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer" class="form-control" value="{{$page->policyHolders->mfo}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bank_insurer" class="col-form-label">Банк</label>
                                        <select @if($errors->has('bank_insurer'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="bank_insurer" name="bank_insurer"
                                                style="width: 100%;" required>
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
                                        <input type="text" id="insurer-okonh" name="inn_insurer" class="form-control" value="{{$page->policyHolders->inn}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="insurer-okonh" name="okonx" class="form-control" value="{{$page->policyHolders->okonx}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-oked" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-oked" name="oked" class="form-control" value="{{$page->policyHolders->oked}}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="personal-info" class="col-form-label">Информация о персонале
                                        </label>
                                        <textarea id="personal-info" class="form-control" name="info_personal" required>{{$page->info_personal}}</textarea>
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
                                                <label for="insurance-from">Период страхования</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance-from" name="insurance_from" type="date" class="form-control" value="{{$page->insurance_from}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance-to" name="insurance_to" type="date" class="form-control" value="{{$page->insurance_to}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="geograph-zone">Географическая зона:</label>
                                        <input type="text" id="geograph-zone" name="geo_zone" class="form-control" value="{{$page->geo_zone}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведение</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" data-btn-add-row-info class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                    <table class="table table-hover table-head-fixed" id="empTable">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Период действия полиса от</th>
                                            <th class="text-nowrap">Период действия полиса до</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">ФИО застрахованного лица</th>
                                            <th class="text-nowrap">Специальность</th>
                                            <th class="text-nowrap">Стаж работы</th>
                                            <th class="text-nowrap">Должность</th>
                                            <th class="text-nowrap">Время пребывания</th>
                                            <th class="text-nowrap">Страховая стоимость</th>
                                            <th class="text-nowrap">Страховая сумма</th>
                                            <th class="text-nowrap">Страховая премия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    @foreach($page->infos as $info)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" readonly>
                                            </td>
                                            <td>
                                                <select class="form-control polises" id="polises" name="policy_series_id[]" style="width: 100%;">
                                                    @foreach($policySeries as $policy)
                                                        <option @if($info->policy_series_id == $policy->id) selected
                                                                @endif value="{{ $policy->id }}">{{$policy->code}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="from_date_polis[]" value="{{$info->from_date_polis}}">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="to_date_polis[]" value="{{$info->to_date_polis}}">
                                            </td>
                                            <td>
                                                <select class="form-control polises" id="polises" name="agent_id[]" style="width: 100%;">
                                                    @foreach($agents as $agent)
                                                        <option @if($info->agent_id == $agent->user_id) selected
                                                                @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="insurer_fio[]" value="{{$info->insurer_fio}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="specialty[]"  value="{{$info->specialty}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="experience[]" value="{{$info->experience}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="position[]"  value="{{$info->position}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="time_stay[]" value="{{$info->time_stay}}">
                                            </td>
                                            <td>
                                                <input type="text" data-field="value" class="form-control" name="insurer_price[]" value="{{$info->insurer_price}}">
                                            </td>
                                            <td>
                                                <input type="text" data-field="sum" class="form-control" name="insurer_sum[]" value="{{$info->insurer_sum}}">
                                            </td>
                                            <td>
                                                <input type="text" data-field="premiya" class="form-control" name="insurer_premium[]" value="{{$info->insurer_premium}}">
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="10" style="text-align: right"><label class="text-bold">Итого</label></td>
                                            <td><input readonly type="text" data-insurance-stoimost class="form-control overall-sum2" />
                                            </td>
                                            <td><input readonly type="text" data-insurance-sum class="form-control overall-sum4" />
                                            </td>
                                            <td><input readonly type="text" data-insurance-award class="form-control overall-sum3" />
                                            </td>
                                        </tr>
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
                            <h3 class="card-title">Информация о годовом обороте (за последние 2 года)</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" class="product-fields">
                                <table class="table table-hover table-head-fixed" data-annual-turnover-info>
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Год</th>
                                        <th class="text-nowrap">Оборот</th>
                                        <th class="text-nowrap">Чистая прибыль</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control insurance_premium-0" data-field="year[]" name="first_year" value="{{$page->first_year}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 insurance_premium-0" data-field="turnover[]" name="first_turnover" value="{{$page->first_turnover}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0" data-field="earnings[]" name="first_profit" value="{{$page->first_profit}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control insurance_premium-0" data-field="year[]" name="second_year" value="{{$page->second_year}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 insurance_premium-0" data-field="turnover[]" name="second_turnover" value="{{$page->second_turnover}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3  insurance_premium-0" data-field="earnings[]" name="second_profit" value="{{$page->second_profit}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input readonly type="text" data-total-turnover class="form-control overall-sum4" value="{{$page->total_turnover}}" />
                                        </td>
                                        <td><input readonly type="text" data-earnings class="form-control overall-sum3" value="{{$page->total_profit}}" />
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body" id="fields-changed">
                    <div id="product-fields-0-3">
                        <div id="product-fields-0-5">
                            <div class="form-group">
                                <label>Действовали ли Вы в такой или подобной деятельности под другим названием?</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-1" value="1" @if($page->public_sector_comment || $page->private_sector_comment) checked @endif>
                                            <label for="success-action-1">Да</label>
                                        </div>
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-2" value="0" @if(!$page->public_sector_comment || !$page->private_sector_comment) checked @endif>
                                            <label for="success-action-2">Нет</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row r-2-show-0" data-acted="true" @if(!$page->public_sector_comment)style="display: none;" @endif>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">В гос. секторе</span>
                                                </div>
                                                <textarea class="form-control" id="public-sector" name="public_sector_comment">{{$page->public_sector_comment}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">В частном секторе</span>
                                                </div>
                                                <textarea id="private-sector" class="form-control" name="private_sector_comment">{{$page->private_sector_comment}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="geographic-zone">Риски, связанные с вашей профессиональной деятельностью,
                                которые Вы опасаетесь больше всего</label>
                            <input type="text" id="geographic-zone" name="prof_riski" class="form-control" value="{{$page->prof_riski}}">
                        </div>

                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда Вам была предъявлена претензия или иск?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-true" value="1" @if($page->reason_case) checked @endif>
                                        <label for="case-true">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-false" value="0" @if(!$page->reason_case) checked @endif>
                                        <label for="case-false">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2-show-0" data-cases-reason="true" @if(!$page->reason_case) style="display: none;" @endif>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Причина</span>
                                            </div>
                                            <textarea class="form-control" name="reason_case">{{$page->reason_case}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда к Вам были применены административные взыскания?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative-case" id="case-administrative-1" value="1" @if($page->reason_administrative_case) checked @endif>
                                        <label for="case-administrative-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative-case" id="case-administrative-2" value="0" @if(!$page->reason_administrative_case) checked @endif>
                                        <label for="case-administrative-2">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2-show-0" data-administr-case="true" @if(!$page->reason_administrative_case) style="display: none;" @endif>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Причина</span>
                                            </div>
                                            <textarea class="form-control" name="reason_administrative_case">{{$page->reason_administrative_case}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Сфера вашей профессиональной деятельности, в страховании которых, Вы нуждаетесь:</label>
                            <select required class="form-control payment-schedule" data-select-id="1" name="sfera_deyatelnosti" style="width: 100%; text-align: center">
                                <option disabled value="0">Выберите сферу профессиональной деятельности</option>
                                <option value="1" @if($page->sfera_deyatelnosti == 1) selected @endif>аудит банков и кредитных учреждений;</option>
                                <option value="2" @if($page->sfera_deyatelnosti == 2) selected @endif>аудит страховых организаций и обществ взаимного страхования;</option>
                                <option value="3" @if($page->sfera_deyatelnosti == 3) selected @endif>аудит бирж, внебюджетных фондов и инвестиционных институтов;</option>
                                <option value="4" @if($page->sfera_deyatelnosti == 4) selected @endif>общий аудит</option>
                            </select>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Запрашиваемый лимит ответственности:</label>
                            <select class="form-control payment-schedule" data-select-id="3" name="limit_otvetstvennosti" style="width: 100%; text-align: center">
                                <option selected disabled value="0">Выберите лимит ответственности</option>
                                <option value="1" @if($page->limit_otvetstvennosti == 1) selected @endif>Годовой совокупный</option>
                                <option value="2" @if($page->limit_otvetstvennosti == 2) selected @endif>По страховому случаю</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка необходимых документов</label>
                            <input class="form-control" data-file="file" type="file" multiple name="documents[]">
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
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select name="insurance_premium_currency" class="form-control" data-wallet="wallet" id="walletNames" style="width: 100%; text-align: center">
                                            <option selected="selected" name="insurance_premium_currency" value="{{$page->insurance_premium_currency}}">
                                                {{$page->insurance_premium_currency}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select class="form-control payment-schedule" data-payment="payment" id="payment-procedure" name="poryadok_oplaty_premii" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->poryadok_oplaty_premii == 1) selected @endif>Единовременно</option>
                                            <option value="other" @if($page->poryadok_oplaty_premii == 'other') selected @endif>Другое</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="other-payment-schedule" @if($page->poryadok_oplaty_premii == 1) style="display: none;" @endif>
                                <div class="form-group">
                                    <button type="button" data-btn-add-row class="btn btn-primary ">
                                        Добавить
                                    </button>
                                </div>
                                <div class="table-responsive p-0 " style="max-height: 300px;">
                                    <table class="table table-hover table-head-fixed" id="table-payment-schedule">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Сумма</th>
                                            <th class="text-nowrap">От</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($page->strahPremiya as $prem)
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input type="text" class="form-control" name="prem_sum[]" value="{{$prem->prem_sum}}">
                                                </td>
                                                <td><input type="date" class="form-control" name="prem_from[]" value="{{$prem->prem_from}}">
                                                </td>
                                                <td>
                                                    <input type="button" value="Удалить" data-action="delete" class="btn btn-warning">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input type="text" id="all-summ" name="strahovaya_sum" class="form-control" value="{{$page->strahovaya_sum}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-frnshiza" name="franshiza" class="form-control" value="{{$page->franshiza}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="all-premia">Страховая премия</label>
                                        <input type="text" id="all-premia" name="strahovaya_purpose" class="form-control" value="{{$page->strahovaya_purpose}}" >
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
                                                <input type="text" id="polis-series" name="serial_number_policy" class="form-control" value="{{$page->serial_number_policy}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="date_issue_policy" type="date" class="form-control" value="{{$page->date_issue_policy}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Ответственное лицо</label>
                                            <div class="input-group">
                                                <select class="form-control polises" id="otvet-litso" name="otvet_litso" style="width: 100%;">
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
                </div>
                <!-- раздел 3 - да - show -->
                {{--                <div class="table-responsive p-0 r-3-show-0" style="display: none;">--}}
                {{--                    <div id="product-fields-0-7">--}}
                {{--                        <table class="table table-hover table-head-fixed">--}}
                {{--                            <thead>--}}
                {{--                            <tr>--}}
                {{--                                <th>Объекты страхования </th>--}}
                {{--                                <th>Количество водителей /пассажиров</th>--}}
                {{--                                <th>Страховая сумма на одного лица</th>--}}
                {{--                                <th>Страховая сумма</th>--}}
                {{--                                <th>Страховая премия</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody>--}}
                {{--                            <tr>--}}
                {{--                                <td><label>Водитель(и)</label></td>--}}
                {{--                                <td><input type="number" class="form-control r-3-pass-0" readonly value="1" name="driver_quantity"></td>--}}
                {{--                                <td>--}}
                {{--                                    <div class="input-group mb-4">--}}
                {{--                                        <input type="text" class="form-control r-3-one-0" name="driver_one_sum">--}}
                {{--                                        <div class="input-group-append">--}}
                {{--                                            <select class="form-control success" name="driver_currency" style="width: 100%;">--}}
                {{--                                                <option selected="selected">UZS--}}
                {{--                                                </option>--}}
                {{--                                                <option>USD</option>--}}
                {{--                                            </select>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </td>--}}
                {{--                                <td><input type="number" class="form-control r-3-sum-0" name="driver_total_sum" id="driver_total_sum-0">--}}
                {{--                                </td>--}}
                {{--                                <td><input type="number" class="form-control r-3-premia-0" name="driver_preim_sum" id="driver_total_sum-0">--}}
                {{--                                </td>--}}
                {{--                            </tr>--}}
                {{--                            <tr>--}}
                {{--                                <td><label>Пассажиры</label></td>--}}
                {{--                                <td><input type="number" class="form-control r-3-pass-1-0" name="passenger_quantity"></td>--}}
                {{--                                <td>--}}
                {{--                                    <div class="input-group mb-4">--}}
                {{--                                        <input type="text" class="form-control r-3-one-1-0" name="passenger_one_sum">--}}
                {{--                                        <div class="input-group-append">--}}
                {{--                                            <select class="form-control success" name="passenger_currency" style="width: 100%;">--}}
                {{--                                                <option selected="selected">UZS--}}
                {{--                                                </option>--}}
                {{--                                                <option>USD</option>--}}
                {{--                                            </select>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </td>--}}
                {{--                                <td><input type="number" class="form-control r-3-sum-1-0" name="passenger_total_sum" id="passenger_total_sum-0"></td>--}}
                {{--                                <td><input type="number" class="form-control r-3-premia-1-0" name="passenger_preim_sum" id="passenger_total_sum-0"></td>--}}
                {{--                            </tr>--}}
                {{--                            <tr>--}}
                {{--                                <td><label class="text-bold">Общий Лимит</label>--}}
                {{--                                </td>--}}
                {{--                                <td><input type="number" class="form-control r-3-pass-2-0" name="limit_quantity"></td>--}}
                {{--                                <td>--}}
                {{--                                    <div class="input-group mb-4">--}}
                {{--                                        <input type="text" class="form-control r-3-one-2-0" name="limit_one_sum">--}}
                {{--                                        <div class="input-group-append">--}}
                {{--                                            <select class="form-control success" name="limit_currency" style="width: 100%;">--}}
                {{--                                                <option selected="selected">UZS--}}
                {{--                                                </option>--}}
                {{--                                                <option>USD</option>--}}
                {{--                                            </select>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </td>--}}
                {{--                                <td><input type="number" class="form-control r-3-sum-2-0" name="limit_total_sum"></td>--}}
                {{--                                <td><input type="number" class="form-control r-3-premia-2-0" name="limit_preim_sum"></td>--}}
                {{--                            </tr>--}}
                {{--                            <tr>--}}
                {{--                                <td colspan="3"><label class="text-bold">Итого</label>--}}
                {{--                                </td>--}}
                {{--                                <td><input type="number" class="form-control r-summ-0">--}}
                {{--                                </td>--}}
                {{--                                <td><input type="number" class="form-control r-summ-premia-0"></td>--}}
                {{--                            </tr>--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
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
                                        <label for="questionnaire" class="col-form-label">Анкета</label>
                                        <input type="file" id="questionnaire" name="anketa" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract" class="col-form-label">Договор</label>
                                        <input type="file" id="contract" name="dogovor" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis" class="col-form-label">Полис</label>
                                        <input type="file" id="polis" name="polis" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
        </div>
    </form>
@endsection
@section('scripts_vars')
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
    <!-- TODO: скрипты на чистом JS для обработки формы audit -->
    <script src="../../../assets/custom/js/form/form-actions.js"></script>
@endsection

