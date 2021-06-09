@extends('layouts.index')
@include('products._form_elements.blocks._principal.create')
@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.create')
@include('products._form_elements.blocks._svediniya_o_polise.create')
@include('products._form_elements.blocks._zagruzka_dokumentov.create')
@include('products._form_elements.elements._period_strahovaniya.create')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{route('garant.store')}}" id="mainFormKasko" enctype="multipart/form-data">
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
                                <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                                <li class="breadcrumb-item active">Создать Анкету</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                @include('includes.contract')

                <div class="card-body">
                    @include('includes.client')
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Принципал</h3>
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
                                    @yield('_principal_content')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Контрагент</h3>
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
                                            <label for="name_kontragent" class="col-form-label">Наименование
                                                контрагента</label>
                                            <input type="text" id="name_kontragent"
                                                   name="name_kontragent"
                                                   value="{{old('name_kontragent')}}"
                                                   @if($errors->has('oked_principal'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="agentskoe_soglashenie_nomer_kontragent" class="col-form-label">Агентское
                                                соглашение(№)</label>
                                            <input type="text" id="agentskoe_soglashenie_nomer_kontragent" name="agentskoe_soglashenie_nomer_kontragent"
                                                   value="{{old('agentskoe_soglashenie_nomer_kontragent')}}"
                                                   @if($errors->has('agentskoe_soglashenie_nomer_kontragent'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="agentskoe_soglashenie_data_kontragent" class="col-form-label">Агентское соглашение(от какого
                                                числа)</label>
                                            <div class="input-group">
                                                <input id="agentskoe_soglashenie_data_kontragent" name="agentskoe_soglashenie_data_kontragent" type="date"
                                                       value="{{old('agentskoe_soglashenie_data_kontragent')}}"
                                                       @if($errors->has('agentskoe_soglashenie_data_kontragent'))
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
                <div class="card-body">
                    <div id="anketa-fields">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dogovor_poruchitelstva" class="col-form-label">Договор
                                                    поручительство</label>
                                                <input type="text" id="dogovor_poruchitelstva" name="dogovor_poruchitelstva"
                                                       value="{{old('dogovor_poruchitelstva')}}"
                                                       @if($errors->has('dogovor_poruchitelstva'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                        @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="period_poruchitelstva_s">Период поручительство</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input id="period_poruchitelstva_s" name="period_poruchitelstva_s" type="date"
                                                   value="{{old('period_poruchitelstva_s')}}"
                                                   @if($errors->has('period_poruchitelstva_s'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="period_poruchitelstva_do">Период поручительство</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="period_poruchitelstva_do" name="period_poruchitelstva_do" type="date"
                                                       value="{{old('period_poruchitelstva_do')}}"
                                                       @if($errors->has('period_poruchitelstva_do'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                        @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @yield('_period_strahovaniya_content')
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_expect_from">Период ожидания</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="period_expect_from" name="period_expect_from" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="period_expect_to" name="period_expect_to" type="date"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Другие виды обеспечения по гарантии</label>
                                            <input type="text" id="geographic-zone" name="geo_zone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Другая информация</label>
                                            <input type="text" id="geographic-zone" name="geo_zone"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @yield('_usloviya_oplati_strahovoy_premii_content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('_svediniya_o_polise_content')
                @yield('_zagruzka_dokumentov_content')
            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    @yield('_principal_scripts')
    @yield('_svediniya_o_polise_scripts')
@endsection