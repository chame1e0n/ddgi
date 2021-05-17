@section('_principal_content')
    <div class="col-md-4">
        <div class="form-group">
            <label for="address_principal" class="col-form-label">Адрес принципала</label>
            <input type="text" id="address_principal" name="address_principal"
                   value="{{old('address_principal')}}"
                   @if($errors->has('address_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="phone_number_principal" class="col-form-label">Телефон</label>
            <input type="text" id="phone_number_principal" name="phone_number_principal"
                   value="{{old('phone_number_principal')}}"
                   @if($errors->has('phone_number_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="passport_series_principal" class="col-form-label">Серия паспорта</label>
            <input type="text" id="passport_series_principal" name="passport_series_principal"
                   value="{{old('passport_series_principal')}}"
                   @if($errors->has('passport_series_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="passport_number_principal" class="col-form-label">Номер паспорта</label>
            <input type="text" id="passport_number_principal" name="passport_number_principal"
                   value="{{old('passport_number_principal')}}"
                   @if($errors->has('passport_number_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="passport_given_by_principal" class="col-form-label">Кем выдан</label>
            <input type="text" id="passport_given_by_principal" name="passport_given_by_principal"
                   value="{{old('passport_given_by_principal')}}"
                   @if($errors->has('passport_given_by_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="passport_given_date_principal" class="col-form-label">Когда выдан</label>
            <div class="input-group">
                <input id="passport_given_date_principal" name="passport_given_date_principal" type="date"
                       value="{{old('passport_given_date_principal')}}"
                       @if($errors->has('passport_given_date_principal'))
                       class="form-control is-invalid"
                       @else
                       class="form-control"
                        @endif>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="checking_account_principal" class="col-form-label">Расчетный счет</label>
            <input type="text" id="checking_account_principal" name="checking_account_principal"
                   value="{{old('checking_account_principal')}}"
                   @if($errors->has('checking_account_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="inn_principal" class="col-form-label">ИНН</label>
            <input type="text" id="inn_principal" name="inn_principal"
                   value="{{old('inn_principal')}}"
                   @if($errors->has('inn_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="mfo_principal" class="col-form-label">МФО</label>
            <input type="text" id="mfo_principal" name="mfo_principal"
                   value="{{old('mfo_principal')}}"
                   @if($errors->has('mfo_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="bank_principal" class="col-form-label">Банк</label>
            <select @if($errors->has('bank_principal'))
                    class="form-control is-invalid"
                    @else
                    class="form-control"
                    @endif id="bank_principal" name="bank_principal"
                    style="width: 100%;" required>
                <option></option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="oked_principal" class="col-form-label">ОКЭД</label>
            <input type="text" id="oked_principal" name="oked_principal"
                   value="{{old('oked_principal')}}"
                   @if($errors->has('oked_principal'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif>
        </div>
    </div>
@endsection

@section('_principal_scripts')
    <script>
        $.ajax({
            url: '{{route('getBanks')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = response.length;
                let banks = $("#bank_principal");

                banks.empty();
                banks.append("<option></option>");
                var selected = {{old('bank_insurer') ?? 0}};
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    var mfo = response[i]['mfo'];

                    banks.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + name + "</option>");
                }
            }
        });

        //Initialize Select2 Elements
        $('#bank_principal').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection