@extends('layouts.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('neshchastka-time.update', $page->id )}}" method="POST" id="mainFormKasko" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                                <a href="{{route('neshchastka-time.edit', $page->id)}}?download=dogovor">Скачать Договор</a>
                                <a href="{{route('neshchastka-time.edit', $page->id)}}?download=anketa">Скачать Анкету</a>
                            @foreach($page->policyInformations as $key => $inform)
                                <a href="{{route('neshchastka-time.edit', $page->id)}}?download=polis&count={{$key}}">Скачать Полис {{$key + 1}}</a>
                            @endforeach
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
                </div>
                <div class="card-body">
                    @include('includes.beneficiary')
                </div>

                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="geographic-zone">Географическая зона:</label>
                                    <input type="text" id="geographic-zone" name="geo_zone" value="{{$page->geo_zone}}" required class="form-control">
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
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <button type="button" id="addTc" class="btn btn-primary ">Добавить</button>
                            </div>
                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                <div id="product-fields" class="product-fields" data-field-number="0">
                                    <table data-info-table class="table table-hover table-head-fixed" id="empTable">
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap">Номер полиса</th>
                                            <th class="text-nowrap">Серия полиса</th>
                                            <th class="text-nowrap">Дата выдачи</th>
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
                                        @foreach($page->policyInformations as $info)
                                        <tr id="0.7842109002522502">
                                            <td>
                                                <input type="text" class="form-control" value="{{$info->period_polis}}" name="period_polis[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{$info->polis_id}}" name="polis_id[]">
                                            </td>
                                            <td>
                                                <input disabled="" type="date" class="form-control">
                                            </td>
                                            <td>
                                                <select class="form-control polises" id="polises"  name="polis_agent[]" style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    <option value="1" @if($info->polis_agent == 1) selected @endif>Да</option>
                                                    <option value="2" @if($info->polis_agent == 2) selected @endif>Нет</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" id="agents" name="agents[]" style="width: 100%;">
                                                    <option selected="selected"></option>
                                                    <option value="1" @if($info->agents == 1) selected @endif>Да</option>
                                                    <option value="2" @if($info->agents == 2) selected @endif>Нет</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{$info->polis_model}}" name="polis_model[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{$info->polis_modification}}" name="polis_modification[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{$info->polis_gos_num}}" name="polis_gos_num[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{$info->polis_teh_passport}}" name="polis_teh_passport[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" value="{{$info->polis_num_engine}}" name="polis_num_engine[]">
                                            </td>
                                            <td>
                                                <input data-field="value" type="text" class="form-control" value="{{$info->polis_num_body}}" name="polis_num_body[]">
                                            </td>
                                            <td>
                                                <input data-field="sum" type="text" class="form-control" value="{{$info->polis_payload}}" name="polis_payload[]">
                                            </td>
                                            <td class="form-group">
                                                <input onclick="removeAndCalc(0.7842109002522502)" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
                                            </td>
                                        </tr>
                                        <tr>
                                            @endforeach
                                            <td colspan="10" style="text-align: right"><label class="text-bold">Итого</label></td>
                                            <td><input data-insurance-stoimost readonly type="text" class="form-control overall-sum4" />
                                            </td>
                                            <td><input data-insurance-sum readonly type="text" class="form-control overall-sum3" />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
                                        <input type="text" id="all-summ" name="strah_sum" value="{{$page->strah_sum}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="strah_prem" value="{{$page->strah_prem}}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franshiza" value="{{$page->franshiza}}" required class="form-control">
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
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <select name="polis_series" id="polis_series" class="form-control">
                                                @foreach($polis_series as $seriya)
                                                    <option value="{{$seriya->id}}" @if($page->polis_series == $seriya->id) selected @endif>{{$seriya->code}}</option>
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
                                            <input id="insurance_from" name="data_vidachi_polisa" type="date" value="{{$page->data_vidachi_polisa}}" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises"  required id="otvet-litso" name="otvet_litso" style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option @if($page->otvet_litso == $agent->user_id) selected
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
                                        <input type="file" id="geographic-zone" name="anketa" class="form-control">
                                        @if($page->anketa != null)
                                            <a target="_blank" href="/storage/{{$page->anketa}}">
                                                Открыть
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input type="file" id="geographic-zone" name="dogovor" class="form-control">
                                        @if($page->dogovor != null)
                                            <a target="_blank" href="/storage/{{$page->dogovor}}">
                                                Открыть
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input type="file" id="geographic-zone" name="polis" class="form-control">
                                        @if($page->polis != null)
                                            <a target="_blank" href="/storage/{{$page->polis}}">
                                                Открыть
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </section>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
        </div>
    </form>
@endsection
@section('scripts_vars')
    <script src="../../assets/custom/js/csrftoken.js"></script>
    <script src="../../assets/custom/js/form/form-actions.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../../assets/json/cbu.json',
                method: "GET",
                type: 'json',
                // beforeSend: function(xhr) {
                //     xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
                // },
                success: function(data) {
                    // $('#walletNames').append('<option selected="selected"></option>');
                    const products = data;
                    const length = products.length;
                    console.log(products)
                    for (let i = 0; i < length; i++) {
                        $('#walletNames').append(
                            `<option value="${products[i].id}">${products[i].Ccy}</option>`);
                    }
                },
                error: function() {
                    console.log('error');
                }
            })
        });
        // fetch('https://cbu.uz/ru/arkhiv-kursov-valyut/json/')
        //     .then(function(data) {
        //         console.log(data)
        //     });
    </script>
@endsection
