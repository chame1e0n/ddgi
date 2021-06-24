<div class="card card-info" id="clone-beneficiary">
    <div class="card-header">
        <h3 class="card-title">Залогодатель</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                    data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" id="beneficiary-card-body">
        <div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fio_zalog" class="col-form-label">Наименования залогодателя</label>
                        <input type="text"
                               id="fio_zalog"
                               name="fio_zalog"
                               class="form-control @if($errors->has('fio_zalog')) is-invalid @endif"
                               value="{{old('fio_zalog')}}"
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address_zalog" class="col-form-label">Адрес залогодателя</label>
                        <input type="text"
                               id="address_zalog"
                               name="address_zalog"
                               class="form-control @if($errors->has('address_zalog')) is-invalid @endif"
                               value="{{old('address_zalog')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone_zalog" class="col-form-label">Телефон</label>
                        <input type="text"
                               id="phone_zalog"
                               name="phone_zalog"
                               class="form-control @if($errors->has('phone_zalog')) is-invalid @endif"
                               value="{{old('phone_zalog')}}"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="checking_account_zalog" class="col-form-label">Расчетный счет</label>
                        <input type="text"
                               id="checking_account_zalog"
                               name="checking_account_zalog"
                               class="form-control @if($errors->has('checking_account_zalog')) is-invalid @endif"
                               value="{{old('checking_account_zalog')}}"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inn_zalog" class="col-form-label">ИНН</label>
                        <input type="text"
                               id="inn_zalog"
                               name="inn_zalog"
                               class="form-control @if($errors->has('inn_zalog')) is-invalid @endif"
                               value="{{old('inn_zalog')}}"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="mfo_zalog" class="col-form-label">МФО</label>
                        <input type="text"
                               id="mfo_zalog"
                               name="mfo_zalog"
                               class="form-control @if($errors->has('mfo_zalog')) is-invalid @endif"
                               value="{{old('mfo_zalog')}}"
                        >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bank_id_zalog" class="col-form-label">Банк</label>
                        <select
                            class="form-control @if($errors->has('bank_id_zalog')) is-invalid @endif"
                            id="bank_id_zalog"
                            name="bank_id_zalog"
                            style="width: 100%;"
                            required
                        >
                            <option>Выберите банк</option>
                            @foreach(\App\Model\Bank::all() as $bank)
                                @if(old('bank_id_zalog') == $bank->id)
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
                        <label for="oked_zalog" class="col-form-label">ОКЭД</label>
                        <input
                            class="form-control @if($errors->has('oked_zalog')) is-invalid @endif"
                            type="text"
                            id="oked_zalog"
                            name="oked_zalog"
                            value="{{old('oked_zalog')}}"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
