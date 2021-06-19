<div class="card card-success" id="contract">
    <div class="card-header">
        <h3 class="card-title">Условия оплаты страховой премии</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Типы клиента</label>
                    <div class="row">
                    @foreach(\App\Model\Contract::$types as $type => $label)
                        <div class="col-sm-4">
                            <div class="icheck-success">
                                <input class="client-type-radio"
                                       id="contract-type-{{$type}}"
                                       name="contract[type]"
                                       type="radio"
                                       value="{{$type}}"
                                       onchange="changeContractType(this)"
                                       @if($contract->type == $type)
                                        checked
                                       @endif />
                                <label for="contract-type-{{$type}}">{{$label}}</label>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
            @foreach(\App\Model\Contract::$types as $type => $label)
                <div class="form-group list-{{$type}}"
                     @if($contract->type != $type)
                        hidden
                     @endif>
                    <label for="contract-specification-{{$type}}">Вид продукта</label>
                    <select class="form-control @if($errors->has('contract.specification_id')) is-invalid @endif"
                            id="contract-specification-{{$type}}"
                            name="contract[specification_id]"
                            style="width: 100%;"
                            onchange="redirect(this)">
                        <option></option>

                        @foreach(\App\Model\Specification::getSpecificationsByType($type) as $specification)
                            <option value="{{$specification->id}}"
                                    data-route="{{\App\Model\Specification::$specification_to_routes[$specification->code]}}"
                                    @if(\Illuminate\Support\Facades\Route::current()->uri() == \App\Model\Specification::$specification_to_routes[$specification->code] . '/create')
                                        selected
                                    @endif>
                                {{$specification->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endforeach
            </div>
            <div class="col-sm-4">
                <div class="form-group form-inline justify-content-between">
                    <label for="contract-currency-id">Валюта взаиморасчетов</label>
                    <select class="form-control @if($errors->has('contract.currency_id')) is-invalid @endif"
                            id="contract-currency-id"
                            name="contract[currency_id]"
                            style="width: 100%; text-align: center;">
                    @foreach(\App\Model\Currency::getOrderedCurrencies() as $currency)
                        <option value="{{$currency->id}}"
                                @if($contract->currency_id == $currency->id)
                                    selected
                                @endif>
                            {{$currency->code}}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group form-inline justify-content-between">
                    <label for="contract-payment-type">Порядок оплаты страховой премии</label>
                    <select class="form-control payment-schedule @if($errors->has('contract.payment_type')) is-invalid @endif"
                            id="contract-payment-type"
                            name="contract[payment_type]"
                            onchange="toggle('tranches', this.value == '{{\App\Model\Contract::PAYMENT_TYPE_TRANCHE}}')"
                            style="width: 100%; text-align: center;">
                    @foreach(\App\Model\Contract::$payment_types as $key => $value)
                        <option value="{{$key}}"
                                @if($contract->payment_type == $key)
                                    selected
                                @endif>
                            {{$value}}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group form-inline justify-content-between">
                    <label for="contract-payment-method-id">Способ расчета</label>
                    <select class="form-control payment-schedule @if($errors->has('contract.payment_method_id')) is-invalid @endif"
                            id="contract-payment-method-id"
                            name="contract[payment_method_id]"
                            style="width: 100%; text-align: center;">
                    @foreach(\App\Model\PaymentMethod::all() as $payment_method)
                        <option value="{{$payment_method->id}}"
                                @if($contract->payment_method_id == $payment_method->id)
                                    selected
                                @endif>
                            {{$payment_method->name}}
                        </option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div id="tranches"
                     @if($contract->payment_type == \App\Model\Contract::PAYMENT_TYPE_ENTIRELY)
                        style="display: none;"
                     @endif>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary ddgi-add-tranche">
                            Добавить
                        </button>
                    </div>
                    <div class="table-responsive p-0 " style="max-height: 300px;">
                        <table class="table table-hover table-head-fixed">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Сумма</th>
                                    <th class="text-nowrap">От</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($contract->tranches as $key => $tranche)
                                <tr data-number="{{$key}}">
                                    <td>
                                        <input class="form-control"
                                               name="tranches[{{$key}}][sum]"
                                               type="text"
                                               value="{{$tranche->sum}}" />
                                    </td>
                                    <td>
                                        <input class="form-control"
                                               name="tranches[{{$key}}][from]"
                                               type="date"
                                               value="{{$tranche->from}}" />
                                    </td>
                                    <td>
                                        <input type="button" value="Удалить" class="btn btn-warning ddgi-remove-tranche" />
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="contract-from">Период страхования</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">с</span>
                        </div>
                        <input class="form-control @if($errors->has('contract.from')) is-invalid @endif"
                               id="contract-from"
                               name="contract[from]"
                               type="date"
                               value="{{$contract->from}}" />
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="contract-to">Период страхования</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">до</span>
                        </div>
                        <input class="form-control @if($errors->has('contract.from')) is-invalid @endif"
                               id="contract-to"
                               name="contract[to]"
                               type="date"
                               value="{{$contract->to}}" />
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="icheck-success ">
                    <input class="form-check-input client-type-radio"
                           id="tarif"
                           name="tarif"
                           onchange="toggleBlock('tarif', 'id=tarif-description')"
                           type="checkbox" />
                    <label class="form-check-label" for="tarif">Тариф</label>
                </div>
                <div class="form-group"
                     id="tarif-description"
                     style="display: none;">
                    <label for="contract-tarif" class="col-form-label">Укажите процент тарифа</label>
                    <input class="form-control @if($errors->has('contract.tarif')) is-invalid @endif"
                           id="contract-tarif"
                           name="contract[tarif]"
                           type="number"
                           value="{{$contract->tarif}}" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="icheck-success ">
                    <input class="form-check-input client-type-radio"
                           id="premium"
                           name="premium"
                           type="checkbox"
                           onchange="toggleBlock('premium', 'id=preim-description')" />
                    <label class="form-check-label" for="premium">Премия</label>
                </div>
                <div class="form-group"
                     id="preim-description"
                     style="display: none;">
                    <label for="contract-premium" class="col-form-label">Укажите процент премии</label>
                    <input class="form-control @if($errors->has('contract.premium')) is-invalid @endif"
                           id="contract-premium"
                           name="contract[premium]"
                           type="number"
                           value="{{$contract->premium}}" />
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function redirect(element) {
        var selected_option = element.selectedOptions[0];

        if (selected_option.dataset.route) {
            window.location = '/' + selected_option.dataset.route + '/create';
        }
    }

    function changeContractType(element) {
        document.querySelector('.list-' + '{{\App\Model\Contract::TYPE_INDIVIDUAL}}').setAttribute('hidden', 'true');
        document.querySelector('.list-' + '{{\App\Model\Contract::TYPE_LEGAL}}').setAttribute('hidden', 'true');

        document.querySelector('.list-' + element.value).removeAttribute('hidden');
    }

    const block = document.querySelector('#tranches');
    const button_add_tranche = block.querySelector('.ddgi-add-tranche');
    if (button_add_tranche) {
        button_add_tranche.addEventListener('click', function () {
            const tbody = block.querySelector('tbody');
            const tr = tbody.lastElementChild;
            const id = tr ? (+tr.dataset.number) + 1 : 0;

            const new_tranche = `
                <tr data-number="${id}">
                    <td>
                        <input type="text" class="form-control" name="tranches[${id}][sum]" />
                    </td>
                    <td>
                        <input type="date" class="form-control" name="tranches[${id}][from]" />
                    </td>
                    <td>
                        <input type="button" value="Удалить" class="btn btn-warning ddgi-remove-tranche" />
                    </td>
                  </tr>`;

            tbody.insertAdjacentHTML('beforeend', new_tranche);
        });
    }
    if (block) {
        block.addEventListener('click', function (event) {
            if (event.target.classList.contains('ddgi-remove-tranche')) {
                event.target.parentElement.parentElement.remove();
            }
        });
    }
</script>
