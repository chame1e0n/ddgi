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
                                <input type="radio" name="client_type_radio" class="client-type-radio"
                                       id="client-type-radio-1" value="individual">
                                <label for="client-type-radio-1">физ. лицо</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="icheck-success">
                                <input type="radio" name="client_type_radio" class="client-type-radio"
                                       id="client-type-radio-2" value="legal">
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
                        <option value="1" {{ \Route::currentRouteName() == "tamojenniy-sklad.create" ? "selected" : "" }}>ТАМОЖЕННЫЙ СКЛАД</option>
                        <option value="2" {{ \Route::currentRouteName() == "kasko.create" ? "selected" : "" }}>KASKO</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getVal(val) {
            switch (val) {
                case '1':
                    window.location.replace(`{{ route('tamojenniy-sklad.create') }}`);
                    break;
                case '2':
                    window.location.replace(`{{ route('kasko.create') }}`);
                    break;
            }
        }
    </script>
