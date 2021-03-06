@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('content')
    <form action="{{route('avto-index.store')}}" id="mainFormKasko" enctype="multipart/form-data" method="POST">
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
                <div class="card-body">
                    @include('includes.client')
                </div>


                <div class="card-body">
                    @include('includes.beneficiary')

                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="insurance_from">Период страхования</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input id="insurance_from" name="insurance_from" type="date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="insurance_from">Период страхования</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="insurance_from" name="insurance_from" type="date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group  justify-content-between">
                                        <label>Использования ТС на основании</label>
                                        <select class="form-control payment-schedule" name="payment_term"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option value="selected"></option>
                                            <option value="1">Тех пасспорт</option>
                                            <option value="2">Доверенность</option>
                                            <option value="3">Договор аренды</option>
                                            <option value="4">Путевой лист</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="geographic-zone">Географическая зона:</label>
                                        <input type="text" id="geographic-zone" name="geo_zone" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Сведени о трансортных средствах</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" onclick="addRow()" class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                <div id="product-fields" class="product-fields" data-field-number="0">
                                    <table class="table table-hover table-head-fixed" id="empTable">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Дата выдачи</th>
                                            <th class="text-nowrap">Период действия полиса</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">ИД строки</th>
                                            <th class="text-nowrap">Марка</th>
                                            <th class="text-nowrap">Модель</th>
                                            <th class="text-nowrap">Модификация</th>
                                            <th class="text-nowrap">Гос. номер</th>
                                            <th class="text-nowrap">Год выпуска</th>
                                            <th class="text-nowrap">Номер тех паспорта</th>
                                            <th class="text-nowrap">Номер двигателя</th>
                                            <th class="text-nowrap">Номер кузова</th>
                                            <th class="text-nowrap">Грузоподъёмность</th>
                                            <th class="text-nowrap">Количество посадочных мест</th>
                                            <th class="text-nowrap">Страховая стоимость</th>
                                            <th class="text-nowrap">Страховая сумма</th>
                                            <th class="text-nowrap">Страховая премия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="16" style="text-align: right"><label
                                                    class="text-bold">Итого</label></td>
                                            <td>
                                                <input readonly type="text"
                                                       class="form-control forsum4 overall_insurance_sum-0"
                                                       name="overall_polis_sum[]">
                                            </td>
                                            <td>
                                                <input readonly type="text"
                                                       class="form-control forsum4 overall_insurance_sum-0"
                                                       name="overall_polis_sum[]">
                                            </td>
                                            <td>
                                                <input readonly type="text"
                                                       class="form-control forsum4 overall_insurance_sum-0"
                                                       name="overall_polis_sum[]">
                                            </td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label>При наружном осмотре ТС дефекты и повреждения</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="checkbox icheck-success">
                                    <input id="defects-1" type="radio" class="defects" name="defects" value="1">
                                    <label for="defects-1">Да - присутствуют</label>
                                </div>
                                <div class="checkbox icheck-success ">
                                    <input id="defects-0" type="radio" class="defects" name="defects" value="0">
                                    <label for="defects-0">Нет - не имеются</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group defects_images" style="display: none;">
                            <label>Фотографии дефектов ТС</label>
                            <input class="form-control" type="file" multiple name="defects_images">
                        </div>
                        <div class="form-group">
                            <label>Цель использования</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>

                    <div id="general-product-fields">
                        <div id="product-field-modal-0" class="modal" data-field-number="0">
                            <div class="modal-content" id="product-field-modal-content-0">
                                <span class="close product-fields-close" id="product-fields-close-0"
                                      data-field-number="0">&times;</span>

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Сведени о трансортных средствах</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Утрата (Гибель) или повреждение ТС</label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess1" value="1">
                                                            <label for="radioSuccess1">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess2" value="0">
                                                            <label for="radioSuccess2">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info-0" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер
                                                    Полиса</label>
                                                <input class="form-control" type="text" name="other_insurance_info">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Несчастные случаи с Застрахованными лицами</label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess3" value="1">
                                                            <label for="radioSuccess3">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess4" value="0">
                                                            <label for="radioSuccess4">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info-0" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер
                                                    Полиса</label>
                                                <input class="form-control" type="text" name="other_insurance_info">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Автогражданская ответственность
                                                </label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess5" value="1">
                                                            <label for="radioSuccess5">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess6" value="0">
                                                            <label for="radioSuccess6">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info-0" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер
                                                    Полиса</label>
                                                <input class="form-control" type="text" name="other_insurance_info">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Застрахованы ли автотранспортные средства на момент заполнения
                                                    настоящей анкеты?
                                                </label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess7" value="1">
                                                            <label for="radioSuccess7">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess8" value="0">
                                                            <label for="radioSuccess8">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info-0" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер
                                                    Полиса</label>
                                                <input class="form-control" type="text" name="other_insurance_info">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Гибель или повреждение транспортного средства</label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess9" value="1">
                                                            <label for="radioSuccess9">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess0" value="0">
                                                            <label for="radioSuccess0">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info-0" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер
                                                    Полиса</label>
                                                <input class="form-control" type="text" name="other_insurance_info">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body">
                                        <div id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Несчастные случаи с Застрахованными лицами</label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess10" value="1">
                                                            <label for="radioSuccess10">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="strtahovka[]" id="radioSuccess11" value="0">
                                                            <label for="radioSuccess11">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info-0" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер
                                                    Полиса</label>
                                                <input class="form-control" type="text" name="other_insurance_info">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="icheck-success ">
                                            <input onchange="toggleBlock('tarif', 'data-tarif-descr')"
                                                   class="form-check-input client-type-radio" type="checkbox"
                                                   name="tarif" id="tarif">
                                            <label class="form-check-label" for="tarif">Тариф</label>
                                        </div>
                                        <!-- TODO: Блок должен находится в скрытом состоянии
                                        отображаться только тогда, когда выбран checkbox "Тариф"
                                        -->
                                        <div class="form-group" data-tarif-descr style="display: none">
                                            <label for="descrTarif" class="col-form-label">Укажите процент
                                                тарифа</label>
                                            <input class="form-control" id="descrTarif" type="number">
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
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
                                    <div class="col-sm-4">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Валюта взаиморасчетов</label>
                                            <select class="form-control" id="walletNames" style="width: 100%; text-align: center">
                                                <option selected="selected" name="insurance_premium_currency">UZS
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Порядок оплаты страховой премии</label>
                                            <select id="condition" class="form-control payment-schedule" name="payment_term" style="width: 100%; text-align: center">
                                                <option value="1">Единовременно</option>
                                                <option value="transh">Транш</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Способ расчета</label>
                                            <select class="form-control payment-schedule" name="way_of_calculation" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                                <option value="1">Сумах</option>
                                                <option value="2">Сумах В ин. валюте</option>
                                                <option value="3">В ин. валюте по курсу ЦБ на день заключение
                                                    договора
                                                </option>
                                                <option value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                                <option value="4">В ин. валюте по фиксированному ЦБ на день оплаты
                                                    премии/первого транша
                                                </option>
                                            </select>
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
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio"
                                               type="checkbox" name="tarif" id="tarif">
                                        <label class="form-check-label" for="tarif">Тариф</label>
                                    </div>
                                    <!-- TODO: Блок должен находится в скрытом состоянии
                                    отображаться только тогда, когда выбран checkbox "Тариф"
                                    -->
                                    <div class="form-group" data-tarif-descr style="display: none">
                                        <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                        <input class="form-control" id="descrTarif" type="number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input onchange="toggleBlock('preim', 'data-preim-descr')" class="form-check-input client-type-radio"
                                               type="checkbox" name="preim" id="preim">
                                        <label class="form-check-label" for="preim">Премия</label>
                                    </div>
                                    <!-- TODO: Блок должен находится в скрытом состоянии
                                    отображаться только тогда, когда выбран checkbox "Тариф"
                                    -->
                                    <div class="form-group" data-preim-descr style="display: none">
                                        <label for="descrPreim" class="col-form-label">Укажите процент тарифа</label>
                                        <input class="form-control" id="descrPreim" type="number">
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
                                                <input type="text" id="polis-series" name="polis_series"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="otvet-litso">Ответственное
                                                    лицо</label>
                                                <select class="form-control polises" id="otvet-litso" name="litso"
                                                        style="width: 100%;">
                                                    <option selected="selected">Имя Фамилия</option>
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
                                            <input type="file" id="geographic-zone" name="geo_zone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>
                                            <input type="file" id="geographic-zone" name="geo_zone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Полис</label>
                                            <input type="file" id="geographic-zone" name="geo_zone"
                                                   class="form-control">
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
    <script src="/assets/custom/js/form/product-fields.js"></script>
    <script src="/assets/custom/js/form/variables.js"></script>
@endsection
