@extends('admin.layouts.form-layout')

@section('form-content')
    <form action="{{route('currencies.' . ($currency->exists ? 'update' : 'store'), $currency->id)}}"
          id="form-currency"
          method="post">
        @csrf

        @if($currency->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить валюту</h3>
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
                                        <label for="currency-name" class="col-form-label">Наименование</label>
                                        <input required
                                               class="form-control @error('currency.name') is-invalid @enderror"
                                               id="currency-name"
                                               name="currency[name]"
                                               value="{{old('currency.name', $currency->name)}}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="currency-code" class="col-form-label">Код</label>
                                        <input required
                                               class="form-control @error('currency.code') is-invalid @enderror"
                                               id="currency-code"
                                               name="currency[code]"
                                               value="{{old('currency.code', $currency->code)}}" />
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="currency-priority" class="col-form-label">Приоритет</label>
                                        <input required
                                               class="form-control @error('currency.priority') is-invalid @enderror"
                                               id="currency-priority"
                                               name="currency[priority]"
                                               type="number"
                                               value="{{old('currency.priority', $currency->priority)}}" />
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
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$currency->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
