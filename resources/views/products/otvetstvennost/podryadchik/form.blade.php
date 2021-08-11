@extends('layouts.index')

@section('content')
    <form action="{{route('otvetstvennost_podryadchik.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    @include('includes.beneficiary')

                    <div class="card card-info" id="contract-borrower-accident">
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
                                        <label for="contract-contractor-geo-zone">Географическая зона</label>

                                        <input required
                                               class="form-control @error('contract_contractor.geo_zone') is-invalid @enderror"
                                               id="contract-contractor-geo-zone"
                                               name="contract_contractor[geo_zone]"
                                               type="text"
                                               value="{{old('contract_contractor.geo_zone', $contract_contractor->geo_zone)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-contractor-construction-object">Объект строительства</label>

                                        <input required
                                               class="form-control @error('contract_contractor.construction_object') is-invalid @enderror"
                                               id="contract-contractor-construction-object"
                                               name="contract_contractor[construction_object]"
                                               type="text"
                                               value="{{old('contract_contractor.construction_object', $contract_contractor->construction_object)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-contractor-work-experience">Стаж работы</label>

                                        <input required
                                               class="form-control @error('contract_contractor.work_experience') is-invalid @enderror"
                                               id="contract-contractor-work-experience"
                                               name="contract_contractor[work_experience]"
                                               type="text"
                                               value="{{old('contract_contractor.work_experience', $contract_contractor->work_experience)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="files-overview-photo">Договор подряда</label>

                                        @if($file = $contract_contractor->getFile(\App\Model\ContractContractor::FILE_CONTRACT))
                                            <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                        @endif

                                        <input class="form-control @error('files.contract') is-invalid @enderror"
                                               id="files-contract"
                                               name="files[contract]"
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
