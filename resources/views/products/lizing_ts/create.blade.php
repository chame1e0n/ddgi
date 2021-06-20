@extends('layouts.index')
@include('products._form_elements.elements._dogovor_lizinga.create')
@include('products._form_elements.elements._period_dogovora.create')
@include('products._form_elements.elements._period_strahovaniya.create')
@include('products._form_elements.elements._geograficheskaya_zona.create')
@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.create')
@include('products._form_elements.blocks._svediniya_o_polise.create')

@section('content')
    <form method="POST" action="{{ route('lizing_ts.store') }}" id="mainFormKasko"
          enctype="multipart/form-data">
        <div class="content-wrapper">
            @csrf
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
                                    @yield('_dogovor_lizinga')
                                    @yield('_period_dogovora_content')
                                </div>

                                @yield('_period_strahovaniya_content')
                                @yield('_geograficheskaya_zona_content')
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
                    @yield('_usloviya_oplati_strahovoy_premii_content')
                </div>

                @yield('_svediniya_o_polise_content')
            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @yield('_svediniya_o_polise_scripts')
@endsection
