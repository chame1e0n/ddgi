@extends('layouts.index')

@section('content')
    <form action="{{route('broker.update', $all_product->id)}}" method="post" enctype="multipart/form-data"
          id="formBrokers">
        @csrf
        @method('put')
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
                                        <label for="insurer-name" class="col-form-label">Наименования</label>
                                        <input type="text" id="insurer-name" name="fio_insurer"
                                               value="{{$all_product->policyHolder->FIO}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Адрес
                                            страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer"
                                               value="{{$all_product->policyHolder->address}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-phone" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-phone"
                                               value="{{$all_product->policyHolder->phone_number}}" name="phone_insurer"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bill" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-bill" name="payment_bill"
                                               value="{{$all_product->policyHolder->checking_account}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-type-activity" class="col-form-label">Вид
                                            деятельности</label>
                                        <input type="text" id="insurer-type-activity"
                                               value="{{$all_product->policyHolder->vid_deyatelnosti}}"
                                               name="insurer_type_active"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer"
                                               value="{{$all_product->policyHolder->mfo}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="insurer-bank"
                                               value="{{$all_product->policyHolder->bank_id}}" name="bank_insurer"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-okonh"
                                               value="{{$all_product->policyHolder->inn}}" name="inn_insurer"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="insurer-okonh" name="okonh_insurer"
                                               value="{{$all_product->policyHolder->okonx}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-oked" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-oked" name="oked_insurer"
                                               value="{{$all_product->policyHolder->oked}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="personal-info" class="col-form-label">Информация о персонале
                                        </label>
                                        <textarea id="personal-info" class="form-control" name="info_personal"
                                                  required>{{$all_product->policyHolder->info_personal}}</textarea>
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
                                                    <input id="insurance-from" name="insurance_from"
                                                           value="{{$all_product->insurance_from}}" type="date"
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
                                                    <input id="insurance-to" name="insurance_to"
                                                           value="{{$all_product->insurance_to}}" type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="geograph-zone">Географическая зона:</label>
                                        <input type="text" id="geograph-zone" name="geo_zone" class="form-control">
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
                                        @if($all_product->allProductInfoTransport[0]->policy_series_id !== null)
                                            @foreach($all_product->allProductInfoTransport[0]->policy_series_id as $key=>$item)
                                                <tr id="${id}">
                                                    <td>
                                                        <input type="text" class="form-control" name="policy_num[]" value="{{$all_product->allProductInfoTransport[0]->policy_num[$key]}}">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               name="policy_series_id[]" value="{{$all_product->allProductInfoTransport[0]->policy_series_id[$key]}}" required>
                                                    </td>
                                                    <td>
                                                        <input type="date" name="from_date_polis[]" value="{{$all_product->allProductInfoTransport[0]->from_date_polis[$key]}}" class="form-control"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="date_polis_from[]" value="{{$all_product->allProductInfoTransport[0]->date_polis_from[$key]}}"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control" name="date_polis_to[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->date_polis_to[$key]}}"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <select class="form-control polises" id="polise_agents"
                                                                name="agent_id[]" style="width: 100%;" required>
                                                            @foreach($agents as $agent)
                                                                <option value="{{$agent->id}}"
                                                                        @if($agent->id == $all_product->allProductInfoTransport[0]->agents[$key]) selected @endif>{{$agent->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="insurer_fio[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->insurer_fio[$key]}}"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="specialty[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->specialty[$key]}}"
                                                               value="Specialty" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="experience[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->experience[$key]}}"
                                                               value="work experience" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="position[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->position[$key]}}"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="time_stay[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->time_stay[$key]}}"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" data-field="value"
                                                               name="insurer_price[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->insurer_price[$key]}}"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" data-field="sum"
                                                               value="{{$all_product->allProductInfoTransport[0]->insurer_sum[$key]}}"
                                                               name="insurer_sum[]" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" data-field="premiya"
                                                               name="insurer_premium[]"
                                                               value="{{$all_product->allProductInfoTransport[0]->insurer_premium[$key]}}"
                                                               required>
                                                    </td>
                                                    <td>
                                                        <input onclick="removeAndCalc(${id})" type="button"
                                                               value="Удалить" data-action="delete"
                                                               class="btn btn-warning">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        <tbody>
                                        <tr>
                                            <td colspan="11" style="text-align: right"><label
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
                                <table class="table table-hover table-head-fixed" data-annual-turnover-info
                                       id="empTable">
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
                                                   data-field="year" name="year_one" value="{{$all_product->year_one}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 insurance_premium-0"
                                                   data-field="turnover" name="annual_turnover_one" value="{{$all_product->annual_turnover_one}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0"
                                                   data-field="earnings" name="net_profit_one" value="{{$all_product->net_profit_one}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0"
                                                   data-field="year" name="year_two" value="{{$all_product->year_two}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0"
                                                   data-field="turnover" name="annual_turnover_two" value="{{$all_product->annual_turnover_two}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 insurance_premium-0"
                                                   data-field="earnings" name="net_profit_two" value="{{$all_product->net_profit_two}}">
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
                                                <input data-activity-period="from" name="activity_period_from"
                                                       value="{{$all_product->activity_period_from}}"
                                                       type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input data-activity-period="to" name="activity_period_to"
                                                       value="{{$all_product->activity_period_to}}"
                                                       type="date"
                                                       class="form-control">
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
                        <div class="form-group">
                            <label>Действовали ли Вы в такой или подобной деятельности под другим названием?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" name="acted" @if($all_product->acted =="1") checked @endif data-acted-radio
                                               id="success-action-1" value="1">
                                        <label for="success-action-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" name="acted" @if($all_product->acted =="false") checked @endif data-acted-radio
                                               id="success-action-2" value="false">
                                        <label for="success-action-2">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2-show-0" data-acted="true" @if($all_product->acted !== "1") style="display: none;" @endif>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">В гос. секторе</span>
                                            </div>
                                            <textarea class="form-control" id="public-sector"
                                                      name="public_sector_comment" required>{{$all_product->public_sector_comment}}</textarea>
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
                                                      name="private_sector_comment" required>{{$all_product->public_sector_comment}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="geographic-zone">Риски, связанные с вашей профессиональной деятельностью,
                                которые Вы опасаетесь больше всего</label>
                            <input type="text" id="geographic-zone" name="professional_risks" value="{{$all_product->professional_risks}}" class="form-control">
                        </div>


                        <div class="form-group">
                            <label>Были ли в Вашей практике случаи, когда Вам была предъявлена претензия или
                                иск?</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases"
                                               @if($all_product->cases =="1") checked @endif
                                               id="case-true" value="1">
                                        <label for="case-true">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-cases-radio name="cases"
                                               id="case-false"
                                               @if($all_product->cases =="false") checked @endif
                                               value="false">
                                        <label for="case-false">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2-show-0" data-cases-reason="true"
                                 @if($all_product->cases !=="1") style="display: none;" @endif>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Причина</span>
                                            </div>
                                            <textarea class="form-control" name="reason_case" required>{{$all_product->reason_case}}</textarea>
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
                                               name="administrative_case" id="case-administrative-1"
                                               @if($all_product->administrative_case =="1") checked @endif
                                               value="1">
                                        <label for="case-administrative-1">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-0" data-administr-radio
                                               name="administrative_case" id="case-administrative-2"
                                               @if($all_product->administrative_case =="false") checked @endif
                                               value="false">
                                        <label for="case-administrative-2">Нет</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row r-2-show-0" data-administr-case="true"
                                 @if($all_product->administrative_case =="false") style="display: none;" @endif>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Причина</span>
                                            </div>
                                            <textarea class="form-control" name="reason_administrative_case"
                                                      required>{{$all_product->reason_administrative_case}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-inline justify-content-between">
                            <label>Сфера вашей профессиональной деятельности, в страховании которых, Вы
                                нуждаетесь:</label>
                            <select class="form-control payment-schedule" data-select-id="1" name="sphereOfActivity"
                                    style="width: 100%; text-align: center">
                                <option selected disabled>Выберите сферу профессиональной деятельности</option>
                                <option @if($all_product->sphereOfActivity == '1') selected @endif value="1">аудит банков и кредитных учреждений;</option>
                                <option @if($all_product->sphereOfActivity == '2') selected @endif value="2">аудит страховых организаций и обществ взаимного страхования;</option>
                                <option @if($all_product->sphereOfActivity == '3') selected @endif value="3">аудит бирж, внебюджетных фондов и инвестиционных институтов;</option>
                                <option @if($all_product->sphereOfActivity == '4') selected @endif value="4">общий аудит</option>
                            </select>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Профессиональные услуги, в страховании которых Вы нуждаетесь:</label>
                            <select class="form-control payment-schedule" data-select-id="2"
                                    name="profInsuranceServices" style="width: 100%; text-align: center">
                                <option selected disabled>Выберите услугу</option>
                                <option @if($all_product->profInsuranceServices == '1') selected @endif value="1">постановка, восстановление и ведение бухгалтерского учета;</option>
                                <option @if($all_product->profInsuranceServices == '2') selected @endif value="2">составление финансовой отчетности;</option>
                                <option @if($all_product->profInsuranceServices == '3') selected @endif value="3">перевод национальной финансовой отчетности на международные стандарты
                                    бухгалтерского учета;
                                </option>
                                <option @if($all_product->profInsuranceServices == '4') selected @endif value="4">анализ финансово-хозяйственной деятельности хозяйствующих субъектов;
                                </option>
                                <option @if($all_product->profInsuranceServices == '5') selected @endif value="5">консалтинг по бухгалтерскому учету, налогообложению, планированию,
                                    менеджменту и другим вопросам финансово-хозяйственной деятельности;
                                </option>
                                <option @if($all_product->profInsuranceServices == '6') selected @endif value="6">составление расчетов и деклараций по налогам и другим обязательным
                                    платежам.
                                </option>
                            </select>
                        </div>

                        <div class="form-group form-inline justify-content-between">
                            <label>Запрашиваемый лимит ответственности:</label>
                            <select class="form-control payment-schedule" data-select-id="3" name="liabilityLimit"
                                    style="width: 100%; text-align: center">
                                <option selected disabled>Выберите лимит ответственности</option>
                                <option @if($all_product->liabilityLimit == '1') selected @endif value="1">Годовой совокупный</option>
                                <option @if($all_product->liabilityLimit == '2') selected @endif value="2">По страховому случаю</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="pretensii-final-settlement-date">Загрузка необходимых
                                документов</label>
                            <input class="form-control" data-file="file" type="file" multiple name="retransferAktFile">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input type="text" id="all-summ" name="insurance_sum" value="{{$all_product->insurance_sum}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" value="{{$all_product->insurance_bonus}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" value="{{$all_product->franchise}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames"
                                                name="insurance_premium_currency"
                                                style="width: 100%; text-align: center">
                                            <option @if($all_product->insurance_premium_currency == '1') selected @endif value="1" name="insurance_premium_currency">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" class="form-control payment-schedule" name="payment_term"
                                                style="width: 100%; text-align: center">
                                            <option @if($all_product->payment_term == '1') selected @endif value="1">Единовременно</option>
                                            <option @if($all_product->payment_term == 'transh') selected @endif value="transh">Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control payment-schedule" name="way_of_calculation"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option @if($all_product->way_of_calculation == '1') selected @endif value="1">Сумах</option>
                                            <option @if($all_product->way_of_calculation == '2') selected @endif value="2">Сумах В ин. валюте</option>
                                            <option @if($all_product->way_of_calculation == '3') selected @endif value="3">В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option @if($all_product->way_of_calculation == '4') selected @endif value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option @if($all_product->way_of_calculation == '5') selected @endif value="5">В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule" @if($all_product->payment_term !== 'transh') class="d-none" @endif>
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
                                            <td><input type="text" class="form-control" name="payment_sum_main" value="{{$all_product->payment_sum_main}}"></td>
                                            <td><input type="date" class="form-control" name="payment_from_main" value="{{$all_product->payment_from_main}}">
                                            </td>
                                        </tr>
                                        @if(!empty($all_product->allProductCurrencyTerms[0]->payment_sum))
                                            @foreach($all_product->allProductCurrencyTerms[0]->payment_sum as $key=>$item)
                                                <tr id="${id}" data-field-number="0">
                                                    <td>
                                                        <input type="text" class="form-control"
                                                               value="{{$all_product->allProductCurrencyTerms[0]->payment_sum[$key]}}"
                                                               name="payment_sum[]">
                                                    </td>
                                                    <td>
                                                        <input type="date" class="form-control"
                                                               value="{{$all_product->allProductCurrencyTerms[0]->payment_from[$key]}}"
                                                               name="payment_from[]">
                                                    </td>
                                                    <td>
                                                        <input type="button" onclick="removeEl(${id})" value="Удалить"
                                                               class="btn btn-warning">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('tarif', 'data-tarif-descr')"
                                           class="form-check-input client-type-radio" type="checkbox" name="tarif"
                                           @if($all_product->tariff == 'tariff') checked @endif
                                           value="tariff"
                                           id="tarif">
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" @if($all_product->tariff !== 'tariff') style="display: none" @endif data-tarif-descr>
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input class="form-control" name="tariff_other" value="{{$all_product->tarif_other}}" id="descrTarif" type="number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')"
                                           class="form-check-input client-type-radio" type="checkbox" name="preim"
                                           @if($all_product->preim == 'preim') checked @endif
                                           value="preim"
                                           id="preim">
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr @if($all_product->preim !== 'preim') style="display: none" @endif>
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input class="form-control" name="premiya_other" value="{{$all_product->premiya_other}}" id="descrPreim" type="number">
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
                                            <input type="text" id="polis-series" name="policy_series"
                                                   value="{{$all_product->allProductInfo->policy_series}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="policy_insurance_from"
                                                   value="{{$all_product->allProductInfo->policy_insurance_from}}"
                                                   type="date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="litso"
                                                    style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}"
                                                            @if($agent->id == $all_product->allProductInfo->otvet_litso) selected @endif>{{$agent->name}}
                                                    </option>
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
                                        <input type="file" id="geographic-zone" name="application_form_file"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="contract_file"
                                               class="form-control">
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
                <!-- раздел 3 - да - show -->
                <div class="table-responsive p-0 r-3-show-0" style="display: none;
">
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
                                <td><input type="number" class="form-control r-3-premia-0" name="driver_preim_sum"
                                           id="driver_total_sum-0">
                                </td>
                            </tr>
                            <tr>
                                <td><label>Пассажиры</label></td>
                                <td><input type="number" class="form-control r-3-pass-1-0" name="passenger_quantity">
                                </td>
                                <td>a
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
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
    <form action="{{route('broker.destroy', $all_product->id)}}" method="post">
        @csrf
        @method('delete')
        <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right">Удалить</button>
        </div>
    </form>
@endsection
