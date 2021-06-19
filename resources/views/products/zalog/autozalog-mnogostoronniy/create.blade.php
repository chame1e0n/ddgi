@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('zalog-autozalog-mnogostoronniy.store')}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
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
                @include('includes.messages')

                @include('includes.contract')

                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Залогодатель</h3>
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
                                            <label for="beneficiary-name" class="col-form-label">Наименования
                                                залогодателя</label>
                                            <input type="text" id="fio_zalog" name="fio_zalog"
                                                   class="form-control
                                                    @if($errors->has('fio_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('fio_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес
                                                залогодателя</label>
                                            <input type="text" id="beneficiary-address"
                                                   name="address_zalog" class="form-control
                                                    @if($errors->has('address_zalog'))
                                                is-invalid
                                                    @endif" value="{{old('address_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="phone_zalog" name="phone_zalog"
                                                   class="form-control
                                                    @if($errors->has('phone_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('phone_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                счет</label>
                                            <input type="text" id="checking_account_zalog" name="checking_account_zalog"
                                                   class="form-control
                                                    @if($errors->has('checking_account_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('checking_account_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="inn_zalog" name="inn_zalog"
                                                   class="form-control
                                                    @if($errors->has('inn_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('inn_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="mfo_zalog" name="mfo_zalog"
                                                   class="form-control
                                                    @if($errors->has('mfo_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('mfo_zalog')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-bank" class="col-form-label">Банк</label>
                                            <select @if($errors->has('bank_id_zalog'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="bank_id_zalog" name="bank_id_zalog"
                                                    style="width: 100%;" required>
                                                <option>Выберите банк</option>
                                                @foreach(\App\Model\Bank::all() as $bank)
                                                    @if(old('bank_id_zalog') == $bank->id)
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
                                            <input type="text" id="oked_zalog" name="oked_zalog"
                                                   class="form-control
                                                    @if($errors->has('mfo_zalog'))
                                                       is-invalid
                                                        @endif" value="{{old('oked_zalog')}}">
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
                                            <label for="dogovor-num-strah" class="col-form-label">Номер договора
                                                страхования</label>
                                            <input type="text" id="unique_number" name="unique_number" class="form-control @if($errors->has('unique_number')) is-invalid @endif" value="{{old('unique_number')}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="date_dogovor_strah" class="col-form-label">Дата договора
                                                страхования</label>
                                            <input id="dogovor_zalog_date_to" name="insurance_from" type="date" value="{{old('insurance_from')}}"
                                                   class="form-control @if($errors->has('insurance_from')) is-invalid @endif">
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
                                <div class="form-group">
                                    <label for="geographic-zone">Географическая зона:</label>
                                    <input id="loan_reason" name="geo_zone" type="text"
                                           class="form-control @if($errors->has('geo_zone')) is-invalid @endif" value="{{old('geo_zone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="tsel_tc">Цель использования ТС:</label>
                                    <input id="loan_reason" name="loan_reason" type="text"
                                           class="form-control @if($errors->has('loan_reason')) is-invalid @endif" value="{{old('loan_reason')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведение о тс</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
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
                                                <input type="text" class="form-control @if($errors->has('object_to_date')) is-invalid @endif" value="{{old('policy_number.0')}}" name="policy_number[]" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('policy_series.0')) is-invalid @endif" value="{{old('policy_series.0')}}" name="policy_series[]" required>
                                            </td>
                                            <td>
                                                <input disabled="" type="date" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('god_vipuska.0')) is-invalid @endif" value="{{old('god_vipuska.0')}}" name="god_vipuska[]" required>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control @if($errors->has('policy_insurance_from.0')) is-invalid @endif" value="{{old('policy_insurance_from.0')}}" name="policy_insurance_from[]" required>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control @if($errors->has('policy_insurance_to.0')) is-invalid @endif" value="{{old('policy_insurance_to.0')}}" name="policy_insurance_to[]" required>
                                            </td>
                                            <td>
                                                <select class="form-control @if($errors->has('otvet_litso.0')) is-invalid @endif"  id="polise_agents" name="otvet_litso[]" style="width: 100%;" required>
                                                    @foreach($agents as $agent)
                                                        <option value="{{$agent->user_id}}" selected="selected"> {{$agent->name}} {{$agent->surname}} {{$agent->middle_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('marka.0')) is-invalid @endif" value="{{old('marka.0')}}" name="marka[]" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('model.0')) is-invalid @endif" value="{{old('model.0')}}" name="model[]" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('modification.0')) is-invalid @endif" value="{{old('modification.0')}}" name="modification[]" required>
                                            </td>


                                            <td>
                                                <input type="text" class="form-control @if($errors->has('gos_nomer.0')) is-invalid @endif" value="{{old('gos_nomer.0')}}" name="gos_nomer[]" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('tex_passport.0')) is-invalid @endif" value="{{old('tex_passport.0')}}" name="tex_passport[]" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('number_engine.0')) is-invalid @endif" value="{{old('number_engine.0')}}" name="number_engine[]" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('number_kuzov.0')) is-invalid @endif" value="{{old('number_kuzov.0')}}" name="number_kuzov[]" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control @if($errors->has('gryzopodemnost.0')) is-invalid @endif" value="{{old('gryzopodemnost.0')}}" name="gryzopodemnost[]" required>
                                            </td>
                                            <td>
                                                <input type="text" data-field="value" class="form-control @if($errors->has('strah_stoimost.0')) is-invalid @endif" value="{{old('strah_stoimost.0')}}" name="strah_stoimost[]" required>
                                            </td>
                                            <td>
                                                <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0 @if($errors->has('strah_sum.0')) is-invalid @endif" value="{{old('strah_sum.0')}}" name="strah_sum[]" required>
                                            </td>
                                            <td>
                                                <input type="text" data-field="premiya" class="form-control insurance_premium-0 @if($errors->has('strah_prem.0')) is-invalid @endif" value="{{old('strah_prem.0')}}" name="strah_prem[]" required>
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
                                                    <input @if(old('defect_image') || old('defect_comment')) checked @endif
                                                    onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2')"
                                                           type="radio" class="other_insurance-0" name="deffects"
                                                           id="radioSuccess1" value="1">
                                                    <label for="radioSuccess1">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input
                                                        onchange="toggleBlockRadio('radioSuccess1', 'data-radioSuccess2', false)"
                                                        type="radio" class="other_insurance-0" name="deffects"
                                                        id="radioSuccess2" value="0" @if(!old('defect_image') && !old('defect_comment')) checked @endif >
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
                                                <input class="form-control @if($errors->has('defect_comment')) is-invalid @endif" type="text" name="defect_comment"
                                                       value="{{old('defect_comment')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group other_insurance_info-0">
                                                <label>Прикрепите фотографии</label>
                                                <input id="defect_image" name="defect_image"
                                                       value="{{old('defect_image')}}"
                                                       type="file" @if($errors->has('defect_image'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
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
                                                    <input @if(old('strtahovka_comment')) checked @endif
                                                    onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1')"
                                                           type="radio" class="other_insurance-0" name="strtahovka"
                                                           id="radioSuccess1-0" value="1">
                                                    <label for="radioSuccess1-0">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input
                                                        onchange="toggleBlockRadio('radioSuccess1-0', 'data-radioSuccess1', false)"
                                                        type="radio" class="other_insurance-0" name="strtahovka"
                                                        id="radioSuccess2-0" value="0" @if(!old('strtahovka_comment')) checked @endif>
                                                    <label for="radioSuccess2-0">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-radiosuccess1="" class="form-group other_insurance_info"
                                         style="display: none;">
                                        <label for="strtahovka_info">Комментарий</label>
                                        <input id="strtahovka_info" class="form-control @if($errors->has('strtahovka_comment')) is-invalid @endif" type="text"
                                               name="strtahovka_comment" value="{{old('strtahovka_comment')}}">
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
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input  id="anketa_img" name="application_form_file" value="{{old('application_form_file')}}"
                                                type="file" @if($errors->has('application_form_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input  id="dogovor_img" name="contract_file" value="{{old('contract_file')}}"
                                                type="file" @if($errors->has('contract_file'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input  id="polis_img" name="policy_file" value="{{old('policy_file')}}"
                                                type="file" @if($errors->has('policy_file'))
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
    </form>
@endsection
@section('scripts')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>
@endsection
