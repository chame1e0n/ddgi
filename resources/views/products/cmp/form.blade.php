@extends('layouts.index')

@section('content')
    <form action="{{route('cmp.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
          enctype="multipart/form-data"
          id="form-contract"
          method="POST">
        @csrf

        @if($contract->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                    <li class="breadcrumb-item active"><a href="#">Продукты</a></li>
                                    <li class="breadcrumb-item active">Создать Продукт</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    @include('includes.messages')

                    @include('includes.contract')

                    @include('includes.client')

                    <div class="card card-info" id="contract-construction-installation-work">
                        <div class="card-header">
                            <h3 class="card-title">Сведения об объекте</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="col-md-12" id="construction-participants">
                                        <label class="col-form-label">Участники строительства</label>

                                        <div class="table-responsive"
                                             style="max-height: 300px;">
                                            <table class="table table-hover table-head-fixed">
                                                <thead>
                                                    <tr>
                                                        <th class="text-nowrap">Имя</th>
                                                        <th>
                                                            <div style="margin-bottom: -10px;">
                                                                <button type="button" class="btn btn-primary ddgi-add-construction-participant">
                                                                    Добавить
                                                                </button>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($contract_construction_installation_work->construction_participants as $key => $construction_participant)
                                                    @include('includes.construction_participant_in_table')
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-description">
                                                Сведения о договоре строительного порядка
                                            </label>

                                            <input required
                                                   class="form-control @error('contract_construction_installation_work.description') is-invalid @enderror"
                                                   id="contract-construction-installation-work-description"
                                                   name="contract_construction_installation_work[description]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.description', $contract_construction_installation_work->description)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-object">
                                                Объект строительно-монтажных работ
                                            </label>

                                            <input required
                                                   class="form-control @error('contract_construction_installation_work.object') is-invalid @enderror"
                                                   id="contract-construction-installation-work-object"
                                                   name="contract_construction_installation_work[object]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.object', $contract_construction_installation_work->object)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-location">
                                                Расположение объекта
                                            </label>

                                            <input required
                                                   class="form-control @error('contract_construction_installation_work.location') is-invalid @enderror"
                                                   id="contract-construction-installation-work-location"
                                                   name="contract_construction_installation_work[location]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.location', $contract_construction_installation_work->location)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-injures">
                                                Телесные повреждения
                                            </label>

                                            <input required
                                                   class="form-control @error('contract_construction_installation_work.injures') is-invalid @enderror"
                                                   id="contract-construction-installation-work-injures"
                                                   name="contract_construction_installation_work[injures]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.injures', $contract_construction_installation_work->injures)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-material-damage">
                                                Материальный ущерб
                                            </label>

                                            <input required
                                                   class="form-control @error('contract_construction_installation_work.material_damage') is-invalid @enderror"
                                                   id="contract-construction-installation-work-material-damage"
                                                   name="contract_construction_installation_work[material_damage]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.material_damage', $contract_construction_installation_work->material_damage)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>Объекты находящиеся на площадке строительства</label>

                                        <div class="row">
                                        @foreach(\App\Model\ContractConstructionInstallationWork::$location_specificities as $value => $label)
                                            <div class="col-md-2">
                                                <div class="icheck-success ">
                                                    <input @if(in_array($value, $contract_construction_installation_work->location_specificity)) checked @endif
                                                           class="form-check-input"
                                                           id="contract-construction-installation-work-location-specificity-{{str_replace('_', '-', $value)}}"
                                                           name="contract_construction_installation_work[location_specificity][]"
                                                           type="checkbox" />

                                                    <label class="form-check-label" for="contract-construction-installation-work-location-specificity-{{str_replace('_', '-', $value)}}">
                                                        <small><strong>{{$label}}</strong></small>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-short-description">
                                                Краткое описание по выбранному объекту
                                            </label>

                                            <textarea class="form-control @error('contract_construction_installation_work.short_description') is-invalid @enderror"
                                                      id="contract-construction-installation-work-short-description"
                                                      name="contract_construction_installation_work[short_description]">
                                                {{old('contract_construction_installation_work.short_description', $contract_construction_installation_work->short_description)}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-distance">
                                                Расстояние до данных объектов
                                            </label>

                                            <input class="form-control @error('contract_construction_installation_work.distance') is-invalid @enderror"
                                                   id="contract-construction-installation-work-distance"
                                                   name="contract_construction_installation_work[distance]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.distance', $contract_construction_installation_work->distance)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-construction-work-description">
                                                Описание производимых строительных работ
                                            </label>

                                            <textarea class="form-control @error('contract_construction_installation_work.construction_work_description') is-invalid @enderror"
                                                      id="contract-construction-installation-work-construction-work-description"
                                                      name="contract_construction_installation_work[construction_work_description]">
                                                {{old('contract_construction_installation_work.construction_work_description', $contract_construction_installation_work->construction_work_description)}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-basement">
                                                Тип основания
                                            </label>

                                            <input class="form-control @error('contract_construction_installation_work.basement') is-invalid @enderror"
                                                   id="contract-construction-installation-work-basement"
                                                   name="contract_construction_installation_work[basement]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.basement', $contract_construction_installation_work->basement)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contract-construction-installation-work-maximum-excavation-depth">
                                                Максимальная глубина выемки
                                            </label>

                                            <input class="form-control @error('contract_construction_installation_work.maximum_excavation_depth') is-invalid @enderror"
                                                   id="contract-construction-installation-work-maximum-excavation-depth"
                                                   name="contract_construction_installation_work[maximum_excavation_depth]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.maximum_excavation_depth', $contract_construction_installation_work->maximum_excavation_depth)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="files-document">
                                                Загрузка необходимых документов
                                            </label>

                                            @foreach($contract_construction_installation_work->getFiles(\App\Model\ContractConstructionInstallationWork::FILE_DOCUMENT) as $file)
                                                <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                            @endforeach

                                            <input multiple
                                                   class="form-control @error('files.document') is-invalid @enderror"
                                                   id="files-document"
                                                   name="files[document][]"
                                                   type="file" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-success ">
                                            <input @if($contract_construction_installation_work->losses_description) checked @endif
                                                   class="form-check-input client-type-radio"
                                                   id="contract-construction-installation-work-losses-description-switch"
                                                   name="contract_construction_installation_work_losses_description_switch"
                                                   onchange="toggleSwitch(this, 'contract-construction-installation-work-losses-description-block')"
                                                   type="checkbox" />

                                            <label class="form-check-label" for="contract-construction-installation-work-losses-description-switch">
                                                Убытки
                                            </label>
                                        </div>
                                        <div class="form-group"
                                             id="contract-construction-installation-work-losses-description-block"
                                             @if(!$contract_construction_installation_work->losses_description) style="display: none;" @endif>
                                            <label for="contract-construction-installation-work-losses-description" class="col-form-label">
                                                Описание
                                            </label>

                                            <textarea class="form-control @error('contract_construction_installation_work.losses_description') is-invalid @enderror"
                                                      id="contract-construction-installation-work-losses-description"
                                                      name="contract_construction_installation_work[losses_description]">
                                                {{old('contract_construction_installation_work.losses_description', $contract_construction_installation_work->losses_description)}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-success ">
                                            <input @if($contract_construction_installation_work->fence_description) checked @endif
                                                   class="form-check-input client-type-radio"
                                                   id="contract-construction-installation-work-fence-description-switch"
                                                   name="contract_construction_installation_work_fence_description_switch"
                                                   onchange="toggleSwitch(this, 'contract-construction-installation-work-fence-description-block')"
                                                   type="checkbox" />

                                            <label class="form-check-label" for="contract-construction-installation-work-fence-description-switch">
                                                Ограждения
                                            </label>
                                        </div>
                                        <div class="form-group"
                                             id="contract-construction-installation-work-fence-description-block"
                                             @if(!$contract_construction_installation_work->fence_description) style="display: none;" @endif>
                                            <label for="contract-construction-installation-work-fence-description" class="col-form-label">
                                                Описание
                                            </label>

                                            <textarea class="form-control @error('contract_construction_installation_work.fence_description') is-invalid @enderror"
                                                      id="contract-construction-installation-work-fence-description"
                                                      name="contract_construction_installation_work[fence_description]">
                                                {{old('contract_construction_installation_work.fence_description', $contract_construction_installation_work->fence_description)}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="icheck-success ">
                                            <input @if($contract_construction_installation_work->security_fio) checked @endif
                                                   class="form-check-input client-type-radio"
                                                   id="contract-construction-installation-work-security-switch"
                                                   name="contract_construction_installation_work_security_switch"
                                                   onchange="toggleSwitch(this, 'contract-construction-installation-work-security-block')"
                                                   type="checkbox" />

                                            <label class="form-check-label" for="contract-construction-installation-work-security-switch">
                                                Охрана
                                            </label>
                                        </div>
                                        <div class="form-group"
                                             id="contract-construction-installation-work-security-block"
                                             @if(!$contract_construction_installation_work->security_fio) style="display: none;" @endif>
                                            <label for="contract-construction-installation-work-fence-description" class="col-form-label">
                                                ФИО охранника
                                            </label>

                                            <input class="form-control @error('contract_construction_installation_work.security_fio') is-invalid @enderror"
                                                   id="contract-construction-installation-work-security-fio"
                                                   name="contract_construction_installation_work[security_fio]"
                                                   type="text"
                                                   value="{{old('contract_construction_installation_work.security_fio', $contract_construction_installation_work->security_fio)}}" />

                                            <label for="contract-construction-installation-work-security-schedules" class="col-form-label">
                                                Режим
                                            </label>

                                            <select class="form-control @error('contract_construction_installation_work.security_schedules') is-invalid @enderror"
                                                    id="contract-construction-installation-work-security-schedules"
                                                    name="contract_construction_installation_work[security_schedules]"
                                                    style="width: 100%;">
                                                @foreach(\App\Model\ContractConstructionInstallationWork::$security_schedules as $value => $label)
                                                    <option @if($value == old('contract_construction_installation_work.security_schedules', $contract_construction_installation_work->security_schedules)) selected @endif
                                                            value="{{$value}}">
                                                        {{$label}}
                                                    </option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policy_in_section')

                    <div class="card card-info" id="policy-construction-installation-work">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные поля полиса</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="policy-construction-installation-work-construction-installation-price">
                                            Страховая сумма на строительно-монтажные работы
                                        </label>

                                        <input required
                                               class="form-control ddgi-calculate @error('policy_construction_installation_work.construction_installation_price') is-invalid @enderror"
                                               id="policy-construction-installation-work-construction-installation-price"
                                               name="policy_construction_installation_work[construction_installation_price]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policy_construction_installation_work.construction_installation_price', $policy_construction_installation_work->construction_installation_price)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="policy-construction-installation-work-construction-price">
                                            Страховая сумма на строительные работы
                                        </label>

                                        <input required
                                               class="form-control ddgi-calculate @error('policy_construction_installation_work.construction_price') is-invalid @enderror"
                                               id="policy-construction-installation-work-construction-price"
                                               name="policy_construction_installation_work[construction_price]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policy_construction_installation_work.construction_price', $policy_construction_installation_work->construction_price)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="policy-construction-installation-work-equipment-price">
                                            Страховая сумма на оборудование
                                        </label>

                                        <input required
                                               class="form-control ddgi-calculate @error('policy_construction_installation_work.equipment_price') is-invalid @enderror"
                                               id="policy-construction-installation-work-equipment-price"
                                               name="policy_construction_installation_work[equipment_price]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policy_construction_installation_work.equipment_price', $policy_construction_installation_work->equipment_price)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="policy-construction-installation-work-machine-price">
                                            Страховая сумма на строительные машины и механизмы
                                        </label>

                                        <input required
                                               class="form-control ddgi-calculate @error('policy_construction_installation_work.machine_price') is-invalid @enderror"
                                               id="policy-construction-installation-work-machine-price"
                                               name="policy_construction_installation_work[machine_price]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policy_construction_installation_work.machine_price', $policy_construction_installation_work->machine_price)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-construction-installation-work-clear-location-price">
                                            Расходы по расчистке территории
                                        </label>

                                        <input required
                                               class="form-control ddgi-calculate @error('policy_construction_installation_work.clear_location_price') is-invalid @enderror"
                                               id="policy-construction-installation-work-clear-location-price"
                                               name="policy_construction_installation_work[clear_location_price]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policy_construction_installation_work.clear_location_price', $policy_construction_installation_work->clear_location_price)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-construction-installation-work-insurance-value">
                                            Страховая стоимость
                                        </label>

                                        <input required
                                               class="form-control ddgi-calculate @error('policy_construction_installation_work.insurance_value') is-invalid @enderror"
                                               id="policy-construction-installation-work-insurance-value"
                                               name="policy_construction_installation_work[insurance_value]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policy_construction_installation_work.insurance_value', $policy_construction_installation_work->insurance_value)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="policy-construction-installation-work-total">
                                            Общая страховая сумма
                                        </label>

                                        <input disabled="disabled"
                                               class="form-control"
                                               id="policy-construction-installation-work-total"
                                               type="text"
                                               value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            @if(!$block)
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" id="form-save-button">
                        {{$contract->exists ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
