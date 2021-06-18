@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <form action="{{route('otvetstvennost-realtor.store')}}" method="POST" id="formRealtors">
        @csrf
        <!-- Content Wrapper. Contains page content -->
        <form action="GET" id="formRealtors">
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
                    @include('includes.messages')

                    @include('includes.contract')

                    <div class="card-body">
                        @include('includes.client')

                        <div class="card-body">
                            <div id="anketa-fields">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="geographic-zone">Географическая зона:</label>
                                        <input value="{{old('geo_zone')}}" type="text" id="geograph-zone" name="geo_zone"
                                               @if($errors->has('geo_zone'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
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
                                                <th class="text-nowrap">Дата выдачи</th>
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
                                                <td colspan="11" style="text-align: right"><label class="text-bold">Итого</label></td>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                <div id="product-fields" class="product-fields">
                                    <table class="table table-hover table-head-fixed" data-annual-turnover-info id="empTable">
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
                                                <input type="text" class="form-control forsum3 insurance_premium-0" data-field="year" name="polis_premium[]">
                                            </td>
                                            <td>
                                                <select class="form-control
                                                 @if($errors->has('policy_series_id.*'))
                                                    is-invalid
                                                @endif
                                                    polises" id="polises" name="policy_series_id[]" style="width: 100%;" required>
                                                    @foreach($policySeries as $policy)
                                                        <option @if(old('policy_series_id[]') == $policy->id) selected
                                                                @endif value="{{ $policy->id }}">{{$policy->code}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" class="
                                                @if($errors->has('from_date_polis.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="from_date_polis[]" required
                                                value="{{old('from_date_polis.0')}}">
                                            </td>
                                            <td>
                                                <input type="date" class="
                                                @if($errors->has('to_date_polis.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="to_date_polis[]" required
                                                       value="{{old('to_date_polis.0')}}">
                                            </td>
                                            <td>
                                                <select class="form-control
                                                 @if($errors->has('agent_id.*'))
                                                    is-invalid
                                                @endif
                                                    polises" id="polises" name="agent_id[]" style="width: 100%;" required>
                                                    @foreach($agents as $agent)
                                                        <option @if(old('agent_id.0') == $agent->user_id) selected
                                                                @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('insurer_fio.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_fio[]" required
                                                       value="{{old('insurer_fio.0')}}">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('specialty.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="specialty[]" value="Specialty" required
                                                       value="{{old('specialty.0')}}">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('experience.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="experience[]" value="work experience" required
                                                       value="{{old('experience.0')}}">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('position.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="position[]" required
                                                       value="{{old('position.0')}}">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('time_stay.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="time_stay[]" required
                                                       value="{{old('time_stay.0')}}">
=======
                                                <input type="text" class="form-control forsum4 insurance_premium-0" data-field="turnover" name="polis_premium[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum3 insurance_premium-0" data-field="earnings" name="polis_premium[]">
                                                <input type="text" data-field="value" class="
                                                @if($errors->has('insurer_price.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_price[]" required
                                                       value="{{old('insurer_price.0')}}">
                                            </td>
                                            <td>
                                                <input type="text" data-field="sum" class="
                                                @if($errors->has('insurer_sum.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_sum[]" required
                                                       value="{{old('insurer_sum.0')}}">
                                            </td>
                                            <td>
                                                <input type="text" data-field="premiya" class="
                                                @if($errors->has('insurer_premium.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_premium[]"  required
                                                       value="{{old('insurer_premium.0')}}">
=======
                                                <input type="text" class="form-control forsum3 insurance_premium-0" data-field="year" name="polis_premium[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum3 insurance_premium-0" data-field="turnover" name="polis_premium[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum4 insurance_premium-0" data-field="earnings" name="polis_premium[]">
>>>>>>> 5e486a5f67bd0c5bfe889ab20a9795df6d41e538
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" style="text-align: right"><label class="text-bold">Итого</label></td>
                                            <td><input readonly type="text" data-total-turnover class="form-control overall-sum4" />
                                            </td>
                                            <td><input readonly type="text" data-earnings class="form-control overall-sum3" />
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
                                                    <input data-activity-period="from" name="activity_period_from" type="date" class="form-control">
                                                </div>
                                                <input data-activity-period="from" name="activity_period_from" type="date" id="insurance-from" class="
                                                @if($errors->has('activity_period_from'))
                                                    is-invalid
                                                @endif
                                                    form-control"  value="{{old('activity_period_from')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input data-activity-period="to" name="activity_period_to" type="date" class="form-control">
                                                </div>
                                                <input data-activity-period="to" name="activity_period_to" type="date" id="insurance-to" class="
                                                 @if($errors->has('activity_period_to'))
                                                    is-invalid
                                                @endif
                                                    form-control"  value="{{old('activity_period_to')}}">
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
                            <div class="form-group">
                                <label>Действовали ли Вы в такой или подобной деятельности под другим названием?</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-1" value="1"
                                            @if(old('acted') == 1) checked @endif>
                                            <label for="success-action-1">Да</label>
                                        </div>
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-2" value="0"
                                                   @if(old('acted') == 0) checked @endif>
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-1" value="true">
                                            <label for="success-action-1">Да</label>
                                        </div>
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-2" value="false">
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
                                                <textarea class="form-control" id="public-sector" name="public_sector_comment" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">В частном секторе</span>
                                                </div>
                                                <textarea id="private-sector" class="form-control" name="private_sector_comment" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="geographic-zone">Риски, связанные с вашей профессиональной деятельностью,
                                    которые Вы опасаетесь больше всего</label>
                                <input type="text" id="geographic-zone" name="geo_zone" class="form-control">
                            </div>

                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда Вам была предъявлена претензия или иск?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-true" value="1"
                                               @if(old('cases') == 1) checked @endif>
                                        <label for="case-true">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-false" value="0"
                                               @if(old('cases') == 0) checked @endif>
                                        <label for="case-false">Нет</label>
                                    </div>
                                </div>
                                <div class="row r-2-show-0" data-cases-reason="true" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Причина</span>
                                                </div>
                                                <textarea class="form-control" name="reason_case" required></textarea>
                                            </div>
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
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-1" value="1"
                                               @if(old('administrative_case') == 1) checked @endif>
                                        <label for="case-administrative-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-2" value="0"
                                               @if(old('administrative_case') == 0) checked @endif>
                                        <label for="case-administrative-2">Нет</label>
                                    </div>
                                </div>
                                <div class="row r-2-show-0" data-administr-case="true" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Причина</span>
                                                </div>
                                                <textarea class="form-control" name="reason_administrative_case" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group form-inline justify-content-between">
                                <label>Сфера вашей профессиональной деятельности, в страховании которых, Вы нуждаетесь:</label>
                                <select class="form-control payment-schedule" data-select-id="1" name="sphereOfActivity" style="width: 100%; text-align: center">
                                    <option selected disabled>Выберите сферу профессиональной деятельности</option>
                                    <option value="1">аудит банков и кредитных учреждений;</option>
                                    <option value="2">аудит страховых организаций и обществ взаимного страхования;</option>
                                    <option value="3">аудит бирж, внебюджетных фондов и инвестиционных институтов;</option>
                                    <option value="4">общий аудит</option>
                                </select>
                            </div>

                            <div class="form-group form-inline justify-content-between">
                                <label>Профессиональные услуги, в страховании которых Вы нуждаетесь:</label>
                                <select class="form-control payment-schedule" data-select-id="2" name="profInsuranceServices" style="width: 100%; text-align: center">
                                    <option selected disabled>Выберите услугу</option>
                                    <option value="1">постановка, восстановление и ведение бухгалтерского учета;</option>
                                    <option value="2">составление финансовой отчетности;</option>
                                    <option value="3">перевод национальной финансовой отчетности на международные стандарты бухгалтерского учета;</option>
                                    <option value="4">анализ финансово-хозяйственной деятельности хозяйствующих субъектов;</option>
                                    <option value="5">консалтинг по бухгалтерскому учету, налогообложению, планированию, менеджменту и другим вопросам финансово-хозяйственной деятельности;</option>
                                    <option value="6">составление расчетов и деклараций по налогам и другим обязательным платежам.</option>
                                </select>
                            </div>

                            <div class="form-group form-inline justify-content-between">
                                <label>Запрашиваемый лимит ответственности:</label>
                                <select class="form-control payment-schedule" data-select-id="3" name="liabilityLimit" style="width: 100%; text-align: center">
                                    <option selected disabled>Выберите лимит ответственности</option>
                                    <option value="1">Годовой совокупный</option>
                                    <option value="2">По страховому случаю</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка необходимых документов</label>
                                <input class="form-control" data-file="file" type="file" multiple name="retransferAktFile">
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
                                            <input type="text" id="all-summ" name="geo_zone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="all-summ">Cтраховая премия</label>
                                            <input type="text" id="all-summ" name="geo_zone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="all-summ">Франшиза</label>
                                            <input type="text" id="all-summ" name="geo_zone" class="form-control">
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
                                                <td><input type="text" class="form-control" name="payment_sum[]"></td>
                                                <td><input type="date" class="form-control" name="payment_from[]">
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
                                                <input type="text" id="polis-series" name="polis_series" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                                <select class="form-control polises" id="otvet-litso" name="litso" style="width: 100%;">
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
                                            <input type="file" id="geographic-zone" name="geo_zone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            <input type="file" id="geographic-zone" name="geo_zone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Полис</label>
                                            <input type="file" id="geographic-zone" name="geo_zone" class="form-control">
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
                                    <th>Объекты страхования </th>
                                    <th>Количество водителей /пассажиров</th>
                                    <th>Страховая сумма на одного лица</th>
                                    <th>Страховая сумма</th>
                                    <th>Страховая премия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><label>Водитель(и)</label></td>
                                    <td><input type="number" class="form-control r-3-pass-0" readonly value="1" name="driver_quantity"></td>
                                    <td>
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control r-3-one-0" name="driver_one_sum">
                                            <div class="input-group-append">
                                                <select class="form-control success" name="driver_currency" style="width: 100%;">
                                                    <option selected="selected">UZS
                                                    </option>
                                                    <option>USD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="number" class="form-control r-3-sum-0" name="driver_total_sum" id="driver_total_sum-0">
                                    </td>
                                    <td><input type="number" class="form-control r-3-premia-0" name="driver_preim_sum" id="driver_total_sum-0">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Пассажиры</label></td>
                                    <td><input type="number" class="form-control r-3-pass-1-0" name="passenger_quantity"></td>
                                    <td>
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control r-3-one-1-0" name="passenger_one_sum">
                                            <div class="input-group-append">
                                                <select class="form-control success" name="passenger_currency" style="width: 100%;">
                                                    <option selected="selected">UZS
                                                    </option>
                                                    <option>USD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="number" class="form-control r-3-sum-1-0" name="passenger_total_sum" id="passenger_total_sum-0"></td>
                                    <td><input type="number" class="form-control r-3-premia-1-0" name="passenger_preim_sum" id="passenger_total_sum-0"></td>
                                </tr>
                                <tr>
                                    <td><label class="text-bold">Общий Лимит</label>
                                    </td>
                                    <td><input type="number" class="form-control r-3-pass-2-0" name="limit_quantity"></td>
                                    <td>
                                        <div class="input-group mb-4">
                                            <input type="text" class="form-control r-3-one-2-0" name="limit_one_sum">
                                            <div class="input-group-append">
                                                <select class="form-control success" name="limit_currency" style="width: 100%;">
                                                    <option selected="selected">UZS
                                                    </option>
                                                    <option>USD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="number" class="form-control r-3-sum-2-0" name="limit_total_sum"></td>
                                    <td><input type="number" class="form-control r-3-premia-2-0" name="limit_preim_sum"></td>
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
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>

        </form>
@endsection
@section('scripts_vars')
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
