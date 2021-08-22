@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('credit_nepogashen.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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
                                    <li class="breadcrumb-item active">Редактировать Анкету</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    @include('includes.messages')

                    @yield('includes.contract.block.1')

                    @include('includes.client')

                    @include('includes.borrower')

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-credit-leasing-repayment">
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="contract-credit-leasing-repayment-loan-agreement">
                                                Кредитный договор
                                            </label>

                                            <input required
                                                   class="form-control @error('contract_credit_leasing_repayment.loan_agreement') is-invalid @enderror"
                                                   id="contract-credit-leasing-repayment-loan-agreement"
                                                   name="contract_credit_leasing_repayment[loan_agreement]"
                                                   type="text"
                                                   value="{{old('contract_credit_leasing_repayment.loan_agreement', $contract_credit_leasing_repayment->loan_agreement)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contract-credit-leasing-repayment-period-from" class="col-form-label">
                                        Срок кредитования
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>

                                        <input required
                                               class="form-control @error('contract_credit_leasing_repayment.period_from') is-invalid @enderror"
                                               id="contract-credit-leasing-repayment-period-from"
                                               name="contract_credit_leasing_repayment[period_from]"
                                               type="date"
                                               value="{{old('contract_credit_leasing_repayment.period_from', $contract_credit_leasing_repayment->period_from)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-credit-leasing-repayment-period-to" class="col-form-label">
                                            Срок кредитования
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                        <input required
                                               class="form-control @error('contract_credit_leasing_repayment.period_to') is-invalid @enderror"
                                               id="contract-credit-leasing-repayment-period-to"
                                               name="contract_credit_leasing_repayment[period_to]"
                                               type="date"
                                               value="{{old('contract_credit_leasing_repayment.period_to', $contract_credit_leasing_repayment->period_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="contract-credit-leasing-repayment-sum">
                                            Сумма кредита
                                        </label>

                                        <input required
                                               class="form-control @error('contract_credit_leasing_repayment.sum') is-invalid @enderror"
                                               id="contract-credit-leasing-repayment-sum"
                                               min="0"
                                               name="contract_credit_leasing_repayment[sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_credit_leasing_repayment.sum', $contract_credit_leasing_repayment->sum)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="contract-credit-leasing-repayment-purpose">
                                            Цель получения кредита
                                        </label>

                                        <input required
                                               class="form-control @error('contract_credit_leasing_repayment.purpose') is-invalid @enderror"
                                               id="contract-credit-leasing-repayment-purpose"
                                               name="contract_credit_leasing_repayment[purpose]"
                                               type="text"
                                               value="{{old('contract_credit_leasing_repayment.purpose', $contract_credit_leasing_repayment->purpose)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-credit-leasing-repayment-other-security-forms">
                                            Другие формы обеспечения обязательств по кредитному договору
                                        </label>

                                        <input class="form-control @error('contract_credit_leasing_repayment.other_security_forms') is-invalid @enderror"
                                               id="contract-credit-leasing-repayment-other-security-forms"
                                               name="contract_credit_leasing_repayment[other_security_forms]"
                                               type="text"
                                               value="{{old('contract_credit_leasing_repayment.other_security_forms', $contract_credit_leasing_repayment->other_security_forms)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policy_in_section')

                    @yield('includes.contract.block.3')

                    @yield('includes.contract.block.4')

                    @yield('includes.contract.block.5')
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
