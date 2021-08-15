@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('zalog_autozalog3x.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @yield('includes.contract.block.2')

                    <div class="card card-info" id="contract-trilateral-car-deposit">
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
                                        <label for="contract-trilateral-car-deposit-credit-agreement-number" class="col-form-label">
                                            Номер кредитного договора
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_trilateral_car_deposit.credit_agreement_number')) is-invalid @endif"
                                               id="contract-trilateral-car-deposit-credit-agreement-number"
                                               name="contract_trilateral_car_deposit[credit_agreement_number]"
                                               type="text"
                                               value="{{old('contract_trilateral_car_deposit.credit_agreement_number', $contract_trilateral_car_deposit->credit_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-trilateral-car-deposit-credit-period-from">
                                            Период кредитного договора
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control @if($errors->has('contract_trilateral_car_deposit.credit_period_from')) is-invalid @endif"
                                                   id="contract-trilateral-car-deposit-credit-period-from"
                                                   name="contract_trilateral_car_deposit[credit_period_from]"
                                                   type="date"
                                                   value="{{old('contract_trilateral_car_deposit.credit_period_from', $contract_trilateral_car_deposit->credit_period_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="period_kredit_dogovor_to">
                                            Период кредитного договора
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input required
                                                   class="form-control @if($errors->has('contract_trilateral_car_deposit.credit_period_to')) is-invalid @endif"
                                                   id="contract-trilateral-car-deposit-credit-period-to"
                                                   name="contract_trilateral_car_deposit[credit_period_to]"
                                                   type="date"
                                                   value="{{old('contract_trilateral_car_deposit.credit_period_to', $contract_trilateral_car_deposit->credit_period_to)}}" />
                                        </div>
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
                                                    <input @if($contract_trilateral_car_deposit->defect_damage_comment) checked @endif
                                                           onclick="toggle('defect-damage-comment', true)"
                                                           type="radio"
                                                           id="radio-defect-damage-yes"
                                                           name="radio_defect_damage"
                                                           value="1" />

                                                    <label for="radio-defect-damage-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_trilateral_car_deposit->defect_damage_comment) checked @endif
                                                           onclick="toggle('defect-damage-comment', false)"
                                                           type="radio"
                                                           id="radio-defect-damage-no"
                                                           name="radio_defect_damage"
                                                           value="0" />

                                                    <label for="radio-defect-damage-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="defect-damage-comment"
                                         @if(!$contract_trilateral_car_deposit->defect_damage_comment) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="contract-trilateral-car-deposit-defect-damage-comment" class="col-form-label">
                                                        Комментарий
                                                    </label>

                                                    <input class="form-control @if($errors->has('contract_trilateral_car_deposit.defect_damage_comment')) is-invalid @endif"
                                                           id="contract-trilateral-car-deposit-defect-damage-comment"
                                                           name="contract_trilateral_car_deposit[defect_damage_comment]"
                                                           type="text"
                                                           value="{{old('contract_trilateral_car_deposit.defect_damage_comment', $contract_trilateral_car_deposit->defect_damage_comment)}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="files-defect-damage-photo" class="col-form-label">
                                                        Прикрепите фотографии
                                                    </label>
                                                    @if($file = $contract_trilateral_car_deposit->getFile(\App\Model\ContractTrilateralCarDeposit::FILE_DEFECT_DAMAGE_PHOTO))
                                                        <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                    @endif
                                                    <input class="form-control @error('files.defect_damage_photo') is-invalid @enderror"
                                                           id="files-defect-damage-photo"
                                                           name="files[defect_damage_photo]"
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
                                                    <input @if($contract_trilateral_car_deposit->actual_insurance_comment) checked @endif
                                                           onclick="toggle('actual-insurance-comment', true)"
                                                           type="radio"
                                                           id="radio-actual-insurance-yes"
                                                           name="radio_actual_insurance"
                                                           value="1" />

                                                    <label for="radio-actual-insurance-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_trilateral_car_deposit->actual_insurance_comment) checked @endif
                                                           onclick="toggle('actual-insurance-comment', false)"
                                                           type="radio"
                                                           id="radio-actual-insurance-no"
                                                           name="radio_actual_insurance"
                                                           value="0" />

                                                    <label for="radio-actual-insurance-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="actual-insurance-comment"
                                         @if(!$contract_trilateral_car_deposit->actual_insurance_comment) style="display: none;" @endif>
                                        <label for="contract-trilateral-car-deposit-actual-insurance-comment" class="col-form-label">
                                            Комментарий
                                        </label>

                                        <input class="form-control @if($errors->has('contract_trilateral_car_deposit.actual_insurance_comment')) is-invalid @endif"
                                               id="contract-trilateral-car-deposit-actual-insurance-comment"
                                               name="contract_trilateral_car_deposit[actual_insurance_comment]"
                                               type="text"
                                               value="{{old('contract_trilateral_car_deposit.actual_insurance_comment', $contract_trilateral_car_deposit->actual_insurance_comment)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies', ['model' => 'PolicyTrilateralCarDeposit'])

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
