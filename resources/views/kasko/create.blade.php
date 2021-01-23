@extends('layouts.index')

@section('css')
    <style>
        #insurer-modal-button,
        #beneficiary-modal-button {
            width: 100px;
        }
    </style>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" id="mainFormKasko" action="{{ route('kasko.store') }}">
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
                                            <input type="radio" checked name="client_type_radio"
                                                   class="client-type-radio"
                                                   id="client-type-radio-1" value="0">
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input type="radio" name="client_type_radio" class="client-type-radio"
                                                   id="client-type-radio-2" value="1">
                                            <label for="client-type-radio-2">юр. лицо</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2" name="product_id"
                                        style="width: 100%;">
                                    <option selected="selected">Каско</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-insurance">
                        <div class="card-header">
                            <h3 class="card-title">Страхователь №1</h3>
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
                                        <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                                        <input type="text" id="insurer-name" name="fio_insurer[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес
                                            страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer[]"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефон</label>
                                        <input type="text" id="insurer-tel" name="tel_insurer[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address_schet[]"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-inn" name="inn_insurer[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <input type="text" id="insurer-bank" name="bank_insurer[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="insurer-okonh" name="okonh_insurer[]"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="insurer-modal-button" class="btn btn-primary" value="Добавить">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Выгодоприобретатель №1</h3>
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
                                            <label for="beneficiary-name" class="col-form-label">ФИО
                                                выгодоприобретателя</label>
                                            <input type="text" id="beneficiary-name" name="fio_beneficiary[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Юр адрес
                                                выгодоприобретателя</label>
                                            <input type="text" id="beneficiary-address" name="address_beneficiary[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="beneficiary-tel" name="tel_beneficiary[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                            <input type="text" id="beneficiary-schet" name="beneficiary_schet[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="beneficiary-inn" name="inn_beneficiary[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="beneficiary-mfo" name="mfo_beneficiary[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                            <input type="text" id="beneficiary-bank" name="bank_beneficiary[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                            <input type="text" id="beneficiary-okonh" name="okonh_beneficiary[]"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input id="beneficiary-modal-button" class="btn btn-primary" value="Добавить">
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="insurance_to" name="insurance_to" type="date"
                                                       class="form-control">
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
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
                                            <input type="text" disabled class="form-control" name="polis_num[]">
                                        </td>
                                        <td>
                                            <select class="form-control polises" id="polises" name="polis_series[]"
                                                    style="width: 100%;">
                                                <option selected="selected"></option>
                                                @if(!empty($policySeries))
                                                    @foreach($policySeries as $policySer)
                                                        <option value="{{$policySer->id}}">{{$policySer->code}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="period_polis[]">
                                        </td>
                                        <td>
                                            <select class="form-control polises" id="polises" name="polis_agent[]"
                                                    style="width: 100%;">
                                                <option selected="selected"></option>
                                                @if(!empty($agents))
                                                    @foreach($agents as $agent)
                                                        <option value="{{$agent->user_id}}">{{$agent->surname .' '.$agent->name .' '. $agent->middle_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_id[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_mark[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_model[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_modification[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_gos_num[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_teh_passport[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_num_engine[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_num_body[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_payload[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum2" name="polis_places[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum insurance_sum-0"
                                                   data-field-number="0" name="polis_sum[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 overall_insurance_sum-0"
                                                   name="overall_polis_sum[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum3 insurance_premium-0" readonly
                                                   name="polis_premium[]">
                                        </td>
                                        <td>
                                            <input type="button" value="Заполнить"
                                                   class="btn btn-success product-fields-button"
                                                   id="product-fields-button" data-field-number="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="13" style="text-align: right"><label
                                                    class="text-bold">Итого</label></td>
                                        <td><input readonly type="text" class="form-control overall-sum2"/></td>
                                        <td><input readonly type="text" class="form-control overall-sum"/></td>
                                        <td><input readonly type="text" class="form-control overall-sum4"/></td>
                                        <td><input readonly type="text" class="form-control overall-sum3"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
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
                                    <input type="text" class="form-control" name="purpose">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="general-product-fields">
                        <div id="product-field-modal-0" class="modal" data-field-number="0">
                            <div class="modal-content" id="product-field-modal-content-0">
                                <span class="close product-fields-close" id="product-fields-close-0"
                                      data-field-number="0">&times;</span>
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Перечень дополнительного оборудования</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    data-toggle="tooltip" title="Collapse">
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
                                                        <td><input type="text" class="form-control"
                                                                   name="add_mark_model[]">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="add_name[]">
                                                        </td>
                                                        <td><input type="text" class="form-control"
                                                                   name="add_series_number[]"></td>
                                                        <td><input type="text" class="form-control forsum5"
                                                                   name="add_insurance_sum[]" id="insurance_sum-0"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><label class="text-bold">Итого</label></td>
                                                        <td><input type="text" class="form-control overall-sum5"
                                                                   readonly name="total"></td>
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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div id="product-fields-0-2">
                                            <div class="form-group">
                                                <label>Покрытие террористических актов с ТС </label>
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control terror-tc-0"
                                                           name="add_cover_terror_attacks_sum[]">
                                                    <div class="input-group-append">
                                                        <select class="form-control success"
                                                                name="add_cover_terror_attacks_currency[]"
                                                                style="width: 100%;">
                                                            <option selected="selected">UZS</option>
                                                            <option>USD</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Покрытие террористических актов с застрахованными лицами </label>
                                                <div class="input-group mb-4">
                                                    <input type="text" class="form-control terror-zl-0"
                                                           name="add_cover_terror_attacks_insured_sum[]">
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
                                                    <input type="text" class="form-control evocuation-0"
                                                           name="add_coverage_evacuation_cost[]">
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
                                        <div id="product-fields-0-3">
                                            <div class="form-group">
                                                <label>Застрахованы ли автотранспортные средства на момент заполнения
                                                    настоящей анкеты? </label>
                                                <div class="row">
                                                    <div class="col-sm-1">
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="add_strtahovka[]" id="radioSuccess1" value="1">
                                                            <label for="radioSuccess1">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" class="other_insurance-0"
                                                                   name="add_strtahovka[]" id="radioSuccess2" value="0">
                                                            <label for="radioSuccess2">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group other_insurance_info-0" style="display:none">
                                                <label>Укажите название и адрес страховой организации и номер
                                                    Полиса</label>
                                                <input class="form-control" type="text"
                                                       name="add_other_insurance_info[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Страховые покрытия по видам опасностей </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    data-toggle="tooltip" title="Collapse">
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
                                                            <input type="radio" name="add_vehicle_damage[]"
                                                                   class="r-1-0"
                                                                   id="radioSuccess3" value="1">
                                                            <label for="radioSuccess3">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="add_vehicle_damage[]"
                                                                   class="r-1-0"
                                                                   id="radioSuccess4" value="0">
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
                                                                    <input type="text" class="form-control r-1-sum-0"
                                                                           name="add_vehicle_damage_sum[]"
                                                                           id="vehicle_damage_sum-0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Страховая премия</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-1-premia-0"
                                                                           name="add_vehicle_damage_premia[]"
                                                                           id="vehicle_damage_sum-0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Франшиза</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-1-frnshiza"
                                                                           name="add_vehicle_damage_franshiza[]"
                                                                           id="vehicle_damage_sum-0">
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
                                                            <input type="radio" name="add_civil_liability[]"
                                                                   class="r-2-0"
                                                                   id="radioSuccess5" value="1">
                                                            <label for="radioSuccess5">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="add_civil_liability[]"
                                                                   class="r-2-0"
                                                                   id="radioSuccess6" value="0">
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
                                                                    <input type="text" class="form-control r-2-sum-0"
                                                                           name="add_tho_sum[]"
                                                                           id="vehicle_damage_sum-0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Страховая премия</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-2-premia-0"
                                                                           name="add_tho_preim[]"
                                                                           id="vehicle_damage_sum-0">
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
                                                            <input type="radio" name="add_accidents[]" class="r-3-0"
                                                                   id="radioSuccess7-0" value="1">
                                                            <label for="radioSuccess7-0">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success">
                                                            <input type="radio" name="add_accidents[]" class="r-3-0"
                                                                   id="radioSuccess8-0" value="0">
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
                                                            <td><input type="number" class="form-control r-3-pass-0"
                                                                       readonly value="1" name="driver_quantity"></td>
                                                            <td>
                                                                <div class="input-group mb-4">
                                                                    <input type="text" class="form-control r-3-one-0"
                                                                           name="add_driver_one_sum[]">
                                                                    <div class="input-group-append">
                                                                        <select class="form-control success"
                                                                                name="driver_currency"
                                                                                style="width: 100%;">
                                                                            <option selected="selected">UZS</option>
                                                                            <option>USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><input type="number" class="form-control r-3-sum-0"
                                                                       name="driver_total_sum" id="driver_total_sum-0">
                                                            </td>
                                                            <td><input type="number" class="form-control r-3-premia-0"
                                                                       name="add_driver_preim_sum[]"
                                                                       id="driver_total_sum-0">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Пассажиры</label></td>
                                                            <td><input type="number" class="form-control r-3-pass-1-0"
                                                                       name="add_passenger_quantity[]"></td>
                                                            <td>
                                                                <div class="input-group mb-4">
                                                                    <input type="text" class="form-control r-3-one-1-0"
                                                                           name="add_passenger_one_sum[]">
                                                                    <div class="input-group-append">
                                                                        <select class="form-control success"
                                                                                name="passenger_currency"
                                                                                style="width: 100%;">
                                                                            <option selected="selected">UZS</option>
                                                                            <option>USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><input type="number" class="form-control r-3-sum-1-0"
                                                                       name="add_passenger_total_sum[]"
                                                                       id="passenger_total_sum-0"></td>
                                                            <td><input type="number" class="form-control r-3-premia-1-0"
                                                                       name="add_passenger_preim_sum[]"
                                                                       id="passenger_total_sum-0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="text-bold">Общий Лимит</label></td>
                                                            <td><input type="number" class="form-control r-3-pass-2-0"
                                                                       name="add_limit_quantity[]"></td>
                                                            <td>
                                                                <div class="input-group mb-4">
                                                                    <input type="text" class="form-control r-3-one-2-0"
                                                                           name="add_limit_one_sum[]">
                                                                    <div class="input-group-append">
                                                                        <select class="form-control success"
                                                                                name="add_limit_currency"
                                                                                style="width: 100%;">
                                                                            <option selected="selected">UZS</option>
                                                                            <option>USD</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><input type="number" class="form-control r-3-sum-2-0"
                                                                       name="add_limit_total_sum[]"></td>
                                                            <td><input type="number" class="form-control r-3-premia-2-0"
                                                                       name="add_limit_preim_sum[]"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><label class="text-bold">Итого</label></td>
                                                            <td><input type="number" class="form-control r-summ-0"></td>
                                                            <td><input type="number"
                                                                       class="form-control r-summ-premia-0"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <label>Общий лимит ответственности </label>
                                                <div class="input-group mb-4">
                                                    <input type="text" id="totalLimit-0" class="form-control"
                                                           name="add_total_liability_limit[]">
                                                    <div class="input-group-append">
                                                        <select class="form-control success"
                                                                name="total_liability_limit_currency-0"
                                                                style="width: 100%;">
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
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        data-toggle="tooltip" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card payment">
                                            <div class="card-body">
                                                <div id="polis-fields-0">
                                                    <div class="row policy">
                                                        {{--<div class="col-sm-4">--}}
                                                        {{--<div class="form-group">--}}
                                                        {{--<label for="polises">Полис</label>--}}
                                                        {{--<select class="form-control polises" id="polises"--}}
                                                        {{--name="policy" style="width: 100%;">--}}
                                                        {{--<option selected="selected"></option>--}}
                                                        {{--</select>--}}
                                                        {{--<div class="input-group mb-3">--}}
                                                        {{--<div class="input-group-prepend">--}}
                                                        {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--</div>--}}
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">от</span>
                                                                    </div>
                                                                    <input type="date" class="form-control"
                                                                           name="add_from_date[]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--<div class="col-sm-4">--}}
                                                        {{--<div class="form-group">--}}
                                                        {{--<label>Ответственный Агент</label>--}}
                                                        {{--<select class="form-control select2" name="agent"--}}
                                                        {{--style="width: 100%;">--}}
                                                        {{--<option selected="selected">Ф.И.О агента</option>--}}
                                                        {{--<option></option>--}}
                                                        {{--</select>--}}
                                                        {{--</div>--}}
                                                        {{--</div>--}}
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Оплата страховой премии</label>
                                                                <select class="form-control select2"
                                                                        name="add_payment[]"
                                                                        style="width: 100%;">
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
                                                                        name="add_payment_order[]" style="width: 100%;">
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
                                                            <span class="input-group-text">Общая страховая сумма</span>
                                                        </div>
                                                        <input type="text" class="form-control" readonly
                                                               id="overall-sum-0">
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
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
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
                                                    <select class="form-control"
                                                            style="width: 100%; text-align: center">
                                                        <option selected="selected" name="insurance_premium_currency">
                                                            UZS
                                                        </option>
                                                        <option>USD</option>
                                                        <option>Евро</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group form-inline justify-content-between">
                                                    <label>Порядок оплаты страховой премии</label>
                                                    <select class="form-control payment-schedule" name="payment_term"
                                                            onchange="showDiv('other-payment-schedule', this)"
                                                            style="width: 100%; text-align: center">
                                                        <option value="1">Единовременно</option>
                                                        <option value="other">Другое</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="other-payment-schedule" style="display: none">
                                            <div class="form-group">
                                                <button type="button" onclick="addRow3()" class="btn btn-primary ">
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
                                                        <td><input type="text" class="form-control"
                                                                   name="payment_sum-0-0"></td>
                                                        <td><input type="date" class="form-control"
                                                                   name="payment_from-0-0"></td>
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
            </section>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function addRow() {
            let empTab = document.getElementById('empTable');
            var fieldNames = [
                'polis_num[]',
                'polis_series[]',
                'period_polis[]',
                'polis_agent[]',
                'polis_id[]',
                'polis_mark[]',
                'polis_model[]',
                'polis_modification[]',
                'polis_gos_num[]',
                'polis_teh_passport[]',
                'polis_num_engine[]',
                'polis_num_body[]',
                'polis_payload[]',
                'polis_places[]',
                'insurance_sum[]',
                'overall_insurance_sum[]',
                'insurance_premium[]',
            ];
            let rowCnt = empTab.rows.length; // get the number of rows.
            let tr = empTab.insertRow(rowCnt - 1); // table row.

            productFieldNumber++;

            var rowsAmount = $("#empTable thead tr th").length + 1;

            for (let c = 0; c < rowsAmount; c++) {
                let td = document.createElement('td'); // TABLE DEFINITION.
                td = tr.insertCell(c);

                if (c == (rowsAmount - 1)) { // if its the last column of the table.
                    // add delete a button
                    let button = document.createElement('input');

                    // set the attributes.
                    button.setAttribute('type', 'button');
                    button.setAttribute('value', 'Удалить');

                    // add button's "onclick" event.
                    button.setAttribute('onclick', 'removeRow(this)');
                    button.setAttribute('data-field-number', productFieldNumber);
                    button.setAttribute('class', 'btn btn-warning');

                    td.appendChild(button);

                    // add delete a button
                    let button2 = document.createElement('input');
                    button2.setAttribute('type', 'button');
                    button2.setAttribute('value', 'Заполнить');
                    button2.setAttribute('class', 'btn btn-success product-fields-button');
                    button2.setAttribute('id', 'product-fields-button-' + productFieldNumber);
                    button2.setAttribute('data-field-number', productFieldNumber);

                    let td2 = document.createElement('td'); // TABLE DEFINITION.
                    let fieldNumer = c + 1;
                    td2 = tr.insertCell(fieldNumer);
                    td2.appendChild(button2);
                } else {
                    // all except the last colum will have input field.
                    let ele = document.createElement('input');

                    let fieldIndex = c + 1;
                    let columnName = fieldNames[c];
                    ele.setAttribute('name', columnName);

                    if (c === 1) {
                        ele = document.createElement('select');
                    } else if (c === 3) {
                        ele = document.createElement('select');
                    } else {
                        ele.setAttribute('type', 'text');
                    }
                    if (columnName === 'polis_places[]') {
                        ele.setAttribute('class', 'form-control forsum2');
                    } else if (columnName === 'insurance_sum[]') {
                        ele.setAttribute('class', 'form-control forsum insurance_sum-' + productFieldNumber);
                        ele.setAttribute('data-field-number', productFieldNumber);
                    } else if (columnName === 'insurance_premium[]') {
                        ele.setAttribute('class', 'form-control forsum3 insurance_premium-' + productFieldNumber);
                        ele.setAttribute('readonly', 'true');
                    } else if (columnName === 'overall_insurance_sum[]') {
                        ele.setAttribute('class', 'form-control forsum4 overall_insurance_sum-' + productFieldNumber);
                    } else if (columnName === 'polis_num[]') {
                        ele.setAttribute('class', 'form-control polis-num-' + productFieldNumber);
                        ele.setAttribute('readonly', 'true');
                    } else {
                        ele.setAttribute('class', 'form-control');
                    }
                    td.appendChild(ele);
                }
            }

            addProductFields(productFieldNumber);
        }


        let num1 = 1;
        let num2 = 1;
        $('#insurer-modal-button').on('click', function () {

            let clone = $('#clone-insurance:last').clone();
            clone.insertAfter('#clone-insurance:last');

            clone.find('#insurer-name').attr('name', `insurer-name${num1}`);
            clone.find('#insurer-address').attr('name', `insurer-address${num1}`);
            clone.find('#insurer-tel').attr('name', `insurer-tel${num1}`);
            clone.find('#insurer-schet').attr('name', `insurer-schet${num1}`);
            clone.find('#insurer-inn').attr('name', `insurer-inn${num1}`);
            clone.find('#insurer-mfo').attr('name', `insurer-mfo${num1}`);
            clone.find('#insurer-bank').attr('name', `insurer-bank${num1}`);
            clone.find('#insurer-okonh').attr('name', `insurer-okonh${num1}`);
            clone.find('#insurer-name').attr('id', `insurer-name${num1}`)
            clone.find('#insurer-address').attr('id', `insurer-address${num1}`)
            clone.find('#insurer-tel').attr('id', `insurer-tel${num1}`)
            clone.find('#insurer-schet').attr('id', `insurer-schet${num1}`)
            clone.find('#insurer-inn').attr('id', `insurer-inn${num1}`)
            clone.find('#insurer-mfo').attr('id', `insurer-mfo${num1}`)
            clone.find('#insurer-bank').attr('id', `insurer-bank${num1}`)
            clone.find('#insurer-okonh').attr('id', `insurer-okonh${num1}`)
            clone.find('#insurer-name').prev().attr('for', `insurer-name${num1}`)
            clone.find('#insurer-address').prev().attr('for', `insurer-address${num1}`)
            clone.find('#insurer-tel').prev().attr('for', `insurer-tel${num1}`)
            clone.find('#insurer-schet').prev().attr('for', `insurer-schet${num1}`)
            clone.find('#insurer-inn').prev().attr('for', `insurer-inn${num1}`)
            clone.find('#insurer-mfo').prev().attr('for', `insurer-mfo${num1}`)
            clone.find('#insurer-bank').prev().attr('for', `insurer-bank${num1}`)
            clone.find('#insurer-okonh').prev().attr('for', `insurer-okonh${num1}`)
            num1++;
            clone.find('.card-title').html(`Страхователь №${num1}`)
            clone.find('#insurer-modal-button').html(`Удалить`).attr('class', 'btn btn-warning')
            clone.find('#insurer-modal-button').on('click', function () {
                $(this).parent().parent().parent().remove();
                num1--;
            })
        });

        $('#beneficiary-modal-button').on('click', function () {

            let clone = $('#clone-beneficiary:last').clone();
            clone.insertAfter('#clone-beneficiary:first');

            clone.find('#beneficiary-name').attr('name', `beneficiary-name${num2}`);
            clone.find('#beneficiary-address').attr('name', `beneficiary-address${num2}`);
            clone.find('#beneficiary-tel').attr('name', `beneficiary-tel${num2}`);
            clone.find('#beneficiary-schet').attr('name', `beneficiary-schet${num2}`);
            clone.find('#beneficiary-inn').attr('name', `beneficiary-inn${num2}`);
            clone.find('#beneficiary-mfo').attr('name', `beneficiary-mfo${num2}`);
            clone.find('#beneficiary-bank').attr('name', `beneficiary-bank${num2}`);
            clone.find('#beneficiary-okonh').attr('name', `beneficiary-okonh${num2}`);
            clone.find('#beneficiary-name').attr('id', `beneficiary-name${num2}`)
            clone.find('#beneficiary-address').attr('id', `beneficiary-address${num2}`)
            clone.find('#beneficiary-tel').attr('id', `beneficiary-tel${num2}`)
            clone.find('#beneficiary-schet').attr('id', `beneficiary-schet${num2}`)
            clone.find('#beneficiary-inn').attr('id', `beneficiary-inn${num2}`)
            clone.find('#beneficiary-mfo').attr('id', `beneficiary-mfo${num2}`)
            clone.find('#beneficiary-bank').attr('id', `beneficiary-bank${num2}`)
            clone.find('#beneficiary-okonh').attr('id', `beneficiary-okonh${num2}`)
            clone.find('#beneficiary-name').prev().attr('for', `beneficiary-name${num2}`)
            clone.find('#beneficiary-address').prev().attr('for', `beneficiary-address${num2}`)
            clone.find('#beneficiary-tel').prev().attr('for', `beneficiary-tel${num2}`)
            clone.find('#beneficiary-schet').prev().attr('for', `beneficiary-schet${num2}`)
            clone.find('#beneficiary-inn').prev().attr('for', `beneficiary-inn${num2}`)
            clone.find('#beneficiary-mfo').prev().attr('for', `beneficiary-mfo${num2}`)
            clone.find('#beneficiary-bank').prev().attr('for', `beneficiary-bank${num2}`)
            clone.find('#beneficiary-okonh').prev().attr('for', `beneficiary-okonh${num2}`)
            num2++;
            clone.find('.card-title').html(`Выгодоприобретатель №${num2}`)
            clone.find('#beneficiary-modal-button').html(`Удалить`).attr('class', 'btn btn-warning')
            clone.find('#beneficiary-modal-button').on('click', function () {
                $(this).parent().parent().parent().remove();
                num2--;
            })

        });

        $(document).ready(function () {
            $(document).on("keyup", ".forsum", calculateSum);
            $(document).on("keyup", ".forsum2", calculateSum2);
            $(document).on("keyup", ".forsum3", calculateSum3);
            $(document).on("keyup", ".forsum4", calculateSum4);
            $(document).on("keyup", ".forsum5", calculateSum5);
            $('.defects').on('change', function () {
                console.log('sa');
                let targetBox = $('.defects_images');
                if ($(this).attr("value") === '1') {
                    $(targetBox).show(400);
                } else {
                    $(targetBox).hide(400);
                }
            });
        });
        $(document).on('keyup', function () {
            console.log('sadsa');
            if ($('.overall-sum4').val() > $('.overall-sum').val()) {
                // alert('Страховая сумма не должна превышать страховую стоимость')
                $('#form-save-button').attr('disabled', true)
            } else {
                $('#form-save-button').removeAttr('disabled');
            }
        });

        $(document).on("keyup", ".modal", function () {
            let fieldNumber = $(this).data('field-number');
            overallSum =
                parseFloat($('#insurance_sum-' + fieldNumber).val() || 0) +
                parseFloat($('.r-1-sum-' + fieldNumber).val() || 0) +
                parseFloat($('.r-2-sum-' + fieldNumber).val() || 0) +
                parseFloat($('.r-3-sum-' + fieldNumber).val() || 0) +
                parseFloat($('.r-3-sum-1-' + fieldNumber).val() || 0) +
                parseFloat($('.r-3-sum-2-' + fieldNumber).val() || 0)+
                parseFloat($('.terror-tc-' + fieldNumber).val() || 0) +
                parseFloat($('.terror-zl-' + fieldNumber).val() || 0) +
                parseFloat($('.evocuation-' + fieldNumber).val() || 0);
            let modalTableSum2 =
                parseFloat($('.r-3-sum-' + fieldNumber).val() || 0) +
                parseFloat($('.r-3-sum-1-' + fieldNumber).val() || 0) +
                parseFloat($('.r-3-sum-2-' + fieldNumber).val() || 0);
            let modalTableSum3 =
                parseFloat($('.r-3-premia-' + fieldNumber).val() || 0) +
                parseFloat($('.r-3-premia-1-' + fieldNumber).val() || 0) +
                parseFloat($('.r-3-premia-2-' + fieldNumber).val() || 0);
            $('#overall-sum-' + fieldNumber).val(overallSum);
            $('.r-summ-' + fieldNumber).val(modalTableSum2);
            $('.r-summ-premia-' + fieldNumber).val(modalTableSum3);

            $('#totalLimit-' + fieldNumber).on('keyup', function () {
                if ($('.r-summ-' + fieldNumber).val() >= $('#totalLimit-' + fieldNumber).val()) {
                    console.log('sadas');
                    $('#form-save-button').attr('disabled', true)
                    // alert('Общий лимит ответственности не может превышать страховую сумму по видам опасностей');
                } else {
                    $('#form-save-button').removeAttr('disabled');

                }
            });

            calculateSum4(fieldNumber);
        });

        $(document).on("change", ".modal", function () {
            let fieldNumber = $(this).data('field-number');

            $('.other_insurance-' + fieldNumber).on('change', function () {
                let targetBox = $('.other_insurance_info-' + fieldNumber);
                if ($(this).attr("value") === '1') {
                    $(targetBox).show(400);
                } else {
                    $(targetBox).hide(400);
                }
            });
            $('.r-1-' + fieldNumber).on('change', function () {
                let targetBox = $('.r-1-show-' + fieldNumber);
                if ($(this).attr("value") === '1') {
                    $(targetBox).show(400);
                } else {
                    $(targetBox).hide(400);
                }
            });
            $('.r-2-' + fieldNumber).on('change', function () {
                let targetBox = $(`.r-2-show-${fieldNumber}`);
                if ($(this).attr("value") === '1') {
                    $(targetBox).show(400);
                } else {
                    $(targetBox).hide(400);
                }
            });
            $('.r-3-' + fieldNumber).on('change', function () {
                let targetBox = $(`.r-3-show-${fieldNumber}`);
                if ($(this).attr("value") === '1') {
                    $(targetBox).show(400);
                } else {
                    $(targetBox).hide(400);
                }
            });
            $('.r-3-one-' + fieldNumber).on('keyup', function () {
                let numOne = $(this).val() * $(`.r-3-pass-${fieldNumber}`).val();
                $(document).find(`.r-3-sum-${fieldNumber}`).val(numOne);
            });
            $('.r-3-pass-1-' + fieldNumber).on('keyup', function () {
                let numOne = $(this).val() * $(`.r-3-one-1-${fieldNumber}`).val();
                $(document).find(`.r-3-sum-1-${fieldNumber}`).val(numOne);
            });
            $('.r-3-one-1-' + fieldNumber).on('keyup', function () {
                let numOne = $(this).val() * $(`.r-3-pass-1-${fieldNumber}`).val();
                $(document).find(`.r-3-sum-1-${fieldNumber}`).val(numOne);
            });
            $('.r-3-pass-2-' + fieldNumber).on('keyup', function () {
                let numOne = $(this).val() * $(`.r-3-one-2-${fieldNumber}`).val();
                $(document).find(`.r-3-sum-2-${fieldNumber}`).val(numOne);
            });
            $('.r-3-one-2-' + fieldNumber).on('keyup', function () {
                let numOne = $(this).val() * $(`.r-3-pass-2-${fieldNumber}`).val();
                $(document).find(`.r-3-sum-2-${fieldNumber}`).val(numOne);
            });

        });


        function calculateSum() {
            let sum = 0;
            $('.forsum').each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $('.overall-sum').val(sum.toFixed(2));
        }

        function calculateSum2() {
            let sum = 0;
            $('.forsum2').each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $('.overall-sum2').val(sum.toFixed(2));
        }

        function calculateSum3() {
            let sum = 0;
            $('.forsum3').each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $('.overall-sum3').val(sum.toFixed(2));
        }

        function calculateSum4(fieldNumber) {
            let sum = 0;
            try {
                $('.forsum4').each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum = parseFloat(this.value) + parseFloat($('#overall-sum-' + fieldNumber).val())
                    }
                });
            } catch {
                $('.forsum4').each(function() {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sum = parseFloat(this.value)
                    }
                });
            }
            $('.overall-sum4').val(sum.toFixed(2));
        }

        function calculateSum5() {
            let sum = 0;
            $('.forsum5').each(function () {
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });
            $('.overall-sum5').val(sum.toFixed(2));
        }


        // function to delete a row.
        function removeRow(oButton) {
            let empTab = document.getElementById('empTable');
            empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
            let id = oButton.dataset.fieldNumber;
            $("#product-field-modal-" + id).remove();
            calculateSum();
            calculateSum2();
            calculateSum3();
            calculateSum5();
        }

        // function to add new row.
        function addRow2() {
            let empTab = document.getElementById('empTable2');

            let rowCnt = empTab.rows.length; // get the number of rows.
            let tr = empTab.insertRow(rowCnt - 1); // table row.

            for (let c = 0; c < $("#empTable2 tr th").length; c++) {
                let td = document.createElement('td'); // TABLE DEFINITION.
                td = tr.insertCell(c);

                let ele = document.createElement('input');

                ele.setAttribute('type', 'text');
                ele.setAttribute('class', 'form-control');

                td.appendChild(ele);
            }
        }

        // function to delete a row.
        function removeRow2(oButton) {
            let empTab = document.getElementById('empTable2');
            empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
        }

        function showDiv(divId, element) {
            document.getElementById(divId).style.display = element.value == 'other' ? 'block' : 'none';
        }

        function addRow3(fieldNumber,) {
            let empTab = document.getElementById('empTable3');

            let rowCnt = empTab.rows.length; // get the number of rows.
            let tr = empTab.insertRow(rowCnt); // table row.

            paymentTypeFieldNumber++;

            for (let c = 0; c < $("#empTable3 tr th").length; c++) {
                let td = document.createElement('td'); // TABLE DEFINITION.
                td = tr.insertCell(c);

                if (c == ($("#empTable3 tr th").length - 1)) { // if its the first column of the table.
                    // add a button control.
                    let button = document.createElement('input');

                    // set the attributes.
                    button.setAttribute('type', 'button');
                    button.setAttribute('value', 'Удалить');

                    // add button's "onclick" event.
                    button.setAttribute('onclick', 'removeRow3(this)');
                    button.setAttribute('class', 'btn btn-warning');

                    td.appendChild(button);
                } else {
                    // all except the last colum will have input field.
                    let ele = document.createElement('input');

                    if (c === 1) {
                        ele.setAttribute('type', 'date');
                        ele.setAttribute('id', `payment_from-${fieldNumber}-${paymentTypeFieldNumber}`);
                    } else {
                        ele.setAttribute('type', 'text');
                        ele.setAttribute('id', `payment_sum-${fieldNumber}-${paymentTypeFieldNumber}`);
                    }

                    ele.setAttribute('class', 'form-control');
                    td.appendChild(ele);
                }
            }
        }

        // function to delete a row.
        function removeRow3(oButton) {
            let empTab = document.getElementById('empTable3');
            empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
        }

        // function to extract and submit table data.
        function submit() {
            let myTab = document.getElementById('empTable');
            let arrValues = [];

            // loop through each row of the table.
            for (row = 1; row < myTab.rows.length - 1; row++) {
                // loop through each cell in a row.
                for (c = 0; c < myTab.rows[row].cells.length; c++) {
                    let element = myTab.rows.item(row).cells[c];
                    if (element.childNodes[0].getAttribute('type') == 'text') {
                        arrValues.push("'" + element.childNodes[0].value + "'");
                    }
                }
            }
        }

        $('#form-save-button').on('click', function () {
            $('#mainFormKasko').submit();
        })

        //ToDo: delete one of the addproductfields function
        function addProductFields(fieldNumber) {
            let fields = `
    <div id="product-field-modal-${fieldNumber}" class="modal" data-field-number="${fieldNumber}">
        <div class="modal-content" id="product-field-modal-content-${fieldNumber}">
            <span class="close product-fields-close" id="product-fields-close-${fieldNumber}" data-field-number="${fieldNumber}">&times;</span>
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
                        <form method="POST" id="product-fields-${fieldNumber}-1">
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
                                    <td><input type="text" class="form-control" name="add_mark_model[]"></td>
                                    <td><input type="text" class="form-control" name="add_name[]"></td>
                                    <td><input type="text" class="form-control" name="add_series_number[]"></td>
                                    <td><input type="text" class="form-control forsum5" name="add_insurance_sum[]" id="insurance_sum-${fieldNumber}"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><label class="text-bold">Итого</label></td>
                                    <td><input type="text" class="form-control overall-sum${fieldNumber}" readonly name="total"></td>
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
                    <form method="POST" id="product-fields-${fieldNumber}-2">
                        <div class="form-group">
                            <label>Покрытие террористических актов с ТС </label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control terror-tc-${fieldNumber}" name="add_cover_terror_attacks_sum[]">
                                <div class="input-group-append">
                                    <select class="form-control success" name="add_cover_terror_attacks_currency[]" style="width: 100%;">
                                        <option selected="selected">UZS</option>
                                        <option>USD</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Покрытие террористических актов с застрахованными лицами </label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control terror-zl-${fieldNumber}" name="add_cover_terror_attacks_insured_sum[]">
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
                                <input type="text" class="form-control evocuation-${fieldNumber}" name="add_coverage_evacuation_cost[]">
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
                    <form method="POST" id="product-fields-${fieldNumber}-3">
                        <div class="form-group">
                            <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты? </label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-${fieldNumber}" name="add_strtahovka[]" id="radioSuccess1-${fieldNumber}" value="1">
                                        <label for="radioSuccess1-${fieldNumber}">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" class="other_insurance-${fieldNumber}" name="add_strtahovka[]" id="radioSuccess2-${fieldNumber}" value="0">
                                        <label for="radioSuccess2-${fieldNumber}">Нет</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group other_insurance_info-${fieldNumber}\
                    " style="display:none">
                            <label>Укажите название и адрес страховой организации и номер Полиса</label>
                            <input class="form-control" type="text" name="add_other_insurance_info[]">
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
                    <form method="POST" id="product-fields-${fieldNumber}-4">
                        <div class="form-group">
                            <label>Раздел I. Гибель или повреждение транспортного средства</label>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" name="add_vehicle_damage[]" class="r-1-${fieldNumber}" id="radioSuccess3-${fieldNumber}" value="1">
                                        <label for="radioSuccess3-${fieldNumber}">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" name="add_vehicle_damage[]" class="r-1-${fieldNumber}" id="radioSuccess4-${fieldNumber}" value="0">
                                        <label for="radioSuccess4-${fieldNumber}">Нет</label>
                                    </div>
                                </div>
                                <div class="row r-1-show-${fieldNumber}" style="display: none;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Сумма</span>
                                                </div>
                                                <input type="text" class="form-control r-1-sum-${fieldNumber}" name="add_vehicle_damage_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Страховая премия</span>
                                                </div>
                                                <input type="text" class="form-control r-1-premia-${fieldNumber}" name="add_vehicle_damage_premia[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Франшиза</span>
                                                </div>
                                                <input type="text" class="form-control r-1-frnshiza-${fieldNumber}" name="add_vehicle_damage_franshiza[]" id="vehicle_damage_sum-${fieldNumber}">
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
                                <div class="col-sm-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" name="add_civil_liability[]" class="r-2-${fieldNumber}" id="radioSuccess5-${fieldNumber}" value="1">
                                        <label for="radioSuccess5-${fieldNumber}">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" name="add_civil_liability[]" class="r-2-${fieldNumber}" id="radioSuccess6-${fieldNumber}" value="0">
                                        <label for="radioSuccess6-${fieldNumber}">Нет</label>
                                    </div>
                                </div>
                                <div class="row r-2-show-${fieldNumber}" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Сумма</span>
                                                </div>
                                                <input type="text" class="form-control r-2-sum-${fieldNumber}" name="add_tho_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Страховая премия</span>
                                                </div>
                                                <input type="text" class="form-control r-2-premia-${fieldNumber}" name="add_tho_preim[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST" id="product-fields-${fieldNumber}-6">
                        <div class="form-group">
                            <label>Раздел III. Несчастные случаи с Застрахованными лицами</label>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="checkbox icheck-success">
                                        <input type="radio" name="add_accidents[]" class="r-3-${fieldNumber}" id="radioSuccess7-${fieldNumber}" value="1">
                                        <label for="radioSuccess7-${fieldNumber}">Да</label>
                                    </div>
                                    <div class="checkbox icheck-success">
                                        <input type="radio" name="add_accidents[]" class="r-3-${fieldNumber}" id="radioSuccess8-${fieldNumber}" value="0">
                                        <label for="radioSuccess8-${fieldNumber}">Нет</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive p-0 r-3-show-${fieldNumber}" style="display: none;">
                            <form method="POST" id="product-fields-${fieldNumber}-7">
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
                                        <td><input type="number" class="form-control r-3-pass-${fieldNumber}" value="1" readonly name="driver_quantity-${fieldNumber}"></td>
                                        <td>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control r-3-one-${fieldNumber}" name="add_driver_one_sum[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="driver_currency-" style="width: 100%;">
                                                        <option selected="selected">UZS</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="number" class="form-control r-3-sum-${fieldNumber}" name="driver_total_sum-${fieldNumber}" id="driver_total_sum-${fieldNumber}"></td>
                                        <td><input type="number" class="form-control r-3-premia-${fieldNumber}" name="add_driver_preim_sum[]" id="driver_total_sum-${fieldNumber}"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Пассажиры</label></td>
                                        <td><input type="number" class="form-control r-3-pass-1-${fieldNumber}" name="add_passenger_quantity[]"></td>
                                        <td>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control r-3-one-1-${fieldNumber}" name="add_passenger_one_sum[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="passenger_currency" style="width: 100%;">
                                                        <option selected="selected">UZS</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="number" class="form-control r-3-sum-1-${fieldNumber}" name="add_passenger_total_sum[]" id="passenger_total_sum-${fieldNumber}"></td>
                                        <td><input type="number" class="form-control r-3-premia-1-${fieldNumber}" name="add_passenger_preim_sum[]" id="passenger_total_sum-${fieldNumber}"></td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-bold">Общий Лимит</label></td>
                                        <td><input type="number" class="form-control r-3-pass-2-${fieldNumber}" name="add_limit_quantity[]"></td>
                                        <td>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control r-3-one-2-${fieldNumber}" name="add_limit_one_sum[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="limit_currency" style="width: 100%;">
                                                        <option selected="selected">UZS</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="number" class="form-control r-3-sum-2-${fieldNumber}" name="add_limit_total_sum[]"></td>
                                        <td><input type="number" class="form-control r-3-premia-2-${fieldNumber}" name="add_limit_preim_sum[]"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><label class="text-bold">Итого</label></td>
                                        <td><input type="number" class="form-control r-summ-${fieldNumber}"></td>
                                        <td><input type="number" class="form-control r-summ-premia-${fieldNumber}"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="form-group col-sm-8">
                            <label>Общий лимит ответственности </label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" id="totalLimit-${fieldNumber}" name="add_total_liability_limit[]">
                                <div class="input-group-append">
                                    <select class="form-control success" name="total_liability_limit_currency-${fieldNumber}" style="width: 100%;">
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
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                                        <div class="input-group mb-3" style="margin-top: 33px">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">от</span>
                                            </div>
                                            <input type="date" class="form-control" name="add_from_date[]">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Оплата страховой премии</label>
                                        <select class="form-control select2" name="add_payment[]" style="width: 100%;">
                                            <option selected="selected">Сум</option>
                                            <option>Доллар</option>
                                            <option>Евро</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Порядок оплаты</label>
                                        <select class="form-control select2" name="add_payment_order[]" style="width: 100%;">
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
                                <input type="text" class="form-control" readonly id="overall-sum-${fieldNumber}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;

            generalProductFields.append(fields);
        }
    </script>
@endsection