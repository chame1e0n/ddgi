@extends('layouts.index')

@section('content')
    <form action="{{route('potrebkredit.store')}}" method="post" enctype="multipart/form-data" id="mainFormKasko">
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

                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Заемщик</h3>
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
                                            <label for="insurer-name" class="col-form-label">Наименования заемщика</label>
                                            <input type="text" id="insurer-name" name="fio_insured" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес заемщика</label>
                                            <input type="text" id="beneficiary-address" name="address_beneficiary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="beneficiary-tel" name="tel_beneficiary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                            <input type="text" id="beneficiary-schet" name="beneficiary_schet" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="beneficiary-inn" name="inn_beneficiary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="beneficiary-mfo" name="mfo_beneficiary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                            <input type="text" id="beneficiary-bank" name="bank_beneficiary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="beneficiary-okonh" name="oked_beneficiary" class="form-control">
                                        </div>
                                    </div>
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dogovor_num" class="col-form-label">Номер договора страхования</label>
                                                <input type="text" id="dogovor_num" name="dogovor_num" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_dogovor_strah" class="col-form-label">Дата договора страхования </label>
                                            <input id="date_dogovor_strah" name="date_dogovor_strah" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dogovor_num" class="col-form-label">Номер кредитного договора</label>
                                            <input type="text" id="dogovor_num" name="credit_dogovor_num" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_kredit_dogovor" class="col-form-label">Дата кредитного договора</label>
                                            <input id="date_kredit_dogovor" name="date_kredit_dogovor" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kredit_summ" class="col-form-label">Сумма кредита</label>
                                            <input id="kredit_summ" name="loan_sum" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_kredit_from" class="col-form-label">Срок кредита с</label>
                                            <input id="date_kredit_from" name="term_from" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="date_kredit_to" class="col-form-label">Срок кредита до</label>
                                            <input id="date_kredit_to" name="term_to" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="period_expect_from" class="col-form-label">Срок действия договора страхования</label>
                                            <input id="period_expect_from" name="object_from_date" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date_dogovor_strah" class="col-form-label">Срок действия договора страхования</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="date_dogovor_strah" name="object_to_date" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zalog_vid" class="col-form-label">Вид залогового обеспечения</label>
                                            <input type="text" id="zalog_vid" name="zalog_vid" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kredit_zachem" class="col-form-label">Цель получения кредита</label>
                                            <input type="text" id="kredit_zachem" name="loan_reason" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tovar_about" class="col-form-label">Описание товара</label>
                                            <input type="text" id="tovar_about" name="tovar_about" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zalog_obesp_summ" class="col-form-label">Сумма залогового обеспечения</label>
                                            <input type="text" id="zalog_obesp_summ" name="zalog_obesp_summ" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zaemshik_passport" class="col-form-label">Загрузка паспорта заемщика</label>
                                            <input type="file" id="zaemshik_passport" name="passport_copy" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dogovor_potreb_kredit" class="col-form-label">Загрузка договора потребительского кредита</label>
                                            <input type="file" id="dogovor_potreb_kredit" name="dogovor_copy" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sprafka_s_home" class="col-form-label">Загрузка справки с места жительство</label>
                                            <input type="file" id="sprafka_s_home" name="spravka_copy" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sprafka_s_job" class="col-form-label">Загрузка справки с места работы</label>
                                            <input type="file" id="sprafka_s_job" name="spravka_rabota_copy" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" class="col-form-label">
                                            <label for="other_docs">Загрузка других документов</label>
                                            <input type="file" id="other_docs" name="other_copy" multiple class="form-control">
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
                                            <select class="form-control polises" id="otvet-litso" name="otvet_litso" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}" selected="selected">{{$agent->name}}</option>
                                                @endforeach
                                            </select>
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
    <script src="/assets/custom/js/form/form-actions.js"></script>
@endsection
