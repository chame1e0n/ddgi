@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('tamojenniy-sklad.store') }}" id="mainFormKasko">
        @csrf
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
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
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"><a href="/all_products">Продукты</a></li>
                                <li class="breadcrumb-item active">Создать Продукт</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                @include('products.select')
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
                                        <input value="{{old('fio_insurer')}}" type="text"
                                            id="insurer-name"
                                               name="fio_insurer"
                                               @if($errors->has('fio_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required="required">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Юр адрес
                                            страхователя</label>
                                        <input value="{{old('address_insurer')}}" type="text" id="insurer-address"
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
                                        <input value="{{old('tel_insurer')}}" type="text" id="insurer-tel"
                                               name="tel_insurer"
                                               @if($errors->has('tel_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input value="{{old('address_schet')}}" type="text" id="insurer-schet"
                                               name="address_schet"
                                               @if($errors->has('address_schet'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input value="{{old('inn_insurer')}}" type="text" id="insurer-inn"
                                               name="inn_insurer"
                                               @if($errors->has('inn_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input value="{{old('mfo_insurer')}}" type="text" id="insurer-mfo"
                                               name="mfo_insurer"
                                               @if($errors->has('mfo_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
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
                                            <option></option>
                                            @foreach($banks as $bank)
                                                @if(old('bank_insurer') == $bank->id)
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
                                        <input value="{{old('okonh_insurer')}}" type="text" id="insurer-okonh"
                                               name="okonh_insurer"
                                               @if($errors->has('okonh_insurer'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">ФИО
                                                        выгодоприобретателя</label>
                                                    <input value="{{old('fio_beneficiary')}}" type="text"
                                                           id="beneficiary-name" name="fio_beneficiary"
                                                           @if($errors->has('fio_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Юр адрес
                                                        выгодоприобретателя</label>
                                                    <input value="{{old('address_beneficiary')}}" type="text"
                                                           id="beneficiary-address"
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
                                                    <input value="{{old('tel_beneficiary')}}" type="text"
                                                           id="beneficiary-tel" name="tel_beneficiary"
                                                           @if($errors->has('tel_beneficiary'))
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
                                                    <input value="{{old('beneficiary_schet')}}" type="text"
                                                           id="beneficiary-schet" name="beneficiary_schet"
                                                           @if($errors->has('beneficiary_schet'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif  required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                    <input value="{{old('inn_beneficiary')}}" type="text"
                                                           id="beneficiary-inn" name="inn_beneficiary"
                                                           @if($errors->has('inn_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif  required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                    <input value="{{old('mfo_beneficiary')}}" type="text"
                                                           id="beneficiary-mfo" name="mfo_beneficiary"
                                                           @if($errors->has('mfo_beneficiary'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif  required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="insurer-bank" class="col-form-label">Банк</label>
                                                    <select @if($errors->has('bank_beneficiary'))
                                                            class="form-control is-invalid"
                                                            @else
                                                            class="form-control"
                                                            @endif id="insurer-bank"
                                                            name="bank_beneficiary"
                                                            style="width: 100%;" required>
                                                        <option></option>
                                                        @foreach($banks as $bank)
                                                            @if(old('bank_beneficiary') == $bank->id)
                                                                <option selected
                                                                        value="{{ $bank->id }}">{{ $bank->name }}</option>
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
                                                    <input value="{{old('okonh_beneficiary')}}" type="text"
                                                           id="beneficiary-okonh" name="okonh_beneficiary"
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
                    </div>
                </div>


                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Период страхования от</span>
                                        </div>
                                        <input value="{{old('insurance_from')}}" id="insurance_from"
                                               name="insurance_from" type="date"
                                               @if($errors->has('insurance_from'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif  required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Период страхования до</span>
                                        </div>
                                        <input value="{{old('insurance_to')}}" id="insurance_to" name="insurance_to"
                                               type="date" @if($errors->has('insurance_to'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="geographic-zone">Объём таможенной площади</label>
                                    <input value="{{old('volume')}}" type="text" id="geographic-zone" name="volume"
                                           @if($errors->has('volume'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="obem">Объем товара на складе</label>
                                    <select id="obem" class="form-control select2" name="volume_measure" required>
                                        @if(old('volume_measure'))
                                            <option value="{{old('volume_measure')}}">
                                                @if(old('volume_measure') == 'litr') литр  @endif
                                                @if(old('volume_measure') == 'tonna') тонна  @endif
                                                @if(old('volume_measure') == 'shtuka') штука  @endif
                                            </option>
                                        @endif
                                        <option value="litr">литр</option>
                                        <option value="tonna">тонна</option>
                                        <option value="shtuka">штука</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="summ-tovar">Общая стоимость товара на складе</label>
                                    <input value="{{old('total_price')}}" type="text" id="summ-tovar" name="total_price"
                                           @if($errors->has('total_price'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="period-sklad">Период нахождения товара на данном складе</label>
                                    <input value="{{old('stock_date')}}" id="period-sklad" name="stock_date" type="date"
                                           @if($errors->has('stock_date'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Общая страховая сумма</label>
                                        <input value="{{old('total_insured_price')}}" type="text" id="all-summ"
                                               name="total_insured_price"
                                               @if($errors->has('total_insured_price'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                                @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="summ-1">Страховая сумма для закрытого склада с общим объемом</label>
                                        <input value="{{old('total_insured_closed_stock_price')}}" type="text"
                                               id="summ-1" name="total_insured_closed_stock_price"
                                               @if($errors->has('total_insured_closed_stock_price'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                                @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="summ-2">Страховая сумма для открытого склада с общим
                                            площадью</label>
                                        <input value="{{old('total_insured_open_stock_price')}}" type="text" id="summ-2"
                                               name="total_insured_open_stock_price"
                                               @if($errors->has('total_insured_open_stock_price'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                                @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input value="{{old('insurance_premium')}}" type="text" id="geographic-zone"
                                               name="insurance_premium"
                                               @if($errors->has('insurance_premium'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                                @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="polises">Валюта взаиморасчетов</label>
                                    <select class="form-control polises" id="polises" name="settlement_currency"
                                            style="width: 100%;">
                                        <option selected="selected">UZS</option>
                                    </select>
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
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select name="insurance_premium_payment_type" class="form-control"
                                                style="width: 100%; text-align: center">
                                            @if(old('insurance_premium_payment_type'))
                                                <option value="{{old('insurance_premium_payment_type')}}">
                                                    @if(old('insurance_premium_payment_type') == 1) Сумах  @endif
                                                    @if(old('insurance_premium_payment_type') == 2) В ин. валюте  @endif
                                                    @if(old('insurance_premium_payment_type') == 3) В ин. валюте по
                                                    курсу ЦБ на день заключение договора  @endif
                                                    @if(old('insurance_premium_payment_type') == 4) В ин. валюте по
                                                    курсу ЦБ на день оплаты  @endif
                                                    @if(old('insurance_premium_payment_type') == 5) В ин. валюте по фикс
                                                    курсу ЦБ на день оплаты
                                                    премии/первого транша @endif
                                                </option>
                                            @endif
                                            <option value="1">Сумах</option>
                                            <option value="2">В ин. валюте</option>
                                            <option value="3">В ин. валюте по курсу ЦБ на день заключение договора
                                            </option>
                                            <option value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="5">В ин. валюте по фикс курсу ЦБ на день оплаты
                                                премии/первого транша
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Валюта взаиморасчетов</label>
                                        <select class="form-control" name="insurance_premium_currency" id="walletNames"
                                                style="width: 100%; text-align: center">
                                            <option>UZS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                            <div id="other-payment-schedule" style="display: none;">
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
                                            <td><input type="text" class="form-control" name="payment_sum-0-0"></td>
                                            <td><input type="date" class="form-control" name="payment_from-0-0"></td>
                                        </tr>
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
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <select class="form-control polises" id="polis-series"
                                                    name="policy_series_id"
                                                    style="width: 100%;" required>
                                                <option value="0"></option>
                                                @foreach($policySeries as $series)
                                                    <option @if(old('policy_series_id') == $series->id) selected
                                                            @endif value="{{ $series->id }}">{{ $series->code }}</option>
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
                                            <input value="{{old('from_date_info')}}" id="insurance_from"
                                                   name="from_date_info" type="date"
                                                   @if($errors->has('from_date_info'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
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
                                                    <option @if(old('litso') == $agent->user_id) selected
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
            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
    </form>

@endsection