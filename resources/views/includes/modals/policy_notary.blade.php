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
                            <label for="policies-{{$key}}-policy-notary-fio">ФИО застрахованного лица</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_notary.fio') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-notary-fio"
                                   name="policies[{{$key}}][policy_notary][fio]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_notary.fio', $policy_model->fio)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-notary-speciality">Специальнось</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_notary.speciality') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-notary-speciality"
                                   name="policies[{{$key}}][policy_notary][speciality]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_notary.speciality', $policy_model->speciality)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-notary-work-experience">Стаж работы</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_notary.work_experience') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-notary-work-experience"
                                   name="policies[{{$key}}][policy_notary][work_experience]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_notary.work_experience', $policy_model->work_experience)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-notary-position">Должность</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_notary.position') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-notary-position"
                                   name="policies[{{$key}}][policy_notary][position]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_notary.position', $policy_model->position)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-notary-start-date">Время пребывания</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_notary.start_date') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-notary-start-date"
                                   name="policies[{{$key}}][policy_notary][start_date]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_notary.start_date', $policy_model->start_date)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-notary-insurance-value">Страховая стоимость</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_notary.insurance_value') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-notary-insurance-value"
                                   name="policies[{{$key}}][policy_notary][insurance_value]"
                                   step="0.01"
                                   type="number"
                                   value="{{old('policies.' . $key . '.policy_notary.insurance_value', $policy_model->insurance_value)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>