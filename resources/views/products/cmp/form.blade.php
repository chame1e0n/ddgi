@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <form method="POST" action="{{ route('cmp.store') }}" id="mainFormKasko" enctype="multipart/form-data">
        <div class="content-wrapper">
            @csrf
            <div class="content-header">
                <div class="container-fluid">
                    @include('includes.messages')
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

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="period_insurance_from">Период страхования</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">с</span>
                                </div>
                                <input id="period_insurance_from" name="period_insurance_from" type="date"
                                       value="{{old('period_insurance_from')}}"
                                       @if($errors->has('period_insurance_from'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                        @endif>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group mb-3" style="margin-top: 33px">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">до</span>
                                </div>
                                <input id="period_insurance_to" name="period_insurance_to" type="date"
                                       value="{{old('period_insurance_to')}}"
                                       @if($errors->has('period_insurance_to'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                        @endif>
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
                                @if(!old('сonstruct_participants'))
                                    <div class="form-group mb-20">
                                        <input type="text" name="сonstruct_participants[]" class="form-control">
                                    </div>
                                @else
                                    @foreach(old('сonstruct_participants', []) as $key => $item)
                                        <div id="old_сonstruct_participants_{{$key}}" class="d-flex form-group mb-20">
                                            <input type="text" name="сonstruct_participants[]"
                                                   value="{{ $item }}" class="form-control mr-5">
                                            @if($key)
                                                <input onclick="removeEl('old_сonstruct_participants_{{$key}}')" type="button" value="Удалить"
                                                       class="btn btn-warning">
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="period_insurance_from">Период страхования</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">с</span>
                                                </div>
                                                <input id="period_insurance_from" name="period_insurance_from" type="date"
                                                       value="{{old('period_insurance_from')}}"
                                                       @if($errors->has('period_insurance_from'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                        @endif>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3" style="margin-top: 33px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">до</span>
                                                </div>
                                                <input id="period_insurance_to" name="period_insurance_to" type="date"
                                                       value="{{old('period_insurance_to')}}"
                                                       @if($errors->has('period_insurance_to'))
                                                       class="form-control is-invalid"
                                                       @else
                                                       class="form-control"
                                                        @endif>
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
                                    @php
                                        $i = 0;
                                    @endphp

                                    @foreach(\App\AllProduct::OBJECTS_ON_CONSTRUCTION_SITE as $key => $value)
                                    @if(!($i%4))
                                    @if($i)
                                    </div>
                                    @endif

                                    <div class="col-md-4">
                                        @endif

                                        <div class="form-check icheck-success ">
                                            <input class="form-check-input" type="checkbox" name="objekti_naxodyashiesya_na_ploshadke[]" value="{{$key}}" id="{{$key}}">
                                            <label class="form-check-label" for="{{$key}}">
                                                {{$value}}
                                            </label>
                                        </div>
                                        @php $i++; @endphp
                                    @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="briefDescriptionObj" class="col-form-label">Краткое
                                                описание по выбранному объекту</label>
                                            <textarea @if($errors->has('brief_description_of_object'))
                                                      class="form-control is-invalid"
                                                      @else
                                                      class="form-control"
                                                      @endif id="briefDescriptionObj" name="brief_description_of_object">{{old('brief_description_of_object')}}</textarea>
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
                                            <label for="stroy_mont_sum" class="col-form-label">Строительно
                                                монтажные</label>
                                            <input type="text" id="stroy_mont_sum" name="stroy_mont_sum"
                                                   value="{{old('stroy_mont_sum')}}"
                                                   @if($errors->has('stroy_mont_sum'))
                                                   class="form-control calcElement is-invalid"
                                                   @else
                                                   class="form-control calcElement"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="stroy_sum" class="col-form-label">Строительные</label>
                                            <input type="text" id="stroy_sum" name="stroy_sum"
                                                   value="{{old('stroy_sum')}}"
                                                   @if($errors->has('stroy_sum'))
                                                   class="form-control calcElement is-invalid"
                                                   @else
                                                   class="form-control calcElement"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="obor_sum" class="col-form-label">Оборудование</label>
                                            <input type="text" id="obor_sum" name="obor_sum"
                                                   value="{{old('obor_sum')}}"
                                                   @if($errors->has('obor_sum'))
                                                   class="form-control calcElement is-invalid"
                                                   @else
                                                   class="form-control calcElement"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stroy_mash_sum" class="col-form-label">Строительные машины и
                                                механизмы</label>
                                            <input type="text" id="stroy_mash_sum" name="stroy_mash_sum"
                                                   value="{{old('stroy_mash_sum')}}"
                                                   @if($errors->has('stroy_mash_sum'))
                                                   class="form-control calcElement is-invalid"
                                                   @else
                                                   class="form-control calcElement"
                                                    @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="rasx_sum" class="col-form-label">Расходы по расчистке
                                                территории</label>
                                            <input type="text" id="rasx_sum" name="rasx_sum"
                                                   value="{{old('rasx_sum')}}"
                                                   @if($errors->has('rasx_sum'))
                                                   class="form-control calcElement is-invalid"
                                                   @else
                                                   class="form-control calcElement"
                                                    @endif >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="obshaya_strahovaya_summa">Общая страховая сумма</label>
                                            <input type="text" readonly id="obshaya_strahovaya_summa" class="form-control calcSumm">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="payment-terms-form">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="all-product-insurance-bonus">Cтраховая премия</label>
                                                    <input type="text"
                                                           value="{{old('all_product.insurance_bonus')}}"
                                                           id="all-product-insurance-bonus"
                                                           name="all_product[insurance_bonus]"
                                                           @if(isset($insurance_bonus_all))
                                                            data-sum-two-all
                                                           @endif
                                                           @if($errors->has('all_product.insurance_bonus'))
                                                            class="form-control is-invalid"
                                                           @else
                                                            class="form-control"
                                                           @endif />
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="all-product-franchise">Франшиза</label>
                                                    <input type="text"
                                                           value="{{old('all_product.franchise')}}"
                                                           id="all-product-franchise"
                                                           name="all_product[franchise]"
                                                           @if($errors->has('all_product.franchise'))
                                                            class="form-control is-invalid"
                                                           @else
                                                            class="form-control"
                                                           @endif />
                                                </div>
                                            </div>

                                            <!-- TODO: Блок должен находится в скрытом состоянии и отображаться только тогда, когда выбран пункт "Транш" в условиях оплаты -->

                                            <div id="transh-payment-schedule"
                                                 class="col-md-12 @if(!old('all_product.payment_term') || old('all_product.payment_term') == 1)d-none @endif">
                                                <div class="pt-3 pb-3">
                                                    <div class="form-group">
                                                        <!-- TODO: Вынести код обработчика в отдельный файл -->

                                                        <button type="button" id="transh-payment-schedule-button" class="btn btn-primary ">
                                                            Добавить
                                                        </button>
                                                    </div>
                                                    <div class="table-responsive p-0"
                                                         style="max-height: 300px;">
                                                        <table class="table table-hover table-head-fixed" id="empTable3">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-nowrap">Сумма</th>
                                                                    <th class="text-nowrap">От</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if((old('all_product.payment_term') && old('all_product.payment_term') == 1) || !old('all_products_terms_transhes'))
                                                                <tr id="all-products-terms-transh-0" data-field-number="0">
                                                                    <td>
                                                                        <input type="text" class="form-control" name="all_products_terms_transhes[0][payment_sum]" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="date" class="form-control" name="all_products_terms_transhes[0][payment_from]" />
                                                                    </td>
                                                                </tr>
                                                            @else
                                                                @foreach(old('all_products_terms_transhes', []) as $key => $item)
                                                                    <tr id="all-products-terms-transh-{{$key}}"
                                                                        data-field-number="0">
                                                                        <td>
                                                                            <input type="text"
                                                                                   class="form-control"
                                                                                   value="{{$item['payment_sum']}}"
                                                                                   name="all_products_terms_transhes[{{$key}}][payment_sum]" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="date"
                                                                                   class="form-control"
                                                                                   value="{{$item['payment_from']}}"
                                                                                   name="all_products_terms_transhes[{{$key}}][payment_from]" />
                                                                        </td>

                                                                        @if($key)
                                                                            <td>
                                                                                <input type="button"
                                                                                       onclick="removeEl('all-products-terms-transh-{{$key}}')"
                                                                                       value="Удалить"
                                                                                       class="btn btn-warning" />
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            </tbody>
                                                        </table>
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="polis_name" class="col-form-label">Наименование</label>
                                            <select @if($errors->has('polis_name'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="polis_name"
                                                    name="polis_name"
                                                    style="width: 100%;" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="policy_id" class="col-form-label">Серийный номер</label>
                                            <select @if($errors->has('policy_id'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="policy_id"
                                                    name="policy_id"
                                                    style="width: 100%;" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="col-form-label">Дата выдачи страхового полиса </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"></span>
                                            </div>
                                            <input id="data_vidachi" name="data_vidachi" type="date"
                                                   value="{{old('data_vidachi')}}"
                                                   @if($errors->has('data_vidachi'))
                                                   class="form-control is-invalid"
                                                   @else
                                                   class="form-control"
                                                @endif >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet_litso">Ответственное лицо</label>
                                            <select @if($errors->has('otvet_litso'))
                                                    class="form-control is-invalid"
                                                    @else
                                                    class="form-control"
                                                    @endif id="otvet_litso" name="otvet_litso"
                                                    style="width: 100%;" required>
                                                <option></option>
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

@section('scripts')
    <script>
        //Get policy by policy id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getPolisNames')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;
                    var polisName = "{{ old('polis_name') ?? 0}}";
                    var polisNameField = $("#polis_name");

                    polisNameField.empty();

                    for (var i = 0; i < len; i++) {
                        var name = response[i]['polis_name'];

                        if (polisName && polisName == name) {
                            polisNameField.append("<option value='" + name + "' selected>" + name + "</option>");
                        } else {
                            polisNameField.append("<option value='" + name + "'>" + name + "</option>");
                        }
                    }

                    getPolicySeries(polisName);
                }
            });

            $("#polis_name").change(function () {
                var name = $(this).val();

                getPolicySeries(name);
            });

            function getPolicySeries(name) {
                if(name) {
                    $.ajax({
                        url: '{{route('getPolicyRelations')}}',
                        type: 'get',
                        data: {polis_name: name},
                        dataType: 'json',
                        success: function (response) {
                            var len = response.length;
                            var polisSeries = {{ old('policy_id') ?? 0}};
                            var polisSeriesField = $("#policy_id")

                            polisSeriesField.empty();
                            for (var i in response['series']) {
                                if (polisSeries == i) {
                                    polisSeriesField.append("<option value='" + i + "' selected>" + response['series'][i] + "</option>");
                                } else {
                                    polisSeriesField.append("<option value='" + i + "'>" + response['series'][i] + "</option>");
                                }

                            }
                        }
                    });
                }
            }
        });
    </script>
    <script>
        $.ajax({
            url: '{{route('getAgents')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {

                var len = response.length;
                let employee = $("#otvet_litso");

                employee.empty();
                employee.append("<option> </option>");
                var selected = {{old('otvet_litso') ?? 0}};
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];

                    if (id === 0) {
                        employee.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                    } else {
                        employee.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + response[i]['surname'] + " " + name + " " + response[i]['middle_name'] + "</option>");
                    }
                }
            }
        });
    </script>
    <script>
        // Need to add calcElelement to necessary input fields
        $(".calcElement").change(function() {
            var collection = $(".calcElement");
            var sum = 0;

            collection.each(function(index, number) {
                sum += Number(number.value);
            });

            $('.calcSumm').val(sum)
        })
    </script>
@endsection
