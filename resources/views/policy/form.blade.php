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
                                            <div class="col-md-3">
                                                <label for="policy-name" class="col-form-label">Наименование</label>
                                                <input required
                                                       class="form-control @if($errors->has('policy.name')) is-invalid @endif"
                                                       id="policy-name"
                                                       name="policy[name]"
                                                       type="text"
                                                       value="{{old('policy.name', $policy->name)}}" />
                                            </div>
                                            <div class="col-md-3">
                                                <label for="policy-act-number" class="col-form-label">Номер акта</label>
                                                <input required
                                                       class="form-control @if($errors->has('policy.act_number')) is-invalid @endif"
                                                       id="policy-act-number"
                                                       name="policy[act_number]"
                                                       type="text"
                                                       value="{{old('policy.act_number', $policy->act_number)}}" />
                                            </div>
                                            <div class="col-md-3">
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
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-price" class="col-form-label">Стоимость одного бланка </label>
                                                    <input required
                                                           class="form-control @if($errors->has('policy.price')) is-invalid @endif"
                                                           id="policy-price"
                                                           name="policy[price]"
                                                           type="text"
                                                           value="{{old('policy.price', $policy->price)}}" />
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
