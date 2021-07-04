@extends('layouts.index')

@section('content')
    <form action="{{route('neshchastka_borrower.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
          id="form-contract"
          enctype="multipart/form-data"
          method="post">
        @csrf

        @if($contract->exists)
            @method('PUT')
        @endif

        <fieldset @if($block) disabled="disabled" @endif>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                                    <li class="breadcrumb-item active"><a href="/form">Анкеты</a></li>
                                    <li class="breadcrumb-item active">Создать Анкету</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    @include('includes.messages')

                    @include('includes.contract')

                    @include('includes.client')

                    @include('includes.insured_person')

                    @include('includes.beneficiary')

                    <div class="card card-info" id="contract_borrower_accident">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные поля контракта</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-borrower-accident-loan-agreement">Кредитный договор</label>
                                        <div class="input-group mb-3">
                                            <input required
                                                   class="form-control @error('contract_borrower_accident.loan_agreement') is-invalid @enderror"
                                                   id="contract-borrower-accident-loan-agreement"
                                                   name="contract_borrower_accident[loan_agreement]"
                                                   type="text"
                                                   value="{{old('contract_borrower_accident.loan_agreement', $contract_borrower_accident->loan_agreement)}}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contract-borrower-accident-agreement-date">Дата заключения договора</label>
                                        <div class="input-group mb-3">
                                            <input required
                                                   class="form-control @error('contract_borrower_accident.agreement_date') is-invalid @enderror"
                                                   id="contract-borrower-accident-agreement-date"
                                                   name="contract_borrower_accident[agreement_date]"
                                                   type="date"
                                                   value="{{old('contract_borrower_accident.agreement_date', $contract_borrower_accident->agreement_date)}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card card-info" id="clone-beneficiary">
                            <div class="card-header">
                                <h3 class="card-title">Сведения о страховом полисе</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="beneficiary-card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="policy-name" class="col-form-label">Наименование полиса</label>
                                            <input class="form-control @error('policy.name') is-invalid @enderror"
                                                   id="policy-name"
                                                   name="policy[name]"
                                                   value="{{old('policy.name', $policy->name)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="policy-series" class="col-form-label">Серийный номер полиса</label>
                                            <select class="form-control select2 @error('policy.series') is-invalid @enderror"
                                                    id="policy-series"
                                                    name="policy[series]">
                                                <option></option>

                                                @foreach(\App\Model\Policy::all() as $policy)
                                                    <option @if($policy->id == old('policy.series', $policy->series)) selected="selected" @endif
                                                            value="{{$policy->series}}">
                                                        {{$policy->series}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="policy-date-of-issue" class="col-form-label">Дата выдачи страхового полиса </label>
                                            <input class="form-control @error('policy.date_of_issue') is-invalid @enderror"
                                                   id="policy-date-of-issue"
                                                   name="policy[date_of_issue]"
                                                   type="date"
                                                   value="{{old('policy.date_of_issue', $policy->date_of_issue)}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="responsible-person" class="col-form-label">Ответственное лицо</label>
                                            <input disabled="disabled"
                                                   class="form-control"
                                                   id="responsible-person"
                                                   type="text"
                                                   value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="policy-insurance-sum">Cтраховая сумма</label>
                                            <input class="form-control @error('policy.insurance_sum') is-invalid @enderror"
                                                   id="policy-insurance-sum"
                                                   name="policy[insurance_sum]"
                                                   step="0.01"
                                                   type="number"
                                                   value="{{old('policy.insurance_sum', $policy->insurance_sum)}}" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="insurance-premium">Cтраховая премия</label>
                                            <input disabled="disabled"
                                                   class="form-control"
                                                   id="insurance-premium"
                                                   type="text"
                                                   value="" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="policy-franchise">Франшиза</label>
                                            <input class="form-control @error('policy.franchise') is-invalid @enderror"
                                                   id="policy-franchise"
                                                   name="policy[franchise]"
                                                   step="0.01"
                                                   type="number"
                                                   value="{{old('policy.franchise', $policy->franchise)}}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @if(!$block)
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" id="form-save-button">{{$contract->exists ? 'Изменить' : 'Добавить'}}</button>
                    </div>
                @endif
            </div>
        </fieldset>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#policy-name').keyup(function () {
                $.ajax({
                    url: '{{route("get_policies")}}',
                    type: 'get',
                    data: { name: $(this).val() },
                    dataType: 'json',
                    success: function (response) {
                        $('#policy-series').empty();
                        $('#policy-series').append('<option></option>');

                        for (var i = 0; i < response.length; i++) {
                            $('#policy-series').append('<option value="' + response[i]['series']+ '">' + response[i]['series'] + '</option>');
                        }
                    }
                });
            });
            $('#policy-series').change(function () {
                $.ajax({
                    url: '{{route("get_policy_employee")}}',
                    type: 'get',
                    data: { name: $('#policy-name').val(), series: $('#policy-series').val() },
                    dataType: 'json',
                    success: function (response) {
                        $('#responsible-person').val(response.surname + ' ' + response.name + ' ' + response.middlename);
                    }
                });
            });

            let calculateInsurancePremium = function() {
                let is_tariff = document.getElementById('contract-tariff-switch').checked;
                let is_premium = document.getElementById('contract-premium-switch').checked;

                if (!is_tariff && !is_premium) {
                    let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};
                    let from = new Date($('#contract-from').val());
                    let to = new Date($('#contract-to').val())
                    let days = Math.round((to - from) / (24 * 60 * 60 * 1000)) + 1;
                    let insurance_sum = $('#policy-insurance-sum').val();

                    $('#insurance-premium').val((days * insurance_sum * tariff) / 365);
                }
                if (is_tariff) {
                    let tariff = $('#contract-tariff').val();
                    let from = new Date($('#contract-from').val());
                    let to = new Date($('#contract-to').val())
                    let days = Math.round((to - from) / (24 * 60 * 60 * 1000)) + 1;
                    let insurance_sum = $('#policy-insurance-sum').val();

                    $('#insurance-premium').val((days * insurance_sum * tariff) / 365);
                }
                if (is_premium) {
                    $('#insurance-premium').val($('#contract-premium').val());
                }
            };

            $('#contract-from').change(calculateInsurancePremium);
            $('#contract-to').change(calculateInsurancePremium);
            $('#contract-tariff').change(calculateInsurancePremium);
            $('#contract-premium').change(calculateInsurancePremium);
            $('#policy-insurance-sum').keyup(calculateInsurancePremium);
        });
    </script>
@endsection