@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('cmp.store') }}" id="mainFormKasko">
        <div class="content-wrapper">
            @csrf
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
                                <li class="breadcrumb-item active"><a href="#">Продукт</a></li>
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
                                        <input type="text" id="insurer-name" name="fio_insurer"
                                               value="{{old('fio_insurer')}}" @if($errors->has('fio_insurer'))
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
                                                @endif >
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
                                                @endif >
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
                                        >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input value="{{old('mfo_insurer')}}"  type="text" id="insurer-mfo" name="mfo_insurer"@if($errors->has('mfo_insurer'))
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
                                        <input value="{{old('okonh_insurer')}}" type="text" id="insurer-okonh" name="okonh_insurer"
                                               @if($errors->has('okonh_insurer'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                                @endif >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Период страхования</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>
                                        <input   id="insurance_from" name="insurance_from" type="date"
                                                 value="{{old('insurance_from')}}"
                                                @if($errors->has('insurance_from'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                                @endif >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Период страхования</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="insurance_to" name="insurance_to" type="date"
                                                   value="{{old('insurance_to')}}"
                                                   @if($errors->has('insurance_to'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-info" id="clone-beneficiary">
                                <div class="card-header">
                                    <h3 class="card-title">Сведения об объекте</h3>
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
                                                    <label for="beneficiary-name" class="col-form-label">Сведения о
                                                        договоре строительного порядка</label>
                                                    <input type="text" id="beneficiary-name"
                                                           name="object_info_dogov_stoy"
                                                           value="{{old('object_info_dogov_stoy')}}"
                                                           @if($errors->has('object_info_dogov_stoy'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Объект
                                                        стриотельно-монтажных работ</label>
                                                    <input type="text" id="beneficiary-address" name="object_stroy_mont"
                                                           value="{{old('object_stroy_mont')}}"
                                                           @if($errors->has('object_stroy_mont'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Расположение
                                                        объекта</label>
                                                    <input type="text" id="beneficiary-tel" name="object_location"
                                                           value="{{old('object_location')}}"
                                                           @if($errors->has('object_location'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Страховая
                                                        стоимость</label>
                                                    <input type="text" id="beneficiary-schet"
                                                           name="object_insurance_sum"
                                                           value="{{old('object_insurance_sum')}}"
                                                           @if($errors->has('object_insurance_sum'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Период страхования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="object_from_date" type="date"
                                                           value="{{old('object_from_date')}}"
                                                           @if($errors->has('object_from_date'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Период страхования</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="insurance_to" name="object_to_date" type="date"
                                                               value="{{old('object_to_date')}}"
                                                               @if($errors->has('object_to_date'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                                @endif >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h3 class="card-title">Страхование ответственности</h3>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">Телесные
                                                        повреждения</label>
                                                    <input type="text" id="beneficiary-mfo" name="object_tel_povr"
                                                           value="{{old('object_tel_povr')}}"
                                                           @if($errors->has('object_tel_povr'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-bank" class="col-form-label">Материальный
                                                        ущерб</label>
                                                    <input type="text" id="beneficiary-bank" name="object_material"
                                                           value="{{old('object_material')}}"
                                                           @if($errors->has('object_material'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
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
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="card-title">Страховая сумма</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label ">Строительно
                                                монтажные</label>
                                            <input type="text" id="beneficiary-mfo" name="stroy_mont_sum"
                                                   value="{{old('stroy_mont_sum')}}"
                                                   @if($errors->has('stroy_mont_sum'))
                                                   class="form-control calc2 is-invalid"
                                                   @else
                                                   class="form-control calc2"
                                                   @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Строительные</label>
                                            <input type="text" id="beneficiary-bank" name="stroy_sum"
                                                   value="{{old('stroy_sum')}}"
                                                   @if($errors->has('stroy_sum'))
                                                   class="form-control calc3 is-invalid"
                                                   @else
                                                   class="form-control calc3"
                                                   @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Оборудование</label>
                                            <input type="text" id="beneficiary-bank" name="obor_sum"
                                                   value="{{old('obor_sum')}}"
                                                   @if($errors->has('obor_sum'))
                                                   class="form-control calc4 is-invalid"
                                                   @else
                                                   class="form-control calc4"
                                                   @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Стрительные машины и
                                                механизмы</label>
                                            <input type="text" id="beneficiary-bank" name="stroy_mash_sum"
                                                   value="{{old('stroy_mash_sum')}}"
                                                   @if($errors->has('stroy_mash_sum'))
                                                   class="form-control calc5 is-invalid"
                                                   @else
                                                   class="form-control calc5"
                                                   @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Расходы по расчистке
                                                территории</label>
                                            <input type="text" id="beneficiary-bank" name="rasx_sum"
                                                   value="{{old('rasx_sum')}}"
                                                   @if($errors->has('rasx_sum'))
                                                   class="form-control calc6 is-invalid"
                                                   @else
                                                   class="form-control calc6"
                                                   @endif >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Страховая премия</label>
                                            <input type="text" id="geographic-zone" name="insurance_prem_sum"
                                                   value="{{old('insurance_prem_sum')}}"
                                                   @if($errors->has('insurance_prem_sum'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Франшиза</label>
                                            <input type="text" id="geographic-zone" name="franchise_sum"
                                                   value="{{old('franchise_sum')}}"
                                                   @if($errors->has('franchise_sum'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="polises">Валюта взаиморасчетов</label>
                                        <select class="form-control" name="insurence_currency" id="walletNames"
                                                style="width: 100%; text-align: center">
                                            <option>UZS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="polises">Условия оплаты страховой премии</label>
                                        <select class="form-control payment-schedule" name="payment_term"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option value="1">Единовременно</option>
                                            <option value="other">Другое</option>
                                        </select>
                                    </div>
                                </div>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="geographic-zone">Общая страховая сумма</label>
                                            <input type="text" readonly id="geographic-zone"
                                                   class="form-control calcSumm">
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
                                            <input id="insurance_from" name="polic_given_date" type="date"
                                                   value="{{old('polic_given_date')}}"
                                                   @if($errors->has('polic_given_date'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif >
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