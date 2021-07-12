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
                            <label for="policies-{{$key}}-policy-sportsman-fio">ФИО застрахованного лица</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_sportsman.fio') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-sportsman-fio"
                                   name="policies[{{$key}}][policy_sportsman][fio]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_sportsman.fio', $policy_model->fio)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-sportsman-birthdate">Дата рождения</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_sportsman.birthdate') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-sportsman-birthdate"
                                   name="policies[{{$key}}][policy_sportsman][birthdate]"
                                   type="date"
                                   value="{{old('policies.' . $key . '.policy_sportsman.birthdate', $policy_model->birthdate)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-sportsman-sport">Спорт</label>

                            <input required
                                   class="form-control @error('policies.' . $key . '.policy_sportsman.sport') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-sportsman-sport"
                                   name="policies[{{$key}}][policy_sportsman][sport]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_sportsman.sport', $policy_model->sport)}}" />
                        </div>
                        <div class="form-group">
                            <label for="policies-{{$key}}-policy-sportsman-beneficiary">Выгодоприобретатель</label>

                            <input class="form-control @error('policies.' . $key . '.policy_sportsman.beneficiary') is-invalid @enderror"
                                   id="policies-{{$key}}-policy-sportsman-beneficiary"
                                   name="policies[{{$key}}][policy_sportsman][beneficiary]"
                                   type="text"
                                   value="{{old('policies.' . $key . '.policy_sportsman.beneficiary', $policy_model->beneficiary)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Трафматические повреждения</label>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Количество</span>
                                    </div>

                                    <input class="form-control @error('policies.' . $key . '.policy_sportsman.traumatic_quantity') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-traumatic-quantity"
                                           name="policies[{{$key}}][policy_sportsman][traumatic_quantity]"
                                           step="1"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_sportsman.traumatic_quantity', $policy_model->traumatic_quantity)}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Страховая сумма</span>
                                    </div>

                                    <input class="form-control ddgi-policy-calculate @error('policies.' . $key . '.policy_sportsman.traumatic_sum') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-traumatic-sum"
                                           name="policies[{{$key}}][policy_sportsman][traumatic_sum]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_sportsman.traumatic_sum', $policy_model->traumatic_sum)}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Страховая премия</span>
                                    </div>

                                    <input class="form-control ddgi-policy-calculate @error('policies.' . $key . '.policy_sportsman.traumatic_premium') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-traumatic-premium"
                                           name="policies[{{$key}}][policy_sportsman][traumatic_premium]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_sportsman.traumatic_premium', $policy_model->traumatic_premium)}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Смерть</label>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Страховая сумма</span>
                                    </div>

                                    <input class="form-control ddgi-policy-calculate @error('policies.' . $key . '.policy_sportsman.death_sum') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-death-sum"
                                           name="policies[{{$key}}][policy_sportsman][death_sum]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_sportsman.death_sum', $policy_model->death_sum)}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Страховая премия</span>
                                    </div>

                                    <input class="form-control ddgi-policy-calculate @error('policies.' . $key . '.policy_sportsman.death_premium') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-death-premium"
                                           name="policies[{{$key}}][policy_sportsman][death_premium]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_sportsman.death_premium', $policy_model->death_premium)}}" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Итого</label>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Общая страховая сумма</span>
                                </div>

                                <input disabled="disabled"
                                       class="form-control"
                                       id="policies-{{$key}}-policy-sportsman-total-sum"
                                       type="text"
                                       value="" />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Общая страховая премия</span>
                                </div>

                                <input disabled="disabled"
                                       class="form-control"
                                       id="policies-{{$key}}-policy-sportsman-total-premium"
                                       type="text"
                                       value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>