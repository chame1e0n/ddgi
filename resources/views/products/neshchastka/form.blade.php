@extends('layouts.index')

@section('content')
    <form action="{{route('mejd.' . ($contract->exists ? 'update' : 'store'), $contract->id)}}"
          enctype="multipart/form-data"
          id="form-contract"
          method="POST">
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

                    @include('includes.policy_in_section')
                </section>

                @if(!$block)
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right" id="form-save-button">
                            {{$contract->exists ? 'Изменить' : 'Добавить'}}
                        </button>
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

            let defineResponsiblePerson = function() {
                $.ajax({
                    url: '{{route("get_policy_employee")}}',
                    type: 'get',
                    data: { name: $('#policy-name').val(), series: $('#policy-series').val() },
                    dataType: 'json',
                    success: function (response) {
                        $('#policy-responsible-person').val(response.surname + ' ' + response.name + ' ' + response.middlename);
                    }
                });
            }

            let defineInsurancePremium = function() {
                let is_tariff = document.getElementById('contract-tariff-switch').checked;
                let is_premium = document.getElementById('contract-premium-switch').checked;

                if (!is_tariff && !is_premium) {
                    let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};
                    let from = new Date($('#contract-from').val());
                    let to = new Date($('#contract-to').val());
                    let days = Math.round((to - from) / (24 * 60 * 60 * 1000)) + 1;
                    let insurance_sum = $('#policy-insurance-sum').val();

                    $('#insurance-premium').val((days * insurance_sum * tariff) / 365);
                }
                if (is_tariff) {
                    let tariff = $('#contract-tariff').val();
                    let from = new Date($('#contract-from').val());
                    let to = new Date($('#contract-to').val());
                    let days = Math.round((to - from) / (24 * 60 * 60 * 1000)) + 1;
                    let insurance_sum = $('#policy-insurance-sum').val();

                    $('#insurance-premium').val((days * insurance_sum * tariff) / 365);
                }
                if (is_premium) {
                    $('#insurance-premium').val($('#contract-premium').val());
                }
            };

            $('#contract-from').change(defineInsurancePremium);
            $('#contract-to').change(defineInsurancePremium);
            $('#contract-tariff').change(defineInsurancePremium);
            $('#contract-premium').change(defineInsurancePremium);
            $('#policy-insurance-sum').keyup(defineInsurancePremium);

            defineInsurancePremium();

            $('#policy-series').change(defineResponsiblePerson);

            defineResponsiblePerson();

            $('form').submit(function(e) {
                $(':disabled').each(function(e) {
                    $(this).removeAttr('disabled');
                })
            });
        });
    </script>

    @yield('contract_js')
@endsection