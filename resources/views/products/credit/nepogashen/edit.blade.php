@extends('layouts.index')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{--{{route('credit-nepogashen.update')}}--}}" id="mainFormKasko">
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
                @include('products.select')
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                                            <input type="text" id="insurer-name" name="fio_insurer"
                                                   value="{{$credit->policyHolders->FIO}}" @if($errors->has('fio_insurer'))
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
                                            <input value="{{$credit->policyHolders->address}}" type="text" id="insurer-address"
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
                                            <input value="{{$credit->policyHolders->phone_number}}" type="text" id="insurer-tel"
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
                                            <input value="{{$credit->policyHolders->checking_account}}" type="text" id="insurer-schet"
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
                                            <input value="{{$credit->policyHolders->inn}}" type="text" id="insurer-inn"
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
                                            <input value="{{$credit->policyHolders->mfo}}"  type="text" id="insurer-mfo" name="mfo_insurer"@if($errors->has('mfo_insurer'))
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
                                                    @if($credit->policyHolders->bank_id == $bank->id)
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
                                            <input value="{{$credit->policyHolders->okonx}}" type="text" id="insurer-okonh" name="okonh_insurer"
                                                   @if($errors->has('okonh_insurer'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card card-info" id="clone-beneficiary">
                                    <div class="card-header">
                                        <h3 class="card-title">Заемщик</h3>
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
                                                        <label for="insurer-name" class="col-form-label">ФИО/Наименования заемщика</label>
                                                        <input type="text" id="beneficiary-name" name="z_fio" class="form-control" value="{{$credit->zaemshik->z_fio}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-address" class="col-form-label">Адрес заемщика</label>
                                                        <input type="text" id="beneficiary-address" name="z_address" class="form-control" value="{{$credit->zaemshik->z_address}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                        <input type="text" id="beneficiary-tel" name="z_phone" class="form-control" value="{{$credit->zaemshik->z_phone}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-tel" class="col-form-label">Серия паспорта</label>
                                                        <input type="text" id="beneficiary-tel" name="passport_series" class="form-control" value="{{$credit->zaemshik->passport_series}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-tel" class="col-form-label">Номер паспорта</label>
                                                        <input type="text" id="beneficiary-tel" name="passport_number" class="form-control" value="{{$credit->zaemshik->passport_number}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-tel" class="col-form-label">Кем выдан</label>
                                                        <input type="text" id="beneficiary-tel" name="passport_issued" class="form-control" value="{{$credit->zaemshik->passport_issued}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Когда выдан</label>
                                                        <div class="input-group">
                                                            <input id="insurance_to" name="passport_when_issued" type="date" class="form-control" value="{{old('passport_when_issued')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                        <input type="text" id="beneficiary-schet" name="z_checking_account" class="form-control" value="{{old('z_checking_account')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                        <input type="text" id="beneficiary-inn" name="z_inn" class="form-control" value="{{old('z_inn')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                        <input type="text" id="beneficiary-mfo" name="z_mfo" class="form-control" value="{{old('z_mfo')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="z_bank_id" class="col-form-label">Банк</label>
                                                        <select @if($errors->has('z_bank_id'))
                                                                class="form-control is-invalid"
                                                                @else
                                                                class="form-control"
                                                                @endif id="z_bank_id" name="z_bank_id"
                                                                style="width: 100%;" required>
                                                            <option>Выберите банк</option>
                                                            @foreach($banks as $bank)
                                                                @if(old('z_bank_id') == $bank->id)
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
                                                        <input type="text" id="beneficiary-okonh" name="z_okonx" class="form-control" value="{{old('z_okonx')}}">
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
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="dogovor-lizing-num" class="col-form-label">Кредитный договор</label>
                                                    <input type="text" id="dogovor_credit_num" name="dogovor_credit_num" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Срок кредитования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="credit_from" name="credit_from" type="date" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Срок кредитования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="credit_to" name="credit_to" type="date" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Сумма кредита</label>
                                                <input type="text" id="credit_sum" name="credit_sum" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Цель получения кредита</label>
                                                <input type="text" id="credit_purpose" name="credit_purpose" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="col-form-label">Срок действия договора страхования</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="credit_validity_period" name="credit_validity_period" type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Другие формы обеспечения обязательств по кредитному договору</label>
                                                <input type="text" id="other_forms" name="other_forms" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Общая cтраховая сумма</label>
                                                    <input type="text" class="form-control" name="total_sum">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Общая страховая премия</label>
                                                    <input type="text" class="form-control" name="total_award">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="payment">Условия оплаты</label>
                                            <select class="form-control polises" id="payment_terms" name="payment_terms" style="width: 100%;">
                                                <option selected="selected" value="Единовременно">Единовременно</option>
                                            </select>
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
                                                <label for="polis-series" class="col-form-label">Серийный номер полиса страхования</label>
                                                <input type="text" id="polis-series" name="polis-series" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date" class="form-control">
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