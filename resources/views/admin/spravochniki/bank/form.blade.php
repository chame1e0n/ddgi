<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить банк</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="code" class="col-form-label">Код банка</label>
                            <input
                                id="code"
                                class="form-control"
                                name="bank[code]"
                                required
                                value="{{ $object->code }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Наименование банка</label>
                            <input
                                id="name"
                                class="form-control"
                                name="bank[name]"
                                required
                                value="{{ $object->name }}"
                            >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="filial" class="col-form-label">Наименование филиала</label>
                            <input
                                id="filial"
                                class="form-control"
                                name="bank[filial]"
                                required
                                value="{{ $object->filial }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="col-form-label">Адрес банка</label>
                            <input
                                id="address"
                                class="form-control"
                                name="bank[address]"
                                required
                                value="{{ $object->address }}"
                            >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inn" class="col-form-label">ИНН банка</label>
                            <input
                                id="inn"
                                class="form-control"
                                name="bank[inn]"
                                required
                                value="{{$object->inn}}"
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account" class="col-form-label">Расчетный счет банка</label>
                            <input
                                id="account"
                                class="form-control"
                                name="bank[account]"
                                required
                                value="{{ $object->account }}"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
