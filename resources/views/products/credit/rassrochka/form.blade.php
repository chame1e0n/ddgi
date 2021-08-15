@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{ route('rassrochka.' . ($contract->exists ? 'update' : 'store'), $contract->id) }}"
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
                            <div class="col-sm-6</div>
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

                    @yield('includes.contract.block.1')

                    @include('includes.client')

                    @include('includes.pledger')

                    @include('includes.beneficiary')

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-installment">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные поля контракта</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="contract-installment-sum">
                                        Сумма рассрочки
                                    </label>

                                    <input class="form-control @if($errors->has('contract_installment.sum')) is-invalid @endif"
                                           id="contract-installment-sum"
                                           name="contract_installment[sum]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('contract_installment.sum', $contract_installment->sum)}}" />
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
                                    <label>Утрата (Гибель) или повреждение ТС</label>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-loss-sum">Страховая сумма</label>

                                                    <input class="form-control @if($errors->has('contract_installment.loss_sum')) is-invalid @endif"
                                                           id="contract-installment-loss-sum"
                                                           name="contract_installment[loss_sum]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.loss_sum', $contract_installment->loss_sum)}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-loss-tariff">Тариф</label>

                                                    <input class="form-control @if($errors->has('contract_installment.loss_tariff')) is-invalid @endif"
                                                           id="contract-installment-loss-tariff"
                                                           name="contract_installment[loss_tariff]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.loss_tariff', $contract_installment->loss_tariff)}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-loss-premium">Страховая премия</label>

                                                    <input class="form-control @if($errors->has('contract_installment.loss_premium')) is-invalid @endif"
                                                           id="contract-installment-loss-premium"
                                                           name="contract_installment[loss_premium]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.loss_premium', $contract_installment->loss_premium)}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-loss-franchise">Франшиза</label>

                                                    <input class="form-control @if($errors->has('contract_installment.loss_franchise')) is-invalid @endif"
                                                           id="contract-installment-loss-franchise"
                                                           name="contract_installment[loss_franchise]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.loss_franchise', $contract_installment->loss_franchise)}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <label>Риск невозврата кредита</label>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-risk-sum">Страховая сумма</label>

                                                    <input class="form-control @if($errors->has('contract_installment.risk_sum')) is-invalid @endif"
                                                           id="contract-installment-risk-sum"
                                                           name="contract_installment[risk_sum]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.risk_sum', $contract_installment->risk_sum)}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-risk-tariff">Тариф</label>

                                                    <input class="form-control @if($errors->has('contract_installment.risk_tariff')) is-invalid @endif"
                                                           id="contract-installment-risk-tariff"
                                                           name="contract_installment[risk_tariff]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.risk_tariff', $contract_installment->risk_tariff)}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-risk-premium">Страховая премия</label>

                                                    <input class="form-control @if($errors->has('contract_installment.risk_premium')) is-invalid @endif"
                                                           id="contract-installment-risk-premium"
                                                           name="contract_installment[risk_premium]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.risk_premium', $contract_installment->risk_premium)}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="contract-installment-risk-franchise">Франшиза</label>

                                                    <input class="form-control @if($errors->has('contract_installment.risk_franchise')) is-invalid @endif"
                                                           id="contract-installment-risk-franchise"
                                                           name="contract_installment[risk_franchise]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('contract_installment.risk_franchise', $contract_installment->risk_franchise)}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies', ['model' => 'PolicyInstallment'])

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Франшиза</h3>

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
                                        <label for="contract-installment-franchise-earthquake-fire-percent">
                                            % от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_installment.franchise_earthquake_fire_percent')) is-invalid @endif"
                                               id="contract-installment-franchise-earthquake-fire-percent"
                                               name="contract_installment[franchise_earthquake_fire_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_installment.franchise_earthquake_fire_percent', $contract_installment->franchise_earthquake_fire_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-installment-franchise-illegal-action-percent">
                                            % от страховой суммы по риску противоправных действий третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_installment.franchise_illegal_action_percent')) is-invalid @endif"
                                               id="contract-installment-franchise-illegal-action-percent"
                                               name="contract_installment[franchise_illegal_action_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_installment.franchise_illegal_action_percent', $contract_installment->franchise_illegal_action_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-installment-franchise-other-risks-percent">
                                            % от страховой суммы по другим рискам по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_installment.franchise_other_risks_percent')) is-invalid @endif"
                                               id="contract-installment-franchise-other-risks-percent"
                                               name="contract_installment[franchise_other_risks_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_installment.franchise_other_risks_percent', $contract_installment->franchise_other_risks_percent)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @yield('includes.contract.block.3')

                    @yield('includes.contract.block.4')
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
