@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                                            <input disabled type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-1" @if($page->type == 0) checked @endif value="0">
                                            <label for="client-type-radio-1">физ. лицо</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="icheck-success">
                                            <input disabled type="radio" name="client_type_radio" class="client-type-radio" id="client-type-radio-2" @if($page->type == 1) checked @endif value="1">
                                            <label for="client-type-radio-2">юр. лицо</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select disabled id="product-id" class="form-control select2" name="product_id" style="width: 100%;">
                                    <option selected="selected">говно</option>
                                    <option selected="selected">говно 2</option>
                                    <option value="1">asdc</option>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-name" class="col-form-label">Наименование страхователя</label>
                                        <input disabled required type="text" id="insurer-name" name="fio_insurer"
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
                                        <input disabled required value="{{$page->policyHolders->address}}" type="text" id="insurer-address"
                                               name="address_insurer"
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
                                        <input disabled required value="{{$page->policyHolders->phone_number}}" type="text" id="insurer-tel"
                                               name="tel_insurer"
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
                                        <input disabled required value="{{$page->policyHolders->checking_account}}" type="text" id="insurer-schet"
                                               name="checking_account"
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
                                        <input disabled required value="{{$page->policyHolders->inn}}" type="text" id="insurer-inn"
                                               name="inn_insurer"
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
                                        <input disabled required value="{{$page->policyHolders->mfo}}"  type="text" id="insurer-mfo" name="mfo_insurer"@if($errors->has('mfo_insurer'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <select disabled @if($errors->has('bank_insurer'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif id="insurer_bank" name="bank_insurer"
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
                                        <input disabled required value="{{$page->policyHolders->oked}}" type="text" id="oked" name="oked"
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
                                        <input disabled type="text" id="insurer-okonh"  name="okonx" value="{{$page->policyHolders->okonx}}" @if($errors->has('okonh'))
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
                                                    <label for="beneficiary-name" class="col-form-label">ФИО
                                                        выгодоприобретателя</label>
                                                    <input disabled required value="{{$page->policyBeneficiaries->FIO}}" type="text"
                                                           id="beneficiary-name" name="fio_beneficiary"
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
                                                    <input disabled required value="{{$page->policyBeneficiaries->address}}" type="text"
                                                           id="beneficiary-address"
                                                           name="address_beneficiary"
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
                                                    <input disabled required value="{{$page->policyBeneficiaries->phone_number}}" type="text"
                                                           id="beneficiary-tel" name="tel_beneficiary"
                                                           @if($errors->has('phone_number'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                    <input disabled required value="{{$page->policyBeneficiaries->checking_account}}" type="text" id="beneficiary_schet"
                                                           name="beneficiary_schet"
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
                                                    <input disabled required value="{{$page->policyBeneficiaries->inn}}" type="number" id="inn_beneficiary"
                                                           name="inn_beneficiary"
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
                                                    <input disabled required value="{{$page->policyBeneficiaries->mfo}}" type="text" id="mfo_beneficiary"
                                                           name="mfo_beneficiary"
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
                                                    <select disabled @if($errors->has('bank_beneficiary'))
                                                            class="form-control is-invalid"
                                                            @else
                                                            class="form-control"
                                                            @endif id="bank_beneficiary" name="bank_beneficiary"
                                                            style="width: 100%;" required>
                                                        <option>Выберите банк</option>
                                                        @foreach($banks as $bank)
                                                            @if($page->policyBeneficiaries->bank_id == $bank->id)
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
                                                    <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                                    <input disabled required value="{{$page->policyBeneficiaries->oked}}" type="text" id="oked_beneficiary"
                                                           name="oked_beneficiary"
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
                                                    <input disabled type="text" value="{{$page->policyBeneficiaries->okonx}}" id="beneficiary-okonh" name="okonx_beneficiary" required class="form-control">
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor_num" class="col-form-label">Номер договора</label>
                                    <input disabled type="text" id="dogovor_num" name="unique_number" value="{{$page->unique_number}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="dogovor_date" class="col-form-label">Дата договора</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input disabled id="dogovor_date" name="insurance_from" value="{{$page->insurance_from}}" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor-strah-vigod-num" class="col-form-label">Номер договора между страхователем и выгодоприобритателем</label>
                                    <input disabled required type="text" id="dogovor-lizing-num" name="nomer_dogovor_strah_vigod" value="{{$page->nomer_dogovor_strah_vigod}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="dogovor-strah-vigod-date" class="col-form-label">Дата договора между страхователем и выгодоприобритателем</label>
                                    <input disabled required type="date" id="dogovor-lizing-date" name="date_dogovor_strah_vigod" value="{{$page->date_dogovor_strah_vigod}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="period_date" class="col-form-label">Период страхования</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input disabled required id="period_date" name="object_from_date" value="{{$page->object_from_date}}" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="period_date" class="col-form-label">Период страхования</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">до</span>
                                    </div>
                                    <input disabled required id="period_date" name="object_to_date" value="{{$page->object_to_date}}" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="osnovanie_otsenki" class="col-form-label">Основание для оценки</label>
                                    <input disabled required type="text" id="osnovanie_otsenki" name="ocenka_osnovaniya" value="{{$page->ocenka_osnovaniya}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="geo" class="col-form-label">Местонахождение</label>
                                    <input disabled required type="text" id="geo" name="location" value="{{$page->location}}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведения о имуществе</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" class="product-fields" data-field-number="0">
                                <table data-info-table="" class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Наименование Имущества</th>
                                        <th class="text-nowrap">Местонахождения имущества</th>
                                        <th class="text-nowrap">Дата выдачи</th>
                                        <th class="text-nowrap">Кол-во</th>
                                        <th class="text-nowrap">Единицы измерения</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($page->infos as $info)
                                        <tr id="{{$info->id}}">
                                            <td>
                                                <input disabled required type="text" class="form-control" name="name_property[]" value="{{$info->name_property}}">
                                            </td>
                                            <td>
                                                <input disabled required type="text" class="form-control" name="place_property[]" value="{{$info->place_property}}">
                                            </td>
                                            <td>
                                                <input disabled required type="date" class="form-control" name="date_of_issue_property[]" value="{{$info->date_of_issue_property}}">
                                            </td>
                                            <td>
                                                <input disabled required type="text" class="form-control" name="count_property[]" value="{{$info->count_property}}">
                                            </td>
                                            <td>
                                                <select disabled class="form-control polises" id="polises" name="units_property[]" style="width: 100%;">
                                                    <option selected="selected" value="1">Кв.м</option>
                                                    <option value="2">Кв.см</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input disabled required type="text" data-field="value" class="form-control" name="insurance_cost[]" value="{{$info->insurance_cost}}">
                                            </td>
                                            <td>
                                                <input disabled required type="text" data-field="sum" class="form-control" name="insurance_sum[]" value="{{$info->insurance_sum}}">
                                            </td>
                                            <td>
                                                <input disabled required type="text" data-field="premiya" class="form-control" name="insurance_premium[]" value="{{$info->insurance_premium}}">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td colspan="5" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td><input disabled required readonly data-insurance-stoimost type="text" class="form-control overall-sum" /></td>
                                        <td><input disabled required readonly data-insurance-sum type="text" class="form-control overall-sum4" /></td>
                                        <td><input disabled required readonly data-insurance-award type="text" class="form-control overall-sum3" /></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие пожарной сигнализации и средств пожаротушения</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input disabled onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')" type="radio" class="other_insurance-0" name="fire_alarm_file"  @if($page->fire_alarm_file) checked @endif id="radioSuccess1">
                                                <label for="radioSuccess1">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input disabled onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)" type="radio" class="other_insurance-0" name="fire_alarm_file" @if($page->fire_alarm_file == null) checked @endif id="radioSuccess2" value="0">
                                                <label for="radioSuccess2">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess2="" @if(!$page->fire_alarm_file) style="display: none;" @endif class="form-group other_insurance_info-0">
                                    <label>Прикрепите сертификат</label>
                                    @if($page->fire_alarm_file)  <a href="/storage/{{$page->fire_alarm_file}}">Скачать</a> @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Наличие охранной сигнализации и средств защиты/охраны</label>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input disabled onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')" type="radio" class="other_insurance-0" @if($page->security_file) checked @endif name="security_file" id="radioSuccess1-0" >
                                                <label for="radioSuccess1-0">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input disabled onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)" type="radio" class="other_insurance-0" @if($page->security_file == null) checked @endif name="security_file"   id="radioSuccess2-0">
                                                <label for="radioSuccess2-0">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess1="" @if(!$page->security_file) style="display: none;" @endif class="form-group other_insurance_info">
                                    <label>Прикрепите сертификат</label>
                                    @if($page->fire_alarm_file)<a href="/storage/{{$page->security_file}}">Скачать</a> @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Франшиза</h3>
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
                                        <label for="summ-1">% от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                        <input disabled required type="text" id="summ-1" name="franshize_percent_1" class="form-control" value="{{$page->franshize_percent_1}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="summ-2">% от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая</label>
                                        <input disabled required type="text" id="summ-2" name="franshize_percent_2" class="form-control" value="{{$page->franshize_percent_2}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">% от страховой суммы по другим рискам по каждому <br> убытку и/или по всем убыткам в результате каждого <br> страхового случая</label>
                                        <input disabled required type="text" id="geographic-zone" name="franshize_percent_3" class="form-control" value="{{$page->franshize_percent_3}}">
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
                    <div class="card-body">
                        <div id="payment-terms-form">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input disabled type="text" id="all-summ" name="insurance_sum_prod" class="form-control" value="{{$page->insurance_sum}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input disabled type="text" id="all-summ" name="insurance_bonus" class="form-control" value="{{$page->insurance_bonus}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input disabled type="text" id="all-summ" name="franchise" class="form-control" value="{{$page->franchise}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select disabled class="form-control" id="walletNames" style="width: 100%; text-align: center">

                                            <option @if($page->insurance_premium_currency) selected @endif name="insurance_premium_currency">UZS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select disabled id="condition" class="form-control payment-schedule" name="payment_term" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->payment_term === '1') selected @endif>Единовременно</option>
                                            <option value="transh" @if($page->payment_term === 'transh') selected @endif>Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select disabled class="form-control payment-schedule" name="sposob_rascheta" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1" @if($page->sposob_rascheta === '1') selected @endif>Сумах</option>
                                            <option value="2" @if($page->sposob_rascheta === '2') selected @endif>Сумах В ин. валюте</option>
                                            <option value="3" @if($page->sposob_rascheta === '3') selected @endif>В ин. валюте по курсу ЦБ на день заключение
                                                договора
                                            </option>
                                            <option value="4" @if($page->sposob_rascheta === '4') selected @endif>В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="4" @if($page->sposob_rascheta === '5') selected @endif>В ин. валюте по фиксированному ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule" @if(!$page->payment_term === 'transh')class="d-none" @endif>
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
                                        @foreach($page->strahPremiya as $prem)
                                            <tr id="{{$prem->id}}" data-field-number="0">
                                                <td><input disabled type="text" class="form-control" name="payment_sum[]" value="{{$prem->payment_sum}}"></td>
                                                <td><input disabled type="date" class="form-control" name="payment_from[]" value="{{$prem->payment_from}}">
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input disabled onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="tarif" id="tarif" @if($page->tarif_other) checked @endif>
                                    <label class="form-check-label" for="tarif">Тариф</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-tarif-descr @if(!$page->tarif_other) style="display: none" @endif>
                                    <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                    <input disabled class="form-control" id="descrTarif" type="number" name="tarif_other" value="{{$page->tarif_other}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="icheck-success ">
                                    <input disabled onchange="toggleBlock('preim', 'data-preim-descr')" class="form-check-input client-type-radio" type="checkbox" name="preim" id="preim" @if($page->premiya_other) checked @endif>
                                    <label class="form-check-label" for="preim">Премия</label>
                                </div>
                                <!-- TODO: Блок должен находится в скрытом состоянии
                                отображаться только тогда, когда выбран checkbox "Тариф"
                                -->
                                <div class="form-group" data-preim-descr @if(!$page->premiya_other) style="display: none" @endif>
                                    <label for="descrPreim" class="col-form-label">Укажите процент премии</label>
                                    <input disabled class="form-control" id="descrPreim" type="number" name="premiya_other" value="{{$page->premiya_other}}">
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
                                    @if($page->application_form_file)<a href="/storage/{{$page->application_form_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Анкета</label>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->contract_file)<a href="/storage/{{$page->contract_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if($page->policy_file)<a href="/storage/{{$page->policy_file}}" target="_blank">Скачать</a> @endif
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Копии документов</h3>
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
                                        @if($page->passport_copy)<a href="/storage/{{$page->passport_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Паспорт</label>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($page->dogovor_copy)<a href="/storage/{{$page->dogovor_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Договор</label>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($page->spravka_copy)<a href="/storage/{{$page->spravka_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Справки</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($page->other_copy)<a href="/storage/{{$page->other_copy}}" target="_blank">Скачать</a> @endif
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Другие</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>


@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
