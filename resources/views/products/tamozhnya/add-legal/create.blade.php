@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <form action="{{route('tamozhnya-add-legal.store')}}"
          method="POST"
          id="mainFormKasko"
          enctype="multipart/form-data">
        @csrf

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                <li class="breadcrumb-item active"><a href="/form">Договор</a></li>
                                <li class="breadcrumb-item active">Создать Договор</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <a href="{{url()->previous()}}" class="btn btn-info">Назад</a>
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
                            <h3 class="card-title">Сведения о товаре</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="beneficiary-name" class="col-form-label">Описание</label>
                                        <textarea id="description"
                                                  name="description"
                                                  @if($errors->has('description'))
                                                    class="form-control is-invalid"
                                                  @else
                                                    class="form-control"
                                                  @endif>
                                            {{old('description')}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Информация о подерженности рискам</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" id="beneficiary-card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="col-form-label">Период деятельности</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>
                                        <input id="from_date"
                                               name="from_date"
                                               value="{{old('from_date')}}"
                                               type="date"
                                               @if($errors->has('from_date'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Период деятельности</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input id="to_date"
                                                   name="to_date"
                                                   value="{{old('to_date')}}"
                                                   type="date"
                                                   @if($errors->has('to_date'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="insurer-okonh" class="col-form-label">Профессиональные риски</label>
                                        <input id="prof_riski"
                                               name="prof_riski"
                                               value="{{old('prof_riski')}}"
                                               type="text"
                                               @if($errors->has('prof_riski'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Были ли в Вашей практике случаи, когда  Вам была предъявлена претензия или иск таможенными органами РУз</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="checkbox icheck-success">
                                                    <input id="defects-1"
                                                           onclick="Go()"
                                                           type="radio"
                                                           class="pretenzii_in_ruz"
                                                           name="pretenzii_in_ruz"
                                                           value="1" />
                                                    <label for="defects-1">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success ">
                                                    <input id="defects-0"
                                                           onclick="Go()"
                                                           type="radio"
                                                           class="pretenzii_in_ruz"
                                                           name="pretenzii_in_ruz"
                                                           value="0" />
                                                    <label for="defects-0">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group defects_images"
                                             id="hide"
                                             @if (old('pretenzii_in_ruz') == 1)
                                                style="display: block;"
                                             @else
                                                style="display: none;"
                                             @endif>
                                            <label>Описание причины</label>
                                            <input id="prichina_pretenzii"
                                                   name="prichina_pretenzii"
                                                   value="{{old('prichina_pretenzii')}}"
                                                   type="text"
                                                   @if($errors->has('prichina_pretenzii'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif />
                                        </div>
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
                            <div id="transh-payment-schedule" class="d-none">
                                <div class="form-group">
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
                                            <tr id="payment-term-tr-0" data-field-number="0">
                                                <td><input type="text" class="form-control" name="payment_sum[]" /></td>
                                                <td><input type="date" class="form-control" name="payment_from[]" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="all-summ">Cтраховая сумма</label>
                                        <input id="strahovaya_sum"
                                               name="strahovaya_sum"
                                               value="{{old('strahovaya_sum')}}"
                                               type="number"
                                               @if($errors->has('strahovaya_sum'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Страховая премия</label>
                                        <input onchange="changeStrahPremiya()"
                                               id="strahovaya_purpose"
                                               readonly
                                               name="strahovaya_purpose"
                                               value="{{old('strahovaya_purpose')}}"
                                               type="number"
                                               @if($errors->has('strahovaya_purpose'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="geographic-zone">Франшиза</label>
                                        <input id="franshiza"
                                               name="franshiza"
                                               value="{{old('franshiza')}}"
                                               type="text"
                                               @if($errors->has('franshiza'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="geographic-zone">Тариф (%)</label>
                                            <input readonly
                                                   value="{{--$product->tarif--}}"
                                                   type="text"
                                                   name="tarif"
                                                   class="form-control" />
                                        </div>
                                    </div>
                                    <div class="icheck-success col-md-4">
                                        <input onchange="toggleBlock('tarif', 'data-tarif-descr')"
                                               class="form-check-input client-type-radio"
                                               type="checkbox"
                                               name="isOtherTarif"
                                               id="tarif" />
                                        <label class="form-check-label" for="tarif">Указать другой тариф в процентах</label>
                                    </div>

                                    <!-- TODO: Блок должен находится в скрытом состоянии отображаться только тогда, когда выбран checkbox "Тариф" -->

                                    <div class="form-group"
                                         data-tarif-descr
                                         style="display: none;">
                                        <label for="descrTarif" class="col-form-label">Укажите процент тарифа</label>
                                        <input class="form-control" id="descrTarif" name="otherTarif" type="number" />
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
                                            <select type="text"
                                                    id="serial_number_policy"
                                                    name="serial_number_policy"
                                                    @if($errors->has('serial_number_policy'))
                                                        class="form-control is-invalid"
                                                    @else
                                                        class="form-control"
                                                    @endif>
                                                <option value="0"></option>

                                                @foreach($policies as $series)
                                                    <option value="{{$series->id}}"
                                                            @if(old('serial_number_policy') == $series->id)
                                                                selected
                                                            @endif>
                                                        {{$series->code}}
                                                    </option>
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
                                            <input id="date_issue_policy"
                                                   name="date_issue_policy"
                                                   value="{{old('date_issue_policy')}}"
                                                   type="date"
                                                   @if($errors->has('date_issue_policy'))
                                                    class="form-control is-invalid"
                                                   @else
                                                    class="form-control"
                                                   @endif />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="otvet-litso">Ответственное лицо</label>
                                            <select id="otvet-litso"
                                                    name="litso"
                                                    style="width: 100%;"
                                                    required
                                                    @if($errors->has('litso'))
                                                        class="form-control is-invalid"
                                                    @else
                                                        class="form-control"
                                                    @endif>
                                                <option></option>

                                                @foreach($agents as $agent)
                                                    <option value="{{$agent->id}}"
                                                            @if(old('litso') == $agent->id)
                                                                selected
                                                            @endif>
                                                        {{$agent->surname}} {{$agent->name}} {{$agent->middle_name}}
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
                                        <input id="anketa_img"
                                               name="anketa_img"
                                               value="{{old('anketa_img')}}"
                                               type="file"
                                               @if($errors->has('anketa_img'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Договор</label>
                                        <input id="dogovor_img"
                                               name="dogovor_img"
                                               value="{{old('dogovor_img')}}"
                                               type="file"
                                               @if($errors->has('dogovor_img'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="polis-series" class="col-form-label">Полис</label>
                                        <input id="polis_img"
                                               name="polis_img"
                                               value="{{old('polis_img')}}"
                                               type="file"
                                               @if($errors->has('polis_img'))
                                                class="form-control is-invalid"
                                               @else
                                                class="form-control"
                                               @endif />
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
    <script>
        function Go() {
            document.getElementById('hide').style.display = document.getElementById('defects-1').checked ? 'block': 'none';
        }
    </script>
@endsection

@section('scripts')
    <script>
        var product_tarif = {{--$product->tarif / 100--}};
        const strah_premiya = document.getElementById('strahovaya_purpose');
        const strahovaya_sum = document.getElementById('strahovaya_sum');
        var descr_tarif = document.getElementById('descrTarif');

        strahovaya_sum.addEventListener('change', changeStrahPremiya);
        descr_tarif.addEventListener('change', changeStrahPremiya);

        function changeStrahPremiya() {
            var tarif = document.getElementById('tarif');

            // if tarif checkbox not checked -> use default tarif for that product
            if (!tarif.checked) {
                strah_premiya.value = (strahovaya_sum.value * product_tarif).toFixed(2);
            } else {
                strah_premiya.value = (strahovaya_sum.value * descr_tarif.value / 100).toFixed(2);
            }
        }
    </script>
@endsection
