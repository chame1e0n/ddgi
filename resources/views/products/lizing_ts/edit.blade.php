@extends('layouts.index')
@include('products._form_elements.elements._dogovor_lizinga.edit')
@include('products._form_elements.elements._period_dogovora.edit')
@include('products._form_elements.blocks._obshie_svedeniya.edit')
@include('products._form_elements.blocks._vigodopriopredatel.edit')
@include('products._form_elements.elements._period_strahovaniya.edit')
@include('products._form_elements.elements._geograficheskaya_zona.edit')
@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.edit')
@include('products._form_elements.blocks._zagruzka_dokumentov.edit')
@include('products._form_elements.blocks._svediniya_o_polise.edit', ['productInformation' => $product->allProductInfo()->first()])

@section('content')
    <form method="POST" action="{{ route('lizing_ts.update', $product->id) }}" id="mainFormKasko"
          enctype="multipart/form-data">
        <div class="content-wrapper">
            @csrf
            @method('PUT')
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
                @include('products.select')


                <div class="card-body">
                    <div class="card card-info" id="clone-insurance">
                        <div class="card-header">
                            <h3 class="card-title">Общие сведения</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @yield('_obshie_svedeniya_content')
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-info" id="clone-beneficiary">
                                <div class="card-header">
                                    <h3 class="card-title">Выгодоприобретатель</h3>
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
                                            @yield('_vigodopriobretatel_content')
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
                                    @yield('_dogovor_lizinga')
                                    @yield('_period_dogovora_content')
                                </div>

                                @yield('_period_strahovaniya_content')
                                @yield('_geograficheskaya_zona_content')
                            </div>
                        </div>
                    </div>
                </div>

                {{--                TODO finish --}}
                {{--                <div class="card card-success">--}}
                {{--                    <div class="card-header">--}}
                {{--                        <h3 class="card-title">Сведени о трансортных средствах</h3>--}}
                {{--                        <div class="card-tools">--}}
                {{--                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"--}}
                {{--                                    title="Collapse">--}}
                {{--                                <i class="fas fa-minus"></i>--}}
                {{--                            </button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <div class="form-group">--}}
                {{--                            <button type="button" id="addTcButton" class="btn btn-primary ">Добавить</button>--}}
                {{--                        </div>--}}
                {{--                        <div class="table-responsive p-0 " style="max-height: 300px;">--}}
                {{--                            <div id="product-fields" data-info-table class="product-fields" data-field-number="0">--}}
                {{--                                <table data-info-table class="table table-hover table-head-fixed" id="empTable">--}}
                {{--                                    <thead>--}}
                {{--                                    <tr>--}}
                {{--                                        <th class="text-nowrap">Год выпуска</th>--}}
                {{--                                        <th class="text-nowrap">Марка</th>--}}
                {{--                                        <th class="text-nowrap">Дата выдачи</th>--}}
                {{--                                        <th class="text-nowrap">Модель</th>--}}
                {{--                                        <th class="text-nowrap">Гос. номер</th>--}}
                {{--                                        <th class="text-nowrap">Номер тех паспорта</th>--}}
                {{--                                        <th class="text-nowrap">Номер двигателя</th>--}}
                {{--                                        <th class="text-nowrap">Номер кузова</th>--}}
                {{--                                        <th class="text-nowrap">Страховая стоимость</th>--}}
                {{--                                        <th class="text-nowrap">Страховая сумма</th>--}}
                {{--                                        <th class="text-nowrap">Страховая премия</th>--}}
                {{--                                        <th class="text-nowrap">Франшиза</th>--}}
                {{--                                    </tr>--}}
                {{--                                    </thead>--}}
                {{--                                    <tbody>--}}
                {{--                                    <tr>--}}
                {{--                                        <td colspan="8" style="text-align: right"><label class="text-bold">Итого</label>--}}
                {{--                                        </td>--}}
                {{--                                        <td><input readonly data-insurance-stoimost type="text"--}}
                {{--                                                   class="form-control overall-sum"/></td>--}}
                {{--                                        <td><input readonly data-insurance-sum type="text"--}}
                {{--                                                   class="form-control overall-sum4"/></td>--}}
                {{--                                        <td><input readonly data-insurance-award type="text"--}}
                {{--                                                   class="form-control overall-sum3"/></td>--}}
                {{--                                        <td><input readonly data-insurance-franchise type="text"--}}
                {{--                                                   class="form-control overall-sum3"/></td>--}}
                {{--                                    </tr>--}}
                {{--                                    </tbody>--}}
                {{--                                </table>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div id="general-product-fields">--}}
                {{--                    </div>--}}
                {{--                </div>--}}



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
                @yield('_zagruzka_dokumentov_content')

            </section>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right" id="form-save-button">Сохранить</button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    @yield('_obshie_svedeniya_scripts')
    @yield('_svediniya_o_polise_scripts')
    @yield('_vigodopriobretatel_scripts')
@endsection
