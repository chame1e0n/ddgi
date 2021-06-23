@extends('admin.layouts.form-layout')

@section('form-content')
    <form action="{{route('regions.' . ($region->exists ? 'update' : 'store'), $region->id)}}"
          id="form-region"
          method="post">
        @csrf

        @if($region->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Добавить регион</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="region-name" class="col-form-label">Наименование</label>
                                        <input required
                                               class="form-control @error('region.name') is-invalid @enderror"
                                               id="region-name"
                                               name="region[name]"
                                               value="{{old('region.name', $region->name)}}" />
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
                        <button type="submit" id="submit-button" class="btn btn-primary float-right">{{$region->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                </div>
            @endif
        </fieldset>
    </form>
@endsection
