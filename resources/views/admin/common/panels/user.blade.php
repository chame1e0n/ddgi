<div class="card">
    <div class="card-header">
        <h3 class="card-title">Настройки пользователя</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                @include('admin.common.form_fields.email', ['field_name' => 'email', 'field_title' => 'Эл. почта'])
            </div>
            <div class="col-md-6">
                @include('admin.common.form_fields.password', ['field_name' => 'password', 'field_title' => 'Пароль'])
            </div>
        </div>
    </div>
</div>
