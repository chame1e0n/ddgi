<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить сотрудника ({{ $title }})</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'name', 'field_title' => 'Имя'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'surname', 'field_title' => 'Фамилия'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'middlename', 'field_title' => 'Отчество'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.select', ['field_name' => 'branch_id', 'field_title' => 'Филиал', 'list' => $branches])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @include('admin.common.form_fields.date', ['field_name' => 'birthdate', 'field_title' => 'Дата рождения'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'passport_series', 'field_title' => 'Серия паспорта'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'passport_number', 'field_title' => 'Номер паспорта'])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        @include('admin.common.form_fields.date_from_to', [
                            'field_from' => 'work_start_date',
                            'field_to' => 'work_end_date',
                            'field_title' => 'Период работы'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'phone', 'field_title' => 'Телефон'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'address', 'field_title' => 'Адрес'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.common.panels.user', ['object' => $object->user])
