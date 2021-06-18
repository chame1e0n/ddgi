@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{ route("borrower_sportsman.store") }}" method="post" id="mainFormKasko">
        @csrf
        <div class="content-wrapper">
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

                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="geographic-zone">Географическая зона:</label>
                                    <input type="text" id="geographic-zone" name="geo-zone"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведение о ТС</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" onclick="addRowBorrowerSportsmanInfo({{$agents}})"
                                    class="btn btn-primary ">Добавить
                            </button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable_u">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">Номер полиса</th>
                                        <th class="text-nowrap">Серия полиса</th>
                                        <th class="text-nowrap">Хронические заболевании</th>
                                        <th class="text-nowrap">Выбор агента</th>
                                        <th class="text-nowrap">ФИО застрахованного лица</th>
                                        <th class="text-nowrap">Дата рождения</th>
                                        <th class="text-nowrap">Серия и номер пасспорта</th>
                                        <th class="text-nowrap">Период действия полиса</th>
                                        <th class="text-nowrap">Выгодоприобритатель</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td>
                                            <input type="text" class="form-control" name="policy_num[]">
                                        </td>
                                        <td>
                                            <select class="form-control polises" id="polises"
                                                    name="policy_series[]" style="width: 1[0][0]%;">
                                                <option selected="selected"></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="policy_chronic[]">
                                        </td>
                                        <td>
                                            <select class="form-control polises"
                                                    name="policy_agent[]" style="width: 1[0][0]%;">
                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}">{{$agent->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_fio[]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="polis_date_birth[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_passport_series[]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="polis_usable_period[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_benefit[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_overall_sum[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="polis_bonus[]">
                                        </td>
                                        <!-- <td>
                                                <input type="text" class="form-control forsum2"
                                                    name="polis-places-0">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control forsum insurance_sum-0"
                                                    data-field-number="0" name="polis_sum-0">
                                            </td>
                                            <td>
                                                <input type="text"
                                                    class="form-control forsum4 overall_insurance_sum-0"
                                                    name="overall_polis_sum-0">
                                            </td>
                                            <td>
                                                <input type="text"
                                                    class="form-control forsum3 insurance_premium-0" readonly
                                                    name="polis_premium-0">
                                            </td> -->

                                    </tr>
                                    <tr>
                                        <td colspan="13" style="text-align: right"><label
                                                    class="text-bold">Итого</label></td>
                                        <!-- <td><input readonly type="text" class="form-control overall-sum2" />
                                            </td>
                                            <td><input readonly type="text" class="form-control overall-sum" />
                                            </td>
                                            <td><input readonly type="text" class="form-control overall-sum4" />
                                            </td>
                                            <td><input readonly type="text" class="form-control overall-sum3" />
                                            </td> -->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <!-- <div class="form-group">
                                    <label>При наружном осмотре ТС дефекты и повреждения</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="checkbox icheck-success">
                                                <input id="defects-1" type="radio" class="defects" name="defects"
                                                    value="1">
                                                <label for="defects-1">Да - присутствуют</label>
                                            </div>
                                            <div class="checkbox icheck-success ">
                                                <input id="defects-0" type="radio" class="defects" name="defects"
                                                    value="0">
                                                <label for="defects-0">Нет - не имеются</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group defects_images" style="display: none;">
                                        <label>Фотографии дефектов ТС</label>
                                        <input class="form-control" type="file" multiple name="defects_images">
                                    </div>
                                    <div class="form-group">
                                        <label>Цель использования</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div> -->
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
                                            <label for="polis-series" class="col-form-label">Серийный номер
                                                полиса страхования</label>
                                            <input type="text" id="polis-series" name="polis_series"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="polis_giving_date" type="date"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="litso"
                                                    style="width: 100%;">
                                                <option selected="selected">Имя Фамилия</option>
                                            </select>
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
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="payment-terms-form">
                            <div id="other-payment-schedule" style="display: block;">
                                <div class="form-group">
                                    <button type="button" onclick="addRowBonusCondition()" class="btn btn-primary ">
                                        Добавить
                                    </button>
                                </div>
                                <div class="table-responsive p-0 " style="max-height: 300px;">
                                    <table class="table table-hover table-head-fixed" id="addRowBonusCondition">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Сумма</th>
                                            <th class="text-nowrap">От</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr id="payment-term-tr-0" data-field-number="0">
                                            <td><input type="text" class="form-control"
                                                       name="payment_bonus_sum[]"></td>
                                            <td><input type="date" class="form-control"
                                                       name="payment_bonus_from[]"></td>
                                        </tr>
                                        </tbody>
                                    </table>
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
                                        <input type="text" id="all-summ" name="all_sum"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input type="text" id="geographic-zone" name="insurance_bonus"
                                               class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div id="general-product-fields">
                    <div id="product-field-modal-0" class="modal" data-field-number="0">

                    </div>
                </div>
            </section>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
        </div>
    </form>
@endsection