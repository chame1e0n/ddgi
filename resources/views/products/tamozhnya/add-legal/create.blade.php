@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('tamozhnya-add-legal.store')}}" method="POST" id="mainFormKasko"  enctype="multipart/form-data">
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
                                <li class="breadcrumb-item active"><a href="/form">Договор</a></li>
                                <li class="breadcrumb-item active">Создать Договор</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <a href="{{ url()->previous() }}" class="btn btn-info">Назад</a>
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
                                <div class="col-md-4">
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
                                <div class="col-md-4">
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
                                <div class="col-md-6">
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
                        <div class="card-body">
                            <div class="card card-info" id="clone-beneficiary">
                                <div class="card-header">
                                    <h3 class="card-title">Сведения о товаре</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" id="beneficiary-card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="beneficiary-name" class="col-form-label">Описание</label>
                                                <textarea id="description" name="description"  @if($errors->has('description'))
                                                class="form-control is-invalid"
                                                          @else
                                                          class="form-control"
                                            @endif >{{old('description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-info" id="clone-beneficiary">
                                <div class="card-header">
                                    <h3 class="card-title">Информация о подерженности рискам</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" id="beneficiary-card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Период деятельности</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="from_date" name="from_date" value="{{old('from_date')}}"
                                                       type="date" @if($errors->has('from_date'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-form-label">Период деятельности</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">до</span>
                                                    </div>
                                                    <input id="to_date" name="to_date" value="{{old('to_date')}}"
                                                           type="date" @if($errors->has('to_date'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                        @endif>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="insurer-okonh" class="col-form-label">Профессиональные риски</label>
                                                <input id="prof_riski" name="prof_riski" value="{{old('prof_riski')}}"
                                                       type="text" @if($errors->has('prof_riski'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                    @endif>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Были ли в Вашей практике случаи, когда  Вам была предъявлена претензия или иск таможенными органами РУз</label>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="checkbox icheck-success">
                                                            <input id="defects-1" onclick="Go()"  type="radio" class="pretenzii_in_ruz" name="pretenzii_in_ruz" value="1">
                                                            <label for="defects-1">Да</label>
                                                        </div>
                                                        <div class="checkbox icheck-success ">
                                                            <input id="defects-0" onclick="Go()" type="radio" class="pretenzii_in_ruz" name="pretenzii_in_ruz" value="0">
                                                            <label for="defects-0">Нет</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group defects_images" id="hide" @if (old('pretenzii_in_ruz') == 1) style = "display: block;" @else style = "display: none;" @endif>
                                                    <label>Опсиание причины</label>
                                                    <input id="prichina_pretenzii" name="prichina_pretenzii" value="{{old('prichina_pretenzii')}}"
                                                           type="text" @if($errors->has('prichina_pretenzii'))
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
                                            <option selected="selected">UZS
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Порядок оплаты страховой премии</label>
                                        <select id="condition" class="form-control payment-schedule" name="payment_term"
                                                style="width: 100%; text-align: center">
                                            <option value="1">Единовременно</option>
                                            <option value="transh">Транш</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-inline justify-content-between">
                                        <label>Способ расчета</label>
                                        <select class="form-control sposob_rascheta" name="sposob_rascheta" style="width: 100%; text-align: center">
                                            <option value="1">Сумах</option>
                                            <option value="2">Сумах В ин. валюте</option>
                                            <option value="3">В ин. валюте по курсу ЦБ на день заключение договора</option>
                                            <option value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                                            <option value="5">В ин. валюте по фиксированному ЦБ на день оплаты премии/первого транша</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="transh-payment-schedule" class="d-none">
                                <div class="form-group">
                                    <button type="button" id="transh-payment-schedule-button" class="btn btn-primary ">
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
                                            <td><input type="text" class="form-control" name="payment_sum[]"></td>
                                            <td><input type="date" class="form-control" name="payment_from[]">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input id="strahovaya_sum" name="strahovaya_sum" value="{{old('strahovaya_sum')}}"
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
                                        <input onchange="changeStrahPremiya()" id="strahovaya_purpose" readonly name="strahovaya_purpose" value="{{old('strahovaya_purpose')}}"
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
                                        <input id="franshiza" name="franshiza" value="{{old('franshiza')}}"
                                               type="text" @if($errors->has('franshiza'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="geographic-zone">Тариф (%)</label>
                                            <input readonly value="{{$product->tarif}}"
                                                   type="text"
                                                   name="tarif"
                                                   class="form-control"
                                            >
                                        </div>
                                    </div>
                                    <div class="icheck-success col-md-4">
                                        <input onchange="toggleBlock('tarif', 'data-tarif-descr')" class="form-check-input client-type-radio" type="checkbox" name="isOtherTarif" id="tarif">
                                        <label class="form-check-label" for="tarif">Указать другой тариф в процентах</label>
                                    </div>
                                    <!-- TODO: Блок должен находится в скрытом состоянии
                                    отображаться только тогда, когда выбран checkbox "Тариф"
                                    -->
                                    <div class="form-group" data-tarif-descr style="display: none">
                                        <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                        <input class="form-control" id="descrTarif" name="otherTarif" type="number">
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
                                            <select type="text" id="serial_number_policy" name="serial_number_policy" @if($errors->has('serial_number_policy'))
                                            class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif>
                                                <option value="0"></option>
                                                @foreach($policies as $series)
                                                    <option @if(old('serial_number_policy') == $series->id) selected
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
                                            <input id="date_issue_policy" name="date_issue_policy" value="{{old('date_issue_policy')}}"
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
                                                    <option @if(old('litso') == $agent->id) selected
                                                            @endif value="{{ $agent->id }}">{{ $agent->surname }} {{ $agent->name }} {{ $agent->middle_name }}</option>
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
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input id="anketa_img" name="anketa_img" value="{{old('anketa_img')}}"
                                               type="file" @if($errors->has('anketa_img'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input id="dogovor_img" name="dogovor_img" value="{{old('dogovor_img')}}"
                                               type="file" @if($errors->has('dogovor_img'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input id="polis_img" name="polis_img" value="{{old('polis_img')}}"
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
        </div>

        </section>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
        </div>
    </form>

@endsection
@section('scripts_vars')
    <script>

        function Go() {
            document.getElementById('hide').style.display=(document.getElementById('defects-1').checked)? 'block': 'none'
        }
    </script>
@endsection
@section('scripts')
    <script>
        var productTarif = {{$product->tarif/100}};
        const strahPremiya = document.getElementById('strahovaya_purpose');
        const strahovayaSum = document.getElementById('strahovaya_sum');
        var descrTarif = document.getElementById('descrTarif');

        strahovayaSum.addEventListener('change', changeStrahPremiya);
        descrTarif.addEventListener('change', changeStrahPremiya);

        function changeStrahPremiya() {
            var tarif = document.getElementById('tarif');

            // if tarif checkbox not checked -> use default tarif for that product
            if (!tarif.checked) {
                strahPremiya.value = (strahovayaSum.value * productTarif).toFixed(2);
            } else {
                strahPremiya.value = (strahovayaSum.value * descrTarif.value / 100).toFixed(2);
            }
        }
    </script>
@endsection
