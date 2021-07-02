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
                <form action="{{route('policy_flows.store')}}"
                      enctype="multipart/form-data"
                      id="polis-registration-form"
                      method="post">
                    @csrf

                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Регистрация полисов</h3>
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
                                                    <label for="policy-act-number" class="col-form-label">Номер акта</label>
                                                    <input required
                                                           class="form-control @if($errors->has('policy.act_number')) is-invalid @endif"
                                                           id="policy-act-number"
                                                           name="policy[act_number]"
                                                           value="{{old('policy.act_number', $policy->act_number)}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-flow-act-date" class="col-form-label">Дата акта</label>
                                                    <div class="input-group">
                                                        <input required
                                                               class="form-control @if($errors->has('policy_flow.act_date')) is-invalid @endif"
                                                               id="policy-flow-act-date"
                                                               name="policy_flow[act_date]"
                                                               placeholder="yyyy-mm-dd"
                                                               type="date"
                                                               value="{{old('policy_flow.act_date', $policy_flow->act_date)}}" />
                                                    </div>
                                                </div>
                                            </div>
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
                                                <label for="files" class="col-form-label">Загрузка документов</label>
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
                                        <div class="row">
                                            <div class="col-md-12">
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-series-from" class="col-form-label">Серия полиса с:</label>
                                                    <input required
                                                           class="form-control @if($errors->has('policy_series_from')) is-invalid @endif"
                                                           id="policy-series-from"
                                                           name="policy_series_from"
                                                           oninput="counter()"
                                                           type="number"
                                                           value="{{old('policy_series_from')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-series-to" class="col-form-label">Серия полиса до:</label>
                                                    <input required
                                                           class="form-control @if($errors->has('policy_series_to')) is-invalid @endif"
                                                           id="policy-series-to"
                                                           name="policy_series_to"
                                                           oninput="counter()"
                                                           type="number"
                                                           value="{{old('policy_series_to')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="policy-amount" class="col-form-label">Количество полисов</label>
                                                <input disabled
                                                       class="form-control"
                                                       id="policy-amount"
                                                       type="text"
                                                       value="" />
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-created-at" class="col-form-label">Дата распределения</label>
                                                    <div class="input-group">
                                                        <input readonly
                                                               class="form-control"
                                                               id="policy-created-at"
                                                               placeholder="yyyy-mm-dd"
                                                               type="date"
                                                               value="{{date('Y-m-d')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-price" class="col-form-label">Стоимость одного бланка </label>
                                                    <input required
                                                           class="form-control @if($errors->has('policy.price')) is-invalid @endif"
                                                           id="policy-price"
                                                           name="policy[price]"
                                                           oninput="counter()"
                                                           type="text"
                                                           value="{{old('policy.price', $policy->price)}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="policy-price-total" class="col-form-label">Всего стоимость</label>
                                                    <input disabled
                                                           class="form-control"
                                                           id="policy-price-total"
                                                           type="text"
                                                           value="" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" id="submit-button" class="btn btn-primary float-right">Добавить</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function counter() {
            var from = parseInt(document.getElementById('policy-series-from').value);
            var to = parseInt(document.getElementById('policy-series-to').value);
            var price = parseInt(document.getElementById('policy-price').value);

            if (from > 0 && to > 0 && to >= from) {
                document.getElementById('policy-amount').value = to - from + 1;
                document.getElementById('policy-price-total').value = (to - from + 1) * price;
            }
        }
    </script>
@endsection
