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
                        @include('admin.common.form_fields.input', ['field_name' => 'name', 'field_title' => 'Наименование'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'code', 'field_title' => 'Код'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input_number', ['field_name' => 'priority', 'field_title' => 'Приоритет'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
