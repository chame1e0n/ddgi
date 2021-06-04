<div class="card card-info" id="beneficiary">
    <div class="card-header">
        <h3 class="card-title">Выгодоприобретатель</h3>
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
                    <label for="beneficiary-fio" class="col-form-label">ФИО выгодоприобретателя</label>
                    <input required
                           id="beneficiary-fio"
                           name="beneficiary[fio]"
                           type="text"
                           value="{{$beneficiary->fio}}"
                           @if($errors->has('beneficiary.fio'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-address" class="col-form-label">Адрес выгодоприобретателя</label>
                    <input required
                           id="beneficiary-address"
                           name="beneficiary[address]"
                           type="text"
                           value="{{$beneficiary->address}}"
                           @if($errors->has('beneficiary.address'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="beneficiary-passport-series" class="col-form-label">Серия паспорта</label>
                    <input id="beneficiary-passport-series"
                           name="beneficiary[passport_series]"
                           type="text"
                           value="{{$beneficiary->passport_series}}"
                           @if($errors->has('beneficiary.passport_series'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="beneficiary-passport-number" class="col-form-label">Номер паспорта</label>
                    <input id="beneficiary-passport-number"
                           name="beneficiary[passport_number]"
                           type="text"
                           value="{{$beneficiary->passport_number}}"
                           @if($errors->has('beneficiary.passport_number'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-phone" class="col-form-label">Телефон</label>
                    <input required
                           id="beneficiary-phone"
                           name="beneficiary[phone]"
                           type="text"
                           value="{{$beneficiary->phone}}"
                           @if($errors->has('beneficiary.phone'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-email" class="col-form-label">Почтовый адрес</label>
                    <input id="beneficiary-email"
                           name="beneficiary[email]"
                           type="email"
                           value="{{$beneficiary->email}}"
                           @if($errors->has('beneficiary.email'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-bank-account" class="col-form-label">Расчетный счет</label>
                    <input required
                           id="beneficiary-bank-account"
                           name="beneficiary[bank_account]"
                           type="text"
                           value="{{$beneficiary->bank_account}}"
                           @if($errors->has('beneficiary.bank_account'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                    <input required
                           id="beneficiary-inn"
                           name="beneficiary[inn]"
                           type="number"
                           value="{{$beneficiary->inn}}"
                           @if($errors->has('beneficiary.inn'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                    <input required
                           id="beneficiary-mfo"
                           name="beneficiary[mfo]"
                           type="text"
                           value="{{$beneficiary->mfo}}"
                           @if($errors->has('beneficiary.mfo'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-bank-id" class="col-form-label">Банк</label>
                    <select required
                            id="beneficiary-bank-id"
                            name="beneficiary[bank_id]"
                            style="width: 100%;"
                            @if($errors->has('beneficiary.bank_id'))
                                class="form-control is-invalid"
                            @else
                                class="form-control"
                            @endif>
                        <option>Выберите банк</option>
                        @foreach($banks as $bank)
                            <option value="{{ $bank->id }}"
                                    @if($beneficiary->bank_id == $bank->id)
                                        selected
                                    @endif>
                                {{ $bank->name }}
                            </option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-oked" class="col-form-label">ОКЭД</label>
                    <input id="beneficiary-oked"
                           name="beneficiary[oked]"
                           type="text"
                           value="{{$beneficiary->oked}}"
                           @if($errors->has('beneficiary.oked'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                    <input id="beneficiary-okonh"
                           name="beneficiary[okonh]"
                           type="text"
                           value="{{$beneficiary->okonh}}"
                           @if($errors->has('beneficiary.okonh'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
        </div>
    </div>
</div>