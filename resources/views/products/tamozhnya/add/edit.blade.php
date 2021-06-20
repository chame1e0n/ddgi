@extends('layouts.index')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('tamozhnya-add.update', $tamozhnya->id)}}" method="POST" id="mainFormKasko"  enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <a href="{{route('tamozhnya-add.edit', $tamozhnya->id)}}?download=dogovor">Скачать Договор</a>
                            <a href="{{route('tamozhnya-add.edit', $tamozhnya->id)}}?download=za">Скачать Заявление</a>
                            <a href="{{route('tamozhnya-add.edit', $tamozhnya->id)}}?download=polis">Скачать Полис</a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                                <li class="breadcrumb-item active">Редактировать Анкету</li>
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="col-form-label">Период страхования</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input value="{{$tamozhnya->from_date}}" type="date" id="from_date"
                                                   name="from_date"
                                                   @if($errors->has('from_date'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                   @endif required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-form-label">Период страхования</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input value="{{$tamozhnya->to_date}}" type="date" id="to_date"
                                                       name="to_date"
                                                       @if($errors->has('to_date'))
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
                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="warehouse_volume" class="col-form-label">Объём площади склада</label>
                                    <input value="{{$tamozhnya->warehouse_volume}}" type="text" id="warehouse_volume"
                                           name="warehouse_volume"
                                           @if($errors->has('warehouse_volume'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="geographic-zone">Объем товара:</label>
                                    <div class="input-group mb-4">
                                        <input value="{{$tamozhnya->product_volume}}" type="number" id="product_volume"
                                               name="product_volume"
                                               @if($errors->has('product_volume'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif required>
                                        <div class="input-group-append">
                                            <select class="form-control success" name="product_volume_unit" style="width: 100%;">
                                                <option @if($tamozhnya->product_volume_unit == 'Литр') selected="selected" @endif value="Литр">Литр</option>
                                                <option @if($tamozhnya->product_volume_unit == 'Тонна') selected="selected" @endif value="Тонна">Тонна</option>
                                                <option @if($tamozhnya->product_volume_unit == 'Штука') selected="selected" @endif value="Штука">Штука</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_sum" class="col-form-label">Общая стоимость:</label>
                                    <input value="{{$tamozhnya->total_sum}}" type="text" id="total_sum"
                                           name="total_sum"
                                           @if($errors->has('total_sum'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Период нахождения товара на складе</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">с</span>
                                    </div>
                                    <input value="{{$tamozhnya->na_sklade_from_date}}" type="date" id="na_sklade_from_date"
                                           name="na_sklade_from_date"
                                           @if($errors->has('na_sklade_from_date'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Период нахождения товара на складе</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>
                                        <input value="{{$tamozhnya->na_sklade_to_date}}" type="date" id="na_sklade_to_date"
                                               name="na_sklade_to_date"
                                               @if($errors->has('na_sklade_to_date'))
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
                                        <input id="strahovaya_sum" name="strahovaya_sum" value="{{$tamozhnya->strahovaya_sum}}"
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
                                        <input id="strahovaya_purpose" name="strahovaya_purpose" value="{{$tamozhnya->strahovaya_purpose}}"
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
                                        <input id="franshiza" name="franshiza" value="{{$tamozhnya->franshiza}}"
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
                                            <input id="serial_number_policy" name="serial_number_policy" value="{{$tamozhnya->serial_number_policy}}"
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
                                            <input id="date_issue_policy" name="date_issue_policy" value="{{$tamozhnya->date_issue_policy}}"
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
                                                    <option @if($tamozhnya->otvet_litso == $agent->id) selected
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
            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>

@endsection
