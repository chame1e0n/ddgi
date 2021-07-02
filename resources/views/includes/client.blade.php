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
                           class="form-control @if($errors->has('client.fio')) is-invalid @endif"
                           id="client-fio"
                           name="client[fio]"
                           type="text"
                           value="{{$client->fio}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-address" class="col-form-label">Юр. адрес страхователя</label>
                    <input required
                           class="form-control @if($errors->has('client.address')) is-invalid @endif"
                           id="client-address"
                           name="client[address]"
                           type="text"
                           value="{{$client->address}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-phone" class="col-form-label">Телефон</label>
                    <input required
                           class="form-control @if($errors->has('client.phone')) is-invalid @endif"
                           id="client-phone"
                           name="client[phone]"
                           type="text"
                           value="{{$client->phone}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-passport-series" class="col-form-label">Серия паспорта</label>
                    <input class="form-control polises @if($errors->has('client.passport_series')) is-invalid @endif"
                           id="client-passport-series"
                           name="client[passport_series]"
                           type="text"
                           value="{{$client->passport_series}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-passport-number" class="col-form-label">Номер паспорта</label>
                    <input class="form-control polises @if($errors->has('client.passport_number')) is-invalid @endif"
                           id="client-passport-number"
                           name="client[passport_number]"
                           type="text"
                           value="{{$client->passport_number}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-email" class="col-form-label">Почтовый адрес</label>
                    <input class="form-control @if($errors->has('client.email')) is-invalid @endif"
                           id="client-email"
                           name="client[email]"
                           type="email"
                           value="{{$client->email}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-bank-account" class="col-form-label">Расчетный счет</label>
                    <input required
                           class="form-control @if($errors->has('client.bank_account')) is-invalid @endif"
                           id="client-bank-account"
                           name="client[bank_account]"
                           type="text"
                           value="{{$client->bank_account}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-activity" class="col-form-label">Вид деятельности</label>
                    <input class="form-control @if($errors->has('client.activity')) is-invalid @endif"
                           id="client-activity"
                           name="client[activity]"
                           type="text"
                           value="{{$client->activity}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-inn" class="col-form-label">ИНН</label>
                    <input required
                           class="form-control @if($errors->has('client.inn')) is-invalid @endif"
                           id="client-inn"
                           name="client[inn]"
                           type="text"
                           value="{{$client->inn}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-mfo" class="col-form-label">МФО</label>
                    <input required
                           class="form-control @if($errors->has('client.mfo')) is-invalid @endif"
                           id="client-mfo"
                           name="client[mfo]"
                           type="text"
                           value="{{$client->mfo}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-bank-id" class="col-form-label">Банк</label>
                    <select required
                            class="form-control @if($errors->has('client.bank_id')) is-invalid @endif"
                            id="client-bank-id"
                            name="client[bank_id]"
                            style="width: 100%;">
                        <option>Выберите банк</option>
                        @foreach(\App\Model\Bank::all() as $bank)
                            <option @if($client->bank_id == $bank->id) selected @endif
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
                    <input class="form-control @if($errors->has('client.oked')) is-invalid @endif"
                           id="client-oked"
                           name="client[oked]"
                           type="text"
                           value="{{$client->oked}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-okonh" class="col-form-label">ОКОНХ</label>
                    <input class="form-control @if($errors->has('client.okonh')) is-invalid @endif"
                           id="client-okonh"
                           name="client[okonh]"
                           type="text"
                           value="{{$client->okonh}}" />
                </div>
            </div>
            {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                    {{--<label for="client-info" class="col-form-label">Информация о персонале</label>--}}
                    {{--<textarea class="form-control @if($errors->has('client.info')) is-invalid @endif"--}}
                              {{--id="client-info"--}}
                              {{--name="client[info]">{{$client->info}}</textarea>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>