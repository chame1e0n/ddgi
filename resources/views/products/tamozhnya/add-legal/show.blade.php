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
                            <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                            <li class="breadcrumb-item active">Создать Анкету</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
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
                                    <textarea disabled
                                              id="description"
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
                                    <input readonly
                                           id="from_date"
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
                                        <input readonly
                                               id="to_date"
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
                                    <input readonly
                                           id="prof_riski"
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
                                                <input disabled
                                                       id="defects-1"
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
                                                <input disabled
                                                       id="defects-0"
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
                                    <div class="form-group defects_images"
                                         @if ($tamozhnya->pretenzii_in_ruz == 1 )
                                            style="display: block;"
                                         @else
                                            style="display: none;"
                                         @endif>
                                        <label>Описание причины</label>
                                        <input readonly
                                               id="prichina_pretenzii"
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
                                    <select readonly
                                            disabled
                                            class="form-control"
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
                                    <select readonly
                                            disabled
                                            class="form-control payment-schedule"
                                            name="payment_term"
                                            onchange="showDiv('other-payment-schedule', this)"
                                            style="width: 100%; text-align: center;">
                                        <option value="1"
                                                @if($tamozhnya->payment_term == 1)
                                                    selected
                                                @endif>
                                            Единовременно
                                        </option>
                                        <option value="other"
                                                @if($tamozhnya->payment_term == 'other')
                                                    selected
                                                @endif>
                                            Другое
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-inline justify-content-between">
                                    <label>Способ расчета</label>
                                    <select readonly
                                            disabled
                                            class="form-control sposob_rascheta"
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
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="all-summ">Cтраховая сумма</label>
                                    <input readonly
                                           id="strahovaya_sum"
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
                                    <input readonly
                                           id="strahovaya_purpose"
                                           name="strahovaya_purpose"
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
                                    <input readonly
                                           id="franshiza"
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
                        <div id="other-payment-schedule"
                             @if($tamozhnya->payment_term == 1)
                                style="display: none;"
                             @endif>
                            <div class="table-responsive p-0 "
                                 style="max-height: 300px;">
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
                                            <td>
                                                <input readonly type="text" class="form-control" name="payment_sum[]" />
                                            </td>
                                            <td>
                                                <input readonly type="date" class="form-control" name="payment_from[]" />
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($tamozhnya->strahPremiya as $premiya)
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td>
                                                    <input readonly
                                                           type="text"
                                                           class="form-control"
                                                           name="payment_sum[{{$premiya->id}}]"
                                                           value="{{$premiya->prem_sum}}" />
                                                </td>
                                                <td>
                                                    <input readonly
                                                           type="date"
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
                                        <input readonly
                                               id="serial_number_policy"
                                               name="serial_number_policy"
                                               disabled
                                               value="{{$tamozhnya->serial_number_policy}}"
                                               type="text"
                                               @if($errors->has('serial_number_policy'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="col-form-label">Дата выдачи страхового полиса </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input readonly
                                               id="date_issue_policy"
                                               disabled
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
                                        <select readonly
                                                disabled
                                                id="otvet-litso"
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
                                                <option value="{{$agent->user_id}}"
                                                        @if($tamozhnya->otvet_litso == $agent->user_id)
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
                                         alt="Анкета">
                                    <label for="polis-series" class="col-form-label">Анкета</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img src="/storage/{{$tamozhnya->dogovor_img}}"
                                         alt="Договор">
                                    <label for="polis-series" class="col-form-label">Договор</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img src="/storage/{{$tamozhnya->polis_img}}"
                                         alt="Полис">
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
