@section('_unikalnyie_nomera')
    <div class="card-body">
        <div class="card card-info" id="clone-beneficiary">
            <div class="card-header">
                <h3 class="card-title">Сведения о договоре</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="beneficiary-card-body">
                <div class="row">
                    @include('products._form_elements.elements._nomer_dogovora')
                    @include('products._form_elements.elements._nomer_polisa')
                </div>
            </div>
        </div>
    </div>
@endsection