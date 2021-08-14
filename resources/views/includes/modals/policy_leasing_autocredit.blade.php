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
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Основные данные</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-brand">Марка</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.brand') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-brand"
                                           name="policies[{{$key}}][policy_leasing_autocredit][brand]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.brand', $policy_model->brand)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-model">Модель</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.model') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-model"
                                           name="policies[{{$key}}][policy_leasing_autocredit][model]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.model', $policy_model->model)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-government-number">Гос. номер</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.government_number') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-government-number"
                                           name="policies[{{$key}}][policy_leasing_autocredit][government_number]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.government_number', $policy_model->government_number)}}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-techpassport-number">Номер тех. паспорта</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.techpassport_number') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-techpassport-number"
                                           name="policies[{{$key}}][policy_leasing_autocredit][techpassport_number]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.techpassport_number', $policy_model->techpassport_number)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-engine-number">Номер двигателя</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.engine_number') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-engine-number"
                                           name="policies[{{$key}}][policy_leasing_autocredit][engine_number]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.engine_number', $policy_model->engine_number)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-carcase-number">Номер кузова</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.carcase_number') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-carcase-number"
                                           name="policies[{{$key}}][policy_leasing_autocredit][carcase_number]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.carcase_number', $policy_model->carcase_number)}}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-issue-year">Год выпуска</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.issue_year') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-issue-year"
                                           name="policies[{{$key}}][policy_leasing_autocredit][issue_year]"
                                           step="1"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.issue_year', $policy_model->issue_year)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-insurance-value">Страховая стоимость</label>

                                    <input required
                                           class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.insurance_value') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-insurance-value"
                                           name="policies[{{$key}}][policy_leasing_autocredit][insurance_value]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.insurance_value', $policy_model->insurance_value)}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Перечень дополнительного оборудования</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-ae-modification-brand">Марка, модель, модификация ТС</label>

                                    <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ae_modification_brand') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-ae-modification-brand"
                                           name="policies[{{$key}}][policy_leasing_autocredit][ae_modification_brand]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.ae_modification_brand', $policy_model->ae_modification_brand)}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-ae-equipment-identification">Наименование оборудования</label>

                                    <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ae_equipment_identification') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-ae-equipment-identification"
                                           name="policies[{{$key}}][policy_leasing_autocredit][ae_equipment_identification]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.ae_equipment_identification', $policy_model->ae_equipment_identification)}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-ae-serial-number">Серийный номер</label>

                                    <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ae_serial_number') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-ae-serial-number"
                                           name="policies[{{$key}}][policy_leasing_autocredit][ae_serial_number]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.ae_serial_number', $policy_model->ae_serial_number)}}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-ae-additional-insured-sum">Страховая сумма</label>

                                    <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ae_additional_insured_sum') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-ae-additional-insured-sum"
                                           name="policies[{{$key}}][policy_leasing_autocredit][ae_additional_insured_sum]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.ae_additional_insured_sum', $policy_model->ae_additional_insured_sum)}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Дополнительное страховое покрытие</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-ac-terrorist-attack-for-car">Покрытие террористических актов с ТС</label>

                                    <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ac_terrorist_attack_for_car') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-ac-terrorist-attack-for-car"
                                           name="policies[{{$key}}][policy_leasing_autocredit][ac_terrorist_attack_for_car]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.ac_terrorist_attack_for_car', $policy_model->ac_terrorist_attack_for_car)}}" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-ac-terrorist-attack-for-human">Покрытие террористических актов с застрахованными лицами</label>

                                    <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ac_terrorist_attack_for_human') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-ac-terrorist-attack-for-human"
                                           name="policies[{{$key}}][policy_leasing_autocredit][ac_terrorist_attack_for_human]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.ac_terrorist_attack_for_human', $policy_model->ac_terrorist_attack_for_human)}}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-ac-terrorist-attack-evacuation">Покрытие расходов на эвакуацию</label>

                                    <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ac_terrorist_attack_evacuation') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-ac-terrorist-attack-evacuation"
                                           name="policies[{{$key}}][policy_leasing_autocredit][ac_terrorist_attack_evacuation]"
                                           step="0.01"
                                           type="number"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.ac_terrorist_attack_evacuation', $policy_model->ac_terrorist_attack_evacuation)}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Сведения о транспортных средствах</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты?
                                    </label>

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input @if($policy_model->vi_previous_insurance_info) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info-yes"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_vi_previous_insurance_info_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info-block', true)"
                                                       type="radio"
                                                       value="1" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info-yes">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input @if(!$policy_model->vi_previous_insurance_info) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info-no"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_vi_previous_insurance_info_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info-block', false)"
                                                       type="radio"
                                                       value="0" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info-no">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"
                                     id="policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info-block"
                                     @if(!$policy_model->vi_previous_insurance_info) style="display: none;" @endif>
                                    <label for="policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info" class="col-form-label">
                                        Укажите название и адрес страховой организации и номер полиса
                                    </label>

                                    <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.vi_previous_insurance_info') is-invalid @enderror"
                                           id="policies-{{$key}}-policy-leasing-autocredit-vi-previous-insurance-info"
                                           name="policies[{{$key}}][policy_leasing_autocredit][vi_previous_insurance_info]"
                                           type="text"
                                           value="{{old('policies.' . $key . '.policy_leasing_autocredit.vi_previous_insurance_info', $policy_model->vi_previous_insurance_info)}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Страховые покрытия по видам опасностей</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        Раздел I. Гибель или повреждение транспортного средства
                                    </label>

                                    @php $is_checked = $policy_model->ec_vehicle_death_recovery_sum || $policy_model->ec_vehicle_death_recovery_premium || $policy_model->ec_vehicle_death_recovery_franchise @endphp

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input @if($is_checked) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-yes"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_ec_vehicle_death_recovery_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-block', true)"
                                                       type="radio"
                                                       value="1" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-yes">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input @if(!$is_checked) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-no"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_ec_vehicle_death_recovery_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-block', false)"
                                                       type="radio"
                                                       value="0" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-no">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div @if(!$is_checked) style="display: none;" @endif
                                 class="col-md-12"
                                 id="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-block">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-sum" class="col-form-label">
                                            Сумма
                                        </label>

                                        <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_vehicle_death_recovery_sum') is-invalid @enderror"
                                               id="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-sum"
                                               name="policies[{{$key}}][policy_leasing_autocredit][ec_vehicle_death_recovery_sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_vehicle_death_recovery_sum', $policy_model->ec_vehicle_death_recovery_sum)}}" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-premium" class="col-form-label">
                                            Страховая премия
                                        </label>

                                        <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_vehicle_death_recovery_premium') is-invalid @enderror"
                                               id="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-premium"
                                               name="policies[{{$key}}][policy_leasing_autocredit][ec_vehicle_death_recovery_premium]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_vehicle_death_recovery_premium', $policy_model->ec_vehicle_death_recovery_premium)}}" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-franchise" class="col-form-label">
                                            Франшиза
                                        </label>

                                        <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ec_vehicle_death_recovery_franchise') is-invalid @enderror"
                                               id="policies-{{$key}}-policy-leasing-autocredit-ec-vehicle-death-recovery-franchise"
                                               name="policies[{{$key}}][policy_leasing_autocredit][ec_vehicle_death_recovery_franchise]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_vehicle_death_recovery_franchise', $policy_model->ec_vehicle_death_recovery_franchise)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        Раздел II. Автогражданская ответственность
                                    </label>

                                    @php $is_checked = $policy_model->ec_civil_liability_sum || $policy_model->ec_civil_liability_premium @endphp

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input @if($is_checked) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-yes"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_ec_civil_liability_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-block', true)"
                                                       type="radio"
                                                       value="1" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-yes">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input @if(!$is_checked) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-no"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_ec_civil_liability_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-block', false)"
                                                       type="radio"
                                                       value="0" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-no">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div @if(!$is_checked) style="display: none;" @endif
                                 class="col-md-12"
                                 id="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-sum" class="col-form-label">
                                            Сумма
                                        </label>

                                        <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_civil_liability_sum') is-invalid @enderror"
                                               id="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-sum"
                                               name="policies[{{$key}}][policy_leasing_autocredit][ec_civil_liability_sum]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_civil_liability_sum', $policy_model->ec_civil_liability_sum)}}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-premium" class="col-form-label">
                                            Страховая премия
                                        </label>

                                        <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_civil_liability_premium') is-invalid @enderror"
                                               id="policies-{{$key}}-policy-leasing-autocredit-ec-civil-liability-premium"
                                               name="policies[{{$key}}][policy_leasing_autocredit][ec_civil_liability_premium]"
                                               step="0.01"
                                               type="number"
                                               value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_civil_liability_premium', $policy_model->ec_civil_liability_premium)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        Раздел III. Несчастные случаи с застрахованными лицами
                                    </label>

                                    @php
                                        $is_checked = $policy_model->ec_driver_sum_for_person || $policy_model->ec_driver_premium ||
                                                      $policy_model->ec_passenger_amount || $policy_model->ec_passenger_sum_for_person || $policy_model->ec_passenger_premium ||
                                                      $policy_model->ec_general_limit_amount || $policy_model->ec_general_limit_sum_for_person || $policy_model->ec_general_limit_premium;
                                    @endphp

                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="checkbox icheck-success">
                                                <input @if($is_checked) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-yes"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_ec_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-ec-block', true)"
                                                       type="radio"
                                                       value="1" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-ec-yes">Да</label>
                                            </div>
                                            <div class="checkbox icheck-success">
                                                <input @if(!$is_checked) checked @endif
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-no"
                                                       name="policies_{{$key}}_policy_leasing_autocredit_ec_switcher"
                                                       onclick="toggle('policies-{{$key}}-policy-leasing-autocredit-ec-block', false)"
                                                       type="radio"
                                                       value="0" />

                                                <label for="policies-{{$key}}-policy-leasing-autocredit-ec-no">Нет</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div @if(!$is_checked) style="display: none;" @endif
                                 class="col-md-12"
                                 id="policies-{{$key}}-policy-leasing-autocredit-ec-block">
                                <table class="table table-hover table-head-fixed">
                                    <thead class="small">
                                        <tr>
                                            <th>Объекты страхования </th>
                                            <th>Количество водителей/пассажиров</th>
                                            <th>Страховая сумма на одного лица</th>
                                            <th>Страховая сумма</th>
                                            <th>Страховая премия</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label class="small">Водитель(и)</label></td>
                                            <td>
                                                <input disabled
                                                       class="form-control"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-driver-amount"
                                                       type="text"
                                                       value="1" />
                                            </td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_driver_sum_for_person') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-driver-sum-for-person"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_driver_sum_for_person]"
                                                       step="0.01"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_driver_sum_for_person', $policy_model->ec_driver_sum_for_person)}}" />
                                            </td>
                                            <td>
                                                <input disabled
                                                       class="form-control"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-driver-sum"
                                                       type="text"
                                                       value="" />
                                            </td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_driver_premium') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-driver-premium"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_driver_premium]"
                                                       step="0.01"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_driver_premium', $policy_model->ec_driver_premium)}}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="small">Пассажиры</label></td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_passenger_amount') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-passenger-amount"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_passenger_amount]"
                                                       step="1"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_passenger_amount', $policy_model->ec_passenger_amount)}}" />
                                            </td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_passenger_sum_for_person') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-passenger-sum-for-person"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_passenger_sum_for_person]"
                                                       step="0.01"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_passenger_sum_for_person', $policy_model->ec_passenger_sum_for_person)}}" />
                                            </td>
                                            <td>
                                                <input disabled
                                                       class="form-control"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-passenger-sum"
                                                       type="text"
                                                       value="" />
                                            </td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_passenger_premium') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-passenger-premium"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_passenger_premium]"
                                                       step="0.01"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_passenger_premium', $policy_model->ec_passenger_premium)}}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="small">Общий Лимит</label></td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_amount') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-general-limit-amount"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_general_limit_amount]"
                                                       step="1"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_amount', $policy_model->ec_general_limit_amount)}}" />
                                            </td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_sum_for_person') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-general-limit-sum-for-person"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_general_limit_sum_for_person]"
                                                       step="0.01"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_sum_for_person', $policy_model->ec_general_limit_sum_for_person)}}" />
                                            </td>
                                            <td>
                                                <input disabled
                                                       class="form-control"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-general-limit-sum"
                                                       type="text"
                                                       value="" />
                                            </td>
                                            <td>
                                                <input class="form-control ddgi-calculate @error('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_premium') is-invalid @enderror"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-general-limit-premium"
                                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_general_limit_premium]"
                                                       step="0.01"
                                                       type="number"
                                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_premium', $policy_model->ec_general_limit_premium)}}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><label class="small">Итого</label></td>
                                            <td>
                                                <input disabled
                                                       class="form-control"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-total-sum"
                                                       type="text"
                                                       value="" />
                                            </td>
                                            <td>
                                                <input disabled
                                                       class="form-control"
                                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-total-premium"
                                                       type="text"
                                                       value="" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="policies-{{$key}}-policy-leasing-autocredit-ec-general-limit-responsibility" class="col-form-label">
                                    Общий лимит ответственности
                                </label>

                                <input class="form-control @error('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_responsibility') is-invalid @enderror"
                                       id="policies-{{$key}}-policy-leasing-autocredit-ec-general-limit-responsibility"
                                       name="policies[{{$key}}][policy_leasing_autocredit][ec_general_limit_responsibility]"
                                       step="0.01"
                                       type="number"
                                       value="{{old('policies.' . $key . '.policy_leasing_autocredit.ec_general_limit_responsibility', $policy_model->ec_general_limit_responsibility)}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Общая страховая сумма</span>
                                </div>

                                <input disabled
                                       class="form-control"
                                       id="policies-{{$key}}-policy-leasing-autocredit-total-sum"
                                       type="text"
                                       value="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Общая страховая премия</span>
                                </div>

                                <input disabled
                                       class="form-control"
                                       id="policies-{{$key}}-policy-leasing-autocredit-total-premium"
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
