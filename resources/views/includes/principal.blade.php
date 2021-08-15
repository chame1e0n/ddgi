<div class="card card-info" id="principal">
    <div class="card-header">
        <h3 class="card-title">Принципал</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-address">Адрес</label>

                        <input required
                               class="form-control @error('principal.address') is-invalid @enderror"
                               id="principal-address"
                               name="principal[address]"
                               type="text"
                               value="{{old('principal.address', $principal->address)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-phone">Телефон</label>

                        <input required
                               class="form-control @error('principal.phone') is-invalid @enderror"
                               id="principal-phone"
                               name="principal[phone]"
                               type="text"
                               value="{{old('principal.phone', $principal->phone)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-bank-id">Банк</label>

                        <select required
                                class="form-control @error('principal.bank_id') is-invalid @enderror"
                                id="principal-bank-id"
                                name="principal[bank_id]"
                                style="width: 100%;">
                            <option>Выберите банк</option>
                            @foreach(\App\Model\Bank::all() as $bank)
                                <option @if($bank->id == old('principal.bank_id', $principal->bank_id)) selected @endif
                                        value="{{$bank->id}}">
                                    {{$bank->name}}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-bank-account">Расчетный счет</label>

                        <input required
                               class="form-control @error('principal.bank_account') is-invalid @enderror"
                               id="principal-bank-account"
                               name="principal[bank_account]"
                               type="text"
                               value="{{old('principal.bank_account', $principal->bank_account)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="principal-inn">ИНН</label>

                        <input required
                               class="form-control @error('principal.inn') is-invalid @enderror"
                               id="principal-inn"
                               name="principal[inn]"
                               step="1"
                               type="number"
                               value="{{old('principal.inn', $principal->inn)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="principal-mfo">МФО</label>

                        <input required
                               class="form-control @error('principal.mfo') is-invalid @enderror"
                               id="principal-mfo"
                               name="principal[mfo]"
                               type="text"
                               value="{{old('principal.mfo', $principal->mfo)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="principal-oked">ОКЭД</label>

                        <input class="form-control @error('principal.oked') is-invalid @enderror"
                               id="principal-oked"
                               name="principal[oked]"
                               type="text"
                               value="{{old('principal.oked', $principal->oked)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-passport-series">Серия паспорта</label>

                        <input required
                               class="form-control @error('principal.passport_series') is-invalid @enderror"
                               id="principal-passport-series"
                               name="principal[passport_series]"
                               type="text"
                               value="{{old('principal.passport_series', $principal->passport_series)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-passport-number">Номер паспорта</label>

                        <input required
                               class="form-control @error('principal.passport_number') is-invalid @enderror"
                               id="principal-passport-number"
                               name="principal[passport_number]"
                               type="text"
                               value="{{old('principal.passport_number', $principal->passport_number)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-passport-issued-place">Кем выдан</label>

                        <input class="form-control polises @error('principal.passport_issued_place') is-invalid @enderror"
                               id="principal-passport-issued-place"
                               name="principal[passport_issued_place]"
                               type="text"
                               value="{{old('principal.passport_issued_place', $principal->passport_issued_place)}}" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="principal-passport-issued-date">Когда выдан</label>

                        <div class="input-group">
                            <input class="form-control polises @error('principal.passport_issued_date') is-invalid @enderror"
                                   id="principal-passport-issued-date"
                                   name="principal[passport_issued_date]"
                                   type="date"
                                   value="{{old('principal.passport_issued_date', $principal->passport_issued_date)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>