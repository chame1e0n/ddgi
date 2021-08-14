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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="polis_name" class="col-form-label">Наименование</label>
                                <select @if($errors->has('polis_name'))
                                        class="form-control is-invalid"
                                        @else
                                        class="form-control"
                                        @endif id="polis_name"
                                        name="polis_name"
                                        style="width: 100%;" required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="policy_id" class="col-form-label">Серийный номер</label>
                                <select @if($errors->has('policy_id'))
                                        class="form-control is-invalid"
                                        @else
                                        class="form-control"
                                        @endif id="policy_id"
                                        name="policy_id"
                                        style="width: 100%;" required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="col-form-label">Дата выдачи страхового полиса </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input id="data_vidachi" name="data_vidachi" type="date"
                                       value="{{old('data_vidachi')}}"
                                       @if($errors->has('data_vidachi'))
                                       class="form-control is-invalid"
                                       @else
                                       class="form-control"
                                    @endif >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="otvet_litso">Ответственное лицо</label>
                                <select @if($errors->has('otvet_litso'))
                                        class="form-control is-invalid"
                                        @else
                                        class="form-control"
                                        @endif id="otvet_litso" name="otvet_litso"
                                        style="width: 100%;" required>
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('_svediniya_o_polise_scripts')
    <script>
        //Get policy by policy id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getPolisNames')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;
                    var polisName = "{{ old('polis_name') ?? 0}}";
                    var polisNameField = $("#polis_name");

                    polisNameField.empty();

                    for (var i = 0; i < len; i++) {
                        var name = response[i]['polis_name'];

                        if (polisName && polisName == name) {
                            polisNameField.append("<option value='" + name + "' selected>" + name + "</option>");
                        } else {
                            polisNameField.append("<option value='" + name + "'>" + name + "</option>");
                        }
                    }

                    getPolicySeries(polisName);
                }
            });

            $("#polis_name").change(function () {
                var name = $(this).val();

                getPolicySeries(name);
            });

            function getPolicySeries(name) {
                if(name) {
                    $.ajax({
                        url: '{{route('getPolicyRelations')}}',
                        type: 'get',
                        data: {polis_name: name},
                        dataType: 'json',
                        success: function (response) {
                            var len = response.length;
                            var polisSeries = {{ old('policy_id') ?? 0}};
                            var polisSeriesField = $("#policy_id")

                            polisSeriesField.empty();
                            for (var i in response['series']) {
                                if (polisSeries == i) {
                                    polisSeriesField.append("<option value='" + i + "' selected>" + response['series'][i] + "</option>");
                                } else {
                                    polisSeriesField.append("<option value='" + i + "'>" + response['series'][i] + "</option>");
                                }

                            }
                        }
                    });
                }
            }
        });
    </script>
    <script>
        $.ajax({
            url: '{{route('getAgents')}}',
            type: 'get',
            dataType: 'json',
            success: function (response) {

                var len = response.length;
                let employee = $("#otvet_litso");

                employee.empty();
                employee.append("<option> </option>");
                var selected = {{old('otvet_litso') ?? 0}};
                for (var i = 0; i < len; i++) {
                    var id = response[i]['id'];
                    var name = response[i]['name'];

                    if (id === 0) {
                        employee.append("<option value='" + id + "' disabled='disabled'>" + name + "</option>");
                    } else {
                        employee.append("<option value='" + id + "' " + (selected == id ? 'selected' : '')  + ">" + response[i]['surname'] + " " + name + " " + response[i]['middle_name'] + "</option>");
                    }
                }
            }
        });
    </script>
@endsection
