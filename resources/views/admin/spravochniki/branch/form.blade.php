@extends('admin.layouts.form-layout')

@section('form-content')
    <form action="{{route('branches.' . ($branch->exists ? 'update' : 'store'), $branch->id)}}"
          id="form-branch"
          method="post">
        @csrf

        @if($branch->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить филиал</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="branch-code" class="col-form-label">Код</label>
                                        <input required
                                               class="form-control @error('branch.code') is-invalid @enderror"
                                               id="branch-code"
                                               name="branch[code]"
                                               value="{{old('branch.code', $branch->code)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="branch-name" class="col-form-label">Наименование</label>
                                        <input required
                                               class="form-control @error('branch.name') is-invalid @enderror"
                                               id="branch-name"
                                               name="branch[name]"
                                               value="{{old('branch.name', $branch->name)}}" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="branch-region-id" class="col-form-label">Регион</label>
                                        <select required
                                                class="form-control select2 @error('branch.region_id') is-invalid @enderror"
                                                id="branch-region-id"
                                                name="branch[region_id]">
                                        @foreach(\App\Model\Region::all() as $region)
                                            <option @if($region->id == old('branch.region_id', $branch->region_id)) selected="selected" @endif
                                                    value="{{$region->id}}">
                                                {{$region->name}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="branch-founded-date" class="col-form-label">Дата создания</label>
                                        <input required
                                               class="form-control @error('branch.founded_date') is-invalid @enderror"
                                               id="branch-founded-date"
                                               name="branch[founded_date]"
                                               type="date"
                                               value="{{old('branch.founded_date', $branch->founded_date)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="branch-address" class="col-form-label">Адрес</label>
                                        <input required
                                               class="form-control @error('branch.address') is-invalid @enderror"
                                               id="branch-address"
                                               name="branch[address]"
                                               value="{{old('branch.address', $branch->address)}}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="branch-phone-number" class="col-form-label">Телефон</label>
                                        <input required
                                               class="form-control @error('branch.phone_number') is-invalid @enderror"
                                               id="branch-phone-number"
                                               name="branch[phone_number]"
                                               value="{{old('branch.phone_number', $branch->phone_number)}}" />
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
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$branch->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
