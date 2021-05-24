@extends('layouts.index')

{{--@section('css')--}}
{{--    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">--}}
{{--    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">--}}
{{--@endsection--}}

@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.create', ['insurance_sum_all'=> true, 'insurance_bonus_all' => true])
@include('products._form_elements.elements._srok_deystviya_dogovora.create')

@section('content')
    <form action="{{route('teztools.store')}}"
          method="post"
          enctype="multipart/form-data"
          id="mainFormKasko">
        @csrf

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br /><br />
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row mb-2">
                        <div class="col-sm-6"></div>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-name" class="col-form-label">Наименования страхователя</label>
                                        <input type="text" id="beneficiary-name" name="fio_insurer" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-address" class="col-form-label">Адрес страхователя</label>
                                        <input type="text" id="insurer-address" name="address_insurer" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-tel" class="col-form-label">Телефонный номер</label>
                                        <input type="text" id="insurer-tel" name="tel_insurer" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="insurer-schet" name="address_schet" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="insurer-inn" name="inn_insurer" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="insurer-mfo" name="mfo_insurer" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-bank" class="col-form-label">Банк</label>
                                        <select id="bank_insurer"
                                                name="bank_insurer"
                                                style="width: 100%;"
                                                required
                                                @if($errors->has('bank_insurer'))
                                                    class="form-control is-invalid"
                                                @else
                                                    class="form-control"
                                                @endif>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="insurer-okonh" name="oked_insurer" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="insurer-okonh" name="okonh_insurer" class="form-control" />
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
                                            <label for="beneficiary-name" class="col-form-label">Наименования страхователя</label>
                                            <input type="text" id="beneficiary-name" name="fio_beneficiary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-address" class="col-form-label">Адрес</label>
                                            <input type="text" id="beneficiary-address" name="address_beneficiary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="beneficiary-tel" name="tel_beneficiary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                            <input type="text" id="beneficiary-schet" name="beneficiary_schet" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="beneficiary-inn" name="inn_beneficiary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="beneficiary-mfo" name="mfo_beneficiary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="insurer-okonh" name="oked_beneficiary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">Номер паспорта</label>
                                            <input type="text" id="beneficiary-okonh" name="nomer_passport" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                            <select id="beneficiary-bank"
                                                    name="bank_beneficiary"
                                                    style="width: 100%;"
                                                    required
                                                    @if($errors->has('bank_beneficiary'))
                                                        class="form-control is-invalid"
                                                    @else
                                                        class="form-control"
                                                    @endif>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                            <input type="text" id="beneficiary-okonh" name="okonh_beneficiary" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-okonh" class="col-form-label">Серия</label>
                                            <input type="text" id="beneficiary-okonh" name="seria_passport" class="form-control" />
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
                                           @yield('_srok_deystviya_dogovora_content')
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
                                                        <input id="insurance_from" name="insurance_from" type="date" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="input-group mb-3"
                                                         style="margin-top: 33px;">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="insurance_to" name="insurance_to" type="date" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-inline justify-content-between">
                                                <label>Использования ТС на основании</label>
                                                <select class="form-control payment-schedule"
                                                        name="using_tc"
                                                        onchange="showDiv('other-payment-schedule', this)"
                                                        style="width: 100%; text-align: center;">
                                                    <option value="selected"></option>
                                                    <option value="1">Тех пасспорт</option>
                                                    <option value="2">Доверенность</option>
                                                    <option value="3">Договор аренды</option>
                                                    <option value="4">Путевой лист</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="geographic-zone">Географическая зона:</label>
                                            <input type="text" id="geographic-zone" name="geo_zone" class="form-control" />
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
                    <div class="card-body" id="notmod">
                        <div class="form-group">
                            <button type="button" id="cascoAddButton" class="btn btn-primary">Добавить</button>
                        </div>
                        <div class="table-responsive p-0"
                             style="max-height: 300px;">
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Дата выдачи</th>
                                            <th class="text-nowrap">Год выпуска</th>
                                            <th class="text-nowrap">Периуд действия от</th>
                                            <th class="text-nowrap">Периуд действия до</th>
                                            <th class="text-nowrap">Выбор агента</th>
                                            <th class="text-nowrap">Марка и модель</th>
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
                                        <tr></tr>
                                        <tr>
                                            <td colspan="14"
                                                style="text-align: right;">
                                                <label class="text-bold">Итого</label>
                                            </td>
                                            <td>
                                                <input readonly data-insurance-stoimost type="text" class="form-control overall-sum" />
                                            </td>
                                            <td>
                                                <input readonly data-insurance-sum type="text" class="form-control overall-sum4" />
                                            </td>
                                            <td>
                                                <input readonly data-insurance-award type="text" class="form-control overall-sum3" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="general-product-fields"></div>
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

                    @yield('_usloviya_oplati_strahovoy_premii_content')
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
                                        <input type="file" id="geographic-zone" name="application_form_file" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="contract_file" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="policy_file" class="form-control" />
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
    <script>
        $.ajax({
            url: '{{route('getBanks')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = response.length;

                let insurer_banks = $('#bank_insurer');
                insurer_banks.empty();
                insurer_banks.append('<option></option>');

                let beneficiary_banks = $('#beneficiary-bank');
                beneficiary_banks.empty();
                beneficiary_banks.append('<option></option>');

                var insurer_selected = {{old('bank_insurer') ?? 0}};
                var beneficiary_selected = {{old('beneficiary-bank') ?? 0}};

                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    var mfo = response[i]['mfo'];

                    insurer_banks.append('<option value="' + id + '" ' + (insurer_selected == id ? 'selected' : '')  + '>' + name + '</option>');
                    beneficiary_banks.append('<option value="' + id + '" ' + (beneficiary_selected == id ? 'selected' : '')  + '>' + name + '</option>');
                }
            }
        });

        // Initialize Select2 Elements
        $('#bank_insurer').select2({
            theme: 'bootstrap4'
        });
        $('#beneficiary-bank').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection