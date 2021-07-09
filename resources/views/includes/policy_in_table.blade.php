<tr id="policy-row-{{$key}}">
    <td>
        <input required
               @if($policy->contract_id) disabled @endif
               class="form-control ddgi-policy-name @error('policies.' . $key . '.name') is-invalid @enderror"
               id="policies-{{$key}}-name"
               name="policies[{{$key}}][name]"
               type="text"
               value="{{old('policies.' . $key . '.name', $policy->name)}}" />
    </td>
    <td>
        <select required
                @if($policy->contract_id) disabled @endif
                class="form-control ddgi-policy-series @error('policies.' . $key . '.series') is-invalid @enderror"
                id="policies-{{$key}}-series"
                name="policies[{{$key}}][series]">
            <option></option>

            @foreach(\App\Model\Policy::all() as $policy_series)
                <option @if($policy_series->id == old('policies.' . $key . '.series', $policy->series)) selected="selected" @endif
                        value="{{$policy_series->series}}">
                    {{$policy_series->series}}
                </option>
            @endforeach
        </select>
    </td>
    <td>
        <input disabled="disabled"
               class="form-control"
               id="policies-{{$key}}-responsible-person"
               type="text"
               value="" />
    </td>
    <td>
        <input required
               class="form-control @error('policies.' . $key . '.date_of_issue') is-invalid @enderror"
               id="policies-{{$key}}-date-of-issue"
               name="policies[{{$key}}][date_of_issue]"
               type="date"
               value="{{old('policies.' . $key . '.date_of_issue', $policy->date_of_issue)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('policies.' . $key . '.polis_from_date') is-invalid @enderror"
               id="policies-{{$key}}-polis-from-date"
               name="policies[{{$key}}][polis_from_date]"
               type="date"
               value="{{old('policies.' . $key . '.polis_from_date', $policy->polis_from_date)}}" />
    </td>
    <td>
        <input required
               class="form-control @error('policies.' . $key . '.polis_to_date') is-invalid @enderror"
               id="policies-{{$key}}-polis-to-date"
               name="policies[{{$key}}][polis_to_date]"
               type="date"
               value="{{old('policies.' . $key . '.polis_to_date', $policy->polis_to_date)}}" />
    </td>
    <td>
        <div class="input-group">
            <input required
                   class="form-control ddgi-policy-calculate @error('policies.' . $key . '.insurance_sum') is-invalid @enderror"
                   id="policies-{{$key}}-insurance-sum"
                   name="policies[{{$key}}][insurance_sum]"
                   step="0.01"
                   type="number"
                   value="{{old('policies.' . $key . '.insurance_sum', $policy->insurance_sum)}}" />
            <div class="input-group-append">
                <span class="input-group-text"
                      id="policies-{{$key}}-insurance-sum-plus">
                    + 0
                </span>
            </div>
        </div>
    </td>
    <td>
        <div class="input-group">
            <input disabled="disabled"
                   class="form-control"
                   id="policies-{{$key}}-insurance-premium"
                   type="text"
                   value="" />
            <div class="input-group-append">
                <span class="input-group-text"
                      id="policies-{{$key}}-insurance-premium-plus">
                    + 0
                </span>
            </div>
        </div>
    </td>
    <td>
        <input required
               class="form-control ddgi-policy-calculate @error('policies.' . $key . '.franchise') is-invalid @enderror"
               id="policies-{{$key}}-franchise"
               name="policies[{{$key}}][franchise]"
               step="0.01"
               type="number"
               value="{{old('policies.' . $key . '.franchise', $policy->franchise)}}" />
    </td>
    <td>
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
                                           value="{{old('policies.' . $key . '.policy_sportsman.fio', $policy_sportsman->fio)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-sportsman-birthdate">Дата рождения</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_sportsman.birthdate') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-birthdate"
                                           name="policies[{{$key}}][policy_sportsman][birthdate]"
                                           type="date"
                                           value="{{old('policies.' . $key . '.policy_sportsman.birthdate', $policy_sportsman->birthdate)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-sportsman-sport">Спорт</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_sportsman.sport') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-sport"
                                           name="policies[{{$key}}][policy_sportsman][sport]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_sportsman.sport', $policy_sportsman->sport)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-sportsman-beneficiary">Выгодоприобретатель</label>

                                    <input class="form-control @error('policies.' . $key . '.policy_sportsman.beneficiary') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-sportsman-beneficiary"
                                           name="policies[{{$key}}][policy_sportsman][beneficiary]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_sportsman.beneficiary', $policy_sportsman->beneficiary)}}" />
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
                                                   value="{{old('policies.' . $key . '.policy_sportsman.traumatic_quantity', $policy_sportsman->traumatic_quantity)}}" />
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
                                                   value="{{old('policies.' . $key . '.policy_sportsman.traumatic_sum', $policy_sportsman->traumatic_sum)}}" />
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
                                                   value="{{old('policies.' . $key . '.policy_sportsman.traumatic_premium', $policy_sportsman->traumatic_premium)}}" />
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
                                                   value="{{old('policies.' . $key . '.policy_sportsman.death_sum', $policy_sportsman->death_sum)}}" />
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
                                                   value="{{old('policies.' . $key . '.policy_sportsman.death_premium', $policy_sportsman->death_premium)}}" />
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

        <button class="btn btn-success"
                data-target="#policy-modal-{{$key}}"
                data-toggle="modal"
                type="button">Заполнить</button>
    </td>
    <td>
        <input type="button"
               value="Удалить"
               class="btn btn-warning ddgi-remove-policy ddgi-policy-calculate" />
    </td>
</tr>