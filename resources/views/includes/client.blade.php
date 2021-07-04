<div class="card card-info" id="client">
    <div class="card-header">
        <h3 class="card-title">Общие сведения</h3>
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
                    <label for="client-fio" class="col-form-label">Наименование страхователя</label>
                    <input required
                           class="form-control @error('client.fio') is-invalid @enderror"
                           id="client-fio"
                           name="client[fio]"
                           type="text"
                           value="{{old('client.fio', $client->fio)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-address" class="col-form-label">Юр. адрес страхователя</label>
                    <input required
                           class="form-control @error('client.address') is-invalid @enderror"
                           id="client-address"
                           name="client[address]"
                           type="text"
                           value="{{old('client.address', $client->address)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-phone" class="col-form-label">Телефон</label>
                    <input required
                           class="form-control @error('client.phone') is-invalid @enderror"
                           id="client-phone"
                           name="client[phone]"
                           type="text"
                           value="{{old('client.phone', $client->phone)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-passport-series" class="col-form-label">Серия паспорта</label>
                    <input class="form-control polises @error('client.passport_series') is-invalid @enderror"
                           id="client-passport-series"
                           name="client[passport_series]"
                           type="text"
                           value="{{old('client.passport_series', $client->passport_series)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-passport-number" class="col-form-label">Номер паспорта</label>
                    <input class="form-control polises @error('client.passport_number') is-invalid @enderror"
                           id="client-passport-number"
                           name="client[passport_number]"
                           type="text"
                           value="{{old('client.passport_number', $client->passport_number)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-email" class="col-form-label">Почтовый адрес</label>
                    <input class="form-control @error('client.email') is-invalid @enderror"
                           id="client-email"
                           name="client[email]"
                           type="email"
                           value="{{old('client.email', $client->email)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-bank-account" class="col-form-label">Расчетный счет</label>
                    <input required
                           class="form-control @error('client.bank_account') is-invalid @enderror"
                           id="client-bank-account"
                           name="client[bank_account]"
                           type="text"
                           value="{{old('client.bank_account', $client->bank_account)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-activity" class="col-form-label">Вид деятельности</label>
                    <input class="form-control @error('client.activity') is-invalid @enderror"
                           id="client-activity"
                           name="client[activity]"
                           type="text"
                           value="{{old('client.activity', $client->activity)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-inn" class="col-form-label">ИНН</label>
                    <input required
                           class="form-control @error('client.inn') is-invalid @enderror"
                           id="client-inn"
                           name="client[inn]"
                           type="text"
                           value="{{old('client.inn', $client->inn)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-mfo" class="col-form-label">МФО</label>
                    <input required
                           class="form-control @error('client.mfo') is-invalid @enderror"
                           id="client-mfo"
                           name="client[mfo]"
                           type="text"
                           value="{{old('client.mfo', $client->mfo)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-bank-id" class="col-form-label">Банк</label>
                    <select required
                            class="form-control @error('client.bank_id') is-invalid @enderror"
                            id="client-bank-id"
                            name="client[bank_id]"
                            style="width: 100%;">
                        <option>Выберите банк</option>
                        @foreach(\App\Model\Bank::all() as $bank)
                            <option @if($bank->id == old('client.bank_id', $client->bank_id)) selected @endif
                                    value="{{$bank->id}}">
                                {{$bank->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-oked" class="col-form-label">ОКЭД</label>
                    <input class="form-control @error('client.oked') is-invalid @enderror"
                           id="client-oked"
                           name="client[oked]"
                           type="text"
                           value="{{old('client.oked', $client->oked)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-okonh" class="col-form-label">ОКОНХ</label>
                    <input class="form-control @error('client.okonh') is-invalid @enderror"
                           id="client-okonh"
                           name="client[okonh]"
                           type="text"
                           value="{{old('client.okonh', $client->okonh)}}" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="client-info" class="col-form-label">Информация о персонале</label>
                    <textarea class="form-control @error('client.info') is-invalid @enderror"
                              id="client-info"
                              name="client[info]">{{old('client.info', $client->info)}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>