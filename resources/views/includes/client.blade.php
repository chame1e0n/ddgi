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
                           id="client-fio"
                           name="client[fio]"
                           type="text"
                           value="{{$client->fio}}"
                           @if($errors->has('client.fio'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-address" class="col-form-label">Юр. адрес страхователя</label>
                    <input required
                           id="client-address"
                           name="client[address]"
                           type="text"
                           value="{{$client->address}}"
                           @if($errors->has('client.address'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-phone" class="col-form-label">Телефон</label>
                    <input required
                           id="client-phone"
                           name="client[phone]"
                           type="text"
                           value="{{$client->phone}}"
                           @if($errors->has('client.phone'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-passport-series" class="col-form-label">Серия паспорта</label>
                    <input id="client-passport-series"
                           name="client[passport_series]"
                           type="text"
                           value="{{$client->passport_series}}"
                           @if($errors->has('client.passport_series'))
                            class="form-control polises is-invalid"
                           @else
                            class="form-control polises"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-passport-number" class="col-form-label">Номер паспорта</label>
                    <input id="client-passport-number"
                           name="client[passport_number]"
                           type="text"
                           value="{{$client->passport_number}}"
                           @if($errors->has('client.passport_number'))
                            class="form-control polises is-invalid"
                           @else
                            class="form-control polises"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-email" class="col-form-label">Почтовый адрес</label>
                    <input id="client-email"
                           name="client[email]"
                           type="email"
                           value="{{$client->email}}"
                           @if($errors->has('client.email'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-bank-account" class="col-form-label">Расчетный счет</label>
                    <input required
                           id="client-bank-account"
                           name="client[bank_account]"
                           type="text"
                           value="{{$client->bank_account}}"
                           @if($errors->has('client.bank_account'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-activity" class="col-form-label">Вид деятельности</label>
                    <input id="client-activity"
                           name="client[activity]"
                           type="text"
                           value="{{$client->activity}}"
                           @if($errors->has('client.activity'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-inn" class="col-form-label">ИНН</label>
                    <input required
                           id="client-inn"
                           name="client[inn]"
                           type="text"
                           value="{{$client->inn}}"
                           @if($errors->has('client.inn'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-mfo" class="col-form-label">МФО</label>
                    <input required
                           id="client-mfo"
                           name="client[mfo]"
                           type="text"
                           value="{{$client->mfo}}"
                           @if($errors->has('client.mfo'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-bank-id" class="col-form-label">Банк</label>
                    <select required
                            id="client-bank-id"
                            name="client[bank_id]"
                            style="width: 100%;"
                            @if($errors->has('client.bank_id'))
                                class="form-control is-invalid"
                            @else
                                class="form-control"
                            @endif>
                        <option>Выберите банк</option>
                        @foreach(\App\Model\Bank::all() as $bank)
                            <option value="{{ $bank->id }}"
                                    @if($client->bank_id == $bank->id)
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
                    <label for="client-oked" class="col-form-label">ОКЭД</label>
                    <input id="client-oked"
                           name="client[oked]"
                           type="text"
                           value="{{$client->oked}}"
                           @if($errors->has('client.oked'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="client-okonh" class="col-form-label">ОКОНХ</label>
                    <input id="client-okonh"
                           name="client[okonh]"
                           type="text"
                           value="{{$client->okonh}}"
                           @if($errors->has('client.okonh'))
                            class="form-control is-invalid"
                           @else
                            class="form-control"
                           @endif />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="client-info" class="col-form-label">Информация о персонале</label>
                    <textarea id="client-info"
                              name="client[info]"
                              @if($errors->has('client.info'))
                                class="form-control is-invalid"
                              @else
                                class="form-control"
                              @endif>{{$client->info}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>