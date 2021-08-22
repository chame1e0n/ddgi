@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('zalog_tehnika.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    <div class="card card-info" id="contract-special-equipment-pledge">
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-special-equipment-pledge-pledge-agreement-number" class="col-form-label">
                                            Номер договора залога
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.pledge_agreement_number')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-pledge-agreement-number"
                                               name="contract_special_equipment_pledge[pledge_agreement_number]"
                                               type="text"
                                               value="{{old('contract_special_equipment_pledge.pledge_agreement_number', $contract_special_equipment_pledge->pledge_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="contract-special-equipment-pledge-pledge-agreement-from" class="col-form-label">
                                        Период договора залога
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.pledge_agreement_from')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-pledge-agreement-from"
                                               name="contract_special_equipment_pledge[pledge_agreement_from]"
                                               type="date"
                                               value="{{old('contract_special_equipment_pledge.pledge_agreement_from', $contract_special_equipment_pledge->pledge_agreement_from)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="contract-special-equipment-pledge-pledge-agreement-to" class="col-form-label">
                                        Период договора залога
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.pledge_agreement_to')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-pledge-agreement-to"
                                               name="contract_special_equipment_pledge[pledge_agreement_to]"
                                               type="date"
                                               value="{{old('contract_special_equipment_pledge.pledge_agreement_to', $contract_special_equipment_pledge->pledge_agreement_to)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-special-equipment-pledge-estimation-basement" class="col-form-label">
                                            Основание для оценки
                                        </label>

                                        <input required
                                               class="form-control @if($errors->has('contract_special_equipment_pledge.estimation_basement')) is-invalid @endif"
                                               id="contract-special-equipment-pledge-estimation-basement"
                                               name="contract_special_equipment_pledge[estimation_basement]"
                                               type="text"
                                               value="{{old('contract_special_equipment_pledge.estimation_basement', $contract_special_equipment_pledge->estimation_basement)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Наличие пожарной сигнализации и средств пожаротушения
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE)) checked @endif
                                                           onclick="toggle('fire', true)"
                                                           type="radio"
                                                           id="radio-fire-yes"
                                                           name="radio_fire"
                                                           value="1" />

                                                    <label for="radio-fire-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE)) checked @endif
                                                           onclick="toggle('fire', false)"
                                                           type="radio"
                                                           id="radio-fire-no"
                                                           name="radio_fire"
                                                           value="0" />

                                                    <label for="radio-fire-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="fire"
                                         @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE)) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="files-fire-certificate" class="col-form-label">
                                                        Прикрепите сертификат
                                                    </label>

                                                    @if($file = $contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_FIRE_CERTIFICATE))
                                                        <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                    @endif

                                                    <input class="form-control @error('files.fire_certificate') is-invalid @enderror"
                                                           id="files-fire-certificate"
                                                           name="files[fire_certificate]"
                                                           type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>
                                            Наличие охранной сигнализации и средств защиты/охраны
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE)) checked @endif
                                                           onclick="toggle('security', true)"
                                                           type="radio"
                                                           id="radio-security-yes"
                                                           name="radio_security"
                                                           value="1" />

                                                    <label for="radio-security-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE)) checked @endif
                                                           onclick="toggle('security', false)"
                                                           type="radio"
                                                           id="radio-security-no"
                                                           name="radio_security"
                                                           value="0" />

                                                    <label for="radio-security-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="security"
                                         @if(!$contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE)) style="display: none;" @endif>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="files-security-certificate" class="col-form-label">
                                                        Прикрепите сертификат
                                                    </label>

                                                    @if($file = $contract_special_equipment_pledge->getFile(\App\Model\ContractSpecialEquipmentPledge::FILE_SECURITY_CERTIFICATE))
                                                        <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                    @endif

                                                    <input class="form-control @error('files.security_certificate') is-invalid @enderror"
                                                           id="files-security-certificate"
                                                           name="files[security_certificate]"
                                                           type="file" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php $contract_model = $contract_special_equipment_pledge @endphp

                    @include('includes.properties')

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
