@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('zalog_ipoteka.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    <div class="card card-info" id="contract-mortgage">
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
                                        <label for="contract-mortgage-between-agreement-number" class="col-form-label">
                                            Номер договора между страхователем и выгодоприобритателем
                                        </label>

                                        <input required
                                               class="form-control @error('contract_mortgage.between_agreement_number') is-invalid @enderror"
                                               id="contract-mortgage-between-agreement-number"
                                               name="contract_mortgage[between_agreement_number]"
                                               type="text"
                                               value="{{old('contract_mortgage.between_agreement_number', $contract_mortgage->between_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract-mortgage-between-agreement-date" class="col-form-label">
                                            Дата договора между страхователем и выгодоприобритателем
                                        </label>

                                        <input required
                                               class="form-control @error('contract_mortgage.between_agreement_date') is-invalid @enderror"
                                               id="contract-mortgage-between-agreement-date"
                                               name="contract_mortgage[between_agreement_date]"
                                               type="date"
                                               value="{{old('contract_mortgage.between_agreement_date', $contract_mortgage->between_agreement_date)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-mortgage-evaluation-basis" class="col-form-label">
                                            Основание для оценки
                                        </label>

                                        <input required
                                               class="form-control @error('contract_mortgage.evaluation_basis') is-invalid @enderror"
                                               id="contract-mortgage-evaluation-basis"
                                               name="contract_mortgage[evaluation_basis]"
                                               type="text"
                                               value="{{old('contract_mortgage.evaluation_basis', $contract_mortgage->evaluation_basis)}}" />
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
                                                    <input @if($contract_mortgage->fire_certificate) checked @endif
                                                           onclick="toggle('fire-certificate', true)"
                                                           type="radio"
                                                           id="radio-fire-certificate-yes"
                                                           name="radio_fire_certificate"
                                                           value="1" />

                                                    <label for="radio-fire-certificate-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_mortgage->fire_certificate) checked @endif
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
                                         @if(!$contract_mortgage->fire_certificate) style="display: none;" @endif>
                                        <div class="form-group">
                                            <label for="contract-mortgage-fire-certificate" class="col-form-label">
                                                Спецификация
                                            </label>

                                            <input class="form-control @error('contract_mortgage.fire_certificate') is-invalid @enderror"
                                                   id="contract-mortgage-fire-certificate"
                                                   name="contract_mortgage[fire_certificate]"
                                                   type="text"
                                                   value="{{old('contract_mortgage.fire_certificate', $contract_mortgage->fire_certificate)}}" />
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
                                                    <input @if($contract_mortgage->security_certificate) checked @endif
                                                           onclick="toggle('security-certificate', true)"
                                                           type="radio"
                                                           id="radio-security-certificate-yes"
                                                           name="radio_security_certificate"
                                                           value="1" />

                                                    <label for="radio-security-certificate-yes">Да</label>
                                                </div>
                                                <div class="checkbox icheck-success">
                                                    <input @if(!$contract_mortgage->security_certificate) checked @endif
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
                                         @if(!$contract_mortgage->security_certificate) style="display: none;" @endif>
                                        <div class="form-group">
                                            <label for="contract-mortgage-security-certificate" class="col-form-label">
                                                Причина
                                            </label>

                                            <input class="form-control @error('contract_mortgage.security_certificate') is-invalid @enderror"
                                                   id="contract-mortgage-security-certificate"
                                                   name="contract_mortgage[security_certificate]"
                                                   type="text"
                                                   value="{{old('contract_mortgage.security_certificate', $contract_mortgage->security_certificate)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-mortgage-franchise-earthquake-fire-percent" class="col-form-label">
                                            % от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_mortgage.franchise_earthquake_fire_percent') is-invalid @enderror"
                                               id="contract-mortgage-franchise-earthquake-fire-percent"
                                               max="99.99"
                                               min="0"
                                               name="contract_mortgage[franchise_earthquake_fire_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_mortgage.franchise_earthquake_fire_percent', $contract_mortgage->franchise_earthquake_fire_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-mortgage-franchise-illegal-action-percent" class="col-form-label">
                                            % от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_mortgage.franchise_illegal_action_percent') is-invalid @enderror"
                                               id="contract-mortgage-franchise-illegal-action-percent"
                                               max="99.99"
                                               min="0"
                                               name="contract_mortgage[franchise_illegal_action_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_mortgage.franchise_illegal_action_percent', $contract_mortgage->franchise_illegal_action_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-mortgage-franchise-other-risks-percent" class="col-form-label">
                                            % от страховой суммы по другим рискам по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_mortgage.franchise_other_risks_percent') is-invalid @enderror"
                                               id="contract-mortgage-franchise-other-risks-percent"
                                               max="99.99"
                                               min="0"
                                               name="contract_mortgage[franchise_other_risks_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_mortgage.franchise_other_risks_percent', $contract_mortgage->franchise_other_risks_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-passport" class="col-form-label">
                                            Паспорта
                                        </label>

                                        @foreach($contract_mortgage->getFiles(\App\Model\ContractMortgage::FILE_PASSPORT) as $file)
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

                                        @foreach($contract_mortgage->getFiles(\App\Model\ContractMortgage::FILE_TREATY) as $file)
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

                                        @foreach($contract_mortgage->getFiles(\App\Model\ContractMortgage::FILE_REFERENCE) as $file)
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

                                        @foreach($contract_mortgage->getFiles(\App\Model\ContractMortgage::FILE_OTHER_DOCUMENT) as $file)
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

                    @php $contract_model = $contract_mortgage @endphp

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
