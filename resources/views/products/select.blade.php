   @include('errors.errors')
    <div class="card card-success product-type">
        <div class="card-header">
            <h3 class="card-title"></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div id="client-product-form">
                <div class="form-group clearfix">
                    <label>Типы клиента</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icheck-success">
                                <input checked type="radio" name="client_type_radio" class="client-type-radio"
                                       id="client-type-radio-1" value="0">
                                <label for="client-type-radio-1">физ. лицо</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="icheck-success">
                                <input type="radio" name="client_type_radio" class="client-type-radio"
                                       id="client-type-radio-2" value="1">
                                <label for="client-type-radio-2">юр. лицо</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="product-id">Вид продукта</label>
                    <select id="product-id" class="form-control select2" onchange="getVal(this.value)" name="product_id"
                            style="width: 100%;">

                        <option></option>
                        <option value="2" {{ \Route::currentRouteName() == "tamojenniy-sklad.create" ? "selected" : "" }}>ТАМОЖЕННЫЙ СКЛАД</option>
                        <option disabled value="1" {{ \Route::currentRouteName() == "kasko.create" ? "selected" : "" }}>KASKO</option>
                        <option value="3" {{ \Route::currentRouteName() == "cmp.create" ? "selected" : "" }}>CMP</option>
                        <option value="4" {{ \Route::currentRouteName() == "otvetstvennost-podryadchik.create" ? "selected" : "" }}>Ответственность подрядчик</option>
                        <option value="5" {{ \Route::currentRouteName() == "tamozhnya-add-legal.create" ? "selected" : "" }}>Таможенный платеж</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getVal(val) {
            switch (val) {
                case '2':
                    window.location.replace(`{{ route('tamojenniy-sklad.create') }}`);
                    break;
                case '1':
                    window.location.replace(`{{ route('kasko.create') }}`);
                    break;
                case '3':
                    window.location.replace(`{{ route('cmp.create') }}`);
                    break;
                case '4':
                    window.location.replace(`{{ route('otvetstvennost-podryadchik.create') }}`);
                    break;
                case '5':
                    window.location.replace(`{{ route('tamozhnya-add-legal.create') }}`);
                    break;
                case '6':
                    window.location.replace(`{{ route('credit-nepogashen.create') }}`);
                    break;
                case '7':
                    window.location.replace(`{{ route('rassrochka.create') }}`);
                    break;
            }
        }
    </script>
