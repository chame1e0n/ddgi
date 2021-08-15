@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('garant.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @include('includes.principal')

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-guarantee">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные поля контракта</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Контрагент</h3>

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
                                                <label for="contract-guarantee-contragent-name">
                                                    Наименование контрагента
                                                </label>

                                                <input required
                                                       class="form-control @error('contract_guarantee.contragent_name') is-invalid @enderror"
                                                       id="contract-guarantee-contragent-name"
                                                       name="contract_guarantee[contragent_name]"
                                                       type="text"
                                                       value="{{old('contract_guarantee.contragent_name', $contract_guarantee->contragent_name)}}" />
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contract-guarantee-contragent-agreement">
                                                    Агентское соглашение(№)
                                                </label>

                                                <input required
                                                       class="form-control @error('contract_guarantee.contragent_agreement') is-invalid @enderror"
                                                       id="contract-guarantee-contragent-agreement"
                                                       name="contract_guarantee[contragent_agreement]"
                                                       type="text"
                                                       value="{{old('contract_guarantee.contragent_agreement', $contract_guarantee->contragent_agreement)}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contract-guarantee-contragent-from">
                                                    Агентское соглашение (от какого числа)
                                                </label>

                                                <input required
                                                       class="form-control @error('contract_guarantee.contragent_from') is-invalid @enderror"
                                                       id="contract-guarantee-contragent-from"
                                                       name="contract_guarantee[contragent_from]"
                                                       type="date"
                                                       value="{{old('contract_guarantee.contragent_from', $contract_guarantee->contragent_from)}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="contract-guarantee-period-from">
                                            Период поручительства
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_guarantee.period_from') is-invalid @enderror"
                                                   id="contract-guarantee-period-from"
                                                   name="contract_guarantee[period_from]"
                                                   type="date"
                                                   value="{{old('contract_guarantee.period_from', $contract_guarantee->period_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="period_poruchitelstva_do">
                                            Период поручительства
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_guarantee.period_to') is-invalid @enderror"
                                                   id="contract-guarantee-period-to"
                                                   name="contract_guarantee[period_to]"
                                                   type="date"
                                                   value="{{old('contract_guarantee.period_to', $contract_guarantee->period_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="contract-guarantee-waiting-from">
                                            Период ожидания
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input class="form-control @error('contract_guarantee.waiting_from') is-invalid @enderror"
                                                   id="contract-guarantee-waiting-from"
                                                   name="contract_guarantee[waiting_from]"
                                                   type="date"
                                                   value="{{old('contract_guarantee.waiting_from', $contract_guarantee->waiting_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="contract-guarantee-waiting-to">
                                            Период ожидания
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input class="form-control @error('contract_guarantee.waiting_to') is-invalid @enderror"
                                                   id="contract-guarantee-waiting-to"
                                                   name="contract_guarantee[waiting_to]"
                                                   type="date"
                                                   value="{{old('contract_guarantee.waiting_to', $contract_guarantee->waiting_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-guarantee-other-security-forms">
                                            Другие виды обеспечения по гарантии
                                        </label>

                                        <input class="form-control @error('contract_guarantee.other_security_forms') is-invalid @enderror"
                                               id="contract-guarantee-other-security-forms"
                                               name="contract_guarantee[other_security_forms]"
                                               type="text"
                                               value="{{old('contract_guarantee.other_security_forms', $contract_guarantee->other_security_forms)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-guarantee-other-information">
                                            Другая информация
                                        </label>

                                        <input class="form-control @error('contract_guarantee.other_information') is-invalid @enderror"
                                               id="contract-guarantee-other-information"
                                               name="contract_guarantee[other_information]"
                                               type="text"
                                               value="{{old('contract_guarantee.other_information', $contract_guarantee->other_information)}}" />
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