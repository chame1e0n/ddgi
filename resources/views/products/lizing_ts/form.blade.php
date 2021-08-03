@extends('layouts.index')

@section('content')
    <form action="{{route('lizing_ts.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    <div class="card card-info" id="contract-autoleasing">
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="contract-autoleasing-geo-zone" class="col-form-label">
                                            Географическая зона
                                        </label>
                                        <input required
                                               class="form-control @if($errors->has('contract_autoleasing.geo_zone')) is-invalid @endif"
                                               id="contract-autoleasing-geo-zone"
                                               name="contract_autoleasing[geo_zone]"
                                               type="text"
                                               value="{{old('contract_autoleasing.geo_zone', $contract_autoleasing->geo_zone)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies', ['model' => 'PolicyAutoleasing'])
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
