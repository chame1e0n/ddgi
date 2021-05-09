@extends('layouts.index')
@include('products._form_elements.elements._period_strahovaniya.create')
@include('products._form_elements.elements._geograficheskaya_zona.create')
@include('products._form_elements.elements._ispolzovaniye_ts_na_osnovanii.create')
@include('products._form_elements.blocks._obshie_svedeniya.create')
@include('products._form_elements.blocks._vigodopriopredatel.create')
@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.create')
@include('products._form_elements.blocks._zagruzka_dokumentov.create')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('dobrovolka_imushestvo.store') }}" id="mainFormKasko"
          enctype="multipart/form-data">
        <div class="content-wrapper">
            @csrf
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
                @include('products.select')


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
                                @yield('_obshie_svedeniya_content')
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Выгодоприобретатель</h3>
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
                                    @yield('_vigodopriobretatel_content')
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="anketa-fields">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                           @yield('_period_strahovaniya_content')
                                           @yield('_ispolzovaniye_ts_na_osnovanii_content')
                                           @yield('_geograficheskaya_zona_content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведение об имуществе</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" id="addImushestvoBtn" class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" class="product-fields" data-field-number="0">
                                <table data-info-table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Наименование полиса</th>
                                        <th class="text-nowrap">Серия полиса</th>
                                        <th class="text-nowrap">Дата выдачи</th>
                                        <th class="text-nowrap">Период действия полиса от</th>
                                        <th class="text-nowrap">Период действия полиса до</th>
                                        <th class="text-nowrap">Выбор агента</th>
                                        <th class="text-nowrap">Количество</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="${id}">
                                        <td>
                                            <select class="form-control polis_name_id" onchange="getPolicySeries(this, ${id})" name="polis_name_id[]" style="width: 100%;">
                                                <option selected="selected"></option>
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control polis_series_id" id="polis_series_${id}" name="polis_series_id[]" style="width: 100%;">
                                                <option selected="selected"></option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="data_vidachi[]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="period_deystviya_ot[]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="period_deystviya_do[]">
                                        </td>
                                        <td>
                                            <select class="form-control" id="polise_agents" name="otvet_litso[]" style="width: 100%;">
                                                <option selected="selected"></option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum2" name="kolichestvo[]">
                                        </td>
                                        <td>
                                            <input data-field="value" type="text" class="form-control" name="strah_stoimost[]">
                                        </td>
                                        <td>
                                            <input data-field="sum" type="text" class="form-control" name="strah_summa[]">
                                        </td>
                                        <td>
                                            <input data-field="premiya" type="text" class="form-control" name="strah_premiya[]">
                                        </td>
                                        <td>
                                            <input type="button" onclick="removeAndCalc(${id})" value="Удалить" class="btn btn-warning">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" style="text-align: right"><label class="text-bold">Итого</label>
                                        </td>
                                        <td><input readonly data-insurance-stoimost type="text"
                                                   class="form-control overall-sum"/></td>
                                        <td><input readonly data-insurance-sum type="text"
                                                   class="form-control overall-sum4"/></td>
                                        <td><input readonly data-insurance-award type="text"
                                                   class="form-control overall-sum3"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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
                    @yield('_usloviya_oplati_strahovoy_premii_content')
                </div>

                @yield('_zagruzka_dokumentov_content')

            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @yield('_obshie_svedeniya_scripts')
    @yield('_vigodopriobretatel_scripts')
@endsection