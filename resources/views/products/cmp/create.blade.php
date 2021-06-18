@extends('layouts.index')
@include('products._form_elements.elements._period_strahovaniya.create')
@include('products._form_elements.elements._svedenija_o_dogovore_stroitelnogo_porjadka.create')
@include('products._form_elements.elements._obekt_striotelno_montaj.create')
@include('products._form_elements.elements._raspolojenie_obekta.create')
@include('products._form_elements.elements._strahovaya_stoimost.create')
@include('products._form_elements.elements._period_strahovaniya.create')
@include('products._form_elements.elements._uchastniki_stroitelstva.create')
@include('products._form_elements.elements._telesnye_povrejdenija.create')
@include('products._form_elements.elements._materialnij_usherb.create')
@include('products._form_elements.elements._obekti_nahodashiesja_na_ploshadke.create')
@include('products._form_elements.elements._kratkoe_opisaniye_po_vibrannomu_obektu.create')
@include('products._form_elements.elements._stroitelno_montajnie.create')
@include('products._form_elements.elements._stroitelnie.create')
@include('products._form_elements.elements._oborudovanie.create')
@include('products._form_elements.elements._stroitelnie_mashini_i_mehanizmi.create')
@include('products._form_elements.elements._rasxodi_po_raschistke_territorii.create')
@include('products._form_elements.elements._obshaya_strahovaya_summa.create')
@include('products._form_elements.blocks._svediniya_o_polise.create')
@include('products._form_elements.blocks._zagruzka_dokumentov.create')
@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.create', ['withoutInsuranceSum'=>1])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('cmp.store') }}" id="mainFormKasko" enctype="multipart/form-data">
        <div class="content-wrapper">
            @csrf
            <div class="content-header">
                <div class="container-fluid">
                    @include('layouts._success_or_error')
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"><a href="#">Продукт</a></li>
                                <li class="breadcrumb-item active">Создать Продукт</li>
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

                    @yield('_period_strahovaniya_content')
                    @yield('_uchastniki_stroitelstva_content')

                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Сведения об объекте</h3>
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
                                    @yield('_svedenija_o_dogovore_stroitelnogo_porjadka_content')
                                    @yield('_obekt_striotelno_montaj_content')
                                    @yield('_raspolojenie_obekta_content')
                                    @yield('_strahovaya_stoimost_content')
                                    @yield('_period_strahovaniya_content')

                                    <div class="col-12">
                                        <h3 class="card-title">Страхование ответственности</h3>
                                    </div>

                                    @yield('_telesnye_povrejdenija_content')
                                    @yield('_materialnij_usherb_content')
                                    @yield('_obekti_nahodashiesja_na_ploshadke_content')
                                    @yield('_kratkoe_opisaniye_po_vibrannomu_obektu_content')

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="distanceToObect" class="col-form-label">Расстояние до
                                                данных объектов</label>
                                            <input type="text" id="distanceToObect" name="distanceToObj" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descСonstructWorks" class="col-form-label">Описание
                                                производимых строительных работ</label>
                                            <textarea class="form-control" id="descСonstructWorks"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="typeBase" class="col-form-label">Тип основания</label>
                                            <input type="text" id="typeBase" name="typeBase" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="maxRecessDepth" class="col-form-label">Максимальная
                                                глубина выемки</label>
                                            <input type="text" id="maxRecessDepth" name="maxRecessDepth" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="col-md-6">
                                            <div class="icheck-success ">
                                                <input onchange="toggleBlock('losses', 'data-losses-descr')" class="form-check-input client-type-radio" type="checkbox" name="losses" id="losses">
                                                <label class="form-check-label" for="losses">Убытки</label>
                                            </div>
                                            <!-- TODO: Блок должен находится в скрытом состоянии
                                            отображаться только тогда, когда выбран checkbox "Убытки"
                                        -->
                                            <div class="form-group" data-losses-descr style="display: none">
                                                <label for="descrLosses" class="col-form-label">Описание</label>
                                                <textarea class="form-control" id="descrLosses"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="icheck-success ">
                                                <input onchange="toggleBlock('fences', 'data-fence-descr')" class="form-check-input client-type-radio" type="checkbox" name="fences" id="fences">
                                                <label class="form-check-label" for="fences">Ограждения</label>
                                            </div>
                                            <!-- TODO: Блок должен находится в скрытом состоянии
                                            отображаться только тогда, когда выбран checkbox "Ограждение"
                                        -->
                                            <div class="form-group" data-fence-descr style="display: none">
                                                <label for="descrFences" class="col-form-label">Описание</label>
                                                <textarea class="form-control" id="descrFences"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="icheck-success ">
                                                <input onchange="toggleBlock('security', 'data-security')" class="form-check-input" type="checkbox" name="security" id="security">
                                                <label class="form-check-label" for="security">Охрана</label>
                                            </div>
                                            <!-- TODO: Блок должен находится в скрытом состоянии
                                            отображаться только тогда, когда выбран checkbox "Охрана"
                                        -->
                                            <div data-security style="display: none">
                                                <div class="form-group">
                                                    <label for="securityFio" class="col-form-label">ФИО
                                                        охранника</label>
                                                    <input type="text" id="securityFio" name="securityFio" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="workMode" class="col-form-label">Режим</label>
                                                    <select class="form-control polises" id="workMode" name="workMode" style="width: 100%;">
                                                        <option selected="selected" value="aroundClock">
                                                            Круглосуточно
                                                        </option>
                                                        <option value="day">Днем</option>
                                                        <option value="night">Ночью</option>
                                                        <option value="weekends">Выходные дни</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label" for="documentForConstructObj">Загрузка
                                                необходимых документов</label>
                                            <input class="form-control" id="documentForConstructObj" type="file" multiple name="documentsForConstructObj[]">
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
                                    @yield('_stroitelno_montajnie_content')
                                    @yield('_stroitelnie_content')
                                    @yield('_oborudovanie_content')
                                    @yield('_stroitelnie_mashini_i_mehanizmi_content')
                                    @yield('_rasxodi_po_raschistke_territorii_content')
                                </div>
                                <div class="row">
                                    @yield('_obshaya_strahovaya_summa_content')
                                </div>
                                @yield('_usloviya_oplati_strahovoy_premii_content')
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
    @yield('_svediniya_o_polise_scripts')
    @yield('_obshaya_strahovaya_summa_scripts')
@endsection
