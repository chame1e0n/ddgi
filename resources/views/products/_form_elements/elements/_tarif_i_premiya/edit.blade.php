@section('_tarif_i_premiya_content')
    <div class="col-md-12">
        <div class="icheck-success ">
            <input onchange="toggleBlock('all-product-tariff', 'data-tarif-descr')"
                   class="form-check-input client-type-radio"
                   type="checkbox"
                   name="all_product[tariff]"
                   id="all-product-tariff"
                   @if($product->tarif_other)
                    checked
                   @endif />
            <label class="form-check-label" for="all-product-tariff">Тариф</label>
        </div>

        <!-- TODO: Блок должен находится в скрытом состоянии отображаться только тогда, когда выбран checkbox "Тариф" -->

        <div class="form-group"
             data-tarif-descr
             @if(!$product->tarif_other)
                style="display: none;"
             @endif>
            <label for="all-product-tarif-other" class="col-form-label">Укажите процент тарифа</label>
            <input class="form-control"
                   id="all-product-tarif-other"
                   name="all_product[tarif_other]"
                   type="number"
                   value="{{$product->tarif_other}}" />
        </div>
    </div>
    <div class="col-md-12">
        <div class="icheck-success ">
            <input onchange="toggleBlock('all-product-preim', 'data-preim-descr')"
                   class="form-check-input client-type-radio"
                   type="checkbox"
                   name="all_product[preim]"
                   id="all-product-preim"
                   @if($product->premiya_other)
                    checked
                   @endif />
            <label class="form-check-label" for="all-product-preim">Премия</label>
        </div>

        <!-- TODO: Блок должен находится в скрытом состоянии отображаться только тогда, когда выбран checkbox "Тариф" -->

        <div class="form-group"
             data-preim-descr
             @if(!$product->premiya_other)
                style="display: none;"
             @endif>
            <label for="all-product-premiya-other" class="col-form-label">Укажите процент премии</label>
            <input class="form-control"
                   id="all-product-premiya-other"
                   name="all_product[premiya_other]"
                   type="number"
                   value="{{$product->premiya_other}}" />
        </div>
    </div>
@endsection
