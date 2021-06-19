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
                @include('includes.messages')

                @include('includes.contract')

                <div class="card-body">
                    @include('includes.client')

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
                                    {{--                                    ${fieldNumber} = 'i'+id < --- id All Product Information--}}
                                    <tbody>
                                    @if($all_product->allProductInformations()->exists())
                                        @foreach($all_product->allProductInformations->where('polis_number', '!=', null) as $productInformation)
                                            <tr id="ai{{$productInformation->id}}">
                                                <td>
                                                    <input type="text" class="form-control"
                                                           name="polis_number[{{$productInformation->id}}]"
                                                           value="{{$productInformation->polis_number}}">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control"
                                                           name="god_vipuska[{{$productInformation->id}}]"
                                                           value="{{$productInformation->god_vipuska}}">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control"
                                                           name="data_vidachi[{{$productInformation->id}}]"
                                                           value="{{$productInformation->data_vidachi}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           name="mark[{{$productInformation->id}}]"
                                                           value="{{$productInformation->mark}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           name="model[{{$productInformation->id}}]"
                                                           value="{{$productInformation->model}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           name="gos_nomer[{{$productInformation->id}}]"
                                                           value="{{$productInformation->gos_nomer}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           name="nomer_teh_pasporta[{{$productInformation->id}}]"
                                                           value="{{$productInformation->nomer_teh_pasporta}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           name="nomer_dvigatelya[{{$productInformation->id}}]"
                                                           value="{{$productInformation->nomer_dvigatelya}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           name="nomer_kuzova[{{$productInformation->id}}]"
                                                           value="{{$productInformation->nomer_kuzova}}">
                                                </td>

                                                <td>
                                                    <input type="text" data-field="value" class="form-control"
                                                           name="strah_stoimost[{{$productInformation->id}}]"
                                                           value="{{$productInformation->strah_stoimost}}">
                                                </td>
                                                <td>
                                                    <input type="text" data-field="sum"
                                                           class="form-control calc1 overall_insurance_sum-0"
                                                           name="strah_summa[{{$productInformation->id}}]"
                                                           value="{{$productInformation->strah_summa}}">
                                                </td>
                                                <td>
                                                    <input type="text" data-field="premiya"
                                                           class="form-control insurance_premium-0"
                                                           name="strah_premiya[{{$productInformation->id}}]"
                                                           value="{{$productInformation->strah_summa}}">
                                                </td>
                                                <td>
                                                    <input type="button"
                                                           onclick="openModal('i'+'{{$productInformation->id}}')"
                                                           value="Заполнить"
                                                           class="btn btn-success product-fields-button"
                                                           id="product-fields-button"
                                                           data-field-number="i{{$productInformation->id}}">
                                                </td>
                                                <td>
                                                    <input type="button"
                                                           onclick="removeProductsFieldRow('i'+'{{$productInformation->id}}')"
                                                           value="Удалить" class="btn btn-warning">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
                        @if($all_product->allProductInformations()->exists())
                            @foreach($all_product->allProductInformations as $productInformation)
                                <div id="product-field-modal-i{{$productInformation->id}}" class="modal"
                                     data-field-number="i{{$productInformation->id}}">
                                    <div class="modal-content"
                                         id="product-field-modal-content-i{{$productInformation->id}}">
                                        <span onclick="closeModal('i'+ '{{$productInformation->id}}')"
                                              class="close product-fields-close"
                                              id="product-fields-close-i{{$productInformation->id}}"
                                              data-field-number="i{{$productInformation->id}}">&times;</span>
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
                                                                           name="mark_model[{{$productInformation->id}}]"
                                                                           value="{{$productInformation->mark_model}}">
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                           name="name[{{$productInformation->id}}]"
                                                                           value="{{$productInformation->name}}"></td>
                                                                <td><input type="text" class="form-control"
                                                                           name="series_number[{{$productInformation->id}}]"
                                                                           value="{{$productInformation->series_number}}">
                                                                </td>
                                                                <td><input type="text" class="form-control forsum5"
                                                                           name="insurance_sum_of_transport[{{$productInformation->id}}]"
                                                                           id="insurance_sum-i{{$productInformation->id}}"
                                                                           value="{{$productInformation->insurance_sum_of_transport}}">
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
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
                                                    <div class="form-group">
                                                        <label>Покрытие террористических актов с ТС </label>
                                                        <div class="input-group mb-4">
                                                            <input type="text"
                                                                   class="form-control terror-tc-i{{$productInformation->id}}"
                                                                   name="cover_terror_attacks_sum[{{$productInformation->id}}]"
                                                                   value="{{$productInformation->cover_terror_attacks_sum}}">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="cover_terror_attacks_currency[{{$productInformation->id}}]"
                                                                        style="width: 100%;">
                                                                    <option
                                                                        @if($productInformation->cover_terror_attacks_currency == '1') selected="selected"
                                                                        @endif value="1">UZS
                                                                    </option>
                                                                    <option
                                                                        @if($productInformation->cover_terror_attacks_currency == '2') selected="selected"
                                                                        @endif value="2">USD
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Покрытие террористических актов с застрахованными
                                                            лицами </label>
                                                        <div class="input-group mb-4">
                                                            <input type="text"
                                                                   class="form-control terror-zl-i{{$productInformation->id}}"
                                                                   name="cover_terror_attacks_insured_sum[{{$productInformation->id}}]"
                                                                   value="{{$productInformation->cover_terror_attacks_insured_sum}}">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="cover_terror_attacks_insured_currency[{{$productInformation->id}}]"
                                                                        style="width: 100%;">
                                                                    <option selected="selected"
                                                                            @if($productInformation->cover_terror_attacks_insured_currency == '1') selected="selected"
                                                                            @endif value="1">UZS
                                                                    </option>
                                                                    <option
                                                                        @if($productInformation->cover_terror_attacks_insured_currency == '2') selected="selected"
                                                                        @endif value="2">USD
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Покрытие расходы по эвакуации</label>
                                                        <div class="input-group mb-4">
                                                            <input type="text"
                                                                   class="form-control evocuation-i{{$productInformation->id}}"
                                                                   name="coverage_evacuation_cost[{{$productInformation->id}}]"
                                                                   value="{{$productInformation->coverage_evacuation_cost}}">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="coverage_evacuation_currency[{{$productInformation->id}}]"
                                                                        style="width: 100%;">
                                                                    <option selected="selected"
                                                                            @if($productInformation->cover_terror_attacks_currency == '1') selected="selected" @endif>
                                                                        UZS
                                                                    </option>
                                                                    <option
                                                                        @if($productInformation->cover_terror_attacks_currency == '1') selected="selected" @endif>
                                                                        USD
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    <div class="form-group">
                                                        <label>Застрахованы ли автотранспортные средства на момент
                                                            заполнения настоящей анкеты? </label>
                                                        <div class="row">
                                                            <div class="col-sm-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess1-i{{$productInformation->id}}', 'data-radioSuccess1-i{{$productInformation->id}}')"
                                                                        type="radio"
                                                                        class="other_insurance-i{{$productInformation->id}}"
                                                                        name="strtahovka[{{$productInformation->id}}]"
                                                                        id="radioSuccess1-i{{$productInformation->id}}"
                                                                        @if($productInformation->strtahovka == '1') checked
                                                                        @endif value="1">
                                                                    <label
                                                                        for="radioSuccess1-i{{$productInformation->id}}">Да</label>
                                                                </div>
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess1-i{{$productInformation->id}}', 'data-radioSuccess1-i{{$productInformation->id}}', false)"
                                                                        type="radio"
                                                                        class="other_insurance-i{{$productInformation->id}}"
                                                                        name="strtahovka[{{$productInformation->id}}]"
                                                                        id="radioSuccess2-i{{$productInformation->id}}"
                                                                        @if($productInformation->strtahovka == '0') checked
                                                                        @endif value="0">
                                                                    <label
                                                                        for="radioSuccess2-i{{$productInformation->id}}">Нет</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-radioSuccess1-i{{$productInformation->id}}
                                                         class="form-group other_insurance_info-i{{$productInformation->id}}"
                                                         @if($productInformation->strtahovka !== '1') style="display:none" @endif>
                                                        <label>Укажите название и адрес страховой организации и номер
                                                            Полиса</label>
                                                        <input class="form-control" type="text"
                                                               name="other_insurance_info[{{$productInformation->id}}]"
                                                               value="{{$productInformation->other_insurance_info}}">
                                                    </div>
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
                                                    <div class="form-group">
                                                        <label>Раздел I. Гибель или повреждение транспортного
                                                            средства</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess3-i{{$productInformation->id}}', 'data-radioSuccess3-i{{$productInformation->id}}')"
                                                                        type="radio"
                                                                        name="vehicle_damage[{{$productInformation->id}}]"
                                                                        class="r-1-i{{$productInformation->id}}"
                                                                        id="radioSuccess3-i{{$productInformation->id}}"
                                                                        @if($productInformation->vehicle_damage == '1') checked
                                                                        @endif value="1">
                                                                    <label
                                                                        for="radioSuccess3-i{{$productInformation->id}}">Да</label>
                                                                </div>
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess4-i{{$productInformation->id}}', 'data-radioSuccess3-i{{$productInformation->id}}', false)"
                                                                        type="radio"
                                                                        name="vehicle_damage[{{$productInformation->id}}]"
                                                                        class="r-1-i{{$productInformation->id}}"
                                                                        id="radioSuccess4-i{{$productInformation->id}}"
                                                                        @if($productInformation->vehicle_damage == '0') checked
                                                                        @endif value="0">
                                                                    <label
                                                                        for="radioSuccess4-i{{$productInformation->id}}">Нет</label>
                                                                </div>
                                                            </div>
                                                            <div data-radioSuccess3-i{{$productInformation->id}}
                                                                 class="col-md-6 r-1-show-i{{$productInformation->id}}"
                                                                 @if($productInformation->vehicle_damage == '0') style="display: none;" @endif>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span
                                                                                        class="input-group-text">Сумма</span>
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="form-control r-1-sum-i{{$productInformation->id}}"
                                                                                       name="one_sum[{{$productInformation->id}}]"
                                                                                       id="vehicle_damage_sum-i{{$productInformation->id}}"
                                                                                       value="{{$productInformation->one_sum}}">
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
                                                                                       class="form-control r-1-premia-i{{$productInformation->id}}"
                                                                                       name="one_premia[{{$productInformation->id}}]"
                                                                                       id="vehicle_damage_sum-i{{$productInformation->id}}"
                                                                                       value="{{$productInformation->one_premia}}">
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
                                                                                       class="form-control r-1-frnshiza-i{{$productInformation->id}}"
                                                                                       name="one_franshiza[{{$productInformation->id}}]"
                                                                                       id="vehicle_damage_sum-i{{$productInformation->id}}"
                                                                                       value="{{$productInformation->one_franshiza}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class=>Раздел II. Автогражданская ответственность</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess5-i{{$productInformation->id}}', 'data-radioSuccess5-i{{$productInformation->id}}')"
                                                                        type="radio"
                                                                        name="civil_liability[{{$productInformation->id}}]"
                                                                        class="r-2-i{{$productInformation->id}}"
                                                                        id="radioSuccess5-i{{$productInformation->id}}"
                                                                        @if($productInformation->civil_liability == '1') checked
                                                                        @endif
                                                                        value="1">
                                                                    <label
                                                                        for="radioSuccess5-i{{$productInformation->id}}">Да</label>
                                                                </div>
                                                                <div
                                                                    onchange="toggleBlockRadio('radioSuccess6-i{{$productInformation->id}}', 'data-radioSuccess5-i{{$productInformation->id}}', false)"
                                                                    class="checkbox icheck-success">
                                                                    <input type="radio"
                                                                           name="civil_liability[{{$productInformation->id}}]"
                                                                           class="r-2-i{{$productInformation->id}}"
                                                                           id="radioSuccess6-i{{$productInformation->id}}"
                                                                           @if($productInformation->civil_liability == '0') checked
                                                                           @endif
                                                                           value="0">
                                                                    <label
                                                                        for="radioSuccess6-i{{$productInformation->id}}">Нет</label>
                                                                </div>
                                                            </div>
                                                            <div data-radioSuccess5-i{{$productInformation->id}}
                                                                 class="col-md-6 r-2-show-i{{$productInformation->id}}"
                                                                 @if($productInformation->civil_liability == '0') style="display: none;" @endif>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span
                                                                                        class="input-group-text">Сумма</span>
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="form-control r-2-sum-i{{$productInformation->id}}"
                                                                                       name="tho_sum[{{$productInformation->id}}]"
                                                                                       id="vehicle_damage_sum-i{{$productInformation->id}}"
                                                                                       value="{{$productInformation->tho_sum}}">
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
                                                                                       class="form-control r-2-premia-i{{$productInformation->id}}"
                                                                                       name="two_preim[{{$productInformation->id}}]"
                                                                                       id="vehicle_damage_sum-i{{$productInformation->id}}"
                                                                                       value="{{$productInformation->two_preim}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Раздел III. Несчастные случаи с Застрахованными
                                                            лицами</label>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess7-i{{$productInformation->id}}', 'data-radioSuccess7-i{{$productInformation->id}}')"
                                                                        type="radio" name="accidents[{{$productInformation->id}}]"
                                                                        class="r-3-i{{$productInformation->id}}"
                                                                        id="radioSuccess7-i{{$productInformation->id}}"
                                                                        @if($productInformation->accidents == '1') checked @endif
                                                                        value="1">
                                                                    <label
                                                                        for="radioSuccess7-i{{$productInformation->id}}">Да</label>
                                                                </div>
                                                                <div class="checkbox icheck-success">
                                                                    <input
                                                                        onchange="toggleBlockRadio('radioSuccess8-i{{$productInformation->id}}', 'data-radioSuccess7-i{{$productInformation->id}}', false)"
                                                                        type="radio" name="accidents[{{$productInformation->id}}]"
                                                                        class="r-3-i{{$productInformation->id}}"
                                                                        id="radioSuccess8-i{{$productInformation->id}}"
                                                                        @if($productInformation->accidents == '0') checked @endif
                                                                        value="0">
                                                                    <label
                                                                        for="radioSuccess8-i{{$productInformation->id}}">Нет</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div data-radioSuccess7-i{{$productInformation->id}}
                                                         class="table-responsive p-0 r-3-show-i{{$productInformation->id}}"
                                                         @if($productInformation->accidents !== '1') style="display: none;" @endif>
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
                                                                               class="form-control r-3-pass-i{{$productInformation->id}}"
                                                                               value="1" readonly
                                                                               name="driver_quantity[{{$productInformation->id}}]"
                                                                               value="{{$productInformation->driver_quantity}}"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text"
                                                                                   class="form-control r-3-one-i{{$productInformation->id}}"
                                                                                   name="driver_one_sum[{{$productInformation->id}}]"
                                                                                   value="{{$productInformation->driver_one_sum}}">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success"
                                                                                        name="driver_currency[{{$productInformation->id}}]"
                                                                                        style="width: 100%;">
                                                                                    <option @if($productInformation->driver_currency == '1')  selected="selected" @endif value="1">UZS</option>
                                                                                    <option @if($productInformation->driver_currency == '2')  selected="selected" @endif value="2">USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-sum-i{{$productInformation->id}}"
                                                                               name="driver_total_sum[{{$productInformation->id}}]"
                                                                               id="driver_total_sum_i{{$productInformation->id}}"
                                                                               value="{{$productInformation->driver_total_sum}}">
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-premia-i{{$productInformation->id}}"
                                                                               name="driver_preim_sum[{{$productInformation->id}}]"
                                                                               id="driver_total_sum_i{{$productInformation->id}}"
                                                                               value="{{$productInformation->driver_preim_sum}}">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Пассажиры</label></td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-pass-1-i{{$productInformation->id}}"
                                                                               name="passenger_quantity[{{$productInformation->id}}]"
                                                                               value="{{$productInformation->passenger_quantity}}"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text"
                                                                                   class="form-control r-3-one-1-i{{$productInformation->id}}"
                                                                                   name="passenger_one_sum[{{$productInformation->id}}]"
                                                                                   value="{{$productInformation->passenger_one_sum}}">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success"
                                                                                        name="passenger_currency[{{$productInformation->id}}]"
                                                                                        style="width: 100%;">
                                                                                    <option @if($productInformation->passenger_currency == '1')  selected="selected" @endif selected="selected" value="1">UZS</option>
                                                                                    <option @if($productInformation->passenger_currency == '2')  selected="selected" @endif value="2">USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-sum-1-i{{$productInformation->id}}"
                                                                               name="passenger_total_sumi[{{$productInformation->id}}]"
                                                                               id="passenger_total_sum-i{{$productInformation->id}}"
                                                                               value="{{$productInformation->passenger_total_sumi}}">
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-premia-1-i{{$productInformation->id}}"
                                                                               name="passenger_preim_sum[{{$productInformation->id}}]"
                                                                               id="passenger_total_sum-i{{$productInformation->id}}"
                                                                               value="{{$productInformation->passenger_preim_sum}}">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label class="text-bold">Общий Лимит</label>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-pass-2-i{{$productInformation->id}}"
                                                                               name="limit_quantity[{{$productInformation->id}}]"
                                                                               value="{{$productInformation->limit_quantity}}">
                                                                    </td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text"
                                                                                   class="form-control r-3-one-2-i{{$productInformation->id}}"
                                                                                   name="limit_one_sum[{{$productInformation->id}}]"
                                                                                   value="{{$productInformation->limit_one_sum}}">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success"
                                                                                        name="limit_currency[{{$productInformation->id}}]"
                                                                                        style="width: 100%;">
                                                                                    <option @if($productInformation->limit_currency == '1')  selected="selected" @endif value="1" selected="selected">UZS</option>
                                                                                    <option @if($productInformation->limit_currency == '2')  selected="selected" @endif value="2">USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-sum-2-i{{$productInformation->id}}"
                                                                               name="limit_total_sum[{{$productInformation->id}}]"
                                                                               value="{{$productInformation->limit_total_sum}}"></td>
                                                                    <td><input type="number"
                                                                               class="form-control r-3-premia-2-i{{$productInformation->id}}"
                                                                               name="limit_preim_sum[{{$productInformation->id}}]"
                                                                               value="{{$productInformation->limit_preim_sum}}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><label
                                                                            class="text-bold">Итого</label></td>
                                                                    <td><input type="number"
                                                                               class="form-control r-summ-i{{$productInformation->id}}">
                                                                    </td>
                                                                    <td><input type="number"
                                                                               class="form-control r-summ-premia-i{{$productInformation->id}}">
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                    <div class="form-group col-sm-8">
                                                        <label>Общий лимит ответственности </label>
                                                        <div class="input-group mb-4">
                                                            <input type="text" class="form-control"
                                                                   id="totalLimit-i{{$productInformation->id}}"
                                                                   name="total_liability_limit[{{$productInformation->id}}]"
                                                                   value="{{$productInformation->total_liability_limit}}">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"
                                                                        name="total_liability_limit_currency[{{$productInformation->id}}]"
                                                                        style="width: 100%;">
                                                                    <option @if($productInformation->total_liability_limit_currency == '1')  selected="selected" @endif value="1" selected="selected">UZS</option>
                                                                    <option @if($productInformation->total_liability_limit_currency == '2')  selected="selected" @endif value="2">USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                        <div class="row policy">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="polises">Полис</label>
                                                                    <select class="form-control polises" id="polises"
                                                                            name="policy[{{$productInformation->id}}]" style="width: 100%;">
                                                                        <option @if($productInformation->policy == '1') selected="selected" @endif value="1"></option>
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
                                                                               name="from_date[{{$productInformation->id}}]"
                                                                               value="{{$productInformation->from_date}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Ответственный Агент</label>
                                                                    <select class="form-control select2" name="agent[{{$productInformation->id}}]"
                                                                            style="width: 100%;">
                                                                        <option @if($productInformation->agent == '1') selected="selected" @endif value="1" selected="selected">Ф.И.О агента</option>
                                                                        <option @if($productInformation->agent == '2') selected="selected" @endif value="2"></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Оплата страховой премии</label>
                                                                    <select class="form-control select2"
                                                                            name="payment[{{$productInformation->id}}]" style="width: 100%;">
                                                                        <option @if($productInformation->payment == '1') selected="selected" @endif value="1">Сум</option>
                                                                        <option @if($productInformation->payment == '2') selected="selected" @endif value="2">Доллар</option>
                                                                        <option @if($productInformation->payment == '3') selected="selected" @endif value="3">Евро</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Порядок оплаты</label>
                                                                    <select class="form-control select2"
                                                                            name="payment_order[{{$productInformation->id}}]" style="width: 100%;">
                                                                        <option @if($productInformation->payment == '1') selected="selected" @endif value="1" selected="selected">Сум</option>
                                                                        <option @if($productInformation->payment == '2') selected="selected" @endif value="2">Доллар</option>
                                                                        <option @if($productInformation->payment == '3') selected="selected" @endif value="3">Евро</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                                   readonly
                                                                   id="overall_sum_i{{$productInformation->id}}">
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
                        {{--                        @dd($all_product->allProductInfo[0]->policy_series)--}}
                        <div class="card-body" id="beneficiary-card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <input type="text" id="polis-series" name="policy_series"
                                                   @if(!empty($all_product->allProductInfo[0]->policy_series))
                                                   value="{{$all_product->allProductInfo->where('policy_series', '!=', null)->first()->policy_series}}"
                                                   @endif
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
                                                   @if(!empty($all_product->allProductInfo->where('policy_insurance_from', '!=', null)->first()))
                                                   value="{{$all_product->allProductInfo->where('policy_series', '!=', null)->first()->policy_insurance_from}}"
                                                   @endif
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
                                                            @if(!empty($all_product->allProductInfo->where('policy_series', '!=', null)->first()->policy_insurance_from) and $all_product->allProductInfo->where('policy_series', '!=', null)->first()->otvet_litso) selected @endif>{{$agent->name}}
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
