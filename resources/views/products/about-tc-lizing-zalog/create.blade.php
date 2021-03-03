@extends('layouts.index')

@section('content')
        <!-- Content Wrapper. Contains page content -->
        <form action="GET" id="mainFormKasko">
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
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-1" value="individual">
                                                <label for="client-type-radio-1">физ. лицо</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-2" value="legal">
                                                <label for="client-type-radio-2">юр. лицо</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product-id">Вид продукта</label>
                                    <select id="product-id" class="form-control select2" name="product_id" style="width: 100%;">
                                            <option selected="selected">ТРАСПОРТНОЕ СРЕДСТВО ПЕРЕДАВАЕМОЕ В ЛИЗИНГ/ЗАЛОГ</option>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                                            <input type="text" id="insurer-name" name="fio_insurer" value="{{ old('fio_insurer') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurer-address" class="col-form-label">Юр адрес страхователя</label>
                                            <input type="text" id="insurer-address" name="address_insurer" value="{{ old('address_insurer') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="insurer-tel" name="tel_insurer" value="{{ old('tel_insurer') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                            <input type="text" id="insurer-schet" name="address_schet" value="{{ old('address_schet') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="insurer-inn" name="inn_insurer" value="{{ old('inn_insurer') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="insurer-mfo" name="mfo_insurer" value="{{ old('mfo_insurer') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-bank" class="col-form-label">Банк</label>
                                            <input type="text" id="insurer-bank" name="bank_insurer" value="{{ old('bank_insurer') }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="insurer-okonh" name="okonh_insurer" value="{{ old('okonh_insurer') }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card card-info" id="clone-beneficiary">
                                    <div class="card-header">
                                        <h3 class="card-title">Выгодоприобретатель</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" id="beneficiary-card-body">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="beneficiary-name" class="col-form-label">ФИО выгодоприобретателя</label>
                                                        <input type="text" id="beneficiary-name" name="fio_beneficiary" value="{{ old('fio_beneficiary') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="beneficiary-address" class="col-form-label">Юр адрес выгодоприобретателя</label>
                                                        <input type="text" id="beneficiary-address" name="address_beneficiary" value="{{ old('address_beneficiary') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                        <input type="text" id="beneficiary-tel" name="tel_beneficiary" value="{{ old('tel_beneficiary') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                        <input type="text" id="beneficiary-schet" name="beneficiary_schet" value="{{ old('beneficiary_schet') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                        <input type="text" id="beneficiary-inn" name="inn_beneficiary" value="{{ old('inn_beneficiary') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                        <input type="text" id="beneficiary-mfo" name="mfo_beneficiary" value="{{ old('mfo_beneficiary') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                                        <input type="text" id="beneficiary-bank" name="bank_beneficiary" value="{{ old('bank_beneficiary') }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                        <input type="text" id="beneficiary-okonh" name="okonh_beneficiary" value="{{ old('okonh_beneficiary') }}" class="form-control">
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
                                                    <label for="dogovor-lizing-num" class="col-form-label">Договора лизинга №</label>
                                                    <input type="text" id="dogovor-lizing-num" name="dogovor_lizing_num" value="{{ old('dogovor_lizing_num') }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Период</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" value="{{ old('insurance_from') }}" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Период</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_to" name="insurance_to" value="{{ old('insurance_to') }}" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="insurance_from">Период страхования</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="insurance_from" value="{{ old('insurance_from') }}" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="insurance_to" name="insurance_to" value="{{ old('insurance_to') }}" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="geographic-zone">Географическая зона:</label>
                                        <input type="text" id="geographic-zone" name="geo_zone" value="{{ old('geo_zone') }}" class="form-control">
                                    </div>
                                    <label for="polises">Валюта взаиморасчетов</label>
                                    <select class="form-control polises" id="polises" name="polis_series_0" style="width: 100%;">
                                        <option selected="selected">UZS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Сведени о трансортных средствах</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                                <th class="text-nowrap">Ответственное лицо</th>
                                                <th class="text-nowrap">Год выпуска</th>
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
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_mark_0" value="{{ old('polis_mark_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_model_0" value="{{ old('polis_model_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_modification_0" value="{{ old('polis_modification_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_gos_num_0" value="{{ old('polis_gos_num_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_teh_passport_0" value="{{ old('polis_teh_passport_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_num_engine_0" value="{{ old('polis_num_engine_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_num_body_0" value="{{ old('polis_num_body_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="polis_payload_0" value="{{ old('polis_payload_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum2" name="polis_places_0" value="{{ old('polis_places_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum2" name="polis_places_0" value="{{ old('polis_places_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum_0" value="{{ old('overall_polis_sum_0') }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control forsum3 insurance_premium-0" readonly name="polis_premium_0" value="{{ old('polis_premium_0') }}">
                                                </td>
                                                <td>
                                                    <input type="button" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="0">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="10" style="text-align: right"><label class="text-bold">Итого</label></td>
                                                <td><input readonly type="text" class="form-control overall-sum4" /></td>
                                                <td><input readonly type="text" class="form-control overall-sum3" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div id="general-product-fields">
                            <div id="product-field-modal-0" class="modal" data-field-number="0">
                                <div class="modal-content" id="product-field-modal-content-0">
                                    <span class="close product-fields-close" id="product-fields-close-0" data-field-number="0">&times;</span>
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Перечень дополнительного оборудования</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                                <div id="product-fields-0-1">
                                                    <table class="table table-hover table-head-fixed" id="empTable2">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap">Марка, модель, модификация ТС</th>
                                                                <th>Наименование оборудования</th>
                                                                <th>Серийный номер</th>
                                                                <th>Страховая сумма</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control" name="mark_model" value="{{ old('mark_model') }}"></td>
                                                                <td><input type="text" class="form-control" name="name" value="{{ old('name') }}"></td>
                                                                <td><input type="text" class="form-control" name="series_number" value="{{ old('series_number') }}"></td>
                                                                <td><input type="text" class="form-control forsum5" name="insurance_sum" value="{{ old('insurance_sum') }}" id="insurance_sum-0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"><label class="text-bold">Итого</label></td>
                                                                <td><input type="text" class="form-control overall-sum5" readonly name="total"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Дополнительное страховое покрытие</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div id="product-fields-0-2">
                                                <div class="form-group">
                                                    <label>Покрытие террористических актов с ТС </label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" class="form-control terror-tc-0" name="cover_terror_attacks_sum" value="{{ old('cover_terror_attacks_sum') }}">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="cover_terror_attacks_currency" style="width: 100%;">
                                                                <option selected="selected">UZS</option>
                                                                <option>USD</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Покрытие террористических актов с застрахованными лицами </label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" class="form-control terror-zl-0" name="cover_terror_attacks_insured_sum" value="{{ old('cover_terror_attacks_insured_sum') }}">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="cover_terror_attacks_insured_currency"  style="width: 100%;">
                                                                <option selected="selected">UZS</option>
                                                                <option>USD</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Покрытие расходы по эвакуации</label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" class="form-control evocuation-0" name="coverage_evacuation_cost" value="{{ old('coverage_evacuation_cost') }}">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="coverage_evacuation_currency" style="width: 100%;">
                                                            <option selected="selected">UZS</option>
                                                            <option>USD</option>
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
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="product-fields-0-3">
                                                <div class="form-group">
                                                    <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты? </label>
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess1" value="1">
                                                                <label for="radioSuccess1">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess2" value="0">
                                                                <label for="radioSuccess2">Нет</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group other_insurance_info-0" style="display:none">
                                                    <label>Укажите название и адрес страховой организации и номер Полиса</label>
                                                    <input class="form-control" type="text" name="other_insurance_info" value="{{ old('other_insurance_info') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Страховые покрытия по видам опасностей </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div id="product-fields-0-4">
                                                <div class="form-group">
                                                    <label>Раздел I. Гибель или повреждение транспортного средства</label>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="vehicleDamage" class="r-1-0" id="radioSuccess3" value="1">
                                                                <label for="radioSuccess3">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="vehicle_damage" class="r-1-0" id="radioSuccess4" value="0">
                                                                <label for="radioSuccess4">Нет</label>
                                                            </div>
                                                        </div>
                                                        <div class="row r-1-show-0" style="display: none;">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Сумма</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-1-sum-0" name="one_sum" value="{{ old('one_sum') }}" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Страховая премия</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-1-premia-0" name="one_premia" value="{{ old('one_premia') }}" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Франшиза</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-1-frnshiza" name="one_franshiza" value="{{ old('one_franshiza') }}" id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="product-fields-0-5">
                                                <div class="form-group">
                                                    <label class=>Раздел II. Автогражданская ответственность</label>
                                                    <div class="row">
                                                        <div class="col-sm-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="civil_liability" class="r-2-0" id="radioSuccess5" value="1">
                                                                <label for="radioSuccess5">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="civil_liability" class="r-2-0" id="radioSuccess6" value="0">
                                                                <label for="radioSuccess6">Нет</label>
                                                            </div>
                                                        </div>
                                                        <div class="row r-2-show-0" style="display: none;">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Сумма</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-2-sum-0" name="tho_sum" id="vehicle_damage_sum_0" value="{{ old('vehicle_damage_sum_0') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">Страховая премия</span>
                                                                        </div>
                                                                        <input type="text" class="form-control r-2-premia-0" name="two_preim" value="{{ old('two_preim') }}"  id="vehicle_damage_sum-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="product-fields-0-6">
                                                <div class="form-group">
                                                    <label>Раздел III. Несчастные случаи с Застрахованными лицами</label>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="accidents" class="r-3-0" id="radioSuccess7-0" value="1">
                                                                <label for="radioSuccess7-0">Да</label>
                                                            </div>
                                                            <div class="checkbox icheck-success">
                                                                <input type="radio" name="accidents" class="r-3-0" id="radioSuccess8-0" value="0">
                                                                <label for="radioSuccess8-0">Нет</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- раздел 3 - да - show -->
                                                <div class="table-responsive p-0 r-3-show-0" style="display: none;">
                                                    <div id="product-fields-0-7">
                                                        <table class="table table-hover table-head-fixed">
                                                            <thead>
                                                                <tr>
                                                                    <th>Объекты страхования </th>
                                                                    <th>Количество водителей /пассажиров</th>
                                                                    <th>Страховая сумма на одного лица</th>
                                                                    <th>Страховая сумма</th>
                                                                    <th>Страховая премия</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><label>Водитель(и)</label></td>
                                                                    <td><input type="number" class="form-control r-3-pass-0" readonly value="1" name="driver_quantity"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text" class="form-control r-3-one-0" name="driver_one_sum" value="{{ old('driver_one_sum') }}">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success" name="driver_currency" style="width: 100%;">
                                                                                    <option selected="selected">UZS</option>
                                                                                    <option>USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number" class="form-control r-3-sum-0" name="driver_total_sum" value="{{ old('driver_total_sum') }}" id="driver_total_sum-0"></td>
                                                                    <td><input type="number" class="form-control r-3-premia-0" name="driver_preim_sum" value="{{ old('driver_preim_sum') }}" id="driver_total_sum-0"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label>Пассажиры</label></td>
                                                                    <td><input type="number" class="form-control r-3-pass-1-0" name="passenger_quantity" value="{{ old('passenger_quantity') }}"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text" class="form-control r-3-one-1-0" name="passenger_one_sum" value="{{ old('passenger_one_sum') }}">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success" name="passenger_currency" style="width: 100%;">
                                                                                <option selected="selected">UZS</option>
                                                                                <option>USD</option>
                                                                            </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number" class="form-control r-3-sum-1-0" name="passenger_total_sum" value="{{ old('passenger_total_sum') }}" id="passenger_total_sum-0"></td>
                                                                    <td><input type="number" class="form-control r-3-premia-1-0" name="passenger_preim_sum" value="{{ old('passenger_preim_sum') }}" id="passenger_total_sum-0"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><label class="text-bold">Общий Лимит</label></td>
                                                                    <td><input type="number" class="form-control r-3-pass-2-0" name="limit_quantity" value="{{ old('limit_quantity') }}"></td>
                                                                    <td>
                                                                        <div class="input-group mb-4">
                                                                            <input type="text" class="form-control r-3-one-2-0" name="limit_one_sum" value="{{ old('limit_one_sum') }}">
                                                                            <div class="input-group-append">
                                                                                <select class="form-control success" name="limit_currency" style="width: 100%;">
                                                                                    <option selected="selected">UZS</option>
                                                                                    <option>USD</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="number" class="form-control r-3-sum-2-0" name="limit_total_sum" value="{{ old('limit_total_sum') }}"></td>
                                                                    <td><input type="number" class="form-control r-3-premia-2-0" name="limit_preim_sum" value="{{ old('limit_preim_sum') }}"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><label class="text-bold">Итого</label></td>
                                                                    <td><input type="number" class="form-control r-summ-0"></td>
                                                                    <td><input type="number" class="form-control r-summ-premia-0"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-8">
                                                    <label>Общий лимит ответственности </label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" id="totalLimit-0" class="form-control" name="total_liability_limit_0" value="{{ old('total_liability_limit_0') }}">
                                                        <div class="input-group-append">
                                                            <select class="form-control success" name="total_liability_limit_currency-0" style="width: 100%;">
                                                                <option selected="selected">UZS</option>
                                                                <option>USD</option>
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
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </button>
                                                </div>
                                            </div>
                                            <div class="card payment">
                                                <div class="card-body">
                                                    <div id="polis-fields-0">
                                                        <div class="row policy">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="polises">Полис</label>
                                                                    <select class="form-control polises" id="polises" name="policy" style="width: 100%;">
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
                                                                    <div class="input-group mb-3" style="margin-top: 33px">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">от</span>
                                                                        </div>
                                                                        <input type="date" class="form-control" name="from_date" value="{{ old('from_date') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Ответственный Агент</label>
                                                                    <select class="form-control select2" name="agent" style="width: 100%;">
                                                                                                <option selected="selected">Ф.И.О агента</option>
                                                                                                <option></option>
                                                                                            </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Оплата страховой премии</label>
                                                                    <select class="form-control select2" name="payment" style="width: 100%;">
                                                                                                <option selected="selected">Сум</option>
                                                                                                <option>Доллар</option>
                                                                                                <option>Евро</option>
                                                                                            </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Порядок оплаты</label>
                                                                    <select class="form-control select2" name="payment-order" style="width: 100%;">
                                                                                                <option selected="selected">Сум</option>
                                                                                                <option>Доллар</option>
                                                                                                <option>Евро</option>
                                                                                            </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-info polis" id="Overall">
                                                <div class="card-header">
                                                    <h3 class="card-title">Итого</h3>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                                                        <i class="fas fa-minus"></i>
                                                                                    </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Общая страховая сумма</span>
                                                            </div>
                                                            <input type="text" class="form-control" readonly id="overall-sum-0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Default box -->
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
                                                <div class="col-sm-6">
                                                    <div class="form-group form-inline justify-content-between">
                                                        <label>Оплата страховой премии в</label>
                                                        <select class="form-control" style="width: 100%; text-align: center">
                                                                            <option selected="selected" name="insurance_premium_currency">UZS</option>
                                                                            <option>USD</option>
                                                                            <option>Евро</option>
                                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group form-inline justify-content-between">
                                                        <label>Порядок оплаты страховой премии</label>
                                                        <select class="form-control payment-schedule" name="payment_term" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                                            <option value="1">Единовременно</option>
                                                            <option value="other">Другое</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="other-payment-schedule" style="display: none">
                                                <div class="form-group">
                                                    <button type="button" onclick="addRow3()" class="btn btn-primary ">Добавить</button>
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
                                                                <td><input type="text" class="form-control" name="payment_sum_0_0" value="{{ old('payment_sum_0_0') }}"></td>
                                                                <td><input type="date" class="form-control" name="payment_from_0_0" value="{{ old('payment_from_0_0') }}"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
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
                                                <input type="text" id="polis-series" name="polis_series" value="{{ old('polis_series') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" value="{{ old('insurance_from') }}" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso">Ответственное лицо</label>
                                                <select class="form-control polises" id="otvet-litso" name="litso" style="width: 100%;">
                                                    <option selected="selected">Имя Фамилия</option>
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
        </form>
@endsection
