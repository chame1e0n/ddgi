@extends('admin.layouts.form-layout')

@section('form-content')
    <form action="{{route('specifications.' . ($specification->exists ? 'update' : 'store'), $specification->id)}}"
          id="form-specification"
          method="post">
        @csrf

        @if($specification->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить продукт</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="specification-code" class="col-form-label">Код</label>
                                        <input required
                                               class="form-control @error('specification.code') is-invalid @enderror"
                                               id="specification-code"
                                               name="specification[code]"
                                               value="{{old('specification.code', $specification->code)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="specification-name" class="col-form-label">Наименование</label>
                                        <input required
                                               class="form-control @error('specification.name') is-invalid @enderror"
                                               id="specification-name"
                                               name="specification[name]"
                                               value="{{old('specification.name', $specification->name)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="specification-type-id" class="col-form-label">Класс</label>
                                        <select required
                                                class="form-control select2 @error('specification.type_id') is-invalid @enderror"
                                                id="specification-type-id"
                                                name="specification[type_id]">
                                        @foreach(\App\Model\Type::all() as $type)
                                            <option @if($type->id == old('specification.type_id', $specification->type_id)) selected="selected" @endif
                                                    value="{{$type->id}}">
                                                {{$type->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specification-tariff" class="col-form-label">Тарифная ставка</label>
                                        <input class="form-control @error('specification.tariff') is-invalid @enderror"
                                               id="specification-tariff"
                                               name="specification[tariff]"
                                               type="number"
                                               value="{{old('specification.tariff', $specification->tariff)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specification-max-acceptable-amount" class="col-form-label">Максимально допустимая сумма</label>
                                        <input class="form-control @error('specification.max_acceptable_amount') is-invalid @enderror"
                                               id="specification-max-acceptable-amount"
                                               name="specification[max_acceptable_amount]"
                                               type="number"
                                               value="{{old('specification.max_acceptable_amount', $specification->max_acceptable_amount)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!$block)
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$specification->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
