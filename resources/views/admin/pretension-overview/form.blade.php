<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить рассмотрение претензии</h3>
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
                        @include('admin.common.form_fields.select', ['field_name' => 'pretension_id', 'field_title' => 'Претенизия', 'list' => $pretensions])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.select', ['field_name' => 'employee_id', 'field_title' => 'Сотрудник', 'list' => $employees])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.checkbox', ['field_name' => 'is_passed', 'field_title' => 'Принят'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
