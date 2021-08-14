@extends('layouts.index')

@section('content')
    <form method="POST" action="{{ route('rassrochka.store') }}" id="mainFormKasko"
          enctype="multipart/form-data">
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
                @include('includes.messages')

                @include('includes.contract')

                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    @include('includes.pledger')
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
                </div>
                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dogovor-lizing-num" class="col-form-label">Договор №</label>
                                                <input type="text" id="dogovor-lizing-num" name="dogovor_lizing_num"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label">Срок действия рассрочки</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="insurance_from" name="insurance_from" type="date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="geographic-zone">Сумма рассрочки</label>
                                            <input type="text" id="geographic-zone" name="geo_zone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Срок действия договора страхования</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="insurance_from" name="insurance_from" type="date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="polises">Валюта взаиморасчетов</label>
                                        <select class="form-control polises" id="polises" name="polis_series[]"
                                                style="width: 100%;">
                                            <option selected="selected">UZS</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведения о ТС</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" id="generalProductFieldsAddButton" class="btn btn-primary ">Добавить
                            </button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Номер полиса</th>
                                        <th class="text-nowrap">Год выпуска</th>
                                        <th class="text-nowrap">Дата выдачи</th>
                                        <th class="text-nowrap">Марка</th>
                                        <th class="text-nowrap">Модель</th>
                                        <th class="text-nowrap">Гос. номер</th>
                                        <th class="text-nowrap">Номер тех паспорта</th>
                                        <th class="text-nowrap">Номер двигателя</th>
                                        <th class="text-nowrap">Номер кузова</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr></tr>
                                    <tr>
                                        <td colspan="9" style="text-align: right"><label class="text-bold">Итого</label>
                                        </td>
                                        <td><input readonly data-insurance-stoimost type="text"
                                                   class="form-control overall-sum"/></td>
                                        <td><input readonly data-insurance-sum type="text"
                                                   class="form-control overall-sum4"/></td>
                                        <td><input readonly data-insurance-award type="text"
                                                   class="form-control overall-sum3"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="general-product-fields">
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
                            <div>
                                <label>Утрата (Гибель) или повреждение ТС</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Страховая сумма</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Тариф</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Страховая премия</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Франшиза</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label>Риск невозврата кредита</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Страховая сумма</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Тариф</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Страховая премия</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Франшиза</label>
                                                <input type="text" class="form-control">
                                            </div>
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
                            <h3 class="card-title">Франшиза</h3>
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
                                    <div class="form-group">
                                        <label for="summ-1">% от страховой суммы по риску землетрясения и пожара по
                                            каждому убытку и/или по всем убыткам в результате каждого страхового
                                            случая</label>
                                        <input type="text" id="summ-1" name="geo_zone" class="form-control">
                                        <input type="text" id="zalog-address" name="address_zalog"
                                               value="{{old('address_zalog')}}" @if($errors->has('address_zalog'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="summ-2">% от страховой суммы по риску противоправные действия
                                            третьих лиц по каждому убытку и/или по всем убыткам в результате каждого
                                            страхового случая</label>
                                        <input type="text" id="summ-2" name="geo_zone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">% от страховой суммы по другим рискам по каждому
                                            <br> убытку и/или по всем убыткам в результате каждого <br> страхового
                                            случая</label>
                                        <input type="text" id="geographic-zone" name="geo_zone" class="form-control">
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="polis_name" class="col-form-label">Наименование</label>
                                            <select @if($errors->has('polis_name'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="polis_name"
                                                    name="polis_name"
                                                    style="width: 100%;" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="policy_id" class="col-form-label">Серийный номер</label>
                                            <select @if($errors->has('policy_id'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="policy_id"
                                                    name="policy_id"
                                                    style="width: 100%;" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="data_vidachi" name="data_vidachi" type="date"
                                                   value="{{old('data_vidachi')}}"
                                                   @if($errors->has('data_vidachi'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet_litso">Ответственное лицо</label>
                                            <select @if($errors->has('otvet_litso'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="otvet_litso" name="otvet_litso"
                                                    style="width: 100%;" required>
                                                <option></option>
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
        </div>
    </form>

@endsection
