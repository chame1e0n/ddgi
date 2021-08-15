@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('neshchastka_borrower.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @include('includes.insured_person')

                    @include('includes.beneficiary')

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-borrower-accident">
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-borrower-accident-loan-agreement">Кредитный договор</label>

                                        <div class="input-group mb-3">
                                            <input required
                                                   class="form-control @error('contract_borrower_accident.loan_agreement') is-invalid @enderror"
                                                   id="contract-borrower-accident-loan-agreement"
                                                   name="contract_borrower_accident[loan_agreement]"
                                                   type="text"
                                                   value="{{old('contract_borrower_accident.loan_agreement', $contract_borrower_accident->loan_agreement)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-borrower-accident-agreement-date">Дата заключения договора</label>

                                        <div class="input-group mb-3">
                                            <input required
                                                   class="form-control @error('contract_borrower_accident.agreement_date') is-invalid @enderror"
                                                   id="contract-borrower-accident-agreement-date"
                                                   name="contract_borrower_accident[agreement_date]"
                                                   type="date"
                                                   value="{{old('contract_borrower_accident.agreement_date', $contract_borrower_accident->agreement_date)}}" />
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

                @if(!$block)
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" id="form-save-button">
                            {{$contract->exists ? 'Изменить' : 'Добавить'}}
                        </button>
                    </div>
                @endif
            </div>
        </fieldset>
    </form>
@endsection
