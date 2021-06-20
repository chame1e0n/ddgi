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
                           class="form-control @if($errors->has('beneficiary.fio')) is-invalid @endif"
                           id="beneficiary-fio"
                           name="beneficiary[fio]"
                           type="text"
                           value="{{$beneficiary->fio}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-address" class="col-form-label">Адрес выгодоприобретателя</label>
                    <input required
                           class="form-control @if($errors->has('beneficiary.address')) is-invalid @endif"
                           id="beneficiary-address"
                           name="beneficiary[address]"
                           type="text"
                           value="{{$beneficiary->address}}" />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="beneficiary-passport-series" class="col-form-label">Серия паспорта</label>
                    <input class="form-control @if($errors->has('beneficiary.passport_series')) is-invalid @endif"
                           id="beneficiary-passport-series"
                           name="beneficiary[passport_series]"
                           type="text"
                           value="{{$beneficiary->passport_series}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="beneficiary-passport-number" class="col-form-label">Номер паспорта</label>
                    <input class="form-control @if($errors->has('beneficiary.passport_number')) is-invalid @endif"
                           id="beneficiary-passport-number"
                           name="beneficiary[passport_number]"
                           type="text"
                           value="{{$beneficiary->passport_number}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-phone" class="col-form-label">Телефон</label>
                    <input required
                           class="form-control @if($errors->has('beneficiary.phone')) is-invalid @endif"
                           id="beneficiary-phone"
                           name="beneficiary[phone]"
                           type="text"
                           value="{{$beneficiary->phone}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-email" class="col-form-label">Почтовый адрес</label>
                    <input class="form-control @if($errors->has('beneficiary.email')) is-invalid @endif"
                           id="beneficiary-email"
                           name="beneficiary[email]"
                           type="email"
                           value="{{$beneficiary->email}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-bank-account" class="col-form-label">Расчетный счет</label>
                    <input required
                           class="form-control @if($errors->has('beneficiary.bank_account')) is-invalid @endif"
                           id="beneficiary-bank-account"
                           name="beneficiary[bank_account]"
                           type="text"
                           value="{{$beneficiary->bank_account}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-inn" class="col-form-label">ИНН</label>
                    <input required
                           class="form-control @if($errors->has('beneficiary.inn')) is-invalid @endif"
                           id="beneficiary-inn"
                           name="beneficiary[inn]"
                           type="number"
                           value="{{$beneficiary->inn}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-mfo" class="col-form-label">МФО</label>
                    <input required
                           class="form-control @if($errors->has('beneficiary.mfo')) is-invalid @endif"
                           id="beneficiary-mfo"
                           name="beneficiary[mfo]"
                           type="text"
                           value="{{$beneficiary->mfo}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-bank-id" class="col-form-label">Банк</label>
                    <select required
                            class="form-control @if($errors->has('beneficiary.bank_id')) is-invalid @endif"
                            id="beneficiary-bank-id"
                            name="beneficiary[bank_id]"
                            style="width: 100%;">
                        <option>Выберите банк</option>
                        @foreach(\App\Model\Bank::all() as $bank)
                            <option @if($beneficiary->bank_id == $bank->id) selected @endif
                                    value="{{$bank->id}}">
                                {{$bank->name}}
                            </option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-oked" class="col-form-label">ОКЭД</label>
                    <input class="form-control @if($errors->has('beneficiary.oked')) is-invalid @endif"
                           id="beneficiary-oked"
                           name="beneficiary[oked]"
                           type="text"
                           value="{{$beneficiary->oked}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
                    <input class="form-control @if($errors->has('beneficiary.okonh')) is-invalid @endif"
                           id="beneficiary-okonh"
                           name="beneficiary[okonh]"
                           type="text"
                           value="{{$beneficiary->okonh}}" />
                </div>
            </div>
        </div>
    </div>
</div>