<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить валюту</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Наименование</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.name') is-invalid @enderror"
                                   id="name"
                                   name="{{strtolower(class_basename($object))}}[name]"
                                   value="{{old(strtolower(class_basename($object)) . '.name', $object->name)}}" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="code" class="col-form-label">Код</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.code') is-invalid @enderror"
                                   id="code"
                                   name="{{strtolower(class_basename($object))}}[code]"
                                   value="{{old(strtolower(class_basename($object)) . '.code', $object->code)}}" />
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="priority" class="col-form-label">Приоритет</label>
                            <input required
                                   class="form-control @error(strtolower(class_basename($object)) . '.priority') is-invalid @enderror"
                                   id="priority"
                                   name="{{strtolower(class_basename($object))}}[priority]"
                                   type="number"
                                   value="{{old(strtolower(class_basename($object)) . '.priority', $object->priority)}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
