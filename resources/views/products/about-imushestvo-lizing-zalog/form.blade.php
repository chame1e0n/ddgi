@extends('layouts.index')

@section('content')
    <form action="{{route('imushestvo_lizing_zalog.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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
                                    <li class="breadcrumb-item active"><a href="#">Продукты</a></li>
                                    <li class="breadcrumb-item active">Создать Продукт</li>
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

                    <div class="card card-info" id="contract-property-leasing">
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
                                        <label for="contract-property-leasing-geo-zone">
                                            Место страхования
                                        </label>

                                        <input required
                                               class="form-control @error('contract_property_leasing.geo_zone') is-invalid @enderror"
                                               id="contract-property-leasing-geo-zone"
                                               name="contract_property_leasing[geo_zone]"
                                               type="text"
                                               value="{{old('contract_property_leasing.geo_zone', $contract_property_leasing->geo_zone)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-property-leasing-insured-sum-for-closed-warehouse">
                                            Страховая сумма для закрытого склада с общей площадью
                                        </label>

                                        <input class="form-control @error('contract_property_leasing.insured_sum_for_closed_warehouse') is-invalid @enderror"
                                               id="contract-property-leasing-insured-sum-for-closed-warehouse"
                                               name="contract_property_leasing[insured_sum_for_closed_warehouse]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_property_leasing.insured_sum_for_closed_warehouse', $contract_property_leasing->insured_sum_for_closed_warehouse)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-property-leasing-insured-sum-for-opened-warehouse">
                                            Страховая сумма для открытого склада с общей площадью
                                        </label>

                                        <input class="form-control @error('contract_property_leasing.insured_sum_for_opened_warehouse') is-invalid @enderror"
                                               id="contract-property-leasing-insured-sum-for-opened-warehouse"
                                               name="contract_property_leasing[insured_sum_for_opened_warehouse]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_property_leasing.insured_sum_for_opened_warehouse', $contract_property_leasing->insured_sum_for_opened_warehouse)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-property-leasing-franchise-earthquake-fire-percent" class="col-form-label">
                                            % от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_property_leasing.franchise_earthquake_fire_percent') is-invalid @enderror"
                                               id="contract-property-leasing-franchise-earthquake-fire-percent"
                                               name="contract_property_leasing[franchise_earthquake_fire_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_property_leasing.franchise_earthquake_fire_percent', $contract_property_leasing->franchise_earthquake_fire_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-property-leasing-franchise-illegal-action-percent" class="col-form-label">
                                            % от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_property_leasing.franchise_illegal_action_percent') is-invalid @enderror"
                                               id="contract-property-leasing-franchise-illegal-action-percent"
                                               name="contract_property_leasing[franchise_illegal_action_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_property_leasing.franchise_illegal_action_percent', $contract_property_leasing->franchise_illegal_action_percent)}}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-property-leasing-franchise-other-risks-percent" class="col-form-label">
                                            % от страховой суммы по другим рискам по каждому убытку и/или по всем убыткам в результате каждого страхового случая
                                        </label>

                                        <input required
                                               class="form-control @error('contract_property_leasing.franchise_other_risks_percent') is-invalid @enderror"
                                               id="contract-property-leasing-franchise-other-risks-percent"
                                               name="contract_property_leasing[franchise_other_risks_percent]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_property_leasing.franchise_other_risks_percent', $contract_property_leasing->franchise_other_risks_percent)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php $contract_model = $contract_property_leasing @endphp

                    @include('includes.properties')

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
