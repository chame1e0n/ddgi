@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('zalog_autozalog_mnogostoronniy.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @include('includes.beneficiary')

                    @include('includes.pledger')

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-multilateral-car-deposit">
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
                                        <label for="contract-multilateral-car-deposit-insurance-agreement-number" class="col-form-label">
                                            Номер договора страхования
                                        </label>
                                        <input required
                                               class="form-control @if($errors->has('contract_multilateral_car_deposit.insurance_agreement_number')) is-invalid @endif"
                                               id="contract-multilateral-car-deposit-insurance-agreement-number"
                                               name="contract_multilateral_car_deposit[insurance_agreement_number]"
                                               type="text"
                                               value="{{old('contract_multilateral_car_deposit.insurance_agreement_number', $contract_multilateral_car_deposit->insurance_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-multilateral-car-deposit-insurance-agreement-date" class="col-form-label">
                                            Дата договора страхования
                                        </label>
                                        <input required
                                               class="form-control @if($errors->has('contract_multilateral_car_deposit.insurance_agreement_date')) is-invalid @endif"
                                               id="contract-multilateral-car-deposit-insurance-agreement-date"
                                               name="contract_multilateral_car_deposit[insurance_agreement_date]"
                                               type="date"
                                               value="{{old('contract_multilateral_car_deposit.insurance_agreement_date', $contract_multilateral_car_deposit->insurance_agreement_date)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-multilateral-car-deposit-credit-agreement-number" class="col-form-label">
                                            Номер кредитного договора
                                        </label>
                                        <input required
                                               class="form-control @if($errors->has('contract_multilateral_car_deposit.credit_agreement_number')) is-invalid @endif"
                                               id="contract-multilateral-car-deposit-credit-agreement-number"
                                               name="contract_multilateral_car_deposit[credit_agreement_number]"
                                               type="text"
                                               value="{{old('contract_multilateral_car_deposit.credit_agreement_number', $contract_multilateral_car_deposit->credit_agreement_number)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-multilateral-car-deposit-credit-period-from">
                                            Период кредитного договора
                                        </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>
                                            <input required
                                                   class="form-control @if($errors->has('contract_multilateral_car_deposit.credit_period_from')) is-invalid @endif"
                                                   id="contract-multilateral-car-deposit-credit-period-from"
                                                   name="contract_multilateral_car_deposit[credit_period_from]"
                                                   type="date"
                                                   value="{{old('contract_multilateral_car_deposit.credit_period_from', $contract_multilateral_car_deposit->credit_period_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-multilateral-car-deposit-credit-period-to">
                                            Период кредитного договора
                                        </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>
                                            <input required
                                                   class="form-control @if($errors->has('contract_multilateral_car_deposit.credit_period_to')) is-invalid @endif"
                                                   id="contract-multilateral-car-deposit-credit-period-to"
                                                   name="contract_multilateral_car_deposit[credit_period_to]"
                                                   type="date"
                                                   value="{{old('contract_multilateral_car_deposit.credit_period_to', $contract_multilateral_car_deposit->credit_period_to)}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-multilateral-car-deposit-geo-zone" class="col-form-label">
                                            Географическая зона
                                        </label>
                                        <input required
                                               class="form-control @if($errors->has('contract_multilateral_car_deposit.geo_zone')) is-invalid @endif"
                                               id="contract-multilateral-car-deposit-geo-zone"
                                               name="contract_multilateral_car_deposit[geo_zone]"
                                               type="text"
                                               value="{{old('contract_multilateral_car_deposit.geo_zone', $contract_multilateral_car_deposit->geo_zone)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-multilateral-car-deposit-purpose" class="col-form-label">
                                            Цель использования ТС
                                        </label>
                                        <input required
                                               class="form-control @if($errors->has('contract_multilateral_car_deposit.purpose')) is-invalid @endif"
                                               id="contract-multilateral-car-deposit-purpose"
                                               name="contract_multilateral_car_deposit[purpose]"
                                               type="text"
                                               value="{{old('contract_multilateral_car_deposit.purpose', $contract_multilateral_car_deposit->purpose)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            При наружном осмотре ТС дефекты и повреждения?
                                        </label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_multilateral_car_deposit->overview_comment) checked @endif
                                                           onclick="toggle('overview-comment', true)"
                                                           type="radio"
                                                           id="radio-overview-yes"
                                                           name="radio_overview"
                                                           value="1" />
                                                    <label for="radio-overview-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_multilateral_car_deposit->overview_comment) checked @endif
                                                           onclick="toggle('overview-comment', false)"
                                                           type="radio"
                                                           id="radio-overview-no"
                                                           name="radio_overview"
                                                           value="0" />
                                                    <label for="radio-overview-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="overview-comment"
                                         @if(!$contract_multilateral_car_deposit->overview_comment) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contract-multilateral-car-deposit-overview-comment" class="col-form-label">
                                                        Комментарий
                                                    </label>
                                                    <input class="form-control @if($errors->has('contract_multilateral_car_deposit.overview_comment')) is-invalid @endif"
                                                           id="contract-multilateral-car-deposit-overview-comment"
                                                           name="contract_multilateral_car_deposit[overview_comment]"
                                                           type="text"
                                                           value="{{old('contract_multilateral_car_deposit.overview_comment', $contract_multilateral_car_deposit->overview_comment)}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="files-overview-photo" class="col-form-label">
                                                        Прикрепите фотографии
                                                    </label>
                                                    @if($file = $contract_multilateral_car_deposit->getFile(\App\Model\ContractMultilateralCarDeposit::FILE_OVERVIEW_PHOTO))
                                                        <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                    @endif
                                                    <input class="form-control @error('files.overview_photo') is-invalid @enderror"
                                                           id="files-overview-photo"
                                                           name="files[overview_photo]"
                                                           type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты?
                                        </label>
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_multilateral_car_deposit->insurance_comment) checked @endif
                                                           onclick="toggle('insurance-comment', true)"
                                                           type="radio"
                                                           id="radio-insurance-yes"
                                                           name="radio_insurance"
                                                           value="1" />
                                                    <label for="radio-insurance-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_multilateral_car_deposit->insurance_comment) checked @endif
                                                           onclick="toggle('insurance-comment', false)"
                                                           type="radio"
                                                           id="radio-insurance-no"
                                                           name="radio_insurance"
                                                           value="0" />
                                                    <label for="radio-insurance-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="insurance-comment"
                                         @if(!$contract_multilateral_car_deposit->insurance_comment) style="display: none;" @endif>
                                        <label for="contract-multilateral-car-deposit-insurance-comment" class="col-form-label">
                                            Комментарий
                                        </label>
                                        <input class="form-control @if($errors->has('contract_multilateral_car_deposit.insurance_comment')) is-invalid @endif"
                                               id="contract-multilateral-car-deposit-insurance-comment"
                                               name="contract_multilateral_car_deposit[insurance_comment]"
                                               type="text"
                                               value="{{old('contract_multilateral_car_deposit.insurance_comment', $contract_multilateral_car_deposit->insurance_comment)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies', ['model' => 'PolicyMultilateralCarDeposit'])

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
