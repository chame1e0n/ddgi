@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <form action="{{route('otvetstvennost-realtor.store')}}" method="POST" id="formRealtors">
        @include('errors.errors')
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
                                        <input type="text" id="insurer-name" name="fio_insurer"
                                               value="{{old('fio_insurer')}}" @if($errors->has('fio_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес
                                            страхователя</label>
                                        <input value="{{old('address_insurer')}}" type="text" id="insurer-address"
                                               name="address_insurer"
                                               @if($errors->has('address_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input value="{{old('tel_insurer')}}" type="text" id="insurer-phone"
                                               name="tel_insurer"
                                               @if($errors->has('tel_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input value="{{old('address_schet')}}" type="text" id="insurer-bill"
                                               name="address_schet"
                                               @if($errors->has('address_schet'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">Вид деятельности</label>
                                        <input type="text" id="insurer-type-activity" name="vid_deyatelnosti" value="{{old('vid_deyatelnosti')}}" @if($errors->has('vid_deyatelnosti'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input value="{{old('mfo_insurer')}}"  type="text" id="insurer-mfo" name="mfo_insurer"@if($errors->has('mfo_insurer'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <select @if($errors->has('bank_insurer'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="insurer-bank" name="bank_insurer"
                                                style="width: 100%;">
                                            <option>Выберите банк</option>
                                            @foreach($banks as $bank)
                                                @if(old('bank_insurer') == $bank->id)
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
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input value="{{old('inn_insurer')}}" type="text" id="insurer-inn"
                                               name="inn_insurer"
                                               @if($errors->has('inn_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif
                                        >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input value="{{old('okonx')}}" type="text" id="insurer-okonh" name="okonx"
                                               @if($errors->has('okonx'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input value="{{old('oked')}}" type="text" id="insurer-oked" name="oked"
                                               @if($errors->has('oked'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Информация о персонале
                                        </label>
                                        <textarea id="personal-info"
                                                  @if($errors->has('info_personal'))
                                                  class="form-control is-invalid"
                                                  @else
                                                  class="form-control"
                                                  @endif
                                                  name="info_personal">{{old('info_personal')}}
                                            </textarea>
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
                                                    <input value="{{old('insurance_from')}}" id="insurance_from" name="insurance_from" type="date"
                                                           @if($errors->has('insurance_from'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input value="{{old('insurance_to')}}" id="insurance_to" name="insurance_to" type="date"
                                                           @if($errors->has('insurance_to'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="geographic-zone">Географическая зона:</label>
                                        <input value="{{old('geo_zone')}}" type="text" id="geo_zone" name="geo_zone"
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
                                        <tr>

                                            <td>
                                                <input type="text" class="form-control">
                                            </td>
                                            <td>
                                                <select class="form-control
                                                 @if($errors->has('policy_series_id.*'))
                                                    is-invalid
                                                @endif
                                                    polises" id="polises" name="policy_series_id[]" style="width: 100%;">
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
                                                    form-control" name="from_date_polis[]">
                                            </td>
                                            <td>
                                                <input type="date" class="
                                                @if($errors->has('to_date_polis.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="to_date_polis[]">
                                            </td>
                                            <td>
                                                <select class="form-control
                                                 @if($errors->has('agent_id.*'))
                                                    is-invalid
                                                @endif
                                                    polises" id="polises" name="agent_id[]" style="width: 100%;">
                                                    @foreach($agents as $agent)
                                                        <option @if(old('agent_id[]') == $agent->user_id) selected
                                                                @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('insurer_fio.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_fio[]">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('specialty.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="specialty[]" value="Specialty">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('experience.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="experience[]" value="work experience">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('position.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="position[]">
                                            </td>
                                            <td>
                                                <input type="text" class="
                                                @if($errors->has('time_stay.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="time_stay[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="value" class="
                                                @if($errors->has('insurer_price.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_price[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="sum" class="
                                                @if($errors->has('insurer_sum.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_sum[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="premiya" class="
                                                @if($errors->has('insurer_premium.*'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="insurer_premium[]">
                                            </td>
                                            <td><input type="button" value="Удалить" data-action="delete" class="btn btn-warning"></td>
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
                                            <input type="text" class="form-control
                                             @if($errors->has('first_year'))
                                                is-invalid
                                            @endif
                                                insurance_premium-0" data-field="year[]" name="first_year" value="{{old('first_year')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('first_turnover'))
                                                is-invalid
                                            @endif
                                                forsum4 insurance_premium-0" data-field="turnover[]" name="first_turnover" value="{{old('first_turnover')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('first_profit'))
                                                is-invalid
                                            @endif
                                                forsum3 insurance_premium-0" data-field="earnings[]" name="first_profit" value="{{old('first_profit')}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control
                                             @if($errors->has('second_year'))
                                                is-invalid
                                            @endif
                                                insurance_premium-0" data-field="year[]" name="second_year" value="{{old('second_year')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control
                                            @if($errors->has('second_turnover'))
                                                is-invalid
                                            @endif
                                                forsum4 insurance_premium-0" data-field="turnover[]" name="second_turnover" value="{{old('second_turnover')}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3
                                             @if($errors->has('second_profit'))
                                                is-invalid
                                            @endif
                                                insurance_premium-0" data-field="earnings[]" name="second_profit" value="{{old('second_profit')}}">
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
                                                <input data-activity-period="from" name="activity_period_from" type="date" class="
                                                @if($errors->has('activity_period_from'))
                                                    is-invalid
                                                @endif
                                                    form-control"  value="{{old('activity_period_from')}}">
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
                                                    form-control"  value="{{old('activity_period_to')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="total-active-org">Всего:</label>
                                    <input readonly data-total="total-active-org" type="text" class="form-control" name="activity_period_all" value="{{old('activity_period_all')}}">
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
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-1" value="1">
                                            <label for="success-action-1">Да</label>
                                        </div>
                                        <div class="checkbox icheck-success">
                                            <input type="radio" class="other_insurance-0" name="acted" data-acted-radio id="success-action-2" value="0">
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
                                                <textarea class="
                                                @if($errors->has('public_sector_comment'))
                                                    is-invalid
                                                @endif
                                                    form-control" id="public-sector" name="public_sector_comment">{{old('public_sector_comment')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">В частном секторе</span>
                                                </div>
                                                <textarea id="private-sector" class="
                                                @if($errors->has('private_sector_comment'))
                                                    is-invalid
                                                @endif
                                                    form-control" name="private_sector_comment">{{old('private_sector_comment')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="geographic-zone">Риски, связанные с вашей профессиональной деятельностью,
                                которые Вы опасаетесь больше всего</label>
                            <input type="text" id="geographic-zone" name="prof_riski" class="
                            @if($errors->has('prof_riski'))
                                is-invalid
                            @endif
                                form-control" value="{{old('prof_riski')}}">
                        </div>

                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда Вам была предъявлена претензия или иск?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-true" value="1">
                                        <label for="case-true">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases" id="case-false" value="0">
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
                                            <textarea class="
                                            @if($errors->has('reason_case'))
                                                is-invalid
                                            @endif
                                                form-control" name="reason_case">{{old('reason_case')}}</textarea>
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
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-1" value="1">
                                        <label for="case-administrative-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio name="administrative_case" id="case-administrative-2" value="0">
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
                                            <textarea class="
                                            @if($errors->has('reason_administrative_case'))
                                                is-invalid
                                            @endif
                                                form-control" name="reason_administrative_case">{{old('reason_administrative_case')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Сфера вашей профессиональной деятельности, в страховании которых, Вы нуждаетесь:</label>
                            <select class="form-control
                             @if($errors->has('sfera_deyatelnosti'))
                                is-invalid
                            @endif
                                payment-schedule" data-select-id="1" name="sfera_deyatelnosti" style="width: 100%; text-align: center">
                                <option selected disabled>Выберите сферу профессиональной деятельности</option>
                                <option value="1">аудит банков и кредитных учреждений;</option>
                                <option value="2">аудит страховых организаций и обществ взаимного страхования;</option>
                                <option value="3">аудит бирж, внебюджетных фондов и инвестиционных институтов;</option>
                                <option value="4">общий аудит</option>
                            </select>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Запрашиваемый лимит ответственности:</label>
                            <select class="form-control
                             @if($errors->has('limit_otvetstvennosti'))
                                is-invalid
                            @endif
                                payment-schedule" data-select-id="3" name="limit_otvetstvennosti" style="width: 100%; text-align: center">
                                <option selected disabled>Выберите лимит ответственности</option>
                                <option value="1">Годовой совокупный</option>
                                <option value="2">По страховому случаю</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка необходимых документов</label>
                            <input class="
                            @if($errors->has('documents'))
                                is-invalid
                            @endif
                                form-control" data-file="file" type="file" multiple name="documents" value="{{old('documents')}}">
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
                    <div class="card card-success">
                        <div class="card-body">
                            <div id="payment-terms-form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Валюта взаиморасчетов</label>
                                            <select class="
                                            @if($errors->has('insurance_premium_currency'))
                                                is-invalid
                                            @endif
                                                form-control" id="walletNames"
                                                    style="width: 100%; text-align: center" name="insurance_premium_currency">
                                                <option selected="selected">UZS
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group
                                         @if($errors->has('poryadok_oplaty_premii'))
                                            is-invalid
                                        @endif
                                            form-inline justify-content-between">
                                            <label>Порядок оплаты страховой премии</label>
                                            <select class="form-control payment-schedule" name="poryadok_oplaty_premii"
                                                    onchange="showDiv('other-payment-schedule', this)"
                                                    style="width: 100%; text-align: center">
                                                <option value="1">Единовременно</option>
                                                <option value="other">Другое</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="all-summ">Cтраховая сумма</label>
                                            <input id="strahovaya_sum" name="strahovaya_sum" value="{{old('strahovaya_sum')}}"
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
                                            <input id="strahovaya_purpose" name="strahovaya_purpose" value="{{old('strahovaya_purpose')}}"
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
                                            <input id="franshiza" name="franshiza" value="{{old('franshiza')}}"
                                                   type="text" @if($errors->has('franshiza'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                </div>


                                <div id="other-payment-schedule" style="display: none;">
                                    <div class="form-group">
                                        <button type="button" onclick="addRow3()" class="btn btn-primary ">
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
                                                <td><input type="text" class="
                                                @if($errors->has('payment_sum.*'))
                                                        is-invalid
                                                    @endif
                                                        form-control" name="payment_sum[]"></td>
                                                <td><input type="date" class="
                                                @if($errors->has('payment_from.*'))
                                                        is-invalid
                                                    @endif
                                                form-control" name="payment_from[]"></td>
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
                                                <label for="polis-series" class="col-form-label">Серийный номер полиса страхования</label>
                                                <select type="text" id="serial_number_policy" name="serial_number_policy" @if($errors->has('serial_number_policy'))
                                                class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                    @endif>
                                                    <option value="0"></option>
                                                    @foreach($policySeries as $series)
                                                        <option @if(old('serial_number_policy') == $series->id) selected
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
                                                <input id="date_issue_policy" name="date_issue_policy" value="{{old('date_issue_policy')}}"
                                                       type="date" @if($errors->has('date_issue_policy'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso" class="col-form-label">Ответственное лицо</label>
                                                <select @if($errors->has('otvet_litso'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif id="otvet-litso" name="otvet_litso"
                                                        style="width: 100%;">
                                                    <option></option>
                                                    @foreach($agents as $agent)
                                                        <option @if(old('otvet_litso') == $agent->id) selected
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
                                            <input id="anketa_img" name="anketa_img" value="{{old('anketa')}}"
                                                   type="file" @if($errors->has('anketa_img'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            <input id="dogovor_img" name="dogovor_img" value="{{old('dogovor')}}"
                                                   type="file" @if($errors->has('dogovor_img'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Полис</label>
                                            <input id="polis_img" name="polis_img" value="{{old('polis')}}"
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
