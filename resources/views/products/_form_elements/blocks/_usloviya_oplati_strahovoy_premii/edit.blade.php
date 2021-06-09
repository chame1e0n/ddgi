@section('_usloviya_oplati_strahovoy_premii_content')
    <div class="card-body">
        <div id="payment-terms-form">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="all-product-insurance-sum">Cтраховая сумма</label>
                        <input type="text"
                               value="{{$product->insurance_sum}}"
                               id="all-product-insurance-sum"
                               name="all_product[insurance_sum]"
                               @if($errors->has('all_product.insurance_sum'))
                                class="form-control is-invalid"
                               @else
                                class="form-control"
                               @endif />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="all-product-insurance-bonus">Cтраховая премия</label>
                        <input type="text"
                               value="{{$product->insurance_bonus}}"
                               id="all-product-insurance-bonus"
                               name="all_product[insurance_bonus]"
                               @if($errors->has('all_product.insurance_bonus'))
                                class="form-control is-invalid"
                               @else
                                class="form-control"
                               @endif />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="all-product-franchise">Франшиза</label>
                        <input type="text"
                               value="{{$product->franchise}}"
                               id="all-product-franchise"
                               name="all_product[franchise]"
                               @if($errors->has('all_product.franchise'))
                                class="form-control is-invalid"
                               @else
                                class="form-control"
                               @endif />
                    </div>
                </div>

                <!-- TODO: Блок должен находится в скрытом состоянии и отображаться только тогда, когда выбран пункт "Транш" в условиях оплаты -->

                <div id="transh-payment-schedule"
                     class="col-md-12 @if(!$product->allProductTermTransh()->exists()) d-none @endif">
                    <div class="pt-3 pb-3">
                        <div class="form-group">
                            <!-- TODO: Вынести код обработчика в отдельный файл -->

                            <button type="button" id="transh-payment-schedule-button" class="btn btn-primary ">
                                Добавить
                            </button>
                        </div>
                        <div class="table-responsive p-0 "
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
                                @if(!$product->allProductTermTransh()->exists())
                                    <tr id="all-products-terms-transh-0" data-field-number="0">
                                        <td>
                                            <input type="text" class="form-control" name="all_products_terms_transhes[0][payment_sum]" />
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="all_products_terms_transhes[0][payment_sum]" />
                                        </td>
                                    </tr>
                                @else
                                    @foreach($product->allProductTermTransh as $key => $termtransh)
                                        <tr id="all-products-terms-transh-{{$key}}"
                                            data-field-number="{{$key}}">
                                            <td>
                                                <input type="hidden"
                                                       class="form-control"
                                                       name="all_products_terms_transhes[{{$termtransh->id}}][id]"
                                                       value="{{$termtransh->id}}" />
                                                <input type="text"
                                                       class="form-control"
                                                       name="all_products_terms_transhes[{{$termtransh->id}}][payment_sum]"
                                                       value="{{$termtransh->payment_sum}}" />
                                            </td>
                                            <td>
                                                <input type="date"
                                                       class="form-control"
                                                       name="all_products_terms_transhes[{{$termtransh->id}}][payment_from]"
                                                       value="{{$termtransh->payment_from}}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
