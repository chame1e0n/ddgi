@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-imushestvo.store')}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
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
                @include('includes.messages')

                @include('includes.contract')

                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
                </div>
                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dogovor-lizing-num" class="col-form-label">Договора лизинга №</label>
                                                <input required type="text" id="dogovor-lizing-num" name="dogovor_lizing_num" class="form-control" value="{{old('dogovor_lizing_num')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Период</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input required id="insurance_from" name="insurance_from" type="date" class="form-control" value="{{old('insurance_from')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Период</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input required id="insurance_to" name="insurance_to" type="date" class="form-control" value="{{old('insurance_to')}}">
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
                                        <th class="text-nowrap">Кол-во шт.</th>
                                        <th class="text-nowrap">Единицы измерения</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input required type="text" class="form-control" name="name_property[]" value="{{old('name_property')}}">
                                        </td>
                                        <td>
                                            <input required type="text" class="form-control" name="place_property[]" value="{{old('place_property')}}">
                                        </td>
                                        <td>
                                            <input required type="date" class="form-control" name="date_of_issue_property[]" value="{{old('date_of_issue_property')}}">
                                        </td>
                                        <td>
                                            <input required type="text" class="form-control" name="count_property[]" value="{{old('count_property')}}">
                                        </td>
                                        <td>
                                            <select class="form-control polises" id="polises" name="units_property[]" style="width: 100%;">
                                                <option selected="selected" value="1">Кв.м</option>
                                                <option value="2">Кв.см</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input required type="text" data-field="value" class="form-control" name="insurance_cost[]" value="{{old('insurance_cost')}}">
                                        </td>
                                        <td>
                                            <input required type="text" data-field="sum" class="form-control" name="insurance_sum[]" value="{{old('insurance_sum')}}">
                                        </td>
                                        <td>
                                            <input required type="text" data-field="premiya" class="form-control" name="insurance_premium[]" value="{{old('insurance_premium')}}">
                                        </td>
                                    </tr>
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
                        <div class="col-md-12">
                            <div class="icheck-success ">
                                <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="plans" id="tarif"
                                value="{{old('plans')}}">
                                <label class="form-check-label" for="tarif">Тариф</label>
                            </div>
                            <!-- TODO: Блок должен находится в скрытом состоянии
                            отображаться только тогда, когда выбран checkbox "Тариф"
                            -->
                            <div class="form-group" data-tarif-descr @if(!old('plans'))style="display: none" @endif>
                                <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                <input class="form-control" id="descrTarif" type="number" name="plans_percent" value="{{old('plans_percent')}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Общая страховая стоимость </label>
                                        <input required type="text" id="geographic-zone" name="total_insurance_cost" class="form-control" value="{{old('total_insurance_cost')}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Ответственное лицо</label>
                                        <select @if($errors->has('zalog_otvet_litso'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="zalog_otvet_litso" name="zalog_otvet_litso"
                                                style="width: 100%;" required>
                                            <option></option>
                                            @foreach($agents as $agent)
                                                <option @if(old('zalog_otvet_litso') == $agent->id) selected
                                                        @endif value="{{ $agent->id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Дата выдачи страхового полиса (клиенту)</label>
                                        <input required type="date" class="form-control" name="date_of_issue_police">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="geographic-zone">Серийный номер полиса страхования</label>
                                            <select class="@if($errors->has('policy_series_id')) is-invalid @endif  form-control polises" id="policy_series_id"
                                                    name="policy_series_id"
                                                    style="width: 100%;" required>
                                                <option value="0"></option>
                                                @foreach($policySeries as $series)
                                                    <option @if(old('policy_series_id') == $series->id) selected
                                                            @endif value="{{ $series->id }}">{{ $series->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Место страхования:</label>
                                        <input required type="text" id="place_of_insurance" name="place_of_insurance" class="form-control" value="{{old('place_of_insurance')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="currency_of_mutual">Валюта взаиморасчетов</label>
                                    <select class="form-control polises" id="walletNames" name="currency_of_mutual" style="width: 100%;">
                                        <option selected="selected">UZS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="summ-1">Страховая сумма для закрытого склада с общим объемом</label>
                                        <input required type="text" id="summ-1" name="insurance_amount_for_closed" class="form-control" value="{{old('insurance_amount_for_closed')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="summ-2">Страховая сумма для открытого склада с общим площадью</label>
                                        <input required type="text" id="summ-2" name="insurance_amount_for_open" class="form-control" value="{{old('insurance_amount_for_open')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input required type="text" id="geographic-zone" name="strahovaya_purpose_1" class="form-control" value="{{old('strahovaya_purpose_1')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="polises">Условия оплаты страховой премии</label>
                                    <select class="form-control polises" id="polises" name="poryadok_oplaty_premii_1" style="width: 100%;">
                                        <option selected="selected" value="1">Единовременная</option>
                                    </select>
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
                                            <input required type="text" id="summ-1" name="franshiza_1" class="form-control" value="{{old('franshiza_1')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="summ-2">% от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                            <input required type="text" id="summ-2" name="franshiza_2" class="form-control" value="{{old('franshiza_2')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="geographic-zone">% от страховой суммы по другим рискам по каждому <br> убытку и/или по всем убыткам в результате каждого <br> страхового случая</label>
                                            <input required type="text" id="geographic-zone" name="franshiza_3" class="form-control" value="{{old('franshiza_3')}}">
                                        </div>
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
                                        <input required id="strahovaya_sum" name="strahovaya_sum" value="{{old('strahovaya_sum')}}"
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
                                        <input required id="strahovaya_purpose" name="strahovaya_purpose" value="{{old('strahovaya_purpose')}}"
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
                                        <input required id="franshiza" name="franshiza" value="{{old('franshiza')}}"
                                               type="text" @if($errors->has('franshiza'))
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
                                            <select class="@if($errors->has('serial_number_policy')) is-invalid @endif  form-control polises" id="serial_number_policy"
                                                    name="serial_number_policy"
                                                    style="width: 100%;" required>
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
                                            <input required id="date_issue_policy" name="date_issue_policy" value="{{old('date_issue_policy')}}"
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
                                            <select @if($errors->has('litso'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="otvet-litso" name="litso"
                                                    style="width: 100%;" required>
                                                <option></option>
                                                @foreach($agents as $agent)
                                                    <option @if(old('litso') == $agent->id) selected
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
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Паспорт</label>
                                            <input  id="copy_passport" name="copy_passport" value="{{old('copy_passport')}}"
                                                   type="file" @if($errors->has('copy_passport'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            <input  id="copy_dogovor" name="copy_dogovor" value="{{old('copy_dogovor')}}"
                                                   type="file" @if($errors->has('copy_dogovor'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Справки</label>
                                            <input  id="copy_spravki" name="copy_spravki" value="{{old('copy_spravki')}}"
                                                   type="file" @if($errors->has('copy_spravki'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Другие</label>
                                            <input  id="copy_drugie" name="copy_drugie" value="{{old('copy_drugie')}}"
                                                   type="file" @if($errors->has('copy_drugie'))
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
    </div>
    </form>
@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
