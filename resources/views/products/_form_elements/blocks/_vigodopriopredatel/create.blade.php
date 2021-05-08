@section('_vigodopriobretatel_content')


    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-name" class="col-form-label">Наименования выгодоприобретателя</label>
            <input type="text" id="beneficiary-name" name="fio_beneficiary"
                   value="{{old('fio_beneficiary')}}" @if($errors->has('fio_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-address" class="col-form-label">Адрес</label>
            <input type="text" id="beneficiary-address" name="address_beneficiary"
                   value="{{old('address_beneficiary')}}" @if($errors->has('address_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="beneficiary-tel" class="col-form-label">Телефон</label>
            <input type="text" id="beneficiary-tel" name="tel_beneficiary"
                   value="{{old('tel_beneficiary')}}" @if($errors->has('tel_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="beneficiary-schet" class="col-form-label">Расчетный счет</label>
            <input type="text" id="beneficiary-schet" name="beneficiary_schet"
                   value="{{old('beneficiary_schet')}}" @if($errors->has('beneficiary_schet'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="beneficiary-inn" class="col-form-label">ИНН</label>
            <input type="text" id="beneficiary-inn" name="inn_beneficiary"
                   value="{{old('inn_beneficiary')}}" @if($errors->has('inn_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="beneficiary-mfo" class="col-form-label">МФО</label>
            <input type="text" id="beneficiary-mfo" name="mfo_beneficiary"
                   value="{{old('mfo_beneficiary')}}" @if($errors->has('mfo_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="beneficiary-passport" class="col-form-label">Номер паспорта</label>
            <input type="text" id="beneficiary-passport" name="passport_beneficiary"
                   value="{{old('passport_beneficiary')}}" @if($errors->has('passport_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="beneficiary-bank" class="col-form-label">Банк</label>
            <select @if($errors->has('bank_beneficiary'))
                    class="form-control is-invalid"
                    @else
                    class="form-control"
                    @endif id="beneficiary-bank" name="bank_beneficiary"
                    style="width: 100%;" required>
                <option></option>
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-okonh" class="col-form-label">ОКОНХ</label>
            <input type="text" id="beneficiary-okonh" name="okonh_beneficiary"
                   value="{{old('okonh_beneficiary')}}" @if($errors->has('okonh_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="beneficiary-seriya" class="col-form-label">Серия</label>
            <input type="text" id="beneficiary-seriya" name="seriya_beneficiary"
                   value="{{old('seriya_beneficiary')}}" @if($errors->has('seriya_beneficiary'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
@endsection


@section('_vigodopriobretatel_scripts')
    <script>
        $.ajax({
            url: '{{route('getBanks')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = response.length;
                let banks = $("#beneficiary-bank");

                banks.empty();
                banks.append("<option></option>");
                var selected = {{old('bank_beneficiary') ?? 0}};
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    var mfo = response[i]['mfo'];

                    banks.append("<option value='" + id + "' " + (selected == id ? 'selected' : '') + ">" + name + "</option>");
                }
            }
        });

        //Initialize Select2 Elements
        $('#beneficiary-bank').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection
