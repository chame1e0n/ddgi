@extends('layouts.index')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('otvetstvennost-podryadchik.update', $podryadchik->id)}}" method="POST" id="mainFormKasko">
        @method('PUT')
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
                                <li class="breadcrumb-item active"><a href="/allproducts">Продукты</a></li>
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
                                    @if($podryadchik->type == 0)
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio"
                                                       id="client-type-radio-1" value="individual" checked>
                                                <label for="client-type-radio-1">физ. лицо</label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-sm-4">
                                            <div class="icheck-success">
                                                <input type="radio" class="client-type-radio"
                                                       id="client-type-radio-2" value="legal" checked>
                                                <label for="client-type-radio-2" >юр. лицо</label>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-id">Вид продукта</label>
                                <select id="product-id" class="form-control select2"
                                        style="width: 100%;" readonly="true">
                                    <option value="1">{{ $podryadchik->product->name }}</option>
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
                                        <input type="text" id="insurer-name" name="fio_insurer"
                                               value="{{$podryadchik->policyHolders->FIO}}" @if($errors->has('fio_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес
                                            страхователя</label>
                                        <input value="{{$podryadchik->policyHolders->address}}" type="text" id="insurer-address"
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
                                        <input value="{{$podryadchik->policyHolders->phone_number}}" type="text" id="insurer-tel"
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
                                        <input value="{{$podryadchik->policyHolders->checking_account}}" type="text" id="insurer-schet"
                                               name="address_schet"
                                               @if($errors->has('address_schet'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">Вид деятельности</label>
                                        <input type="text" id="vid_deyatelnosti" name="vid_deyatelnosti" value="{{$podryadchik->policyHolders->vid_deyatelnosti}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input value="{{$podryadchik->policyHolders->mfo}}"  type="text" id="insurer-mfo" name="mfo_insurer"@if($errors->has('mfo_insurer'))
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
                                                @endif id="insurer_bank" name="bank_insurer"
                                                style="width: 100%;" required>
                                            <option>Выберите банк</option>
                                            @foreach($banks as $bank)
                                                @if($podryadchik->policyHolders->bank_id == $bank->id)
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
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input value="{{$podryadchik->policyHolders->inn}}" type="text" id="insurer-inn"
                                               name="inn_insurer"
                                               @if($errors->has('inn_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif
                                        >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input value="{{$podryadchik->policyHolders->okonx}}" type="text" id="okonx" name="okonx"
                                               @if($errors->has('okonx'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input value="{{$podryadchik->policyHolders->oked}}" type="text" id="oked" name="oked"
                                               @if($errors->has('oked'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description" class="col-form-label">Информация о персонале
                                        </label>
                                        <textarea id="informaciya_o_personale" class="form-control" name="informaciya_o_personale" required>
                                            {{$podryadchik->informaciya_o_personale}}
                                        </textarea>
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
                                                    <input id="from_date" name="from_date" type="date"
                                                           class="form-control" value="{{$podryadchik->from_date}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="input-group mb-3" style="margin-top: 33px">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="to_date" name="to_date" type="date"
                                                           class="form-control" value="{{$podryadchik->to_date}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="geographic-zone">Географическая зона:</label>
                                        <input type="text" id="geo_zone" name="geo_zone"
                                               class="form-control" value="{{$podryadchik->geo_zone}}">
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
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames"
                                                style="width: 100%; text-align: center" name="insurance_premium_currency">
                                            <option selected="selected" value="{{$podryadchik->currencies}}">{{$podryadchik->currencies}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select class="form-control payment-schedule" name="payment_term"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option value="1" @if($podryadchik->payment_term == 1) selected @endif>Единовременно</option>
                                            <option value="other" @if($podryadchik->payment_term == 'other') selected @endif>Другое</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select name="insurance_premium_payment_type" class="form-control"
                                                style="width: 100%; text-align: center">
                                            <option @if($podryadchik->insurance_premium_payment_type == 1)selected @endif value="1">Сумах</option>
                                            <option @if($podryadchik->insurance_premium_payment_type == 2)selected @endif value="2">В ин. валюте</option>
                                            <option @if($podryadchik->insurance_premium_payment_type == 3)selected @endif value="3">В ин. валюте по курсу ЦБ на день заключение договора</option>
                                            <option @if($podryadchik->insurance_premium_payment_type == 4)selected @endif value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option @if($podryadchik->insurance_premium_payment_type == 5)selected @endif value="5">В ин. валюте по фикс курсу ЦБ на день оплаты премии/первого транша </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="other-payment-schedule" @if($podryadchik->payment_term == 1) style="display: none;" @else style="display: block;" @endif>
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
                                        @if(!$podryadchik->strahPremiya ?? $podryadchik->payment_term == 'other')
                                        <tr id="payment-term-tr-0" data-field-number="0">
                                            <td><input type="text" class="form-control" name="payment_sum[]">
                                            </td>
                                            <td><input type="date" class="form-control" name="payment_from[]">
                                            </td>
                                        </tr>
                                            @else
                                            @foreach($podryadchik->strahPremiya as $premiya)
                                                <tr id="payment-term-tr-0" data-field-number="0">
                                                    <td><input type="text" class="form-control" name="payment_sum[{{$premiya->id}}]" value="{{$premiya->prem_sum}}">
                                                    </td>
                                                    <td><input type="date" class="form-control" name="payment_from[{{$premiya->id}}]" value="{{$premiya->prem_from}}">
                                                    </td>
                                                </tr>
                                                @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Уникальные номера</h3>
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
                                    <div class="col-sm-6">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Номер договора</label>
                                            <input value="{{$podryadchik->unique_number}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Серия полиса</label>
                                            <input value="{{$podryadchik->policySeries->code ?? '-'}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-inline justify-content-between">
                                            <label>Номер полиса</label>
                                            <input value="{{$podryadchik->policy->number}}" readonly>
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
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input type="text" id="strahovaya_sum" name="strahovaya_sum" class="form-control" value="{{$podryadchik->strahovaya_sum}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input type="text" id="strahovaya_purpose" name="strahovaya_purpose"
                                               class="form-control"  value="{{$podryadchik->strahovaya_purpose}}">
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
                                                <select type="text" id="serial_number_policy" name="serial_number_policy" class="form-control">
                                                <option value="0"></option>
                                                @foreach($policySeries as $series)
                                                    <option value="{{ $series->id }}" @if($series->id == $podryadchik->serial_number_policy) selected @endif>{{ $series->code }}</option>
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
                                                <input id="date_issue_policy" name="date_issue_policy" type="date" class="form-control" value="{{$podryadchik->date_issue_policy}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso">Ответственное лицо</label>
                                                <select @if($errors->has('litso'))
                                                        class="form-control is-invalid"
                                                        @else
                                                        class="form-control"
                                                        @endif id="otvet-litso" name="litso"
                                                        style="width: 100%;" required>
                                                    <option></option>
                                                    @foreach($agents as $agent)
                                                        <option @if($podryadchik->otvet_litso == $agent->user_id) selected
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
                </div>
        </div>

        </section>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
        </div>
    </form>
@endsection
