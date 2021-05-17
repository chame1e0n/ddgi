@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                                        <input type="radio" readonly name="client_type_radio" class="client-type-radio" id="client-type-radio-1" value="individual">
                                        <label for="client-type-radio-1">физ. лицо</label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="icheck-success">
                                        <input type="radio" readonly name="client_type_radio" class="client-type-radio" id="client-type-radio-2" value="legal">
                                        <label for="client-type-radio-2">юр. лицо</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product-id">Вид продукта</label>
                            <select id="product-id" class="form-control select2" readonly name="product_id" style="width: 100%;">
                                <option selected="selected">говно</option>
                                <option selected="selected">говно 2</option>
                                <option value="1">asdc</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-readonly name" class="col-form-label">Наименование
                                страхователя</label>
                            <input required type="text" id="insurer-readonly name" readonly name="fio_insurer"
                                   value="{{$page->policyHolders->FIO}}" @if($errors->has('fio_insurer'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                   @endif
                                   required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-address" class="col-form-label">Юр адрес
                                страхователя</label>
                            <input required value="{{$page->policyHolders->address}}" type="text"
                                   id="insurer-address"
                                   readonly name="address_insurer"
                                   @if($errors->has('address_insurer'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                   @endif required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-tel" class="col-form-label">Телефон</label>
                            <input required value="{{$page->policyHolders->phone_number}}" type="text"
                                   id="insurer-tel"
                                   readonly name="tel_insurer"
                                   @if($errors->has('tel_insurer'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                @endif >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                            <input required value="{{$page->policyHolders->checking_account}}" type="text"
                                   id="insurer-schet"
                                   readonly name="checking_account"
                                   @if($errors->has('checking_account'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                @endif >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-inn" class="col-form-label">ИНН</label>
                            <input required value="{{$page->policyHolders->inn}}" type="text"
                                   id="insurer-inn"
                                   readonly name="inn_insurer"
                                   @if($errors->has('inn_insurer'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                @endif
                            >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-mfo" class="col-form-label">МФО</label>
                            <input required value="{{$page->policyHolders->mfo}}" type="text"
                                   id="insurer-mfo" readonly name="mfo_insurer" @if($errors->has('mfo_insurer'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                @endif >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-bank" class="col-form-label">Банк</label>
                            <select @if($errors->has('bank_insurer'))
                                    class="form-control is-invalid"
                                    @else
                                    class="form-control"
                                    @endif id="insurer_bank" readonly name="bank_insurer"
                                    style="width: 100%;" required>
                                <option>Выберите банк</option>
                                @foreach($banks as $bank)
                                    @if($page->policyHolders->bank_id == $bank->id)
                                        <option selected value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @else
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                            <input required value="{{$page->policyHolders->oked}}" type="text" id="oked"
                                   readonly name="oked"
                                   @if($errors->has('oked'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                @endif >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                            <input type="text" id="insurer-okonh" readonly name="okonx"
                                   value="{{$page->policyHolders->okonx}}" @if($errors->has('okonh'))
                                   class="form-control is-invalid"
                                   @else
                                   class="form-control"
                                @endif>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card card-info" id="clone-beneficiary">
                    <div class="card-header">
                        <h3 class="card-title">Выгодоприобретатель</h3>
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
                                        <label for="beneficiary-readonly name" class="col-form-label">ФИО
                                            выгодоприобретателя</label>
                                        <input required value="{{$page->policyBeneficiaries->FIO}}"
                                               type="text"
                                               id="beneficiary-readonly name" readonly name="fio_beneficiary"
                                               @if($errors->has('FIO'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-address" class="col-form-label">Адрес
                                            выгодоприобретателя</label>
                                        <input required value="{{$page->policyBeneficiaries->address}}"
                                               type="text"
                                               id="beneficiary-address"
                                               readonly name="address_beneficiary"
                                               @if($errors->has('address'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                        <input required value="{{$page->policyBeneficiaries->phone_number}}"
                                               type="text"
                                               id="beneficiary-tel" readonly name="tel_beneficiary"
                                               @if($errors->has('phone_number'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-schet" class="col-form-label">Расчетный
                                            счет</label>
                                        <input required
                                               value="{{$page->policyBeneficiaries->checking_account}}"
                                               type="text" id="beneficiary_schet"
                                               readonly name="beneficiary_schet"
                                               @if($errors->has('checking_account'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                        <input required value="{{$page->policyBeneficiaries->inn}}"
                                               type="number" id="inn_beneficiary"
                                               readonly name="inn_beneficiary"
                                               @if($errors->has('inn'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                        <input required value="{{$page->policyBeneficiaries->mfo}}"
                                               type="text" id="mfo_beneficiary"
                                               readonly name="mfo_beneficiary"
                                               @if($errors->has('mfo_beneficiary'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <select @if($errors->has('bank_beneficiary'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="bank_beneficiary" readonly name="bank_beneficiary"
                                                style="width: 100%;" required>
                                            <option>Выберите банк</option>
                                            @foreach($banks as $bank)
                                                @if($page->policyBeneficiaries->bank_id == $bank->id)
                                                    <option selected
                                                            value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                @else
                                                    <option
                                                        value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                        <input required value="{{$page->policyBeneficiaries->oked}}"
                                               type="text" id="oked_beneficiary"
                                               readonly name="oked_beneficiary"
                                               @if($errors->has('oked_beneficiary'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" value="{{$page->policyBeneficiaries->okonx}}"
                                               id="beneficiary-okonh" readonly name="okonx_beneficiary" required
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Сведение о тс</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" id="addAutozalogBtn" class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;" >
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable1">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Номер полиса</th>
                                        <th class="text-nowrap">Серия полиса</th>
                                        <th class="text-nowrap">Дата выдачи</th>
                                        <th class="text-nowrap">Год выпуска</th>
                                        <th class="text-nowrap">Периуд действия от</th>
                                        <th class="text-nowrap">Периуд действия до</th>
                                        <th class="text-nowrap">Выбор агента</th>
                                        <th class="text-nowrap">Марка</th>
                                        <th class="text-nowrap">Модель</th>
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

                                    @foreach($page->informations as $info)
                                        <tr id="a0">
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{$info->policy_number}}" readonly name="policy_number[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('policy_series.0')) is-invalid @endif" value="{{$info->policy_series}}" readonly name="policy_series[]">
                                            </td>
                                            <td>
                                                <input disabled="" type="date" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('god_vipuska.0')) is-invalid @endif" value="{{$info->god_vipuska}}" readonly name="god_vipuska[]">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control @if($errors->has('policy_insurance_from.0')) is-invalid @endif" value="{{$info->policy_insurance_from}}" readonly name="policy_insurance_from[]">
                                            </td>
                                            <td>
                                                <input type="date" class="form-control @if($errors->has('policy_insurance_to.0')) is-invalid @endif" value="{{$info->policy_insurance_to}}" readonly name="policy_insurance_to[]">
                                            </td>
                                            <td>
                                                <select class="form-control @if($errors->has('otvet_litso.0')) is-invalid @endif"  id="polise_agents" readonly name="otvet_litso[]" style="width: 100%;">
                                                    @foreach($agents as $agent)
                                                        <option value="{{$agent->user_id}}" @if($agent->user_id === $info->otvet_litso)  selected="selected" @endif> {{$agent->name}} {{$agent->surname}} {{$agent->middle_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('marka.0')) is-invalid @endif" value="{{$info->marka}}" readonly name="marka[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('model.0')) is-invalid @endif" value="{{$info->model}}" readonly name="model[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('modification.0')) is-invalid @endif" value="{{$info->modification}}" readonly name="modification[]">
                                            </td>


                                            <td>
                                                <input type="text" class="form-control @if($errors->has('gos_nomer.0')) is-invalid @endif" value="{{$info->gos_nomer}}" readonly name="gos_nomer[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('tex_passport.0')) is-invalid @endif" value="{{$info->tex_passport}}" readonly name="tex_passport[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('number_engine.0')) is-invalid @endif" value="{{$info->number_engine}}" readonly name="number_engine[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('number_kuzov.0')) is-invalid @endif" value="{{$info->number_kuzov}}" readonly name="number_kuzov[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('gryzopodemnost.0')) is-invalid @endif" value="{{$info->gryzopodemnost}}" readonly name="gryzopodemnost[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="value" class="form-control @if($errors->has('strah_stoimost.0')) is-invalid @endif" value="{{$info->strah_stoimost}}" readonly name="strah_stoimost[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0 @if($errors->has('strah_sum.0')) is-invalid @endif" value="{{$info->strah_sum}}" readonly name="strah_sum[]">
                                            </td>
                                            <td>
                                                <input type="text" data-field="premiya" class="form-control insurance_premium-0 @if($errors->has('strah_prem.0')) is-invalid @endif" value="{{$info->strah_prem}}" readonly name="strah_prem[]">
                                            </td>
                                            <td>
                                                <input type="button" onclick="removeProductsFieldRow(0)" value="Удалить" class="btn btn-warning">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tbody>
                                    <tr></tr>
                                    <tr>
                                        <td colspan="15" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input readonly data-insurance-stoimost type="text" class="form-control overall-sum" /></td>
                                        <td><input readonly data-insurance-sum type="text" class="form-control overall-sum4" /></td>
                                        <td><input readonly data-insurance-award type="text" class="form-control overall-sum3" /></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>При наружном осмотре ТС дефекты и повреждения? </label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input  @if($page->defect_image && $page->defect_comment) checked @endif
                                                onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')"
                                                       type="radio" class="other_insurance-0" readonly name="deffects"
                                                       id="radioSuccess1" @if($page->defect_image == null && $page->defect_comment == null) value="1"
                                                       @else   value="2" @endif>
                                                <label for="radioSuccess1">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)"
                                                    type="radio" class="other_insurance-0" readonly name="deffects"
                                                    id="radioSuccess2" value="0" @if($page->defect_image == null || $page->defect_comment == null) checked
                                                    @endif >
                                                <label for="radioSuccess2">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-radiosuccess2="" class="col-md-12" @if(!$page->defect_comment || !$page->defect_image) style="display: none;"
                                @endif >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group other_insurance_info-0">
                                            <label>Комментарий</label>
                                            <input class="form-control @if($errors->has('defect_comment')) is-invalid @endif" type="text" readonly name="defect_comment"
                                                   value="{{$page->defect_comment}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group other_insurance_info-0">
                                            <label>Прикрепите фотографии</label>
                                            <input id="defect_image" readonly name="defect_image"
                                                   value="{{$page->defect_image}}"
                                                   type="file" @if($errors->has('defect_image'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                            @if($page->defect_image)  <a
                                                href="/storage/{{$page->defect_image}}">Скачать</a> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей
                                        анкеты? </label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input @if($page->strtahovka_comment || !empty(old('strtahovka_comment'))) checked @endif
                                                onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')"
                                                       type="radio" class="other_insurance-0" readonly name="strtahovka"
                                                       id="radioSuccess1-0" @if($page->strtahovka_comment == null) value="1"
                                                       @else   value="2" @endif>
                                                <label for="radioSuccess1-0">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)"
                                                    type="radio" class="other_insurance-0" readonly name="strtahovka"
                                                    id="radioSuccess2-0" value="0" @if($page->strtahovka_comment == null) checked
                                                    @endif>
                                                <label for="radioSuccess2-0">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess1="" class="form-group other_insurance_info"
                                     @if(!$page->strtahovka_comment) style="display: none;"
                                    @endif>
                                    <label for="strtahovka_info">Комментарий</label>
                                    <input id="strtahovka_info" class="form-control @if($errors->has('strtahovka_comment')) is-invalid @endif" type="text"
                                           readonly name="strtahovka_comment" value="{{$page->strtahovka_comment}}">
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
                                    <input type="text" id="all-summ" readonly name="insurance_sum_prod" class="form-control"
                                           value="{{$page->insurance_sum}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="all-summ">Cтраховая премия</label>
                                    <input type="text" id="all-summ" readonly name="insurance_bonus" class="form-control"
                                           value="{{$page->insurance_bonus}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="all-summ">Франшиза</label>
                                    <input type="text" id="all-summ" readonly name="franchise" class="form-control"
                                           value="{{$page->franchise}}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-inline justify-content-between">
                                    <label>Валюта взаиморасчетов</label>
                                    <select class="form-control" id="walletNames"
                                            style="width: 100%; text-align: center">

                                        <option @if($page->insurance_premium_currency) selected
                                                @endif readonly name="insurance_premium_currency">UZS
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-inline justify-content-between">
                                    <label>Порядок оплаты страховой премии</label>
                                    <select id="condition" class="form-control payment-schedule" readonly name="payment_term"
                                            style="width: 100%; text-align: center">
                                        <option value="1" @if($page->payment_term === '1') selected @endif>
                                            Единовременно
                                        </option>
                                        <option value="transh"
                                                @if($page->payment_term === 'transh') selected @endif>Транш
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-inline justify-content-between">
                                    <label>Способ расчета</label>
                                    <select class="form-control payment-schedule" readonly name="sposob_rascheta"
                                            onchange="showDiv('other-payment-schedule', this)"
                                            style="width: 100%; text-align: center">
                                        <option value="1" @if($page->sposob_rascheta === '1') selected @endif>
                                            Сумах
                                        </option>
                                        <option value="2" @if($page->sposob_rascheta === '2') selected @endif>Сумах
                                            В ин. валюте
                                        </option>
                                        <option value="3" @if($page->sposob_rascheta === '3') selected @endif>В ин.
                                            валюте по курсу ЦБ на день заключение
                                            договора
                                        </option>
                                        <option value="4" @if($page->sposob_rascheta === '4') selected @endif>В ин.
                                            валюте по курсу ЦБ на день оплаты
                                        </option>
                                        <option value="4" @if($page->sposob_rascheta === '5') selected @endif>В ин.
                                            валюте по фиксированному ЦБ на день оплаты
                                            премии/первого транша
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="transh-payment-schedule"
                             @if($page->payment_term == 1) class="d-none" @endif>
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
                                    @if($page->strahPremiya->count() > 0)
                                        @foreach($page->strahPremiya as $prem)
                                            <tr id="{{$prem->id}}" data-field-number="0">
                                                <td><input type="text" class="
                                                        @if($errors->has('payment_sum.'.$loop->index))
                                                        is-invalid
@endif form-control" readonly name="payment_sum[]" value="{{$prem->payment_sum}}">
                                                </td>
                                                <td><input type="date"
                                                           class="@if($errors->has('payment_from.'.$loop->index))
                                                               is-invalid
@endif form-control" readonly name="payment_from[]" value="{{$prem->payment_from}}">
                                                </td>
                                                <td>
                                                    <input type="button" value="Удалить" data-action="delete"
                                                           class="btn btn-warning"
                                                           onclick="removeEl({{$prem->id}})">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr id="payment-term-tr-0" data-field-number="0">
                                            <td><input type="text" class="@if($errors->has('payment_sum.*'))
                                                    is-invalid
@endif form-control" readonly name="payment_sum[]" value="">
                                            </td>
                                            <td><input type="date" class="@if($errors->has('payment_from.*'))
                                                    is-invalid
@endif form-control" readonly name="payment_from[]" value="">
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="icheck-success ">
                                <input onchange="toggleBlock('tarif', 'data-tarif-descr')"
                                       class="form-check-input client-type-radio" type="checkbox" readonly name="tarif"
                                       id="tarif" @if($page->tarif_other) checked @endif @if(!empty(old('tarif'))) checked @endif>
                                <label class="form-check-label" for="tarif">Тариф</label>
                            </div>
                            <!-- TODO: Блок должен находится в скрытом состоянии
                            отображаться только тогда, когда выбран checkbox "Тариф"
                            -->
                            <div class="form-group" data-tarif-descr
                                 @if(!$page->tarif_other && empty(old('tarif'))) style="display: none" @endif>
                                <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                <input class="form-control" id="descrTarif" type="number" readonly name="tarif_other"
                                       value="{{$page->tarif_other}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="icheck-success ">
                                <input onchange="toggleBlock('preim', 'data-preim-descr')"
                                       class="form-check-input client-type-radio" type="checkbox" readonly name="preim"
                                       id="preim" @if($page->premiya_other) checked @endif  @if(!empty(old('preim'))) checked @endif>
                                <label class="form-check-label" for="preim">Премия</label>
                            </div>
                            <!-- TODO: Блок должен находится в скрытом состоянии
                            отображаться только тогда, когда выбран checkbox "Тариф"
                            -->
                            <div class="form-group" data-preim-descr
                                 @if(!$page->premiya_other && empty(old('preim'))) style="display: none" @endif>
                                <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                <input class="form-control" id="descrPreim" type="number" readonly name="premiya_other"
                                       value="{{$page->premiya_other}}">
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
                                @if($page->application_form_file)<a href="/storage/{{$page->application_form_file}}"
                                                                    target="_blank">Скачать</a> @endif
                                <div class="form-group">
                                    <label for="polis-series" class="col-form-label">Анкета</label>
                                    <input id="anketa_img" readonly name="application_form_file"
                                           value="{{$page->application_form_file}}"
                                           type="file" @if($errors->has('application_form_file'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @if($page->contract_file)<a href="/storage/{{$page->contract_file}}"
                                                            target="_blank">Скачать</a> @endif
                                <div class="form-group">
                                    <label for="polis-series" class="col-form-label">Договор</label>
                                    <input id="dogovor_img" readonly name="contract_file" value="{{$page->contract_file}}"
                                           type="file" @if($errors->has('contract_file'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                        @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                @if($page->policy_file)<a href="/storage/{{$page->policy_file}}" target="_blank">Скачать</a> @endif
                                <div class="form-group">
                                    <label for="polis-series" class="col-form-label">Полис</label>
                                    <input id="polis_img" readonly name="policy_file" value="{{$page->policy_file}}"
                                           type="file" @if($errors->has('policy_file'))
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

        </section>



@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection