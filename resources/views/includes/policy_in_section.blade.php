<div class="card-body">
    <div class="card card-info" id="clone-beneficiary">
        <div class="card-header">
            <h3 class="card-title">Сведения о страховом полисе</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" id="beneficiary-card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="policy-name" class="col-form-label">Наименование полиса</label>
                        <input required
                               @if($policy->contract_id) disabled @endif
                               class="form-control @error('policy.name') is-invalid @enderror"
                               id="policy-name"
                               name="policy[name]"
                               type="text"
                               value="{{old('policy.name', $policy->name)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="policy-series" class="col-form-label">Серийный номер полиса</label>
                        <select required
                                @if($policy->contract_id) disabled @endif
                                class="form-control select2 @error('policy.series') is-invalid @enderror"
                                id="policy-series"
                                name="policy[series]">
                            <option></option>

                            @foreach(\App\Model\Policy::all() as $policy_series)
                                <option @if($policy_series->series == old('policy.series', $policy->series)) selected="selected" @endif
                                        value="{{$policy_series->series}}">
                                    {{$policy_series->series}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="policy-date-of-issue" class="col-form-label">Дата выдачи страхового полиса </label>
                        <input required
                               class="form-control @error('policy.date_of_issue') is-invalid @enderror"
                               id="policy-date-of-issue"
                               name="policy[date_of_issue]"
                               type="date"
                               value="{{old('policy.date_of_issue', $policy->date_of_issue)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="responsible-person" class="col-form-label">Ответственное лицо</label>
                        <input disabled="disabled"
                               class="form-control"
                               id="responsible-person"
                               type="text"
                               value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="policy-insurance-sum">Cтраховая сумма</label>
                        <input required
                               class="form-control @error('policy.insurance_sum') is-invalid @enderror"
                               id="policy-insurance-sum"
                               name="policy[insurance_sum]"
                               step="0.01"
                               type="number"
                               value="{{old('policy.insurance_sum', $policy->insurance_sum)}}" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="insurance-premium">Cтраховая премия</label>
                        <input disabled="disabled"
                               class="form-control"
                               id="insurance-premium"
                               type="text"
                               value="" />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="policy-franchise">Франшиза</label>
                        <input required
                               class="form-control @error('policy.franchise') is-invalid @enderror"
                               id="policy-franchise"
                               name="policy[franchise]"
                               step="0.01"
                               type="number"
                               value="{{old('policy.franchise', $policy->franchise)}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>