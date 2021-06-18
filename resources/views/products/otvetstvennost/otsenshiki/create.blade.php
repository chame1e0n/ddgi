@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('otvetstvennost-otsenshiki.store')}}" id="formOtsenshiki" method="POST" enctype="multipart/form-data">
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
                @include('includes.messages')

                @include('includes.contract')

                <div class="card-body">
                    @include('includes.client')

                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="geograph-zone">Географическая зона:</label>
                                        <input type="text" value="{{old('geo_zone')}}" id="geograph-zone" name="geo_zone" @if($errors->has('geo_zone'))
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
                                        <tr data-cloned="true">

                                            <td>
                                                <input type="text"  class="form-control" readonly>
                                            </td>
                                            <td>
                                                <select  @if($errors->has('policy_series_id.*'))
                                                         class="form-control is-invalid polises"
                                                         @else
                                                         class="form-control polises"
                                                         @endif  id="polises" name="policy_series_id[]" style="width: 100%;">
                                                    @foreach($policySeries as $policy)
                                                        <option @if(old('policy_series_id[]') == $policy->id) selected
                                                                @endif value="{{ $policy->id }}">{{$policy->code}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" value="{{old('from_date_polis.0')}}" @if($errors->has('from_date_polis.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="from_date_polis[]">
                                            </td>
                                            <td>
                                                <input type="date" value="{{old('to_date_polis.0')}}" @if($errors->has('to_date_polis.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="to_date_polis[]">
                                            </td>
                                            <td>
                                                <select @if($errors->has('agent_id.*'))
                                                        class="form-control is-invalid polises"
                                                        @else
                                                        class="form-control polises"
                                                        @endif id="polises" name="agent_id[]" style="width: 100%;">
                                                    @foreach($agents as $agent)
                                                        <option @if(old('agent_id[]') == $agent->user_id) selected
                                                                @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('insurer_fio.0')}}" @if($errors->has('insurer_fio.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="insurer_fio[]">
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('specialty.0')}}" @if($errors->has('specialty.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="specialty[]">
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('experience.0')}}" @if($errors->has('experience.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="experience[]">
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('position.0')}}" @if($errors->has('position.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="position[]">
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('time_stay.0')}}" @if($errors->has('time_stay.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="time_stay[]">
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('insurer_price.0')}}" data-field="value" @if($errors->has('insurer_price.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="insurer_price[]">
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('insurer_sum.0')}}" data-field="sum" @if($errors->has('insurer_sum.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="insurer_sum[]">
                                            </td>
                                            <td>
                                                <input type="text" value="{{old('insurer_premium.0')}}" data-field="premiya" @if($errors->has('insurer_premium.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="insurer_premium[]">
                                            </td>
                                        </tr>
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
                                            <input type="text" value="{{old('first_year')}}" class="form-control insurance_premium-0" data-field="year[]" name="first_year">
                                        </td>
                                        <td>
                                            <input type="text" value="{{old('first_turnover')}}" class="form-control forsum4 insurance_premium-0" data-field="turnover[]" name="first_turnover">
                                        </td>
                                        <td>
                                            <input type="text" value="{{old('first_profit')}}" class="form-control forsum3 insurance_premium-0" data-field="earnings[]" name="first_profit">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" value="{{old('second_year')}}" class="form-control insurance_premium-0" data-field="year[]" name="second_year">
                                        </td>
                                        <td>
                                            <input type="text" value="{{old('second_turnover')}}" class="form-control forsum4 insurance_premium-0" data-field="turnover[]" name="second_turnover">
                                        </td>
                                        <td>
                                            <input type="text" value="{{old('second_profit')}}" class="form-control forsum3  insurance_premium-0" data-field="earnings[]" name="second_profit">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input readonly type="text"  data-total-turnover class="form-control overall-sum4" />
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


                <div class="card-body" id="fields-changed">
                    <div id="product-fields-0-3">
                        <div id="product-fields-0-5">
                            <div class="form-group">
                                <label>Действовали ли Вы в такой или подобной деятельности под другим названием?</label>
                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="checkbox icheck-success">
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
                                                <textarea @if($errors->has('public_sector_comment'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif id="public-sector" name="public_sector_comment">{{old('public_sector_comment')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">В частном секторе</span>
                                                </div>
                                                <textarea id="private-sector" @if($errors->has('private_sector_comment'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="private_sector_comment">{{old('private_sector_comment')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="geographic-zone">Риски, связанные с вашей профессиональной деятельностью,
                                которые Вы опасаетесь больше всего</label>
                            <input type="text" value="{{old('prof_riski')}}" id="geographic-zone" name="prof_riski" @if($errors->has('prof_riski'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                        </div>

                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда Вам была предъявлена претензия или иск?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-true" value="true" @if(old('cases') == 'true') checked @endif>
                                        <label for="case-true">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-false" value="false" @if(old('cases') == 'false') checked @endif>
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
                                            <textarea @if($errors->has('reason_case'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="reason_case">{{old('reason_case')}}</textarea>
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
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-1" value="true" @if(old('administrative_case') == 'true') checked @endif>
                                        <label for="case-administrative-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-2" value="false" @if(old('administrative_case') == 'false') checked @endif>
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
                                            <textarea @if($errors->has('reason_administrative_case'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="reason_administrative_case">{{old('reason_administrative_case')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Сфера вашей профессиональной деятельности, в страховании которых, Вы нуждаетесь:</label>
                            <select required class="form-control payment-schedule" data-select-id="1" name="sfera_deyatelnosti" style="width: 100%; text-align: center">
                                <option selected disabled value="0">Выберите сферу профессиональной деятельности</option>
                                <option value="1" @if(old('sfera_deyatelnosti') == 1) selected @endif>аудит банков и кредитных учреждений;</option>
                                <option value="2" @if(old('sfera_deyatelnosti') == 2) selected @endif>аудит страховых организаций и обществ взаимного страхования;</option>
                                <option value="3" @if(old('sfera_deyatelnosti') == 3) selected @endif>аудит бирж, внебюджетных фондов и инвестиционных институтов;</option>
                                <option value="4" @if(old('sfera_deyatelnosti') == 4) selected @endif>общий аудит</option>
                            </select>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Запрашиваемый лимит ответственности:</label>
                            <select class="form-control payment-schedule" data-select-id="3" name="limit_otvetstvennosti" style="width: 100%; text-align: center">
                                <option selected disabled value="0">Выберите лимит ответственности</option>
                                <option value="1" @if(old('limit_otvetstvennosti') == 1) selected @endif>Годовой совокупный</option>
                                <option value="2" @if(old('limit_otvetstvennosti') == 2) selected @endif>По страховому случаю</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка необходимых документов</label>
                            <input value="{{old('documents.0')}}" @if($errors->has('documents.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif data-file="file" type="file" multiple name="documents[]">
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
                                            <td><input type="text" value="{{old('prem_sum.0')}}" @if($errors->has('prem_sum.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="prem_sum[]">
                                            </td>
                                            <td><input type="date" value="{{old('prem_from.0')}}" @if($errors->has('prem_from.*'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif name="prem_from[]">
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
                                        <input type="text" value="{{old('strahovaya_sum')}}" id="all-summ" name="strahovaya_sum" @if($errors->has('strahovaya_sum'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" value="{{old('franshiza')}}" id="all-frnshiza" name="franshiza" @if($errors->has('franshiza'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="all-premia">Страховая премия</label>
                                        <input type="text" value="{{old('strahovaya_purpose')}}" id="all-premia" name="strahovaya_purpose" @if($errors->has('strahovaya_purpose'))
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
                                                <input type="text" value="{{old('serial_number_policy')}}" id="polis-series" name="serial_number_policy" @if($errors->has('serial_number_policy'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="date_issue_policy" value="{{old('date_issue_policy')}}" type="date" @if($errors->has('date_issue_policy'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Ответственное лицо</label>
                                            <div class="input-group">
                                                <select class="form-control polises" id="otvet-litso" name="otvet_litso" style="width: 100%;">
                                                    @foreach($agents as $agent)
                                                        <option @if(old('otvet_litso') == $agent->user_id) selected
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
{{--                                        <input type="text" value="{{old('')}}" class="form-control r-3-one-0" name="driver_one_sum">--}}
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
{{--                                        <input type="text" value="{{old('')}}" class="form-control r-3-one-1-0" name="passenger_one_sum">--}}
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
{{--                                        <input type="text" value="{{old('')}}" class="form-control r-3-one-2-0" name="limit_one_sum">--}}
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
                                        <input type="file" id="questionnaire" name="anketa" @if($errors->has('address_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract" class="col-form-label">Договор</label>
                                        <input type="file" id="contract" name="dogovor" @if($errors->has('address_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis" class="col-form-label">Полис</label>
                                        <input type="file" id="polis" name="polis" @if($errors->has('address_insurer'))
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
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection

