@section('_obshie_svedeniya_content')
    <div class="col-md-6">
        <div class="form-group">
            <label for="insurer-name" class="col-form-label">ФИО страхователя</label>
            <input type="text" id="insurer-name" name="fio_insurer" value="{{ $product->policyHolder->FIO }}"
                   class="form-control"
                   required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="insurer-address" class="col-form-label">Юр адрес
                страхователя</label>
            <input type="text" id="insurer-address" name="address_insurer" value="{{ $product->policyHolder->address }}"
                   class="form-control" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="insurer-tel" class="col-form-label">Телефон</label>
            <input type="text" id="insurer-tel" name="tel_insurer" class="form-control"
                   value="{{ $product->policyHolder->phone_number }}"
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="insurer-schet" class="col-form-label">Расчетный счет</label>
            <input type="text" id="insurer-schet" name="address_schet" class="form-control"
                   value="{{ $product->policyHolder->checking_account }}"
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="insurer-inn" class="col-form-label">ИНН</label>
            <input type="text" id="insurer-inn" name="inn_insurer" class="form-control"
                   value="{{ $product->policyHolder->inn }}"
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="insurer-mfo" class="col-form-label">МФО</label>
            <input type="text" id="insurer-mfo" name="mfo_insurer" class="form-control"
                   value="{{ $product->policyHolder->mfo }}"
                   required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="insurer-bank" class="col-form-label">Банк</label>
            <select class="form-control bank" id="bank_insurer" name="bank_insurer"
                    style="width: 100%;" required>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="insurer-okonh" class="col-form-label">ОКЭД</label>
            <input type="text" id="insurer-okonh" name="oked_insurer" class="form-control"
                   value="{{ $product->policyHolder->oked }}"
                   required>
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
                var selected = {{$product->policyHolder->bank_id ?? 0}};
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
