@section('_usloviya_oplati_strahovoy_premii_content')
    <div class="col-md-4">
        <label for="polises">Валюта взаиморасчетов</label>
        <select class="form-control" name="insurance_premium_currency" id="walletNames"
                style="width: 100%; text-align: center">
            <option>UZS</option>
        </select>
    </div>

    <div class="col-sm-4">
        <div class="form-group form-inline justify-content-between">
            <label>Способ расчета</label>
            <select name="sposob_rascheta" class="form-control"
                    style="width: 100%; text-align: center">
                @if(old('sposob_rascheta'))
                    <option value="{{old('sposob_rascheta')}}">
                        @if(old('sposob_rascheta') == 1) Сумах  @endif
                        @if(old('sposob_rascheta') == 2) В ин.
                        валюте  @endif
                        @if(old('sposob_rascheta') == 3) В ин. валюте по
                        курсу ЦБ на день заключение договора  @endif
                        @if(old('sposob_rascheta') == 4) В ин. валюте по
                        курсу ЦБ на день оплаты  @endif
                        @if(old('sposob_rascheta') == 5) В ин. валюте по
                        фикс
                        курсу ЦБ на день оплаты
                        премии/первого транша @endif
                    </option>
                @endif
                <option value="1">Сумах</option>
                <option value="2">В ин. валюте</option>
                <option value="3">В ин. валюте по курсу ЦБ на день заключение договора
                </option>
                <option value="4">В ин. валюте по курсу ЦБ на день оплаты</option>
                <option value="5">В ин. валюте по фикс курсу ЦБ на день оплаты
                    премии/первого транша
                </option>
            </select>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="form-group form-inline justify-content-between">
            <label>Порядок оплаты страховой премии</label>
            <select id="condition" class="form-control payment-schedule" name="payment_term" style="width: 100%; text-align: center">
                <option value="1">Единовременно</option>
                <option value="transh">Транш</option>
            </select>
        </div>
    </div>

    <!-- TODO: Блок должен находится в скрытом состоянии и отображаться только тогда, когда выбран пункт "Транш" в условиях оплаты -->
    <div class="col-md-12 d-none" id="transh-payment-schedule">
        <div class="pt-3 pb-3">
            <div class="form-group">
                <!-- TODO: Вынести код обработчика в отдельный файл -->
                <button type="button" id="transh-payment-schedule-button" class="btn btn-primary ">
                    Добавить
                </button>
            </div>
            <div class="table-responsive p-0 " style="max-height: 300px;">
                <table class="table table-hover table-head-fixed" id="empTable3">
                    <thead>
                    <tr>
                        <th class="text-nowrap">Сумма</th>
                        <th class="text-nowrap">От</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="payment-term-tr-0" data-field-number="0">
                        <td>
                            <input type="text" class="form-control" name="payment_sum[]">
                        </td>
                        <td>
                            <input type="date" class="form-control" name="payment_from[]">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection