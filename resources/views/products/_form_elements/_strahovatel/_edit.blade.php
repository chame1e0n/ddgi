<div class="card card-info" id="clone-insurance">
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
                    <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
                    <input type="text" id="insurer-name" name="fio_insurer"
                           value="{{$product->policyHolders->FIO}}" @if($errors->has('fio_insurer'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                           @endif
                           required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="insurer-address" class="col-form-label">Юр адрес
                        страхователя</label>
                    <input value="{{$product->policyHolders->address}}" type="text" id="insurer-address"
                           name="address_insurer"
                           @if($errors->has('address_insurer'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                           @endif required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="insurer-tel" class="col-form-label">Телефон</label>
                    <input value="{{$product->policyHolders->phone_number}}" type="text" id="insurer-tel"
                           name="tel_insurer"
                           @if($errors->has('tel_insurer'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                            @endif >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
                    <input value="{{$product->policyHolders->checking_account}}" type="text" id="insurer-schet"
                           name="address_schet"
                           @if($errors->has('address_schet'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                            @endif >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="insurer-inn" class="col-form-label">ИНН</label>
                    <input value="{{$product->policyHolders->inn}}" type="text" id="insurer-inn"
                           name="inn_insurer"
                           @if($errors->has('inn_insurer'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                            @endif
                    >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="insurer-mfo" class="col-form-label">МФО</label>
                    <input value="{{$product->policyHolders->mfo}}"  type="text" id="insurer-mfo" name="mfo_insurer"@if($errors->has('mfo_insurer'))
                    class="form-control is-invalid"
                           @else
                           class="form-control"
                            @endif >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="insurer-bank" class="col-form-label">Банк</label>
                    <select @if($errors->has('bank_insurer'))
                            class="form-control is-invalid"
                            @else
                            class="form-control"
                            @endif id="insurer_bank" name="bank_insurer"
                            style="width: 100%;" required>
                        <option>Выберите банк</option>
                        @foreach($banks as $bank)
                            @if($product->policyHolders->bank_id == $bank->id)
                                <option selected value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @else
                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
                    <input value="{{$product->policyHolders->oked}}" type="text" id="oked" name="oked"
                           @if($errors->has('oked'))
                           class="form-control is-invalid"
                           @else
                           class="form-control"
                            @endif >
                </div>
            </div>
        </div>
    </div>
</div>