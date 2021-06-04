@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-imushestvo3x.update', $page->id)}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="client-product-form">
                            <div class="form-group clearfix">
                                <label>Типы клиента</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-1" @if($page->type == 0) checked @endif value="0">
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-2" @if($page->type == 1) checked @endif value="1">
                                            <label for="client-type-radio-2">юр. лицо</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2" name="product_id" style="width: 100%;">
                                    <option selected="selected">говно</option>
                                    <option selected="selected">говно 2</option>
                                    <option value="1">asdc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @include('errors.errors')
                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
                </div>
                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor_num" class="col-form-label">Номер договора</label>
                                    <input type="text" id="dogovor_num" name="unique_number" value="{{$page->unique_number}}" class="form-control @if($errors->has('unique_number')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="dogovor_date" class="col-form-label">Дата договора</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input id="dogovor_date" name="insurance_from" value="{{$page->insurance_from}}" type="date" class="form-control @if($errors->has('insurance_from')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor-strah-vigod-num" class="col-form-label">Номер договора между страхователем и выгодоприобритателем</label>
                                    <input required type="text" id="dogovor-lizing-num" name="nomer_dogovor_strah_vigod" value="{{$page->nomer_dogovor_strah_vigod}}" class="form-control @if($errors->has('nomer_dogovor_strah_vigod')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor-strah-vigod-date" class="col-form-label">Дата договора между страхователем и выгодоприобритателем</label>
                                    <input required type="date" id="dogovor-lizing-date" name="date_dogovor_strah_vigod" value="{{$page->date_dogovor_strah_vigod}}" class="form-control @if($errors->has('date_dogovor_strah_vigod')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="period_date" class="col-form-label">Период страхования</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input required id="period_date" name="object_from_date" value="{{$page->object_from_date}}" type="date" class="form-control @if($errors->has('object_from_date')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="period_date" class="col-form-label">Период страхования</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">до</span>
                                    </div>
                                    <input required id="period_date" name="object_to_date" value="{{$page->object_to_date}}" type="date" class="form-control @if($errors->has('object_to_date')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="osnovanie_otsenki" class="col-form-label">Основание для оценки</label>
                                    <input required type="text" id="osnovanie_otsenki" name="ocenka_osnovaniya" value="{{$page->ocenka_osnovaniya}}" class="form-control @if($errors->has('ocenka_osnovaniya')) is-invalid @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="geo" class="col-form-label">Местонахождение</label>
                                    <input required type="text" id="geo" name="location" value="{{$page->location}}" class="form-control @if($errors->has('location')) is-invalid @endif">
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
                                        <th class="text-nowrap">Кол-во</th>
                                        <th class="text-nowrap">Единицы измерения</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($page->infos as $info)
                                        <tr id="{{$info->id}}">
                                            <td>
                                                <input required type="text" class="@if($errors->has('name_property.'.$loop->index)) is-invalid @endif form-control" name="name_property[]"
                                                       value="{{$info->name_property}}">
                                            </td>
                                            <td>
                                                <input required type="text" class="@if($errors->has('place_property.'.$loop->index)) is-invalid @endif form-control" name="place_property[]"
                                                       value="{{$info->place_property}}">
                                            </td>
                                            <td>
                                                <input required type="date" class="form-control @if($errors->has('date_of_issue_property.'.$loop->index)) is-invalid @endif "
                                                       name="date_of_issue_property[]"
                                                       value="{{$info->date_of_issue_property}}">
                                            </td>
                                            <td>
                                                <input required type="text" class="form-control @if($errors->has('count_property.'.$loop->index)) is-invalid @endif " name="count_property[]"
                                                       value="{{$info->count_property}}">
                                            </td>
                                            <td>
                                                <select class="form-control polises @if($errors->has('units_property.'.$loop->index)) is-invalid @endif " id="polises"
                                                        name="units_property[]" style="width: 100%;">
                                                    <option selected="selected" value="1">Кв.м</option>
                                                    <option value="2">Кв.см</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input required type="text" data-field="value" class="form-control @if($errors->has('insurance_cost.'.$loop->index)) is-invalid @endif "
                                                       name="insurance_cost[]" value="{{$info->insurance_cost}}">
                                            </td>
                                            <td>
                                                <input required type="text" data-field="sum" class="form-control @if($errors->has('insurance_sum.'.$loop->index)) is-invalid @endif "
                                                       name="insurance_sum[]" value="{{$info->insurance_sum}}">
                                            </td>
                                            <td>
                                                <input required type="text" data-field="premiya" class="form-control @if($errors->has('insurance_premium.'.$loop->index)) is-invalid @endif "
                                                       name="insurance_premium[]" value="{{$info->insurance_premium}}">
                                            </td>
                                            <td>
                                                <input onclick="removeAndCalc({{$info->id}})" type="button"
                                                       value="Удалить" data-action="delete" class="btn btn-warning">
                                            </td>
                                        </tr>
                                    @endforeach
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие пожарной сигнализации и средств пожаротушения</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')"
                                                    type="radio" class="other_insurance-0" name="fire_alarm_file_check"
                                                    @if($page->fire_alarm_file) checked @endif id="radioSuccess1" @if($page->fire_alarm_file == null)  value="1"
                                                    @else   value="2" @endif>
                                                <label for="radioSuccess1">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)"
                                                    type="radio" class="other_insurance-0" name="fire_alarm_file_check"
                                                    @if($page->fire_alarm_file == null) checked
                                                    @endif id="radioSuccess2" value="0">
                                                <label for="radioSuccess2">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess2="" @if(!$page->fire_alarm_file) style="display: none;"
                                     @endif class="form-group other_insurance_info-0">
                                    <label>Прикрепите сертификат</label>
                                    <input class="form-control" type="file" name="fire_alarm_file" value="{{$page->fire_alarm_file}}">
                                    @if($page->fire_alarm_file)  <a
                                        href="/storage/{{$page->fire_alarm_file}}">Скачать</a> @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие охранной сигнализации и средств защиты/охраны</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')"
                                                    type="radio" class="other_insurance-0"
                                                    @if($page->security_file) checked @endif name="security_file_check"
                                                    id="radioSuccess1-0" @if($page->security_file == null) value="1"
                                                    @else   value="2" @endif>
                                                <label for="radioSuccess1-0">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)"
                                                    type="radio" class="other_insurance-0"
                                                    @if($page->security_file == null) checked
                                                    @endif name="security_file_check" id="radioSuccess2-0" value="0">
                                                <label for="radioSuccess2-0">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess1="" @if(!$page->security_file) style="display: none;"
                                     @endif class="form-group other_insurance_info">
                                    <label>Прикрепите сертификат</label>
                                    <input class="form-control" type="file" name="security_file" value="{{$page->security_file}}">
                                    @if($page->fire_alarm_file)<a
                                        href="/storage/{{$page->security_file}}">Скачать</a> @endif
                                </div>
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
                                        <input required type="text" id="summ-1" name="franshize_percent_1" class="form-control @if($errors->has('franshize_percent_1')) is-invalid @endif" value="{{$page->franshize_percent_1}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="summ-2">% от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                        <input required type="text" id="summ-2" name="franshize_percent_2" class="form-control @if($errors->has('franshize_percent_2')) is-invalid @endif" value="{{$page->franshize_percent_2}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">% от страховой суммы по другим рискам по каждому <br> убытку и/или по всем убыткам в результате каждого <br> страхового случая</label>
                                        <input required type="text" id="geographic-zone" name="franshize_percent_3" class="form-control @if($errors->has('franshize_percent_3')) is-invalid @endif" value="{{$page->franshize_percent_3}}">
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
                                        <input type="text" id="all-summ" name="insurance_sum_prod" class="form-control" value="{{$page->insurance_sum}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" class="form-control" value="{{$page->insurance_bonus}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" class="form-control" value="{{$page->franchise}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames" style="width: 100%; text-align: center">

                                            <option @if($page->insurance_premium_currency) selected @endif name="insurance_premium_currency">UZS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" class="form-control payment-schedule" name="payment_term" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->payment_term === '1') selected @endif>Единовременно</option>
                                            <option value="transh" @if($page->payment_term === 'transh') selected @endif>Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control payment-schedule" name="sposob_rascheta" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->sposob_rascheta === '1') selected @endif>Сумах</option>
                                            <option value="2" @if($page->sposob_rascheta === '2') selected @endif>Сумах В ин. валюте</option>
                                            <option value="3" @if($page->sposob_rascheta === '3') selected @endif>В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option value="4" @if($page->sposob_rascheta === '4') selected @endif>В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="4" @if($page->sposob_rascheta === '5') selected @endif>В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule"
                                 @if($page->payment_term == '1') class="d-none" @endif>
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
                                                    <td><input type="text" class="
                                                        @if($errors->has('payment_sum.'.$loop->index))
                                                            is-invalid
                                                        @endif form-control" name="payment_sum[]" value="{{$prem->payment_sum}}">
                                                    </td>
                                                    <td><input type="date"
                                                               class="@if($errors->has('payment_from.'.$loop->index))
                                                                   is-invalid
                                                    @endif form-control" name="payment_from[]" value="{{$prem->payment_from}}">
                                                    </td>
                                                    <td>
                                                        <input type="button" value="Удалить" data-action="delete"
                                                               class="btn btn-warning"
                                                               onclick="removeEl({{$prem->id}})">
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
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('tarif', 'data-tarif-descr')"
                                           class="form-check-input client-type-radio" type="checkbox" name="tarif"
                                           id="tarif" @if($page->tarif_other) checked @endif @if(!empty(old('tarif'))) checked @endif>
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr
                                     @if(!$page->tarif_other && empty(old('tarif'))) style="display: none" @endif>
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input class="form-control" id="descrTarif" type="number" name="tarif_other"
                                           value="{{$page->tarif_other}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')"
                                           class="form-check-input client-type-radio" type="checkbox" name="preim"
                                           id="preim" @if($page->premiya_other) checked @endif  @if(!empty(old('preim'))) checked @endif>
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr
                                     @if(!$page->premiya_other && empty(old('preim'))) style="display: none" @endif>
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input class="form-control" id="descrPreim" type="number" name="premiya_other"
                                           value="{{$page->premiya_other}}">
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
                                    @if($page->application_form_file)<a href="/storage/{{$page->application_form_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input  id="anketa_img" name="application_form_file" value="{{$page->application_form_file}}"
                                                type="file" @if($errors->has('application_form_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->contract_file)<a href="/storage/{{$page->contract_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input  id="dogovor_img" name="contract_file" value="{{$page->contract_file}}"
                                                type="file" @if($errors->has('contract_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->policy_file)<a href="/storage/{{$page->policy_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input  id="polis_img" name="policy_file" value="{{$page->policy_file}}"
                                                type="file" @if($errors->has('policy_file'))
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
                                        @if($page->passport_copy)<a href="/storage/{{$page->passport_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Паспорт</label>
                                            <input  id="copy_passport" name="passport_copy" value="{{$page->passport_copy}}"
                                                    type="file" @if($errors->has('passport_copy'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($page->dogovor_copy)<a href="/storage/{{$page->dogovor_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            <input  id="copy_dogovor" name="dogovor_copy" value="{{$page->dogovor_copy}}"
                                                    type="file" @if($errors->has('dogovor_copy'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($page->spravka_copy)<a href="/storage/{{$page->spravka_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Справки</label>
                                            <input  id="copy_spravki" name="spravka_copy" value="{{$page->spravka_copy}}"
                                                    type="file" @if($errors->has('spravka_copy'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($page->other_copy)<a href="/storage/{{$page->other_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Другие</label>
                                            <input  id="copy_drugie" name="other_copy" value="{{$page->other_copy}}"
                                                    type="file" @if($errors->has('other_copy'))
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
    </form>

@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
