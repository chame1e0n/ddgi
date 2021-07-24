<div class="card card-info" id="properties">
    <div class="card-header">
        <h3 class="card-title">Сведения об имуществе</h3>

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
                        <th class="text-nowrap">Местонахождение</th>
                        <th class="text-nowrap">Дата выдачи</th>
                        <th class="text-nowrap">Количество</th>
                        <th class="text-nowrap">Единица измерения</th>
                        <th class="text-nowrap">Страховая стоимость</th>
                        <th class="text-nowrap" style="min-width: 200px;">Страховая сумма</th>
                        <th class="text-nowrap" style="min-width: 200px;">Страховая премия</th>
                        <th class="text-nowrap" colspan="2">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contract_model->properties as $key => $property)
                        @include('includes.property_in_table')
                    @endforeach

                    <tr id="property-row-total">
                        <td>
                            <div class="form-group">
                                <button class="btn btn-primary ddgi-add-property" type="button">
                                    Добавить
                                </button>
                            </div>
                        </td>
                        <td colspan="4" style="text-align: right;">
                            <label class="text-bold">Итого:</label>
                        </td>
                        <td>
                            <input disabled="disabled"
                                   class="form-control"
                                   id="total-insurance-value"
                                   type="text"
                                   value="" />
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
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>