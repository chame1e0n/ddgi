@section('_zagruzka_dokumentov_content')
    <div class="card-body">
        <div class="card card-info" id="clone-beneficiary">
            <div class="card-header">
                <h3 class="card-title">Загрузка документов</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="beneficiary-card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="application_form_file" class="col-form-label">Анкета</label>
                            @if($product->application_form_file)
                                <a href="{{asset($product->application_form_file)}}" target="_blank">Скачать</a>
                            @endif
                            <input type="file" id="application_form_file" name="application_form_file"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contract_file" class="col-form-label">Договор</label>
                            @if($product->contract_file)
                                <a href="{{asset($product->contract_file)}}" target="_blank">Скачать</a>
                            @endif
                            <input type="file" id="contract_file" name="contract_file" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="policy_file" class="col-form-label">Полис</label>
                            @if($product->policy_file)
                                <a href="{{asset($product->policy_file)}}" target="_blank">Скачать</a>
                            @endif
                            <input type="file" id="policy_file" name="policy_file" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
