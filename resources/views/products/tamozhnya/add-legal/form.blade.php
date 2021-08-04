@extends('layouts.index')

@section('content')
    <form action="{{route('tamozhnya_add_legal.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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
                                    <li class="breadcrumb-item active"><a href="/form">Договор</a></li>
                                    <li class="breadcrumb-item active">Изменить Договор</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    @include('includes.messages')

                    @include('includes.contract')

                    @include('includes.client')

                    <div class="card card-info" id="contract-custom-payment">
                        <div class="card-header">
                            <h3 class="card-title">Информация о подерженности рискам</h3>

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
                                        <label class="col-form-label" for="contract-custom-payment-description">
                                            Описание
                                        </label>

                                        <textarea required
                                                  class="form-control @error('contract_custom_payment.description') is-invalid @enderror"
                                                  id="contract-custom-payment-description"
                                                  name="contract_custom_payment[description]">{{old('contract_custom_payment.description', $contract_custom_payment->description)}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contract-custom-payment-period-from" class="col-form-label">
                                        Период деятельности
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>

                                        <input required
                                               class="form-control @error('contract_custom_payment.period_from') is-invalid @enderror"
                                               id="contract-custom-payment-period-from"
                                               name="contract_custom_payment[period_from]"
                                               type="date"
                                               value="{{old('contract_custom_payment.period_from', $contract_custom_payment->period_from)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contract-custom-payment-period-to" class="col-form-label">
                                        Период деятельности
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>

                                        <input required
                                               class="form-control @error('contract_custom_payment.period_to') is-invalid @enderror"
                                               id="contract-custom-payment-period-to"
                                               name="contract_custom_payment[period_to]"
                                               type="date"
                                               value="{{old('contract_custom_payment.period_to', $contract_custom_payment->period_to)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contract-custom-payment-risks">
                                            Профессиональные риски
                                        </label>

                                        <input required
                                               class="form-control @error('contract_custom_payment.risks') is-invalid @enderror"
                                               id="contract-custom-payment-risks"
                                               name="contract_custom_payment[risks]"
                                               type="text"
                                               value="{{old('contract_custom_payment.risks', $contract_custom_payment->risks)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>
                                            Были ли в Вашей практике случаи, когда  Вам была предъявлена претензия или иск таможенными органами РУз
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_custom_payment->cause) checked @endif
                                                           onclick="toggle('cause', true)"
                                                           type="radio"
                                                           id="radio-cause-yes"
                                                           name="radio_cause"
                                                           value="1" />

                                                    <label for="radio-cause-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_custom_payment->cause) checked @endif
                                                           onclick="toggle('cause', false)"
                                                           type="radio"
                                                           id="radio-cause-no"
                                                           name="radio_cause"
                                                           value="0" />

                                                    <label for="radio-cause-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="cause"
                                         @if(!$contract_custom_payment->cause) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="contract-custom-payment-cause" class="col-form-label">
                                                        Описание причины
                                                    </label>

                                                    <input class="form-control @if($errors->has('contract_custom_payment.cause')) is-invalid @endif"
                                                           id="contract-custom-payment-cause"
                                                           name="contract_custom_payment[cause]"
                                                           type="text"
                                                           value="{{old('contract_custom_payment.cause', $contract_custom_payment->cause)}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policy_in_section')
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