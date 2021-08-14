@extends('layouts.index')

@section('content')
    <form action="{{route('avtocredit.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @include('includes.contract')

                    @include('includes.client')

                    @include('includes.borrower')

                    <div class="card card-info" id="contract-leasing-autocredit">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-leasing-autocredit-period-from">Срок кредитования</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control @if($errors->has('contract_leasing_autocredit.period_from')) is-invalid @endif"
                                                   id="contract-leasing-autocredit-period-from"
                                                   name="contract_leasing_autocredit[period_from]"
                                                   type="date"
                                                   value="{{old('contract_leasing_autocredit.period_from', $contract_leasing_autocredit->period_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-leasing-autocredit-period-to">Срок кредитования</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input required
                                                   class="form-control @if($errors->has('contract_leasing_autocredit.period_to')) is-invalid @endif"
                                                   id="contract-leasing-autocredit-period-to"
                                                   name="contract_leasing_autocredit[period_to]"
                                                   type="date"
                                                   value="{{old('contract_leasing_autocredit.period_to', $contract_leasing_autocredit->period_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-leasing-autocredit-sum">Сумма кредита</label>

                                        <input class="form-control @if($errors->has('contract_leasing_autocredit.sum')) is-invalid @endif"
                                               id="contract-leasing-autocredit-sum"
                                               name="contract_leasing_autocredit[sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_leasing_autocredit.sum', $contract_leasing_autocredit->sum)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies', ['model' => 'PolicyLeasingAutocredit'])
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