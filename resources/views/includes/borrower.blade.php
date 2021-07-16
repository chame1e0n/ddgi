<div class="card card-info" id="borrower">
    <div class="card-header">
        <h3 class="card-title">Заемщик</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-fio" class="col-form-label">ФИО заемщика</label>
                        <input required
                               class="form-control @error('borrower.fio') is-invalid @enderror"
                               id="borrower-fio"
                               name="borrower[fio]"
                               type="text"
                               value="{{old('borrower.fio', $borrower->fio)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-address" class="col-form-label">Адрес заемщика</label>
                        <input required
                               class="form-control @error('borrower.address') is-invalid @enderror"
                               id="borrower-address"
                               name="borrower[address]"
                               type="text"
                               value="{{old('borrower.address', $borrower->address)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-phone" class="col-form-label">Телефон</label>
                        <input required
                               class="form-control @error('borrower.phone') is-invalid @enderror"
                               id="borrower-phone"
                               name="borrower[phone]"
                               type="text"
                               value="{{old('borrower.phone', $borrower->phone)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-bank-account" class="col-form-label">Расчетный счет</label>
                        <input required
                               class="form-control @error('borrower.bank_account') is-invalid @enderror"
                               id="borrower-bank-account"
                               name="borrower[bank_account]"
                               type="text"
                               value="{{old('borrower.bank_account', $borrower->bank_account)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-inn" class="col-form-label">ИНН</label>
                        <input required
                               class="form-control @error('borrower.inn') is-invalid @enderror"
                               id="borrower-inn"
                               name="borrower[inn]"
                               step="1"
                               type="number"
                               value="{{old('borrower.inn', $borrower->inn)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-mfo" class="col-form-label">МФО</label>
                        <input required
                               class="form-control @error('borrower.mfo') is-invalid @enderror"
                               id="borrower-mfo"
                               name="borrower[mfo]"
                               type="text"
                               value="{{old('borrower.mfo', $borrower->mfo)}}" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="borrower-bank-id" class="col-form-label">Банк</label>
                        <select required
                                class="form-control @error('borrower.bank_id') is-invalid @enderror"
                                id="borrower-bank-id"
                                name="borrower[bank_id]"
                                style="width: 100%;">
                            <option>Выберите банк</option>
                            @foreach(\App\Model\Bank::all() as $bank)
                                <option @if($bank->id == old('borrower.bank_id', $borrower->bank_id)) selected @endif
                                        value="{{$bank->id}}">
                                    {{$bank->name}}
                                </option> 
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="borrower-oked" class="col-form-label">ОКЭД</label>
                        <input class="form-control @error('borrower.oked') is-invalid @enderror"
                               id="borrower-oked"
                               name="borrower[oked]"
                               type="text"
                               value="{{old('borrower.oked', $borrower->oked)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-passport-series" class="col-form-label">Серия паспорта</label>
                        <input required
                               class="form-control @error('borrower.passport_series') is-invalid @enderror"
                               id="borrower-passport-series"
                               name="borrower[passport_series]"
                               type="text"
                               value="{{old('borrower.passport_series', $borrower->passport_series)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-passport-number" class="col-form-label">Номер паспорта</label>
                        <input required
                               class="form-control @error('borrower.passport_number') is-invalid @enderror"
                               id="borrower-passport-number"
                               name="borrower[passport_number]"
                               type="text"
                               value="{{old('borrower.passport_number', $borrower->passport_number)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-passport-issued-place" class="col-form-label">Кем выдан</label>
                        <input class="form-control polises @error('borrower.passport_issued_place') is-invalid @enderror"
                               id="borrower-passport-issued-place"
                               name="borrower[passport_issued_place]"
                               type="text"
                               value="{{old('borrower.passport_issued_place', $borrower->passport_issued_place)}}" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="borrower-passport-issued-date" class="col-form-label">Когда выдан</label>
                        <div class="input-group">
                            <input class="form-control polises @error('borrower.passport_issued_date') is-invalid @enderror"
                                   id="borrower-passport-issued-date"
                                   name="borrower[passport_issued_date]"
                                   type="date"
                                   value="{{old('borrower.passport_issued_date', $borrower->passport_issued_date)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>