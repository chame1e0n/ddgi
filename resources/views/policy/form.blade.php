@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ url()->previous() }}" class="btn btn-info">Назад</a>

                <br /><br />

                @include('includes.messages')
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('policies.update', $policy->id)}}"
                      enctype="multipart/form-data"
                      id="form-policy"
                      method="post">
                    @csrf

                    @method('PUT')

                    <fieldset @if($block) disabled="disabled" @endif>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Добавить полис</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="policy-name" class="col-form-label">Наименование</label>

                                                <input required
                                                       class="form-control @error('policy.name') is-invalid @enderror"
                                                       id="policy-name"
                                                       name="policy[name]"
                                                       type="text"
                                                       value="{{old('policy.name', $policy->name)}}" />
                                            </div>
                                            <div class="col-md-3">
                                                <label for="policy-act-number" class="col-form-label">Номер акта</label>

                                                <input required
                                                       class="form-control @error('policy.act_number') is-invalid @enderror"
                                                       id="policy-act-number"
                                                       name="policy[act_number]"
                                                       type="text"
                                                       value="{{old('policy.act_number', $policy->act_number)}}" />
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-price" class="col-form-label">Стоимость одного бланка </label>

                                                    <input required
                                                           class="form-control @error('policy.price') is-invalid @enderror"
                                                           id="policy-price"
                                                           min="0"
                                                           name="policy[price]"
                                                           step="0.01"
                                                           type="number"
                                                           value="{{old('policy.price', $policy->price)}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            @foreach(\App\Model\Policy::$print_sizes as $size => $label)
                                                <div class="icheck-success">
                                                    <input @if($policy->print_size == $size) checked @endif
                                                           class="form-check-input client-type-radio"
                                                           id="policy-print-size-{{$size}}"
                                                           name="policy[print_size]"
                                                           type="radio"
                                                           value="{{$size}}" />

                                                    <label for="policy-print-size-{{$size}}">{{$label}}</label>
                                                </div>
                                            @endforeach
                                            </div>
                                            <div class="col-md-6">
                                                <label for="files" class="col-form-label">Загрузка документов</label>

                                                @foreach($policy->getFiles() as $file)
                                                    <a href="{{asset($file->path)}}" target="_blank">Скачать</a>
                                                @endforeach

                                                <div class="input-group">
                                                    <input type="file" multiple id="files" name="files[]" class="form-control" />

                                                    <div class="input-group-append">
                                                        <a class="btn btn-info" href="#">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
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
                                    <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить</button>
                                </div>
                            </div>
                        @endif
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
