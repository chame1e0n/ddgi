@section('_zalogodatel_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="zalog-name" class="col-form-label">Наименования
                залогодателя</label>
            <input type="text" id="zalog-name" name="fio_zalog"
                   value="{{old('fio_zalog')}}" @if($errors->has('fio_zalog'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="zalog-address" class="col-form-label">Юр адрес
                залогодателя</label>\
            <input type="text" id="zalog-address" name="address_zalog"
                   value="{{old('address_zalog')}}" @if($errors->has('address_zalog'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="zalog-tel" class="col-form-label">Телефон</label>
            <input type="text" id="zalog-tel" name="tel_zalog"
                   value="{{old('tel_zalog')}}" @if($errors->has('tel_zalog'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="zalog-schet" class="col-form-label">Расчетный
                счет</label>
            <input type="text" id="zalog-schet" name="zalog_schet"
                   value="{{old('zalog_schet')}}" @if($errors->has('zalog_schet'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="zalog-inn" class="col-form-label">ИНН</label>
            <input type="text" id="zalog-inn" name="inn_zalog"
                   value="{{old('inn_zalog')}}" @if($errors->has('inn_zalog'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="zalog-mfo" class="col-form-label">МФО</label>
            <input type="text" id="zalog-mfo" name="mfo_zalog"
                   value="{{old('mfo_zalog')}}" @if($errors->has('mfo_zalog'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="zalog-okonh" class="col-form-label">ОКЭД</label>
            <input type="text" id="zalog-okonh" name="okonh_zalog"
                   value="{{old('okonh_zalog')}}" @if($errors->has('okonh_zalog'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="zalog-bank" class="col-form-label">Банк</label>
            <select @if($errors->has('bank_zalog'))
                    class="form-control is-invalid"
                    @else
                    class="form-control"
                    @endif id="zalog-bank" name="bank_zalog"
                    style="width: 100%;" required>
                <option></option>
            </select>
        </div>
    </div>
@endsection


@section('_zalogodatel_scripts')
    <script>
        $.ajax({
            url: '{{route('getBanks')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = response.length;
                let banks = $("#zalog-bank");

                banks.empty();
                banks.append("<option></option>");
                var selected = {{old('bank_zalog') ?? 0}};
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    var mfo = response[i]['mfo'];

                    banks.append("<option value='" + id + "' " + (selected == id ? 'selected' : '') + ">" + name + "</option>");
                }
            }
        });

        //Initialize Select2 Elements
        $('#zalog-bank').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection
