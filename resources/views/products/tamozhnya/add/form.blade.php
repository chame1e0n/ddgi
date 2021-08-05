@extends('layouts.index')

@section('content')
    <form action="{{route('tamozhnya_add.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
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
                                    <li class="breadcrumb-item active">Редактировать Анкету</li>
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="contract-custom-warehouse-square">
                                            Объём площади склада
                                        </label>

                                        <input required
                                               class="form-control @error('contract_custom_warehouse.square') is-invalid @enderror"
                                               id="contract-custom-warehouse-square"
                                               name="contract_custom_warehouse[square]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_custom_warehouse.square', $contract_custom_warehouse->square)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-custom-warehouse-capacity">
                                            Объем товара
                                        </label>

                                        <div class="input-group mb-4">
                                            <input required
                                                   class="form-control @error('contract_custom_warehouse.capacity') is-invalid @enderror"
                                                   id="contract-custom-warehouse-capacity"
                                                   name="contract_custom_warehouse[capacity]"
                                                   step="0.01"
                                                   type="number"
                                                   value="{{old('contract_custom_warehouse.capacity', $contract_custom_warehouse->capacity)}}" />

                                            <div class="input-group-append">
                                                <select required
                                                        class="form-control @error('contract_custom_warehouse.measure') is-invalid @enderror"
                                                        id="contract-custom-warehouse-measure"
                                                        name="contract_custom_warehouse[measure]"
                                                        style="width: 100%;">
                                                    @foreach(\App\Model\ContractCustomWarehouse::$measures as $key => $value)
                                                        <option @if($key == old('contract_custom_warehouse.measure', $contract_custom_warehouse->measure)) selected @endif
                                                                value="{{$key}}">
                                                            {{$value}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contract-custom-warehouse-square">
                                            Общая стоимость
                                        </label>

                                        <input required
                                               class="form-control @error('contract_custom_warehouse.sum') is-invalid @enderror"
                                               id="contract-custom-warehouse-sum"
                                               name="contract_custom_warehouse[sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('contract_custom_warehouse.sum', $contract_custom_warehouse->sum)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contract-custom-warehouse-goods-period-from" class="col-form-label">
                                        Период нахождения товара на складе
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">с</span>
                                        </div>

                                        <input required
                                               class="form-control @error('contract_custom_warehouse.goods_period_from') is-invalid @enderror"
                                               id="contract-custom-warehouse-goods-period-from"
                                               name="contract_custom_warehouse[goods_period_from]"
                                               type="date"
                                               value="{{old('contract_custom_warehouse.goods_period_from', $contract_custom_warehouse->goods_period_from)}}" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contract-custom-warehouse-goods-period-to" class="col-form-label">
                                        Период нахождения товара на складе
                                    </label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">до</span>
                                        </div>

                                        <input required
                                               class="form-control @error('contract_custom_warehouse.goods_period_to') is-invalid @enderror"
                                               id="contract-custom-warehouse-goods-period-to"
                                               name="contract_custom_warehouse[goods_period_to]"
                                               type="date"
                                               value="{{old('contract_custom_warehouse.goods_period_to', $contract_custom_warehouse->goods_period_to)}}" />
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
