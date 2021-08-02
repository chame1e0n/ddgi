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

                                            <textarea class="form-control ddgi-calculate @error('contract_construction_installation_work.losses_description') is-invalid @enderror"
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

                                            <textarea class="form-control ddgi-calculate @error('contract_construction_installation_work.fence_description') is-invalid @enderror"
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
                                               class="form-control @error('policy_construction_installation_work.construction_installation_price') is-invalid @enderror"
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
                                               class="form-control @error('policy_construction_installation_work.construction_price') is-invalid @enderror"
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
                                               class="form-control @error('policy_construction_installation_work.equipment_price') is-invalid @enderror"
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
                                               class="form-control @error('policy_construction_installation_work.machine_price') is-invalid @enderror"
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
                                               class="form-control @error('policy_construction_installation_work.clear_location_price') is-invalid @enderror"
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
                                               class="form-control @error('policy_construction_installation_work.insurance_value') is-invalid @enderror"
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            function calculation() {
                let is_tariff = document.getElementById('contract-tariff-switch').checked;
                let is_premium = document.getElementById('contract-premium-switch').checked;

                let from = new Date($('#contract-from').val());
                let to = new Date($('#contract-to').val());
                let days = Math.round((to - from) / (24 * 60 * 60 * 1000)) + 1;

                let total_insurance_value = 0;
                let total_insurance_sum = 0;
                let total_insurance_premium = 0;
                let total_franchise = 0;

                // -- contract_(plural|singular)_export_cargo
                let contract_export_cargo_total = Number($('#contract-singular-export-cargo-shipped-goods-value').val()) +
                                                  Number($('#contract-singular-export-cargo-shipped-goods-paid').val()) +
                                                  Number($('#contract-singular-export-cargo-buyer-debt').val()) +
                                                  Number($('#contract-singular-export-cargo-overdue-amount-1-60').val()) +
                                                  Number($('#contract-singular-export-cargo-overdue-amount-60-180').val()) +
                                                  Number($('#contract-singular-export-cargo-paid-insurance-premium').val()) +
                                                  Number($('#contract-singular-export-cargo-penalty').val()) +
                                                  Number($('#contract-singular-export-cargo-other-expenses').val()) +
                                                  Number($('#contract-singular-export-cargo-shipped-goods-payment').val()) +
                                                  Number($('#contract-singular-export-cargo-unshipped-goods-payment').val())

                $('#contract-export-cargo-total').text(contract_export_cargo_total.toFixed(2));

                $('#policy').find('div.card-body').each(function (i, element) {
                    let insurance_premium = 0;
                    let policy_insurance_sum = Number($('#policy-insurance-sum').val());

                    if (!is_tariff && !is_premium) {
                        let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};

                        insurance_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_tariff) {
                        let tariff = $('#contract-tariff').val();

                        insurance_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_premium) {
                        insurance_premium = Number($('#contract-premium').val());
                    }

                    $('#insurance-premium').val(insurance_premium.toFixed(2));
                });
                $('#policies').find('tbody > tr[id^=policy-row-]').each(function (i, element) {
                    let number = element.id.replace('policy-row-', '');

                    if (number == 'total') {
                        $('#total-insurance-sum').val(total_insurance_sum.toFixed(2));
                        $('#total-insurance-premium').val(total_insurance_premium.toFixed(2));
                        $('#total-franchise').val(total_franchise.toFixed(2));

                        return;
                    }

                    let policy_insurance_sum = Number($('#policies-' + number + '-insurance-sum').val());
                    let policy_additional_sum = 0;
                    let policy_additional_premium = 0;

                    // -- policy_sportsman --
                    let policy_sportsman_sum = Number($('#policies-' + number + '-policy-sportsman-traumatic-sum').val()) + Number($('#policies-' + number + '-policy-sportsman-death-sum').val());

                    if (!window.isNaN(policy_sportsman_sum)) {
                        policy_additional_sum += policy_sportsman_sum;
                    }

                    $('#policies-' + number + '-policy-sportsman-total-sum').val(policy_additional_sum);

                    let policy_sportsman_premium = Number($('#policies-' + number + '-policy-sportsman-traumatic-premium').val()) + Number($('#policies-' + number + '-policy-sportsman-death-premium').val());

                    if (!window.isNaN(policy_sportsman_premium)) {
                        policy_additional_premium += policy_sportsman_premium;
                    }

                    $('#policies-' + number + '-policy-sportsman-total-premium').val(policy_additional_premium);

                    // -- policy_casco --
                    $('#policies-' + number + '-policy-casco-ec-driver-sum').val(Number($('#policies-' + number + '-policy-casco-ec-driver-amount').val()) * Number($('#policies-' + number + '-policy-casco-ec-driver-sum-for-person').val()));
                    $('#policies-' + number + '-policy-casco-ec-passenger-sum').val(Number($('#policies-' + number + '-policy-casco-ec-passenger-amount').val()) * Number($('#policies-' + number + '-policy-casco-ec-passenger-sum-for-person').val()));
                    $('#policies-' + number + '-policy-casco-ec-general-limit-sum').val(Number($('#policies-' + number + '-policy-casco-ec-general-limit-amount').val()) * Number($('#policies-' + number + '-policy-casco-ec-general-limit-sum-for-person').val()));

                    $('#policies-' + number + '-policy-casco-ec-total-sum').val(Number($('#policies-' + number + '-policy-casco-ec-driver-sum').val()) + Number($('#policies-' + number + '-policy-casco-ec-passenger-sum').val()) + Number($('#policies-' + number + '-policy-casco-ec-general-limit-sum').val()));
                    $('#policies-' + number + '-policy-casco-ec-total-premium').val(Number($('#policies-' + number + '-policy-casco-ec-driver-premium').val()) + Number($('#policies-' + number + '-policy-casco-ec-passenger-premium').val()) + Number($('#policies-' + number + '-policy-casco-ec-general-limit-premium').val()));

                    let policy_casco_ae_additional_insured_sum = Number($('#policies-' + number + '-policy-casco-ae-additional-insured-sum').val());
                    let policy_casco_ec_vehicle_death_recovery_sum = Number($('#policies-' + number + '-policy-casco-ec-vehicle-death-recovery-sum').val());
                    let policy_casco_ec_civil_liability_sum = Number($('#policies-' + number + '-policy-casco-ec-civil-liability-sum').val());
                    let policy_casco_ec_total_sum = Number($('#policies-' + number + '-policy-casco-ec-total-sum').val());

                    policy_casco_sum = policy_casco_ae_additional_insured_sum + policy_casco_ec_vehicle_death_recovery_sum + policy_casco_ec_civil_liability_sum + policy_casco_ec_total_sum;

                    $('#policies-' + number + '-policy-casco-total-sum').val(policy_casco_sum.toFixed(2));

                    if (!window.isNaN(policy_casco_sum)) {
                        policy_additional_sum += policy_casco_sum;
                    }

                    let policy_casco_ec_vehicle_death_recovery_premium = Number($('#policies-' + number + '-policy-casco-ec-vehicle-death-recovery-premium').val());
                    let policy_casco_ec_civil_liability_premium = Number($('#policies-' + number + '-policy-casco-ec-civil-liability-premium').val());
                    let policy_casco_ec_total_premium = Number($('#policies-' + number + '-policy-casco-ec-total-premium').val());

                    policy_casco_premium = policy_casco_ec_vehicle_death_recovery_premium + policy_casco_ec_civil_liability_premium + policy_casco_ec_total_premium;

                    $('#policies-' + number + '-policy-casco-total-premium').val(policy_casco_premium.toFixed(2));

                    if (!window.isNaN(policy_casco_premium)) {
                        policy_additional_premium += policy_casco_premium;
                    }

                    // -- policy --
                    $('#policies-' + number + '-insurance-sum-plus').text('+ ' + policy_additional_sum.toFixed(2));
                    $('#policies-' + number + '-insurance-premium-plus').text('+ ' + policy_additional_premium.toFixed(2));

                    let policy_premium = 0;

                    if (!is_tariff && !is_premium) {
                        let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};

                        policy_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_tariff) {
                        let tariff = $('#contract-tariff').val();

                        policy_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_premium) {
                        policy_premium = Number($('#contract-premium').val());
                    }

                    $('#policies-' + number + '-insurance-premium').val(policy_premium);

                    total_insurance_sum += policy_insurance_sum + policy_additional_sum;
                    total_insurance_premium += policy_premium + policy_additional_premium;
                    total_franchise += Number($('#policies-' + number + '-franchise').val());
                });
                $('#properties').find('tbody > tr[id^=property-row-]').each(function (i, element) {
                    let number = element.id.replace('property-row-', '');

                    if (number == 'total') {
                        $('#total-insurance-value').val(total_insurance_value.toFixed(2));
                        $('#total-insurance-sum').val(total_insurance_sum.toFixed(2));
                        $('#total-insurance-premium').val(total_insurance_premium.toFixed(2));

                        return;
                    }

                    let property_insurance_sum = Number($('#properties-' + number + '-insurance-sum').val());

                    let property_premium = 0;

                    if (!is_tariff && !is_premium) {
                        let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};

                        property_premium = (days * property_insurance_sum * tariff) / 365;
                    }
                    if (is_tariff) {
                        let tariff = $('#contract-tariff').val();

                        property_premium = (days * property_insurance_sum * tariff) / 365;
                    }
                    if (is_premium) {
                        property_premium = Number($('#contract-premium').val());
                    }

                    $('#properties-' + number + '-insurance-premium').val(property_premium.toFixed(2));

                    total_insurance_value += Number($('#properties-' + number + '-insurance-value').val());
                    total_insurance_sum += property_insurance_sum;
                    total_insurance_premium += property_premium
                });
            }
            function addPolicy() {
                let counter = document.getElementById('policies').querySelector('tbody').childElementCount - 1;

                while(document.getElementById('policy-row-' + counter)) {
                    counter++;
                }

                $.ajax({
                    url: '{{route("get_policy_for_table")}}',
                    type: 'post',
                    data: { key: counter, model: null },
                    dataType: 'json',
                    success: function (response) {
                        document.getElementById('policy-row-total').insertAdjacentHTML('beforebegin', response.template);
                    },
                    error: function (data) {
                        console.log('get policy template error', data);
                    }
                });
            }
            function removePolicy(event) {
                if (event.target.classList.contains('ddgi-remove-policy')) {
                    event.target.parentElement.parentElement.remove();

                    calculation();
                }
            }
            function addProperty() {
                let counter = document.getElementById('properties').querySelector('tbody').childElementCount - 1;

                while(document.getElementById('property-row-' + counter)) {
                    counter++;
                }

                $.ajax({
                    url: '{{route("get_property_for_table")}}',
                    type: 'post',
                    data: { key: counter },
                    dataType: 'json',
                    success: function (response) {
                        document.getElementById('property-row-total').insertAdjacentHTML('beforebegin', response.template);
                    },
                    error: function (data) {
                        console.log('get property template error', data);
                    }
                });
            }
            function removeProperty(event) {
                if (event.target.classList.contains('ddgi-remove-property')) {
                    event.target.parentElement.parentElement.remove();

                    calculation();
                }
            }
            function definePolicySeries() {
                let series = document.getElementById(this.id.replace('name', 'series'));

                $.ajax({
                    url: '{{route("get_policies")}}',
                    type: 'get',
                    data: { name: $(this).val() },
                    dataType: 'json',
                    success: function (response) {
                        $(series).empty();
                        $(series).append('<option></option>');

                        for (var i = 0; i < response.length; i++) {
                            $(series).append('<option value="' + response[i]['series']+ '">' + response[i]['series'] + '</option>');
                        }
                    }
                });
            }
            function defineResponsiblePerson() {
                let name = document.getElementById(this.id.replace('series', 'name'));
                let responsible_person = document.getElementById(this.id.replace('series', 'responsible-person'));

                $.ajax({
                    url: '{{route("get_policy_employee")}}',
                    type: 'get',
                    data: { name: $(name).val(), series: $(this).val() },
                    dataType: 'json',
                    success: function (response) {
                        $(responsible_person).val(response.surname + ' ' + response.name + ' ' + response.middlename);
                    }
                });
            }

            $('#form-contract').delegate('.ddgi-calculate', 'change', calculation);

            $('#policies').delegate('.ddgi-add-policy', 'click', addPolicy);
            $('#policies').delegate('.ddgi-remove-policy', 'click', removePolicy);

            $('#policies, #policy').delegate('.ddgi-policy-name', 'change', definePolicySeries);
            $('#policies, #policy').delegate('.ddgi-policy-series', 'change', defineResponsiblePerson);

            $('.ddgi-policy-name').trigger('keyup');        // для show метода при загрузке страницы
            $('.ddgi-policy-series').trigger('change');     // для show метода при загрузке страницы
            $('.ddgi-calculate').trigger('change');         // для show метода при загрузке страницы

            $('#properties').delegate('.ddgi-add-property', 'click', addProperty);
            $('#properties').delegate('.ddgi-remove-property', 'click', removeProperty);

            $('form').submit(function(e) {
                $(':disabled').each(function(e) {
                    $(this).removeAttr('disabled');
                })
            });
        });
    </script>
@endsection
