<div class="card card-info" id="pledger">
    <div class="card-header">
        <h3 class="card-title">Залогодатель</h3>

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
                    <label for="pledger-fio" class="col-form-label">Наименования залогодателя</label>

                    <input required
                           class="form-control @error('pledger.fio') is-invalid @enderror"
                           id="pledger-fio"
                           name="pledger[fio]"
                           type="text"
                           value="{{old('pledger.fio', $pledger->fio)}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pledger-address" class="col-form-label">Адрес залогодателя</label>

                    <input required
                           class="form-control @error('pledger.address') is-invalid @enderror"
                           id="pledger-address"
                           name="pledger[address]"
                           type="text"
                           value="{{old('pledger.address', $pledger->address)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pledger-phone" class="col-form-label">Телефон</label>

                    <input required
                           class="form-control @error('pledger.phone') is-invalid @enderror"
                           id="pledger-phone"
                           name="pledger[phone]"
                           type="text"
                           value="{{old('pledger.phone', $pledger->phone)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pledger-bank-account" class="col-form-label">Расчетный счет</label>

                    <input required
                           class="form-control @error('pledger.bank_account') is-invalid @enderror"
                           id="pledger-bank-account"
                           name="pledger[bank_account]"
                           type="text"
                           value="{{old('pledger.bank_account', $pledger->bank_account)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pledger-inn" class="col-form-label">ИНН</label>

                    <input required
                           class="form-control @error('pledger.inn') is-invalid @enderror"
                           id="pledger-inn"
                           name="pledger[inn]"
                           step="1"
                           type="number"
                           value="{{old('pledger.inn', $pledger->inn)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pledger-mfo" class="col-form-label">МФО</label>

                    <input required
                           class="form-control @error('pledger.mfo') is-invalid @enderror"
                           id="pledger-mfo"
                           name="pledger[mfo]"
                           type="text"
                           value="{{old('pledger.mfo', $pledger->mfo)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pledger-bank-id" class="col-form-label">Банк</label>

                    <select required
                            class="form-control @error('pledger.bank_id') is-invalid @enderror"
                            id="pledger-bank-id"
                            name="pledger[bank_id]"
                            style="width: 100%;">
                        <option>Выберите банк</option>

                        @foreach(\App\Model\Bank::all() as $bank)
                            <option @if($bank->id == old('pledger.bank_id', $pledger->bank_id)) selected @endif
                                    value="{{$bank->id}}">
                                {{$bank->name}}
                            </option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pledger-oked" class="col-form-label">ОКЭД</label>

                    <input class="form-control @error('pledger.oked') is-invalid @enderror"
                           id="pledger-oked"
                           name="pledger[oked]"
                           type="text"
                           value="{{old('pledger.oked', $pledger->oked)}}" />
                </div>
            </div>
        </div>
    </div>
</div>
