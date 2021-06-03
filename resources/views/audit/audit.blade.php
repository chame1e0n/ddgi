@extends('layouts.index')

@section('content')
    <form action="{{ route('audit.store') }}" method="POST" id="form-audit" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
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
                                                    <input id="insurance-from" name="insurance_from" value="{{old('insurance_from')}}" type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance-to" name="insurance_to" value="{{old('insurance_to')}}" type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="geograph-zone">Географическая зона:</label>
                                        <input type="text" id="geograph-zone" name="geo_zone" value="{{old('geo_zone')}}" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведения</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" data-btn-add-row-info class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0" style="max-height: 300px;">
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
                                        <tr>

                                            <td>
                                                <input type="text" class="form-control" name="number_polis_main">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="series_polis_main">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="validity_period_from_main">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="validity_period_to_main">
                                            </td>
                                            <td>
                                                <select class="form-control polises" id="polises" name="polis_agent_main"
                                                        style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    <option value="1">Да</option>
                                                    <option value="2">Нет</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="polis_mark_main" >
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="specialty_main"
                                                       value="Specialty">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="workExp_main"
                                                       value="work experience">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="polis_model_main">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="arriving_time_main">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="cost_of_insurance_main">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="sum_of_insurance_main">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="bonus_of_insurance_main">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10" style="text-align: right"><label
                                                        class="text-bold">Итого</label></td>
                                            <td><input readonly type="text" data-insurance-stoimost
                                                       class="form-control overall-sum2"/>
                                            </td>
                                            <td><input readonly type="text" data-insurance-sum
                                                       class="form-control overall-sum4"/>
                                            </td>
                                            <td><input readonly type="text" data-insurance-award
                                                       class="form-control overall-sum3"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Информация о годовом обороте (за последние 2 года)</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
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
                                            <input type="text" class="form-control forsum3 insurance_premium-0"
                                                   data-field="year" name="polis_premium" value="{{old('polis_premium')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 insurance_premium-0"
                                                   data-field="turnover" name="turnover" value="{{old('turnover')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0"
                                                   data-field="earnings" name="net_profit" value="{{old('net_profit')}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0"
                                                   data-field="year" name="second_polis_premium" value="{{old('second_polis_premium')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0"
                                                   data-field="turnover" name="second_turnover" value="{{old('second_turnover')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 insurance_premium-0"
                                                   data-field="earnings" name="second_net_profit" value="{{old('second_net_profit')}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" style="text-align: right"><label class="text-bold">Итого</label>
                                        </td>
                                        <td><input readonly type="text" data-total-turnover
                                                   class="form-control overall-sum4"/>
                                        </td>
                                        <td><input readonly type="text" data-earnings
                                                   class="form-control overall-sum3"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="period-active-org">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="insurance_from">Период деятельности оганизации</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input data-activity-period="from" name="active_period_from"
                                                       type="date" class="form-control" value="{{old('active_period_from')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input data-activity-period="to" name="active_period_to" type="date"
                                                       class="form-control" value="{{old('active_period_to')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="total-active-org">Всего:</label>
                                    <input readonly data-total="total-active-org" type="text" class="form-control">
                                </div>

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
                                            <input type="radio" class="other_insurance-0" name="acted"
                                                   data-acted-radio
                                                   id="success-action-1" value="true">
                                            <label for="success-action-1">Да</label>
                                        </div>
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted"
                                                   data-acted-radio
                                                   id="success-action-2" value="false">
                                            <label for="success-action-2">Нет</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row r-2-show-0" data-acted="true" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">В гос. секторе</span>
                                                </div>
                                                <textarea class="form-control" id="public-sector"
                                                          name="public_sector_comment" value="{{old('public_sector_comment')}}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">В частном секторе</span>
                                                </div>
                                                <textarea id="private-sector" class="form-control"
                                                          name="private_sector_comment" value="{{old('private_sector_comment')}}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="geographic-zone">Риски, связанные с вашей профессиональной деятельностью,
                                которые Вы опасаетесь больше всего</label>
                            <input type="text" id="geographic-zone" name="risk" value="{{old('risk')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда Вам была предъявлена претензия или
                                иск?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases"
                                               id="case-true" value="true">
                                        <label for="case-true">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases"
                                               id="case-false" value="false">
                                        <label for="case-false">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2-show-0" data-cases-reason="true" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Причина</span>
                                            </div>
                                            <textarea class="form-control" name="reason_case" value="{{old('reason_case')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда к Вам были применены административные
                                взыскания?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio
                                               name="administrative_case" id="case-administrative-1" value="true">
                                        <label for="case-administrative-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio
                                               name="administrative-case" id="case-administrative-2" value="false">
                                        <label for="case-administrative-2">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2-show-0" data-administr-case="true" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Причина</span>
                                            </div>
                                            <textarea class="form-control" name="reason_administrative_case" value="{{old('reason_administrative_case')}}"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Сфера вашей профессиональной деятельности, в страховании которых, Вы
                                нуждаетесь:</label>
                            <select class="form-control payment-schedule" data-select-id="1" name="sphere_of_activity"
                                    style="width: 100%; text-align: center">
                                <option selected disabled>Выберите сферу профессиональной деятельности</option>
                                <option value="1">аудит банков и кредитных учреждений;</option>
                                <option value="2">аудит страховых организаций и обществ взаимного страхования;</option>
                                <option value="3">аудит бирж, внебюджетных фондов и инвестиционных институтов;</option>
                                <option value="4">общий аудит</option>
                            </select>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Профессиональные услуги, в страховании которых Вы нуждаетесь:</label>
                            <select class="form-control payment-schedule" data-select-id="2"
                                    name="prof_insurance_services" style="width: 100%; text-align: center">
                                <option selected disabled>Выберите услугу</option>
                                <option value="1">постановка, восстановление и ведение бухгалтерского учета;</option>
                                <option value="2">составление финансовой отчетности;</option>
                                <option value="3">перевод национальной финансовой отчетности на международные стандарты
                                    бухгалтерского учета;
                                </option>
                                <option value="4">анализ финансово-хозяйственной деятельности хозяйствующих субъектов;
                                </option>
                                <option value="5">консалтинг по бухгалтерскому учету, налогообложению, планированию,
                                    менеджменту и другим вопросам финансово-хозяйственной деятельности;
                                </option>
                                <option value="6">составление расчетов и деклараций по налогам и другим обязательным
                                    платежам.
                                </option>
                            </select>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Запрашиваемый лимит ответственности:</label>
                            <select class="form-control payment-schedule" data-select-id="3" name="liability_limit"
                                    style="width: 100%; text-align: center">
                                <option selected disabled>Выберите лимит ответственности</option>
                                <option value="1">Годовой совокупный</option>
                                <option value="2">По страховому случаю</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка необходимых
                                документов</label>
                            <input class="form-control" data-file="file" type="file" multiple
                                   name="retransfer_akt_file">
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
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" data-wallet="wallet"
                                                name="insurance_premium_currency"
                                                id="walletNames" style="width: 100%; text-align: center">
                                            <option selected="selected">UZS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select class="form-control payment-schedule" data-payment="payment"
                                                id="payment-procedure" name="payment_term"
                                                style="width: 100%; text-align: center">
                                            <option value="1">Единовременно</option>
                                            <option value="other">Другое</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="other-payment-schedule" style="display: none;">
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
                                        <tr id="payment-term-tr-0" data-field-number="0">
                                            <td><input type="text" class="form-control" name="payment_sum_main">
                                            </td>
                                            <td><input type="date" class="form-control" name="payment_from_main">
                                            </td>
                                        </tr>
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
                                        <input type="text" id="all-summ" name="all_sum" value="{{old('all_sum')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-frnshiza" name="franchise" value="{{old('franchise')}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="all-premia">Страховая премия</label>
                                        <input type="text" id="all-premia" name="insurance_bonus" value="{{old('insurance_bonus')}}" class="form-control">
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
                                                <input type="text" id="polis-series" name="polis_series" value="{{old('polis_series')}}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="polis_from" value="{{old('polis_from')}}" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Ответственное лицо</label>
                                            <div class="input-group">
                                                <select class="form-control polises" id="otvet-litso" name="litso"
                                                        style="width: 100%;">
                                                    <option selected="selected">Имя Фамилия</option>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="beneficiary-card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Анкета</label>
                                            <input type="file" id="geographic-zone" name="questionnaire"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            <input type="file" id="geographic-zone" name="contract"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Полис</label>
                                            <input type="file" id="geographic-zone" name="policy_file"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- раздел 3 - да - show -->
                <div class="table-responsive p-0 r-3-show-0" style="display: none;">
                    <div id="product-fields-0-7">
                        <table class="table table-hover table-head-fixed">
                            <thead>
                            <tr>
                                <th>Объекты страхования</th>
                                <th>Количество водителей /пассажиров</th>
                                <th>Страховая сумма на одного лица</th>
                                <th>Страховая сумма</th>
                                <th>Страховая премия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><label>Водитель(и)</label></td>
                                <td><input type="number" class="form-control r-3-pass-0" readonly value="1"
                                           name="driver_quantity"></td>
                                <td>
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control r-3-one-0" name="driver_one_sum">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="driver_currency"
                                                    style="width: 100%;">
                                                <option selected="selected">UZS
                                                </option>
                                                <option>USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="number" class="form-control r-3-sum-0" name="driver_total_sum"
                                           id="driver_total_sum-0">
                                </td>
                                <td>
                                    <input type="number" class="form-control r-3-premia-0" name="driver_preim_sum"
                                           id="driver_total_sum-0">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Пассажиры</label></td>
                                <td><input type="number" class="form-control r-3-pass-1-0" name="passenger_quantity">
                                </td>
                                <td>
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control r-3-one-1-0" name="passenger_one_sum">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="passenger_currency"
                                                    style="width: 100%;">
                                                <option selected="selected">UZS
                                                </option>
                                                <option>USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="number" class="form-control r-3-sum-1-0" name="passenger_total_sum"
                                           id="passenger_total_sum-0"></td>
                                <td><input type="number" class="form-control r-3-premia-1-0" name="passenger_preim_sum"
                                           id="passenger_total_sum-0"></td>
                            </tr>
                            <tr>
                                <td><label class="text-bold">Общий Лимит</label>
                                </td>
                                <td><input type="number" class="form-control r-3-pass-2-0" name="limit_quantity"></td>
                                <td>
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control r-3-one-2-0" name="limit_one_sum">
                                        <div class="input-group-append">
                                            <select class="form-control success" name="limit_currency"
                                                    style="width: 100%;">
                                                <option selected="selected">UZS
                                                </option>
                                                <option>USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td><input type="number" class="form-control r-3-sum-2-0" name="limit_total_sum"></td>
                                <td><input type="number" class="form-control r-3-premia-2-0" name="limit_preim_sum">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><label class="text-bold">Итого</label>
                                </td>
                                <td><input type="number" class="form-control r-summ-0">
                                </td>
                                <td><input type="number" class="form-control r-summ-premia-0"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <div class="card-footer">
                <button class="btn btn-primary float-right" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="/assets/custom/js/form/form-actions.js"></script>
@endsection