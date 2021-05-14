@include('products._form_elements.elements._policySeries_by_policyName.create')
@include('products._form_elements.elements._agentList.create')
@section('_svediniya_o_polise_content')
    <div class="card-body">
        <div class="card card-info" id="clone-beneficiary">
            <div class="card-header">
                <h3 class="card-title">Сведения о страховом полисе</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="beneficiary-card-body">
                <div>
                    <div class="row">
                        @yield('_policySeries_by_policyName_content')
                        <div class="col-sm-3">
                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input id="insurance_from" name="polic_given_date" type="date"
                                       value="{{old('polic_given_date')}}"
                                       @if($errors->has('polic_given_date'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                        @endif >
                            </div>
                        </div>
                        @yield('_agentList_content')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('_svediniya_o_polise_scripts')
    @yield('_policySeries_by_policyName_scripts')
    @yield('_agentList_scripts')
@endsection
