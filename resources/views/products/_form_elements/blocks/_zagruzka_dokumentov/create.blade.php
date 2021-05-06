@section('_zagruzka_dokumentov_content')
    <div class="card-body">
        <div class="card card-info" id="clone-beneficiary">
            <div class="card-header">
                <h3 class="card-title">Загрузка документов</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="beneficiary-card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="polis-series" class="col-form-label">Анкета</label>
                            <input type="file" id="geographic-zone" name="application_form_file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="polis-series" class="col-form-label">Договор</label>
                            <input type="file" id="geographic-zone" name="contract_file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="polis-series" class="col-form-label">Полис</label>
                            <input type="file" id="geographic-zone" name="policy_file" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection