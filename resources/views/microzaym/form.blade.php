@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('microzaym.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @yield('includes.contract.block.1')

                    @include('includes.client')

                    @include('includes.borrower')

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-microloan">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-microloan-credit-agreement-date">
                                            Дата кредитного договора
                                        </label>

                                        <input required
                                               class="form-control @error('contract_microloan.credit_agreement_date') is-invalid @enderror"
                                               id="contract-microloan-credit-agreement-date"
                                               name="contract_microloan[credit_agreement_date]"
                                               type="date"
                                               value="{{old('contract_microloan.credit_agreement_date', $contract_microloan->credit_agreement_date)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-microloan-microloan-sum">
                                            Сумма микрозайма
                                        </label>

                                        <input required
                                               class="form-control @error('contract_microloan.microloan_sum') is-invalid @enderror"
                                               id="contract-microloan-microloan-sum"
                                               min="0"
                                               name="contract_microloan[microloan_sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_microloan.microloan_sum', $contract_microloan->microloan_sum)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-microloan-purpose">
                                            Цель получения микрозайма
                                        </label>

                                        <input class="form-control @error('contract_microloan.purpose') is-invalid @enderror"
                                               id="contract-microloan-purpose"
                                               name="contract_microloan[purpose]"
                                               type="text"
                                               value="{{old('contract_microloan.purpose', $contract_microloan->purpose)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-microloan-microloan-from">
                                            Срок микрозайма
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_microloan.microloan_from') is-invalid @enderror"
                                                   id="contract-microloan-microloan-from"
                                                   name="contract_microloan[microloan_from]"
                                                   type="date"
                                                   value="{{old('contract_microloan.microloan_from', $contract_microloan->microloan_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-microloan-microloan-to">
                                            Срок микрозайма
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_microloan.microloan_to') is-invalid @enderror"
                                                   id="contract-microloan-microloan-to"
                                                   name="contract_microloan[microloan_to]"
                                                   type="date"
                                                   value="{{old('contract_microloan.microloan_to', $contract_microloan->microloan_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-microloan-waiting-from">
                                            Период ожидания
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input class="form-control @error('contract_microloan.waiting_from') is-invalid @enderror"
                                                   id="contract-microloan-waiting-from"
                                                   name="contract_microloan[waiting_from]"
                                                   type="date"
                                                   value="{{old('contract_microloan.waiting_from', $contract_microloan->waiting_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-microloan-waiting-to">
                                            Период ожидания
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input class="form-control @error('contract_microloan.waiting_to') is-invalid @enderror"
                                                   id="contract-microloan-waiting-to"
                                                   name="contract_microloan[waiting_to]"
                                                   type="date"
                                                   value="{{old('contract_microloan.waiting_to', $contract_microloan->waiting_to)}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policy_in_section')

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