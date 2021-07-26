@extends('layouts.index')

@section('content')
    <form action="{{route('zalog_tehnika.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @include('includes.client')

                    @include('includes.beneficiary')

                    @include('includes.pledger')

                    <div class="card card-info" id="contract-special-equipment-pledge">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные поля контракта</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-special-equipment-pledge-pledge-agreement-number" class="col-form-label">
                                            Номер договора залога
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.pledge_agreement_number')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-pledge-agreement-number"
                                               name="contract_special_equipment_pledge[pledge_agreement_number]"
                                               type="text"
                                               value="{{old('contract_special_equipment_pledge.pledge_agreement_number', $contract_special_equipment_pledge->pledge_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="contract-special-equipment-pledge-pledge-agreement-from" class="col-form-label">
                                        Период договора залога
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.pledge_agreement_from')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-pledge-agreement-from"
                                               name="contract_special_equipment_pledge[pledge_agreement_from]"
                                               type="date"
                                               value="{{old('contract_special_equipment_pledge.pledge_agreement_from', $contract_special_equipment_pledge->pledge_agreement_from)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="contract-special-equipment-pledge-pledge-agreement-to" class="col-form-label">
                                        Период договора залога
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.pledge_agreement_to')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-pledge-agreement-to"
                                               name="contract_special_equipment_pledge[pledge_agreement_to]"
                                               type="date"
                                               value="{{old('contract_special_equipment_pledge.pledge_agreement_to', $contract_special_equipment_pledge->pledge_agreement_to)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-special-equipment-pledge-estimation-basement" class="col-form-label">
                                            Основание для оценки
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.estimation_basement')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-estimation-basement"
                                               name="contract_special_equipment_pledge[estimation_basement]"
                                               type="text"
                                               value="{{old('contract_special_equipment_pledge.estimation_basement', $contract_special_equipment_pledge->estimation_basement)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Наличие пожарной сигнализации и средств пожаротушения
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE)) checked @endif
                                                           onclick="toggle('fire', true)"
                                                           type="radio"
                                                           id="radio-fire-yes"
                                                           name="radio_fire"
                                                           value="1" />

                                                    <label for="radio-fire-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE)) checked @endif
                                                           onclick="toggle('fire', false)"
                                                           type="radio"
                                                           id="radio-fire-no"
                                                           name="radio_fire"
                                                           value="0" />

                                                    <label for="radio-fire-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="fire"
                                         @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE)) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="files-fire-certificate" class="col-form-label">
                                                        Прикрепите сертификат
                                                    </label>

                                                    @if($file = $contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE))
                                                        <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                    @endif

                                                    <input class="form-control @error('files.fire_certificate') is-invalid @enderror"
                                                           id="files-fire-certificate"
                                                           name="files[fire_certificate]"
                                                           type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Наличие охранной сигнализации и средств защиты/охраны
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE)) checked @endif
                                                           onclick="toggle('security', true)"
                                                           type="radio"
                                                           id="radio-security-yes"
                                                           name="radio_security"
                                                           value="1" />

                                                    <label for="radio-security-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE)) checked @endif
                                                           onclick="toggle('security', false)"
                                                           type="radio"
                                                           id="radio-security-no"
                                                           name="radio_security"
                                                           value="0" />

                                                    <label for="radio-security-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="security"
                                         @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE)) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="files-security-certificate" class="col-form-label">
                                                        Прикрепите сертификат
                                                    </label>

                                                    @if($file = $contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE))
                                                        <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                    @endif

                                                    <input class="form-control @error('files.security_certificate') is-invalid @enderror"
                                                           id="files-security-certificate"
                                                           name="files[security_certificate]"
                                                           type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php $contract_model = $contract_special_equipment_pledge @endphp

                    @include('includes.properties')

                    @include('includes.policy_in_section')
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

                    $('#properties-' + number + '-insurance-premium').val(property_premium);

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
