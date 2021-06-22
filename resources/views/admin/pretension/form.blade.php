<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить претензию</h3>
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
                        @include('admin.common.form_fields.select', ['field_name' => 'branch_id', 'field_title' => 'Филиал', 'list' => $branches])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.select', ['field_name' => 'policy_id', 'field_title' => 'Полис', 'list' => $policies])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.select', ['field_name' => 'status', 'field_title' => 'Статус', 'list' => $statuses])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'case_number', 'field_title' => 'Номер кейса'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'actually_paid', 'field_title' => 'Оплачено'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.date', ['field_name' => 'last_payment_date', 'field_title' => 'Дата последней оплаты'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'franchise_sum', 'field_title' => 'Сумма франшизы'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'franchise_percent', 'field_title' => 'Процент франшизы'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'reinsurance', 'field_title' => 'Реиншуранс'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.date', ['field_name' => 'statement_date', 'field_title' => 'Дата статуса'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.date', ['field_name' => 'insured_event_date', 'field_title' => 'Дата страхового случая'])
                    </div>
                    <div class="col-md-3">
                        @include('admin.common.form_fields.input', ['field_name' => 'event_description', 'field_title' => 'Название события'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'object_description', 'field_title' => 'Описание события'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'region', 'field_title' => 'Регион'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'district', 'field_title' => 'Район'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'claimed_loss_sum', 'field_title' => 'Запрошеная сумма'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'refund_paid_sum', 'field_title' => 'Вернули средств'])
                    </div>
                    <div class="col-md-4">
                        @include('admin.common.form_fields.input', ['field_name' => 'currency_exchange_rate', 'field_title' => 'Обменный курс'])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        @include('admin.common.form_fields.date', ['field_name' => 'datepayment_compensation_date', 'field_title' => 'Дата выплаты'])
                    </div>
                    <div class="col-md-6">
                        @include('admin.common.form_fields.date', ['field_name' => 'final_settlement_date', 'field_title' => 'Последняя дата'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
