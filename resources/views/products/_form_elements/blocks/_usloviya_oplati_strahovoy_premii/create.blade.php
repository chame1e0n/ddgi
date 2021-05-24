@include('products._form_elements.elements._tarif_i_premiya.create')

@section('_usloviya_oplati_strahovoy_premii_content')
    <div class="card-body">
        <div id="payment-terms-form">
            <div class="row">
                @if(!isset($withoutInsuranceSum))
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="insurance_sum">Cтраховая сумма</label>
                            <input id="all-summ"
                                   value="{{old('insurance_sum')}}"
                                   name="insurance_sum"
                                   @if(isset($insurance_sum_all))
                                    data-sum-all-one
                                   @endif type="text"
                                   @if($errors->has('insurance_sum'))
                                    class="form-control is-invalid"
                                   @else
                                    class="form-control"
                                   @endif />
                        </div>
                    </div>
                @endif

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="insurance_bonus">Cтраховая премия</label>
                        <input type="text"
                               value="{{old('insurance_bonus')}}"
                               id="insurance_bonus"
                               name="insurance_bonus"
                               @if(isset($insurance_bonus_all))
                                data-sum-two-all
                               @endif
                               @if($errors->has('insurance_bonus'))
                                class="form-control is-invalid"
                               @else
                                class="form-control"
                               @endif />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="franchise">Франшиза</label>
                        <input type="text"
                               value="{{old('franchise')}}"
                               id="franchise"
                               name="franchise"
                               @if($errors->has('franchise'))
                                class="form-control is-invalid"
                               @else
                                class="form-control"
                               @endif />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-inline justify-content-between">
                        <label for="insurance_premium_currency">Валюта взаиморасчетов</label>
                        <select name="insurance_premium_currency"
                                id="walletNames"
                                style="width: 100%; text-align: center;"
                                @if($errors->has('insurance_premium_currency'))
                                    class="form-control is-invalid"
                                @else
                                    class="form-control"
                                @endif>
                            <option>UZS</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-inline justify-content-between">
                        <label>Способ расчета</label>
                        <select name="sposob_rascheta"
                                class="form-control"
                                style="width: 100%; text-align: center;">
                        @foreach(\App\Models\Dogovor::SPOSOB_RASCHETA as $key => $value)
                            <option value="{{$key}}"
                                    @if(old('sposob_rascheta') && old('sposob_rascheta') == $key)
                                        selected
                                    @endif>
                                {{$value}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group form-inline justify-content-between">
                        <label>Порядок оплаты страховой премии</label>
                        <select id="condition"
                                class="form-control payment-schedule"
                                name="payment_term"
                                style="width: 100%; text-align: center;">
                            <option value="1">Единовременно</option>
                            <option value="transh"
                                    @if(old('payment_term') && old('payment_term') == 'transh')
                                        selected
                                    @endif>
                                Транш
                            </option>
                        </select>
                    </div>
                </div>

                <!-- TODO: Блок должен находится в скрытом состоянии и отображаться только тогда, когда выбран пункт "Транш" в условиях оплаты -->

                <div id="transh-payment-schedule"
                     class="col-md-12 @if(!old('payment_term') || old('payment_term') == 1)d-none @endif">
                    <div class="pt-3 pb-3">
                        <div class="form-group">
                            <!-- TODO: Вынести код обработчика в отдельный файл -->

                            <button type="button" id="transh-payment-schedule-button" class="btn btn-primary ">
                                Добавить
                            </button>
                        </div>
                        <div class="table-responsive p-0"
                             style="max-height: 300px;">
                            <table class="table table-hover table-head-fixed" id="empTable3">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">Сумма</th>
                                        <th class="text-nowrap">От</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if((old('payment_term') && old('payment_term') == 1) || !old('payment_sum'))
                                    <tr id="payment-term-tr-0" data-field-number="0">
                                        <td>
                                            <input type="text" class="form-control" name="payment_sum[]" />
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="payment_from[]" />
                                        </td>
                                    </tr>
                                @else
                                    @foreach(old('payment_sum', []) as $key => $item)
                                        <tr id="payment-term-tr-{{$key}}"
                                            data-field-number="0">
                                            <td>
                                                <input type="text"
                                                       class="form-control"
                                                       value="{{$item}}"
                                                       name="payment_sum[]" />
                                            </td>
                                            <td>
                                                <input type="date"
                                                       class="form-control"
                                                       value="{{old('payment_from.'.$key)}}"
                                                       name="payment_from[]" />
                                            </td>

                                            @if($key)
                                                <td>
                                                    <input type="button"
                                                           onclick="removeEl('payment-term-tr-{{$key}}')"
                                                           value="Удалить"
                                                           class="btn btn-warning" />
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @yield('_tarif_i_premiya_content')
        </div>
    </div>
@endsection
