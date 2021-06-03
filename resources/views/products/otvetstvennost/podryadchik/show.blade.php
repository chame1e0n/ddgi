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
                                                    <input readonly id="from_date" name="from_date" type="date"
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
                                                    <input readonly id="to_date" name="to_date" type="date"
                                                           class="form-control" value="{{$podryadchik->to_date}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="geographic-zone">Географическая зона:</label>
                                        <input readonly type="text" id="geo_zone" name="geo_zone"
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
                                        <select readonly disabled class="form-control" id="walletNames"
                                                style="width: 100%; text-align: center" name="insurance_premium_currency">
                                            <option selected="selected" value="{{$podryadchik->currencies}}">{{$podryadchik->currencies}}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select readonly class="form-control payment-schedule" name="payment_term"
                                                onchange="showDiv('other-payment-schedule', this)"
                                                style="width: 100%; text-align: center">
                                            <option value="1" @if($podryadchik->payment_term == 1) selected @endif>Единовременно</option>
                                            <option value="other" @if($podryadchik->payment_term == 'other') selected @endif>Другое</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="other-payment-schedule" style="display: block;">
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
                                        @if(!$podryadchik->strahPremiya)
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input readonly type="text" class="form-control" name="payment_sum[]">
                                                </td>
                                                <td><input readonly type="date" class="form-control" name="payment_from[]">
                                                </td>
                                            </tr>
                                        @else
                                            @foreach($podryadchik->strahPremiya as $premiya)
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
                                        <input readonly type="text" id="strahovaya_sum" name="strahovaya_sum" class="form-control" value="{{$podryadchik->strahovaya_sum}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input readonly type="text" id="strahovaya_purpose" name="strahovaya_purpose"
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
                                                <input readonly type="text" id="serial_number_policy" name="serial_number_policy" class="form-control"  value="{{$podryadchik->policySeries->code ?? '-'}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input readonly id="date_issue_policy" name="date_issue_policy" type="date" class="form-control" value="{{$podryadchik->date_issue_policy}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso">Ответственное лицо</label>
                                                <select readonly disabled @if($errors->has('litso'))
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
            </section>
        </div>



@endsection
