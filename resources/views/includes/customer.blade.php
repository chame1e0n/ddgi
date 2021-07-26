<div class="card card-info" id="customer">
    <div class="card-header">
        <h3 class="card-title">Покупатель</h3>

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
                    <label for="customer-activity-field" class="col-form-label">Сфера дейтельности</label>

                    <input required
                           class="form-control @error('customer.activity_field') is-invalid @enderror"
                           id="customer-activity-field"
                           name="customer[activity_field]"
                           type="text"
                           value="{{old('customer.activity_field', $customer->activity_field)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-address" class="col-form-label">Юр. адрес</label>

                    <input required
                           class="form-control @error('customer.address') is-invalid @enderror"
                           id="customer-address"
                           name="customer[address]"
                           type="text"
                           value="{{old('customer.address', $customer->address)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-post" class="col-form-label">Почтовый адрес</label>

                    <input required
                           class="form-control @error('customer.post') is-invalid @enderror"
                           id="customer-post"
                           name="customer[post]"
                           type="text"
                           value="{{old('customer.post', $customer->post)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-phone" class="col-form-label">Телефон</label>

                    <input required
                           class="form-control @error('customer.phone') is-invalid @enderror"
                           id="customer-phone"
                           name="customer[phone]"
                           type="text"
                           value="{{old('customer.phone', $customer->phone)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-bank-account" class="col-form-label">Расчетный счет</label>

                    <input required
                           class="form-control @error('customer.bank_account') is-invalid @enderror"
                           id="customer-bank-account"
                           name="customer[bank_account]"
                           type="text"
                           value="{{old('customer.bank_account', $customer->bank_account)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-inn" class="col-form-label">ИНН</label>

                    <input required
                           class="form-control @error('customer.inn') is-invalid @enderror"
                           id="customer-inn"
                           name="customer[inn]"
                           type="text"
                           value="{{old('customer.inn', $customer->inn)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-mfo" class="col-form-label">МФО</label>

                    <input required
                           class="form-control @error('customer.mfo') is-invalid @enderror"
                           id="customer-mfo"
                           name="customer[mfo]"
                           type="text"
                           value="{{old('customer.mfo', $customer->mfo)}}" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-bank-id" class="col-form-label">Банк</label>

                    <select required
                            class="form-control @error('customer.bank_id') is-invalid @enderror"
                            id="customer-bank-id"
                            name="customer[bank_id]"
                            style="width: 100%;">
                        <option>Выберите банк</option>

                        @foreach(\App\Model\Bank::all() as $bank)
                            <option @if($bank->id == old('customer.bank_id', $customer->bank_id)) selected @endif
                                    value="{{$bank->id}}">
                                {{$bank->name}}
                            </option> 
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="customer-oked" class="col-form-label">ОКЭД</label>

                    <input class="form-control @error('customer.oked') is-invalid @enderror"
                           id="customer-oked"
                           name="customer[oked]"
                           type="text"
                           value="{{old('customer.oked', $customer->oked)}}" />
                </div>
            </div>
        </div>
    </div>
</div>