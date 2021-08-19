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
                            <label for="policies-{{$key}}-policy-evaluator-fio">ФИО застрахованного лица</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_evaluator.fio') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-evaluator-fio"
                                   name="policies[{{$key}}][policy_evaluator][fio]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_evaluator.fio', $policy_model->fio)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-evaluator-speciality">Специальнось</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_evaluator.speciality') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-evaluator-speciality"
                                   name="policies[{{$key}}][policy_evaluator][speciality]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_evaluator.speciality', $policy_model->speciality)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-evaluator-work-experience">Стаж работы</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_evaluator.work_experience') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-evaluator-work-experience"
                                   name="policies[{{$key}}][policy_evaluator][work_experience]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_evaluator.work_experience', $policy_model->work_experience)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-evaluator-position">Должность</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_evaluator.position') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-evaluator-position"
                                   name="policies[{{$key}}][policy_evaluator][position]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_evaluator.position', $policy_model->position)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-evaluator-start-date">Время пребывания</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_evaluator.start_date') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-evaluator-start-date"
                                   name="policies[{{$key}}][policy_evaluator][start_date]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_evaluator.start_date', $policy_model->start_date)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-evaluator-insurance-value">Страховая стоимость</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_evaluator.insurance_value') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-evaluator-insurance-value"
                                   min="0"
                                   name="policies[{{$key}}][policy_evaluator][insurance_value]"
                                   step="0.01"
                                   type="number"
                                   value="{{old('policies.' . $key . '.policy_evaluator.insurance_value', $policy_model->insurance_value)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>