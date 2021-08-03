<div class="card card-info"
     id="policies"
     data-model="{{$model}}">
    <div class="card-header">
        <h3 class="card-title">Полисы</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive"
             style="max-height: 300px;">
            <table class="table table-hover table-head-fixed">
                <thead>
                    <tr>
                        <th class="text-nowrap">Наименование</th>
                        <th class="text-nowrap">Серия</th>
                        <th class="text-nowrap">Ответственное лицо</th>
                        <th class="text-nowrap">Дата выдачи</th>
                        <th class="text-nowrap">Действие от</th>
                        <th class="text-nowrap">Действие до</th>
                        <th class="text-nowrap" style="min-width: 200px;">Страховая сумма</th>
                        <th class="text-nowrap" style="min-width: 200px;">Страховая премия</th>
                        <th class="text-nowrap">Франшиза</th>
                        <th class="text-nowrap" colspan="2">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contract->policies as $key => $policy)
                        @php $policy_model = $policy->policy_model @endphp

                        @include('includes.policy_in_table')
                    @endforeach

                    <tr id="policy-row-total">
                        <td>
                            <div class="form-group">
                                <button type="button"
                                        class="btn btn-primary ddgi-add-policy">
                                    Добавить
                                </button>
                            </div>
                        </td>
                        <td colspan="5" style="text-align: right;">
                            <label class="text-bold">Итого:</label>
                        </td>
                        <td>
                            <input disabled="disabled"
                                   class="form-control"
                                   id="total-insurance-sum"
                                   type="text"
                                   value="" />
                        </td>
                        <td>
                            <input disabled="disabled"
                                   class="form-control"
                                   id="total-insurance-premium"
                                   type="text"
                                   value="" />
                        </td>
                        <td>
                            <input disabled="disabled"
                                   class="form-control"
                                   id="total-franchise"
                                   type="text"
                                   value="" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>