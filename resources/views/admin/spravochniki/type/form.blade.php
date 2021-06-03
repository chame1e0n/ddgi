<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить класс</h3>
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
                        @include('admin.common.form_fields.select', ['field_name' => 'group_id', 'field_title' => 'Группа', 'list' => $groups])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'code', 'field_title' => 'Код'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'name', 'field_title' => 'Наименование'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.common.form_fields.textarea', ['field_name' => 'description', 'field_title' => 'Описание'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
