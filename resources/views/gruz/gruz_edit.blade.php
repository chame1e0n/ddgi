@extends('layouts.index')

@section('content')
    <form action="{{route('gruz.update', $all_product->id)}}" method="post" enctype="multipart/form-data" id="mainFormKasko">
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
                    @include('includes.client')

                    @include('includes.beneficiary')
                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведения об объекте</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="anketa-fields">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="dogovor-lizing-num" class="col-form-label">Номер
                                                            поставки</label>
                                                        <input type="text" id="dogovor-lizing-num"
                                                               name="dogovor_lizing_num"
                                                               value="{{$all_product->dogovor_lizing_num}}"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Дата поставки</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="insurance_from"
                                                           value="{{$all_product->insurance_from}}"
                                                           type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Пункт отправителя</label>
                                                    <input type="text" id="geographic-zone" name="sending_point"
                                                           value="{{$all_product->sending_point}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Пункт назначения</label>
                                                    <input type="text" id="geographic-zone" name="point_destination"
                                                           value="{{$all_product->point_destination}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Географическая зона</label>
                                                    <input type="text" id="geographic-zone" name="geo_zone"
                                                           value="{{$all_product->geo_zone}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Места перегрузок, перевалок</label>
                                                    <input type="text" id="geographic-zone" name="point_overloads"
                                                           value="{{$all_product->point_overloads}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Страны действия страхования</label>
                                                    <input type="text" id="geographic-zone" name="insurance_countries"
                                                           value="{{$all_product->insurance_countries}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Местонахождение груза</label>
                                                    <input type="text" id="geographic-zone" name="location_of_cargo"
                                                           value="{{$all_product->location_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Наименование груза</label>
                                                    <input type="text" id="geographic-zone" name="name_of_cargo"
                                                           value="{{$all_product->name_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вид груза</label>
                                                    <input type="text" id="geographic-zone" name="type_of_cargo"
                                                           value="{{$all_product->type_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вид упаковки</label>
                                                    <input type="text" id="geographic-zone" name="type_packaging"
                                                           value="{{$all_product->type_packaging}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вес груза</label>
                                                    <input type="text" id="geographic-zone" name="weight_of_cargo"
                                                           value="{{$all_product->weight_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Количество единиц груза</label>
                                                    <input type="text" id="geographic-zone" name="amount_of_cargo"
                                                           value="{{$all_product->amount_of_cargo}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Вид транспорта</label>
                                                    <input type="text" id="geographic-zone" name="type_of_transport"
                                                           value="{{$all_product->type_of_transport}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">Особенности
                                                        груза</label>
                                                    <textarea id="beneficiary-name" name="qualities_of_cargo"
                                                              class="form-control">{{$all_product->qualities_of_cargo}}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" id="friends">
                                                    <label>Cопровождающие лица</label>
                                                    <div class="row" id="cloneLitso">
                                                        <div class="col-md-11">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>ФИО</label>
                                                                        <input name="fio_accompanying_main" type="text"
                                                                               value="{{$all_product->fio_accompanying}}"
                                                                               class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Должность</label>
                                                                        <input name="position_accompanying_main"
                                                                               value="{{$all_product->position_accompanying}}"
                                                                               type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input style="margin-top: 32px;" type="button" id="addLitso"
                                                                   value="Добавить"
                                                                   class="btn btn-success product-fields-button">
                                                        </div>
                                                    </div>
                                                    @if(!empty($all_product->allproductFollower[0]->name))
                                                        @foreach($all_product->allproductFollower[0]->name as $key => $item)
                                                            <div class="row" id="cloneLitso">
                                                                <div class="col-md-11">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>ФИО</label>
                                                                                <input id="fio_input"
                                                                                       name="name[]" type="text"
                                                                                       value="{{$all_product->allproductFollower[0]->name[$key]}}"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Должность</label>
                                                                                <input id="position_input"
                                                                                       name="position[]"
                                                                                       type="text"
                                                                                       value="{{$all_product->allproductFollower[0]->position[$key]}}"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <input style="margin-top: 32px;" type="button"
                                                                           id="addLitso"
                                                                           value="Удалить"
                                                                           class="btn btn-success product-fields-button removeLitso btn-warning">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Количество грузовых мест</label>
                                                    <input type="text" id="geographic-zone" name="amount_of_cargo_place"
                                                           value="{{$all_product->amount_of_cargo_place}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Грузаперевозчик</label>
                                                    <input type="text" id="geographic-zone" name="transporter"
                                                           value="{{$all_product->transporter}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Наименование грузоотправителя</label>
                                                    <input type="text" id="geographic-zone" name="name_of_shipper"
                                                           value="{{$all_product->name_of_shipper}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Адрес грузоотправителя</label>
                                                    <input type="text" id="geographic-zone" name="address_shipper"
                                                           value="{{$all_product->address_shipper}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Наименование грузополучателя</label>
                                                    <input type="text" id="geographic-zone" name="name_consignee"
                                                           value="{{$all_product->name_consignee}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Адрес грузополучателя</label>
                                                    <input type="text" id="geographic-zone" name="address_consignee"
                                                           value="{{$all_product->address_consignee}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период страхования </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="object_from_date"
                                                           value="{{$all_product->object_from_date}}"
                                                           type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период страхования </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_from" name="object_to_date"
                                                           value="{{$all_product->object_to_date}}"
                                                           type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период упаковки </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="packaging_period_from"
                                                           value="{{$all_product->packaging_period_from}}"
                                                           type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Период упаковки </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_from" name="packaging_period_to"
                                                           value="{{$all_product->packaging_period_to}}"
                                                           type="date"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="geographic-zone">Условия страхования груза</label>
                                                    <div class="col-sm-12">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   @if($all_product->condition_insurance == "individual1") checked @endif
                                                                   class="client-type-radio" id="radio-1"
                                                                   value="individual1">
                                                            <label for="radio-1">Не имеются</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   @if($all_product->condition_insurance == "individual") checked @endif
                                                                   class="client-type-radio" id="radio-2"
                                                                   value="individual">
                                                            <label for="radio-2">С ответственностью за все
                                                                риски </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   @if($all_product->condition_insurance == "legal") checked @endif
                                                                   class="client-type-radio" id="radio-3" value="legal">
                                                            <label for="radio-3">С ответственностью за частную
                                                                аварию </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="icheck-success">
                                                            <input type="radio" name="condition_insurance"
                                                                   @if($all_product->condition_insurance == "legal1") checked @endif
                                                                   class="client-type-radio" id="radio-4" value="legal1">
                                                            <label for="radio-4">Без ответственности за повреждения,
                                                                кроме случаев крушения</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="geographic-zone">Сопровождающие документы</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="file" multiple id="geographic-zone"
                                                                   name="accompanying_file" class="form-control">
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
                                        <input type="text" id="all-summ" value="{{$all_product->insurance_sum}}"
                                               name="insurance_sum" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" value="{{$all_product->insurance_bonus}}"
                                               name="insurance_bonus" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" value="{{$all_product->franchise}}"
                                               name="franchise" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames"
                                                style="width: 100%; text-align: center">
                                            <option selected="selected"
                                                    value="{{$all_product->insurance_premium_currency}}"
                                                    name="insurance_premium_currency">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" class="form-control payment-schedule" name="payment_term"
                                                style="width: 100%; text-align: center">
                                            <option @if($all_product->payment_term === "1") selected @endif value="1">
                                                Единовременно
                                            </option>
                                            <option @if($all_product->payment_term === "transh") selected
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
                                            <option @if($all_product->way_of_calculation === "1") selected
                                                    @endif value="1">Сумах
                                            </option>
                                            <option @if($all_product->way_of_calculation === "2") selected
                                                    @endif value="2">Сумах В ин. валюте
                                            </option>
                                            <option @if($all_product->way_of_calculation === "3") selected
                                                    @endif value="3">В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option @if($all_product->way_of_calculation === "4") selected
                                                    @endif value="4">В ин. валюте по курсу ЦБ на день оплаты
                                            </option>
                                            <option @if($all_product->way_of_calculation === "5") selected
                                                    @endif value="5">В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule"
                                 @if($all_product->payment_term == "1") class="d-none" @endif>
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
                                            <td><input value="{{$all_product->payment_sum_main}}" type="text"
                                                       class="form-control" name="payment_sum_main"></td>
                                            <td><input value="{{$all_product->payment_from_main}}" type="date"
                                                       class="form-control" name="payment_from_main">
                                            </td>
                                        </tr>
                                        {{--                                        @dd($all_product->allProductCurrencyTerms[0]->payment_sum)--}}
                                        @if($all_product->allProductCurrencyTerms[0]->payment_sum !== null)
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
                                           @if($all_product->tariff === "tariff") checked @endif value="tariff"
                                           type="checkbox" name="tariff" id="tarif">
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr
                                     @if($all_product->tariff !== "tariff") style="display: none" @endif>
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input class="form-control" value="{{$all_product->tariff_other}}"
                                           name="tariff_other" id="descrTarif" type="number">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input onchange="toggleBlock('preim', 'data-preim-descr')"
                                           class="form-check-input client-type-radio"
                                           @if($all_product->preim === "preim") checked @endif value="preim"
                                           type="checkbox" name="preim" id="preim">
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr
                                     @if($all_product->preim !== "preim") style="display: none" @endif>
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input class="form-control" value="{{$all_product->premiya_other}}"
                                           name="premiya_other" id="descrPreim" type="number">
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
                                            <input id="insurance_from" name="policy_insurance_from" type="date"
                                                   value="{{$all_product->allProductInfo->policy_insurance_from}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="otvet_litso"
                                                    style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}"
                                                            @if($all_product->allProductInfo->otvet_litso ==  $agent->id) selected @endif>{{$agent->name}}</option>
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
    <form action="{{route('gruz.destroy', $all_product->id)}}" method="post">
        @csrf
        @method('delete')
        <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right">Удалить</button>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="/assets/custom/js/form/form-actions.js"></script>
@endsection
