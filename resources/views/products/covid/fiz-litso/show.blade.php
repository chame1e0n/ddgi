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
                @include('errors.errors')
                <div class="card-body">
                    @include('includes.client')

                    @include('includes.beneficiary')
                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-body">
                            <div id="anketa-fields">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Срок действия полиса</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input readonly value="{{$page->insurance_from}}" type="date" id="insurance_from"
                                                           name="insurance_from"
                                                           @if($errors->has('insurance_from'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Срок действия полиса</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input readonly value="{{$page->insurance_to}}" type="date" id="insurance_to"
                                                               name="insurance_to"
                                                               @if($errors->has('insurance_to'))
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
                        </div>
                    </div>
                </div>


                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Застрахованные лица</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" data-btn-covid-fiz class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">№</th>
                                        <th class="text-nowrap">Фамилия</th>
                                        <th class="text-nowrap">Имя</th>
                                        <th class="text-nowrap">Отчество</th>
                                        <th class="text-nowrap">Серия и номер паспорта</th>
                                        <th class="text-nowrap">Дата выдачи паспорта</th>
                                        <th class="text-nowrap">Место выдачи паспорта</th>
                                        <th class="text-nowrap">Номер полиса</th>
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
                                                    <input readonly type="text" class="@if($errors->has('person_number.*')) is-invalid @endif form-control" name="person_number[]" value="{{$info->person_number}}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('person_surname.*')) is-invalid @endif form-control" name="person_surname[]" value="{{$info->person_surname}}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('person_name.*')) is-invalid @endif form-control" name="person_name[]" value="{{$info->person_name}}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('person_lastname.*')) is-invalid @endif form-control" name="person_lastname[]" value="{{$info->person_lastname}}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('series_and_number_passport.*')) is-invalid @endif form-control" name="series_and_number_passport[]" value="{{$info->series_and_number_passport}}">
                                                </td>
                                                <td>
                                                    <input readonly type="date" class="@if($errors->has('date_of_issue_passport.*')) is-invalid @endif form-control" name="date_of_issue_passport[]" value="{{$info->date_of_issue_passport}}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('place_of_issue_passport.*')) is-invalid @endif form-control" name="place_of_issue_passport[]" value="{{$info->place_of_issue_passport}}">
                                                </td>
                                                <td>
                                                    <select disabled class="@if($errors->has('policy_series_id.*')) is-invalid @endif form-control polises" id="polis-series"
                                                            name="policy_series_id[]"
                                                            style="width: 100%;" required>
                                                        <option value="0"></option>
                                                        @foreach($policySeries as $series)
                                                            <option @if($info->policy_series_id == $series->id) selected
                                                                    @endif value="{{ $series->id }}">{{ $series->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('insurance_cost.*')) is-invalid @endif form-control" name="insurance_cost[]" value="{{$info->insurance_cost}}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('insurance_sum.*')) is-invalid @endif form-control" name="insurance_sum[]" value="{{$info->insurance_sum}}">
                                                </td>
                                                <td>
                                                    <input readonly type="text" class="@if($errors->has('insurance_premium.*')) is-invalid @endif form-control" name="insurance_premium[]" value="{{$info->insurance_premium}}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('person_number')) is-invalid @endif form-control" name="person_number[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('person_surname')) is-invalid @endif form-control" name="person_surname[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('person_name')) is-invalid @endif form-control" name="person_name[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('person_lastname')) is-invalid @endif form-control" name="person_lastname[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('series_and_number_passport')) is-invalid @endif form-control" name="series_and_number_passport[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="date" class="@if($errors->has('date_of_issue_passport')) is-invalid @endif form-control" name="date_of_issue_passport[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('place_of_issue_passport')) is-invalid @endif form-control" name="place_of_issue_passport[]" value="">
                                            </td>
                                            <td>
                                                <select disabled class="form-control polises" id="polis-series"
                                                        name="policy_series_id[]"
                                                        style="width: 100%;" required>
                                                    <option value="0"></option>
                                                    @foreach($policySeries as $series)
                                                        <option @if(old('policy_series_id') == $series->id) selected
                                                                @endif value="{{ $series->id }}">{{ $series->code }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('insurance_cost')) is-invalid @endif form-control" name="insurance_cost[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('insurance_sum')) is-invalid @endif form-control" name="insurance_sum[]" value="">
                                            </td>
                                            <td>
                                                <input readonly type="text" class="@if($errors->has('insurance_premium')) is-invalid @endif form-control" name="insurance_premium[]" value="">
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="8" style="text-align: right"><label class="text-bold">Итого</label>
                                        </td>
                                        <td><input readonly readonly type="text" data-insurance-stoimost class="form-control overall-sum2" />
                                        </td>
                                        <td><input readonly readonly type="text" data-insurance-sum class="form-control overall-sum4" />
                                        </td>
                                        <td><input readonly readonly type="text" data-insurance-award class="form-control overall-sum3" />
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
                                            <input readonly id="strahovaya_sum" name="strahovaya_sum" value="{{$page->strahovaya_sum}}"
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
                                            <input readonly id="strahovaya_purpose" name="strahovaya_purpose" value="{{$page->strahovaya_purpose}}"
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
                                            <input readonly id="franshiza" name="franshiza" value="{{$page->franshiza}}"
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
                                            <select disabled name="currencies" @if($errors->has('currencies'))
                                            class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="walletNames" style="width: 100%; text-align: center">
                                                <option selected="selected" value="{{$page->currencies}}">{{$page->currencies}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Порядок оплаты страховой премии</label>
                                            <select disabled id="condition" class="form-control
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
                                            <select disabled class="form-control payment-schedule" name="sposob_rascheta" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                                @foreach(config('app.sposob_rascheta') as $key => $sposob)
                                                    <option value="{{$key}}" @if($page->sposob_rascheta == $key) selected @endif>{{$sposob}}</option>
                                                @endforeach
                                            </select>
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
                                                <td><input readonly type="text" class="form-control" name="payment_sum[]"></td>
                                                <td><input readonly type="date" class="form-control" name="payment_from[]">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
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
                                            <input readonly id="serial_number_policy" name="serial_number_policy" value="{{$page->serial_number_policy}}"
                                                   type="text" @if($errors->has('serial_number_policy'))
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
                                            <input readonly id="date_issue_policy" name="date_issue_policy" value="{{$page->date_issue_policy}}"
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
                                            <select disabled @if($errors->has('litso'))
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
                                        <img src="/storage/{{$page->anketa_img}}" alt="Анкета" width="250" height="250">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/{{$page->dogovor_img}}" alt="Договор" width="250" height="250">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/{{$page->polis_img}}" alt="Полис" width="250" height="250">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
