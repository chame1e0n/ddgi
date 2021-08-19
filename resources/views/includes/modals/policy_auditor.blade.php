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
                            <label for="policies-{{$key}}-policy-auditor-fio">ФИО застрахованного лица</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_auditor.fio') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-auditor-fio"
                                   name="policies[{{$key}}][policy_auditor][fio]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_auditor.fio', $policy_model->fio)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-auditor-speciality">Специальнось</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_auditor.speciality') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-auditor-speciality"
                                   name="policies[{{$key}}][policy_auditor][speciality]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_auditor.speciality', $policy_model->speciality)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-auditor-work-experience">Стаж работы</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_auditor.work_experience') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-auditor-work-experience"
                                   name="policies[{{$key}}][policy_auditor][work_experience]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_auditor.work_experience', $policy_model->work_experience)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-auditor-position">Должность</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_auditor.position') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-auditor-position"
                                   name="policies[{{$key}}][policy_auditor][position]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_auditor.position', $policy_model->position)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-auditor-start-date">Время пребывания</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_auditor.start_date') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-auditor-start-date"
                                   name="policies[{{$key}}][policy_auditor][start_date]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_auditor.start_date', $policy_model->start_date)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-auditor-insurance-value">Страховая стоимость</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_auditor.insurance_value') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-auditor-insurance-value"
                                   min="0"
                                   name="policies[{{$key}}][policy_auditor][insurance_value]"
                                   step="0.01"
                                   type="number"
                                   value="{{old('policies.' . $key . '.policy_auditor.insurance_value', $policy_model->insurance_value)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>