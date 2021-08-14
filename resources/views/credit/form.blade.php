@extends('layouts.index')

@section('content')
    <form action="{{route('potrebkredit.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    <div class="card card-info" id="contract-consumer-credit">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-credit-agreement-number">
                                            Номер кредитного договора
                                        </label>

                                        <input required
                                               class="form-control @error('contract_consumer_credit.credit_agreement_number') is-invalid @enderror"
                                               id="contract-consumer-credit-credit-agreement-number"
                                               name="contract_consumer_credit[credit_agreement_number]"
                                               type="text"
                                               value="{{old('contract_consumer_credit.credit_agreement_number', $contract_consumer_credit->credit_agreement_number)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-credit-agreement-date">
                                            Дата кредитного договора
                                        </label>

                                        <input required
                                               class="form-control @error('contract_consumer_credit.credit_agreement_date') is-invalid @enderror"
                                               id="contract-consumer-credit-credit-agreement-date"
                                               name="contract_consumer_credit[credit_agreement_date]"
                                               type="date"
                                               value="{{old('contract_consumer_credit.credit_agreement_date', $contract_consumer_credit->credit_agreement_date)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-credit-sum">
                                            Сумма кредита
                                        </label>

                                        <input required
                                               class="form-control @error('contract_consumer_credit.credit_sum') is-invalid @enderror"
                                               id="contract-consumer-credit-credit-sum"
                                               name="contract_consumer_credit[credit_sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_consumer_credit.credit_sum', $contract_consumer_credit->credit_sum)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-credit-from">
                                            Срок кредита
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">с</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_consumer_credit.credit_from') is-invalid @enderror"
                                                   id="contract-consumer-credit-credit-from"
                                                   name="contract_consumer_credit[credit_from]"
                                                   type="date"
                                                   value="{{old('contract_consumer_credit.credit_from', $contract_consumer_credit->credit_from)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-credit-to">
                                            Срок кредита
                                        </label>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">до</span>
                                            </div>

                                            <input required
                                                   class="form-control @error('contract_consumer_credit.credit_to') is-invalid @enderror"
                                                   id="contract-consumer-credit-credit-to"
                                                   name="contract_consumer_credit[credit_to]"
                                                   type="date"
                                                   value="{{old('contract_consumer_credit.credit_to', $contract_consumer_credit->credit_to)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-collateral-type">
                                            Вид залогового обеспечения
                                        </label>

                                        <input required
                                               class="form-control @error('contract_consumer_credit.collateral_type') is-invalid @enderror"
                                               id="contract-consumer-credit-collateral-type"
                                               name="contract_consumer_credit[collateral_type]"
                                               type="text"
                                               value="{{old('contract_consumer_credit.collateral_type', $contract_consumer_credit->collateral_type)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-purpose">
                                            Цель получения кредита
                                        </label>

                                        <input class="form-control @error('contract_consumer_credit.purpose') is-invalid @enderror"
                                               id="contract-consumer-credit-purpose"
                                               name="contract_consumer_credit[purpose]"
                                               type="text"
                                               value="{{old('contract_consumer_credit.purpose', $contract_consumer_credit->purpose)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-description">
                                            Описание товара
                                        </label>

                                        <input required
                                               class="form-control @error('contract_consumer_credit.description') is-invalid @enderror"
                                               id="contract-consumer-credit-description"
                                               name="contract_consumer_credit[description]"
                                               type="text"
                                               value="{{old('contract_consumer_credit.description', $contract_consumer_credit->description)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-consumer-credit-collateral-sum">
                                            Сумма залогового обеспечения
                                        </label>

                                        <input required
                                               class="form-control @error('contract_consumer_credit.collateral_sum') is-invalid @enderror"
                                               id="contract-consumer-credit-collateral-sum"
                                               name="contract_consumer_credit[collateral_sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_consumer_credit.collateral_sum', $contract_consumer_credit->collateral_sum)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="files-passport">
                                            Загрузка паспорта заемщика
                                        </label>

                                        @if($file = $contract_consumer_credit->getFile(\App\Model\ContractConsumerCredit::FILE_PASSPORT))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.passport') is-invalid @enderror"
                                               id="files-passport"
                                               name="files[passport]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="files-consumer-loan-agreement">
                                            Загрузка договора потребительского кредита
                                        </label>

                                        @if($file = $contract_consumer_credit->getFile(\App\Model\ContractConsumerCredit::FILE_CONSUMER_LOAN_AGREEMENT))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.consumer_loan_agreement') is-invalid @enderror"
                                               id="files-consumer-loan-agreement"
                                               name="files[consumer_loan_agreement]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="files-residence-certificate">
                                            Загрузка справки с места жительство
                                        </label>

                                        @if($file = $contract_consumer_credit->getFile(\App\Model\ContractConsumerCredit::FILE_RESIDENCE_CERTIFICATE))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.residence_certificate') is-invalid @enderror"
                                               id="files-residence-certificate"
                                               name="files[residence_certificate]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="files-employment-certificate">
                                            Загрузка справки с места работы
                                        </label>

                                        @if($file = $contract_consumer_credit->getFile(\App\Model\ContractConsumerCredit::FILE_EMPLOYMENT_CERTIFICATE))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.employment_certificate') is-invalid @enderror"
                                               id="files-employment-certificate"
                                               name="files[employment_certificate]"
                                               type="file" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group" class="col-form-label">
                                        <label for="files-document">
                                            Загрузка других документов
                                        </label>

                                        @foreach($contract_consumer_credit->getFiles(\App\Model\ContractConsumerCredit::FILE_DOCUMENT) as $file)
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endforeach

                                        <input multiple
                                               class="form-control @error('files.document') is-invalid @enderror"
                                               id="files-document"
                                               name="files[document][]"
                                               type="file" />
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