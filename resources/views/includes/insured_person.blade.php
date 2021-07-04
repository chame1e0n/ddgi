<div class="card card-info" id="insured_person">
    <div class="card-header">
        <h3 class="card-title">Застрахованное лицо</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="insured-person-fio" class="col-form-label">ФИО застрахованного лица</label>
                        <input required
                               class="form-control @if($errors->has('insured_person.fio')) is-invalid @endif"
                               id="insured-person-fio"
                               name="insured_person[fio]"
                               type="text"
                               value="{{$insured_person->fio}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="insured-person-address" class="col-form-label">Юр. адрес заемщика</label>
                        <input required
                               class="form-control @if($errors->has('insured_person.address')) is-invalid @endif"
                               id="insured-person-address"
                               name="insured_person[address]"
                               type="text"
                               value="{{$insured_person->address}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="insured-person-phone" class="col-form-label">Телефон</label>
                        <input required
                               class="form-control @if($errors->has('insured_person.phone')) is-invalid @endif"
                               id="insured-person-phone"
                               name="insured_person[phone]"
                               type="text"
                               value="{{$insured_person->phone}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="insured-person-passport_series" class="col-form-label">Серия паспорта</label>
                        <input required
                               class="form-control @if($errors->has('insured_person.passport_series')) is-invalid @endif"
                               id="insured-person-passport_series"
                               name="insured_person[passport_series]"
                               type="text"
                               value="{{$insured_person->passport_series}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="insured-person-passport-number" class="col-form-label">Номер паспорта</label>
                        <input required
                               class="form-control @if($errors->has('insured_person.passport_number')) is-invalid @endif"
                               id="insured-person-passport-number"
                               name="insured_person[passport_number]"
                               type="text"
                               value="{{$insured_person->passport_number}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="insured-person-sum" class="col-form-label">Сумма</label>
                        <input class="form-control @if($errors->has('insured_person.sum')) is-invalid @endif"
                               id="insured-person-sum"
                               name="insured_person[sum]"
                               type="text"
                               value="{{$insured_person->sum}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="insured-person-premium" class="col-form-label">Премия</label>
                        <input class="form-control @if($errors->has('insured_person.premium')) is-invalid @endif"
                               id="insured-person-premium"
                               name="insured_person[premium]"
                               type="text"
                               value="{{$insured_person->premium}}" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="icheck-success ">
                        <input class="form-check-input client-type-radio"
                               id="insured-person-tariff-switch"
                               name="insured_person_tariff_switch"
                               onchange="toggleSwitch(this, 'insured-person-tariff-block')"
                               type="checkbox" />
                        <label class="form-check-label" for="insured-person-tariff-switch">Тариф</label>
                    </div>
                    <div class="form-group"
                         id="insured-person-tariff-block"
                         @if(!$insured_person->tariff) style="display: none;" @endif>
                        <label for="insured-person-tariff" class="col-form-label">Укажите процент тарифа</label>
                        <input class="form-control @if($errors->has('insured_person.tariff')) is-invalid @endif"
                               id="insured-person-tariff"
                               name="insured_person[tariff]"
                               type="number"
                               value="{{$insured_person->tariff}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>