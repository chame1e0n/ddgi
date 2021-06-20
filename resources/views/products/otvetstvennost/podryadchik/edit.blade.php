@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form action="{{route('otvetstvennost-podryadchik.update', $all_product->id)}}" method="POST" enctype="multipart/form-data"
          id="mainFormKasko">
        @csrf
        @method('put')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="col-sm-6">
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
                    <div class="row mb-2">
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

                    <div class="card-body">
                        @include('includes.beneficiary')
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="geograph-zone">Географическая зона:</label>
                                        <input type="text" id="geograph-zone" name="geo_zone"
                                               value="{{$all_product->geo_zone}}"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="anketa-fields">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="сontract-agreement" class="col-form-label">Договор подряда </label>
                                        <input type="file" id="сontract-agreement" name="contract_agreement"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-geograph-zone">Географическая зона:</label>
                                        <input type="text" id="beneficiary-geograph-zone"
                                               name="beneficiary_geo_zone"
                                               value="{{$all_product->beneficiary_geo_zone}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="object-construct">Объект строительство</label>
                                        <input type="text" id="object-construct" name="construct_object"
                                               value="{{$all_product->construct_object}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="work-exp">Стаж работы</label>
                                        <input type="text" id="work-exp" name="work_exp"
                                               value="{{$all_product->work_exp}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="beneficiary-insurance-from">Период страхования</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input id="beneficiary-insurance-from" name="beneficiary_insurance_from"
                                                   value="{{$all_product->beneficiary_insurance_from}}"
                                                   type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="input-group mb-3" style="margin-top: 33px">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">по</span>
                                            </div>
                                            <input id="beneficiary-insurance-to" name="beneficiary_insurance_to"
                                                   value="{{$all_product->beneficiary_insurance_to}}"
                                                   type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="geographic-zone">Географическая зона:</label>
                                <input type="text" id="geographic-zone" name="geograph_zone"
                                       value="{{$all_product->geograph_zone}}"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Условия оплаты страховой премии</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
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
                                        <input type="text" id="all-summ" name="insurance_sum"
                                               value="{{$all_product->insurance_sum}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая премия</label>
                                        <input type="text" id="all-summ" name="insurance_bonus"
                                               value="{{$all_product->insurance_bonus}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Франшиза</label>
                                        <input type="text" id="all-summ" name="franchise"
                                               value="{{$all_product->franchise}}" class="form-control">
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
                                            <label for="polis-series" class="col-form-label">Серийный номер полиса
                                                страхования</label>
                                            <input type="text" id="polis-series" name="policy_series"
                                                   @if(!empty($all_product->allProductInfo[0]->policy_series))
                                                   value="{{$all_product->allProductInfo->where('policy_series', '!=', null)->first()->policy_series}}"
                                                   @endif
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="insurance_from" name="policy_insurance_from" type="date"
                                                   @if(!empty($all_product->allProductInfo->where('policy_insurance_from', '!=', null)->first()))
                                                   value="{{$all_product->allProductInfo->where('policy_series', '!=', null)->first()->policy_insurance_from}}"
                                                   @endif
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="col-form-label" for="otvet-litso">Ответственное лицо</label>
                                            <select class="form-control polises" id="otvet-litso" name="litso"
                                                    style="width: 100%;">
                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}"
                                                            @if(!empty($all_product->allProductInfo->where('policy_series', '!=', null)->first()->policy_insurance_from) and $all_product->allProductInfo->where('policy_series', '!=', null)->first()->otvet_litso) selected @endif>{{$agent->name}}
                                                    </option>
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
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
        </div>
    </form>
    <form action="{{route('otvetstvennost-podryadchik.destroy', $all_product->id)}}" method="post">
        @csrf
        @method('delete')
        <div class="card-footer">
            <button type="submit" class="btn btn-danger float-right">Удалить</button>
        </div>
    </form>
@endsection
