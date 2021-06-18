@extends('layouts.index')

@section('content')
    <form action="{{route('mejd.store')}}" method="post" enctype="multipart/form-data" id="mainFormKasko">
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
                    <div class="card card-info" id="clone-insurance">
                        <div class="card-header">
                            <h3 class="card-title">Застрахованное лицо </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-name" class="col-form-label">ФИО</label>
                                        <input type="text" id="insurer-name" name="fio_insured" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Сумма</label>
                                        <input type="text" id="insurer-address" name="sum_of_insurance" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Премия</label>
                                        <input type="text" id="insurer-address" name="bonus" class="form-control">
                            </div>
                        </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="tarif" id="tarif">
                                        <label class="form-check-label" for="tarif">Тариф</label>
                    </div>
                                    <!-- TODO: Блок должен находится в скрытом состоянии
                                    отображаться только тогда, когда выбран checkbox "Тариф"
                                    -->
                                    <div class="form-group" data-tarif-descr style="display: none">
                                        <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                        <input class="form-control" name="percent_of_tariff" id="descrTarif" type="number">
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
                                        <input type="text" id="all-summ" name="insurance_sum" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" class="form-control">
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
                                            <td><input type="text" class="form-control" name="payment_sum_main"></td>
                                            <td><input type="date" class="form-control" name="payment_from_main">
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
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <input type="text" id="polis-series" name="policy_series" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="policy_insurance_from" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="person" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}">{{$agent->name}}</option>
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
                                        <input type="file" id="geographic-zone" name="application_form_file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="contract_file" class="form-control">
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
            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="/assets/custom/js/form/form-actions.js"></script>
@endsection

