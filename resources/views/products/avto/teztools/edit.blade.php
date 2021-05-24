@extends('layouts.index')

{{--@section('css')--}}
{{--    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">--}}
{{--@endsection--}}

@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.edit')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <form action="{{route('teztools.update', $all_product->id)}}"
          method="post"
          enctype="multipart/form-data"
          id="mainFormKasko">
        @csrf
        @method('put')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br /><br />
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row mb-2">
                        <div class="col-sm-6"></div>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-name" class="col-form-label">Наименования страхователя</label>
                                        <input type="text"
                                               id="beneficiary-name"
                                               value="{{$all_product->policyHolder->FIO}}"
                                               name="fio_insurer"
                                               class="form-control" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Адрес страхователя</label>
                                        <input type="text"
                                               id="insurer-address"
                                               value="{{$all_product->policyHolder->address}}"
                                               name="address_insurer"
                                               class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефонный номер</label>
                                        <input type="text"
                                               id="insurer-tel"
                                               value="{{$all_product->policyHolder->phone_number}}"
                                               name="tel_insurer"
                                               class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text"
                                               id="insurer-schet"
                                               value="{{$all_product->policyHolder->phone_number}}"
                                               name="address_schet"
                                               class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text"
                                               id="insurer-inn"
                                               name="inn_insurer"
                                               value="{{$all_product->policyHolder->inn}}"
                                               class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text"
                                               id="insurer-mfo"
                                               name="mfo_insurer"
                                               value="{{$all_product->policyHolder->mfo}}"
                                               class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <select class="form-control bank"
                                                id="insurer-bank"
                                                name="bank_insurer"
                                                style="width: 100%;"
                                                required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text"
                                               id="insurer-okonh"
                                               name="oked_insurer"
                                               value="{{$all_product->policyHolder->oked}}"
                                               class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text"
                                               id="insurer-okonh"
                                               name="okonh_insurer"
                                               value="{{$all_product->policyHolder->okonx}}"
                                               class="form-control" />
                                    </div>
                                </div>
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
                                            <label for="beneficiary-name" class="col-form-label">Наименования страхователя</label>
                                            <input type="text"
                                                   id="beneficiary-name"
                                                   value="{{$all_product->policyBeneficiaries->FIO}}"
                                                   name="fio_beneficiary"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес</label>
                                            <input type="text"
                                                   id="beneficiary-address"
                                                   value="{{$all_product->policyBeneficiaries->address}}"
                                                   name="address_beneficiary"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text"
                                                   id="beneficiary-tel"
                                                   value="{{$all_product->policyBeneficiaries->phone_number}}"
                                                   name="tel_beneficiary"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                            <input type="text"
                                                   id="beneficiary-schet"
                                                   value="{{$all_product->policyBeneficiaries->checking_account}}"
                                                   name="beneficiary_schet"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text"
                                                   id="beneficiary-inn"
                                                   value="{{$all_product->policyBeneficiaries->inn}}"
                                                   name="inn_beneficiary"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text"
                                                   id="beneficiary-mfo"
                                                   value="{{$all_product->policyBeneficiaries->mfo}}"
                                                   name="mfo_beneficiary"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text"
                                                   id="insurer-okonh"
                                                   value="{{$all_product->policyBeneficiaries->oked}}"
                                                   name="oked_beneficiary"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">Номер паспорта</label>
                                            <input type="text"
                                                   id="beneficiary-okonh"
                                                   value="{{$all_product->policyBeneficiaries->nomer_passport}}"
                                                   name="nomer_passport"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                            <select class="form-control bank"
                                                    id="beneficiary-bank"
                                                    name="bank_beneficiary"
                                                    style="width: 100%;"
                                                    required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                            <input type="text"
                                                   id="beneficiary-okonh"
                                                   value="{{$all_product->policyBeneficiaries->okonx}}"
                                                   name="okonh_beneficiary"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">Серия</label>
                                            <input type="text"
                                                   id="beneficiary-okonh"
                                                   value="{{$all_product->policyBeneficiaries->seria_passport}}"
                                                   name="seria_passport"
                                                   class="form-control" />
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
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="insurance_from">Период страхования</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">с</span>
                                                        </div>
                                                        <input id="insurance_from"
                                                               name="insurance_from"
                                                               value="{{$all_product->insurance_from}}"
                                                               type="date"
                                                               class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3"
                                                         style="margin-top: 33px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="insurance_to"
                                                               name="insurance_to"
                                                               value="{{$all_product->insurance_to}}"
                                                               type="date"
                                                               class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-inline justify-content-between">
                                                <label>Использования ТС на основании</label>
                                                <select class="form-control payment-schedule"
                                                        name="using_tc"
                                                        onchange="showDiv('other-payment-schedule', this)"
                                                        style="width: 100%; text-align: center;">
                                                    <option @if($all_product->using_tc == 'selected')
                                                                selected
                                                            @endif>
                                                    </option>
                                                    <option value="1"
                                                            @if($all_product->using_tc == '1')
                                                                selected
                                                            @endif>
                                                        Тех пасспорт
                                                    </option>
                                                    <option value="2"
                                                            @if($all_product->using_tc == '2')
                                                                selected
                                                            @endif>
                                                        Доверенность
                                                    </option>
                                                    <option value="3"
                                                            @if($all_product->using_tc == '3')
                                                                selected
                                                            @endif>
                                                        Договор аренды
                                                    </option>
                                                    <option value="4"
                                                            @if($all_product->using_tc == '4')
                                                                selected
                                                            @endif>
                                                        Путевой лист
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="geographic-zone">Географическая зона:</label>
                                            <input type="text"
                                                   id="geographic-zone"
                                                   value="{{$all_product->geo_zone}}"
                                                   name="geo_zone"
                                                   class="form-control" />
                                        </div>
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
                    <div class="card-body" id="notmod">
                        <div class="form-group">
                            <button type="button" id="cascoAddButton" class="btn btn-primary">Добавить</button>
                        </div>
                        <div class="table-responsive p-0"
                             style="max-height: 300px;">
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Дата выдачи</th>
                                            <th class="text-nowrap">Год выпуска</th>
                                            <th class="text-nowrap">Периуд действия от</th>
                                            <th class="text-nowrap">Периуд действия до</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">Марка и модель</th>
                                            <th class="text-nowrap">Модификация</th>
                                            <th class="text-nowrap">Гос. номер</th>
                                            <th class="text-nowrap">Номер тех паспорта</th>
                                            <th class="text-nowrap">Номер двигателя</th>
                                            <th class="text-nowrap">Номер кузова</th>
                                            <th class="text-nowrap">Грузоподмность</th>
                                            <th class="text-nowrap">Страховая стоимость</th>
                                            <th class="text-nowrap">Страховая сумма</th>
                                            <th class="text-nowrap">Страховая премия</th>
                                        </tr>
                                    </thead>

                                    @if($all_product->allProductInfoTransport->count() > 0 && $all_product->allProductInfoTransport[0]->polis_mark !== null)
                                        @foreach($all_product->allProductInfoTransport[0]->polis_mark as $key => $item)
                                            <tr id="a${fieldNumber}">
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="polis_mark[]"
                                                           value="{{$all_product->allProductInfoTransport[0]->polis_mark[$key]}}" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="polis_model[]"
                                                           value="{{$all_product->allProductInfoTransport[0]->polis_model[$key]}}" />
                                                </td>
                                                <td>
                                                    <input disabled type="date" class="form-control" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="polis_gos_num[]"
                                                           value="{{$all_product->allProductInfoTransport[0]->polis_gos_num[$key]}}" />
                                                </td>
                                                <td>
                                                    <input type="date"
                                                           class="form-control"
                                                           name="polis_teh_passport[]"
                                                           value="{{$all_product->allProductInfoTransport[0]->polis_teh_passport[$key]}}" />
                                                </td>
                                                <td>
                                                    <input type="date"
                                                           class="form-control"
                                                           name="polis_num_engine[]"
                                                           value="{{$all_product->allProductInfoTransport[0]->polis_num_engine[$key]}}" />
                                                </td>
                                                <td>
                                                    <select class="form-control"
                                                            id="polise_agents"
                                                            name="agents[]"
                                                            style="width: 100%;">
                                                    @foreach($agents as $agent)
                                                        <option value="{{$agent->id}}"
                                                                @if($agent->id == $all_product->allProductInfoTransport[0]->agents[$key])
                                                                    selected
                                                                @endif>
                                                            {{$agent->name}}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="polis_payload[]"
                                                           value="{{$all_product->allProductInfoTransport[0]->polis_payload[$key]}}" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="modification[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->modification[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->modification[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="state_num[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->state_num[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->state_num[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="num_tech_passport[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->num_tech_passport[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->num_tech_passport[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="num_engine[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->num_engine[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->num_engine[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="num_carcase[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->num_carcase[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->num_carcase[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="carrying_capacity[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->carrying_capacity[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->carrying_capacity[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           data-field="value"
                                                           class="form-control"
                                                           name="insurance_cost[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->insurance_cost[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->insurance_cost[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           data-field="sum"
                                                           class="form-control calc1 overall_insurance_sum-0"
                                                           name="overall_polis_sum[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->overall_polis_sum[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->overall_polis_sum[$key]}}"
                                                           @endif />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           data-field="premiya"
                                                           class="form-control insurance_premium-0"
                                                           name="polis_premium[]"
                                                           @if(!empty($all_product->allProductInfoTransport[0]->polis_premium[$key]))
                                                            value="{{$all_product->allProductInfoTransport[0]->polis_premium[$key]}}"
                                                           @endif />
                                                </td>
                                                <td></td>
                                                <td>
                                                    <input type="button"
                                                           onclick="removeProductsFieldRow(${fieldNumber})"
                                                           value="Удалить"
                                                           class="btn btn-warning" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    <tr></tr>

                                    <tbody>
                                        <tr>
                                            <td colspan="14"
                                                style="text-align: right;">
                                                <label class="text-bold">Итого</label>
                                            </td>
                                            <td>
                                                <input readonly data-insurance-stoimost type="text" class="form-control overall-sum" />
                                            </td>
                                            <td>
                                                <input readonly data-insurance-sum type="text" class="form-control overall-sum4" />
                                            </td>
                                            <td>
                                                <input readonly data-insurance-award type="text" class="form-control overall-sum3" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="general-product-fields">
                        <div id="product-field-modal-id1" class="modal" data-field-number="0">
                            <div class="modal-content"
                                 style="min-height: 100%; padding: 20px;"
                                 id="product-field-modal-content[]">
                                <span onclick="closeModal(id1)"
                                      class="close product-fields-close"
                                      id="product-fields-close[]"
                                      data-field-number="0">
                                    &times;
                                </span>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Трафматические повреждении</label>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Количество</span>
                                                    </div>
                                                    <input type="text"
                                                           class="form-control"
                                                           name="one_sum[]"
                                                           id="vehicle_damage_sum-${fieldNumber}"
                                                           value="value for id1" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Страховая сумма</span>
                                                    </div>
                                                    <input type="text"
                                                           class="form-control r-${fieldNumber}"
                                                           name="one_sum[]"
                                                           id="vehicle_damage_sum-${fieldNumber}" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Страховая премия</span>
                                                    </div>
                                                    <input type="text"
                                                           class="form-control r-${fieldNumber}"
                                                           name="one_sum[]"
                                                           id="vehicle_damage_sum-${fieldNumber}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Смерть</label>

                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Страховая сумма</span>
                                                    </div>
                                                    <input type="text"
                                                           class="form-control r-${fieldNumber}"
                                                           name="one_sum[]"
                                                           id="vehicle_damage_sum-${fieldNumber}" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Страховая премия</span>
                                                    </div>
                                                    <input type="text"
                                                           class="form-control r-${fieldNumber}"
                                                           name="one_sum[]"
                                                           id="vehicle_damage_sum-${fieldNumber}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Итого</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Общая страховая сумма</span>
                                                </div>
                                                <input type="text"
                                                       class="form-control"
                                                       name="one_sum[]"
                                                       data-overall
                                                       id="total_inp${fieldNumber}" />
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    @yield('_usloviya_oplati_strahovoy_premii_content')
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
                                        <input type="file" id="geographic-zone" name="application_form_file" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="contract_file" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="policy_file" class="form-control" />
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

    <form action="{{route('teztools.destroy', $all_product->id)}}"
          method="post">
        @csrf
        @method('delete')

        <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right">Удалить</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $.ajax({
            url: '{{route('getBanks')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = response.length;

                let insurer_banks = $('#insurer-bank');
                insurer_banks.empty();
                insurer_banks.append('<option></option>');

                let beneficiary_banks = $('#beneficiary-bank');
                beneficiary_banks.empty();
                beneficiary_banks.append('<option></option>');

                var insurer_selected = {{$all_product->policyHolder->bank_id ?? 0}};
                var beneficiary_selected = {{$all_product->policyBeneficiaries->bank_id ?? 0}};

                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    var mfo = response[i]['mfo'];

                    insurer_banks.append('<option value="' + id + '" ' + (insurer_selected == id ? 'selected' : '')  + '>' + name + '</option>');
                    beneficiary_banks.append('<option value="' + id + '" ' + (beneficiary_selected == id ? 'selected' : '')  + '>' + name + '</option>');
                }
            }
        });

        // Initialize Select2 Elements
        $('#insurer-bank').select2({
            theme: 'bootstrap4'
        });
        $('#beneficiary-bank').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection