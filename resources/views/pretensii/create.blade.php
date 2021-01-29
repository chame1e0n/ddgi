@extends('layouts.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active"><a href="/form">Претензии</a></li>
                        <li class="breadcrumb-item active">Создать Претензию</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">

        <div class="card card-info pretenziya" id="form-container">
            <div class="card-header">
                <h3 class="card-title">Претензия</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('pretensii.store') }}">
                    @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label" for="pretensii-state">Состояние</label>
                                <select id="pretensii-state" class="form-control" >
                                    <option selected="selected">Состояние1</option>
                                    <option>Состояние2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label class="col-form-label" for="pretensii-number">№ дела</label>
                            <input type="text" name="case_number" class=" form-control client-type-text"
                                   id="pretensii-number" value="0001">
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="col-form-label" for="pretensii-insured">Страхователь</label>
                            <input type="text" name="insurer" class="form-control client-type-text"
                                   id="pretensii-insured" value="insured">
                        </div>


                        <div class="form-group col-sm-3">
                            <label class="col-form-label" for="pretensii-subsidiary">Филиал</label>
                            <select id="pretensii-subsidiary" class="form-control" name="branch_id">
                                <option selected="selected" value="1">Филиал1</option>
                                <option>Филиал2</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label class="col-form-label" for="pretensii-insurance-contract">Договор страхования</label>
                            <input type="text" name="insurance_contract"
                                   class=" form-control client-type-text" id="pretensii-insurance-contract"
                                   value="insurance-contract">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Тип клиента</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="icheck-success">
                                    <input type="radio" class="other_insurance-0" name="client_type"
                                           id="pretensiiClientType1" value="1" checked>
                                    <label for="pretensiiClientType1">Юр. лицо</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="icheck-success">
                                    <input type="radio" class="other_insurance-0" name="client_type"
                                           id="pretensiiClientType2" value="0">
                                    <label for="pretensiiClientType2">Физ. лицо</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="pretensii-insurance-type">Вид страхования</label>
                                <select id="pretensii-insurance-type" class="form-control"
                                        name="insurence_type">
                                    <option selected="selected">kasko</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="pretensii-insurance-period-under-the-policy">Период
                                    страхования по полису</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input id="pretensii-insurance-period-under-the-policy"
                                           name="insurence_period" type="date"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-form-label" for="pretensii-sum-insured">Страховая сумма</label>
                                    <div class="input-group mb-4">
                                        <input type="number" class="form-control r-3-one-1-0"
                                               name="insured_sum" value="5000">
                                        <div class="input-group-append">
                                            <select class="form-control success"
                                                    style="width: 100%;">
                                                <option selected="selected">UZS</option>
                                                <option>USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Страховая премия</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label class="col-form-label" for="pretensii-payable-by-agreement">Подлежит
                                            оплате по договору</label>
                                        <div class="input-group mb-4">
                                            <input type="number" class="form-control r-3-one-1-0"
                                                   name="payable_by_agreement" value="5000">
                                            <div class="input-group-append">
                                                <select class="form-control success"
                                                        style="width: 100%;">
                                                    <option selected="selected">UZS</option>
                                                    <option>USD</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="pretensii-actually-paid">Фактически
                                            оплаченная</label>
                                        <input type="text" name="actually_paid"
                                               class="form-control client-type-text" id="pretensii-actually-paid"
                                               value="3000">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="pretensii-last-payment-date">Дата последней
                                            оплаты</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Дата</span>
                                            </div>
                                            <input id="pretensii-last-payment-date" name="last_payment_date"
                                                   type="date" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Франшиза</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class=" col-mb-3">
                                            <label class="col-form-label" for="pretensii-franchise-type">вид</label>
                                            <select class="form-control success" name="franchise_type"
                                                    style="width: 100%;">
                                                <option selected="selected" value="0">нет</option>
                                                <option value="1">условная</option>
                                                <option value="3">безусловная</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label" for="pretensii-deductible-amount">Сумма </label>
                                        <input type="text" name="deductible_amount"
                                               class="form-control client-type-text" id="pretensii-deductible-amount"
                                               value="3000">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-form-label"
                                               for="pretensii-franchise-percentage">Процент</label>
                                        <div class="input-group mb-4">
                                            <input type="text" size="3" name="franchise_percentage"
                                                   class="form-control client-type-text r-3-one-1-0"
                                                   id="pretensii-franchise-percentage" value="50">
                                            <div class="input-group-append">
                                                <i class="form-control success">%</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="pretensii-reinsurance">Перестрахования</label>
                                <input type="text" name="reinsurance" class="form-control client-type-text"
                                       id="pretensii-reinsurance" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="pretensii-date-applications">Дата поступления
                                    Заявления</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Дата</span>
                                    </div>
                                    <input id="pretensii-date-applications" name="date_applications"
                                           type="date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label" for="pretensii-date-of-occurrence-of-the-insured-event">Дата
                                    наступления страхового события</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Дата</span>
                                    </div>
                                    <input id="pretensii-date-of-occurrence-of-the-insured-event"
                                           name="date_of_the_insured_event" type="date"
                                           class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-form-label" for="pretensii-description-of-the-insured-event">Описание
                            страхового события</label>
                        <input type="text" name="event_description"
                               class="form-control client-type-text" id="pretensii-description-of-the-insured-event"
                               value="description-of-the-insured-event">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label" for="pretensii-description-of-the-insurance-object">Описание
                            страхового объекта</label>
                        <input type="text" name="object_description"
                               class="form-control client-type-text" id="pretensii-description-of-the-insurance-object"
                               value="description-of-the-insurance-object">
                    </div>


                    <div class="card-body">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Итоговая</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class=" col-md-6">
                                        <label class="col-form-label" for="pretensii-insurable-value">Страховая
                                            стоимость</label>
                                        <input type="text"readonly
                                               class="form-control client-type-text" id="pretensii-insurable-value"
                                               value="1000">
                                    </div>
                                    <div class=" col-md-6">
                                        <label class="col-form-label" for="pretensii-sum-insured">Страховая
                                            сумма</label>
                                        <input type="text" readonly
                                               class="form-control client-type-text" id="pretensii-sum-insured"
                                               value="1000">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Место происшествия</h3>

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
                                        <label class="col-form-label" for="pretensii-region">Область</label>
                                        <select id="pretensii-region" class="form-control" name="region">
                                            <option selected="selected">pretensii-region 1</option>
                                            <option selected="selected">pretensii-region 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="pretensii-district">Район</label>
                                        <select id="pretensii-district" class="form-control" name="district">
                                            <option selected="selected">pretensii-district 1</option>
                                            <option selected="selected">pretensii-district 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Заявленный убыток</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-form-label" for="pretensii-claimed-loss-summ">Сумма</label>
                                    <div class="input-group mb-4">
                                        <input type="number" class="form-control r-3-one-1-0"
                                               name="claimed_loss_sum" value="5000">
                                        <div class="input-group-append">
                                            <select class="form-control success"
                                                    style="width: 100%;">
                                                <option selected="selected">UZS</option>
                                                <option>USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Урегулирование претензии Выплаченное возмещение</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-form-label" for="pretensii-refund-paid-summ">Сумма</label>
                                            <div class="input-group mb-4">
                                                <input type="number" class="form-control r-3-one-1-0"
                                                       name="refund_paid_sum" value="5000">
                                                <div class="input-group-append">
                                                    <select class="form-control success"
                                                             style="width: 100%;">
                                                        <option selected="selected">UZS</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div><label class="col-form-label"
                                                        for="pretensii-currency-exchange-rate-as-of-the-date-of-payment">курс
                                                на момент возмещения</label></div>
                                            <input type="text"
                                                   name="currency_exchange_rate"
                                                   class="form-control client-type-text"
                                                   id="pretensii-currency-exchange-rate-as-of-the-date-of-payment"
                                                   value="5000">
                                        </div>
                                        <div class=" col-md-6">
                                            <div><label class="col-form-label" for="pretensii-total-amount-in-soums">Итого
                                                сумма в сумах</label></div>
                                            <input type="text" name="total_amount_in_sums"
                                                   class="form-control client-type-text"
                                                   id="pretensii-pretensii-total-amount-in-soums" value="5000">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label"
                                                       for="pretensii-date-of-payment-of-compensation">Дата выплаты
                                                    компенсации</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Дата</span>
                                                    </div>
                                                    <input id="pretensii-date-of-payment-of-compensation"
                                                           name="date_of_payment_compensation" type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="pretensii-final-settlement-date">Дата окончательного
                            урегулирования</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Дата</span>
                            </div>
                            <input id="pretensii-final-settlement-date" name="final_settlement_date"
                                   type="date" class="form-control">
                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" id="form-save-button">Найти</button>
                </div>
                </form>
            </div>
        </div>
    </section>


</div>
<!-- /.content -->
@endsection