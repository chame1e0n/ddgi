<div class="card card-info" id="clone-beneficiary">
    <div class="card-header">
        <h3 class="card-title">Заемщик</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" id="beneficiary-card-body">
        <div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="z_fio" class="col-form-label">ФИО/Наименования заемщика</label>
                        <input type="text"
                               id="z_fio"
                               name="z_fio"
                               value="{{old('z_fio')}}"
                               class="form-control @if($errors->has('z_fio')) polises is-invalid @endif"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="z_address" class="col-form-label">Адрес заемщика</label>
                        <input type="text"
                               id="z_address"
                               name="z_address"
                               value="{{old('z_address')}}"
                               class="form-control @if($errors->has('z_address')) polises is-invalid @endif"
                            >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="z_phone" class="col-form-label">Телефон</label>
                        <input type="text"
                               id="z_phone"
                               name="z_phone"
                               value="{{old('z_phone')}}"
                               class="form-control @if($errors->has('z_phone')) polises is-invalid @endif"
                            >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="beneficiary-tel" class="col-form-label">Серия паспорта</label>
                        <input type="text"
                               id="beneficiary-tel"
                               name="passport_series"
                               value="{{old('passport_series')}}"
                               class="form-control @if($errors->has('passport_series')) polises is-invalid @endif"
                            >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="beneficiary-tel" class="col-form-label">Номер паспорта</label>
                        <input type="text"
                               id="beneficiary-tel"
                               name="passport_number"
                               value="{{old('passport_number')}}"
                               class="form-control @if($errors->has('passport_number')) polises is-invalid @endif"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="beneficiary-tel" class="col-form-label">Кем выдан</label>
                        <input type="text"
                               id="beneficiary-tel"
                               name="passport_issued"
                               value="{{old('passport_issued')}}"
                               class="form-control @if($errors->has('passport_issued')) polises is-invalid @endif"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-form-label">Когда выдан</label>
                        <div class="input-group">
                            <input id="insurance_to"
                                   name="passport_when_issued"
                                   type="date"
                                   value="{{old('passport_when_issued')}}"
                                   class="form-control @if($errors->has('passport_when_issued')) polises is-invalid @endif"
                            >
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
                        <input type="text"
                               id="beneficiary-schet"
                               name="z_checking_account"
                               value="{{old('z_checking_account')}}"
                               class="form-control @if($errors->has('z_checking_account')) polises is-invalid @endif"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                        <input type="text"
                               id="beneficiary-inn"
                               name="z_inn"
                               value="{{old('z_inn')}}"
                               class="form-control @if($errors->has('z_inn')) polises is-invalid @endif"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                        <input type="text"
                               id="beneficiary-mfo"
                               name="z_mfo"
                               value="{{old('z_mfo')}}"
                               class="form-control @if($errors->has('z_mfo')) polises is-invalid @endif"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="z_bank_id" class="col-form-label">Банк</label>
                        <select
                                class="form-control @if($errors->has('z_bank_id')) is-invalid @endif"
                                id="z_bank_id"
                                name="z_bank_id"
                                style="width: 100%;"
                                required
                        >
                            <option>Выберите банк</option>
                            @foreach(\App\Model\Bank::all() as $bank)
                                @if(old('z_bank_id') == $bank->id)
                                    <option selected value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @else
                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="beneficiary-okonh" class="col-form-label">ОКЭД</label>
                        <input type="text"
                               id="beneficiary-okonh"
                               name="z_okonx"
                               value="{{old('z_okonx')}}"
                               class="form-control @if($errors->has('z_okonx')) is-invalid @endif"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
