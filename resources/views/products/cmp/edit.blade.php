@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('cmp.update', $product->id) }}" id="mainFormKasko">
        <div class="content-wrapper">
            @csrf
            @method('PUT')
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
                                    @if($product->type == 0)
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
                                    <option value="1">{{ $product->product->name }}</option>
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
                                @yield()
                                <div class="col-md-6">
                                    <label class="col-form-label">Период страхования</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>
                                        <input   id="insurance_from" name="insurance_from" type="date"
                                                 value="{{$product->insurance_from}}"
                                                class="form-control">
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
                                                   value="{{$product->insurance_to}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label class="col-form-label">Участники строительства</label>
                                        <div class="form-group mb-20">
                                            <button type="button" id="add-costruct-participant" class="btn btn-primary ">Добавить
                                            </button>
                                        </div>
                                        <div id="builders">
                                            <div class="form-group mb-20">
                                                <input type="text" name="сonstruct_participants" class="form-control">
                                            </div>
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
                                                           value="{{$product->object_info_dogov_stoy}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Объект
                                                        стриотельно-монтажных работ</label>
                                                    <input type="text" id="beneficiary-address" name="object_stroy_mont"
                                                           value="{{$product->object_stroy_mont}}"
                                                           class="form-control" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Расположение
                                                        объекта</label>
                                                    <input type="text" id="beneficiary-tel" name="object_location"
                                                           value="{{$product->object_location}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Страховая
                                                        стоимость</label>
                                                    <input type="text" id="beneficiary-schet"
                                                           name="object_insurance_sum"
                                                           value="{{$product->object_insurance_sum}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Период страхования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="object_from_date" type="date"
                                                           value="{{$product->object_from_date}}"
                                                           class="form-control" >
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
                                                               value="{{$product->object_to_date}}"
                                                               class="form-control"  >
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
                                                           value="{{$product->object_tel_povr}}"
                                                           class="form-control"  >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-bank" class="col-form-label">Материальный
                                                        ущерб</label>
                                                    <input type="text" id="beneficiary-bank" name="object_material"
                                                           value="{{$product->object_material}}"
                                                           class="form-control" >
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
                                                   value="{{$product->stroy_mont_sum}}"
                                                   class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Строительные</label>
                                            <input type="text" id="beneficiary-bank" name="stroy_sum"
                                                   value="{{$product->stroy_sum}}"
                                                   class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Оборудование</label>
                                            <input type="text" id="beneficiary-bank" name="obor_sum"
                                                   value="{{$product->obor_sum}}"
                                                   class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Стрительные машины и
                                                механизмы</label>
                                            <input type="text" id="beneficiary-bank" name="stroy_mash_sum"
                                                   value="{{$product->stroy_mash_sum}}"
                                                   class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Расходы по расчистке
                                                территории</label>
                                            <input type="text" id="beneficiary-bank" name="rasx_sum"
                                                   value="{{$product->rasx_sum}}"
                                                   class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Страховая премия</label>
                                            <input type="text" id="geographic-zone" name="insurance_prem_sum"
                                                   value="{{$product->insurance_prem_sum}}"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Франшиза</label>
                                            <input type="text" id="geographic-zone" name="franchise_sum"
                                                   value="{{$product->franchise_sum}}"
                                                   class="form-control">
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
                                                <option @if($product->insurance_premium_payment_type == 1)selected @endif value="1">Сумах</option>
                                                <option @if($product->insurance_premium_payment_type == 2)selected @endif value="2">В ин. валюте</option>
                                                <option @if($product->insurance_premium_payment_type == 3)selected @endif value="3">В ин. валюте по курсу ЦБ на день заключение договора</option>
                                                <option @if($product->insurance_premium_payment_type == 4)selected @endif value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                                <option @if($product->insurance_premium_payment_type == 5)selected @endif value="5">В ин. валюте по фикс курсу ЦБ на день оплаты премии/первого транша </option>
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
                                        <input value="{{$product->unique_number}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Серия полиса</label>
                                        <input value="{{$product->policySeries->code ?? '-'}}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Номер полиса</label>
                                        <input value="{{$product->policy->number}}" readonly>
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
                                                    <option value="{{ $series->id }}" @if($series->id == $product->policy_series_id) selected @endif>{{ $series->code }}</option>
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
                                                   value="{{ $product->polic_given_date }}"
                                                   class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="litso"
                                                    style="width: 100%;" required>
                                                <option></option>
                                                @foreach($agents as $agent)
                                                    <option
                                                            value="{{ $agent->user_id }}" @if($agent->user_id == $product->user_id) selected @endif>{{ $agent->surname }}{{ $agent->name }}{{ $agent->middle_name }}</option>
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