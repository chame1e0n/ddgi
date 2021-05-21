@section('_obshie_svedeniya_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="insurer-name" class="col-form-label fiz-list">ФИО страхователя</label>
            <input type="text" id="insurer-name" name="fio_insurer"
                   value="{{old('fio_insurer')}}" @if($errors->has('fio_insurer'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                   @endif
                   required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="insurer-address" class="col-form-label">Юр адрес
                страхователя</label>
            <input value="{{old('address_insurer')}}" type="text" id="insurer-address"
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
            <input value="{{old('tel_insurer')}}" type="text" id="insurer-tel"
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
            <input value="{{old('address_schet')}}" type="text" id="insurer-schet"
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
            <input value="{{old('inn_insurer')}}" type="text" id="insurer-inn"
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
            <input value="{{old('mfo_insurer')}}" type="text" id="insurer-mfo"
                   name="mfo_insurer" @if($errors->has('mfo_insurer'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif >
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="insurer-bank" class="col-form-label">Банк</label>
            <select @if($errors->has('bank_insurer'))
                    class="form-control is-invalid"
                    @else
                    class="form-control"
                    @endif id="bank_insurer" name="bank_insurer"
                    style="width: 100%;" required>
                <option></option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="oked_insurer" class="col-form-label">ОКЭД</label>
            <input value="{{old('oked_insurer')}}" type="text" id="oked_insurer"
                   name="oked_insurer"
                   @if($errors->has('oked_insurer'))
                   class="form-control is-invalid"
                   @else
                   class="form-control"
                    @endif >
        </div>
    </div>
@endsection

@section('_obshie_svedeniya_scripts')
    <script>
        $.ajax({
            url: '{{route('getBanks')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = response.length;
                let banks = $("#bank_insurer");

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
        $('#bank_insurer').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection