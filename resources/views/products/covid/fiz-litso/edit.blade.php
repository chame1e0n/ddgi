@extends('layouts.index')

@section('content')
    <form method="POST" action="{{route('covid-fiz.update', $page->id)}}" id="mainFormKasko"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href="{{url()->current()}}?download=polis">Скачать Полис</a>
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
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-body">
                            <div id="anketa-fields">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Срок действия полиса</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input value="{{$page->insurance_from}}" type="date" id="insurance_from"
                                                           name="insurance_from"
                                                           @if($errors->has('insurance_from'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                           @endif required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="col-form-label">Срок действия полиса</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input value="{{$page->insurance_to}}" type="date" id="insurance_to"
                                                               name="insurance_to"
                                                               @if($errors->has('insurance_to'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                               @endif required>
                                                    </div>
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
                        <h3 class="card-title">Застрахованные лица</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button type="button" data-btn-covid-fiz class="btn btn-primary ">Добавить</button>
                        </div>
                        <div class="table-responsive p-0 " style="max-height: 300px;">
                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">
                                <table class="table table-hover table-head-fixed" id="empTable">
                                    <thead>
                                    <tr>
                                        <th class="text-nowrap">№</th>
                                        <th class="text-nowrap">Фамилия</th>
                                        <th class="text-nowrap">Имя</th>
                                        <th class="text-nowrap">Отчество</th>
                                        <th class="text-nowrap">Серия и номер паспорта</th>
                                        <th class="text-nowrap">Дата выдачи паспорта</th>
                                        <th class="text-nowrap">Место выдачи паспорта</th>
                                        <th class="text-nowrap">Номер полиса</th>
                                        <th class="text-nowrap">Страховая стоимость</th>
                                        <th class="text-nowrap">Страховая сумма</th>
                                        <th class="text-nowrap">Страховая премия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($page->infos->count() > 0)
                                        @foreach($page->infos as $info)
                                            <tr id="{{$info->id}}">
                                                <td>
                                                    <input type="text" class="@if($errors->has('person_number.'.$loop->index)) is-invalid @endif form-control" name="person_number[]" value="{{$info->person_number}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('person_surname.'.$loop->index)) is-invalid @endif form-control" name="person_surname[]" value="{{$info->person_surname}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('person_name.'.$loop->index)) is-invalid @endif form-control" name="person_name[]" value="{{$info->person_name}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('person_lastname.'.$loop->index)) is-invalid @endif form-control" name="person_lastname[]" value="{{$info->person_lastname}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('series_and_number_passport.'.$loop->index)) is-invalid @endif form-control" name="series_and_number_passport[]" value="{{$info->series_and_number_passport}}">
                                                </td>
                                                <td>
                                                    <input type="date" class="@if($errors->has('date_of_issue_passport.'.$loop->index)) is-invalid @endif form-control" name="date_of_issue_passport[]" value="{{$info->date_of_issue_passport}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('place_of_issue_passport.'.$loop->index)) is-invalid @endif form-control" name="place_of_issue_passport[]" value="{{$info->place_of_issue_passport}}">
                                                </td>
                                                <td>
                                                    <select class="@if($errors->has('policy_series_id.'.$loop->index)) is-invalid @endif form-control polises" id="polis-series"
                                                            name="policy_series_id[]"
                                                            style="width: 100%;" required>
                                                        <option value="0"></option>
                                                        @foreach($policySeries as $series)
                                                            <option @if($info->policy_series_id == $series->id) selected
                                                                    @endif value="{{ $series->id }}">{{ $series->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('insurance_cost.'.$loop->index)) is-invalid @endif form-control" name="insurance_cost[]" value="{{$info->insurance_cost}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('insurance_sum.'.$loop->index)) is-invalid @endif form-control" name="insurance_sum[]" value="{{$info->insurance_sum}}">
                                                </td>
                                                <td>
                                                    <input type="text" class="@if($errors->has('insurance_premium.'.$loop->index)) is-invalid @endif form-control" name="insurance_premium[]" value="{{$info->insurance_premium}}">
                                                </td>
                                                <td>
                                                    <input onclick="removeAndCalc({{$info->id}})" type="button" value="Удалить" data-action="delete" class="btn btn-warning">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                <input type="text" class="@if($errors->has('person_number')) is-invalid @endif form-control" name="person_number[]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('person_surname')) is-invalid @endif form-control" name="person_surname[]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('person_name')) is-invalid @endif form-control" name="person_name[]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('person_lastname')) is-invalid @endif form-control" name="person_lastname[]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('series_and_number_passport')) is-invalid @endif form-control" name="series_and_number_passport[]" value="">
                                            </td>
                                            <td>
                                                <input type="date" class="@if($errors->has('date_of_issue_passport')) is-invalid @endif form-control" name="date_of_issue_passport[]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('place_of_issue_passport')) is-invalid @endif form-control" name="place_of_issue_passport[]" value="">
                                            </td>
                                            <td>
                                                <select class="form-control polises" id="polis-series"
                                                        name="policy_series_id[]"
                                                        style="width: 100%;" required>
                                                    <option value="0"></option>
                                                    @foreach($policySeries as $series)
                                                        <option @if(old('policy_series_id') == $series->id) selected
                                                                @endif value="{{ $series->id }}">{{ $series->code }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('insurance_cost')) is-invalid @endif form-control" name="insurance_cost[]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('insurance_sum')) is-invalid @endif form-control" name="insurance_sum[]" value="">
                                            </td>
                                            <td>
                                                <input type="text" class="@if($errors->has('insurance_premium')) is-invalid @endif form-control" name="insurance_premium[]" value="">
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td colspan="8" style="text-align: right"><label class="text-bold">Итого</label>
                                        </td>
                                        <td><input readonly type="text" data-insurance-stoimost class="form-control overall-sum2" />
                                        </td>
                                        <td><input readonly type="text" data-insurance-sum class="form-control overall-sum4" />
                                        </td>
                                        <td><input readonly type="text" data-insurance-award class="form-control overall-sum3" />
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
                                            <input id="strahovaya_sum" name="strahovaya_sum" value="{{$page->strahovaya_sum}}"
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
                                            <input id="strahovaya_purpose" name="strahovaya_purpose" value="{{$page->strahovaya_purpose}}"
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
                                            <input id="franshiza" name="franshiza" value="{{$page->franshiza}}"
                                                   type="text" @if($errors->has('franshiza'))
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса страхования</label>
                                            <input id="serial_number_policy" name="serial_number_policy" value="{{$page->serial_number_policy}}"
                                                   type="text" @if($errors->has('serial_number_policy'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="date_issue_policy" name="date_issue_policy" value="{{$page->date_issue_policy}}"
                                                   type="date" @if($errors->has('date_issue_policy'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="otvet-litso" class="col-form-label">Ответственное лицо</label>
                                            <select @if($errors->has('litso'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="otvet-litso" name="litso"
                                                    style="width: 100%;" required>
                                                <option></option>
                                                @foreach($agents as $agent)
                                                    <option @if($page->otvet_litso == $agent->id) selected
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
                                        @if($page->anketa_img != null)
                                            <embed src="/storage/{{$page->anketa_img}}" width="250" height="250" />
                                        @endif
                                        <label for="polis-series" class="col-form-label">Анкета</label>
                                        <input  id="anketa_img" name="anketa_img" value="{{old('anketa_img')}}"
                                                type="file" @if($errors->has('anketa_img'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @if($page->dogovor_img != null)
                                            <embed src="/storage/{{$page->dogovor_img}}" width="250" height="250" />
                                        @endif
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input  id="dogovor_img" name="dogovor_img" value="{{old('dogovor_img')}}"
                                                type="file" @if($errors->has('dogovor_img'))
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @endif>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @if($page->polis_img != null)
                                            <embed src="/storage/{{$page->polis_img}}" width="250" height="250" />
                                        @endif
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input  id="polis_img" name="polis_img" value="{{old('polis_img')}}"
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
