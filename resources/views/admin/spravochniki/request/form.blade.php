<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить запрос</h3>
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
                        @include('admin.common.form_fields.input', ['field_name' => 'act_number', 'field_title' => 'Наименование', 'list' => $policies])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.select', ['field_name' => 'status', 'field_title' => 'Статус', 'list' => $statuses])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.select', ['field_name' => 'policy_id', 'field_title' => 'Полис', 'list' => $policies])
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'limit_reason', 'field_title' => 'Причина увеличения лимита'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'act_number', 'field_title' => 'Номер акта'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'policy_amount', 'field_title' => 'Количество полисов'])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @include('admin.common.form_fields.file', ['field_name' => 'file', 'field_title' => 'Файл'])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @include('admin.common.form_fields.summernote', ['field_name' => 'comment', 'field_title' => 'Коммент'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
