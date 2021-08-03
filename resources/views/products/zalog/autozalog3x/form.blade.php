@extends('layouts.index')

@section('content')
    <form action="{{route('zalog_autozalog3x.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    <div class="card card-info" id="contract-trilateral-car-deposit">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-trilateral-car-deposit-credit-agreement-number" class="col-form-label">
                                            Номер кредитного договора
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_trilateral_car_deposit.credit_agreement_number')) is-invalid @endif"
                                               id="contract-trilateral-car-deposit-credit-agreement-number"
                                               name="contract_trilateral_car_deposit[credit_agreement_number]"
                                               type="text"
                                               value="{{old('contract_trilateral_car_deposit.credit_agreement_number', $contract_trilateral_car_deposit->credit_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-trilateral-car-deposit-credit-period-from">
                                            Период кредитного договора
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control @if($errors->has('contract_trilateral_car_deposit.credit_period_from')) is-invalid @endif"
                                                   id="contract-trilateral-car-deposit-credit-period-from"
                                                   name="contract_trilateral_car_deposit[credit_period_from]"
                                                   type="date"
                                                   value="{{old('contract_trilateral_car_deposit.credit_period_from', $contract_trilateral_car_deposit->credit_period_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="period_kredit_dogovor_to">
                                            Период кредитного договора
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input required
                                                   class="form-control @if($errors->has('contract_trilateral_car_deposit.credit_period_to')) is-invalid @endif"
                                                   id="contract-trilateral-car-deposit-credit-period-to"
                                                   name="contract_trilateral_car_deposit[credit_period_to]"
                                                   type="date"
                                                   value="{{old('contract_trilateral_car_deposit.credit_period_to', $contract_trilateral_car_deposit->credit_period_to)}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            При наружном осмотре ТС дефекты и повреждения?
                                        </label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_trilateral_car_deposit->defect_damage_comment) checked @endif
                                                           onclick="toggle('defect-damage-comment', true)"
                                                           type="radio"
                                                           id="radio-defect-damage-yes"
                                                           name="radio_defect_damage"
                                                           value="1" />

                                                    <label for="radio-defect-damage-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_trilateral_car_deposit->defect_damage_comment) checked @endif
                                                           onclick="toggle('defect-damage-comment', false)"
                                                           type="radio"
                                                           id="radio-defect-damage-no"
                                                           name="radio_defect_damage"
                                                           value="0" />

                                                    <label for="radio-defect-damage-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="defect-damage-comment"
                                         @if(!$contract_trilateral_car_deposit->defect_damage_comment) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contract-trilateral-car-deposit-defect-damage-comment" class="col-form-label">
                                                        Комментарий
                                                    </label>

                                                    <input class="form-control @if($errors->has('contract_trilateral_car_deposit.defect_damage_comment')) is-invalid @endif"
                                                           id="contract-trilateral-car-deposit-defect-damage-comment"
                                                           name="contract_trilateral_car_deposit[defect_damage_comment]"
                                                           type="text"
                                                           value="{{old('contract_trilateral_car_deposit.defect_damage_comment', $contract_trilateral_car_deposit->defect_damage_comment)}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="files-defect-damage-photo" class="col-form-label">
                                                        Прикрепите фотографии
                                                    </label>
                                                    @if($file = $contract_trilateral_car_deposit->getFile(\App\Model\ContractTrilateralCarDeposit::FILE_DEFECT_DAMAGE_PHOTO))
                                                        <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                    @endif
                                                    <input class="form-control @error('files.defect_damage_photo') is-invalid @enderror"
                                                           id="files-defect-damage-photo"
                                                           name="files[defect_damage_photo]"
                                                           type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты?
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_trilateral_car_deposit->actual_insurance_comment) checked @endif
                                                           onclick="toggle('actual-insurance-comment', true)"
                                                           type="radio"
                                                           id="radio-actual-insurance-yes"
                                                           name="radio_actual_insurance"
                                                           value="1" />

                                                    <label for="radio-actual-insurance-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_trilateral_car_deposit->actual_insurance_comment) checked @endif
                                                           onclick="toggle('actual-insurance-comment', false)"
                                                           type="radio"
                                                           id="radio-actual-insurance-no"
                                                           name="radio_actual_insurance"
                                                           value="0" />

                                                    <label for="radio-actual-insurance-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="actual-insurance-comment"
                                         @if(!$contract_trilateral_car_deposit->actual_insurance_comment) style="display: none;" @endif>
                                        <label for="contract-trilateral-car-deposit-actual-insurance-comment" class="col-form-label">
                                            Комментарий
                                        </label>

                                        <input class="form-control @if($errors->has('contract_trilateral_car_deposit.actual_insurance_comment')) is-invalid @endif"
                                               id="contract-trilateral-car-deposit-actual-insurance-comment"
                                               name="contract_trilateral_car_deposit[actual_insurance_comment]"
                                               type="text"
                                               value="{{old('contract_trilateral_car_deposit.actual_insurance_comment', $contract_trilateral_car_deposit->actual_insurance_comment)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies')
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

                let total_insurance_sum = 0;
                let total_insurance_premium = 0;
                let total_franchise = 0;

                $(policies).find('tbody > tr[id^=policy-row-]').each(function (i, element) {
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
            }
            function addPolicy() {
                let tbody = policies.querySelector('tbody');
                let counter = tbody.childElementCount - 1;

                while(document.getElementById('policy-row-' + counter)) {
                    counter++;
                }

                $.ajax({
                    url: '{{route("get_policy_for_table")}}',
                    type: 'post',
                    data: { key: counter, model: 'PolicyTrilateralCarDeposit' },
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

            const policies = document.querySelector('#policies');
            const button_add_policy = policies.querySelector('.ddgi-add-policy');
            if (button_add_policy) {
                button_add_policy.addEventListener('click', addPolicy);
            }
            if (policies) {
                policies.addEventListener('click', removePolicy);

                $(policies).delegate('.ddgi-policy-name', 'keyup', definePolicySeries);

                $(policies).delegate('.ddgi-policy-series', 'change', defineResponsiblePerson);

                $('#form-contract').delegate('.ddgi-calculate', 'change', calculation);

                $('.ddgi-policy-series').trigger('change');     // для show метода при загрузке страницы
                $('.ddgi-calculate').trigger('change');         // для show метода при загрузке страницы
            }

            $('form').submit(function(e) {
                $(':disabled').each(function(e) {
                    $(this).removeAttr('disabled');
                })
            });
        });
    </script>

    @yield('contract_js')
@endsection
