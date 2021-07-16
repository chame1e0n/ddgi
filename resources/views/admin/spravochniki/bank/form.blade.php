@extends('admin.layouts.form-layout')

@section('form-content')
    <form action="{{route('banks.' . ($bank->exists ? 'update' : 'store'), $bank->id)}}"
          id="form-bank"
          method="post">
        @csrf

        @if($bank->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить банк</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-code" class="col-form-label">Код</label>
                                        <input required
                                               class="form-control @error('bank.code') is-invalid @enderror"
                                               id="bank-code"
                                               name="bank[code]"
                                               value="{{old('bank.code', $bank->code)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-name" class="col-form-label">Наименование</label>
                                        <input required
                                               class="form-control @error('bank.name') is-invalid @enderror"
                                               id="bank-name"
                                               name="bank[name]"
                                               value="{{old('bank.name', $bank->name)}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-filial" class="col-form-label">Наименование филиала</label>
                                        <input required
                                               class="form-control @error('bank.filial') is-invalid @enderror"
                                               id="bank-filial"
                                               name="bank[filial]"
                                               value="{{old('bank.filial', $bank->filial)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-address" class="col-form-label">Адрес</label>
                                        <input required
                                               class="form-control @error('bank.address') is-invalid @enderror"
                                               id="bank-address"
                                               name="bank[address]"
                                               value="{{old('bank.address', $bank->address)}}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-inn" class="col-form-label">ИНН</label>
                                        <input required
                                               class="form-control @error('bank.inn') is-invalid @enderror"
                                               id="bank-inn"
                                               name="bank[inn]"
                                               step="1"
                                               type="number"
                                               value="{{old('bank.inn', $bank->inn)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bank-account" class="col-form-label">Расчетный счет</label>
                                        <input required
                                               class="form-control @error('bank.account') is-invalid @enderror"
                                               id="bank-account"
                                               name="bank[account]"
                                               value="{{old('bank.account', $bank->account)}}" />
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
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$bank->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
