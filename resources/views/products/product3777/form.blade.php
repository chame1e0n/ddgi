@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('product3777.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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
                                    <li class="breadcrumb-item active"><a href="/form">Продукты</a></li>
                                    <li class="breadcrumb-item active">Создать Продукт 3777</li>
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

                    <div class="card card-info" id="contract-family-is-entrepreneur">
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
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="contract-family-is-entrepreneur-period-from">
                                            Период кредитования
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_family_is_entrepreneur.period_from') is-invalid @enderror"
                                                   id="contract-family-is-entrepreneur-period-from"
                                                   name="contract_family_is_entrepreneur[period_from]"
                                                   type="date"
                                                   value="{{old('contract_family_is_entrepreneur.period_from', $contract_family_is_entrepreneur->period_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="contract-family-is-entrepreneur-period-to">
                                            Период кредитования
                                        </label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_family_is_entrepreneur.period_to') is-invalid @enderror"
                                                   id="contract-family-is-entrepreneur-period-to"
                                                   name="contract_family_is_entrepreneur[period_to]"
                                                   type="date"
                                                   value="{{old('contract_family_is_entrepreneur.period_to', $contract_family_is_entrepreneur->period_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-family-is-entrepreneur-purpose">
                                            Цель кредита
                                        </label>

                                        <input required
                                               class="form-control @error('contract_family_is_entrepreneur.purpose') is-invalid @enderror"
                                               id="contract-family-is-entrepreneur-purpose"
                                               name="contract_family_is_entrepreneur[purpose]"
                                               type="text"
                                               value="{{old('contract_family_is_entrepreneur.purpose', $contract_family_is_entrepreneur->purpose)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-family-is-entrepreneur-sum">
                                            Сумма кредита
                                        </label>

                                        <input required
                                               class="form-control @error('contract_family_is_entrepreneur.sum') is-invalid @enderror"
                                               id="contract-family-is-entrepreneur-sum"
                                               min="0"
                                               name="contract_family_is_entrepreneur[sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_family_is_entrepreneur.sum', $contract_family_is_entrepreneur->sum)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="contract-family-is-entrepreneur-other-security-forms">
                                                Другие обеспечения по кредиту
                                            </label>

                                            <textarea class="form-control @error('contract_family_is_entrepreneur.other_security_forms') is-invalid @enderror"
                                                      id="contract-family-is-entrepreneur-other-security-forms"
                                                      name="contract_family_is_entrepreneur[other_security_forms]">{{old('contract_family_is_entrepreneur.other_security_forms', $contract_family_is_entrepreneur->other_security_forms)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-passport">
                                            Паспорт
                                        </label>

                                        @if($file = $contract_family_is_entrepreneur->getFile(\App\Model\ContractFamilyIsEntrepreneur::FILE_PASSPORT))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.passport') is-invalid @enderror"
                                               id="files-passport"
                                               name="files[passport]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-contract">
                                            Договор
                                        </label>

                                        @if($file = $contract_family_is_entrepreneur->getFile(\App\Model\ContractFamilyIsEntrepreneur::FILE_CONTRACT))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.contract') is-invalid @enderror"
                                               id="files-contract"
                                               name="files[contract]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-certificate">
                                            Справка
                                        </label>

                                        @if($file = $contract_family_is_entrepreneur->getFile(\App\Model\ContractFamilyIsEntrepreneur::FILE_CERTIFICATE))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.certificate') is-invalid @enderror"
                                               id="files-certificate"
                                               name="files[certificate]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-other-document">
                                            Другой документ
                                        </label>

                                        @if($file = $contract_family_is_entrepreneur->getFile(\App\Model\ContractFamilyIsEntrepreneur::FILE_OTHER_DOCUMENT))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.other_document') is-invalid @enderror"
                                               id="files-other-document"
                                               name="files[other_document]"
                                               type="file" />
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