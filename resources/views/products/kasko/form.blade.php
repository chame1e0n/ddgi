@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('kasco.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    <div class="card card-info" id="contract-casco">
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
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-casco-usage-basement">Использование транспортного средства на основании</label>

                                        <select class="form-control @error('contract_casco.usage_basement') is-invalid @enderror"
                                                id="contract-casco-usage-basement"
                                                name="contract_casco[usage_basement]">
                                        @foreach(\App\Model\ContractCasco::$usage_basements as $key => $value)
                                            <option @if($key == old('contract_casco.usage_basement', $contract_casco->usage_basement)) selected @endif
                                                    value="{{$key}}">
                                                {{$value}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-casco-geo-zone">Географическая зона</label>

                                        <input required
                                               class="form-control @if($errors->has('contract_casco.geo_zone')) is-invalid @endif"
                                               id="contract-casco-geo-zone"
                                               name="contract_casco[geo_zone]"
                                               type="text"
                                               value="{{old('contract_casco.geo_zone', $contract_casco->geo_zone)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies', ['model' => 'PolicyCasco'])

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
