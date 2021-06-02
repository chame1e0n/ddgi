<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить группу</h3>
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
                            <input
                                id="name"
                                class="form-control"
                                name="group[name]"
                                required
                                value="{{ old('group.name', $object->name) }}"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
