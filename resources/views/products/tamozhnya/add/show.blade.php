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
                                            <label for="beneficiary-name" class="col-form-label">Наименование выгодоприобретателя</label>
                                            <input readonly value="{{$tamozhnya->policyBeneficiaries->FIO}}" type="text" id="fio_beneficiary"
                                                   name="fio_beneficiary"
                                                   @if($errors->has('fio_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Юр адрес выгодоприобретателя</label>
                                            <input readonly value="{{$tamozhnya->policyBeneficiaries->address}}" type="text" id="address_beneficiary"
                                                   name="address_beneficiary"
                                                   @if($errors->has('address_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input readonly value="{{$tamozhnya->policyBeneficiaries->phone_number}}" type="text" id="tel_beneficiary"
                                                   name="tel_beneficiary"
                                                   @if($errors->has('tel_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                            <input readonly value="{{$tamozhnya->policyBeneficiaries->checking_account}}" type="text" id="beneficiary_schet"
                                                   name="beneficiary_schet"
                                                   @if($errors->has('beneficiary_schet'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input readonly value="{{$tamozhnya->policyBeneficiaries->inn}}" type="number" id="inn_beneficiary"
                                                   name="inn_beneficiary"
                                                   @if($errors->has('inn_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input readonly value="{{$tamozhnya->policyBeneficiaries->mfo}}" type="text" id="mfo_beneficiary"
                                                   name="mfo_beneficiary"
                                                   @if($errors->has('mfo_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-bank" class="col-form-label">Банк</label>
                                            <select @if($errors->has('bank_beneficiary'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="bank_beneficiary" name="bank_beneficiary"
                                                    style="width: 100%;" required>
                                                <option>Выберите банк</option>
                                                @foreach($banks as $bank)
                                                    @if($tamozhnya->policyBeneficiaries->bank_id == $bank->id)
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
                                            <input readonly value="{{$tamozhnya->policyBeneficiaries->oked}}" type="text" id="okonh_beneficiary"
                                                   name="okonh_beneficiary"
                                                   @if($errors->has('okonh_beneficiary'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
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
                                    <div class="col-sm-6">
                                        <label class="col-form-label">Период страхования</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input readonly value="{{$tamozhnya->from_date}}" type="date" id="from_date"
                                                   name="from_date"
                                                   @if($errors->has('from_date'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label">Период страхования</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input readonly value="{{$tamozhnya->to_date}}" type="date" id="to_date"
                                                       name="to_date"
                                                       @if($errors->has('to_date'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                       @endif required>
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="warehouse_volume" class="col-form-label">Объём площади склада</label>
                                    <input readonly value="{{$tamozhnya->warehouse_volume}}" type="text" id="warehouse_volume"
                                           name="warehouse_volume"
                                           @if($errors->has('warehouse_volume'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="geographic-zone">Объем товара:</label>
                                    <div class="input-group mb-4">
                                        <input readonly value="{{$tamozhnya->product_volume}}" type="number" id="product_volume"
                                               name="product_volume"
                                               @if($errors->has('product_volume'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif required>
                                        <div class="input-group-append">
                                            <select class="form-control success" name="product_volume_unit" style="width: 100%;">
                                                <option @if($tamozhnya->product_volume_unit == 'Литр') selected="selected" @endif value="Литр">Литр</option>
                                                <option @if($tamozhnya->product_volume_unit == 'Тонна') selected="selected" @endif value="Тонна">Тонна</option>
                                                <option @if($tamozhnya->product_volume_unit == 'Штука') selected="selected" @endif value="Штука">Штука</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_sum" class="col-form-label">Общая стоимость:</label>
                                    <input readonly value="{{$tamozhnya->total_sum}}" type="text" id="total_sum"
                                           name="total_sum"
                                           @if($errors->has('total_sum'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Период нахождения товара на складе</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input readonly value="{{$tamozhnya->na_sklade_from_date}}" type="date" id="na_sklade_from_date"
                                           name="na_sklade_from_date"
                                           @if($errors->has('na_sklade_from_date'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Период нахождения товара на складе</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>
                                        <input readonly value="{{$tamozhnya->na_sklade_to_date}}" type="date" id="na_sklade_to_date"
                                               name="na_sklade_to_date"
                                               @if($errors->has('na_sklade_to_date'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif required>
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
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" id="walletNames"
                                                style="width: 100%; text-align: center" name="insurance_premium_currency">
                                            <option selected="selected" value="{{$tamozhnya->currencies}}">{{$tamozhnya->currencies}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select class="form-control payment-schedule" name="payment_term"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option value="1" @if($tamozhnya->payment_term == 1) selected @endif>Единовременно</option>
                                            <option value="other" @if($tamozhnya->payment_term == 'other') selected @endif>Другое</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control sposob_rascheta" name="sposob_rascheta" style="width: 100%; text-align: center">
                                            @foreach(config('app.sposob_rascheta') as $key => $sposob)
                                                <option value="{{$key}}" @if($key == $tamozhnya->sposob_rascheta) selected @endif>{{$sposob}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input readonly id="strahovaya_sum" name="strahovaya_sum" value="{{$tamozhnya->strahovaya_sum}}"
                                               type="number" @if($errors->has('strahovaya_sum'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input readonly id="strahovaya_purpose" name="strahovaya_purpose" value="{{$tamozhnya->strahovaya_purpose}}"
                                               type="number" @if($errors->has('strahovaya_purpose'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Франшиза</label>
                                        <input readonly id="franshiza" name="franshiza" value="{{$tamozhnya->franshiza}}"
                                               type="text" @if($errors->has('franshiza'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                            </div>


                            <div id="other-payment-schedule" @if($tamozhnya->payment_term == 1) style="display: none;" @endif>
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
                                        @if(!$tamozhnya->strahPremiya)
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input readonly type="text" class="form-control" name="payment_sum[]">
                                                </td>
                                                <td><input readonly type="date" class="form-control" name="payment_from[]">
                                                </td>
                                            </tr>
                                        @else
                                            @foreach($tamozhnya->strahPremiya as $premiya)
                                                <tr id="payment-term-tr-0" data-field-number="0">
                                                    <td><input readonly type="text" class="form-control" name="payment_sum[{{$premiya->id}}]" value="{{$premiya->prem_sum}}">
                                                    </td>
                                                    <td><input readonly type="date" class="form-control" name="payment_from[{{$premiya->id}}]" value="{{$premiya->prem_from}}">
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
                                            <input readonly id="serial_number_policy" name="serial_number_policy" value="{{$tamozhnya->serial_number_policy}}"
                                                   type="text" @if($errors->has('serial_number_policy'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input readonly id="date_issue_policy" name="date_issue_policy" value="{{$tamozhnya->date_issue_policy}}"
                                                   type="date" @if($errors->has('date_issue_policy'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
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
                                                    <option @if($tamozhnya->otvet_litso == $agent->user_id) selected
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
                                        <img src="/storage/{{$tamozhnya->anketa_img}}" alt="Анкета">
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input readonly id="anketa_img" name="anketa_img" value="{{old('anketa_img')}}"
                                               type="file" @if($errors->has('anketa_img'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/{{$tamozhnya->dogovor_img}}" alt="Договор">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input readonly id="dogovor_img" name="dogovor_img" value="{{old('dogovor_img')}}"
                                               type="file" @if($errors->has('dogovor_img'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img src="/storage/{{$tamozhnya->polis_img}}" alt="Полис">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input readonly id="polis_img" name="polis_img" value="{{old('polis_img')}}"
                                               type="file" @if($errors->has('polis_img'))
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
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>

@endsection
