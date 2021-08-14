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
                                      Number($('#contract-singular-export-cargo-unshipped-goods-payment').val());

    $('#contract-export-cargo-total').text(contract_export_cargo_total.toFixed(2));

    // -- contract_custom_officer --
    let contract_custom_officer_activity_period_from = $('#contract-custom-officer-activity-period-from').get(0);
    let contract_custom_officer_activity_period_to = $('#contract-custom-officer-activity-period-to').get(0);

    let contract_custom_officer_activity_period = 0;
    if (contract_custom_officer_activity_period_from && contract_custom_officer_activity_period_to) {
        contract_custom_officer_activity_period = (contract_custom_officer_activity_period_to.valueAsDate - contract_custom_officer_activity_period_from.valueAsDate) / (1000 * 60 * 60 * 24);
    }

    contract_custom_officer_activity_period = contract_custom_officer_activity_period >= 0 ? contract_custom_officer_activity_period.toFixed(0) + ' дней' : '';

    $('#contract-custom-officer-activity-period').val(contract_custom_officer_activity_period);

    let custom_officer_annual_turnover_money = Number($('#contract-custom-officer-annual-turnover-first-money').val()) +
                                               Number($('#contract-custom-officer-annual-turnover-second-money').val());

    if (custom_officer_annual_turnover_money) {
        $('#annual-turnover-money').val(custom_officer_annual_turnover_money.toFixed(2));
    }

    let custom_officer_annual_turnover_earnings = Number($('#contract-custom-officer-annual-turnover-first-earnings').val()) +
                                                  Number($('#contract-custom-officer-annual-turnover-second-earnings').val());

    if (custom_officer_annual_turnover_earnings) {
        $('#annual-turnover-earnings').val(custom_officer_annual_turnover_earnings.toFixed(2));
    }

    // -- contract_auditor --
    let contract_auditor_activity_period_from = $('#contract-auditor-activity-period-from').get(0);
    let contract_auditor_activity_period_to = $('#contract-auditor-activity-period-to').get(0);

    let contract_auditor_activity_period = 0;
    if (contract_auditor_activity_period_from && contract_auditor_activity_period_to) {
        contract_auditor_activity_period = (contract_auditor_activity_period_to.valueAsDate - contract_auditor_activity_period_from.valueAsDate) / (1000 * 60 * 60 * 24);
    }

    contract_auditor_activity_period = contract_auditor_activity_period >= 0 ? contract_auditor_activity_period.toFixed(0) + ' дней' : '';

    $('#contract-auditor-activity-period').val(contract_auditor_activity_period);

    let auditor_annual_turnover_money = Number($('#contract-auditor-annual-turnover-first-money').val()) +
                                        Number($('#contract-auditor-annual-turnover-second-money').val());

    if (auditor_annual_turnover_money) {
        $('#annual-turnover-money').val(auditor_annual_turnover_money.toFixed(2));
    }

    let auditor_annual_turnover_earnings = Number($('#contract-auditor-annual-turnover-first-earnings').val()) +
                                           Number($('#contract-auditor-annual-turnover-second-earnings').val());

    if (auditor_annual_turnover_earnings) {
        $('#annual-turnover-earnings').val(auditor_annual_turnover_earnings.toFixed(2));
    }

    // -- contract_realtor --
    let contract_realtor_activity_period_from = $('#contract-realtor-activity-period-from').get(0);
    let contract_realtor_activity_period_to = $('#contract-realtor-activity-period-to').get(0);

    let contract_realtor_activity_period = 0;
    if (contract_realtor_activity_period_from && contract_realtor_activity_period_to) {
        contract_realtor_activity_period = (contract_realtor_activity_period_to.valueAsDate - contract_realtor_activity_period_from.valueAsDate) / (1000 * 60 * 60 * 24);
    }

    contract_realtor_activity_period = contract_realtor_activity_period >= 0 ? contract_realtor_activity_period.toFixed(0) + ' дней' : '';

    $('#contract-realtor-activity-period').val(contract_realtor_activity_period);

    let realtor_annual_turnover_money = Number($('#contract-realtor-annual-turnover-first-money').val()) +
                                        Number($('#contract-realtor-annual-turnover-second-money').val());

    if (realtor_annual_turnover_money) {
        $('#annual-turnover-money').val(realtor_annual_turnover_money.toFixed(2));
    }

    let realtor_annual_turnover_earnings = Number($('#contract-realtor-annual-turnover-first-earnings').val()) +
                                           Number($('#contract-realtor-annual-turnover-second-earnings').val());

    if (realtor_annual_turnover_earnings) {
        $('#annual-turnover-earnings').val(realtor_annual_turnover_earnings.toFixed(2));
    }

    // -- contract_evaluator --
    let contract_evaluator_activity_period_from = $('#contract-evaluator-activity-period-from').get(0);
    let contract_evaluator_activity_period_to = $('#contract-evaluator-activity-period-to').get(0);

    let contract_evaluator_activity_period = 0;
    if (contract_evaluator_activity_period_from && contract_evaluator_activity_period_to) {
        contract_evaluator_activity_period = (contract_evaluator_activity_period_to.valueAsDate - contract_evaluator_activity_period_from.valueAsDate) / (1000 * 60 * 60 * 24);
    }

    contract_evaluator_activity_period = contract_evaluator_activity_period >= 0 ? contract_evaluator_activity_period.toFixed(0) + ' дней' : '';

    $('#contract-evaluator-activity-period').val(contract_evaluator_activity_period);

    let evaluator_annual_turnover_money = Number($('#contract-evaluator-annual-turnover-first-money').val()) +
                                          Number($('#contract-evaluator-annual-turnover-second-money').val());

    if (evaluator_annual_turnover_money) {
        $('#annual-turnover-money').val(evaluator_annual_turnover_money.toFixed(2));
    }

    let evaluator_annual_turnover_earnings = Number($('#contract-evaluator-annual-turnover-first-earnings').val()) +
                                             Number($('#contract-evaluator-annual-turnover-second-earnings').val());

    if (evaluator_annual_turnover_earnings) {
        $('#annual-turnover-earnings').val(evaluator_annual_turnover_earnings.toFixed(2));
    }

    // -- contract_notary --
    let contract_notary_activity_period_from = $('#contract-notary-activity-period-from').get(0);
    let contract_notary_activity_period_to = $('#contract-notary-activity-period-to').get(0);

    let contract_notary_activity_period = 0;
    if (contract_notary_activity_period_from && contract_notary_activity_period_to) {
        contract_notary_activity_period = (contract_notary_activity_period_to.valueAsDate - contract_notary_activity_period_from.valueAsDate) / (1000 * 60 * 60 * 24);
    }

    contract_notary_activity_period = contract_notary_activity_period >= 0 ? contract_notary_activity_period.toFixed(0) + ' дней' : '';

    $('#contract-notary-activity-period').val(contract_notary_activity_period);

    let notary_annual_turnover_money = Number($('#contract-notary-annual-turnover-first-money').val()) +
                                       Number($('#contract-notary-annual-turnover-second-money').val());

    if (notary_annual_turnover_money) {
        $('#annual-turnover-money').val(notary_annual_turnover_money.toFixed(2));
    }

    let notary_annual_turnover_earnings = Number($('#contract-notary-annual-turnover-first-earnings').val()) +
                                          Number($('#contract-notary-annual-turnover-second-earnings').val());

    if (notary_annual_turnover_earnings) {
        $('#annual-turnover-earnings').val(notary_annual_turnover_earnings.toFixed(2));
    }

    // -- policy_construction_installation_work
    let policy_construction_installation_work_total = Number($('#policy-construction-installation-work-construction-installation-price').val()) +
                                                      Number($('#policy-construction-installation-work-construction-price').val()) +
                                                      Number($('#policy-construction-installation-work-equipment-price').val()) +
                                                      Number($('#policy-construction-installation-work-machine-price').val()) +
                                                      Number($('#policy-construction-installation-work-clear-location-price').val()) +
                                                      Number($('#policy-construction-installation-work-insurance-value').val());

    $('#policy-construction-installation-work-total').val(policy_construction_installation_work_total.toFixed(2));

    $('#policy').find('div.card-body').each(function (i, element) {
        let insurance_premium = 0;
        let policy_insurance_sum = Number($('#policy-insurance-sum').val());

        if (!is_tariff && !is_premium) {
            insurance_premium = (days * policy_insurance_sum * Number($('#specification-tariff').val())) / 365;
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

        let policy_casco_sum = policy_casco_ae_additional_insured_sum + policy_casco_ec_vehicle_death_recovery_sum + policy_casco_ec_civil_liability_sum + policy_casco_ec_total_sum;

        $('#policies-' + number + '-policy-casco-total-sum').val(policy_casco_sum.toFixed(2));

        if (!window.isNaN(policy_casco_sum)) {
            policy_additional_sum += policy_casco_sum;
        }

        let policy_casco_ec_vehicle_death_recovery_premium = Number($('#policies-' + number + '-policy-casco-ec-vehicle-death-recovery-premium').val());
        let policy_casco_ec_civil_liability_premium = Number($('#policies-' + number + '-policy-casco-ec-civil-liability-premium').val());
        let policy_casco_ec_total_premium = Number($('#policies-' + number + '-policy-casco-ec-total-premium').val());

        let policy_casco_premium = policy_casco_ec_vehicle_death_recovery_premium + policy_casco_ec_civil_liability_premium + policy_casco_ec_total_premium;

        $('#policies-' + number + '-policy-casco-total-premium').val(policy_casco_premium.toFixed(2));

        if (!window.isNaN(policy_casco_premium)) {
            policy_additional_premium += policy_casco_premium;
        }

        // -- policy_leasing_autocredit --
        $('#policies-' + number + '-policy-leasing-autocredit-ec-driver-sum').val(Number($('#policies-' + number + '-policy-leasing-autocredit-ec-driver-amount').val()) * Number($('#policies-' + number + '-policy-leasing-autocredit-ec-driver-sum-for-person').val()));
        $('#policies-' + number + '-policy-leasing-autocredit-ec-passenger-sum').val(Number($('#policies-' + number + '-policy-leasing-autocredit-ec-passenger-amount').val()) * Number($('#policies-' + number + '-policy-leasing-autocredit-ec-passenger-sum-for-person').val()));
        $('#policies-' + number + '-policy-leasing-autocredit-ec-general-limit-sum').val(Number($('#policies-' + number + '-policy-leasing-autocredit-ec-general-limit-amount').val()) * Number($('#policies-' + number + '-policy-leasing-autocredit-ec-general-limit-sum-for-person').val()));

        $('#policies-' + number + '-policy-leasing-autocredit-ec-total-sum').val(Number($('#policies-' + number + '-policy-leasing-autocredit-ec-driver-sum').val()) + Number($('#policies-' + number + '-policy-leasing-autocredit-ec-passenger-sum').val()) + Number($('#policies-' + number + '-policy-leasing-autocredit-ec-general-limit-sum').val()));
        $('#policies-' + number + '-policy-leasing-autocredit-ec-total-premium').val(Number($('#policies-' + number + '-policy-leasing-autocredit-ec-driver-premium').val()) + Number($('#policies-' + number + '-policy-leasing-autocredit-ec-passenger-premium').val()) + Number($('#policies-' + number + '-policy-leasing-autocredit-ec-general-limit-premium').val()));

        let policy_leasing_autocredit_ae_additional_insured_sum = Number($('#policies-' + number + '-policy-leasing-autocredit-ae-additional-insured-sum').val());
        let policy_leasing_autocredit_ec_vehicle_death_recovery_sum = Number($('#policies-' + number + '-policy-leasing-autocredit-ec-vehicle-death-recovery-sum').val());
        let policy_leasing_autocredit_ec_civil_liability_sum = Number($('#policies-' + number + '-policy-leasing-autocredit-ec-civil-liability-sum').val());
        let policy_leasing_autocredit_ec_total_sum = Number($('#policies-' + number + '-policy-leasing-autocredit-ec-total-sum').val());

        let policy_leasing_autocredit_sum = policy_leasing_autocredit_ae_additional_insured_sum + policy_leasing_autocredit_ec_vehicle_death_recovery_sum + policy_leasing_autocredit_ec_civil_liability_sum + policy_leasing_autocredit_ec_total_sum;

        $('#policies-' + number + '-policy-leasing-autocredit-total-sum').val(policy_leasing_autocredit_sum.toFixed(2));

        if (!window.isNaN(policy_leasing_autocredit_sum)) {
            policy_additional_sum += policy_leasing_autocredit_sum;
        }

        let policy_leasing_autocredit_ec_vehicle_death_recovery_premium = Number($('#policies-' + number + '-policy-leasing-autocredit-ec-vehicle-death-recovery-premium').val());
        let policy_leasing_autocredit_ec_civil_liability_premium = Number($('#policies-' + number + '-policy-leasing-autocredit-ec-civil-liability-premium').val());
        let policy_leasing_autocredit_ec_total_premium = Number($('#policies-' + number + '-policy-leasing-autocredit-ec-total-premium').val());

        let policy_leasing_autocredit_premium = policy_leasing_autocredit_ec_vehicle_death_recovery_premium + policy_leasing_autocredit_ec_civil_liability_premium + policy_leasing_autocredit_ec_total_premium;

        $('#policies-' + number + '-policy-leasing-autocredit-total-premium').val(policy_leasing_autocredit_premium.toFixed(2));

        if (!window.isNaN(policy_leasing_autocredit_premium)) {
            policy_additional_premium += policy_leasing_autocredit_premium;
        }

        // -- policy --
        $('#policies-' + number + '-insurance-sum-plus').text('+ ' + policy_additional_sum.toFixed(2));
        $('#policies-' + number + '-insurance-premium-plus').text('+ ' + policy_additional_premium.toFixed(2));

        let policy_premium = 0;

        if (!is_tariff && !is_premium) {
            policy_premium = (days * policy_insurance_sum * Number($('#specification-tariff').val())) / 365;
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
            property_premium = (days * property_insurance_sum * Number($('#specification-tariff').val())) / 365;
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

function addConstructionParticipant() {
    let construction_participant_block = document.getElementById('construction-participants').querySelector('tbody');
    let counter = construction_participant_block.childElementCount;

    while(document.getElementById('construction-participant-row-' + counter)) {
        counter++;
    }

    $.ajax({
        url: ddgi_routes.construction_participant_row,
        type: 'post',
        data: { key: counter },
        dataType: 'json',
        success: function (response) {
            construction_participant_block.insertAdjacentHTML('beforeend', response.template);
        },
        error: function (data) {
            console.log('get construction participant template error', data);
        }
    });
}

function removeConstructionParticipant(event) {
    if (event.target.classList.contains('ddgi-remove-construction-participant')) {
        event.target.parentElement.parentElement.remove();
    }
}

function addNotaryEmployee() {
    let notary_employee_block = document.getElementById('notary-employees').querySelector('tbody');
    let counter = notary_employee_block.childElementCount;

    while(document.getElementById('notary-employee-row-' + counter)) {
        counter++;
    }

    $.ajax({
        url: ddgi_routes.notary_employee_row,
        type: 'post',
        data: { key: counter },
        dataType: 'json',
        success: function (response) {
            notary_employee_block.insertAdjacentHTML('beforeend', response.template);
        },
        error: function (data) {
            console.log('get notary employee template error', data);
        }
    });
}

function removeNotaryEmployee(event) {
    if (event.target.classList.contains('ddgi-remove-notary-employee')) {
        event.target.parentElement.parentElement.remove();
    }
}

function addPolicy() {
    let policies_block = document.getElementById('policies');
    let counter = policies_block.querySelector('tbody').childElementCount;

    while(document.getElementById('policy-row-' + counter)) {
        counter++;
    }

    $.ajax({
        url: ddgi_routes.policy_row,
        type: 'post',
        data: { key: counter, model: policies_block.dataset.model },
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
    let counter = document.getElementById('properties').querySelector('tbody').childElementCount;

    while(document.getElementById('property-row-' + counter)) {
        counter++;
    }

    $.ajax({
        url: ddgi_routes.property_row,
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
        url: ddgi_routes.policies,
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
        url: ddgi_routes.policy_employee,
        type: 'get',
        data: { name: $(name).val(), series: $(this).val() },
        dataType: 'json',
        success: function (response) {
            $(responsible_person).val(response.surname + ' ' + response.name + ' ' + response.middlename);
        }
    });
}

function toggleSwitch(element, block_id) {
    let block = document.getElementById(block_id);

    let other;
    if (element.id == 'contract-tariff-switch') {
        other = 'contract-premium';
    } else if (element.id == 'contract-premium-switch') {
        other = 'contract-tariff';
    }

    if (block) {
        block.style.display = element.checked ? 'block' : 'none';

        if (element.checked && other) {
            document.getElementById(other + '-switch').checked = false;
            document.getElementById(other + '-block').style.display = 'none';
            document.getElementById(other).value = '';
        }
        if (!element.checked) {
            let textbox = document.getElementById(element.id.replace('-switch', ''));

            if (textbox) {
                textbox.value = '';
            }
        }
    }
}

function redirect(element) {
    var selected_option = element.selectedOptions[0];

    if (selected_option.dataset.route) {
        window.location = '/' + selected_option.dataset.route + '/create';
    }
}

function defineSpecifications(element) {
    $.ajax({
        url: ddgi_routes.type_specifications,
        type: 'get',
        data: { type: element.value },
        dataType: 'json',
        success: function (response) {
            $('#contract-specification-id').empty();
            $('#contract-specification-id').append('<option></option>');

            for (var i = 0; i < response.length; i++) {
                $('#contract-specification-id').append('<option value="' + response[i]['id']+ '" data-route="' + response[i]['route'] + '">' + response[i]['name'] + '</option>');
            }
        }
    });
}

function addTranche() {
    let tranche_block = document.getElementById('tranches').querySelector('tbody');
    let counter = tranche_block.childElementCount;

    while(document.getElementById('tranche-row-' + counter)) {
        counter++;
    }

    $.ajax({
        url: ddgi_routes.tranche_row,
        type: 'post',
        data: { key: counter },
        dataType: 'json',
        success: function (response) {
            tranche_block.insertAdjacentHTML('beforeend', response.template);
        },
        error: function (data) {
            console.log('get tranche template error', data);
        }
    });
}

function removeTranche(event) {
    if (event.target.classList.contains('ddgi-remove-tranche')) {
        event.target.parentElement.parentElement.remove();
    }
}

$(document).ready(function() {
    $('#form-contract').delegate('.ddgi-calculate', 'change', calculation);

    $('#policies').delegate('.ddgi-add-policy', 'click', addPolicy);
    $('#policies').delegate('.ddgi-remove-policy', 'click', removePolicy);

    $('#policies, #policy').delegate('.ddgi-policy-name', 'change', definePolicySeries);
    $('#policies, #policy').delegate('.ddgi-policy-series', 'change', defineResponsiblePerson);

    $('.ddgi-policy-name').trigger('keyup');        // для show метода при загрузке страницы
    $('.ddgi-policy-series').trigger('change');     // для show метода при загрузке страницы
    $('.ddgi-calculate').trigger('change');         // для show метода при загрузке страницы

    $('#construction-participants').delegate('.ddgi-add-construction-participant', 'click', addConstructionParticipant);
    $('#construction-participants').delegate('.ddgi-remove-construction-participant', 'click', removeConstructionParticipant);

    $('#notary-employees').delegate('.ddgi-add-notary-employee', 'click', addNotaryEmployee);
    $('#notary-employees').delegate('.ddgi-remove-notary-employee', 'click', removeNotaryEmployee);

    $('#properties').delegate('.ddgi-add-property', 'click', addProperty);
    $('#properties').delegate('.ddgi-remove-property', 'click', removeProperty);

    $('#tranches').delegate('.ddgi-add-tranche', 'click', addTranche);
    $('#tranches').delegate('.ddgi-remove-tranche', 'click', removeTranche);

    $('form').submit(function(e) {
        $(':disabled').each(function(e) {
            $(this).removeAttr('disabled');
        });
    });

    $('.summernote').summernote();
});
