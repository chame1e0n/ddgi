@section('_policySeries_by_policyName_content')
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
@endsection

@section('_policySeries_by_policyName_scripts')
    <script>
        //Get policy by policy id
        $(document).ready(function () {
            $.ajax({
                url: '{{route('getPolisNames')}}',
                type: 'get',
                dataType: 'json',
                success: function (response) {
                    var len = response.length;
                    var polisName = "{{ $productInformation->policy->polis_name ?? 0}}";
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
                        url: '{{route('getPolicySeries')}}',
                        type: 'get',
                        data: {polis_name: name},
                        dataType: 'json',
                        success: function (response) {

                            var len = response.length;
                            var polisSeries = {{ $productInformation->policy->id ?? 0}};
                            var polisSeriesField = $("#policy_id")

                            polisSeriesField.empty();
                            for (var i = 0; i < len; i++) {
                                var id = response[i]['id'];
                                var name = response[i]['number'];

                                if (polisSeries == id) {
                                    polisSeriesField.append("<option value='" + id + "' selected>" + name + "</option>");
                                } else {
                                    polisSeriesField.append("<option value='" + id + "'>" + name + "</option>");
                                }

                            }
                        }
                    });
                }
            }
        });
    </script>
@endsection
