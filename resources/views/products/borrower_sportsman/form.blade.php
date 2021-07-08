@extends('layouts.index')

@section('content')
    <form action="{{route('borrower_sportsman.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
          enctype="multipart/form-data"
          id="form-contract"
          method="post">
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

                    <div class="card card-info" id="contract_borrower_accident">
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
                                               type="text"
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
                    <div class="card card-info" id="clone-beneficiary">
                        <div class="card-header">
                            <h3 class="card-title">Полисы</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive p-0 " style="max-height: 300px;">
                                <div id="product-fields" class="product-fields" data-field-number="0">
                                    <table class="table table-hover table-head-fixed" id="empTable_u">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">Наименование полиса</th>
                                                <th class="text-nowrap">Серия полиса</th>
                                                <th class="text-nowrap">Ответственное лицо</th>
                                                <th class="text-nowrap">Действие полиса от</th>
                                                <th class="text-nowrap">Действие полиса до</th>
                                                <th class="text-nowrap">Страховая сумма</th>
                                                <th class="text-nowrap">Страховая премия</th>
                                                <th class="text-nowrap">Франшиза</th>
                                                <th class="text-nowrap" colspan="2">Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($contract->policies as $key => $policy)
                                                <tr data-number="{{$key}}">
                                                    <td>
                                                        <input required
                                                               @if($policy->contract_id) disabled @endif
                                                               class="form-control @error('policies.' . $key . '.name') is-invalid @enderror"
                                                               id="policies-{{$key}}-name"
                                                               name="policies[{{$key}}][name]"
                                                               type="text"
                                                               value="{{old('policies.' . $key . '.name', $policy->name)}}" />
                                                    </td>
                                                    <td>
                                                        <select required
                                                                @if($policy->contract_id) disabled @endif
                                                                class="form-control select2 @error('policies.' . $key . '.series') is-invalid @enderror"
                                                                id="policies-{{$key}}-series"
                                                                name="policies[{{$key}}][series]">
                                                            <option></option>

                                                            @foreach(\App\Model\Policy::all() as $policy_series)
                                                                <option @if($policy_series->id == old('policies.' . $key . '.series', $policy->series)) selected="selected" @endif
                                                                        value="{{$policy_series->series}}">
                                                                    {{$policy_series->series}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input disabled="disabled"
                                                               class="form-control"
                                                               id="policies-{{$key}}-responsible-person"
                                                               type="text"
                                                               value="" />
                                                    </td>
                                                    <td>
                                                        <input required
                                                               class="form-control @error('policies.' . $key . '.polis_from_date') is-invalid @enderror"
                                                               id="policies-{{$key}}-polis-from-date"
                                                               name="policies[{{$key}}][polis_from_date]"
                                                               type="date"
                                                               value="{{old('policies.' . $key . '.polis_from_date', $policy->polis_from_date)}}" />
                                                    </td>
                                                    <td>
                                                        <input required
                                                               class="form-control @error('policies.' . $key . '.polis_to_date') is-invalid @enderror"
                                                               id="policies-{{$key}}-polis-to-date"
                                                               name="policies[{{$key}}][polis_to_date]"
                                                               type="date"
                                                               value="{{old('policies.' . $key . '.polis_to_date', $policy->polis_to_date)}}" />
                                                    </td>
                                                    <td>
                                                        <input required
                                                               class="form-control @error('policies.' . $key . '.insurance_sum') is-invalid @enderror"
                                                               id="policies-{{$key}}-insurance-sum"
                                                               name="policies[{{$key}}][insurance_sum]"
                                                               step="0.01"
                                                               type="number"
                                                               value="{{old('policies.' . $key . '.insurance_sum', $policy->insurance_sum)}}" />
                                                    </td>
                                                    <td>
                                                        <input disabled="disabled"
                                                               class="form-control"
                                                               id="policies-{{$key}}-insurance-premium"
                                                               type="text"
                                                               value="" />
                                                    </td>
                                                    <td>
                                                        <input required
                                                               class="form-control @error('policies.' . $key . '.franchise') is-invalid @enderror"
                                                               id="policy-{{$key}}-franchise"
                                                               name="policies[{{$key}}][franchise]"
                                                               step="0.01"
                                                               type="number"
                                                               value="{{old('policy.' . $key . '.franchise', $policy->franchise)}}" />
                                                    </td>
                                                    <td>
                                                        <input type="button" value="Удалить" class="btn btn-warning ddgi-remove-tranche" />
                                                        <input type="button"
                                                               value="Заполнить"
                                                               class="btn btn-success ddgi-display-modal" />
                                                    </td>
                                                    <td>
                                                        <input type="button"
                                                               value="Удалить"
                                                               class="btn btn-warning ddgi-remove-policy" />
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <button type="button"
                                                                class="btn btn-primary ddgi-add-policy">
                                                            Добавить
                                                        </button>
                                                    </div>
                                                </td>
                                                <td colspan="4" style="text-align: right;">
                                                    <label class="text-bold">Итого:</label>
                                                </td>
                                                <td>
                                                    <input disabled="disabled"
                                                           class="form-control"
                                                           id="total-insurance-sum"
                                                           type="text"
                                                           value="" />
                                                </td>
                                                <td>
                                                    <input disabled="disabled"
                                                           class="form-control"
                                                           id="total-insurance-premium"
                                                           type="text"
                                                           value="" />
                                                </td>
                                                <td>
                                                    <input disabled="disabled"
                                                           class="form-control"
                                                           id="total-franchise"
                                                           type="text"
                                                           value="" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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