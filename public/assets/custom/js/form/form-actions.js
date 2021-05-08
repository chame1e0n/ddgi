$(document).ready(function() {
    // number mask
    $('[name=tel_beneficiary],[name=tel_insurer],[name=amount_of_cargo_place],[name=amount_of_cargo],[name=weight_of_cargo],[name=percent_of_tariff],[name=franshiza],[name=insurance_premium],[name=insured_sum],[name=mfo_beneficiary], [name=mfo],[name=quantity], [name=inn], [name=inn_insurer], [name=inn_beneficiary], [name=oked]').bind("change keyup input click", function() {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
        })
        // только буквы
    $('[name=fio_insurer]').bind("change keyup input click", function() {
        if (this.value.match(/[^a-z]/g)) {
            this.value = this.value.replace(/[^a-z]/g, '');
        }
    })
});



// #form-audit - форма аудита

// Общие сведения
// #insurer-name
// #insurer-address
// #insurer-phone
// #insurer-bill
// #insurer-type-activity
// #insurer-mfo
// #insurer-bank
// #insurer-inn
// #insurer-okonh
// #insurer-oked
// #personal-info

// #insurance-from
// #insurance-to
// #geograph-zone

// Форма аудита
const formAudit = document.querySelector('#form-audit')
const formBrokers = document.querySelector('#formBrokers')
const formNatarius = document.querySelector('#formNatarius')
const formOtsenshiki = document.querySelector('#formOtsenshiki')
const formRealtors = document.querySelector('#formRealtors')


// Блок "Период деятельности оганизации"
const periodActiveOrg = document.querySelector('#period-active-org')
    // Блок с элементами "radio" и "select" форм
const fieldsChanged = document.querySelector('#fields-changed')
    // Форма "Условия оплаты страховой премии"
const paymentsForm = document.querySelector('#payment-terms-form')

const actedBoxDescription = document.querySelector('[data-acted]')
const casesReasonBox = document.querySelector('[data-cases-reason]')
const administrCaseBox = document.querySelector('[data-administr-case]')
const otherPaymentSchedule = document.querySelector('#other-payment-schedule')
const buttonAddRowSchedule = document.querySelector('[data-btn-add-row]')
const tablePaymentSchedule = document.querySelector('#table-payment-schedule')
const buttonAddRowInfo = document.querySelector('[data-btn-add-row-info]')
const buttonAddRowInfo2 = document.querySelector('[data-btn-add-row-info2]')
const infoTable = document.querySelector('[data-info-table]')
const infoTable2 = document.querySelector('#personal-table')

const insuranceSum = document.querySelector('[data-insurance-sum]')
const insuranceValue = document.querySelector('[data-insurance-stoimost]')
const insuranceAward = document.querySelector('[data-insurance-award]')
const annualTurnoverInfo = document.querySelector('[data-annual-turnover-info]')

const totalTurnoverField = document.querySelector('[data-total-turnover]')
const earningsField = document.querySelector('[data-earnings]')

const activityPeriodDates = {}
const dataSelectAndRadioFields = {}
const paymentFormData = {}
const infoTableTotal = {}

let insuranceTotalValue = 0
let insuranceTotalSum = 0
let insuranceTotalAward = 0

let totalTurnover = 0
let earnings = 0

let agentsList = [];

loadAgents();

function loadAgents() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
            if (xmlhttp.status == 200) {
                agentsList = JSON.parse(xmlhttp.response);
            } else if (xmlhttp.status == 400) {
                alert('There was an error 400');
            } else {
                alert('something else other than 200 was returned');
            }
        }
    };

    xmlhttp.open("GET", "http://wecloud.rocks/api/agent_list", true);
    xmlhttp.send();
}

/**
 * @param selector - селектор элемента
 */
function getField(selector) {
    return document.querySelector(selector)
}

/**
 * @param from - начальная дата
 * @param to - конечная дата
 // Записывает разницу между датами в поле всего
 */
function calcDifferenceBetweenDates(from, to) {
    const dateFrom = new Date(from);
    const dateTo = new Date(to);
    const days = Math.ceil(Math.abs(dateTo.getTime() - dateFrom.getTime()) / (1000 * 3600 * 24));
    const totalField = document.querySelector('[data-total="total-active-org"]')

    totalField.value = `${days} дней`
}

/**
 * @param element - принимает целевой элемент (элемент формы) и записывает даты в объект activityPeriodDates
 */

function getActivityDates(element) {

    if (element.dataset.activityPeriod === 'from') {
        activityPeriodDates.from = element.value
    }

    if (element.dataset.activityPeriod === 'to') {
        activityPeriodDates.to = element.value
    }

    if (activityPeriodDates.from && activityPeriodDates.to) {
        return true
    }

    return false
}

let fieldNumber = 0

function addRowPaymentSchedule() {
    const tableBody = tablePaymentSchedule.querySelector('tbody')

    const newTableRow = `
    <tr id="payment-term-tr-${fieldNumber}" data-field-number="${fieldNumber}">
      <td><input type="text" class="form-control" data-field="sum" name="payment_sum[]">
      </td>
      <td><input type="date" class="form-control" data-field="from" name="payment_from[]">
      </td>
      <td>
        <input type="button" value="Удалить" data-action="delete" class="btn btn-warning">
      </td>
    </tr>`

    tableBody.insertAdjacentHTML('beforeend', newTableRow)
    fieldNumber++
}

function removeRowSchedule(event) {
    const target = event.target
    const removeRowElement = target.parentElement.parentElement

    if (target.dataset.action === 'delete' &&
        removeRowElement.dataset &&
        removeRowElement.dataset.fieldNumber) {
        removeRowElement.remove()
    }
}

const paymentTransh = {}

if (buttonAddRowSchedule) {
    buttonAddRowSchedule.addEventListener("click", addRowPaymentSchedule);
}
if (tablePaymentSchedule) {
    tablePaymentSchedule.addEventListener('click', removeRowSchedule)
}

if (tablePaymentSchedule) {
    tablePaymentSchedule.addEventListener("change", event => {
        const target = event.target

        if (target.dataset.field === 'sum') {
            paymentTransh.sum = target.value.trim()
        }

        if (target.dataset.field === 'from') {
            paymentTransh.from = target.value.trim()
        }

        if (+paymentTransh.sum && paymentTransh.from) {
            paymentFormData.paymentSchedule.push(paymentTransh)
        }

    })
}


if (formAudit) {
    formAudit.addEventListener('submit', event => {
        event.preventDefault()

        // Данные из формы audit
        const generalInformation = {
            insurerName: getField('#insurer-name').value,
            insurerAddress: getField('#insurer-address').value,
            insurerPhone: getField('#insurer-phone').value,
            insurerBill: getField('#insurer-bill').value,
            insurerTypeActive: getField('#insurer-type-activity').value,
            insurerTypeMFO: getField('#insurer-mfo').value,
            insurerBank: getField('#insurer-bank').value,
            insurerInn: getField('#insurer-inn').value,
            insurerOkonh: getField('#insurer-okonh').value,
            insurerOked: getField('#insurer-oked').value,
            personalInfo: getField('#personal-info').value,
            insurancePeriod: {
                from: getField('#insurance-from').value,
                to: getField('#insurance-to').value
            },
            geoZone: getField('#geograph-zone').value
        }
    })
}


if (formBrokers) {
    formBrokers.addEventListener('submit', event => {
        event.preventDefault()

        // Данные из формы audit
        const generalInformation = {
            insurerName: getField('#insurer-name').value,
            insurerAddress: getField('#insurer-address').value,
            insurerPhone: getField('#insurer-phone').value,
            insurerBill: getField('#insurer-bill').value,
            insurerTypeActive: getField('#insurer-type-activity').value,
            insurerTypeMFO: getField('#insurer-mfo').value,
            insurerBank: getField('#insurer-bank').value,
            insurerInn: getField('#insurer-inn').value,
            insurerOkonh: getField('#insurer-okonh').value,
            insurerOked: getField('#insurer-oked').value,
            personalInfo: getField('#personal-info').value,
            insurancePeriod: {
                from: getField('#insurance-from').value,
                to: getField('#insurance-to').value
            },
            geoZone: getField('#geograph-zone').value
        }
    })
}

if (formNatarius) {
    formNatarius.addEventListener('submit', event => {
        event.preventDefault()

        // Данные из формы audit
        const generalInformation = {
            insurerName: getField('#insurer-name').value,
            insurerAddress: getField('#insurer-address').value,
            insurerPhone: getField('#insurer-phone').value,
            insurerBill: getField('#insurer-bill').value,
            insurerTypeActive: getField('#insurer-type-activity').value,
            insurerTypeMFO: getField('#insurer-mfo').value,
            insurerBank: getField('#insurer-bank').value,
            insurerInn: getField('#insurer-inn').value,
            insurerOkonh: getField('#insurer-okonh').value,
            insurerOked: getField('#insurer-oked').value,
            personalInfo: getField('#personal-info').value,
            insurancePeriod: {
                from: getField('#insurance-from').value,
                to: getField('#insurance-to').value
            },
            geoZone: getField('#geograph-zone').value
        }
    })
}

if (formOtsenshiki) {
    formOtsenshiki.addEventListener('submit', event => {
        event.preventDefault()

        // Данные из формы audit
        const generalInformation = {
            insurerName: getField('#insurer-name').value,
            insurerAddress: getField('#insurer-address').value,
            insurerPhone: getField('#insurer-phone').value,
            insurerBill: getField('#insurer-bill').value,
            insurerTypeActive: getField('#insurer-type-activity').value,
            insurerTypeMFO: getField('#insurer-mfo').value,
            insurerBank: getField('#insurer-bank').value,
            insurerInn: getField('#insurer-inn').value,
            insurerOkonh: getField('#insurer-okonh').value,
            insurerOked: getField('#insurer-oked').value,
            personalInfo: getField('#personal-info').value,
            insurancePeriod: {
                from: getField('#insurance-from').value,
                to: getField('#insurance-to').value
            },
            geoZone: getField('#geograph-zone').value
        }
    })
}


if (formRealtors) {
    formRealtors.addEventListener('submit', event => {
        event.preventDefault()

        // Данные из формы audit
        const generalInformation = {
            insurerName: getField('#insurer-name').value,
            insurerAddress: getField('#insurer-address').value,
            insurerPhone: getField('#insurer-phone').value,
            insurerBill: getField('#insurer-bill').value,
            insurerTypeActive: getField('#insurer-type-activity').value,
            insurerTypeMFO: getField('#insurer-mfo').value,
            insurerBank: getField('#insurer-bank').value,
            insurerInn: getField('#insurer-inn').value,
            insurerOkonh: getField('#insurer-okonh').value,
            insurerOked: getField('#insurer-oked').value,
            personalInfo: getField('#personal-info').value,
            insurancePeriod: {
                from: getField('#insurance-from').value,
                to: getField('#insurance-to').value
            },
            geoZone: getField('#geograph-zone').value
        }
    })
}


// Расчет количества дней между датами "Период деятельности организации"
if (periodActiveOrg) {
    periodActiveOrg.addEventListener('change', event => {
        const isDates = getActivityDates(event.target)
        isDates && calcDifferenceBetweenDates(activityPeriodDates.from, activityPeriodDates.to)
    })
}

// Изменения "radio и select"
if (fieldsChanged) {
    fieldsChanged.addEventListener('change', event => {
        const target = event.target

        // Скрытие и отображение блока acted
        if (target.hasAttribute('data-acted-radio')) {
            if (target.value === '1') {
                actedBoxDescription.style.display = 'flex'
                dataSelectAndRadioFields.acted = {
                    isActed: 1
                }
            } else {
                actedBoxDescription.style.display = 'none'
                dataSelectAndRadioFields.acted = {
                    isActed: 0
                }
            }
        }

        if (target.hasAttribute('data-cases-radio')) {
            if (target.value === '1') {
                casesReasonBox.style.display = 'flex'
            } else {
                casesReasonBox.style.display = 'none'
            }
        }

        if (target.hasAttribute('data-administr-radio')) {
            if (target.value === '1') {
                administrCaseBox.style.display = 'flex'
            } else {
                administrCaseBox.style.display = 'none'
            }
        }


        if (target.dataset && target.dataset.selectId) {
            if (+target.dataset.selectId === 1) {
                dataSelectAndRadioFields.sphereOfActivity = {
                    value: +target.value,
                    description: target.options[target.selectedIndex].text
                }
            }

            if (+target.dataset.selectId === 2) {
                dataSelectAndRadioFields.profInsuranceServices = {
                    value: +target.value,
                    description: target.options[target.selectedIndex].text
                }
            }

            if (+target.dataset.selectId === 3) {
                dataSelectAndRadioFields.liabilityLimit = {
                    value: +target.value,
                    description: target.options[target.selectedIndex].text
                }
            }
        }

        if (target.dataset && target.dataset.file === 'file') {
            dataSelectAndRadioFields.documents = {
                files: Array.from(event.target.files)
            }
        }

    })
}

const calcPrice = () => {
    insuranceTotalValue = 0;
    insuranceTotalAward = 0;
    insuranceTotalSum = 0;
    let franchise = 0;

    const modals = document.querySelectorAll('[data-overall]');
    modals.forEach(modal => {
        insuranceTotalValue += +modal.value;
    })

    infoTable.querySelectorAll('[data-field]').forEach((field) => {
        if (field.dataset.field === 'sum') {
            insuranceTotalSum += +field.value.trim()
            insuranceSum.value = insuranceTotalSum.toFixed(2);
        }

        if (field.dataset.field === 'franchise') {
            franchise += +field.value.trim()
            document.querySelector('[data-insurance-franchise]').value = franchise.toFixed(2);
        }

        if (field.dataset.field === 'value') {
            insuranceTotalValue += +field.value.trim()
            insuranceValue.value = insuranceTotalValue.toFixed(2);
        }

        if (field.dataset.field === 'premiya') {
            insuranceTotalAward += +field.value.trim()
            insuranceAward.value = insuranceTotalAward.toFixed(2)
        }
    })
}

const removeEl = (id) => {
    document.getElementById(id).remove();
}

const removeAndCalc = (id) => {
    removeEl(id);
    calcPrice();
}

const renderSelect = () => {
    agentsList.data.forEach(agentItem => {
        console.log(agentItem)
        const option = `<option value="${agentItem.id}">${agentItem.name}</option>`
        document.getElementById('polise_agents').insertAdjacentHTML('afterbegin', option)
    })
}

if (buttonAddRowInfo) {
    buttonAddRowInfo.addEventListener('click', event => {
        const id = Math.random();
        const rowInfo = `
      <tr id="${id}">
        <td>
            <input type="text" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="policy_series_id[]" required>
        </td>
        <td>
            <input  type="date" name="from_date_polis[]" class="form-control" required>
        </td>
        <td>
            <input type="date" class="form-control" name="to_date_polis[]" required>
        </td>
        <td>
            <input type="date" class="form-control" name="to_date_polis[]" required>
        </td>
        <td>
            <select class="form-control polises" id="polise_agents" name="agent_id[]" style="width: 100%;" required>
                <option value="4">aa Name1 middlasdc</option>
                <option value="3">FotTestOnly ahahah asdcsdac</option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="insurer_fio[]" required>
        </td>
        <td>
            <input type="text" class="form-control" name="specialty[]" value="Specialty" required>
        </td>
        <td>
            <input type="text" class="form-control" name="experience[]" value="work experience" required>
        </td>
        <td>
            <input type="text" class="form-control" name="position[]" required>
        </td>
        <td>
            <input type="text" class="form-control" name="time_stay[]" required>
        </td>
        <td>
            <input type="text" class="form-control" data-field="value" name="insurer_price[]" required>
        </td>
        <td>
            <input type="text" class="form-control" data-field="sum" name="insurer_sum[]" required>
        </td>
        <td>
            <input type="text" class="form-control" data-field="premiya" name="insurer_premium[]" required>
        </td>
        <td>
            <input onclick="removeAndCalc(${id})" type="button" value="Удалить" data-action="delete" class="btn btn-warning">
        </td>
      </tr>`
        infoTable.querySelector('tbody').insertAdjacentHTML('afterbegin', rowInfo);
        renderSelect();
    })
}


if (buttonAddRowInfo2) {
    buttonAddRowInfo2.addEventListener('click', event => {
        const id = Math.random();
        const rowInfo = `
      <tr id="${id}">
        <td>
            <input type="text" class="form-control forsum3 insurance_premium-0" data-field="number" name="number[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control forsum4 insurance_premium-0" data-field="director" name="director[]">
        </td>
        <td>
            <input type="text" class="form-control forsum3 insurance_premium-0" data-field="qualified" name="qualified[]">
        </td>
        <td>
            <input type="text" class="form-control forsum3 insurance_premium-0" data-field="other" name="other[]">
        </td>
        <td>
            <input onclick="removeEl(${id})" type="button" value="Удалить" data-action="delete" class="btn btn-warning">
        </td>
      </tr>`
        infoTable2.querySelector('tbody').insertAdjacentHTML('afterbegin', rowInfo)
    })
}


if (infoTable) {
    infoTable.addEventListener('change', event => {
        calcPrice();
    })
}

const calcTurnover = () => {
    totalTurnover = 0;
    earnings = 0;
    annualTurnoverInfo.querySelectorAll('[data-field]').forEach((field) => {
        if (field.dataset.field === 'turnover') {
            totalTurnover += +field.value.trim()
            totalTurnoverField.value = totalTurnover.toFixed(2)
        }

        if (field.dataset.field === 'earnings') {
            earnings += +field.value.trim()
            earningsField.value = earnings.toFixed(2)
        }
    })
}


if (annualTurnoverInfo) {
    annualTurnoverInfo.addEventListener('change', event => {
        calcTurnover();
    })
}


if (paymentsForm) {
    paymentsForm.addEventListener('change', event => {
        const target = event.target

        if (target.dataset && target.dataset.wallet === 'wallet') {
            paymentFormData.wallet = {
                currency: {
                    rate: +target.value,
                    exchange: target.options[target.selectedIndex].text
                }
            }
        }

        if (target.dataset && target.dataset.payment === 'payment') {
            otherPaymentSchedule.style.display = target.value == 'other' ? 'block' : 'none';

            paymentProcedure = target.value

            paymentFormData.payment = {
                term: {
                    text: target.options[target.selectedIndex].text,
                    value: target.value
                }
            }
        }
    })
}


const addBuilderButton = document.getElementById('add-costruct-participant');

const addBuilder = () => {
    const id = Math.random();
    const builders = document.getElementById('builders');
    builders.insertAdjacentHTML('beforeend', `
        <div id="${id}" class="d-flex form-group mb-20">
            <input type="text" name="сonstruct_participants[]" class="form-control mr-5">
            <input onclick="removeEl(${id})" type="button" value="Удалить" class="btn btn-warning">
        </div>
    `)
}


if (addBuilderButton) {
    addBuilderButton.addEventListener('click', () => {
        addBuilder();
    })
}


const condition = document.getElementById('condition');
const transhPaymentSchedule = document.getElementById('transh-payment-schedule');
const transhPaymentScheduleButton = document.getElementById('transh-payment-schedule-button');

const addPaymentSchedule = () => {
    const id = Math.random();
    const builders = document.getElementById('empTable3').querySelector('tbody');
    builders.insertAdjacentHTML('beforeend', `
         <tr id="${id}" data-field-number="0">
            <td>
                <input type="text" class="form-control"
                       name="payment_sum[]">
            </td>
            <td>
                <input type="date" class="form-control"
                       name="payment_from[]">
            </td>
            <td>
                <input type="button" onclick="removeEl(${id})" value="Удалить" class="btn btn-warning">
            </td>
        </tr>
    `)
}

if (condition) {
    condition.addEventListener('change', () => {
        if (condition.value === 'transh') {
            transhPaymentSchedule.classList.remove('d-none');
        } else {
            transhPaymentSchedule.classList.add('d-none');
        }
    });

    transhPaymentScheduleButton.onclick = addPaymentSchedule;

}

const generalProductFields = document.getElementById('general-product-fields');

function addProductFields(fieldNumber) {
    let fields = `<div id="product-field-modal-${fieldNumber}" class="modal" data-field-number="${fieldNumber}">
    <div class="modal-content" id="product-field-modal-content-${fieldNumber}">
        <span onclick="closeModal(${fieldNumber})" class="close product-fields-close" id="product-fields-close-${fieldNumber}" data-field-number="${fieldNumber}">&times;</span>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Перечень дополнительного оборудования</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive p-0 " style="max-height: 300px;">
                    <form method="POST" id="product-fields-${fieldNumber}-1">
                        <table class="table table-hover table-head-fixed" id="empTable2">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Марка, модель, модификация ТС</th>
                                    <th>Наименование оборудования</th>
                                    <th>Серийный номер</th>
                                    <th>Страховая сумма</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="mark_model[]"></td>
                                    <td><input type="text" class="form-control" name="name[]"></td>
                                    <td><input type="text" class="form-control" name="series_number[]"></td>
                                    <td><input type="text" class="form-control forsum5" name="insurance_sum[]" id="insurance_sum-${fieldNumber}"></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Дополнительное страховое покрытие</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" id="product-fields-${fieldNumber}-2">
                    <div class="form-group">
                        <label>Покрытие террористических актов с ТС </label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control terror-tc-${fieldNumber}" name="cover_terror_attacks_sum[]">
                            <div class="input-group-append">
                                <select class="form-control success" name="cover_terror_attacks_currency" style="width: 100%;">
                                    <option selected="selected">UZS</option>
                                    <option>USD</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Покрытие террористических актов с застрахованными лицами </label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control terror-zl-${fieldNumber}" name="cover_terror_attacks_insured_sum[]">
                            <div class="input-group-append">
                                <select class="form-control success" name="cover_terror_attacks_insured_currency" style="width: 100%;">
                                    <option selected="selected">UZS</option>
                                    <option>USD</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Покрытие расходы по эвакуации</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control evocuation-${fieldNumber}" name="coverage_evacuation_cost[]">
                            <div class="input-group-append">
                                <select class="form-control success" name="coverage_evacuation_currency" style="width: 100%;">
                                <option selected="selected">UZS</option>
                                <option>USD</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Сведени о трансортных средствах</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" id="product-fields-${fieldNumber}-3">
                    <div class="form-group">
                        <label>Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты? </label>
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="checkbox icheck-success">
                                    <input onchange="toggleBlockRadio('radioSuccess1-${fieldNumber}', 'data-radioSuccess1-${fieldNumber}')" type="radio" class="other_insurance-${fieldNumber}" name="strtahovka[]" id="radioSuccess1-${fieldNumber}" value="1">
                                    <label for="radioSuccess1-${fieldNumber}">Да</label>
                                </div>
                                <div class="checkbox icheck-success">
                                    <input onchange="toggleBlockRadio('radioSuccess1-${fieldNumber}', 'data-radioSuccess1-${fieldNumber}', false)" type="radio" class="other_insurance-${fieldNumber}" name="strtahovka[]" id="radioSuccess2-${fieldNumber}" value="0">
                                    <label for="radioSuccess2-${fieldNumber}">Нет</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-radioSuccess1-${fieldNumber} class="form-group other_insurance_info-${fieldNumber}" style="display:none">
                        <label>Укажите название и адрес страховой организации и номер Полиса</label>
                        <input class="form-control" type="text" name="other_insurance_info[]">
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Страховые покрытия по видам опасностей </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" id="product-fields-${fieldNumber}-4">
                    <div class="form-group">
                        <label>Раздел I. Гибель или повреждение транспортного средства</label>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="checkbox icheck-success">
                                    <input onchange="toggleBlockRadio('radioSuccess3-${fieldNumber}', 'data-radioSuccess3-${fieldNumber}')" type="radio" name="vehicle_damage[]" class="r-1-${fieldNumber}" id="radioSuccess3-${fieldNumber}" value="1">
                                    <label for="radioSuccess3-${fieldNumber}">Да</label>
                                </div>
                                <div class="checkbox icheck-success">
                                    <input onchange="toggleBlockRadio('radioSuccess4-${fieldNumber}', 'data-radioSuccess3-${fieldNumber}', false)" type="radio" name="vehicle_damage[]" class="r-1-${fieldNumber}" id="radioSuccess4-${fieldNumber}" value="0">
                                    <label for="radioSuccess4-${fieldNumber}">Нет</label>
                                </div>
                            </div>
                            <div data-radioSuccess3-${fieldNumber} class="col-md-6 r-1-show-${fieldNumber}" style="display: none;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Сумма</span>
                                                </div>
                                                <input type="text" class="form-control r-1-sum-${fieldNumber}" name="one_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Страховая премия</span>
                                                </div>
                                                <input type="text" class="form-control r-1-premia-${fieldNumber}" name="one_premia[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Франшиза</span>
                                                </div>
                                                <input type="text" class="form-control r-1-frnshiza-${fieldNumber}" name="one_franshiza[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form method="POST" id="product-fields-${fieldNumber}-5">
                    <div class="form-group">
                        <label class=>Раздел II. Автогражданская ответственность</label>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="checkbox icheck-success">
                                    <input onchange="toggleBlockRadio('radioSuccess5-${fieldNumber}', 'data-radioSuccess5-${fieldNumber}')" type="radio" name="civil_liability_${fieldNumber}" class="r-2-${fieldNumber}" id="radioSuccess5-${fieldNumber}" value="1">
                                    <label for="radioSuccess5-${fieldNumber}">Да</label>
                                </div>
                                <div onchange="toggleBlockRadio('radioSuccess6-${fieldNumber}', 'data-radioSuccess5-${fieldNumber}', false)" class="checkbox icheck-success">
                                    <input type="radio" name="civil_liability[]" class="r-2-${fieldNumber}" id="radioSuccess6-${fieldNumber}" value="0">
                                    <label for="radioSuccess6-${fieldNumber}">Нет</label>
                                </div>
                            </div>
                            <div data-radioSuccess5-${fieldNumber} class="col-md-6 r-2-show-${fieldNumber}" style="display: none;">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Сумма</span>
                                                </div>
                                                <input type="text" class="form-control r-2-sum-${fieldNumber}" name="tho_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Страховая премия</span>
                                                </div>
                                                <input type="text" class="form-control r-2-premia-${fieldNumber}" name="two_preim${fieldNumber}" id="vehicle_damage_sum-${fieldNumber}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="POST" id="product-fields-${fieldNumber}-6">
                    <div class="form-group">
                        <label>Раздел III. Несчастные случаи с Застрахованными лицами</label>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="checkbox icheck-success">
                                    <input onchange="toggleBlockRadio('radioSuccess7-${fieldNumber}', 'data-radioSuccess7-${fieldNumber}')" type="radio" name="accidents[]" class="r-3-${fieldNumber}" id="radioSuccess7-${fieldNumber}" value="1">
                                    <label for="radioSuccess7-${fieldNumber}">Да</label>
                                </div>
                                <div class="checkbox icheck-success">
                                    <input onchange="toggleBlockRadio('radioSuccess8-${fieldNumber}', 'data-radioSuccess7-${fieldNumber}', false)" type="radio" name="accidents[]" class="r-3-${fieldNumber}" id="radioSuccess8-${fieldNumber}" value="0">
                                    <label for="radioSuccess8-${fieldNumber}">Нет</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-radioSuccess7-${fieldNumber} class="table-responsive p-0 r-3-show-${fieldNumber}" style="display: none;">
                        <form method="POST" id="product-fields-${fieldNumber}-7">
                            <table class="table table-hover table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>Объекты страхования </th>
                                        <th>Количество водителей /пассажиров</th>
                                        <th>Страховая сумма на одного лица</th>
                                        <th>Страховая сумма</th>
                                        <th>Страховая премия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label>Водитель(и)</label></td>
                                        <td><input type="number" class="form-control r-3-pass-${fieldNumber}" value="1" readonly name="driver_quantity[]"></td>
                                        <td>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control r-3-one-${fieldNumber}" name="driver_one_sum[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="driver_currency[]" style="width: 100%;">
                                                        <option selected="selected">UZS</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="number" class="form-control r-3-sum-${fieldNumber}" name="driver_total_sum[]" id="driver_total_sum_${fieldNumber}"></td>
                                        <td><input type="number" class="form-control r-3-premia-${fieldNumber}" name="driver_preim_sum[]" id="driver_total_sum_${fieldNumber}"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Пассажиры</label></td>
                                        <td><input type="number" class="form-control r-3-pass-1-${fieldNumber}" name="passenger_quantity[]"></td>
                                        <td>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control r-3-one-1-${fieldNumber}" name="passenger_one_sum[]">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="passenger_currency[]" style="width: 100%;">
                                                        <option selected="selected">UZS</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="number" class="form-control r-3-sum-1-${fieldNumber}" name="passenger_total_sum${fieldNumber}" id="passenger_total_sum-${fieldNumber}"></td>
                                        <td><input type="number" class="form-control r-3-premia-1-${fieldNumber}" name="passenger_preim_sum${fieldNumber}" id="passenger_total_sum-${fieldNumber}"></td>
                                    </tr>
                                    <tr>
                                        <td><label class="text-bold">Общий Лимит</label></td>
                                        <td><input type="number" class="form-control r-3-pass-2-${fieldNumber}" name="limit_quantity${fieldNumber}"></td>
                                        <td>
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control r-3-one-2-${fieldNumber}" name="limit_one_sum${fieldNumber}">
                                                <div class="input-group-append">
                                                    <select class="form-control success" name="limit_currency" style="width: 100%;">
                                                        <option selected="selected">UZS</option>
                                                        <option>USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="number" class="form-control r-3-sum-2-${fieldNumber}" name="limit_total_sum[]"></td>
                                        <td><input type="number" class="form-control r-3-premia-2-${fieldNumber}" name="limit_preim_sum[]"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><label class="text-bold">Итого</label></td>
                                        <td><input type="number" class="form-control r-summ-${fieldNumber}"></td>
                                        <td><input type="number" class="form-control r-summ-premia-${fieldNumber}"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="form-group col-sm-8">
                        <label>Общий лимит ответственности </label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="totalLimit-${fieldNumber}" name="total_liability_limit[]">
                            <div class="input-group-append">
                                <select class="form-control success" name="total_liability_limit_currency[]" style="width: 100%;">
                                    <option selected="selected">UZS</option>
                                    <option>USD</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card card-info polis" id="polis-container">
            <div class="card-header">
                <h3 class="card-title">Полис</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
            </div>
            <div class="card payment">
                <div class="card-body">
                    <form method="POST" id="polis-fields-${fieldNumber}">
                        <div class="row policy">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="polises">Полис</label>
                                    <select class="form-control polises" id="polises" name="policy[]" style="width: 100%;">
                                        <option selected="selected"></option>
                                    </select>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="input-group mb-3" style="margin-top: 33px">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">от</span>
                                        </div>
                                        <input type="date" class="form-control" name="from_date[]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Ответственный Агент</label>
                                    <select class="form-control select2" name="agent[]" style="width: 100%;">
                                        <option selected="selected">Ф.И.О агента</option>
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Оплата страховой премии</label>
                                    <select class="form-control select2" name="payment[]" style="width: 100%;">
                                        <option selected="selected">Сум</option>
                                        <option>Доллар</option>
                                        <option>Евро</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Порядок оплаты</label>
                                        <select class="form-control select2" name="payment_order[]" style="width: 100%;">
                                        <option selected="selected">Сум</option>
                                        <option>Доллар</option>
                                        <option>Евро</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card card-info polis" id="Overall">
                <div class="card-header">
                    <h3 class="card-title">Итого</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Общая страховая сумма</span>
                            </div>
                            <input type="text" data-overall class="form-control" readonly id="overall_sum_${fieldNumber}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`;
    generalProductFields.insertAdjacentHTML('beforeend', fields);
    const $ = (className) => document.querySelector(className)
    document.getElementById(`product-field-modal-${fieldNumber}`).addEventListener('keyup', function() {
        let overallSum =
            parseFloat($('#insurance_sum-' + fieldNumber).value || 0) +
            parseFloat($('.terror-tc-' + fieldNumber).value || 0) +
            parseFloat($('.terror-zl-' + fieldNumber).value || 0) +
            parseFloat($('.evocuation-' + fieldNumber).value || 0) +
            parseFloat($('.r-1-sum-' + fieldNumber).value || 0) +
            parseFloat($('.r-2-sum-' + fieldNumber).value || 0) +
            parseFloat($('.r-3-sum-' + fieldNumber).value || 0) +
            parseFloat($('.r-3-sum-1-' + fieldNumber).value || 0) +
            parseFloat($('.r-3-sum-2-' + fieldNumber).value || 0);
        let modalTableSum2 =
            parseFloat($('.r-3-sum-' + fieldNumber).value || 0) +
            parseFloat($('.r-3-sum-1-' + fieldNumber).value || 0) +
            parseFloat($('.r-3-sum-2-' + fieldNumber).value || 0);
        let modalTableSum3 =
            parseFloat($('.r-3-premia-' + fieldNumber).value || 0) +
            parseFloat($('.r-3-premia-1-' + fieldNumber).value || 0) +
            parseFloat($('.r-3-premia-2-' + fieldNumber).value || 0);
        $('#overall_sum_' + fieldNumber).value = overallSum;
        $('.r-summ-' + fieldNumber).value = modalTableSum2;
        $('.r-summ-premia-' + fieldNumber).value = modalTableSum3;

        $('#totalLimit-' + fieldNumber).addEventListener('keyup', function() {
            if ($('.r-summ-' + fieldNumber).value >= $('#totalLimit-' + fieldNumber).value) {
                $('#form-save-button').setAttribute('disabled', true)
                    // alert('Общий лимит ответственности не может превышать страховую сумму по видам опасностей');
            } else {
                $('#form-save-button').removeAttribute('disabled');
            }
        });

        $('.r-3-one-' + fieldNumber).addEventListener('keyup', function() {
            let numOne = this.value * $(`.r-3-pass-${fieldNumber}`).value;
            $(`.r-3-sum-${fieldNumber}`).value = numOne;
        });
        $('.r-3-pass-1-' + fieldNumber).addEventListener('keyup', function() {
            let numOne = this.value * $(`.r-3-one-1-${fieldNumber}`).value;
            $(`.r-3-sum-1-${fieldNumber}`).value = numOne;
        });
        $('.r-3-one-1-' + fieldNumber).addEventListener('keyup', function() {
            let numOne = this.value * $(`.r-3-pass-1-${fieldNumber}`).value;
            $(`.r-3-sum-1-${fieldNumber}`).value = numOne;
        });
        $('.r-3-pass-2-' + fieldNumber).addEventListener('keyup', function() {
            let numOne = this.value * $(`.r-3-one-2-${fieldNumber}`).value;
            $(`.r-3-sum-2-${fieldNumber}`).value = numOne;
        });
        $('.r-3-one-2-' + fieldNumber).addEventListener('keyup', function() {
            let numOne = this.value * $(`.r-3-pass-2-${fieldNumber}`).value;
            $(`.r-3-sum-2-${fieldNumber}`).value = numOne;
        });

        calcPrice()
    })
};

const productFieldsTable = document.getElementById('empTable');

const addProductFieldRow = (fieldNumber) => {
    const fields = `
    <tr id="a${fieldNumber}">
        <td>
            <input type="text" class="form-control" name="polis_mark[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_gos_num[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_teh_passport[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_num_engine[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_num_body[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_payload[]">
        </td>
        <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
       
        <td>
            <input type="text" data-field="value" class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0" name="overall_polis_sum[]">
        </td>
        <td>
            <input type="text" data-field="premiya"  class="form-control insurance_premium-0" name="polis_premium[]">
        </td>
         <td>
            <input type="button" onclick="openModal(${fieldNumber})" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="${fieldNumber}">
        </td>
         <td>
            <input type="button" onclick="removeProductsFieldRow(${fieldNumber})" value="Удалить" class="btn btn-warning">
        </td>
    </tr>
`
    productFieldsTable.querySelector('tbody').querySelector('tr').insertAdjacentHTML('afterend', fields);
};

const removeProductsFieldRow = (fieldNumber) => {
    document.getElementById('a' + fieldNumber).remove(); // buttton -> td -> tr
    document.getElementById("product-field-modal-" + fieldNumber).remove();
    calcPrice();
};

const openModal = (fieldNumber) => {
    document.querySelectorAll('.modal').forEach(div => {
        div.style.display = 'none'
    });
    document.getElementById("product-field-modal-" + fieldNumber).style.display = 'block';
}

const closeModal = (fieldNumber) => {
    document.getElementById("product-field-modal-" + fieldNumber).style.display = 'none';
}


const generalProductFieldsAddButton = document.getElementById('generalProductFieldsAddButton');

const addProductField = () => {
    const fieldNumber = document.querySelectorAll('.modal').length;
    addProductFields(fieldNumber);
    addProductFieldRow(fieldNumber);
};

if (generalProductFieldsAddButton) {
    generalProductFieldsAddButton.onclick = addProductField;
}


const covidFizAddBtn = document.querySelector('[data-btn-covid-fiz]');

if (covidFizAddBtn) {
    covidFizAddBtn.addEventListener('click', event => {
        const id = Math.random();
        const rowInfo = `
        <tr id="${id}">
        <td>
             <input type="text" class="form-control" name="person_number[]">
         </td>
         <td>
             <input type="text" class="form-control" name="person_surname[]" required>
         </td>
         <td>
         <input type="text" class="form-control" name="person_name[]" required>
         </td>
         <td>
         <input type="text" class="form-control" name="person_lastname[]" required>
         </td>
         <td>
         <input type="text" class="form-control" name="series_and_number_passport[]" required>
         </td>
         <td>
             <input type="date" class="form-control" name="date_of_issue_passport[]" required>
         </td>
         <td>
             <input type="text" class="form-control" name="place_of_issue_passport[]" required>
         </td>
         <td>
                 <input type="text" class="form-control" name="policy_series_id[]" required>
         </td>
         <td>
             <input type="text" data-field="value" class="form-control" name="insurance_cost[]" required>
         </td>
         <td>
             <input type="text" data-field="sum" class="form-control" name="insurance_sum[]" required>
         </td>
         <td>
             <input type="text" data-field="premiya" class="form-control" name="insurance_premium[]" required>
         </td>
     <td>
         <input onclick="removeAndCalc(${id})" type="button" value="Удалить" data-action="delete" class="btn btn-warning" required>
     </td>
   </tr>`
        infoTable.querySelector('tbody').insertAdjacentHTML('afterbegin', rowInfo)
    })
}


const toggleBlock = (id, dataAttr) => {
    const formEl = document.getElementById(id);
    const hiddenEl = document.querySelector(`[${dataAttr}]`);
    console.log(formEl.checked)
    if (formEl.checked) {
        hiddenEl.style.display = 'block';
    } else {
        hiddenEl.style.display = 'none';
    }
}

const toggleBlockRadio = (id, dataAttr, open = true) => {
    const formEl = document.getElementById(id);
    const hiddenEl = document.querySelector(`[${dataAttr}]`);
    if (open) {
        if (formEl.checked) {
            hiddenEl.style.display = 'block'
        }
    } else {
        hiddenEl.style.display = 'none'
    }
}

const addInsurer = () => {
    const id = Math.random();
    const ln = document.querySelectorAll('#clone-insurance').length + 1
    const html = ` 
        <div id="${id}" class="card-body">
          <div class="card card-info" id="clone-insurance">
              <div class="card-header">
                  <h3 class="card-title">Страхователь №${ln}</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"
                              data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="insurer-name" class="col-form-label">Наименования страхователя</label>
                              <input type="text" id="insurer-name" name="fio_insurer[]" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="insurer-address" class="col-form-label">Юр адрес
                                  страхователя</label>
                              <input type="text" id="insurer-address" name="address_insurer[]"
                                     class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="insurer-tel" class="col-form-label">Телефон</label>
                              <input type="text" id="insurer-tel" name="tel_insurer[]" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                              <input type="text" id="insurer-schet" name="address_schet[]" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="insurer-inn" class="col-form-label">ИНН</label>
                              <input type="text" id="insurer-inn" name="inn_insurer[]" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="insurer-mfo" class="col-form-label">МФО</label>
                              <input type="text" id="insurer-mfo" name="mfo_insurer[]" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="insurer-bank" class="col-form-label">Банк</label>
                              <input type="text" id="insurer-bank" name="bank_insurer[]" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="insurer-okonh" class="col-form-label">ОКОНХ</label>
                              <input type="text" id="insurer-okonh" name="okonh_insurer[]" class="form-control">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <input onclick="removeEl(${id})" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
                  </div>
              </div>
          </div>
      </div>`
    document.getElementById('insurer').insertAdjacentHTML('beforeend', html)
}

const addAnketa = () => {
    const id = Math.random();
    const ln = document.querySelectorAll('#clone-beneficiary').length + 1
    const html = `<div class="card-body" id="${id}">
                        <div class="card card-info" id="clone-beneficiary">
                            <div class="card-header">
                                <h3 class="card-title">Выгодоприобретатель №${ln}</h3>
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
                                                <label for="beneficiary-name" class="col-form-label">ФИО
                                                    выгодоприобретателя</label>
                                                <input type="text" id="beneficiary-name" name="fio_beneficiary[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="beneficiary-address" class="col-form-label">Юр адрес
                                                    выгодоприобретателя</label>
                                                <input type="text" id="beneficiary-address" name="address_beneficiary[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-tel" class="col-form-label">Телефон</label>
                                                <input type="text" id="beneficiary-tel" name="tel_beneficiary[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                                                <input type="text" id="beneficiary-schet" name="beneficiary_schet[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                                                <input type="text" id="beneficiary-inn" name="inn_beneficiary[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                                                <input type="text" id="beneficiary-mfo" name="mfo_beneficiary[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-bank" class="col-form-label">Банк</label>
                                                <input type="text" id="beneficiary-bank" name="bank_beneficiary[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                                                <input type="text" id="beneficiary-okonh" name="okonh_beneficiary[]"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                       <input onclick="removeEl(${id})" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
                                </div>
                            </div>
                        </div>
                    </div>`
    document.getElementById('anketa').insertAdjacentHTML('beforeend', html)
}

const propertyAddButton = document.getElementById('addProperty');

const propertyAdd = () => {
    const id = Math.random();
    const builders = document.getElementById('empTable').querySelector('tbody');
    builders.insertAdjacentHTML('beforeend', `
        <tr id="${id}">
            <td>
                <input type="text" class="form-control" name="name_property[]" required>
            </td>
            <td>
                <input type="text" class="form-control" name="place_property[]" required>
            </td>
            <td>
                <input type="date" class="form-control" name="date_of_issue_property[]" required>
            </td>
            <td>
                <input type="text" class="form-control" name="count_property[]" required>
            </td>
            <td>
                <select class="form-control polises" id="polises" name="units_property[]" style="width: 100%;" required>
                    <option selected="selected" value="1">Кв.м</option>
                    <option value="2">Кв.см</option>
                </select>
            </td>
            <td>
                <input type="text" data-field="value" class="form-control" name="insurance_cost[]" required>
            </td>
            <td>
                <input type="text" data-field="sum" class="form-control" name="insurance_sum[]" required>
            </td>
            <td>
                <input type="text" data-field="premiya" class="form-control" name="insurance_premium[]" required>
            </td>
            <td class="form-group">
                <input onclick="removeAndCalc(${id})" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
            </td>
        </tr>
    `)
}

const propertyAddButton1 = document.getElementById('addProperty1');


const propertyAdd1 = () => {
    const id = Math.random();
    const builders = document.getElementById('empTable1').querySelector('tbody');
    builders.insertAdjacentHTML('beforeend', `
         <tr id="${id}">
            <td>
                <input type="text" class="form-control" name="polis_mark[]">
            </td>
            <td>
                <input type="text" class="form-control" name="polis_model[]">
            </td>
            <td>
                <input type="text" class="form-control" name="zalogodatel[]">
            </td>
            <td>
                <input disabled type="date" class="form-control">
            </td>
            <td>
                <input type="text" class="form-control" name="polis_modification[]">
            </td>
            <td>
                <select class="form-control polises" id="polises" name="polis_series[]" style="width: 100%;">
                    <option selected="selected">Кв.м</option>
                    <option>Кв.см</option>
                </select>
            </td>
              <td>
                <input type="text" data-field="value" class="form-control" name="polis_modification[]">
            </td>
            <td>
                <input type="text" data-field="sum" class="form-control" name="polis_gos_num[]">
            </td>
            <td>
                <input type="text" data-field="premiya" class="form-control" name="polis_teh_passport[]">
            </td>
            <td class="form-group">
              <input onclick="removeAndCalc(${id})" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
          </td>
        </tr>
    `)
}
if (propertyAddButton1) {
    propertyAddButton1.onclick = propertyAdd1
}

if (propertyAddButton) {
    propertyAddButton.onclick = propertyAdd
}

const otsenshikBtn = document.querySelector('[data-otsenshik-btn]');

const addOtsenshik = () => {
    const id = Math.random();
    const fields = `<tr id="${id}">
        <td>
            <input type="text" class="form-control" name="period_polis[]">
        </td>
        <td>
            <input type="text" class="form-control" name="period_polis[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_id[]">
        </td>
        <td>
            <input type="date" class="form-control" name="validity_period_from[]">
        </td>
        <td>
            <input type="date" class="form-control" name="validity_period_to[]">
        </td>
        <td>
            <select class="form-control" id="polise_agents" name="agents[]" style="width: 100%;">
                <option selected="selected"></option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="polis_mark[]">
        </td>
        <td>
            <input type="text" class="form-control" name="specialty[]" value="Specialty">
        </td>
        <td>
            <input type="text" class="form-control" name="workExp[]" value="work experience">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_modification[]">
        </td>
        <td>
            <input type="text" data-field="value" class="form-control" name="polis_modification[]">
        </td>
        <td>
            <input type="text" data-field="sum" class="form-control" name="polis_gos_num[]">
        </td>
        <td>
            <input type="text" data-field="premiya" class="form-control" name="polis_teh_passport[]">
        </td>
        <td class="form-group">
              <input onclick="removeEl(${id})" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
          </td>
    </tr>`

    infoTable.querySelector('tbody').insertAdjacentHTML('beforebegin', fields);
    renderSelect();

}

if (otsenshikBtn) {
    otsenshikBtn.onclick = addOtsenshik
}

const tcButton = document.getElementById('addTc');

const addTcRow = () => {
    const id = Math.random();
    const fields = `<tr id="${id}">
        <td>
            <input type="text" class="form-control" name="period_polis[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_id[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <select class="form-control polises" id="polises" name="polis_agent[]" style="width: 100%;">
                <option selected="selected"></option>
                <option value="1">Да</option>
                <option value="2">Нет</option>
            </select>
        </td>
        <td>
            <select class="form-control" id="polise_agents" name="agents[]" style="width: 100%;">
                <option selected="selected"></option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_modification[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_gos_num[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_teh_passport[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_num_engine[]">
        </td>
        <td>
            <input data-field="value" type="text" class="form-control" name="polis_num_body[]">
        </td>
        <td>
            <input data-field="sum" type="text" class="form-control" name="polis_payload[]">
        </td>
        <td class="form-group">
              <input onclick="removeAndCalc(${id})" id="insurer-modal-button" type="button" class="btn btn-warning" value="Удалить">
          </td>
    </tr>`
    infoTable.querySelector('tbody').insertAdjacentHTML('beforebegin', fields);
    renderSelect();

}

if (tcButton) {
    tcButton.onclick = addTcRow
}


const addSportmanModal = (fieldNumber) => {
    let total = 0;
    const field = `<div id="product-field-modal-${fieldNumber}" class="modal" data-field-number="0">
        <div class="modal-content" style="min-height: 100%; padding: 20px;" id="product-field-modal-content[]">
            <span onclick="closeModal(${fieldNumber})" class="close product-fields-close" id="product-fields-close[]" data-field-number="0">&times;</span>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="beneficiary-bank" class="col-form-label">Трафматические повреждении</label>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Количество</span>
                                </div>
                                <input type="text" class="form-control" name="one_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Страховая сумма</span>
                                </div>
                                <input type="text" class="form-control r-${fieldNumber}" name="one_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Страховая премия</span>
                                </div>
                                <input type="text" class="form-control r-${fieldNumber}" name="one_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="beneficiary-bank" class="col-form-label">Смерть</label>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Страховая сумма</span>
                                </div>
                                <input type="text" class="form-control r-${fieldNumber}" name="one_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Страховая премия</span>
                                </div>
                                <input type="text" class="form-control r-${fieldNumber}" name="one_sum[]" id="vehicle_damage_sum-${fieldNumber}">
                            </div>
                        </div>
                    </div>
                      <div class="form-group">
                  <label for="beneficiary-bank" class="col-form-label">Итого</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Общая страховая сумма</span>
                        </div>
                        <input type="text" class="form-control" name="one_sum[]" data-overall id="total_inp${fieldNumber}">
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>`
    document.querySelector('[data-modal]').insertAdjacentHTML('beforeend', field);
    const inputs = document.querySelectorAll(`.r-${fieldNumber}`)
    inputs.forEach(inp => {
        inp.addEventListener('keyup', () => {
            total = 0;
            inputs.forEach(item => {
                total += +item.value;
            });
            document.getElementById(`total_inp${fieldNumber}`).value = total;
            calcPrice();
        })
    })
};


const addSportmanRow = (fieldNumber) => {
    const field = `<tr id="a${fieldNumber}">
        <td>
            <input type="text" class="form-control" name="period_polis[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_id[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_mark[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_teh_passport[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_num_engine[]">
        </td>
        <td>
            <input data-field="value" type="text" class="form-control" name="polis_num_body[]">
        </td>
        <td>
            <input data-field="sum" type="text" class="form-control" name="polis_payload[]">
        </td>
        <td>
            <input type="button" onclick="openModal(${fieldNumber})" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="${fieldNumber}">
        </td>
        <td>
            <input type="button" onclick="removeProductsFieldRow(${fieldNumber})" value="Удалить" class="btn btn-warning">
        </td>
    </tr>`
    infoTable.querySelector('tbody').insertAdjacentHTML('beforebegin', field);
    renderSelect();
}

const addSportmanBtn = document.getElementById('addSportmanBtn');


if (addSportmanBtn) {
    addSportmanBtn.onclick = () => {
        const id = document.querySelectorAll('.modal').length + 1;
        addSportmanRow(id);
        addSportmanModal(id);
    }
}


const addTcButton = document.getElementById('addTcButton');

const addTcTableRow = () => {
    const id = Math.random();
    const field = `<tr id="${id}">
        <td>
            <input type="text" class="form-control" name="period_polis[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_id[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_mark[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_teh_passport[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_num_engine[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_num_engine[]">
        </td>
         <td>
            <input data-field="value" type="text" class="form-control" name="polis_num_body[]">
        </td>
        <td>
            <input data-field="sum" type="text" class="form-control" name="polis_payload[]">
        </td>
         <td>
            <input data-field="premiya" type="text" class="form-control" name="polis_payload[]">
        </td>
         <td>
            <input data-field="franchise" type="text" class="form-control" name="polis_payload[]">
        </td>
         <td>
            <input type="button" onclick="removeAndCalc(${id})" value="Удалить" class="btn btn-warning">
        </td>
    </tr>`
    infoTable.querySelector('tbody').insertAdjacentHTML('beforebegin', field);
}

if (addTcButton) {
    addTcButton.onclick = addTcTableRow;
}


const addLitso = document.getElementById('addLitso');

if (addLitso) {
    addLitso.onclick = () => {
        const id = Math.floor();
        const fields = `<div id="${id}" class="row" id="cloneLitso">
            <div class="col-md-11">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ФИО</label>
                            <input name="name[]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Должность</label>
                            <input name="position[]" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1">
                <input style="margin-top: 32px;" type="button" onclick="removeAndCalc(${id})" value="Удалить" class="btn btn-warning">
            </div>
        </div>`

        document.getElementById('friends').insertAdjacentHTML('beforeend', fields);
    }
};

const addImushestvoBtn = document.getElementById('addImushestvoBtn');

if (addImushestvoBtn) {
    addImushestvoBtn.onclick = () => {
        const id = Math.random();
        const field = `<tr id="${id}">
            <td>
                <select class="form-control polises" id="polises" name="polis_series[]" style="width: 100%;">
                    <option selected="selected"></option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" name="period_polis[]">
            </td>
            <td>
                <input disabled type="date" class="form-control">
            </td>
            <td>
                <input type="date" class="form-control" name="polis_id[]">
            </td>
            <td>
                <input type="date" class="form-control" name="polis_mark[]">
            </td>
            <td>
                <input type="text" class="form-control" name="polis_model[]">
            </td>
            <td>
                <input type="text" class="form-control" name="polis_modification[]">
            </td>
            <td>
                <input type="text" class="form-control forsum2" name="polis_places[]">
            </td>
            <td>
            <input data-field="value" type="text" class="form-control" name="polis_num_body[]">
        </td>
        <td>
            <input data-field="sum" type="text" class="form-control" name="polis_payload[]">
        </td>
         <td>
            <input data-field="premiya" type="text" class="form-control" name="polis_payload[]">
        </td>
            <td>
                <input type="button" onclick="removeAndCalc(${id})" value="Удалить" class="btn btn-warning">
             </td>
        </tr>`
        infoTable.querySelector('tbody').insertAdjacentHTML('beforebegin', field);
    }
}


const addCascoFieldRow = (fieldNumber) => {
    const fields = `
    <tr id="a${fieldNumber}">
        <td>
            <input type="text" class="form-control" name="polis_mark[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_gos_num[]">
        </td>
        <td>
            <input type="date" class="form-control" name="polis_teh_passport[]">
        </td>
        <td>
            <input type="date" class="form-control" name="polis_num_engine[]">
        </td>
        <td>
           <select class="form-control" id="polise_agents" name="agents[]" style="width: 100%;">
                <option selected="selected"></option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="polis_payload[]">
        </td>
        <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
         <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text" data-field="value" class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0" name="overall_polis_sum[]">
        </td>
        <td>
            <input type="text" data-field="premiya"  class="form-control insurance_premium-0" name="polis_premium[]">
        </td>
         <td>
            <input type="button" onclick="openModal(${fieldNumber})" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="${fieldNumber}">
        </td>
         <td>
            <input type="button" onclick="removeProductsFieldRow(${fieldNumber})" value="Удалить" class="btn btn-warning">
        </td>
    </tr>
`
    productFieldsTable.querySelector('tbody').querySelector('tr').insertAdjacentHTML('afterend', fields);
    renderSelect();
};

const cascoAddButton = document.getElementById('cascoAddButton');

const addCascoField = () => {
    const fieldNumber = document.querySelectorAll('.modal').length;
    addProductFields(fieldNumber);
    addCascoFieldRow(fieldNumber);
};

if (cascoAddButton) {
    cascoAddButton.onclick = addCascoField
}

const addCascoFieldRow1 = (fieldNumber) => {
    const fields = `
    <tr id="a${fieldNumber}">
        <td>
            <input type="text" class="form-control" name="polis_mark[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_gos_num[]">
        </td>
        <td>
            <input type="date" class="form-control" name="polis_teh_passport[]">
        </td>
        <td>
            <input type="date" class="form-control" name="polis_num_engine[]">
        </td>
        <td>
           <select class="form-control" id="polise_agents" name="agents[]" style="width: 100%;">
                <option selected="selected"></option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="polis_payload[]">
        </td>
        <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
         <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text" data-field="value" class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0" name="overall_polis_sum[]">
        </td>
        <td>
            <input type="text" data-field="premiya"  class="form-control insurance_premium-0" name="polis_premium[]">
        </td>
         <td>
            <input type="button" onclick="openModal(${fieldNumber})" value="Заполнить" class="btn btn-success product-fields-button" id="product-fields-button" data-field-number="${fieldNumber}">
        </td>
         <td>
            <input type="button" onclick="removeProductsFieldRow(${fieldNumber})" value="Удалить" class="btn btn-warning">
        </td>
    </tr>
`
    productFieldsTable.querySelector('tbody').querySelector('tr').insertAdjacentHTML('afterend', fields);
    renderSelect();
};

const cascoAddButton1 = document.getElementById('cascoAddButton1');

const addCascoField1 = () => {
    addCascoFieldRow1(fieldNumber);
};

if (cascoAddButton1) {
    cascoAddButton1.onclick = addCascoField
}




const addAutozalogBtn = document.getElementById('addAutozalogBtn');

if (addAutozalogBtn) {
    addAutozalogBtn.onclick = () => {
        const id = Math.random();
        const field = `<tr id="a${fieldNumber}">
        <td>
            <input type="text" class="form-control" name="polis_mark[]">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_model[]">
        </td>
        <td>
            <input disabled type="date" class="form-control">
        </td>
        <td>
            <input type="text" class="form-control" name="polis_gos_num[]">
        </td>
        <td>
            <input type="date" class="form-control" name="polis_teh_passport[]">
        </td>
        <td>
            <input type="date" class="form-control" name="polis_num_engine[]">
        </td>
        <td>
           <select class="form-control" id="polise_agents" name="agents[]" style="width: 100%;">
                <option selected="selected"></option>
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="polis_payload[]">
        </td>
        <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
          <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
         <td>
            <input type="text"  class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text" data-field="value" class="form-control" name="polis_places[]">
        </td>
        <td>
            <input type="text" data-field="sum" class="form-control calc1 overall_insurance_sum-0" name="overall_polis_sum[]">
        </td>
        <td>
            <input type="text" data-field="premiya"  class="form-control insurance_premium-0" name="polis_premium[]">
        </td>
         <td>
            <input type="button" onclick="removeProductsFieldRow(${fieldNumber})" value="Удалить" class="btn btn-warning">
        </td>
    </tr>`
        infoTable.querySelector('tbody').insertAdjacentHTML('beforebegin', field);
        renderSelect();

    }
}

$(document).on('click', function() {
    $('#notmod input[value="Заполнить"]').hide();
    $('#notmod + #general-product-fields').hide();
})