@section('_tarif_i_premiya_content')
    <div class="col-md-12">
        <div class="icheck-success ">
            <input onchange="toggleBlock('all-product-tariff', 'data-tarif-descr')"
                   class="form-check-input client-type-radio"
                   type="checkbox"
                   name="all_product[tariff]"
                   id="all-product-tariff" />
            <label class="form-check-label" for="all-product-tariff">Тариф</label>
        </div>

        <!-- TODO: Блок должен находится в скрытом состоянии отображаться только тогда, когда выбран checkbox "Тариф" -->

        <div class="form-group"
             data-tarif-descr
             @if(!old('tarif_other'))
                style="display: none;"
             @endif>
            <label for="all-product-tarif-other" class="col-form-label">Укажите процент тарифа</label>
            <input class="form-control"
                   id="all-product-tarif-other"
                   name="all_product[tarif_other]"
                   value="{{old('tarif_other')}}"
                   type="number" />

            <label for="newDescrPreim" class="col-form-label">Новая страховая премия</label>
            <input class="form-control" readonly id="newDescrPreim" type="number">
        </div>
    </div>
    <div class="col-md-12">
        <div class="icheck-success ">
            <input onchange="toggleBlock('all-product-preim', 'data-preim-descr')"
                   class="form-check-input client-type-radio"
                   type="checkbox"
                   name="all_product[preim]"
                   id="all-product-preim" />
            <label class="form-check-label" for="all-product-preim">Премия</label>
        </div>

        <!-- TODO: Блок должен находится в скрытом состоянии отображаться только тогда, когда выбран checkbox "Тариф" -->

        <div class="form-group"
             data-preim-descr
             @if(!old('premiya_other'))
                style="display: none;"
             @endif>
            <label for="all-product-premiya-other" class="col-form-label">Укажите процент премии</label>
            <input class="form-control"
                   id="all-product-premiya-other"
                   value="{{old('premiya_other')}}"
                   name="all_product[premiya_other]"
                   type="number" />

            <label for="newDdescrTarif" class="col-form-label">Новый процент тарифа</label>
            <input class="form-control" readonly id="newDdescrTarif" type="number">
        </div>
    </div>
@endsection
