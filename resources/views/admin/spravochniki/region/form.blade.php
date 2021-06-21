<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить регион</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Наименование</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.name') is-invalid @enderror"
                                   id="name"
                                   name="{{strtolower(class_basename($object))}}[name]"
                                   value="{{old(strtolower(class_basename($object)) . '.name', $object->name)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
