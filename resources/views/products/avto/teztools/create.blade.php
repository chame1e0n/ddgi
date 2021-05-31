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
                                        <label for="policy-holder-fio" class="col-form-label">Наименования страхователя</label>
                                        <input type="text" id="policy-holder-fio" name="policy_holder[FIO]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-holder-address" class="col-form-label">Адрес страхователя</label>
                                        <input type="text" id="policy-holder-address" name="policy_holder[address]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-holder-phone-number" class="col-form-label">Телефонный номер</label>
                                        <input type="text" id="policy-holder-phone-number" name="policy_holder[phone_number]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-holder-checking-account" class="col-form-label">Расчетный счет</label>
                                        <input type="text" id="policy-holder-checking-account" name="policy_holder[checking_account]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-holder-inn" class="col-form-label">ИНН</label>
                                        <input type="text" id="policy-holder-inn" name="policy_holder[inn]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-holder-mfo" class="col-form-label">МФО</label>
                                        <input type="text" id="policy-holder-mfo" name="policy_holder[mfo]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-holder-bank-id" class="col-form-label">Банк</label>
                                        <select id="policy-holder-bank-id"
                                                name="policy_holder[bank_id]"
                                                style="width: 100%;"
                                                required
                                                @if($errors->has('policy_holder.bank_id'))
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
                                        <label for="policy-holder-oked" class="col-form-label">ОКЭД</label>
                                        <input type="text" id="policy-holder-oked" name="policy_holder[oked]" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-holder-okonx" class="col-form-label">ОКОНХ</label>
                                        <input type="text" id="policy-holder-okonx" name="policy_holder[okonx]" class="form-control" />
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
                                            <label for="policy-beneficiary-fio" class="col-form-label">Наименования страхователя</label>
                                            <input type="text" id="policy-beneficiary-fio" name="policy_beneficiary[FIO]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-address" class="col-form-label">Адрес</label>
                                            <input type="text" id="policy-beneficiary-address" name="policy_beneficiary[address]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-phone-number" class="col-form-label">Телефон</label>
                                            <input type="text" id="policy-beneficiary-phone-number" name="policy_beneficiary[phone_number]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-checking-account" class="col-form-label">Расчетный счет</label>
                                            <input type="text" id="policy-beneficiary-checking-account" name="policy_beneficiary[checking_account]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="policy-beneficiary-inn" name="policy_beneficiary[inn]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="policy-beneficiary-mfo" name="policy_beneficiary[mfo]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-oked" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="policy-beneficiary-oked" name="policy_beneficiary[oked]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-nomer-passport" class="col-form-label">Номер паспорта</label>
                                            <input type="text" id="policy-beneficiary-nomer-passport" name="policy_beneficiary[nomer_passport]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-bank-id" class="col-form-label">Банк</label>
                                            <select id="policy-beneficiary-bank-id"
                                                    name="policy_beneficiary[bank_id]"
                                                    style="width: 100%;"
                                                    required
                                                    @if($errors->has('policy-beneficiary-bank-id'))
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
                                            <label for="policy-beneficiary-okonx" class="col-form-label">ОКОНХ</label>
                                            <input type="text" id="policy-beneficiary-okonx" name="policy_beneficiary[okonx]" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="policy-beneficiary-seria-passport" class="col-form-label">Серия</label>
                                            <input type="text" id="policy-beneficiary-seria-passport" name="policy_beneficiary[seria_passport]" class="form-control" />
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
                                                    <label for="all-product-insurance-from">Период страхования</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">с</span>
                                                        </div>
                                                        <input id="all-product-insurance-from" name="all_product[insurance_from]" type="date" class="form-control" />
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
                                                        <input id="all-product-insurance-to" name="all_product[insurance_to]" type="date" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-inline justify-content-between">
                                                <label>Использования ТС на основании</label>
                                                <select class="form-control payment-schedule"
                                                        name="all_product[using_tc]"
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
                                            <label for="all-product-geo-zone">Географическая зона:</label>
                                            <input type="text" id="all-product-geo-zone" name="all_product[geo_zone]" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведения о транспортных средствах</h3>
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
                                            <th class="text-nowrap">Период действия от</th>
                                            <th class="text-nowrap">Период действия до</th>
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

@include('products.scripts', [
    'ajax_data' => [
        'banks' => [
            [
                'id' => 'policy-holder-bank-id',
                'name' => 'policy_holder[bank_id]'
            ],
            [
                'id' => 'policy-beneficiary-bank-id',
                'name' => 'policy_beneficiary[bank_id]'
            ]
        ]
    ]
])
