<div class="card card-info" id="guarantor">
    <div class="card-header">
        <h3 class="card-title">Поручитель</h3>

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
                    <label for="guarantor-address" class="col-form-label">Юр. адрес</label>

                    <input required
                           class="form-control @error('guarantor.address') is-invalid @enderror"
                           id="guarantor-address"
                           name="guarantor[address]"
                           type="text"
                           value="{{old('guarantor.address', $guarantor->address)}}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="guarantor-post" class="col-form-label">Почтовый адрес</label>

                    <input required
                           class="form-control @error('guarantor.post') is-invalid @enderror"
                           id="guarantor-post"
                           name="guarantor[post]"
                           type="text"
                           value="{{old('guarantor.post', $guarantor->post)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="guarantor-phone" class="col-form-label">Телефон</label>

                    <input required
                           class="form-control @error('guarantor.phone') is-invalid @enderror"
                           id="guarantor-phone"
                           name="guarantor[phone]"
                           type="text"
                           value="{{old('guarantor.phone', $guarantor->phone)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="guarantor-bank-account" class="col-form-label">Расчетный счет</label>

                    <input required
                           class="form-control @error('guarantor.bank_account') is-invalid @enderror"
                           id="guarantor-bank-account"
                           name="guarantor[bank_account]"
                           type="text"
                           value="{{old('guarantor.bank_account', $guarantor->bank_account)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="guarantor-inn" class="col-form-label">ИНН</label>

                    <input required
                           class="form-control @error('guarantor.inn') is-invalid @enderror"
                           id="guarantor-inn"
                           name="guarantor[inn]"
                           type="text"
                           value="{{old('guarantor.inn', $guarantor->inn)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="guarantor-mfo" class="col-form-label">МФО</label>

                    <input required
                           class="form-control @error('guarantor.mfo') is-invalid @enderror"
                           id="guarantor-mfo"
                           name="guarantor[mfo]"
                           type="text"
                           value="{{old('guarantor.mfo', $guarantor->mfo)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="guarantor-bank-id" class="col-form-label">Банк</label>

                    <select required
                            class="form-control @error('guarantor.bank_id') is-invalid @enderror"
                            id="guarantor-bank-id"
                            name="guarantor[bank_id]"
                            style="width: 100%;">
                        <option>Выберите банк</option>

                        @foreach(\App\Model\Bank::all() as $bank)
                            <option @if($bank->id == old('guarantor.bank_id', $guarantor->bank_id)) selected @endif
                                    value="{{$bank->id}}">
                                {{$bank->name}}
                            </option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="guarantor-oked" class="col-form-label">ОКЭД</label>

                    <input class="form-control @error('guarantor.oked') is-invalid @enderror"
                           id="guarantor-oked"
                           name="guarantor[oked]"
                           type="text"
                           value="{{old('guarantor.oked', $guarantor->oked)}}" />
                </div>
            </div>
        </div>
    </div>
</div>