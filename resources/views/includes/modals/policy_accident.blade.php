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
                            <label for="policies-{{$key}}-policy-accident-fio">ФИО застрахованного лица</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_accident.fio') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-accident-fio"
                                   name="policies[{{$key}}][policy_accident][fio]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_accident.fio', $policy_model->fio)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-accident-birthdate">Дата рождения</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_accident.birthdate') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-accident-birthdate"
                                   name="policies[{{$key}}][policy_accident][birthdate]"
                                   type="date"
                                   value="{{old('policies.' . $key . '.policy_accident.birthdate', $policy_model->birthdate)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-accident-beneficiary">Выгодоприобретатель</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_accident.beneficiary') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-accident-beneficiary"
                                   name="policies[{{$key}}][policy_accident][beneficiary]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_accident.beneficiary', $policy_model->beneficiary)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-accident-passport-series">Серия паспорта</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_accident.passport_series') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-accident-passport-series"
                                   name="policies[{{$key}}][policy_accident][passport_series]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_accident.passport_series', $policy_model->passport_series)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-accident-passport-number">Номер паспорта</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_accident.passport_number') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-accident-passport-number"
                                   name="policies[{{$key}}][policy_accident][passport_number]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_accident.passport_number', $policy_model->passport_number)}}" />
                        </div>
                        <div class="form-group">
                            <div class="icheck-success ">
                                <input @if($policy_model->is_chronic_disease) checked @endif
                                       class="form-check-input client-type-radio"
                                       id="policies-{{$key}}-policy-accident-is-chronic-disease"
                                       name="policies[{{$key}}][policy_accident][is_chronic_disease]"
                                       type="checkbox" />
                                <label for="policies-{{$key}}-policy-accident-is-chronic-disease">
                                    Хроническое заболевание
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>