@extends('layouts.index')
@section('css')
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="GET" id="mainFormKasko">
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
                                        <label for="insurer-inn" class="col-form-label">Вид деятельности</label>
                                        <input type="text" id="vid_deyatelnosti" name="vid_deyatelnosti" value="{{old('vid_deyatelnosti')}}" class="form-control">
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
                                            <option>Выберите банк</option>
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input value="{{old('okonx')}}" type="text" id="okonx" name="okonx"
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
                                        <input value="{{old('oked')}}" type="text" id="oked" name="oked"
                                               @if($errors->has('oked'))
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
                                            <label for="beneficiary-name" class="col-form-label">ФИО / Наименование выгодоприобретателя</label>
                                            <input type="text" id="beneficiary-name" name="fio-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес</label>
                                            <input type="text" id="beneficiary-address" name="address-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">Серия</label>
                                            <input type="text" id="beneficiary-okonh" name="okonh-beneficiary" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">Номер
                                                паспорта</label>
                                            <input type="text" id="beneficiary-okonh" name="okonh-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="beneficiary-tel" name="tel-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный
                                                счет</label>
                                            <input type="text" id="beneficiary-schet" name="beneficiary-schet" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="beneficiary-inn" name="inn-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="beneficiary-mfo" name="mfo-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                            <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                            <input type="text" id="beneficiary-okonh" name="okonh-beneficiary" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="beneficiary-okonh" name="oked-beneficiary" class="form-control">
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
                                                        <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3" style="margin-top: 33px">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="insurance_to" name="insurance_to" type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-sm-4">-->
                                        <!--<div class="form-group form-inline justify-content-between">-->
                                        <!--<label>Использования ТС на основании</label>-->
                                        <!--<select class="form-control payment-schedule" name="payment_term" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">-->
                                        <!--<option value="selected"></option>-->
                                        <!--<option value="1">Тех пасспорт</option>-->
                                        <!--<option value="2">Доверенность</option>-->
                                        <!--<option value="3">Договор аренды</option>-->
                                        <!--<option value="4">Путевой лист</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="geographic-zone">Географическая зона:</label>
                                            <input type="text" id="geographic-zone" name="geo-zone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведени о трансортных средствах</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" onclick="addRow()" class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Номер полиса</th>
                                        <th class="text-nowrap">Серия полиса</th>
                                        <th class="text-nowrap">Период действия полиса</th>
                                        <th class="text-nowrap">Выбор агента</th>
                                        <th class="text-nowrap">ИД строки</th>
                                        <th class="text-nowrap">Марка</th>
                                        <th class="text-nowrap">Модель</th>
                                        <th class="text-nowrap">Модификация</th>
                                        <th class="text-nowrap">Гос. номер</th>
                                        <th class="text-nowrap">Номер тех паспорта</th>
                                        <th class="text-nowrap">Номер двигателя</th>
                                        <th class="text-nowrap">Номер кузова</th>
                                        <th class="text-nowrap">Грузоподъёмность</th>
                                        <th class="text-nowrap">Количество посадочных мест</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-control polises" id="polises" name="polis-series-0" readonly style="width: 100%;"/>
                                        </td>
                                        <td>
                                            <select type="text" class="form-control" name="period_polis-0">
                                                <option selected="selected"></option>
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control polises" id="polises" name="polis-agent-0" style="width: 100%;"/>
                                        </td>
                                        <td>
                                            <select type="text" class="form-control" name="polis-id-0">
                                                <option selected="selected"></option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-mark-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-model-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-modification-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-gos-num-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-teh-passport-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-num-engine-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-num-body-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis-payload-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum2" name="polis-places-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum insurance_sum-0" data-field-number="0" name="polis_sum-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum-0">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum-0">
                                        </td>
                                        <td>
                                            <input type="button" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="14" style="text-align: right"><label class="text-bold">Итого</label></td>
                                        <td>
                                            <input readonly type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum-0">
                                        </td>
                                        <td>
                                            <input readonly type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum-0">
                                        </td>
                                        <td>
                                            <input readonly type="text" class="form-control forsum4 overall_insurance_sum-0" name="overall_polis_sum-0">
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <div id="general-product-fields">
                    <div id="product-field-modal-0" class="modal" data-field-number="0">
                        <div class="modal-content" id="product-field-modal-content-0">
                            <span class="close product-fields-close" id="product-fields-close-0" data-field-number="0">&times;</span>

                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Сведени о трансортных средствах</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div id="product-fields-0-3">
                                        <div class="form-group">
                                            <label>Утрата (Гибель) или повреждение ТС</label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess1" value="1">
                                                        <label for="radioSuccess1">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess2" value="0">
                                                        <label for="radioSuccess2">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group other_insurance_info-0" style="display:none">
                                            <label>Укажите название и адрес страховой организации и номер
                                                Полиса</label>
                                            <input class="form-control" type="text" name="other_insurance_info">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div id="product-fields-0-3">
                                        <div class="form-group">
                                            <label>Несчастные случаи с Застрахованными лицами</label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess3" value="1">
                                                        <label for="radioSuccess3">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess4" value="0">
                                                        <label for="radioSuccess4">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group other_insurance_info-0" style="display:none">
                                            <label>Укажите название и адрес страховой организации и номер
                                                Полиса</label>
                                            <input class="form-control" type="text" name="other_insurance_info">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div id="product-fields-0-3">
                                        <div class="form-group">
                                            <label>Автогражданская ответственность
                                            </label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess5" value="1">
                                                        <label for="radioSuccess5">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess6" value="0">
                                                        <label for="radioSuccess6">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group other_insurance_info-0" style="display:none">
                                            <label>Укажите название и адрес страховой организации и номер
                                                Полиса</label>
                                            <input class="form-control" type="text" name="other_insurance_info">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div id="product-fields-0-3">
                                        <div class="form-group">
                                            <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты?
                                            </label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess7" value="1">
                                                        <label for="radioSuccess7">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess8" value="0">
                                                        <label for="radioSuccess8">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group other_insurance_info-0" style="display:none">
                                            <label>Укажите название и адрес страховой организации и номер
                                                Полиса</label>
                                            <input class="form-control" type="text" name="other_insurance_info">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div id="product-fields-0-3">
                                        <div class="form-group">
                                            <label>Гибель или повреждение транспортного средства</label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess9" value="1">
                                                        <label for="radioSuccess9">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess0" value="0">
                                                        <label for="radioSuccess0">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group other_insurance_info-0" style="display:none">
                                            <label>Укажите название и адрес страховой организации и номер
                                                Полиса</label>
                                            <input class="form-control" type="text" name="other_insurance_info">
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div id="product-fields-0-3">
                                        <div class="form-group">
                                            <label>Несчастные случаи с Застрахованными лицами</label>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess10" value="1">
                                                        <label for="radioSuccess10">Да</label>
                                                    </div>
                                                    <div class="checkbox icheck-success">
                                                        <input type="radio" class="other_insurance-0" name="strtahovka-0" id="radioSuccess11" value="0">
                                                        <label for="radioSuccess11">Нет</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group other_insurance_info-0" style="display:none">
                                            <label>Укажите название и адрес страховой организации и номер
                                                Полиса</label>
                                            <input class="form-control" type="text" name="other_insurance_info">
                                        </div>
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
                                        <select class="form-control" id="walletNames" style="width: 100%; text-align: center">
                                            <option selected="selected" name="insurance_premium_currency">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select class="form-control payment-schedule" name="payment_term" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1">Единовременно</option>
                                            <option value="other">Другое</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control payment-schedule" name="payment_term" onchange="showDiv('other-payment-schedule', this)" style="width: 100%; text-align: center">
                                            <option value="1">Сумах</option>
                                            <option value="2">Сумах В ин. валюте</option>
                                            <option value="3">В ин. валюте по курсу ЦБ на день заключение договора
                                            </option>
                                            <option value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input type="text" id="all-summ" name="geo-zone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input type="text" id="geographic-zone" name="geo-zone" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div id="other-payment-schedule" style="display: block;">
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
                                            <td><input type="text" class="form-control" name="payment_sum-0-0">
                                            </td>
                                            <td><input type="date" class="form-control" name="payment_from-0-0">
                                            </td>
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
                                        <input type="file" id="geographic-zone" name="geo-zone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="geo-zone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="geo-zone" class="form-control">
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