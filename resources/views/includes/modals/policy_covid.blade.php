<div class="modal"
     id="policy-modal-{{$key}}">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Дополнительные поля полиса</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-covid-surname">Фамилия</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_covid.surname') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-covid-surname"
                                   name="policies[{{$key}}][policy_covid][surname]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_covid.surname', $policy_model->surname)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-covid-name">Имя</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_covid.name') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-covid-name"
                                   name="policies[{{$key}}][policy_covid][name]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_covid.name', $policy_model->name)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-covid-middlename">Отчество</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_covid.middlename') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-covid-middlename"
                                   name="policies[{{$key}}][policy_covid][middlename]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_covid.middlename', $policy_model->middlename)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-covid-passport">Серия и номер паспорта</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_covid.passport') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-covid-passport"
                                   name="policies[{{$key}}][policy_covid][passport]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_covid.passport', $policy_model->passport)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-covid-passport-issue-date">Дата выдачи паспорта</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_covid.passport_issue_date') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-covid-passport-issue-date"
                                   name="policies[{{$key}}][policy_covid][passport_issue_date]"
                                   type="date"
                                   value="{{old('policies.' . $key . '.policy_covid.passport_issue_date', $policy_model->passport_issue_date)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-covid-passport-issue-place">Место выдачи паспорта</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_covid.passport_issue_place') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-covid-passport-issue-place"
                                   name="policies[{{$key}}][policy_covid][passport_issue_place]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_covid.passport_issue_place', $policy_model->passport_issue_place)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-covid-insurance-value">Страховая стоимость</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_covid.insurance_value') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-covid-insurance-value"
                                   min="0"
                                   name="policies[{{$key}}][policy_covid][insurance_value]"
                                   step="0.01"
                                   type="number"
                                   value="{{old('policies.' . $key . '.policy_covid.insurance_value', $policy_model->insurance_value)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>