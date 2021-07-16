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
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-issue-year">Год выпуска</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.issue_year') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-issue-year"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][issue_year]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.issue_year', $policy_model->issue_year)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-brand">Марка</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.brand') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-brand"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][brand]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.brand', $policy_model->brand)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-model">Модель</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.model') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-model"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][model]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.model', $policy_model->model)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-modification">Модификация</label>

                            <input class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.modification') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-modification"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][modification]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.modification', $policy_model->modification)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-carrying-capacity">Грузоподъемность</label>

                            <input class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.carrying_capacity') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-carrying-capacity"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][carrying_capacity]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.carrying_capacity', $policy_model->carrying_capacity)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-government-number">Гос. номер</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.government_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-government-number"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][government_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.government_number', $policy_model->government_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-techpassport-number">Номер тех. паспорта</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.techpassport_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-techpassport-number"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][techpassport_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.techpassport_number', $policy_model->techpassport_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-engine-number">Номер двигателя</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.engine_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-engine-number"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][engine_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.engine_number', $policy_model->engine_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-carcase-number">Номер кузова</label>

                            <input class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.carcase_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-carcase-number"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][carcase_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.carcase_number', $policy_model->carcase_number)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-multilateral-car-deposit-insurance-value">Страховая стоимость</label>

                            <input class="form-control @error('policies.' . $key . '.policy_multilateral_car_deposit.insurance_value') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-multilateral-car-deposit-insurance-value"
                                   name="policies[{{$key}}][policy_multilateral_car_deposit][insurance_value]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_multilateral_car_deposit.insurance_value', $policy_model->insurance_value)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>