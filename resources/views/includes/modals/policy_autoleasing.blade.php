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
                            <label for="policies-{{$key}}-policy-autoleasing-issue-year">Год выпуска</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.issue_year') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-issue-year"
                                   name="policies[{{$key}}][policy_autoleasing][issue_year]"
                                   step="1"
                                   type="number"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.issue_year', $policy_model->issue_year)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-autoleasing-brand">Марка</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.brand') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-brand"
                                   name="policies[{{$key}}][policy_autoleasing][brand]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.brand', $policy_model->brand)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-autoleasing-model">Модель</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.model') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-model"
                                   name="policies[{{$key}}][policy_autoleasing][model]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.model', $policy_model->model)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-autoleasing-insurance-value">Страховая стоимость</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.insurance_value') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-insurance-value"
                                   min="0"
                                   name="policies[{{$key}}][policy_autoleasing][insurance_value]"
                                   step="0.01"
                                   type="number"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.insurance_value', $policy_model->insurance_value)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-autoleasing-government-number">Гос. номер</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.government_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-government-number"
                                   name="policies[{{$key}}][policy_autoleasing][government_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.government_number', $policy_model->government_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-autoleasing-techpassport-number">Номер тех. паспорта</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.techpassport_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-techpassport-number"
                                   name="policies[{{$key}}][policy_autoleasing][techpassport_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.techpassport_number', $policy_model->techpassport_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-autoleasing-engine-number">Номер двигателя</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.engine_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-engine-number"
                                   name="policies[{{$key}}][policy_autoleasing][engine_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.engine_number', $policy_model->engine_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-autoleasing-carcase-number">Номер кузова</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_autoleasing.carcase_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-autoleasing-carcase-number"
                                   name="policies[{{$key}}][policy_autoleasing][carcase_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_autoleasing.carcase_number', $policy_model->carcase_number)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>