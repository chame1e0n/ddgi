@extends('layouts.index')

{{--@section('css')--}}
{{--    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">--}}
{{--@endsection--}}

@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.edit', ['product' => $all_product])

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

                    @if($all_product->allProductInfoTransport->count() > 0)

                        <div class="row mb-2">
                            <div class="col-sm-6">
                                @foreach($all_product->allProductInfoTransport as $item)
                                    <a target="_blank" href="{{route('teztools.download', ['id' => $all_product->id, 'info_id' => $item->id])}}" class="btn btn-warning">
                                        <i class="fa fa-download" aria-hidden="true"></i> Скачать {{ $item->polis_mark }}:{{ $item->polis_model }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <section class="content">
                <div class="card-body">
                    @include('includes.client')
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
                                            <label for="policy-beneficiary-fio" class="col-form-label">Наименования страхователя</label>
                                            <input type="text"
                                                   id="policy-beneficiary-fio"
                                                   value="{{$all_product->policyBeneficiaries->FIO}}"
                                                   name="policy_beneficiary[FIO]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-address" class="col-form-label">Адрес</label>
                                            <input type="text"
                                                   id="policy-beneficiary-address"
                                                   value="{{$all_product->policyBeneficiaries->address}}"
                                                   name="policy_beneficiary[address]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-phone-number" class="col-form-label">Телефон</label>
                                            <input type="text"
                                                   id="policy-beneficiary-phone-number"
                                                   value="{{$all_product->policyBeneficiaries->phone_number}}"
                                                   name="policy_beneficiary[phone_number]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-checking-account" class="col-form-label">Расчетный счет</label>
                                            <input type="text"
                                                   id="policy-beneficiary-checking-account"
                                                   value="{{$all_product->policyBeneficiaries->checking_account}}"
                                                   name="policy_beneficiary[checking_account]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text"
                                                   id="policy-beneficiary-inn"
                                                   value="{{$all_product->policyBeneficiaries->inn}}"
                                                   name="policy_beneficiary[inn]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text"
                                                   id="policy-beneficiary-mfo"
                                                   value="{{$all_product->policyBeneficiaries->mfo}}"
                                                   name="policy_beneficiary[mfo]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-oked" class="col-form-label">ОКЭД</label>
                                            <input type="text"
                                                   id="policy-beneficiary-oked"
                                                   value="{{$all_product->policyBeneficiaries->oked}}"
                                                   name="policy_beneficiary[oked]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-nomer-passport" class="col-form-label">Номер паспорта</label>
                                            <input type="text"
                                                   id="policy-beneficiary-nomer-passport"
                                                   value="{{$all_product->policyBeneficiaries->nomer_passport}}"
                                                   name="policy_beneficiary[nomer_passport]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-bank-id" class="col-form-label">Банк</label>
                                            <select class="form-control bank"
                                                    id="policy-beneficiary-bank-id"
                                                    name="policy_beneficiary[bank_id]"
                                                    style="width: 100%;"
                                                    required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-okonx" class="col-form-label">ОКОНХ</label>
                                            <input type="text"
                                                   id="policy-beneficiary-okonx"
                                                   value="{{$all_product->policyBeneficiaries->okonx}}"
                                                   name="policy_beneficiary[okonx]"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-seria-passport" class="col-form-label">Серия</label>
                                            <input type="text"
                                                   id="policy-beneficiary-seria-passport"
                                                   value="{{$all_product->policyBeneficiaries->seria_passport}}"
                                                   name="policy_beneficiary[seria_passport]"
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
                                                    <label for="all-product-insurance-from">Период страхования</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">с</span>
                                                        </div>
                                                        <input id="all-product-insurance-from"
                                                               name="all_product[insurance_from]"
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
                                                        <input id="all-product-insurance-to"
                                                               name="all_product[insurance_to]"
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
                                                        name="all_product[using_tc]"
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
                                            <label for="all-product-geo-zone">Географическая зона:</label>
                                            <input type="text"
                                                   id="all-product-geo-zone"
                                                   value="{{$all_product->geo_zone}}"
                                                   name="all_product[geo_zone]"
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
                        <h3 class="card-title">Сведения о транспортных средствах</h3>
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
                                            <th class="text-nowrap">Период действия от</th>
                                            <th class="text-nowrap">Период действия до</th>
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
                                    <tbody>
                                        @if($all_product->allProductInfoTransport->count() > 0)
                                            @foreach($all_product->allProductInfoTransport as $item)
                                                <tr id="all_product_information_transport_{{$loop->index}}">
                                                    <td>
                                                        <input type="hidden"
                                                               name="all_product_information_transports[{{$loop->index}}][id]"
                                                               value="{{$item->id}}" />
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][polis_mark]"
                                                               value="{{$item->polis_mark}}" />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][polis_model]"
                                                               value="{{$item->polis_model}}" />
                                                    </td>
                                                    <td>
                                                        <input disabled type="date" class="form-control" />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][polis_gos_num]"
                                                               value="{{$item->polis_gos_num}}" />
                                                    </td>
                                                    <td>
                                                        <input type="date"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][polis_teh_passport]"
                                                               value="{{$item->polis_teh_passport}}" />
                                                    </td>
                                                    <td>
                                                        <input type="date"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][polis_num_engine]"
                                                               value="{{$item->polis_num_engine}}" />
                                                    </td>
                                                    <td>
                                                        <select class="form-control"
                                                                id="polise_agents"
                                                                name="all_product_information_transports[{{$loop->index}}][agents]"
                                                                style="width: 100%;">
                                                        @foreach($agents as $agent)
                                                            <option value="{{$agent->id}}"
                                                                    @if($agent->id == $item->agents)
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
                                                               name="all_product_information_transports[{{$loop->index}}][polis_payload]"
                                                               value="{{$item->polis_payload}}" />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][modification]"
                                                               @if(!empty($item->modification))
                                                                value="{{$item->modification}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][state_num]"
                                                               @if(!empty($item->state_num))
                                                                value="{{$item->state_num}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][num_tech_passport]"
                                                               @if(!empty($item->num_tech_passport))
                                                                value="{{$item->num_tech_passport}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][num_engine]"
                                                               @if(!empty($item->num_engine))
                                                                value="{{$item->num_engine}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][num_carcase]"
                                                               @if(!empty($item->num_carcase))
                                                                value="{{$item->num_carcase}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][carrying_capacity]"
                                                               @if(!empty($item->carrying_capacity))
                                                                value="{{$item->carrying_capacity}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               data-field="value"
                                                               class="form-control"
                                                               name="all_product_information_transports[{{$loop->index}}][insurance_cost]"
                                                               @if(!empty($item->insurance_cost))
                                                                value="{{$item->insurance_cost}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               data-field="sum"
                                                               class="form-control calc1 overall_insurance_sum-0"
                                                               name="all_product_information_transports[{{$loop->index}}][overall_polis_sum]"
                                                               @if(!empty($item->overall_polis_sum))
                                                                value="{{$item->overall_polis_sum}}"
                                                               @endif />
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                               data-field="premiya"
                                                               class="form-control insurance_premium-0"
                                                               name="all_product_information_transports[{{$loop->index}}][polis_premium]"
                                                               @if(!empty($item->polis_premium))
                                                                value="{{$item->polis_premium}}"
                                                               @endif />
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="button"
                                                               onclick="removeProductsFieldRow({{$loop->index}})"
                                                               value="Удалить"
                                                               class="btn btn-warning" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

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

@include('products.scripts', [
    'ajax_data' => [
        'banks' => [
            [
                'id' => 'policy-holder-bank-id',
                'name' => 'policy_holder[bank_id]',
                'value' => $all_product->policyHolder->bank_id ?? ''
            ],
            [
                'id' => 'policy-beneficiary-bank-id',
                'name' => $all_product->policyBeneficiaries->bank_id ?? '',
                'value' => $all_product->policyBeneficiaries->bank_id ?? ''
            ]
        ]
    ]
])
