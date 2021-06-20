@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-autozalog3x.store')}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
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

                    @include('includes.beneficiary')
                </div>


                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dogovor-num-strah" class="col-form-label">Номер договора
                                                страхования</label>
                                            <input type="text" id="unique_number" name="unique_number" class="form-control @if($errors->has('unique_number')) is-invalid @endif" value="{{old('unique_number')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="date_dogovor_strah" class="col-form-label">Дата договора
                                                страхования</label>
                                            <input id="dogovor_zalog_date_to" name="insurence_from" type="date" value="{{old('insurence_from')}}"
                                                   class="form-control @if($errors->has('insurence_from')) is-invalid @endif">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="dogovor-num" class="col-form-label">Номер кредитного
                                                договора</label>
                                            <input id="loan_reason" name="credit_dogovor_number" type="text"
                                                   class="form-control @if($errors->has('credit_dogovor_number')) is-invalid @endif" value="{{old('credit_dogovor_number')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_kredit_dogovor_from">Период кредитного договора</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="credit_insurance_from" name="credit_insurance_from" type="date" value="{{old('credit_insurance_from')}}"
                                                       class="form-control @if($errors->has('credit_insurance_from')) is-invalid @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_kredit_dogovor_to">Период кредитного договора</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="credit_insurance_to" name="credit_insurance_to" type="date" value="{{old('credit_insurance_to')}}"
                                                       class="form-control @if($errors->has('credit_insurance_to')) is-invalid @endif">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_strah_from">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                </div>
                                                <input id="object_from_date" name="object_from_date" type="date"
                                                       class="form-control @if($errors->has('object_from_date')) is-invalid @endif" value="{{old('object_from_date')}}">
                            </div>
                        </div>
                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_strah_to">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                </div>
                                                <input id="object_to_date" name="object_to_date" type="date"
                                                       class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{old('object_to_date')}}">
                                            </div>
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
                                        <th class="text-nowrap">Период действия от</th>
                                        <th class="text-nowrap">Период действия до</th>
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
                                    <tr id="a0">
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{old('policy_number.0')}}" name="policy_number[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('policy_series.0')) is-invalid @endif" value="{{old('policy_series.0')}}" name="policy_series[]">
                                        </td>
                                        <td>
                                            <input disabled="" type="date" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('god_vipuska.0')) is-invalid @endif" value="{{old('god_vipuska.0')}}" name="god_vipuska[]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control @if($errors->has('policy_insurance_from.0')) is-invalid @endif" value="{{old('policy_insurance_from.0')}}" name="policy_insurance_from[]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control @if($errors->has('policy_insurance_to.0')) is-invalid @endif" value="{{old('policy_insurance_to.0')}}" name="policy_insurance_to[]">
                                        </td>
                                        <td>
                                            <select class="form-control @if($errors->has('otvet_litso.0')) is-invalid @endif"  id="polise_agents" name="otvet_litso[]" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                <option value="{{$agent->user_id}}" selected="selected"> {{$agent->name}} {{$agent->surname}} {{$agent->middle_name}}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('marka.0')) is-invalid @endif" value="{{old('marka.0')}}" name="marka[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('model.0')) is-invalid @endif" value="{{old('model.0')}}" name="model[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('modification.0')) is-invalid @endif" value="{{old('modification.0')}}" name="modification[]">
                                        </td>


                                        <td>
                                            <input type="text" class="form-control @if($errors->has('gos_nomer.0')) is-invalid @endif" value="{{old('gos_nomer.0')}}" name="gos_nomer[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('tex_passport.0')) is-invalid @endif" value="{{old('tex_passport.0')}}" name="tex_passport[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('number_engine.0')) is-invalid @endif" value="{{old('number_engine.0')}}" name="number_engine[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('number_kuzov.0')) is-invalid @endif" value="{{old('number_kuzov.0')}}" name="number_kuzov[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control @if($errors->has('gryzopodemnost.0')) is-invalid @endif" value="{{old('gryzopodemnost.0')}}" name="gryzopodemnost[]">
                                        </td>
                                        <td>
                                            <input type="text" data-field="value" class="form-control @if($errors->has('strah_stoimost.0')) is-invalid @endif" value="{{old('strah_stoimost.0')}}" name="strah_stoimost[]">
                                        </td>
                                        <td>
                                            <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0 @if($errors->has('strah_sum.0')) is-invalid @endif" value="{{old('strah_sum.0')}}" name="strah_sum[]">
                                        </td>
                                        <td>
                                            <input type="text" data-field="premiya" class="form-control insurance_premium-0 @if($errors->has('strah_prem.0')) is-invalid @endif" value="{{old('strah_prem.0')}}" name="strah_prem[]">
                                        </td>
                                        <td>
                                            <input type="button" onclick="removeProductsFieldRow(0)" value="Удалить" class="btn btn-warning">
                                        </td>
                                    </tr></tbody>
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
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')"
                                                    type="radio" class="other_insurance-0" name="deffects"
                                                    id="radioSuccess1" value="1">
                                                <label for="radioSuccess1">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)"
                                                    type="radio" class="other_insurance-0" name="deffects"
                                                    id="radioSuccess2" value="0">
                                                <label for="radioSuccess2">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-radiosuccess2="" class="col-md-12" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group other_insurance_info-0">
                                            <label>Комментарий</label>
                                            <input class="form-control" type="text" name="deffects_comment">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group other_insurance_info-0">
                                            <label>Прикрепите фотографии</label>
                                            <input class="form-control" type="file" name="deffects_photo">
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
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')"
                                                    type="radio" class="other_insurance-0" name="strtahovka"
                                                    id="radioSuccess1-0" value="1">
                                                <label for="radioSuccess1-0">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)"
                                                    type="radio" class="other_insurance-0" name="strtahovka"
                                                    id="radioSuccess2-0" value="0">
                                                <label for="radioSuccess2-0">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-radiosuccess1="" class="form-group other_insurance_info"
                                     style="display: none;">
                                    <label for="strtahovka_info">Комментарий</label>
                                    <input id="strtahovka_info" class="form-control" type="text"
                                           name="strtahovka_info">
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
                                        <input type="text" id="all-summ" name="insurance_sum_prod" value="{{old('insurance_sum_prod')}}" @if($errors->has('insurance_sum_prod'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus" value="{{old('insurance_bonus')}}" @if($errors->has('insurance_bonus'))
                                        class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise" value="{{old('franchise')}}" @if($errors->has('franchise'))
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
    </form>
@endsection