@extends('layouts.index')
@section('content')
    <form action="{{route('avtocredit.update', $all_product->id)}}" method="post" enctype="multipart/form-data"
          id="mainFormKasko">
        @csrf
        @method('put')
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
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
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-1" value="individual">
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-2" value="legal">
                                            <label for="client-type-radio-2">юр. лицо</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2" name="product_id"
                                        style="width: 100%;">
                                    <option selected="selected">говно</option>
                                    <option selected="selected">говно 2</option>
                                    <option value="1">asdc</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <label for="insurer-name" class="col-form-label">Наименования
                                            страхователя</label>
                                        <input type="text" id="insurer-name" name="fio_insurer"
                                               value="{{$all_product->policyHolder->FIO}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес
                                            страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer"
                                               value="{{$all_product->policyHolder->address}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-tel" name="phone_insurer"
                                               value="{{$all_product->policyHolder->phone_number}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address_schet"
                                               value="{{$all_product->policyHolder->checking_account}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-inn" name="inn_insurer"
                                               value="{{$all_product->policyHolder->inn}}" class="form-control">
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
                                        <input type="text" id="insurer-bank" name="bank_insurer"
                                               value="{{$all_product->policyHolder->bank_id}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-okonh" name="oked_insurer"
                                               value="{{$all_product->policyHolder->oked}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-info" id="clone-beneficiary">
                                <div class="card-header">
                                    <h3 class="card-title">Заемщик</h3>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">Наименования
                                                        заемщика</label>
                                                    <input type="text" id="beneficiary-name" name="fio_beneficiary"
                                                           value="{{$all_product->zaemshik->z_fio}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Адрес
                                                        заемщика</label>
                                                    <input type="text" id="beneficiary-address"
                                                           name="address_beneficiary"
                                                           value="{{$all_product->zaemshik->z_address}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                    <input type="text" id="beneficiary-tel" name="tel_beneficiary"
                                                           value="{{$all_product->zaemshik->z_phone}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Серия
                                                        паспорта</label>
                                                    <input type="text" id="beneficiary-tel" name="passport_series"
                                                           value="{{$all_product->zaemshik->passport_series}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Номер
                                                        паспорта</label>
                                                    <input type="text" id="beneficiary-tel" name="passport_number"
                                                           value="{{$all_product->zaemshik->passport_number}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                        счет</label>
                                                    <input type="text" id="beneficiary-schet" name="beneficiary_schet"
                                                           value="{{$all_product->zaemshik->z_checking_account}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input type="text" id="beneficiary-inn" name="inn_beneficiary"
                                                           value="{{$all_product->zaemshik->z_inn}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input type="text" id="beneficiary-mfo" name="mfo_beneficiary"
                                                           value="{{$all_product->zaemshik->z_mfo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                                    <input type="text" id="beneficiary-bank" name="bank_beneficiary"
                                                           value="{{$all_product->zaemshik->bank_id}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                    <input type="text" id="beneficiary-okonh" name="oked_beneficiary"
                                                           value="{{$all_product->zaemshik->z_oked}}"
                                                           class="form-control">
                                                </div>
                                            </div>
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dogovor-lizing-num" class="col-form-label">Кредитный договор
                                                    №</label>
                                                <input type="text" id="dogovor-lizing-num" name="dogovor_lizing_num"
                                                       value="{{$all_product->dogovor_lizing_num}}"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Срок кредитования</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input id="insurance_from" name="credit_from"
                                                   value="{{$all_product->credit_from}}" type="date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Срок кредитования</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="insurance_to" name="credit_to"
                                                       value="{{$all_product->credit_to}}" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="geographic-zone">Сумма кредита</label>
                                            <input type="text" id="geographic-zone" name="sum_of_credit"
                                                   value="{{$all_product->sum_of_credit}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="insurance_from">Срок действия договора страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from"
                                                       value="{{$all_product->insurance_from}}" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="insurance_to" name="insurance_until"
                                                       value="{{$all_product->insurance_until}}" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Франшиза</label>
                                            <input type="text" id="geographic-zone" name="credit_franchise"
                                                   value="{{$all_product->credit_franchise}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="polises">Валюта взаиморасчетов</label>
                                        <select class="form-control polises" id="polises" name="currency_of_settlement"
                                                style="width: 100%;">
                                            <option @if($all_product->currency_of_settlement == '0') selected="selected"
                                                    @endif  value="0"></option>
                                            <option @if($all_product->currency_of_settlement == '1') selected="selected"
                                                    @endif value="1">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведени о трансортных средствах</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" id="generalProductFieldsAddButton" class="btn btn-primary ">Добавить
                            </button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Номер полиса</th>
                                        <th class="text-nowrap">Год выпуска</th>
                                        <th class="text-nowrap">Дата выдачи</th>
                                        <th class="text-nowrap">Марка</th>
                                        <th class="text-nowrap">Модель</th>
                                        <th class="text-nowrap">Гос. номер</th>
                                        <th class="text-nowrap">Номер тех паспорта</th>
                                        <th class="text-nowrap">Номер двигателя</th>
                                        <th class="text-nowrap">Номер кузова</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr></tr>
                                    <tr>
                                        <td colspan="9" style="text-align: right"><label class="text-bold">Итого</label>
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

                    <div id="general-product-fields">
                        @if($all_product->allProductInfo()->exist())
                            @foreach($all_product->allProductInfo as $productInformation)
                                <div id="product-field-modal-i{{$productInformation->id}}" class="modal"
                                     data-field-number="i{{$productInformation->id}}">
                                    <div class="modal-content" id="product-field-modal-content-${fieldNumber}">
                                        <span onclick="closeModal(${fieldNumber})" class="close product-fields-close"
                                              id="product-fields-close-${fieldNumber}"
                                              data-field-number="${fieldNumber}">&times;</span>
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Перечень дополнительного оборудования</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive p-0 " style="max-height: 300px;">
                                                    <form method="POST" id="product-fields-${fieldNumber}-1">
                                                        <table class="table table-hover table-head-fixed"
                                                               id="empTable2">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-nowrap">Марка, модель, модификация ТС
                                                                </th>
                                                                <th>Наименование оборудования</th>
                                                                <th>Серийный номер</th>
                                                                <th>Страховая сумма</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control"
                                                                           name="mark_model[]"></td>
                                                                <td><input type="text" class="form-control"
                                                                           name="name[]"></td>
                                                                <td><input type="text" class="form-control"
                                                                           name="series_number[]"></td>
                                                                <td><input type="text" class="form-control forsum5"
                                                                           name="insurance_sum[]"
                                                                           id="insurance_sum-${fieldNumber}"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Дополнительное страховое покрытие</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <form method="POST" id="product-fields-${fieldNumber}-2">
                                                    <div class="form-group">
                                                        <label>Покрытие террористических актов с ТС </label>
                                                        <div class="input-group mb-4">
                                                            <input type="text"
                                                                   class="form-control terror-tc-${fieldNumber}"
                                                                   name="cover_terror_attacks_sum[]">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="cover_terror_attacks_currency"
                                                                        style="width: 100%;">
                                                                    <option selected="selected">UZS</option>
                                                                    <option>USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Покрытие террористических актов с застрахованными
                                                            лицами </label>
                                                        <div class="input-group mb-4">
                                                            <input type="text"
                                                                   class="form-control terror-zl-${fieldNumber}"
                                                                   name="cover_terror_attacks_insured_sum[]">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="cover_terror_attacks_insured_currency"
                                                                        style="width: 100%;">
                                                                    <option selected="selected">UZS</option>
                                                                    <option>USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Покрытие расходы по эвакуации</label>
                                                        <div class="input-group mb-4">
                                                            <input type="text"
                                                                   class="form-control evocuation-${fieldNumber}"
                                                                   name="coverage_evacuation_cost[]">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="coverage_evacuation_currency"
                                                                        style="width: 100%;">
                                                                    <option selected="selected">UZS</option>
                                                                    <option>USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Сведени о трансортных средствах</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" id="product-fields-${fieldNumber}-3">
                                                    <div class="form-group">
                                                        <label>Застрахованы ли автотранспортные средства на момент
                                                            заполнения настоящей анкеты? </label>
                                                        <div class="row">
                                                            <div class="col-sm-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess1-${fieldNumber}', 'data-radioSuccess1-${fieldNumber}')"
                                                                        type="radio"
                                                                        class="other_insurance-${fieldNumber}"
                                                                        name="strtahovka[]"
                                                                        id="radioSuccess1-${fieldNumber}" value="1">
                                                                    <label for="radioSuccess1-${fieldNumber}">Да</label>
                                                                </div>
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess1-${fieldNumber}', 'data-radioSuccess1-${fieldNumber}', false)"
                                                                        type="radio"
                                                                        class="other_insurance-${fieldNumber}"
                                                                        name="strtahovka[]"
                                                                        id="radioSuccess2-${fieldNumber}" value="0">
                                                                    <label
                                                                        for="radioSuccess2-${fieldNumber}">Нет</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-radioSuccess1-${fieldNumber}
                                                         class="form-group other_insurance_info-${fieldNumber}"
                                                         style="display:none">
                                                        <label>Укажите название и адрес страховой организации и номер
                                                            Полиса</label>
                                                        <input class="form-control" type="text"
                                                               name="other_insurance_info[]">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Страховые покрытия по видам опасностей </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" id="product-fields-${fieldNumber}-4">
                                                    <div class="form-group">
                                                        <label>Раздел I. Гибель или повреждение транспортного
                                                            средства</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess3-${fieldNumber}', 'data-radioSuccess3-${fieldNumber}')"
                                                                        type="radio" name="vehicle_damage[]"
                                                                        class="r-1-${fieldNumber}"
                                                                        id="radioSuccess3-${fieldNumber}" value="1">
                                                                    <label for="radioSuccess3-${fieldNumber}">Да</label>
                                                                </div>
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess4-${fieldNumber}', 'data-radioSuccess3-${fieldNumber}', false)"
                                                                        type="radio" name="vehicle_damage[]"
                                                                        class="r-1-${fieldNumber}"
                                                                        id="radioSuccess4-${fieldNumber}" value="0">
                                                                    <label
                                                                        for="radioSuccess4-${fieldNumber}">Нет</label>
                                                                </div>
                                                            </div>
                                                            <div data-radioSuccess3-${fieldNumber}
                                                                 class="col-md-6 r-1-show-${fieldNumber}"
                                                                 style="display: none;">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span
                                                                                        class="input-group-text">Сумма</span>
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="form-control r-1-sum-${fieldNumber}"
                                                                                       name="one_sum[]"
                                                                                       id="vehicle_damage_sum-${fieldNumber}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Страховая премия</span>
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="form-control r-1-premia-${fieldNumber}"
                                                                                       name="one_premia[]"
                                                                                       id="vehicle_damage_sum-${fieldNumber}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Франшиза</span>
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="form-control r-1-frnshiza-${fieldNumber}"
                                                                                       name="one_franshiza[]"
                                                                                       id="vehicle_damage_sum-${fieldNumber}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form method="POST" id="product-fields-${fieldNumber}-5">
                                                    <div class="form-group">
                                                        <label class=>Раздел II. Автогражданская ответственность</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess5-${fieldNumber}', 'data-radioSuccess5-${fieldNumber}')"
                                                                        type="radio"
                                                                        name="civil_liability_${fieldNumber}"
                                                                        class="r-2-${fieldNumber}"
                                                                        id="radioSuccess5-${fieldNumber}" value="1">
                                                                    <label for="radioSuccess5-${fieldNumber}">Да</label>
                                                                </div>
                                                                <div
                                                                    onchange="toggleBlockRadio('radioSuccess6-${fieldNumber}', 'data-radioSuccess5-${fieldNumber}', false)"
                                                                    class="checkbox icheck-success">
                                                                    <input type="radio" name="civil_liability[]"
                                                                           class="r-2-${fieldNumber}"
                                                                           id="radioSuccess6-${fieldNumber}" value="0">
                                                                    <label
                                                                        for="radioSuccess6-${fieldNumber}">Нет</label>
                                                                </div>
                                                            </div>
                                                            <div data-radioSuccess5-${fieldNumber}
                                                                 class="col-md-6 r-2-show-${fieldNumber}"
                                                                 style="display: none;">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span
                                                                                        class="input-group-text">Сумма</span>
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="form-control r-2-sum-${fieldNumber}"
                                                                                       name="tho_sum[]"
                                                                                       id="vehicle_damage_sum-${fieldNumber}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Страховая премия</span>
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="form-control r-2-premia-${fieldNumber}"
                                                                                       name="two_preim${fieldNumber}"
                                                                                       id="vehicle_damage_sum-${fieldNumber}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <form method="POST" id="product-fields-${fieldNumber}-6">
                                                    <div class="form-group">
                                                        <label>Раздел III. Несчастные случаи с Застрахованными
                                                            лицами</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess7-${fieldNumber}', 'data-radioSuccess7-${fieldNumber}')"
                                                                        type="radio" name="accidents[]"
                                                                        class="r-3-${fieldNumber}"
                                                                        id="radioSuccess7-${fieldNumber}" value="1">
                                                                    <label for="radioSuccess7-${fieldNumber}">Да</label>
                                                                </div>
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess8-${fieldNumber}', 'data-radioSuccess7-${fieldNumber}', false)"
                                                                        type="radio" name="accidents[]"
                                                                        class="r-3-${fieldNumber}"
                                                                        id="radioSuccess8-${fieldNumber}" value="0">
                                                                    <label
                                                                        for="radioSuccess8-${fieldNumber}">Нет</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-radioSuccess7-${fieldNumber}
                                                         class="table-responsive p-0 r-3-show-${fieldNumber}"
                                                         style="display: none;">
                                                        <form method="POST" id="product-fields-${fieldNumber}-7">
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
                                                                    <td><input type="number"
                                                                               class="form-control r-3-pass-${fieldNumber}"
                                                                               value="1" readonly
                                                                               name="driver_quantity[]"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text"
                                                                                   class="form-control r-3-one-${fieldNumber}"
                                                                                   name="driver_one_sum[]">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success"
                                                                                        name="driver_currency[]"
                                                                                        style="width: 100%;">
                                                                                    <option selected="selected">UZS
                                                                                    </option>
                                                                                    <option>USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-sum-${fieldNumber}"
                                                                               name="driver_total_sum[]"
                                                                               id="driver_total_sum_${fieldNumber}">
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-premia-${fieldNumber}"
                                                                               name="driver_preim_sum[]"
                                                                               id="driver_total_sum_${fieldNumber}">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Пассажиры</label></td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-pass-1-${fieldNumber}"
                                                                               name="passenger_quantity[]"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text"
                                                                                   class="form-control r-3-one-1-${fieldNumber}"
                                                                                   name="passenger_one_sum[]">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success"
                                                                                        name="passenger_currency[]"
                                                                                        style="width: 100%;">
                                                                                    <option selected="selected">UZS
                                                                                    </option>
                                                                                    <option>USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-sum-1-${fieldNumber}"
                                                                               name="passenger_total_sum${fieldNumber}"
                                                                               id="passenger_total_sum-${fieldNumber}">
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-premia-1-${fieldNumber}"
                                                                               name="passenger_preim_sum${fieldNumber}"
                                                                               id="passenger_total_sum-${fieldNumber}">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label class="text-bold">Общий Лимит</label>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-pass-2-${fieldNumber}"
                                                                               name="limit_quantity${fieldNumber}"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text"
                                                                                   class="form-control r-3-one-2-${fieldNumber}"
                                                                                   name="limit_one_sum${fieldNumber}">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success"
                                                                                        name="limit_currency"
                                                                                        style="width: 100%;">
                                                                                    <option selected="selected">UZS
                                                                                    </option>
                                                                                    <option>USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-sum-2-${fieldNumber}"
                                                                               name="limit_total_sum[]"></td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-premia-2-${fieldNumber}"
                                                                               name="limit_preim_sum[]"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><label
                                                                            class="text-bold">Итого</label></td>
                                                                    <td><input type="number"
                                                                               class="form-control r-summ-${fieldNumber}">
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-summ-premia-${fieldNumber}">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </div>
                                                    <div class="form-group col-sm-8">
                                                        <label>Общий лимит ответственности </label>
                                                        <div class="input-group mb-4">
                                                            <input type="text" class="form-control"
                                                                   id="totalLimit-${fieldNumber}"
                                                                   name="total_liability_limit[]">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="total_liability_limit_currency[]"
                                                                        style="width: 100%;">
                                                                    <option selected="selected">UZS</option>
                                                                    <option>USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="card card-info polis" id="polis-container">
                                            <div class="card-header">
                                                <h3 class="card-title">Полис</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool"
                                                            data-card-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card payment">
                                                <div class="card-body">
                                                    <form method="POST" id="polis-fields-${fieldNumber}">
                                                        <div class="row policy">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="polises">Полис</label>
                                                                    <select class="form-control polises" id="polises"
                                                                            name="policy[]" style="width: 100%;">
                                                                        <option selected="selected"></option>
                                                                    </select>
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3"
                                                                         style="margin-top: 33px">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">от</span>
                                                                        </div>
                                                                        <input type="date" class="form-control"
                                                                               name="from_date[]">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Ответственный Агент</label>
                                                                    <select class="form-control select2" name="agent[]"
                                                                            style="width: 100%;">
                                                                        <option selected="selected">Ф.И.О агента
                                                                        </option>
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Оплата страховой премии</label>
                                                                    <select class="form-control select2"
                                                                            name="payment[]" style="width: 100%;">
                                                                        <option selected="selected">Сум</option>
                                                                        <option>Доллар</option>
                                                                        <option>Евро</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Порядок оплаты</label>
                                                                    <select class="form-control select2"
                                                                            name="payment_order[]" style="width: 100%;">
                                                                        <option selected="selected">Сум</option>
                                                                        <option>Доллар</option>
                                                                        <option>Евро</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card card-info polis" id="Overall">
                                                <div class="card-header">
                                                    <h3 class="card-title">Итого</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse" data-toggle="tooltip"
                                                                title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span
                                                                    class="input-group-text">Общая страховая сумма</span>
                                                            </div>
                                                            <input type="text" data-overall class="form-control"
                                                                   readonly id="overall_sum_${fieldNumber}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
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
                                        <input type="text" id="all-summ" name="insurance_sum"
                                               value="{{$all_product->insurance_sum}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus"
                                               value="{{$all_product->insurance_bonus}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise"
                                               value="{{$all_product->franchise}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames"
                                                name="insurance_premium_currency"
                                                style="width: 100%; text-align: center">
                                            <option @if($all_product->insurance_premium_currency =='1')  selected
                                                    @endif value="1">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" class="form-control payment-schedule" name="payment_term"
                                                style="width: 100%; text-align: center">
                                            <option @if($all_product->payment_term == '1') selected @endif value="1">
                                                Единовременно
                                            </option>
                                            <option @if($all_product->payment_term == 'transh') selected
                                                    @endif value="transh">Транш
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control payment-schedule" name="way_of_calculation"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option @if($all_product->way_of_calculation == '1') selected
                                                    @endif value="1">Сумах
                                            </option>
                                            <option @if($all_product->way_of_calculation == '2') selected
                                                    @endif value="2">Сумах В ин. валюте
                                            </option>
                                            <option @if($all_product->way_of_calculation == '3') selected
                                                    @endif value="3">В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option @if($all_product->way_of_calculation == '4') selected
                                                    @endif value="4">В ин. валюте по курсу ЦБ на день оплаты
                                            </option>
                                            <option @if($all_product->way_of_calculation == '5') selected
                                                    @endif value="5">В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule"
                                 @if($all_product->payment_term !== 'transh') class="d-none" @endif>
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
                                            <td><input type="text" class="form-control" name="payment_sum_main"
                                                       value="{{$all_product->payment_sum_main}}"></td>
                                            <td><input type="date" class="form-control" name="payment_from_main"
                                                       value="{{$all_product->payment_from_main}}">
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
                                           class="form-check-input client-type-radio"
                                           type="checkbox" name="tarif" id="tarif"
                                           @if($all_product->tariff == 'tariff') checked @endif
                                           value="tariff">
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr
                                     @if($all_product->tariff !== 'tariff') style="display: none" @endif>
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input class="form-control" id="descrTarif" name="tariff_other"
                                           value="{{$all_product->tarif_other}}" type="number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')"
                                           class="form-check-input client-type-radio"
                                           type="checkbox" name="preim" id="preim"
                                           @if($all_product->preim == 'preim') checked @endif
                                           value="preim">
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr
                                     @if($all_product->preim !== 'preim') style="display: none" @endif>
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input class="form-control" id="descrPreim" name="premiya_other"
                                           value="{{$all_product->premiya_other}}" type="number">
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
                                                   type="date" class="form-control">
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
            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
    <form action="{{route('avtocredit.destroy', $all_product->id)}}" method="post">
        @csrf
        @method('delete')
        <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right">Удалить</button>
        </div>
    </form>
@endsection
