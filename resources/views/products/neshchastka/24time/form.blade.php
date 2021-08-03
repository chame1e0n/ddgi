@extends('layouts.index')

@section('content')
    <form action="{{route('neshchastka_time.' . ($contract->exists ? 'update' : 'store'), $contract->id )}}"
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

                    @include('includes.beneficiary')

                    <div class="card card-info" id="contract-accident">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contract-accident-geo-zone">Географическая зона:</label>
                                        <input required
                                               class="form-control @error('contract_accident.geo_zone') is-invalid @enderror"
                                               id="contract-accident-geo-zone"
                                               name="contract_accident[geo_zone]"
                                               type="text"
                                               value="{{old('contract_accident.geo_zone', $contract_accident->geo_zone)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('includes.policies')
                </section>
            </div>

            @if(!$block)
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right" id="form-save-button">
                        {{$contract->exists ? 'Изменить' : 'Добавить'}}
                    </button>
                </div>
            @endif
        </fieldset>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            function calculation() {
                let is_tariff = document.getElementById('contract-tariff-switch').checked;
                let is_premium = document.getElementById('contract-premium-switch').checked;

                let from = new Date($('#contract-from').val());
                let to = new Date($('#contract-to').val());
                let days = Math.round((to - from) / (24 * 60 * 60 * 1000)) + 1;

                let total_insurance_sum = 0;
                let total_insurance_premium = 0;
                let total_franchise = 0;

                $(policies).find('tbody > tr').each(function (i, element) {
                    let number = element.id.replace('policy-row-', '');

                    if (number == 'total') {
                        $('#total-insurance-sum').val(total_insurance_sum);
                        $('#total-insurance-premium').val(total_insurance_premium);
                        $('#total-franchise').val(total_franchise);

                        return;
                    }

                    let policy_insurance_sum = Number($('#policies-' + number + '-insurance-sum').val());

                    let policy_sportsman_sum = Number($('#policies-' + number + '-policy-sportsman-traumatic-sum').val()) + Number($('#policies-' + number + '-policy-sportsman-death-sum').val());

                    policy_sportsman_sum = window.isNaN(policy_sportsman_sum) ? 0 : policy_sportsman_sum;

                    $('#policies-' + number + '-policy-sportsman-total-sum').val(policy_sportsman_sum);
                    $('#policies-' + number + '-insurance-sum-plus').text('+ ' + policy_sportsman_sum);

                    let policy_sportsman_premium = Number($('#policies-' + number + '-policy-sportsman-traumatic-premium').val()) + Number($('#policies-' + number + '-policy-sportsman-death-premium').val());

                    policy_sportsman_premium = window.isNaN(policy_sportsman_premium) ? 0 : policy_sportsman_premium;

                    $('#policies-' + number + '-policy-sportsman-total-premium').val(policy_sportsman_premium);
                    $('#policies-' + number + '-insurance-premium-plus').text('+ ' + policy_sportsman_premium);

                    let policy_premium = 0;

                    if (!is_tariff && !is_premium) {
                        let tariff = {{$contract->specification ? $contract->specification->tariff : 0}};

                        policy_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_tariff) {
                        let tariff = $('#contract-tariff').val();

                        policy_premium = (days * policy_insurance_sum * tariff) / 365;
                    }
                    if (is_premium) {
                        policy_premium = Number($('#contract-premium').val());
                    }

                    $('#policies-' + number + '-insurance-premium').val(policy_premium);

                    total_insurance_sum += policy_insurance_sum + policy_sportsman_sum;
                    total_insurance_premium += policy_premium + policy_sportsman_premium;
                    total_franchise += Number($('#policies-' + number + '-franchise').val());
                });
            }
            function addPolicy() {
                let tbody = policies.querySelector('tbody');
                let counter = tbody.childElementCount - 1;

                while(document.getElementById('policy-row-' + counter)) {
                    counter++;
                }

                $.ajax({
                    url: '{{route("get_policy_for_table")}}',
                    type: 'post',
                    data: { key: counter, model: 'PolicyAccident' },
                    dataType: 'json',
                    success: function (response) {
                        document.getElementById('policy-row-total').insertAdjacentHTML('beforebegin', response.template);
                    },
                    error: function (data) {
                        console.log('get policy template error', data);
                    }
                });
            }
            function removePolicy(event) {
                if (event.target.classList.contains('ddgi-remove-policy')) {
                    event.target.parentElement.parentElement.remove();

                    calculation();
                }
            }
            function definePolicySeries() {
                let series = document.getElementById(this.id.replace('name', 'series'));

                $.ajax({
                    url: '{{route("get_policies")}}',
                    type: 'get',
                    data: { name: $(this).val() },
                    dataType: 'json',
                    success: function (response) {
                        $(series).empty();
                        $(series).append('<option></option>');

                        for (var i = 0; i < response.length; i++) {
                            $(series).append('<option value="' + response[i]['series']+ '">' + response[i]['series'] + '</option>');
                        }
                    }
                });
            }
            function defineResponsiblePerson() {
                let name = document.getElementById(this.id.replace('series', 'name'));
                let responsible_person = document.getElementById(this.id.replace('series', 'responsible-person'));

                $.ajax({
                    url: '{{route("get_policy_employee")}}',
                    type: 'get',
                    data: { name: $(name).val(), series: $(this).val() },
                    dataType: 'json',
                    success: function (response) {
                        $(responsible_person).val(response.surname + ' ' + response.name + ' ' + response.middlename);
                    }
                });
            }

            const policies = document.querySelector('#policies');
            const button_add_policy = policies.querySelector('.ddgi-add-policy');
            if (button_add_policy) {
                button_add_policy.addEventListener('click', addPolicy);
            }
            if (policies) {
                policies.addEventListener('click', removePolicy);

                $(policies).delegate('.ddgi-policy-name', 'keyup', definePolicySeries);

                $(policies).delegate('.ddgi-policy-series', 'change', defineResponsiblePerson);

                $('#form-contract').delegate('.ddgi-calculate', 'change', calculation);

                $('.ddgi-policy-series').trigger('change');     // для show метода при загрузке страницы
                $('.ddgi-calculate').trigger('change');         // для show метода при загрузке страницы
            }

            $('form').submit(function(e) {
                $(':disabled').each(function(e) {
                    $(this).removeAttr('disabled');
                })
            });
        });
    </script>

    @yield('contract_js')
@endsection
