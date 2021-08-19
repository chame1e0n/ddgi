@section('includes.contract.block.1')
<div class="card card-success" id="contract-block-1">
    <div class="card-header">
        <h3 class="card-title">Тип контракта</h3>

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
                                <input @if($type == old('contract.type', $contract->type)) checked @endif
                                       @if($contract->exists) disabled @endif
                                       class="client-type-radio"
                                       id="contract-type-{{$type}}"
                                       name="contract[type]"
                                       type="radio"
                                       value="{{$type}}"
                                       onchange="defineSpecifications(this)" />

                                <label for="contract-type-{{$type}}">{{$label}}</label>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="contract-specification-id">Вид продукта</label>

                    <select @if($contract->exists) disabled="disabled" @endif
                            class="form-control @error('contract.specification_id') is-invalid @enderror"
                            id="contract-specification-id"
                            name="contract[specification_id]"
                            style="width: 100%;"
                            onchange="redirect(this)">
                        <option></option>

                        @foreach(\App\Model\Specification::getSpecificationsByType($contract->type) as $specification)
                            <option @if($specification->id == old('contract.specification_id', $contract->specification_id)) selected @endif
                                    value="{{$specification->id}}"
                                    data-route="{{\App\Model\Specification::$specification_key_to_routes[$specification->key]}}">
                                {{$specification->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div>
            <input id="specification-tariff" type="hidden" value="{{$contract->specification->tariff}}" />
        </div>
    </div>
</div>
@endsection

@section('includes.contract.block.2')
    <div class="card card-success" id="contract-block-2">
        <div class="card-header">
            <h3 class="card-title">Период страхования</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">с</span>
                            </div>

                            <input class="form-control ddgi-calculate @error('contract.from') is-invalid @enderror"
                                   id="contract-from"
                                   name="contract[from]"
                                   type="date"
                                   value="{{old('contract.from', $contract->from)}}" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">до</span>
                            </div>

                            <input class="form-control ddgi-calculate @error('contract.from') is-invalid @enderror"
                                   id="contract-to"
                                   name="contract[to]"
                                   type="date"
                                   value="{{old('contract.to', $contract->to)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('includes.contract.block.3')
    <div class="card card-success" id="contract-block-3">
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
                <div class="col-sm-4">
                    <div class="form-group form-inline justify-content-between">
                        <label for="contract-currency-id">Валюта взаиморасчетов</label>

                        <select class="form-control @error('contract.currency_id') is-invalid @enderror"
                                id="contract-currency-id"
                                name="contract[currency_id]"
                                style="width: 100%; text-align: center;">
                        @foreach(\App\Model\Currency::getOrderedCurrencies() as $currency)
                            <option @if($currency->id == old('contract.currency_id', $contract->currency_id)) selected @endif
                                    value="{{$currency->id}}">
                                {{$currency->code}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-inline justify-content-between">
                        <label for="contract-payment-type">Порядок оплаты страховой премии</label>

                        <select class="form-control payment-schedule @error('contract.payment_type') is-invalid @enderror"
                                id="contract-payment-type"
                                name="contract[payment_type]"
                                onchange="toggle('tranches', this.value == '{{\App\Model\Contract::PAYMENT_TYPE_TRANCHE}}')"
                                style="width: 100%; text-align: center;">
                        @foreach(\App\Model\Contract::$payment_types as $key => $value)
                            <option @if($key == old('contract.payment_type', $contract->payment_type)) selected @endif
                                    value="{{$key}}">
                                {{$value}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-inline justify-content-between">
                        <label for="contract-payment-method-id">Способ расчета</label>

                        <select class="form-control payment-schedule @error('contract.payment_method_id') is-invalid @enderror"
                                id="contract-payment-method-id"
                                name="contract[payment_method_id]"
                                style="width: 100%; text-align: center;">
                        @foreach(\App\Model\PaymentMethod::all() as $payment_method)
                            <option @if($payment_method->id == old('contract.payment_method_id', $contract->payment_method_id)) selected @endif
                                    value="{{$payment_method->id}}">
                                {{$payment_method->name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div id="tranches"
                         @if(old('contract.payment_type', $contract->payment_type) == \App\Model\Contract::PAYMENT_TYPE_ENTIRELY) style="display: none;" @endif>
                        <div class="table-responsive"
                             style="max-height: 300px;">
                            <table class="table table-hover table-head-fixed">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">Сумма</th>
                                        <th class="text-nowrap">От</th>
                                        <th>
                                            <div style="margin-bottom: -10px;">
                                                <button type="button" class="btn btn-primary ddgi-add-tranche">
                                                    Добавить
                                                </button>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contract->tranches as $key => $tranche)
                                    @include('includes.tranche_in_table')
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="icheck-success ">
                        <input @if($contract->tariff) checked @endif
                               class="form-check-input client-type-radio ddgi-calculate"
                               id="contract-tariff-switch"
                               name="contract_tariff_switch"
                               onchange="toggleSwitch(this, 'contract-tariff-block')"
                               type="checkbox" />

                        <label class="form-check-label" for="contract-tariff-switch">Тариф</label>
                    </div>
                    <div class="form-group"
                         id="contract-tariff-block"
                         @if(!$contract->tariff) style="display: none;" @endif>
                        <label for="contract-tariff" class="col-form-label">Укажите процент тарифа</label>

                        <input class="form-control ddgi-calculate @error('contract.tariff') is-invalid @enderror"
                               id="contract-tariff"
                               max="99.99"
                               min="0"
                               name="contract[tariff]"
                               step="0.01"
                               type="number"
                               value="{{old('contract.tariff', $contract->tariff)}}" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="icheck-success ">
                        <input @if($contract->premium) checked @endif
                               class="form-check-input client-type-radio ddgi-calculate"
                               id="contract-premium-switch"
                               name="contract_premium_switch"
                               onchange="toggleSwitch(this, 'contract-premium-block')"
                               type="checkbox" />

                        <label class="form-check-label" for="contract-premium-switch">Премия</label>
                    </div>
                    <div class="form-group"
                         id="contract-premium-block"
                         @if(!$contract->premium) style="display: none;" @endif>
                        <label for="contract-premium" class="col-form-label">Укажите процент премии</label>

                        <input class="form-control ddgi-calculate @error('contract.premium') is-invalid @enderror"
                               id="contract-premium"
                               max="99.99"
                               min="0"
                               name="contract[premium]"
                               step="0.01"
                               type="number"
                               value="{{old('contract.premium', $contract->premium)}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('includes.contract.block.4')
    <div class="card card-success" id="contract-block-4">
        <div class="card-header">
            <h3 class="card-title">Загрузка документов</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="files-questionary" class="col-form-label">Анкета</label>

                        @if($file = $contract->getFile(\App\Model\Contract::FILE_TYPE_QUESTIONARY))
                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                        @endif

                        <input class="form-control @error('files.questionary') is-invalid @enderror"
                               id="files-questionary"
                               name="files[questionary]"
                               type="file" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="files-agreement" class="col-form-label">Договор</label>

                        @if($file = $contract->getFile(\App\Model\Contract::FILE_TYPE_AGREEMENT))
                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                        @endif

                        <input class="form-control @error('files.agreement') is-invalid @enderror"
                               id="files-agreement"
                               name="files[agreement]"
                               type="file" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="files-policy" class="col-form-label">Полис</label>

                        @if($file = $contract->getFile(\App\Model\Contract::FILE_TYPE_POLICY))
                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                        @endif

                        <input class="form-control @error('files.policy') is-invalid @enderror"
                               id="files-policy"
                               name="files[policy]"
                               type="file" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection