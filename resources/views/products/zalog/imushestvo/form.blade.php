@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('multilateral_zalog_imushestvo.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
          method="POST"
          id="form-contract"
          enctype="multipart/form-data">
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

                    <div class="card card-info" id="contract-multilateral-property-pledge">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-multilateral-property-pledge-between-agreement-number" class="col-form-label">
                                            Номер договора между страхователем и выгодоприобритателем
                                        </label>

                                        <input required
                                               class="form-control @error('contract_multilateral_property_pledge.between_agreement_number') is-invalid @enderror"
                                               id="contract-multilateral-property-pledge-between-agreement-number"
                                               name="contract_multilateral_property_pledge[between_agreement_number]"
                                               type="text"
                                               value="{{old('contract_multilateral_property_pledge.between_agreement_number', $contract_multilateral_property_pledge->between_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-multilateral-property-pledge-between-agreement-date" class="col-form-label">
                                            Дата договора между страхователем и выгодоприобритателем
                                        </label>

                                        <input required
                                               class="form-control @error('contract_multilateral_property_pledge.between_agreement_date') is-invalid @enderror"
                                               id="contract-multilateral-property-pledge-between-agreement-date"
                                               name="contract_multilateral_property_pledge[between_agreement_date]"
                                               type="date"
                                               value="{{old('contract_multilateral_property_pledge.between_agreement_date', $contract_multilateral_property_pledge->between_agreement_date)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-multilateral-property-pledge-evaluation-basis" class="col-form-label">
                                            Основание для оценки
                                        </label>

                                        <input required
                                               class="form-control @error('contract_multilateral_property_pledge.evaluation_basis') is-invalid @enderror"
                                               id="contract-multilateral-property-pledge-evaluation-basis"
                                               name="contract_multilateral_property_pledge[evaluation_basis]"
                                               type="text"
                                               value="{{old('contract_multilateral_property_pledge.evaluation_basis', $contract_multilateral_property_pledge->evaluation_basis)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            Наличие пожарной сигнализации и средств пожаротушения?
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_multilateral_property_pledge->fire_certificate) checked @endif
                                                           onclick="toggle('fire-certificate', true)"
                                                           type="radio"
                                                           id="radio-fire-certificate-yes"
                                                           name="radio_fire_certificate"
                                                           value="1" />

                                                    <label for="radio-fire-certificate-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_multilateral_property_pledge->fire_certificate) checked @endif
                                                           onclick="toggle('fire-certificate', false)"
                                                           type="radio"
                                                           id="radio-fire-certificate-no"
                                                           name="radio_fire_certificate"
                                                           value="0" />

                                                    <label for="radio-fire-certificate-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="fire-certificate"
                                         @if(!$contract_multilateral_property_pledge->fire_certificate) style="display: none;" @endif>
                                        <div class="form-group">
                                            <label for="contract-multilateral-property-pledge-fire-certificate" class="col-form-label">
                                                Спецификация
                                            </label>

                                            <input class="form-control @if($errors->has('contract_multilateral_property_pledge.fire_certificate')) is-invalid @endif"
                                                   id="contract-multilateral-property-pledge-fire-certificate"
                                                   name="contract_multilateral_property_pledge[fire_certificate]"
                                                   type="text"
                                                   value="{{old('contract_multilateral_property_pledge.fire_certificate', $contract_multilateral_property_pledge->fire_certificate)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            Наличие охранной сигнализации и средств защиты/охраны?
                                        </label>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <div class="checkbox icheck-success">
                                                    <input @if($contract_multilateral_property_pledge->security_certificate) checked @endif
                                                           onclick="toggle('security-certificate', true)"
                                                           type="radio"
                                                           id="radio-security-certificate-yes"
                                                           name="radio_security_certificate"
                                                           value="1" />

                                                    <label for="radio-security-certificate-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_multilateral_property_pledge->security_certificate) checked @endif
                                                           onclick="toggle('security-certificate', false)"
                                                           type="radio"
                                                           id="radio-security-certificate-no"
                                                           name="radio_security_certificate"
                                                           value="0" />

                                                    <label for="radio-security-certificate-no">Нет</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"
                                         id="security-certificate"
                                         @if(!$contract_multilateral_property_pledge->security_certificate) style="display: none;" @endif>
                                        <div class="form-group">
                                            <label for="contract-multilateral-property-pledge-security-certificate" class="col-form-label">
                                                Причина
                                            </label>

                                            <input class="form-control @if($errors->has('contract_multilateral_property_pledge.security_certificate')) is-invalid @endif"
                                                   id="contract-multilateral-property-pledge-security-certificate"
                                                   name="contract_multilateral_property_pledge[security_certificate]"
                                                   type="text"
                                                   value="{{old('contract_multilateral_property_pledge.security_certificate', $contract_multilateral_property_pledge->security_certificate)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-multilateral-property-pledge-franchise-earthquake-fire-percent" class="col-form-label">
                                            % от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_multilateral_property_pledge.franchise_earthquake_fire_percent') is-invalid @enderror"
                                               id="contract-multilateral-property-pledge-franchise-earthquake-fire-percent"
                                               name="contract_multilateral_property_pledge[franchise_earthquake_fire_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_multilateral_property_pledge.franchise_earthquake_fire_percent', $contract_multilateral_property_pledge->franchise_earthquake_fire_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-multilateral-property-pledge-franchise-illegal-action-percent" class="col-form-label">
                                            % от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_multilateral_property_pledge.franchise_illegal_action_percent') is-invalid @enderror"
                                               id="contract-multilateral-property-pledge-franchise-illegal-action-percent"
                                               name="contract_multilateral_property_pledge[franchise_illegal_action_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_multilateral_property_pledge.franchise_illegal_action_percent', $contract_multilateral_property_pledge->franchise_illegal_action_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-multilateral-property-pledge-franchise-other-risks-percent" class="col-form-label">
                                            % от страховой суммы по другим рискам по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_multilateral_property_pledge.franchise_other_risks_percent') is-invalid @enderror"
                                               id="contract-multilateral-property-pledge-franchise-other-risks-percent"
                                               name="contract_multilateral_property_pledge[franchise_other_risks_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_multilateral_property_pledge.franchise_other_risks_percent', $contract_multilateral_property_pledge->franchise_other_risks_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-passport" class="col-form-label">
                                            Паспорта
                                        </label>

                                        @foreach($contract_multilateral_property_pledge->getFiles(\App\Model\ContractMultilateralPropertyPledge::FILE_PASSPORT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.passport') is-invalid @enderror"
                                               id="files-passport"
                                               name="files[passport][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-treaty" class="col-form-label">
                                            Договора
                                        </label>

                                        @foreach($contract_multilateral_property_pledge->getFiles(\App\Model\ContractMultilateralPropertyPledge::FILE_TREATY) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.treaty') is-invalid @enderror"
                                               id="files-treaty"
                                               name="files[treaty][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-reference" class="col-form-label">
                                            Справки
                                        </label>

                                        @foreach($contract_multilateral_property_pledge->getFiles(\App\Model\ContractMultilateralPropertyPledge::FILE_REFERENCE) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.reference') is-invalid @enderror"
                                               id="files-reference"
                                               name="files[reference][]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-other-document" class="col-form-label">
                                            Другие документы
                                        </label>

                                        @foreach($contract_multilateral_property_pledge->getFiles(\App\Model\ContractMultilateralPropertyPledge::FILE_OTHER_DOCUMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.other_document') is-invalid @enderror"
                                               id="files-other-document"
                                               name="files[other_document][]"
                                               type="file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php $contract_model = $contract_multilateral_property_pledge @endphp

                    @include('includes.properties')

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
