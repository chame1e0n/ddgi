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
const infoTable = document.querySelector('[data-info-table]')

const insuranceSum = document.querySelector('[data-insurance-sum]')
const insuranceAward = document.querySelector('[data-insurance-award]')
const annualTurnoverInfo = document.querySelector('[data-annual-turnover-info]')

const totalTurnoverField = document.querySelector('[data-total-turnover]')
const earningsField = document.querySelector('[data-earnings]')

const activityPeriodDates = {}
const dataSelectAndRadioFields = {}
const paymentFormData = {}
const infoTableTotal = {}

let insuranceTotalSum = 0
let insuranceTotalAward = 0

let totalTurnover = 0
let earnings = 0

console.log(annualTurnoverInfo)

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

buttonAddRowSchedule.addEventListener("click", addRowPaymentSchedule)
tablePaymentSchedule.addEventListener('click', removeRowSchedule)
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


// if (formAudit) {
//     formAudit.addEventListener('submit', event => {
//         event.preventDefault()
//
//         // Данные из формы audit
//         const generalInformation = {
//             insurerName: getField('#insurer-name').value,
//             insurerAddress: getField('#insurer-address').value,
//             insurerPhone: getField('#insurer-phone').value,
//             insurerBill: getField('#insurer-bill').value,
//             insurerTypeActive: getField('#insurer-type-activity').value,
//             insurerTypeMFO: getField('#insurer-mfo').value,
//             insurerBank: getField('#insurer-bank').value,
//             insurerInn: getField('#insurer-inn').value,
//             insurerOkonh: getField('#insurer-okonh').value,
//             insurerOked: getField('#insurer-oked').value,
//             personalInfo: getField('#personal-info').value,
//             insurancePeriod: {
//                 from: getField('#insurance-from').value,
//                 to: getField('#insurance-to').value
//             },
//             geoZone: getField('#geograph-zone').value
//         }
//     })
// }


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
            if (target.value === 'true') {
                actedBoxDescription.style.display = 'flex'
                dataSelectAndRadioFields.acted = {
                    isActed: true
                }
            } else {
                actedBoxDescription.style.display = 'none'
                dataSelectAndRadioFields.acted = {
                    isActed: false
                }
            }
        }

        if (target.hasAttribute('data-cases-radio')) {
            if (target.value === 'true') {
                casesReasonBox.style.display = 'flex'
            } else {
                casesReasonBox.style.display = 'none'
            }
        }

        if (target.hasAttribute('data-administr-radio')) {
            if (target.value === 'true') {
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


if (buttonAddRowInfo) {
    buttonAddRowInfo.addEventListener('click', event => {
        const rowInfo = `
      <tr>
        <td>
            <input type="text" class="form-control" name="number_polis[]">
        </td>
        <td>
            <input type="text" class="form-control" name="series_polis[]">
        </td>
        <td>
            <input type="date" class="form-control" name="validity_period_from[]">
        </td>
        <td>
            <input type="date" class="form-control" name="validity_period_to[]">
        </td>
        <td>
            <select class="form-control polises" id="polises" name="polis_agent[]" style="width: 100%;">
                <option selected="selected"></option>
                <option value="1">Да</option>
                <option value="2">Нет</option>
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
            <input type="text" class="form-control" name="arriving_time[]">
        </td>
        <td>
            <input type="text" class="form-control" name="cost_of_insurance[]">
        </td>
        <td>
            <input type="text" class="form-control" data-field="sum" name="sum_of_insurance[]">
        </td>
        <td>
            <input type="text" class="form-control" data-field="premiya" name="bonus_of_insurance[]">
        </td>
        <td>
            <input type="button" value="Удалить" data-action="delete" class="btn btn-warning">
        </td>
      </tr>`

        infoTable.querySelector('tbody').insertAdjacentHTML('afterbegin', rowInfo)
    })
}



if (infoTable) {
    infoTable.addEventListener('change', event => {
        const target = event.target

        if (target.dataset.field === 'sum') {
            insuranceTotalSum += +target.value.trim()
            insuranceSum.value = insuranceTotalSum.toFixed(2)
        }

        if (target.dataset.field === 'premiya') {
            insuranceTotalAward += +target.value.trim()
            insuranceAward.value = insuranceTotalAward.toFixed(2)
        }
    })
}


if (annualTurnoverInfo) {
    annualTurnoverInfo.addEventListener('change', event => {
        const target = event.target

        if (target.dataset.field === 'turnover') {
            totalTurnover += +target.value.trim()
            totalTurnoverField.value = totalTurnover.toFixed(2)
        }

        if (target.dataset.field === 'earnings') {
            earnings += +target.value.trim()
            earningsField.value = earnings.toFixed(2)
        }
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