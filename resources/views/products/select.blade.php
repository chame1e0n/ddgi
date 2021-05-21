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
                                <input type="radio" onchange="changeFizYur(false)" name="client_type_radio" class="client-type-radio"
                                       id="client-type-radio-1" value="0">
                                <label for="client-type-radio-1">физ. лицо</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="icheck-success">
                                <input checked type="radio" onchange="changeFizYur(true)" name="client_type_radio" class="client-type-radio"
                                       id="client-type-radio-2" value="1">
                                <label for="client-type-radio-2">юр. лицо</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group fiz-list" hidden="">
                    <label for="product-id">Вид продукта</label>
                    <select id="product-id" class="form-control select2" onchange="getVal(this.value)" name="product_id"
                            style="width: 100%;">

                        <option></option>
                        <option value="7" {{ \Route::currentRouteName() == "product3777.create" ? "selected" : "" }}>Кредит Ед 3777</option>
                        <option value="10" {{ \Route::currentRouteName() == "mejd.create" ? "selected" : "" }}>Несчастка Межд Тс</option>
                    </select>
                </div>
                <div class="form-group your-list">
                    <label for="product-id">Вид продукта</label>
                    <select id="product-id" class="form-control select2" onchange="getVal(this.value)" name="product_id"
                            style="width: 100%;">

                        <option></option>
                        <option value="2" {{ \Route::currentRouteName() == "tamojenniy-sklad.create" ? "selected" : "" }}>ТАМОЖЕННЫЙ СКЛАД</option>
                        <option disabled value="1" {{ \Route::currentRouteName() == "kasko.create" ? "selected" : "" }}>KASKO</option>
                        <option value="3" {{ \Route::currentRouteName() == "cmp.create" ? "selected" : "" }}>CMP</option>
                        <option value="4" {{ \Route::currentRouteName() == "otvetstvennost-podryadchik.create" ? "selected" : "" }}>Ответственность подрядчик</option>
                        <option value="5" {{ \Route::currentRouteName() == "tamozhnya-add-legal.create" ? "selected" : "" }}>Таможенный платеж</option>
                        <option value="6" {{ \Route::currentRouteName() == "dobrovolka_imushestvo.create" ? "selected" : "" }}>Доброволка имущество</option>
                        <option value="8" {{ \Route::currentRouteName() == "borrower_sportsman.create" ? "selected" : "" }}>Несчастка спортсменов</option>
                        <option value="9" {{ \Route::currentRouteName() == "audit.create" ? "selected" : "" }}>Проф ответсвенность аудиторов</option>
                        <option value="11" {{ \Route::currentRouteName() == "lizing_ts.create" ? "selected" : "" }}>Лизинг ТС</option>
                        <option value="12" {{ \Route::currentRouteName() == "rassrochka.create" ? "selected" : "" }}>Кредит Рассрочка</option>
                        <option value="13" {{ \Route::currentRouteName() == "neshchastka_borrower.create" ? "selected" : "" }}> Несчастка заемщиков</option>
                        <option value="14" {{ \Route::currentRouteName() == "microzaym.create" ? "selected" : "" }}> Кредит Непогошения микрозайма</option>
                        <option value="15" {{ \Route::currentRouteName() == "potrebkredit.create" ? "selected" : "" }}> Кредит Непогашения потребительского кредита</option>
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
                    window.location.replace(`{{ route('dobrovolka_imushestvo.create') }}`);
                    break;
                case '7':
                    window.location.replace(`{{ route('product3777.create') }}`);
                    break;
                case '8':
                    window.location.replace(`{{ route('borrower_sportsman.create') }}`);
                    break;
                case '9':
                    window.location.replace(`{{ route('audit.create') }}`);
                    break;
                case '10':
                    window.location.replace(`{{ route('mejd.create') }}`);
                    break;
                case '11':
                    window.location.replace(`{{ route('lizing_ts.create') }}`);
                    break;
                case '12':
                    window.location.replace(`{{ route('rassrochka.create') }}`);
                    break;
                case '13':
                    window.location.replace(`{{ route('neshchastka_borrower.create') }}`);
                    break;
                case '14':
                    window.location.replace(`{{ route('microzaym.create') }}`);
                    break;
                case '15':
                    window.location.replace(`{{ route('potrebkredit.create') }}`);
                    break;
            }
        }

        function changeFizYur(value) {
            let fizLitso = document.querySelector('.fiz-list');
            let yourLitso = document.querySelector('.your-list');

            if(value) {
                fizLitso.setAttribute("hidden", 'true');
                yourLitso.removeAttribute("hidden");
            } else {
                fizLitso.removeAttribute("hidden");
                yourLitso.setAttribute("hidden", 'true');
            }
        }
    </script>
