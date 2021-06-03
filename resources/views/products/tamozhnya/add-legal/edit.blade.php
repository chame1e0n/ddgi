@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="/form">Договор</a></li>
                            <li class="breadcrumb-item active">Изменить Договор</li>
                        </ol>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{url()->previous()}}" class="btn btn-info">Назад</a>
                    </div>
                </div>
                <div class="row mb-2">
                    @include('layouts._success_or_error')

                    @if($tamozhnya->requests()->exists())
                        @php
                            $request_problem = false;

                            foreach ($tamozhnya->requests as $request) {
                                if ($request->state != 2) {
                                    $request_problem = true;

                                    break;
                                }
                            }
                        @endphp
                        @if ($request_problem)
                            <div class="alert alert-danger col-sm-12">
                                <strong>Данные о продукте нельзя распечатать</strong>, т.к. имеются не решенные <a href="#requests">запросы</a>.
                            </div>
                        @endif
                    @endif
                    @if($request_underwritting_problem && !$tamozhnya->requests()->exists())
                        <div class="alert alert-danger col-sm-12">
                            <strong>Нужно создать запрос на <a href="{{route('request.create')}}?policySeries={{$tamozhnya->serial_number_policy}}&status=underwritting&policyId={{$tamozhnya->policy_id}}">андерайтинг</a>.</strong>
                        </div>
                    @endif
                    @if(!$tamozhnya->requests()->exists() and !$request_underwritting_problem or (isset($request_problem) and !$request_problem))
                        <div class="col-sm-6">
                            <a href="{{route('tamozhnya-add-legal.edit', $tamozhnya->id)}}?download=dogovor" class="btn btn-warning">
                                <i class="fa fa-download" aria-hidden="true"></i> Скачать Договор
                            </a>
                            <a href="{{route('tamozhnya-add-legal.edit', $tamozhnya->id)}}?download=za" class="btn btn-warning">
                                <i class="fa fa-download" aria-hidden="true"></i> Скачать Заявление
                            </a>
                            <a href="{{route('tamozhnya-add-legal.edit', $tamozhnya->id)}}?download=polis" class="btn btn-warning">
                                <i class="fa fa-download" aria-hidden="true"></i> Скачать Полис
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <form action="{{route('tamozhnya-add-legal.update', $tamozhnya->id)}}"
              method="POST"
              id="mainFormKasko"
              enctype="multipart/form-data">
            @method('PUT')
            @csrf

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
                                @if($tamozhnya->type == 0)
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" class="client-type-radio" id="client-type-radio-1" value="individual" checked>
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" class="client-type-radio" id="client-type-radio-2" value="legal" checked>
                                            <label for="client-type-radio-2" >юр. лицо</label>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id"
                                        class="form-control select2"
                                        style="width: 100%;"
                                        readonly="true">
                                    <option value="1">{{$tamozhnya->product->name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведения о товаре</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="beneficiary-name" class="col-form-label">Описание</label>
                                        <textarea id="description"
                                                  name="description"
                                                  @if($errors->has('description'))
                                                    class="form-control is-invalid"
                                                  @else
                                                    class="form-control"
                                                  @endif>
                                            {{$tamozhnya->description}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Информация о подерженности рискам</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Период деятельности</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>
                                        <input id="from_date"
                                               name="from_date"
                                               value="{{$tamozhnya->from_date}}"
                                               type="date"
                                               @if($errors->has('from_date'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Период деятельности</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="to_date"
                                                   name="to_date"
                                                   value="{{$tamozhnya->to_date}}"
                                                   type="date"
                                                   @if($errors->has('to_date'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">Профессиональные риски</label>
                                        <input id="prof_riski"
                                               name="prof_riski"
                                               value="{{$tamozhnya->prof_riski}}"
                                               type="text"
                                               @if($errors->has('prof_riski'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Были ли в Вашей практике случаи, когда  Вам была предъявлена претензия или иск таможенными органами РУз</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="checkbox icheck-success">
                                                    <input id="defects-1"
                                                           onclick="Go()"
                                                           type="radio"
                                                           class="pretenzii_in_ruz"
                                                           name="pretenzii_in_ruz"
                                                           value="1"
                                                           @if($tamozhnya->pretenzii_in_ruz == 1)
                                                            checked
                                                           @endif />
                                                    <label for="defects-1">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success ">
                                                    <input id="defects-0"
                                                           onclick="Go()"
                                                           type="radio"
                                                           class="pretenzii_in_ruz"
                                                           name="pretenzii_in_ruz"
                                                           value="0"
                                                           @if($tamozhnya->pretenzii_in_ruz == 0)
                                                            checked
                                                           @endif />
                                                    <label for="defects-0">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group defects_images" id="hide" @if ($tamozhnya->pretenzii_in_ruz == 1 || old('pretenzii_in_ruz') == 1) style = "display: block;" @else style = "display: none;" @endif>
                                            <label>Опсиание причины</label>
                                            <input id="prichina_pretenzii"
                                                   name="prichina_pretenzii"
                                                   value="{{$tamozhnya->prichina_pretenzii}}"
                                                   type="text"
                                                   @if($errors->has('prichina_pretenzii'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Уникальные номера</h3>
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
                                        <label>Номер договора</label>
                                        <input value="{{$tamozhnya->unique_number}}"
                                               readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Серия полиса</label>
                                        <input value="{{$tamozhnya->policySeries->code ?? '-'}}"
                                               readonly />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Номер полиса</label>
                                        <input value="{{$tamozhnya->policy->number}}"
                                               readonly />
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
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control"
                                                id="walletNames"
                                                style="width: 100%; text-align: center;"
                                                name="insurance_premium_currency">
                                            <option selected="selected"
                                                    value="{{$tamozhnya->currencies}}">
                                                {{$tamozhnya->currencies}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition"
                                                class="form-control payment-schedule"
                                                name="payment_term"
                                                style="width: 100%; text-align: center;">
                                            <option value="1"
                                                    @if($tamozhnya->payment_term == 1)
                                                        selected
                                                    @endif>
                                                Единовременно
                                            </option>
                                            <option value="transh"
                                                    @if($tamozhnya->payment_term == 'transh')
                                                        selected
                                                    @endif>
                                                Транш
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control sposob_rascheta"
                                                name="sposob_rascheta"
                                                style="width: 100%; text-align: center;">
                                        @foreach(config('app.sposob_rascheta') as $key => $sposob)
                                            <option value="{{$key}}"
                                                    @if($key == $tamozhnya->sposob_rascheta)
                                                        selected
                                                    @endif>
                                                {{$sposob}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule"
                                 @if($tamozhnya->payment_term == 1)
                                    class="d-none"
                                 @endif>
                                <div class="form-group">
                                    <button type="button" id="transh-payment-schedule-button" class="btn btn-primary">
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
                                        @if(!$tamozhnya->strahPremiya)
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input type="text" class="form-control" name="payment_sum[]" /></td>
                                                <td><input type="date" class="form-control" name="payment_from[]" /></td>
                                            </tr>
                                        @else
                                            @foreach($tamozhnya->strahPremiya as $premiya)
                                                <tr id="payment-term-tr-0" data-field-number="0">
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="payment_sum[{{$premiya->id}}]"
                                                               value="{{$premiya->prem_sum}}" />
                                                    </td>
                                                    <td>
                                                        <input type="date"
                                                               class="form-control"
                                                               name="payment_from[{{$premiya->id}}]"
                                                               value="{{$premiya->prem_from}}" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input id="strahovaya_sum"
                                               name="strahovaya_sum"
                                               value="{{$tamozhnya->strahovaya_sum}}"
                                               type="number"
                                               @if($errors->has('strahovaya_sum'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input id="strahovaya_purpose"
                                               disabled
                                               value="{{$tamozhnya->strahovaya_purpose}}"
                                               type="number"
                                               @if($errors->has('strahovaya_purpose'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Франшиза</label>
                                        <input id="franshiza"
                                               name="franshiza"
                                               value="{{$tamozhnya->franshiza}}"
                                               type="text"
                                               @if($errors->has('franshiza'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="geographic-zone">Тариф (%)</label>
                                            <input readonly
                                                   value="{{$tamozhnya->product->tarif}}"
                                                   type="number"
                                                   name="tarif"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="icheck-success col-md-4">
                                        <input class="form-check-input client-type-radio"
                                               type="checkbox"
                                               name="isOtherTarif"
                                               id="tarif"
                                               onchange="toggleBlock('tarif', 'data-tarif-descr')"
                                               @if($tamozhnya->product->tarif != $tamozhnya->tarif)
                                                checked
                                               @endif />
                                        <label class="form-check-label" for="tarif">Указать другой тариф в процентах</label>
                                    </div>

                                    <!-- TODO: Блок должен находится в скрытом состоянии отображаться только тогда, когда выбран checkbox "Тариф" -->

                                    <div class="form-group"
                                         data-tarif-descr
                                         @if($tamozhnya->product->tarif == $tamozhnya->tarif)
                                            style="display: none;"
                                         @endif>
                                        <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                        <input class="form-control"
                                               id="descrTarif"
                                               name="otherTarif"
                                               value="{{$tamozhnya->tarif}}"
                                               type="number" />
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса страхования</label>
                                            <select type="text" id="serial_number_policy" name="serial_number_policy" class="form-control">
                                                <option value="0"></option>

                                                @foreach($policy_series as $series)
                                                    <option value="{{$series->id}}"
                                                            @if($series->id == $tamozhnya->serial_number_policy)
                                                                selected
                                                            @endif>
                                                        {{$series->code}}
                                                    </option>
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
                                            <input id="date_issue_policy"
                                                   name="date_issue_policy"
                                                   value="{{$tamozhnya->date_issue_policy}}"
                                                   type="date"
                                                   @if($errors->has('date_issue_policy'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet-litso">Ответственное лицо</label>
                                            <select id="otvet-litso"
                                                    name="litso"
                                                    style="width: 100%;"
                                                    required
                                                    @if($errors->has('litso'))
                                                        class="form-control is-invalid"
                                                    @else
                                                        class="form-control"
                                                    @endif>
                                                <option></option>

                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}"
                                                            @if($tamozhnya->otvet_litso == $agent->id)
                                                                selected
                                                            @endif>
                                                        {{$agent->surname}} {{$agent->name}} {{$agent->middle_name}}
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/{{$tamozhnya->anketa_img}}"
                                             alt="Анкета" />
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input id="anketa_img"
                                               name="anketa_img"
                                               value="{{old('anketa_img')}}"
                                               type="file"
                                               @if($errors->has('anketa_img'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/{{$tamozhnya->dogovor_img}}"
                                             alt="Договор" />
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input id="dogovor_img"
                                               name="dogovor_img"
                                               value="{{old('dogovor_img')}}"
                                               type="file"
                                               @if($errors->has('dogovor_img'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/{{$tamozhnya->polis_img}}"
                                             alt="Полис" />
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input id="polis_img"
                                               name="polis_img"
                                               value="{{old('polis_img')}}"
                                               type="file"
                                               @if($errors->has('polis_img'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
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

        @if(!empty($tamozhnya->requests))
            @foreach($tamozhnya->requests as $requestModel)
                @include('products.elements._request')
            @endforeach
        @endif
    </div>
@endsection

@section('scripts_vars')
    <script>
        function Go() {
            document.getElementById('hide').style.display = document.getElementById('defects-1').checked ? 'block': 'none';
        }
    </script>
@endsection

@section('scripts')
    <script>
        var product_tarif = {{$tamozhnya->product->tarif / 100}};
        const strah_premiya = document.getElementById('strahovaya_purpose');
        const strahovaya_sum = document.getElementById('strahovaya_sum');
        var descr_tarif = document.getElementById('descrTarif');

        strahovaya_sum.addEventListener('change', changeStrahPremiya);
        descr_tarif.addEventListener('change', changeStrahPremiya);

        function changeStrahPremiya() {
            var tarif = document.getElementById('tarif');

            // if tarif checkbox not checked -> use default tarif for that product
            if (!tarif.checked) {
                strah_premiya.value = (strahovaya_sum.value * product_tarif).toFixed(2);
            } else {
                strah_premiya.value = (strahovaya_sum.value * descr_tarif.value / 100).toFixed(2);
            }
        }
    </script>
@endsection