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
                        @include('admin.common.form_fields.input', ['field_name' => 'code', 'field_title' => 'Код банка'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.common.form_fields.input', ['field_name' => 'name', 'field_title' => 'Наименование банка'])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        @include('admin.common.form_fields.input', ['field_name' => 'filial', 'field_title' => 'Наименование филиала'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.common.form_fields.input', ['field_name' => 'address', 'field_title' => 'Адрес банка'])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        @include('admin.common.form_fields.input', ['field_name' => 'inn', 'field_title' => 'ИНН банка'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.common.form_fields.input', ['field_name' => 'account', 'field_title' => 'Расчетный счет банка'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
