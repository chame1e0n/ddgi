@section('form_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$currentFileName ?? ''}}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="act_number" class="col-form-label">Номер акта</label>
                                <input id="act_number"
                                       @if($errors->has('act_number'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                       @endif
                                       name="act_number" value="{{ $policy->act_number }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="act_date" class="col-form-label">Дата акта</label>
                                <div class="input-group">
                                    <input id="act_date" type="date"
                                           @if($errors->has('act_date'))
                                           class="form-control is-invalid"
                                           @else
                                           class="form-control"
                                           @endif
                                           placeholder="yyyy-mm-dd" name="act_date" value="{{ $policy->act_date }}"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="icheck-success ">
                                <input name="a_reg"
                                       class="form-check-input client-type-radio"
                                       checked type="radio" id="a4" value="a4">
                                <label class="form-check-label" for="a4">A4</label>
                            </div>
                            <div class="icheck-success ">
                                <input class="form-check-input client-type-radio" @if($policy->a_reg == 'a5') checked
                                       @endif value="a5" type="radio" name="a_reg" id="a5">
                                <label class="form-check-label" for="a5">A5</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="polis_series_from" class="col-form-label">Серия полиса с:</label>
                                        <input id="polis_series_from" type="number"
                                               oninput="countBlanks(true, this.value)"
                                               @if($errors->has('polis_series_from'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               name="policy_from" value="{{$policy->policy_from}}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="polis_series_to" class="col-form-label">Серия полиса до:</label>
                                        <input id="polis_series_to" type="number"
                                               oninput="countBlanks(false, this.value)"
                                               @if($errors->has('polis_series_to'))
                                               class="form-control is-invalid"
                                               @else
                                               class="form-control"
                                               @endif
                                               name="policy_to" value="{{$policy->policy_to}}" required>
                                    </div>
                                </div>
                                <div class="col-md-3" id="countBlanks">
                                    <label for="polis_kolvo" class="col-form-label">Количество полисов</label>
                                    <input type="text"
                                           value="{{$amount = $policy->policy_to - $policy->policy_from + 1}}" disabled
                                           id="countBlanksInput" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="polis_name" class="col-form-label">Наименование</label>
                                    <input type="text" id="polis_name" value="{{$policy->polis_name}}" name="polis_name"
                                           class="form-control">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="polis_series" class="col-form-label">Стоимость одного бланка </label>
                                <input type="text" class="form-control" value="{{$policy->price_per_policy}}"
                                       name="price_per_policy">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="polis_series" class="col-form-label">Всего стоимость</label>
                                <input type="text" disabled value="{{$amount * $policy->price_per_policy}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="act_date_raspredel" class="col-form-label">Дата распределения</label>
                                <div class="input-group">
                                    <input id="act_date_raspredel" type="date" class="form-control"
                                           placeholder="yyyy-mm-dd" readonly value="{{date('Y-m-d', strtotime($policy->created_at))}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="filter_number_do" class="col-form-label">Загрузка документов</label>
                            <div class="input-group">
                                <input type="file" multiple id="filter_number_do" name="files" class="form-control">
                                <div class="input-group-append">
                                    <a class="btn btn-info" href="#"><i class="fas fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" id="submit-button" class="btn btn-primary float-right">Изменить</button>
    </div>
@endsection