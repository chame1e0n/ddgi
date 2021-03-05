@extends('layouts.index')

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
                                    <li class="breadcrumb-item active"><a href="/form">Продукт</a></li>
                                    <li class="breadcrumb-item active">Создать Продукт</li>
                                </ol>
                            </div>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                                            <input type="text" id="insurer-name" name="fio-insurer" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="insurer-address" class="col-form-label">Юр адрес страхователя</label>
                                            <input type="text" id="insurer-address" name="address-insurer" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-tel" class="col-form-label">Телефон</label>
                                            <input type="text" id="insurer-tel" name="tel-insurer" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                                            <input type="text" id="insurer-schet" name="address-schet" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-inn" class="col-form-label">ИНН</label>
                                            <input type="text" id="insurer-inn" name="inn-insurer" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-mfo" class="col-form-label">МФО</label>
                                            <input type="text" id="insurer-mfo" name="mfo-insurer" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-bank" class="col-form-label">Банк</label>
                                            <input type="text" id="insurer-bank" name="bank-insurer" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                                            <input type="text" id="insurer-okonh" name="okonh-insurer" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Период страхования</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Период страхования</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="insurance_to" name="insurance_to" type="date" class="form-control">
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
                                                        <label for="beneficiary-name" class="col-form-label">Сведения о договоре строительного порядка</label>
                                                        <input type="text" id="beneficiary-name" name="fio-beneficiary" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="beneficiary-address" class="col-form-label">Объект стриотельно-монтажных работ</label>
                                                        <input type="text" id="beneficiary-address" name="address-beneficiary" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="beneficiary-tel" class="col-form-label">Расположение объекта</label>
                                                        <input type="text" id="beneficiary-tel" name="tel-beneficiary" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="beneficiary-schet" class="col-form-label">Страховая стоимость</label>
                                                        <input type="text" id="beneficiary-schet" name="beneficiary-schet" class="form-control calc1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Период страхования</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">с</span>
                                                        </div>
                                                        <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-form-label">Период страхования</label>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">до</span>
                                                            </div>
                                                            <input id="insurance_to" name="insurance_to" type="date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h3 class="card-title">Страхование ответственности</h3>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="beneficiary-mfo" class="col-form-label">Телесные повреждения</label>
                                                        <input type="text" id="beneficiary-mfo" name="mfo-beneficiary" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="beneficiary-bank" class="col-form-label">Материальный ущерб</label>
                                                        <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control">
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
                                                <label for="beneficiary-mfo" class="col-form-label ">Строительно монтажные</label>
                                                <input type="text" id="beneficiary-mfo" name="mfo-beneficiary" class="form-control calc2">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-bank" class="col-form-label">Строительные</label>
                                                <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control calc3">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-bank" class="col-form-label">Оборудование</label>
                                                <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control calc4">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beneficiary-bank" class="col-form-label">Стрительные машины и механизмы</label>
                                                <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control calc5">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beneficiary-bank" class="col-form-label">Расходы по расчистке территории</label>
                                                <input type="text" id="beneficiary-bank" name="bank-beneficiary" class="form-control calc6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Страховая премия</label>
                                                <input type="text" id="geographic-zone" name="geo-zone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="geographic-zone">Франшиза</label>
                                                <input type="text" id="geographic-zone" name="geo-zone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="polises">Валюта взаиморасчетов</label>
                                            <select class="form-control polises" id="polises" name="polis-series-0" style="width: 100%;">
                                                <option selected="selected">UZS</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="polises">Условия оплаты страховой премии</label>
                                            <select class="form-control polises" id="polises" name="polis-series-0" style="width: 100%;">
                                                <option selected="selected">Единовременная</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="geographic-zone">Общая страховая сумма</label>
                                                <input type="text" readonly id="geographic-zone" name="geo-zone" class="form-control calcSumm">
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
                                                <input type="text" id="polis-series" name="polis-series" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"></span>
                                                </div>
                                                <input id="insurance_from" name="insurance_from" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="otvet-litso">Ответственное лицо</label>
                                                <select class="form-control polises" id="otvet-litso" name="litso" style="width: 100%;">
                                                    <option selected="selected">Имя Фамилия</option>
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