@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('kasco-add.update', $page->id)}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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

                <div id="insurer">
                    <div class="card-body">
                        <div class="card card-info" id="clone-insurance">
                            <div class="card-header">
                                <h3 class="card-title">Страхователь</h3>
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
                                            <input type="text" id="insurer-name" value="{{$page->policyHolders->FIO}}" value="" name="fio_insurer" @if($errors->has('fio_insurer'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurer-address" class="col-form-label">Юр адрес
                                                страхователя</label>
                                            <input type="text" id="insurer-address" value="{{$page->policyHolders->address}}"value="" name="address_insurer" @if($errors->has('address_insurer'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="insurer-tel" value="{{$page->policyHolders->phone_number}}" name="tel_insurer" @if($errors->has('tel_insurer'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                            <input type="text" id="insurer-schet" value="{{$page->policyHolders->checking_account}}" name="address_schet" @if($errors->has('address_schet'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="insurer-inn" value="{{$page->policyHolders->inn}}" name="inn_insurer" @if($errors->has('inn_insurer'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="insurer-mfo" value="{{$page->policyHolders->mfo}}" name="mfo_insurer" @if($errors->has('mfo_insurer'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank_insurer" class="col-form-label">Банк</label>
                                            <select @if($errors->has('bank_insurer'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="bank_insurer" name="bank_insurer"
                                                    style="width: 100%;" required>
                                                <option>Выберите банк</option>
                                                @foreach(\App\Model\Bank::all() as $bank)
                                                    <option @if($bank->id == $page->policyHolders->bank_id) selected @endif value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                            <input type="text" id="insurer-okonh" value="{{$page->policyHolders->okonx}}" name="okonx" @if($errors->has('okonh'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="anketa">
                    <div class="card-body">
                        @include('includes.beneficiary')
                    </div>
                </div>

                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reason">Использование транспортного средства на основании:</label>
                                    <input type="text" id="reason" value="{{$page->reason}}"value="" name="reason" @if($errors->has('reason'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>

                                <div class="form-group">
                                    <label for="geographic-zone">Географическая зона:</label>
                                    <input type="text" id="geographic-zone" value="{{$page->geo_zone}}"value="" name="geo_zone" @if($errors->has('geo_zone'))
                                    class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
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
                        <div class="form-group">
                            <button type="button" id="cascoAddButton" class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Номер полиса</th>
                                        <th class="text-nowrap">Серия полиса</th>
                                        <th class="text-nowrap">Год выпуска</th>
                                        <th class="text-nowrap">Период действия от</th>
                                        <th class="text-nowrap">Период действия до</th>
                                        <th class="text-nowrap">Выбор агента</th>
                                        <th class="text-nowrap">Марка</th>
                                        <th class="text-nowrap">Модель</th>
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
                                    @foreach($page->policyInformations as $info)
                                    <tr id="{{$loop->iteration}}">
                                        <td>
                                            <input type="text" class="form-control"  disabled>
                                        </td>
                                        <td>
                                            <select  @if($errors->has('policy_series_id.*'))
                                                     class="form-control is-invalid polises"
                                                     @else
                                                     class="form-control polises"
                                                     @endif  id="polises" value="" name="policy_series_id[]" style="width: 100%;">
                                                @foreach($policySeries as $policy)
                                                    <option value="{{ $policy->id }}" @if($info->policy_series_id == $policy->id ) selected @endif >{{$policy->code}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" @if($errors->has('polis_god_vupyska.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_god_vupyska}}" name="polis_god_vupyska[]">
                                        </td>
                                        <td>
                                            <input type="date" @if($errors->has('polis_date_from.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_date_from}}" name="polis_date_from[]">
                                        </td>
                                        <td>
                                            <input type="date" @if($errors->has('polis_date_to.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_date_to}}" name="polis_date_to[]">
                                        </td>
                                        <td>
                                            <select @if($errors->has('agent_id.*'))
                                                    class="form-control is-invalid polises"
                                                    @else
                                                    class="form-control polises"
                                                    @endif id="polises"  name="policy_agent_id[]" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option @if($info->policy_agent_id == $agent->user_id) selected
                                                            @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" @if($errors->has('polis_marka.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_marka}}" name="polis_marka[]">
                                        </td>
                                        <td>
                                            <input type="text"  @if($errors->has('polis_model.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_model}}" name="polis_model[]">
                                        </td>
                                        <td>
                                            <input type="text"  @if($errors->has('polis_gos_nomer.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_gos_nomer}}" name="polis_gos_nomer[]">
                                        </td>
                                        <td>
                                            <input type="text"  @if($errors->has('fio_insurer'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_nomer_tex_passporta}}" name="polis_nomer_tex_passporta[]">
                                        </td>
                                        <td>
                                            <input type="text"  @if($errors->has('polis_nomer_dvigatelya.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_nomer_dvigatelya}}" name="polis_nomer_dvigatelya[]">
                                        </td>
                                        <td>
                                            <input type="text"  @if($errors->has('polis_nomer_kuzova.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_nomer_kuzova}}" name="polis_nomer_kuzova[]">
                                        </td>
                                        <td>
                                            <input type="text"  @if($errors->has('polis_gruzopodoemnost.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_gruzopodoemnost}}" name="polis_gruzopodoemnost[]">
                                        </td>
                                        <td>
                                            <input type="text" data-field="value" @if($errors->has('polis_strah_value.*'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif value="{{$info->polis_strah_value}}" name="polis_strah_value[]">
                                        </td>
                                        <td>
                                            <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0" value="{{$info->polis_strah_sum}}" name="polis_strah_sum[]">
                                        </td>
                                        <td>
                                            <input type="text" data-field="premiya"  class="form-control insurance_premium-0" value="{{$info->polis_strah_premia}}" name="polis_strah_premia[]">
                                        </td>
                                        <td>
                                            <input type="button" onclick="openModal({{$loop->iteration}})" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="{{$loop->iteration}}">
                                        </td>
                                        <td>
                                            <input type="button" onclick="removeProductsFieldRow({{$loop->iteration}})" value="Удалить" class="btn btn-warning">
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="13" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input readonly data-insurance-stoimost type="text" class="form-control overall-sum" /></td>
                                        <td><input readonly data-insurance-sum type="text" class="form-control overall-sum4" /></td>
                                        <td><input readonly data-insurance-award type="text" class="form-control overall-sum3" /></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @foreach($page->policyInformations as $info)
                    <div id="general-product-fields">
                        <div id="product-field-modal-{{$loop->iteration}}" class="modal" data-field-number="{{$loop->iteration}}">
                            <div class="modal-content" id="product-field-modal-content-{{$loop->iteration}}">
                                <span onclick="closeModal({{$loop->iteration}})" class="close product-fields-close" id="product-fields-close-{{$loop->iteration}}" data-field-number="{{$loop->iteration}}">&times;</span>
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
                                                    <td><input type="text" @if($errors->has('mark_model.*'))
                                                        class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                               @endif value="{{$info->mark_model}}" name="mark_model[]"></td>
                                                    <td><input type="text" @if($errors->has('name.*'))
                                                        class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                               @endif value="{{$info->name}}" name="name[]"></td>
                                                    <td><input type="text" @if($errors->has('series_number.*'))
                                                        class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                               @endif value="{{$info->series_number}}" name="series_number[]"></td>
                                                    <td><input type="text" class="form-control forsum5" value="{{$info->insurance_sum}}" name="insurance_sum[]" id="insurance_sum-1"></td>
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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Покрытие террористических актов с ТС </label>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control terror-tc-1" name="cover_terror_attacks_sum[]" value="{{$info->cover_terror_attacks_sum}}">
                                                <div class="input-group-append">
                                                    <select class="form-control success"  name="cover_terror_attacks_currency" style="width: 100%;">
                                                        <option value="{{$info->cover_terror_attacks_currency}}">{{$info->cover_terror_attacks_currency}}</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Покрытие террористических актов с застрахованными лицами </label>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control terror-zl-1" value="{{$info->cover_terror_attacks_insured_sum}}" name="cover_terror_attacks_insured_sum[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success"  name="cover_terror_attacks_insured_currency" style="width: 100%;">
                                                        <option value="{{$info->cover_terror_attacks_insured_currency}}">{{$info->cover_terror_attacks_insured_currency}}</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Покрытие расходы по эвакуации</label>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control evocuation-1" value="{{$info->coverage_evacuation_cost}}" name="coverage_evacuation_cost[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="coverage_evacuation_currency" style="width: 100%;">
                                                        <option value="{{$info->coverage_evacuation_currency}}">{{$info->coverage_evacuation_currency}}</option>
                                                        <option>USD</option>
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
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты? </label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox icheck-success">
                                                        <input @if($info->other_insurance_info) checked @endif onchange="toggleBlockRadio('radioSuccess1-1', 'data-radioSuccess1-1')" type="radio" class="other_insurance-1" value="" name="strtahovka[]" id="radioSuccess1-1" value="1">
                                                        <label for="radioSuccess1-1">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input @if(!$info->other_insurance_info) checked @endif  onchange="toggleBlockRadio('radioSuccess1-1', 'data-radioSuccess1-1', false)" type="radio" class="other_insurance-1" value="" name="strtahovka[]" id="radioSuccess2-1" value="0">
                                                        <label for="radioSuccess2-1">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-radioSuccess1-1 class="form-group other_insurance_info-1" style="display:none">
                                            <label>Укажите название и адрес страховой организации и номер Полиса</label>
                                            <input @if($errors->has('other_insurance_info.*'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif type="text" value="{{$info->other_insurance_info}}" name="other_insurance_info[]">
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
                                        <div class="form-group">
                                            <label>Раздел I. Гибель или повреждение транспортного средства</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="checkbox icheck-success">
                                                        <input @if($info->one_sum) checked @endif onchange="toggleBlockRadio('radioSuccess3-1', 'data-radioSuccess3-1')" type="radio" value="" name="vehicle_damage[]" class="r-1-1" id="radioSuccess3-1" value="1">
                                                        <label for="radioSuccess3-1">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input @if(!$info->one_sum) checked @endif onchange="toggleBlockRadio('radioSuccess4-1', 'data-radioSuccess3-1', false)" type="radio" value="" name="vehicle_damage[]" class="r-1-1" id="radioSuccess4-1" value="0">
                                                        <label for="radioSuccess4-1">Нет</label>
                                                    </div>
                                                </div>
                                                <div data-radioSuccess3-1 class="col-md-6 r-1-show-1" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Сумма</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-1-sum-1" value="{{$info->one_sum}}" name="one_sum[]" id="vehicle_damage_sum-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Страховая премия</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-1-premia-1" value="{{$info->one_premia}}" name="one_premia[]" id="vehicle_damage_sum-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Франшиза</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-1-frnshiza-1" value="{{$info->one_franshiza}}" name="one_franshiza[]" id="vehicle_damage_sum-1">
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
                                                        <input @if($info->tho_sum) checked @endif onchange="toggleBlockRadio('radioSuccess5-1', 'data-radioSuccess5-1')" type="radio" value="" name="civil_liability_1" class="r-2-1" id="radioSuccess5-1" value="1">
                                                        <label for="radioSuccess5-1">Да</label>
                                                    </div>
                                                    <div onchange="toggleBlockRadio('radioSuccess6-1', 'data-radioSuccess6-1', false)" class="checkbox icheck-success">
                                                        <input @if(!$info->tho_sum) checked @endif type="radio" value="" name="civil_liability[]" class="r-2-1" id="radioSuccess6-1" value="0">
                                                        <label for="radioSuccess6-1">Нет</label>
                                                    </div>
                                                </div>
                                                <div data-radioSuccess5-1 class="col-md-6 r-2-show-1" style="display: none;">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Сумма</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-2-sum-1" value="{{$info->tho_sum}}" name="tho_sum[]" id="vehicle_damage_sum-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">Страховая премия</span>
                                                                    </div>
                                                                    <input type="text" class="form-control r-2-premia-1" value="{{$info->two_preim}}" name="two_preim[]" id="vehicle_damage_sum-1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Раздел III. Несчастные случаи с Застрахованными лицами</label>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="checkbox icheck-success">
                                                        <input @if($info->driver_currency) checked @endif onchange="toggleBlockRadio('radioSuccess7-1', 'data-radioSuccess7-1')" type="radio" value="" name="accidents[]" class="r-3-1" id="radioSuccess7-1" value="1">
                                                        <label for="radioSuccess7-1">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input @if(!$info->driver_currency) checked @endif  onchange="toggleBlockRadio('radioSuccess8-1', 'data-radioSuccess7-1', false)" type="radio" value="" name="accidents[]" class="r-3-1" id="radioSuccess8-1" value="0">
                                                        <label for="radioSuccess8-1">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-radioSuccess7-1 class="table-responsive p-0 r-3-show-1" style="display: none;">

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
                                                    <td><input type="number" class="form-control r-3-pass-1" value="1" readonly value="" name="driver_quantity[]"></td>
                                                    <td>
                                                        <div class="input-group mb-4">
                                                            <input type="text" class="form-control r-3-one-1" value="" name="driver_one_sum[]">
                                                            <div class="input-group-append">
                                                                <select class="form-control success" value="" name="driver_currency[]" style="width: 100%;">
                                                                    <option value="{{$info->driver_currency}}">{{$info->driver_currency}}</option>
                                                                    <option>USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input type="number" class="form-control r-3-sum-1" value="{{$info->driver_total_sum}}" name="driver_total_sum[]" id="driver_total_sum_1"></td>
                                                    <td><input type="number" class="form-control r-3-premia-1" value="{{$info->driver_preim_sum}}" name="driver_preim_sum[]" id="driver_total_sum_1"></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Пассажиры</label></td>
                                                    <td><input type="number" class="form-control r-3-pass-1-1" value="{{$info->passenger_quantity}}" name="passenger_quantity[]"></td>
                                                    <td>
                                                        <div class="input-group mb-4">
                                                            <input type="text" class="form-control r-3-one-1-1" value="" name="passenger_one_sum[]">
                                                            <div class="input-group-append">
                                                                <select class="form-control success"  name="passenger_currency[]" style="width: 100%;">
                                                                    <option value="{{$info->passenger_currency}}">{{$info->passenger_currency}}</option>
                                                                    <option>USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input type="number" class="form-control r-3-sum-1-1" value="{{$info->passenger_total_sum}}" name="passenger_total_sum[]" id="passenger_total_sum[]"></td>
                                                    <td><input type="number" class="form-control r-3-premia-1-1" value="{{$info->passenger_preim_sum1}}" name="passenger_preim_sum1" id="passenger_total_sum-1"></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="text-bold">Общий Лимит</label></td>
                                                    <td><input type="number" class="form-control r-3-pass-2-1" value="{{$info->limit_quantity}}" name="limit_quantity[]"></td>
                                                    <td>
                                                        <div class="input-group mb-4">
                                                            <input type="text" class="form-control r-3-one-2-1" value="{{$info->limit_one_sum}}" name="limit_one_sum[]">
                                                            <div class="input-group-append">
                                                                <select class="form-control success" name="limit_currency[]" style="width: 100%;">
                                                                    <option value="{{$info->limit_currency}}">{{$info->limit_currency}}</option>
                                                                    <option>USD</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input type="number" class="form-control r-3-sum-2-1" value="{{$info->limit_total_sum}}" name="limit_total_sum[]"></td>
                                                    <td><input type="number" class="form-control r-3-premia-2-1" value="{{$info->limit_preim_sum}}" name="limit_preim_sum[]"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"><label class="text-bold">Итого</label></td>
                                                    <td><input type="number" class="form-control r-summ-1"></td>
                                                    <td><input type="number" class="form-control r-summ-premia-1"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label>Общий лимит ответственности </label>
                                            <div class="input-group mb-4">
                                                <input type="text" @if($errors->has('total_liability_limit.*'))
                                                class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif id="totalLimit-1" value="{{$info->total_liability_limit}}" name="total_liability_limit[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="total_liability_limit_currency[]" style="width: 100%;">
                                                        <option value="{{$info->total_liability_limit_currency}}">{{$info->total_liability_limit_currency}}</option>
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
                                            <div class="row policy">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="polises">Полис</label>
                                                        <select class="form-control polises" id="polises" value="" name="policy_id[]" style="width: 100%;">
                                                            @foreach($policySeries as $polic)
                                                                <option selected="selected" value="{{$polic->id}}" @if($info->policy_id == $polic->id) selected @endif>{{$polic->code}}</option>
                                                            @endforeach
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
                                                            <input type="date" @if($errors->has('from_date.*'))
                                                            class="form-control is-invalid"
                                                                   @else
                                                                   class="form-control"
                                                                   @endif value="{{$info->from_date}}" name="from_date[]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Ответственный Агент</label>
                                                        <select class="form-control select2" value="" name="agent_id[]" style="width: 100%;">
                                                            @foreach($agents as $agent)
                                                                <option @if($info->agent_id == $agent->user_id) selected
                                                                        @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Оплата страховой премии</label>
                                                        <select class="form-control select2" value="" name="payment[]" style="width: 100%;">
                                                            <option selected="selected" @if($info->payment == 'Сум') selected @endif>Сум</option>
                                                            <option @if($info->payment == 'Доллар') selected @endif>Доллар</option>
                                                            <option @if($info->payment == 'Евро') selected @endif>Евро</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Порядок оплаты</label>
                                                        <select class="form-control select2" value="" name="payment_order[]" style="width: 100%;">
                                                            <option selected="selected" @if($info->payment_order == 'Сум') selected @endif>Сум</option>
                                                            <option @if($info->payment_order == 'Доллар') selected @endif>Доллар</option>
                                                            <option @if($info->payment_order == 'Евро') selected @endif>Евро</option>
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
                                                    <input type="text" data-overall @if($errors->has('overall_sum.*'))
                                                    class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif readonly id="overall_sum_1" value="{{$info->overall_sum}}" name="overall_sum[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
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
                    <div class="card-body">
                        <div id="payment-terms-form">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input type="text" id="all-summ" value="{{$page->strahovaya_sum}}" name="strahovaya_sum" @if($errors->has('strahovaya_sum'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" value="{{$page->strahovaya_purpose}}" name="strahovaya_purpose" @if($errors->has('strahovaya_purpose'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" value="{{$page->franshiza}}" name="franshiza" @if($errors->has('franshiza'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
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
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <select name="polis_series" id="polis_series" class="form-control">
                                                @foreach($policySeries as $seriya)
                                                    <option value="{{$seriya->id}}" @if($page->polis_series == $seriya->id) selected @endif>{{$seriya->code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" value="{{$page->insurance_from_date}}" name="insurance_from_date" type="date" @if($errors->has('insurance_from_date'))
                                            class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" value="" name="otvet_litso" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option @if($page->agent_id == $agent->user_id) selected
                                                            @endif value="{{ $agent->user_id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
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
                                        <input type="file" id="geographic-zone" name="anketa" class="form-control">
                                        @if($page->anketa != null)
                                            <a target="_blank" href="/storage/{{$page->anketa}}">
                                                Открыть
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="dogovor" class="form-control">
                                        @if($page->dogovor != null)
                                            <a target="_blank" href="/storage/{{$page->dogovor}}">
                                                Открыть
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="polis" class="form-control">
                                        @if($page->polis != null)
                                            <a target="_blank" href="/storage/{{$page->polis}}">
                                                Открыть
                                            </a>
                                        @endif
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
@section('scripts_vars')
    <script src="../assets/custom/js/form/form-actions.js"></script>
@endsection
