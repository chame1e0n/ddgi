@extends('layouts.index')

@include('includes.contract')

@section('content')
    <form action="{{route('borrower_sportsman.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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

                    <div class="card card-info" id="contract-sportsman">
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
                                        <label for="contract-sportsman-geo-zone">Географическая зона</label>
                                        <input required
                                               class="form-control @error('contract_sportsman.geo_zone') is-invalid @enderror"
                                               id="contract-sportsman-geo-zone"
                                               name="contract_sportsman[geo_zone]"
                                               type="text"
                                               value="{{old('contract_sportsman.geo_zone', $contract_sportsman->geo_zone)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-sportsman-quantity">Общая численность спортсменов</label>
                                        <input required
                                               class="form-control @error('contract_sportsman.quantity') is-invalid @enderror"
                                               id="contract-sportsman-quantity"
                                               name="contract_sportsman[quantity]"
                                               step="1"
                                               type="number"
                                               value="{{old('contract_sportsman.quantity', $contract_sportsman->quantity)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-sportsman-location">Место проведения соревнований</label>
                                        <input required
                                               class="form-control @error('contract_sportsman.location') is-invalid @enderror"
                                               id="contract-sportsman-location"
                                               name="contract_sportsman[location]"
                                               type="text"
                                               value="{{old('contract_sportsman.location', $contract_sportsman->location)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="contract-sportsman-insurance-cases">Страховые случаи</label>
                                        <input class="form-control @error('contract_sportsman.insurance_cases') is-invalid @enderror"
                                               id="contract-sportsman-insurance-cases"
                                               name="contract_sportsman[insurance_cases]"
                                               type="text"
                                               value="{{old('contract_sportsman.insurance_cases', $contract_sportsman->insurance_cases)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="icheck-success ">
                                        <input @if($contract_sportsman->is_extended) checked @endif
                                               class="form-check-input client-type-radio"
                                               id="contract-sportsman-is-extended"
                                               name="contract_sportsman[is_extended]"
                                               type="checkbox" />
                                        <label for="contract-sportsman-is-extended">
                                            Хотите ли вы расширить сферу страхового покрытия на период тренировок и учебно-тренировочных занятий на спортивных базах?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies', ['model' => 'PolicySportsman'])

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
