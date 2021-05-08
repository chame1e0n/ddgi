@extends('layouts.index')
@include('products._form_elements.blocks._svediniya_o_polise.create')
@include('products._form_elements.blocks._zagruzka_dokumentov.create')
@include('products._form_elements.blocks._obshie_svedeniya.create')
@include('products._form_elements.blocks._usloviya_oplati_strahovoy_premii.create')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('cmp.store') }}" id="mainFormKasko">
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
                                <div class="col-md-6">
                                    <label class="col-form-label">Период страхования</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>
                                        <input id="insurance_from" name="insurance_from" type="date"
                                               value="{{old('insurance_from')}}"
                                               @if($errors->has('insurance_from'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                                @endif >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Период страхования</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="insurance_to" name="insurance_to" type="date"
                                                   value="{{old('insurance_to')}}"
                                                   @if($errors->has('insurance_to'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex flex-column">
                                        <label class="col-form-label">Участники строительства</label>
                                        <div class="form-group mb-20">
                                            <button type="button" id="add-costruct-participant" class="btn btn-primary ">Добавить
                                            </button>
                                        </div>
                                        <div id="builders">
                                            <div class="form-group mb-20">
                                                <input type="text" name="сonstruct_participants" class="form-control">
                                            </div>
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
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" id="beneficiary-card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-name" class="col-form-label">Сведения о
                                                        договоре строительного порядка</label>
                                                    <input type="text" id="beneficiary-name"
                                                           name="object_info_dogov_stoy"
                                                           value="{{old('object_info_dogov_stoy')}}"
                                                           @if($errors->has('object_info_dogov_stoy'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-address" class="col-form-label">Объект
                                                        стриотельно-монтажных работ</label>
                                                    <input type="text" id="beneficiary-address" name="object_stroy_mont"
                                                           value="{{old('object_stroy_mont')}}"
                                                           @if($errors->has('object_stroy_mont'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-tel" class="col-form-label">Расположение
                                                        объекта</label>
                                                    <input type="text" id="beneficiary-tel" name="object_location"
                                                           value="{{old('object_location')}}"
                                                           @if($errors->has('object_location'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-schet" class="col-form-label">Страховая
                                                        стоимость</label>
                                                    <input type="text" id="beneficiary-schet"
                                                           name="object_insurance_sum"
                                                           value="{{old('object_insurance_sum')}}"
                                                           @if($errors->has('object_insurance_sum'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Период страхования</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">с</span>
                                                    </div>
                                                    <input id="insurance_from" name="object_from_date" type="date"
                                                           value="{{old('object_from_date')}}"
                                                           @if($errors->has('object_from_date'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Период страхования</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">до</span>
                                                        </div>
                                                        <input id="insurance_to" name="object_to_date" type="date"
                                                               value="{{old('object_to_date')}}"
                                                               @if($errors->has('object_to_date'))
                                                               class="form-control is-invalid"
                                                               @else
                                                               class="form-control"
                                                                @endif >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h3 class="card-title">Страхование ответственности</h3>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-mfo" class="col-form-label">Телесные
                                                        повреждения</label>
                                                    <input type="text" id="beneficiary-mfo" name="object_tel_povr"
                                                           value="{{old('object_tel_povr')}}"
                                                           @if($errors->has('object_tel_povr'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="beneficiary-bank" class="col-form-label">Материальный
                                                        ущерб</label>
                                                    <input type="text" id="beneficiary-bank" name="object_material"
                                                           value="{{old('object_material')}}"
                                                           @if($errors->has('object_material'))
                                                           class="form-control is-invalid"
                                                           @else
                                                           class="form-control"
                                                            @endif >
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <h3 class="card-title">Объекты находящиеся на площадке строительства
                                                </h3>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" name="highways" value="highways" id="highways">
                                                    <label class="form-check-label" for="highways">
                                                        Автомагистрали
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" name="bridgesAndOverpasses" value="bridgesAndOverpasses" id="bridgesAndOverpasses">
                                                    <label class="form-check-label" for="bridgesAndOverpasses">
                                                        Мосты, путепроводы
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="pipelines" name="pipelines" id="pipelines">
                                                    <label class="form-check-label" for="pipelines">
                                                        Трубопроводы
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="railways" name="railways" id="railways">
                                                    <label class="form-check-label" for="railways">
                                                        Железные дороги
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="damsAndEmbankments" name="damsAndEmbankments" id="damsAndEmbankments">
                                                    <label class="form-check-label" for="damsAndEmbankments">
                                                        Дамбы, набережные
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="groundWays" name="groundWays" id="groundWays">
                                                    <label class="form-check-label" for="groundWays">
                                                        Наземные пути
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="waterways" name="waterways" id="waterways">
                                                    <label class="form-check-label" for="waterways">
                                                        Водные пути
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="carParks" name="carParks" id="carParks">
                                                    <label class="form-check-label" for="carParks">
                                                        Автопарковки
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="lep" name="lep" id="lep">
                                                    <label class="form-check-label" for="lep">
                                                        ЛЭП
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="groundLines" name="groundLines" id="groundLines">
                                                    <label class="form-check-label" for="groundLines">
                                                        Наземные линии
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="undergroundLines" name="undergroundLines" id="undergroundLines">
                                                    <label class="form-check-label" for="undergroundLines">
                                                        Подземные линии
                                                    </label>
                                                </div>
                                                <div class="form-check icheck-success ">
                                                    <input class="form-check-input" type="checkbox" value="undergroundCables" name="undergroundCables" id="undergroundCables">
                                                    <label class="form-check-label" for="undergroundCables">
                                                        Подземные кабели
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="briefDescriptionObj" class="col-form-label">Краткое
                                                        описание по выбранному объекту</label>
                                                    <textarea class="form-control" id="briefDescriptionObj"></textarea>
                                                </div>
                                            </div>
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
                                            <label for="beneficiary-mfo" class="col-form-label ">Строительно
                                                монтажные</label>
                                            <input type="text" id="beneficiary-mfo" name="stroy_mont_sum"
                                                   value="{{old('stroy_mont_sum')}}"
                                                   @if($errors->has('stroy_mont_sum'))
                                                   class="form-control calc2 is-invalid"
                                                   @else
                                                   class="form-control calc2"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Строительные</label>
                                            <input type="text" id="beneficiary-bank" name="stroy_sum"
                                                   value="{{old('stroy_sum')}}"
                                                   @if($errors->has('stroy_sum'))
                                                   class="form-control calc3 is-invalid"
                                                   @else
                                                   class="form-control calc3"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Оборудование</label>
                                            <input type="text" id="beneficiary-bank" name="obor_sum"
                                                   value="{{old('obor_sum')}}"
                                                   @if($errors->has('obor_sum'))
                                                   class="form-control calc4 is-invalid"
                                                   @else
                                                   class="form-control calc4"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Стрительные машины и
                                                механизмы</label>
                                            <input type="text" id="beneficiary-bank" name="stroy_mash_sum"
                                                   value="{{old('stroy_mash_sum')}}"
                                                   @if($errors->has('stroy_mash_sum'))
                                                   class="form-control calc5 is-invalid"
                                                   @else
                                                   class="form-control calc5"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="beneficiary-bank" class="col-form-label">Расходы по расчистке
                                                территории</label>
                                            <input type="text" id="beneficiary-bank" name="rasx_sum"
                                                   value="{{old('rasx_sum')}}"
                                                   @if($errors->has('rasx_sum'))
                                                   class="form-control calc6 is-invalid"
                                                   @else
                                                   class="form-control calc6"
                                                    @endif >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Страховая премия</label>
                                            <input type="text" id="geographic-zone" name="insurance_prem_sum"
                                                   value="{{old('insurance_prem_sum')}}"
                                                   @if($errors->has('insurance_prem_sum'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="geographic-zone">Франшиза</label>
                                            <input type="text" id="geographic-zone" name="franchise_sum"
                                                   value="{{old('franchise_sum')}}"
                                                   @if($errors->has('franchise_sum'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                    @endif >
                                        </div>
                                    </div>
                                    @yield('_usloviya_oplati_strahovoy_premii_content')
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="geographic-zone">Общая страховая сумма</label>
                                            <input type="text" readonly id="geographic-zone" name="geo_zone" class="form-control calcSumm">
                                        </div>
                                    </div>
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
    </form>
@endsection

@section('scripts')
    @yield('_obshie_svedeniya_scripts')
    @yield('_svediniya_o_polise_scripts')
@endsection
