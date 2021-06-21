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
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.code') is-invalid @enderror"
                                   id="code"
                                   name="{{strtolower(class_basename($object))}}[code]"
                                   value="{{old(strtolower(class_basename($object)) . '.code', $object->code)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Наименование банка</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.name') is-invalid @enderror"
                                   id="name"
                                   name="{{strtolower(class_basename($object))}}[name]"
                                   value="{{old(strtolower(class_basename($object)) . '.name', $object->name)}}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="filial" class="col-form-label">Наименование филиала</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.filial') is-invalid @enderror"
                                   id="filial"
                                   name="{{strtolower(class_basename($object))}}[filial]"
                                   value="{{old(strtolower(class_basename($object)) . '.filial', $object->filial)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address" class="col-form-label">Адрес банка</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.address') is-invalid @enderror"
                                   id="address"
                                   name="{{strtolower(class_basename($object))}}[address]"
                                   value="{{old(strtolower(class_basename($object)) . '.address', $object->address)}}" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inn" class="col-form-label">ИНН банка</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.inn') is-invalid @enderror"
                                   id="inn"
                                   name="{{strtolower(class_basename($object))}}[inn]"
                                   value="{{old(strtolower(class_basename($object)) . '.inn', $object->inn)}}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account" class="col-form-label">Расчетный счет банка</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.account') is-invalid @enderror"
                                   id="account"
                                   name="{{strtolower(class_basename($object))}}[account]"
                                   value="{{old(strtolower(class_basename($object)) . '.account', $object->account)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
