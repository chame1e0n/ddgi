@extends('layouts.index_layout')

@section('content')
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
                        <form method="POST" id="client-product-form">
                            <div class="form-group clearfix">
                                <label>Типы клиента</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" checked class="client-type-radio" id="client-type-radio-1" value="individual">
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
                                    <option selected="selected">говно</option>
                                    <option selected="selected">говно 2</option>
                                    <option value="1">asdc</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Страхователи</h3>

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
                                        <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                                        <input type="text" id="insurer-name" name="fio-insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес страхователя</label>
                                        <input type="text" id="insurer-address" name="address-insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-tel" name="tel-insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address-schet" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-inn" name="inn-insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo-insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="insurer-bank" name="bank-insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="insurer-okonh" name="okonh-insurer" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4" style="margin-top: 38px">
                                    <div class="form-group">
                                        <button id="insurer-modal-button" class="btn btn-primary">Добавить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Выгодоприобретатели</h3>

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
                                        <label for="beneficiary-name" class="col-form-label">ФИО выгодоприобретателя</label>
                                        <input type="text" id="beneficiary-name" name="fio-beneficiary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-address" class="col-form-label">Юр адрес выгодоприобретателя</label>
                                        <input type="text" id="beneficiary-address" name="address-beneficiary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="beneficiary-tel" name="tel-beneficiary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="beneficiary-schet" name="beneficiary-schet" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="beneficiary-inn" name="inn-beneficiary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="beneficiary-mfo" name="mfo-beneficiary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="beneficiary-okonh" name="okonh-beneficiary" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4" style="margin-top: 38px">
                                    <div class="form-group">
                                        <button id="beneficiary-modal-button" class="btn btn-primary">Добавить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="insurance_from">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="insurance_to" name="insurance_to" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="reason">Использование транспортного средства на основании:</label>
                                    <input type="text" id="reason" name="reason" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="geographic-zone">Географическая зона:</label>
                                    <input type="text" id="geographic-zone" name="geo-zone" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
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
                            <form method="POST" id="product-fields" class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Период действия полиса</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">ИД строки</th>
                                            <th class="text-nowrap">Марка</th>
                                            <th class="text-nowrap">Модель</th>
                                            <th class="text-nowrap">Модификация</th>
                                            <th class="text-nowrap">Гос. номер</th>
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
                                            <td>
                                                <input type="text" disabled class="form-control" name="polis-num-0">
                                            </td>
                                            <td>
                                                <select class="form-control polises" id="polises" name="polis-series-0" style="width: 100%;">
                                                    <option selected="selected"></option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="period_polis-0">
                                            </td>
                                            <td>
                                                <select class="form-control polises" id="polises" name="polis-agent-0" style="width: 100%;">
                                                    <option selected="selected"></option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="polis-id-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="polis-mark-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="polis-model-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="polis-modification-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum2" name="polis-gos-num-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum2" name="polis-teh-passport-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum2" name="polis-num-engine-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum2" name="polis-num-body-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum2" name="polis-payload-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum2" name="polis-places-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum insurance_sum-0" data-field-number="0" name="polis_sum-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum4 overall_insurance_sum-0" readonly name="overall_polis_sum-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum3 insurance_premium-0" readonly name="polis_premium-0">
                                            </td>
                                            <td>
                                                <input type="button" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="13" style="text-align: right"><label class="text-bold">Итого</label></td>
                                            <td><input readonly type="text" class="form-control overall-sum2" /></td>
                                            <td><input readonly type="text" class="form-control overall-sum" /></td>
                                            <td><input readonly type="text" class="form-control overall-sum4" /></td>
                                            <td><input readonly type="text" class="form-control overall-sum3" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="form-group">
                            <label>При наружном осмотре ТС дефекты и повреждения</label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="checkbox icheck-success defects">
                                        <input type="radio" name="defects" checked value="1">
                                        <label for="">Нет - не имеются</label>
                                    </div>
                                    <div class="checkbox icheck-success defects">
                                        <input type="radio" name="radio" id="" value="0">
                                        <label for="">Да - присутствуют</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group defects_images" style="display:none">
                                <label>Фотографии дефектов ТС</label>
                                <input class="form-control" type="file" multiple name="defects_images">
                            </div>
                            <div class="form-group">
                                <label>Цель использования</label>
                                <input type="text" class="form-control">
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
                                            <form method="POST" id="product-fields-0-1">
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
                                                            <td><input type="text" class="form-control" name="mark_model"></td>
                                                            <td><input type="text" class="form-control" name="name"></td>
                                                            <td><input type="text" class="form-control" name="series_number"></td>
                                                            <td><input type="text" class="form-control" name="insurance_sum" id="insurance_sum-0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><label class="text-bold">Итого</label></td>
                                                            <td><input type="text" class="form-control" name="total"></td>
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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" id="product-fields-0-2">
                                            <div class="form-group">
                                                <label>Покрытие террористических актов с ТС </label>
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control" name="cover_terror_attacks_sum">
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
                                                    <input type="text" class="form-control" name="cover_terror_attacks_insured_sum">
                                                    <div class="input-group-append">
                                                        <select class="form-control success" name="cover_terror_attacks_insured_currency" style="width: 100%;">
                                                            <option selected="selected">UZS</option>
                                                            <option>USD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Покрытие расходы по эвакуации</label>
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control" name="coverage_evacuation_cost">
                                                    <div class="input-group-append">
                                                        <select class="form-control success" name="coverage_evacuation_currency" style="width: 100%;">
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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты? </label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="vehicle_damage" checked id="radioSuccess1" value="1">
                                                            <label for="radioSuccess1">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="vehicle_damage" id="radioSuccess2" value="0">
                                                            <label for="radioSuccess2">Нет</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Сумма</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="vehicle_damage_sum" id="vehicle_damage_sum-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер Полиса</label>
                                                <input class="form-control" type="text" name="other_insurance_info">
                                            </div>
                                        </form>
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
                                        <form method="POST" id="product-fields-0-4">
                                            <div class="form-group">
                                                <label>Раздел I. Гибель или повреждение транспортного средства</label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="vehicle_damage" checked id="radioSuccess3" value="1">
                                                            <label for="radioSuccess3">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="vehicle_damage" id="radioSuccess4" value="0">
                                                            <label for="radioSuccess4">Нет</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Сумма</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="vehicle_damage_sum" id="vehicle_damage_sum-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form method="POST" id="product-fields-0-5">
                                            <div class="form-group">
                                                <label class=>Раздел II. Автогражданская ответственность</label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="civil_liability" checked id="radioSuccess5" value="1">
                                                            <label for="radioSuccess5">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="civil_liability" id="radioSuccess6" value="0">
                                                            <label for="radioSuccess6">Нет</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Сумма</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="civil_liability_sum" id="civil_liability_sum-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form method="POST" id="product-fields-0-6">
                                            <div class="form-group">
                                                <label>Раздел III. Несчастные случаи с Застрахованными лицами</label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="accidents" checked id="radioSuccess7-0" value="1">
                                                            <label for="radioSuccess7-0">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="vehicle_damage" id="radioSuccess8-0" value="0">
                                                            <label for="radioSuccess8-0">Нет</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Сумма</span>
                                                                </div>
                                                                <input type="text" class="form-control" name="vehicle_damage_sum" id="vehicle_damage_sum-0">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </form>

                                        <div class="table-responsive p-0 ">
                                            <form method="POST" id="product-fields-0-7">
                                                <table class="table table-hover table-head-fixed">
                                                    <thead>
                                                        <tr>
                                                            <th>Объекты страхования </th>
                                                            <th>Количество водителей /пассажиров</th>
                                                            <th>Страховая сумма на одного лица</th>
                                                            <th>Страховая сумма</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><label>Водитель(и)</label></td>
                                                            <td><input type="number" class="form-control" name="driver_quantity"></td>
                                                            <td>
                                                                <div class="input-group mb-4">
                                                                    <input type="text" class="form-control" name="driver_one_sum">
                                                                    <div class="input-group-append">
                                                                        <select class="form-control success" name="driver_currency" style="width: 100%;">
                                                                            <option selected="selected">UZS</option>
                                                                            <option>USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><input type="number" class="form-control" name="driver_total_sum" id="driver_total_sum-0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Пассажиры</label></td>
                                                            <td><input type="number" class="form-control" name="passenger_quantity"></td>
                                                            <td>
                                                                <div class="input-group mb-4">
                                                                    <input type="text" class="form-control" name="passenger_one_sum">
                                                                    <div class="input-group-append">
                                                                        <select class="form-control success" name="passenger_currency" style="width: 100%;">
                                                                        <option selected="selected">UZS</option>
                                                                        <option>USD</option>
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><input type="number" class="form-control" name="passenger_total_sum" id="passenger_total_sum-0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="text-bold">Общий Лимит</label></td>
                                                            <td><input type="number" class="form-control" name="limit_quantity"></td>
                                                            <td>
                                                                <div class="input-group mb-4">
                                                                    <input type="text" class="form-control" name="limit_one_sum">
                                                                    <div class="input-group-append">
                                                                        <select class="form-control success" name="limit_currency" style="width: 100%;">
                                                                            <option selected="selected">UZS</option>
                                                                            <option>USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><input type="number" class="form-control" name="limit_total_sum"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><label class="text-bold">Итого</label></td>
                                                            <td><input type="number" class="form-control"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label>Общий лимит ответственности </label>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control" name="total_liability_limit">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="total_liability_limit_currency" style="width: 100%;">
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
                                    <div class="card-body">
                                        <!-- Default box -->
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Общие Сведения:</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" id="polis-fields-0">
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
                                                                    <input type="date" class="form-control" name="from_date">
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
                                                </form>
                                                <!-- /.card-footer-->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <div class="card payment">
                                        <div class="card-body">
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
                                <form method="POST" id="payment-terms-form">
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
                                                        <td><input type="text" class="form-control" name="payment_sum-0-0"></td>
                                                        <td><input type="date" class="form-control" name="payment_from-0-0"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
                    </div>

            </section>


            </div>
            <!-- /.content -->
        </div>
@endsection

@section('scripts')

<script>
    insurerId.select2();
    beneficiaryId.select2();
    pledgerId.select2();

    $.ajaxSetup({
        beforeSend: function(xhr, settings) {
            if (!csrfSafeMethod(settings.type) && !this.crossDomain) {
                xhr.setRequestHeader("X-CSRFToken", csrftoken);
            }
        }
    });

    $(document).ready(function() {
        $('.client-type-radio').click(function() {
            formContainer.hide();
            clientType = $(this).val() == 'individual' ? 1 : 2;
            $.ajax({
                url: '/api/get_product_types_by/?client_type=' + clientType,
                method: "GET",
                success: function(data) {
                    if (data.success === true) {
                        productId.empty().append('<option selected="selected"></option>');
                        const products = data.data;
                        const length = products.length;
                        for (let i = 0; i < length; i++) {
                            productId.append(`<option value="${products[i].id}">${products[i].name}</option>`);
                        }
                    }
                },
                error: function() {
                    console.log('error');
                }
            })
        });

        productId.change(function(e) {
            let value = $(this).children("option:selected").val();
            if (value) {
                $.ajax({
                    url: '/api/get_product_types_by/?item_id=' + value,
                    method: "GET",
                    success: function(data) {
                        if (data.success === true) {
                            product = data.data;

                            if (product.has_beneficiary) {
                                beneficiaryCardBody.show();
                            } else {
                                beneficiaryCardBody.hide();
                            }

                            if (product.has_pledger) {
                                pledgerCardBody.show();

                                $.ajax({
                                    url: '/api/client-legal/',
                                    method: "GET",
                                    success: function(data) {
                                        if (data.success === true) {
                                            pledgerId.empty().append('<option selected="selected"></option>');
                                            const clients = data.data;
                                            const length = clients.length;
                                            for (let i = 0; i < length; i++) {
                                                pledgerId.append(`<option value="${clients[i].id}">${clients[i].name}</option>`);
                                            }
                                        }
                                    },
                                    error: function() {
                                        console.log('error');
                                    }
                                });
                            } else {
                                pledgerCardBody.hide();
                            }
                        }
                    },
                    error: function() {
                        console.log('error');
                    }
                })

                let clientType = $("input:radio[name='client_type_radio']:checked").val();
                getPolicyList(clientType === 'individual' ? 1 : 2);

                if (clientType === 'individual') {
                    insurerLegalClientRow.hide();
                    insurerName.prop('disabled', true);
                    insurerOkonh.prop('disabled', true);
                    insurerIndividualClientRow.show();
                    insurerFirstName.prop('disabled', false);
                    insurerLastName.prop('disabled', false);
                    insurerMiddleName.prop('disabled', false);
                    insurerIndividualClient = true;
                } else {
                    insurerLegalClientRow.show();
                    insurerName.prop('disabled', false);
                    insurerOkonh.prop('disabled', false);
                    insurerIndividualClientRow.hide();
                    insurerFirstName.prop('disabled', true);
                    insurerLastName.prop('disabled', true);
                    insurerMiddleName.prop('disabled', true);
                    insurerIndividualClient = false;
                }
                formContainer.show();
            } else {
                formContainer.hide();
            }
        });

        $('.beneficiary-type-radio').click(function() {
            clientType = $("input:radio[name='beneficiary_type_radio']:checked").val();
            console.log(clientType);

            let clientType = $("input:radio[name='beneficiary_type_radio']:checked").val();
            //

            if (clientType === 'individual') {
                console.log('beneficiary individual');
                beneficiaryLegalClientRow.hide();
                beneficiaryName.prop('disabled', true);
                beneficiaryOkonh.prop('disabled', true);
                beneficiaryIndividualClientRow.show();
                beneficiaryFirstName.prop('disabled', false);
                beneficiaryLastName.prop('disabled', false);
                beneficiaryMiddleName.prop('disabled', false);
                beneficiaryIndividualClient = true;
            } else {
                console.log('beneficiary legal');
                beneficiaryLegalClientRow.show();
                beneficiaryName.prop('disabled', false);
                beneficiaryOkonh.prop('disabled', false);
                beneficiaryIndividualClientRow.hide();
                beneficiaryFirstName.prop('disabled', true);
                beneficiaryLastName.prop('disabled', true);
                beneficiaryMiddleName.prop('disabled', true);
                beneficiaryIndividualClient = false;
            }

            $.ajax({
                url: '/api/client-' + clientType + '/',
                method: "GET",
                success: function(data) {
                    if (data.success === true) {
                        beneficiaryId.empty().append('<option selected="selected"></option>');
                        const clients = data.result;
                        const length = clients.length;
                        for (let i = 0; i < length; i++) {
                            beneficiaryId.append(`<option value="${clients[i].id}">${clients[i].name}</option>`);
                        }
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
        });

        insurerModalButton.click(function(e) {
            insurerModal.show();
        });

        beneficiaryModalButton.click(function(e) {
            beneficiaryModal.show();
        });

        pledgerModalButton.click(function(e) {
            pledgerModal.show();
        });

        insurerClose.click(function(e) {
            insurerModal.hide();
        });

        beneficiaryClose.click(function(e) {
            beneficiaryModal.hide();
        });

        pledgerClose.click(function(e) {
            pledgerModal.hide();
        });

        // $(window).click(function(event) {
        //     let fieldNumber;
        //     if (event.target == insurerModal[0]) {
        //         insurerModal.hide();
        //     } else if (event.target == beneficiaryModal[0]) {
        //         beneficiaryModal.hide();
        //     } else if (event.target == pledgerModal[0]) {
        //         pledgerModal.hide();
        //     } else {
        //         let modal = $('#product-fields-' + (fieldNumber = event.target.data('field-number')));
        //         if (modal.length && target.event == modal[0]) {
        //             modal.hide();
        //         }
        //     }
        // });

        formSaveButton.click(function(e) {
            e.preventDefault();

            let productFieldsForm = $('#product-fields');

            let forms = {};
            let params = {};
            forms.csrfmiddlewaretoken = csrftoken;
            forms.action = 'create';
            forms.client_type = clientType;
            forms.insurer_id = insurerId.children("option:selected").val();
            forms.beneficiary_id = beneficiaryId.children("option:selected").val();
            forms.pledger_id = pledgerId.children("option:selected").val();
            let serializedForm = clientProductForm.serializeArray();
            for (let i = 0; i < serializedForm.length; i++) {
                forms[serializedForm[i]['name']] = serializedForm[i]['value'];
            }

            params = {};
            serializedForm = paymentTermsForm.serializeArray();
            for (let i = 0; i < serializedForm.length; i++) {
                params[serializedForm[i]['name']] = serializedForm[i]['value'];
            }
            forms.payment_terms = params;

            params = {};
            serializedForm = anketaFieldsForm.serializeArray();
            for (let i = 0; i < serializedForm.length; i++) {
                forms[serializedForm[i]['name']] = serializedForm[i]['value'];
            }
            forms.payment_terms = params;

            params = {};
            let count = 0;
            let field;
            let productFields1 = [];
            let productFields2 = [];
            let polisFields = {};
            let productExists = false;
            for (let i = 0; i < productFieldNumber + 1; i++) {
                field = null;

                for (let j = 1; j < 8; j++) {
                    if ((field = $(`#product-fields-${i}-${j}`)).length) {
                        serializedForm = field.serializeArray();
                        for (let k = 0; k < serializedForm.length; k++) {
                            params[serializedForm[k]['name']] = serializedForm[k]['value'];
                        }

                    }
                    productFields2[j] = params;
                    params = {};
                }
                params = {};

                if ((polisFields = $(`#polis-fields-${i}`)).length) {
                    field = $(`#product-fields`);
                    serializedForm = field.serializeArray();
                    params.mark_model = field.find(`input[name=mark_model-${i}]`).val();
                    params.release_year = field.find(`input[name=release_year-${i}]`).val();
                    params.country_number = field.find(`input[name=country_number-${i}]`).val();
                    params.tech_passport_number = field.find(`input[name=tech_passport_number-${i}]`).val();
                    params.engine_number = field.find(`input[name=engine_number-${i}]`).val();
                    params.carcase_number = field.find(`input[name=carcase_number-${i}]`).val();
                    params.lifting_capacity = field.find(`input[name=lifting_capacity-${i}]`).val();
                    params.number_of_seats = field.find(`input[name=number_of_seats-${i}]`).val();
                    params.insurance_cost = field.find(`input[name=insurance_cost-${i}]`).val();
                    params.insurance_sum = field.find(`input[name=insurance_sum-${i}]`).val();
                    params.insurance_premium = field.find(`input[name=insurance_premium-${i}]`).val();
                    console.log(params);
                    productFields2[0] = params;
                    params = {};

                    serializedForm = polisFields.serializeArray();
                    for (let j = 0; j < serializedForm.length; j++) {
                        params[serializedForm[j]['name']] = serializedForm[j]['value'];
                    }
                    productFields2[8] = params;
                    params = {};
                    productExists = true;
                } else {
                    productExists = false;
                }

                productFields1[count++] = productFields2;
                productFields2 = [];
            }
            forms.product_fields = productFields1;

            $.ajax({
                url: '/api/klassss/',
                data: JSON.stringify(forms),
                processData: false,
                contentType: 'application/json',
                dataType: 'json',
                type: "POST",
                success: function(data) {
                    if (data.success === true) {
                        console.log(data);
                        window.location.replace('/references/klass/');
                    }
                }
            });
        });
    });

    function getPolicyList(clientType) {
        polises.empty().append('<option selected="selected">Полисы</option>');
        $.ajax({
            url: '/api/get_product_type_list/?client-type=' + clientType,
            processData: false,
            contentType: 'application/json',
            dataType: 'json',
            type: "GET",
            success: function(data) {
                if (data.success === true) {
                    console.log(data);
                    polises.append(`<option value="${data.id}">${data.code} - ${data.name}</option`);
                }
            }
        });
    }
</script>

@endsection