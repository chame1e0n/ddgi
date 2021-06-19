@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('otvetstvennost-realtor.update', $page->id)}}" id="formRealtors"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href="{{url()->current()}}?download=polis">Скачать Полис</a>
                            <a href="{{url()->current()}}?download=dogovor">Скачать Договор</a>
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="geographic-zone">Географическая зона:</label>
                                        <input value="{{$page->geo_zone}}" type="text" id="geo_zone" name="geo_zone"
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
                                            <td><input readonly type="text" data-insurance-stoimost class="form-control overall-sum2" style="cursor: pointer"/>
                                            </td>
                                            <td><input readonly type="text" data-insurance-sum class="form-control overall-sum4" style="cursor: pointer"/>
                                            </td>
                                            <td><input readonly type="text" data-insurance-award class="form-control overall-sum3" style="cursor: pointer"/>
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
                                            <input type="text" class="
                                            @if($errors->has('first_year'))
                                                is-invalid
                                            @endif
                                                insurance_premium-0" data-field="year[]" name="first_year" value="{{$page->first_year}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('first_turnover'))
                                                is-invalid
                                            @endif
                                                forsum4 insurance_premium-0" data-field="turnover[]" name="first_turnover" value="{{$page->first_turnover}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('first_profit'))
                                                is-invalid
                                            @endif
                                                forsum3 insurance_premium-0" data-field="earnings[]" name="first_profit" value="{{$page->first_profit}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('second_year'))
                                                is-invalid
                                            @endif
                                                insurance_premium-0" data-field="year[]" name="second_year" value="{{$page->second_year}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('second_turnover'))
                                                is-invalid
                                            @endif
                                                forsum4 insurance_premium-0" data-field="turnover[]" name="second_turnover" value="{{$page->second_turnover}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('second_profit'))
                                                is-invalid
                                            @endif
                                                forsum3  insurance_premium-0" data-field="earnings[]" name="second_profit" value="{{$page->second_profit}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input readonly type="text" data-total-turnover class="form-control overall-sum4" value="{{$page->total_turnover}}" style="cursor: pointer"/>
                                        </td>
                                        <td><input readonly type="text" data-earnings class="form-control overall-sum3" value="{{$page->total_profit}}" style="cursor: pointer"/>
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
                                                <input data-activity-period="from" name="activity_period_from" type="date" class="
                                                @if($errors->has('activity_period_from'))
                                                    is-invalid
                                                @endif
                                                    form-control"
                                                value="{{$page->activity_period_from}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input data-activity-period="to" name="activity_period_to" type="date" class="
                                                @if($errors->has('activity_period_to'))
                                                    is-invalid
                                                @endif
                                                    form-control"
                                                       value="{{$page->activity_period_to}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="total-active-org">Всего:</label>
                                    <input readonly data-total="total-active-org" type="text" class="
                                    @if($errors->has('activity_period_all'))
                                        is-invalid
                                    @endif
                                        form-control" name="activity_period_all"
                                           value="{{$page->activity_period_all}}">
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
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-1" value="1" @if($page->acted) checked @endif>
                                            <label for="success-action-1">Да</label>
                                        </div>
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-2" value="0" @if(!$page->acted) checked @endif>
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
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-true" value="1" @if($page->cases) checked @endif>
                                        <label for="case-true">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-false" value="0" @if(!$page->cases) checked @endif>
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
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-1" value="1" @if($page->administrative_case) checked @endif>
                                        <label for="case-administrative-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-2" value="0" @if(!$page->administrative_case) checked @endif>
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
                            @foreach(unserialize($page->documents) as $doc)
                                <br>
                                <a target="_blank" href="/storage/{{$doc}}">
                                    Открыть
                                </a>

                                @endforeach
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
                                                <select type="text" id="serial_number_policy" name="serial_number_policy" @if($errors->has('serial_number_policy'))
                                                class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                    @endif>
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
                                                <input id="date_issue_policy" name="date_issue_policy" value="{{$page->date_issue_policy}}"
                                                       type="date" @if($errors->has('date_issue_policy'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso">Ответственное лицо</label>
                                                <select @if($errors->has('otvet_litso'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif id="otvet-litso" name="otvet_litso"
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
                                            @if($page->anketa != null)
                                                <a target="_blank" href="/storage/{{$page->anketa}}" alt="Анкета">
                                                    Открыть
                                                </a>
                                            @endif
                                            <input id="anketa" name="anketa" value="{{old('anketa')}}"
                                                   type="file" @if($errors->has('anketa'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            @if($page->dogovor != null)
                                                <a target="_blank" href="/storage/{{$page->dogovor}}">
                                                    Открыть
                                                </a>
                                            @endif
                                            <input id="dogovor" name="dogovor" value="{{old('dogovor')}}"
                                                   type="file" @if($errors->has('dogovor'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">

                                            <label for="polis-series" class="col-form-label">Полис</label>
                                            @if($page->polis != null)
                                                <a target="_blank" href="/storage/{{$page->polis}}">
                                                    Открыть
                                                </a>
                                            @endif
                                            <input id="polis" name="polis" value="{{old('polis')}}"
                                                   type="file" @if($errors->has('polis'))
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
