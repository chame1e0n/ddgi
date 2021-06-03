<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить филиал</h3>
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
                        @include('admin.common.form_fields.select', ['field_name' => 'region_id', 'field_title' => 'Регион', 'list' => $regions])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.date', ['field_name' => 'founded_date', 'field_title' => 'Дата создания'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @include('admin.common.form_fields.input', ['field_name' => 'address', 'field_title' => 'Адрес'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.common.form_fields.input', ['field_name' => 'phone_number', 'field_title' => 'Телефон'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
